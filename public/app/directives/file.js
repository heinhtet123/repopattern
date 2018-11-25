app.directive("ngFileModel",['$parse',function($parse){
	return {
		restrict:"A",
		link:function(scope,element,attrs){
			let model=$parse(attrs.ngFileModel);
			let isMultiple = attrs.multiple;
			let modelSetter= model.assign;
			

			element.bind("change",function(){
				
				
				element.parent().parent().children(".previewing").html("");
				
				let values=[];
				angular.forEach(element[0].files,function(item){
					console.log(element[0].files.length);

					let reader = new FileReader();
					reader.onload=function(e){
						
						element.parent().parent().children(".previewing").append("<img src='"+e.target.result+"' width='95px' height='95px'>");
					}
					reader.readAsDataURL(item);


				});


			});

			

		}
	};
	//end of return
}]);