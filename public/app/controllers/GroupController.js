"use strict";
app.controller("GroupController",GroupController);
function GroupController($scope,dataFactory){
	let gp=this;	
	gp.eachbatch="";
	gp.batchchange=batchchange;
	gp.isDisable=false;

	(function(gp){
		 let data={};
		 dataFactory.httpRequest(global_url+"group/getBatch","POST",{},data).then(function(data){
		 	
		 	gp.batches=data;
		 });


	})(gp);

	function batchchange(batch_id)
	{
		dataFactory.httpRequest(global_url+"group/getGroups","POST",{},{batch_id:batch_id}).then(function(data){
		 		gp.isDisable=true;
		 		gp.groups=data;
		 		
		 });
	}
};


app.controller("GroupRegisterController",GroupRegisterController);

function GroupRegisterController($scope,dataFactory){
	let grp=this;
	
	grp.showtag="";

	grp.data=[
    { "name": "Algeria", "flag": "Algeria.png", "confederation": "CAF", "rank": 21 },
    { "name": "Argentina", "flag": "Argentina.png", "confederation": "CONMEBOL", "rank": 5 },
    { "name": "Australia", "flag": "Australia.png", "confederation": "AFC", "rank": 32 },
    { "name": "Belgium", "flag": "Belgium.png", "confederation": "UEFA", "rank": 11 },
    { "name": "Belgium", "flag": "Belgium.png", "confederation": "UEFA", "rank": 11 },
    { "name": "Belgium", "flag": "Belgium.png", "confederation": "UEFA", "rank": 11 },
    { "name": "Belgium", "flag": "Belgium.png", "confederation": "UEFA", "rank": 11 },
    { "name": "Belgium", "flag": "Belgium.png", "confederation": "UEFA", "rank": 11 },
    { "name": "Belgium", "flag": "Belgium.png", "confederation": "UEFA", "rank": 11 },
    { "name": "Belgium", "flag": "Belgium.png", "confederation": "UEFA", "rank": 11 },
    { "name": "Belgium", "flag": "Belgium.png", "confederation": "UEFA", "rank": 11 },
    { "name": "Belgium", "flag": "Belgium.png", "confederation": "UEFA", "rank": 11 },
    { "name": "Belgium", "flag": "Belgium.png", "confederation": "UEFA", "rank": 11 },
    { "name": "Belgium", "flag": "Belgium.png", "confederation": "UEFA", "rank": 11 },
    { "name": "Belgium", "flag": "Belgium.png", "confederation": "UEFA", "rank": 11 }
	];
	

	grp.taggedRemove=taggedRemove;
	grp.keyup=keyup;

	(function(grp){
			
		
	})(grp);


	function keyup(e)
	{

		
	}

	function taggedRemove(index)
	{
		
		grp.data.splice(index,1);
	}

}