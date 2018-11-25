app.filter('attendencedate',function(){
	return function(items,sub_id){

	var filtered = [];
	if(items!=undefined)
	{
		

		for (var i = 0; i < items.length; i++) {
	      var item = items[i];
	      if(item.role_id==sub_id)
	      {
	      	 filtered.push(item);
	      }

	      if (item.user_id==sub_id) {
	        filtered.push(item);
	      }

    	}

	}
	
    
    return filtered;
	};
});
