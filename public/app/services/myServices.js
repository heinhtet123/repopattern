app.factory('dataFactory',function($http){
	var myService= {
		
		httpRequest:function (url,method,params,dataPost,upload){
		var passParameters={};
		passParameters.url=url;
		passParameters.headers={'Content-Type': "application/json"};
		passParameters.headers={"X-Requested-With":"XMLHttpRequest"};

		  if (typeof method == 'undefined'){
	        passParameters.method = 'GET';
	      }else{
	        passParameters.method = method;
	      }

	      if (typeof params != 'undefined'){
	        passParameters.params = params;
	      }

	      if (typeof dataPost != 'undefined'){
	        passParameters.data = dataPost;
	      }

	      if (typeof upload != 'undefined'){
	         passParameters.upload = upload;
	      }

	      var promise=$http(passParameters).then(function(data){
	      	return data.data;
	      }).catch(function(){
	      	alert("Make sure you run the localhost:8000");
	      });

		  return promise;
	  },
	  sorting:function(scope,name,sort_url)
	  {
	  	data={perpage:scope.itemsperpage};
     	scope.sortname=name;     

	    if(name=="batch_name")
	    {
	       scope.reverse=!scope.reverse;
	    }else if(name=="id"){
	       scope.indexreverse=!scope.indexreverse;
	    }
      
	    if(scope.reverse==true && scope.indexreverse==true)
	    {
	      scope.order="desc"; 
	    }else
	    {
	       scope.order="asc";
	    }

     this.httpRequest(sort_url,"POST",{page:scope.currentpage,sort:scope.order,sortname:scope.sortname},data).then(function(data){
          index=(scope.itemsperpage*scope.currentpage)+1-scope.itemsperpage;

          for (i = 0; i < data.data.length; i++) { 
               data.data[i].batchIndex=index;
               index=index+1;
          }

          scope.data=data.data;
     });
     	// end of sorting
	  },
	  changing:function()
	  {
	  	alert("da hello like a somebody");
	  },

	  convertjsarraytocsv:function(args)
	  {
	  	var result, ctr, keys, columnDelimiter, lineDelimiter, data;
        
        data = args || null;
        if (data == null || data.length==0) {
            return null;
        }
        
        columnDelimiter = args.columnDelimiter || ',';
        lineDelimiter = args.lineDelimiter || '\n';

        keys = Object.keys(data[0]);
        

        result = '';
        result += keys.join(columnDelimiter);
        result += lineDelimiter;

        data.forEach(function(item) {
            ctr = 0;
          
            keys.forEach(function(key) {
                if (ctr > 0) result += columnDelimiter;

                result += item[key];
                ctr++;
            });
            result += lineDelimiter;
        });

        return result;
	  },
	  
	  downloadCSV:function(args){
	  	var data, filename, link;
        var csv = this.convertjsarraytocsv(args);
        if (csv == null) return;

        filename = 'export.csv';
        var blob=new Blob([csv],{
        "type": "text/csv;charset=utf8;"
    	});

        
        link = document.createElement('a');
        
        link.setAttribute('href', window.URL.createObjectURL(blob));
        link.setAttribute('download', filename);
        //link.setAttribute("target","_blank");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        
	  }
	
	};

	return myService;
});