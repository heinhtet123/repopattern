app.directive('loading',['$http',function($http,$document){
	var directive={};

	directive.restrict='E'; 

	directive.compile = function(element, attributes) {
      element.css("border", "1px solid #cccccc");
      
      //linkFunction is linked with each element with scope to get the element specific data.
      var linkFunction = function($scope, element, attributes) {
         $scope.isLoading = function () {
                return $http.pendingRequests.length > 0;
         };
         
         $scope.$watch($scope.isLoading, function (v)
         {
                   if(v){
                        element.show();
                    }else{
                        element.hide();
                    }
         });
         /*var body_elem=element.parent().parent().parent().parent().parent().parent().parent()
         body_elem.css("background-color", "#ff00ff");*/

        
         element.css("display", "none");
         element.css("position", "absolute");
         element.css("z-index", "1000");
         element.css("top","0");
         element.css("left","0");
         element.css("height","100%");
         element.css("width","100%");
         element.css("background","url('http://localhost/studentsportal/public/app/directives/l.gif') 50% 50%  no-repeat");
         element.css("border","none");

        

      }
      return linkFunction;
   }

   return directive;
  
}]);