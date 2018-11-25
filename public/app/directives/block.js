"use strict";
app.directive('filterblock',function($parse){
	 return {
	 		link: function (scope, elm, attrs) {
         	
         	let number=scope.enrolled_students_items.fees-scope.enrolled_students_items.student_bill;
	          elm.bind('keypress', function(e){
	          

	            if(elm[0].value.length > scope.limit_letter){
	              e.preventDefault();
	           	  elm.parent().children("span#toolong").removeClass("ng-hide");	
	           	  elm.parent().children("span#exceed").addClass('ng-hide');
	              return false;
            	}else if(elm[0].value>number)
            	{
            	  elm.parent().children("span#toolong").addClass('ng-hide');
	           	  elm.parent().children("span#exceed").removeClass("ng-hide");
	           	  
	           	  return false;
            	}
            
          });

	      elm.bind('keyup',function(e){
	      		// keyCode 8 is backspace and keycode 46 is delete
        		if(e.keyCode==8 || e.keyCode==46)
        		{
        		
        		elm.parent().children("span").addClass('ng-hide');	

        		}
        		

        		if(elm[0].value>number)
            	{
            	  scope.checked=true;
            	  e.preventDefault();
	           	  elm.parent().children("span#exceed").removeClass("ng-hide");	
	           	  
	           	  return false;
            	}

            	

            	
	      });    

	       
        }
	 };
});