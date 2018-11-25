"use strict";
app.directive("autocomplete",['dataFactory',function(dataFactory){
	return{
		restrict:"E",
		transclude: true,
		replace:true,
		templateUrl:"../../../app/html/autocomplete.html",
		scope:{data:"=","action":"&onClose","key":"&onKey",tag:"="},
		link:function(scope,element,attrs){
			
			console.log(scope.tag);
			

			// let input=element.children("#tagging").children("div.tag-editor").children("div.form-group").children("input");
			// input.bind("keyup",function(event){
			// 	let hello=$(this).val();

			// 	if(hello.length>0)
			// 	{
			// 		dataFactory.httpRequest(global_url+"group/getStudents","POST",{},{batch_id:1,tag:hello}).then(function(data){
			// 		 		console.log(data);
			// 		 		element.children("#scroll_list").removeAttr("style");
			// 		});

					


			// 		// element.parent().parent().parent().parent().parent().children("#scroll_list").removeAttr("style");

			// 	// 	dataFactory.httpRequest(global_url+"group/getGroups","POST",{},{batch_id:1}).then(function(data){
		 // 	// 			console.log(data);
			// 	//  	});


			// 	}else
			// 	{
			// 		element.children("#scroll_list").attr("style","display:none");
			// 	// 	element.parent().parent().parent().parent().parent().children("#scroll_list").attr("style","display:none");
			// 	}

			// });

		}

	// end of return
	};
}]);