"use strict";

app.controller("AttendenceController",AttendenceController);

function AttendenceController($scope,dataFactory){
	let at=this;
	at.isDisable=true;
	at.monthDisable=true;
	at.changeoptions = [ 
    { name: 5, value: 5 }, 
    { name: 10, value: 10 }, 
    { name: 15, value: 15 }];
    at.itemsperpage=at.changeoptions[0].value;
	
	// course filter event
	at.coursechange=function(value)
	{
		let batch_data={batchid:value};
    	dataFactory.httpRequest(global_url+"enrolledstudent/allbatches","POST",{},batch_data).then(function(data){
			at.isDisable=false;
			at.monthDisable=true;	
			at.allbatches=data;
		});
	}

	// batch filter event
	at.batchchange=function(value)
	{
		if(value!=null)
		{
			let data={batch_id:value};
			dataFactory.httpRequest(global_url+"attendence/month","POST",{},data).then(function(data){
				at.allmonths=data;
				console.log(data);
				at.monthDisable=false;
			}).catch(reason);	

		}
		 
	}

	// month filter event
	at.monthchange=function(month){
		let data={batch_id:at.eachbatch,month:month};
		console.log(data);
		dataFactory.httpRequest(global_url+"attendence/indexdata","POST",{},data).then(function(data){
			at.indexdata=data;
			console.log(data);
		}).catch(reason);

		
		dataFactory.httpRequest(global_url+"attendence/userdata","POST",{},data).then(function(data){
			at.usersdata=data.data;
		}).catch(reason);

		dataFactory.httpRequest(global_url+"attendence/timetable_date","POST",{},data).then(function(data){
			at.unidate=data;
		}).catch(reason);


	}

	// each check box event
	at.onChangeattendence=function(id){
		let data={checked:at.attendence_ids[id]};
		dataFactory.httpRequest(global_url+"attendence/update","PUT",{id},data).then(function(data){
			console.log(data);
		});

		// console.log(id);
		// console.log(at.attendence_ids[id]);
	}

	$scope.$watch('at.attendence_ids', function (newValue, oldValue, scope) {
    //Do anything with $scope.letters
	});



	// initial
	(function(at){
		 // first parameter is url, second param is method , 
		 //third param is paremeter , fourth parameter is data that would like to send via post , put or patch  
		let data={};
		

		dataFactory.httpRequest(global_url+"enrolledstudent/courses","POST",{}).then(function(data){
			at.course=data;

		}).catch(reason);
	})(at);



}

function reason(reason){
	console.log(reason);
}