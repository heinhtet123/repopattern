@extends('backend.layout.master')

@section('content')


<div class="row">
        <!-- left column -->
        <div class="col-md-12">

        	<div class="box box-primary">

	            <div class="box-header with-border">
		             <div class="col-md-6">
		             	<h3 class="box-title">Blogs</h3>
		             </div>
	              	<div class="col-md-6">
	              		<div class="input-group input-group-sm">
	              			<input type="text" class="form-control" placeholder="Search Blog">
	              			<span class="input-group-btn">
	                 			 	<button type="button" class="btn btn-primary btn-flat">Search</button>
	                 		</span>
	              		</div>
	              	</div>

	            </div>
           		<!-- /.box-header -->
            	<!-- form start -->
            
            

	            <form role="form" action="{{ route('backend.blog.store') }}" id="form_submit" method="post" enctype="multipart/form-data">


	           	  {{ csrf_field() }}
	              <div class="box-body">

	              <!-- form group -->
	               	<div class="form-group">

	                 	<!-- summernote -->
	                 	<div style="border: 1px solid red; border-radius: 5px; padding-left: 20px;">	
		                 	<textarea id="summernote" name="description" placeholder="What's on your mind?" style="border-bottom: none; border:none; overflow:hidden; resize:none; border-radius: 5px 5px 0px 0px;" class="form-control"> </textarea>

	                 		<div style="width: 100px; height: 100px; display: block; border: 2px dashed #888; margin: 0 0 7px 0;">

	                 			<img id="previewing" name="image" src="" />
						    </div>

		                 	<div class="form-group">
				                <div class="btn btn-default btn-file">
				                  <i class="fa fa-paperclip"></i> Attachment
				                  <input type="file" name="attachment" id="file">
				                </div>
				            </div>
				            
				        </div>

	                 	
	                 			
	                 	<div class="box-footer">
	                 		<button class="btn btn-primary pull-right">Post</button>
	                 	</div>
	             
	                  <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"> -->
	                </div>		              		               	  
		            
		            
		    <!--         <div id="newpost" style="display:none">
		            asjfklasjdklfaskldfjklasdflkajsdklfjaskldf aksjklfaskdf

		            </div> -->


		            <!-- for new feed buttons -->
	                

	                  <div class="container" id="newpost" style="display:none">
	                  <div class="row">
		                  <div class="col-lg-4"></div>
		                  <div class="col-lg-4 text-center">
		                  		<div class="btn-group" role="group">
				                  <button type="button" class="btn btn-round btn-primary" id="b1" class="b1" data-dismiss="modal"> New Blogs
				                  </button>
				                  <button type="button" class="btn btn-round btn-primary" class="b1" data-dimiss="modal" id="close">&times;
			    				 </button>
			    				 </div> 
	    				  </div>
		                  <div class="col-lg-4"></div>
	                  </div>	
	                  </div>




		        	<div id="new_data">
		        		
		        		@foreach ($blogs as $blog)
			        	<hr/>
		                 <div class="form-group">
		                  	<div class="item">
			                  		 <div class="row">
			    						<div class="col-sm-2 text-center">
			    							<img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle" height="65" width="65" alt="Avatar">
			   							</div>
			   							
			              				<div class="box-tool pull-right" style="position: absolute;margin-top: 4px;right: 80px;">

				 	 		 					<div class="btn-group">
				 	 		 						<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				 	 		 							<i class="fa fa-wrench"></i>
				 	 		 						</button>
				 	 		 						<ul class="dropdown-menu" style="left:-137px;" role="menu">
				 	 		 							<li>
				 	 		 								<a href="#">Edit</a>
				 	 		 							</li>
				 	 		 							<li>
				 	 		 								<a href="#">Delete</a>
				 	 		 							</li>
				 	 		 						</ul>
				 	 		 					</div>

				 	 		 				</div>
			           					
			    						<div class="col-sm-10">
			    							
			      							<h4>{{ $blog->name }} <small>{{ $blog->created_at }}</small></h4>
			      							<p>{{ $blog->description }}</p>
			      							<br>
			    						</div>
			    					</div>
								</div>
		 	 		 			
		 	 		 		
		              <!-- /.item -->
			 	 		 </div>
			 	 	<!-- /.form-group -->
			 	 	@endforeach
			 	 	</div>



	 	 			   <!--  to inject the data from scroll -->
	                <div id="scroll_data" style="display:none">
						


	                </div>
		                <!-- /.data from scroll -->

			        <!-- /. -->
	               </div>

      
	            </form>


	          <!-- end of box primary -->
         </div>
        


	</div>
</div>

 @endsection

 @section('css')


 @endsection
 
 @section('scripts')
 
  <script type="text/javascript">
  		
  		//author@heinhtet
  			
  		$(document).ready(function() {

  		    		Notification.requestPermission().then(function(result) {
			  new Notification("Hi there!");
			});

       		var i=$("div.form-group>div.note-editor").children('div').eq(5).children().children().children(".modal-body").children("div.form-group").eq(1).remove();
			var j=$("div.form-group>div.note-editor").children('div').eq(5).children().children().children(".modal-footer").remove();
			
			var time=10000;
			var bottom;
			var request;
			var update_data;

			url="{{ url('backend/blog/ajax') }}";
			new_url="{{ url('backend/blog/newpost') }}";
			newpost_url="{{ url('backend/blog/updated') }}";
			registerpost_url="{{ url('backend/blog') }}";

			$(window).scroll(function(){
				var scroll=$(this).scrollTop()+$(this).height()-$(document).height();


				
				if(scroll>=-1)
				{

					 $.post(url,{data:"data",_token:$('input[name=_token]').val()},function(data){
					 							 		
					 		// inject value with html partial template
					 		var template_blog=" ";
					 		
					 		$.each(data,function(key,value){
					 			
					 			template_blog="<hr><div class='form-group scroll-old'> <div class='item'> <div class='row'> <div class='col-sm-2 text-center'> <img src='{{ asset('dist/img/user2-160x160.jpg')}}' class='img-circle' height='65' width='65' alt='Avatar'> </div> 		<div class='col-sm-10'> <h4>"+value.name+" <small>"+value.created_at+"</small> </h4> <p>"+value.description+"</p><br> </div> 	 </div> </div> </div>";
					 			
					 			$("div#scroll_data").append(template_blog).show();
					 			
					 			
					 		});

					 		//for effects
					 		$(".scroll-old").each(function(){
					 			$(this).fadeOut(0).fadeIn('normal',function(){
				 				   $(this).removeClass("scroll-old");
				 				})
					 		});
					 		
				 		// to know the end of the blog						 						 // end of post method
					 },"json");

				}
				
			});

/////////////////////////////////////////////////////////////////////////////////////
			// to prepend the data from the top of the blog every .. minutes or seconds

			 setInterval(function(){

			 	// post request
			 	request=$.post(new_url,{_token:$('input[name=_token]').val()},function(data){
			 					 		
			 		if(data.length>0)
			 		{
			 			update_data=data;

			 			$("div#newpost").fadeIn("slow");
			 		}
			 		

			 	},"json");

			 	

			 }, time);	
///////////////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////////////
			 //newpost button
			$('button#b1').on("click",function()
			{
				request.abort();
       			$.post(newpost_url,{_token:$('input[name=_token]').val()},function(data){
			 		
			 		if(data.length>0)
			 		{			 			
			 			$.each(data,function(key,value)
			 			{
			 				template_blog="<hr><div class='form-group new-item'> <div class='item'> <div class='row'> <div class='col-sm-2 text-center'> <img src='{{ asset('dist/img/user2-160x160.jpg')}}' class='img-circle' height='65' width='65' alt='Avatar'> </div> 		<div class='col-sm-10'> <h4>"+value.user.name+" <small>"+value.created_at+"</small> </h4> <p>"+value.description+"</p><br> </div> 	 </div> </div> </div>";
					 			
					 			$("div#new_data").prepend(template_blog).show();
					 			
					 			//$(".new-item").slideUp(0).slideDown().removeClass("new-item");
			 			});

			 			$(".new-item").each(function(){
					 			$(this).fadeOut(0).fadeIn('normal',function(){
				 				   $(this).removeClass("new-item");
				 				});
					 	});

			 			$("div#newpost").fadeOut("slow");

			 		}			 		

			 	},"json");


       		}); 
//////////////////////////////////////////////////////////////////////////////
			 
			 // close button
       		$("#close").on('click',function()
       		{
       			$("div#newpost").fadeOut("slow");

       		});	
       		
////////////////////////////////////////////////// file upload //////////////////////////////////
       		$("input#file").change(function(){
   				var file=this.files[0];
   				
   				var imagefile = file.type;
   				
   				var match= ["image/jpeg","image/png","image/jpg"];

       			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
				{

				}else {
					var reader = new FileReader();
					reader.onload = imageIsLoaded;
					reader.readAsDataURL(this.files[0]);
				}



       		});

 		function imageIsLoaded(e) {
 			
		$('#previewing').attr('src', e.target.result);
		$('#previewing').attr('width', '95px');
		$('#previewing').attr('height', '95px');
		};
//////////////////////////////////////////////end of file upload form_submit

		$('#form_submit').on('submit',function(e){
			e.preventDefault();
						// {{ url('backend/blog') }}
			$.ajax({
				url:registerpost_url,
				type:"POST",
				data: new FormData(this),
				contentType: false,     // The content type used when sending data to the server.
				cache: false,           // To unable request pages to be cached
				processData:false,	// To send DOMDocument or non processed data file it is set to false
				beforeSend:function()
				{
					
				},
				success:function(data)
				{
					console.log(data);
					$('#summernote').val("");
					$('#previewing').attr('src','');
					$('#previewing').removeAttr('width');
					$('#previewing').removeAttr('height');
				}
			});

			return false;
		});




    	});	



  </script>
  
 @endsection