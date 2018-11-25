// EnrolledStudentsController.js

"use strict";
app.controller("EnrolledStudentsController",EnrolledStudentsController).controller("ModalInstanceCtrl",ModalInstanceCtrl);



function ModalInstanceCtrl($scope,$uibModalInstance, items){
  let $ctrl = this;

  $ctrl.items = items;
  $scope.checked=true;
  $scope.limit_letter=6;
  $scope.enrolled_students_items=items;
  $ctrl.selected = {
    item: $ctrl.items
  };


  $scope.$watch('feestopay', function (newValue, oldValue, scope) {
    //Do anything with $scope.letters
   

    if(newValue==undefined || (""+newValue).length>$scope.limit_letter || newValue>items.fees-items.student_bill){
    	 $scope.checked=true;
    }else
    {
    	$scope.checked=false;
    }
  });

  $ctrl.ok = function () {
  	  		
  	if(typeof $scope.feestopay !== "undefined")
  	{
  		$ctrl.selected.item.student_bill+=$scope.feestopay;
 		$uibModalInstance.close($ctrl.selected.item); 		
  	}
 
  };

  $ctrl.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };
}

function EnrolledStudentsController(dataFactory,$scope,$http,$log,$uibModal){
	let es=this;
	let something;
	es.isDisable=true;
	es.items = ['item1', 'item2', 'item3'];
	
	es.changeoptions = [ 
    { name: 5, value: 5 }, 
    { name: 10, value: 10 }, 
    { name: 15, value: 15 }];
  	
    es.paymentoptions=[
    {name:1,value:"Partial Paid"},
    {name:2,value:"Paid"}];

    es.itemsperpage=es.changeoptions[0].value;
    let data={perpage:es.itemsperpage};
   	



    //paymentchange
    es.paymentchange=function(status,data){
    	let paydata;
    	
    	es.allbatches.forEach((value,key)=>{
    			
    			if(typeof value === 'object' && value.id==data.batch_id){
    				data.fees=value.fees;
            data.start_month=value.start_month;
            data.end_month=value.end_month;
            data.type=value.type;
    			}
    			
    	});


    	if(status==1){
    		
    		
    		 let modalInstance = $uibModal.open({
		      animation: es.animationsEnabled,
		      ariaLabelledBy: 'modal-title',
		      ariaDescribedBy: 'modal-body',
		      templateUrl: 'myModalContent.html',
		      controller: 'ModalInstanceCtrl',
		      controllerAs: '$ctrl',
		      size: 1,
		      resolve: {
		      items: function () {
		          return data;
		        }
		      } });

    		modalInstance.result.then(function (selectedItem) {


    		  
		      es.selected = selectedItem;
		      es.selected.updatestatus=1;
			    es.selected.undo=false;

		      dataFactory.httpRequest(global_url+"enrolledstudent/updatepayment","POST",{},es.selected).then(function(data){
		     	 if(selectedItem.student_bill==selectedItem.fees)
				  {
				  	selectedItem.status=2;
				  	selectedItem.enrolledstudents_id=2;
				  	selectedItem.disable=true;
				  	selectedItem.undo=false;
				  }else{
				  		selectedItem.status=1;
				  		selectedItem.undo=false;
				  }
		      
		      });

		    }, function () {
			      $log.info('Modal dismissed at: ' + new Date());
		    });

    	}else if(status==2){
        
    		data.student_bill=data.fees;
    		data.status=2;
    		data.disable=true;
    		data.undo=false;
       
       
    		dataFactory.httpRequest(global_url+"enrolledstudent/updatepayment","POST",{},data).then(function(data){
		     
		    });
    	}

    }


    es.undo=function(student_value){
    	student_value.undo=true;
    	dataFactory.httpRequest(global_url+"enrolledstudent/updatepayment","POST",{},student_value).then(function(data){
			
			es.enrolleddata.forEach((value,key)=>{
    			
				if(student_value.id ==value.id && student_value.batch_id==value.batch_id)
				{
				  	value.enrolledstudents_id=0;
				  	value.student_bill=0;
				  	value.status=0;
				  	value.disable=false;
				}

  
    		});
		});
    }


    es.batchchange=function(value){
    	 let data={perpage:es.itemsperpage,batch_id:value};
    	 dataFactory.httpRequest(global_url+"enrolledstudent/indexdata","POST",{page:1,sort:"desc",sortname:"id"},data).then(function(data){
			es.enrolleddata=data.data;
			es.enrolleddata.forEach((value,key)=>{
				if(value.status==2)
				{
					value.disable=true;
				}
			});
		});
    }

    es.coursechange=function(value){
    	let batch_data={batchid:value};
    	dataFactory.httpRequest(global_url+"enrolledstudent/allbatches","POST",{},batch_data).then(function(data){
			es.isDisable=false;		
			es.allbatches=data;
			
		});


    };

    //
    es.change=function(){
    	data={perpage:es.itemsperpage};
    	
		
    	dataFactory.httpRequest(global_url+"enrolledstudent/indexdata","POST",{page:1,sort:"desc",sortname:"id"},data).then(function(data){
			es.enrolleddata=data.data;

			
		});
    };

    

	(function(itemsperpage,es,data){
	
	
		// dataFactory.httpRequest(global_url+"enrolledstudent/batch","POST",{},batch_data).then(function(data){
			
		// 	es.batch=data;
			
		// });

		dataFactory.httpRequest(global_url+"enrolledstudent/courses","POST",{}).then(function(data){
			es.course=data;

		});

	})(this.itemsperpage,es,data);

	

 }
