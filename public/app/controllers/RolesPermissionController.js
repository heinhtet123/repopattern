"use strict";

app.controller("RolesPermissionController",RolesPermissionController);


function RolesPermissionController($scope,dataFactory,$timeout)
{
	let rp=this;
	rp.showRoles=false;
	// functions
	rp.controllerchange=HasControllerChanged;
	rp.methodschange=MethodChanged;
	

	// initial
	(function(rp){
		 
		let data={controller:"course"};

		dataFactory.httpRequest(global_url+"roles/indexdata","POST",data).then(function(data){
			rp.controllers=data;
		}).catch(reason);



	})(rp);




	function reason(reason){
	console.log(reason);
	}

	function MethodChanged(id,status){
	
		
		let data={status:status};

		dataFactory.httpRequest(global_url+"roles/changeMethodPermission/"+id,"PUT",data,{}).then(function(data){
			console.log(data);
		}).catch(reason);

	}


	function HasControllerChanged(value){

		let data={controller:value};
		console.log(data);
		dataFactory.httpRequest(global_url+"roles/getMethods","POST",data).then(function(data){
			rp.methods=data;
			rp.showRoles=true;
		}).catch(reason);

		dataFactory.httpRequest(global_url+"roles/getRoles","POST",{}).then(function(data){
			rp.roles=data;

		}).catch(reason);

		$timeout(function() {
			dataFactory.httpRequest(global_url+"roles/getMethodsPermission","POST",data).then(function(data){
				rp.methodspermission=data;
			}).catch(reason);	
		}, 900);

		
	};


	
}

