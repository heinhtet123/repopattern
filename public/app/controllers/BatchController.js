app.controller("BatchController",function(dataFactory,$scope,$http){

/*enrollment */

$scope.maxSize=3;
$scope.reverse=true;
$scope.indexreverse=true;
$scope.sortname="id";
$scope.currentpage = 1;
$scope.changeoptions = [
    { name: 5, value: 5 }, 
    { name: 10, value: 10 }, 
    { name: 15, value: 15 }];

$scope.itemsperpage=$scope.changeoptions[0].value;


$scope.change=function()
{
  data={perpage:$scope.itemsperpage};
  if($scope.reverse==true && $scope.indexreverse==true)
     {
        $scope.order="desc"; 
     }else
     {
        $scope.order="asc";
     }

      dataFactory.httpRequest(global_url+"batch/indexdata","POST",{page:$scope.currentpage,sort:$scope.order,sortname:$scope.sortname},data).then(function(data){
          $scope.data=data.data;
          $scope.TotalItems=data.total;

          index=($scope.itemsperpage*$scope.currentpage)+1-$scope.itemsperpage;

          angular.forEach($scope.data, function(data){
            data.batchIndex=index;
            index=index+1;


            if(data.enrollment_flag==0)
            {
              data.enrollment_flag=false;
            }else
            {
              data.enrollment_flag=true;
            }
          });

          console.log($scope.data);

      });
      // console.log();
};

$scope.submit=function()
{
  alert(this.search_name);
}

$scope.opencloseenroll=function(id,bool){

  if(bool)
  {
    content=JSON.stringify([{enrollment_flag:1,condition:bool}]);  
  }else
  {
    content=JSON.stringify([{enrollment_flag:0,condition:bool}]);
  }
  
 	data={data:content};
 
      dataFactory.httpRequest(global_url+"batch/closeenroll/"+id,"PUT",{},data).then(function(response){
        
        if(response.success)
        {
            angular.forEach($scope.data,function(data){
                if(data.id==id){
                  data.enrollment_flag=response.condition;
                }
            });
        }
      
      });


 };

/*enrollment*/

/*sorting*/
$scope.sort=function(name){
     sort_url=global_url+"batch/indexdata";
     dataFactory.sorting($scope,name,sort_url);

};
/*sorting*/
$scope.exportcsv=function(){
  var export_data=$scope.data;

   delete export_data[0].$$hashKey;
  dataFactory.downloadCSV(export_data);

};

/*initiate()*/
 (() => {
      data={perpage:$scope.itemsperpage};

      dataFactory.httpRequest(global_url+"batch/indexdata","POST",{page:$scope.currentpage,sort:"desc",sortname:"id"},data).then(function(data){
      		$scope.data=data.data;
          $scope.TotalItems=data.total;

          index=($scope.itemsperpage*$scope.currentpage)+1-$scope.itemsperpage;

          angular.forEach($scope.data, function(data){
            data.batchIndex=index;
            index=index+1;


      			if(data.enrollment_flag==0)
      			{
      				data.enrollment_flag=false;
      			}else
      			{
      				data.enrollment_flag=true;
      			}
      		});

      	
       //   downloadCSV($scope.data);
          // console.log(data_csv);
      });
  })();
// 

   $scope.setPage = function (pageNo) {
    if($scope.sortname==undefined)
    {
      $scope.sortname="id";
      $scope.order="desc";
    }

    $scope.currentpage = pageNo;
    data={perpage:$scope.itemsperpage};

    dataFactory.httpRequest(global_url+"batch/indexdata","POST",{page:$scope.currentpage,sort:$scope.order,sortname:$scope.sortname},data).then(function(data){
        
        index=($scope.itemsperpage*$scope.currentpage)+1-$scope.itemsperpage;

        for (i = 0; i < data.data.length; i++) { 
             data.data[i].batchIndex=index;
             index=index+1;
        }
        $scope.data=data.data;

    });
    // ajax call to page
  };

  
  // function convertjsarraytocsv(args)
  // {
  //    var result, ctr, keys, columnDelimiter, lineDelimiter, data;
        
  //       data = args || null;
  //       if (data == null || data.length==0) {
  //           return null;
  //       }
        
  //       columnDelimiter = args.columnDelimiter || ',';
  //       lineDelimiter = args.lineDelimiter || '\n';

  //       keys = Object.keys(data[0]);
        

  //       result = '';
  //       result += keys.join(columnDelimiter);
  //       result += lineDelimiter;

  //       data.forEach(function(item) {
  //           ctr = 0;
  //           console.log(item);
  //           console.log(keys);
  //           keys.forEach(function(key) {
  //               if (ctr > 0) result += columnDelimiter;

  //               result += item[key];
  //               ctr++;
  //           });
  //           result += lineDelimiter;
  //       });

  //       return result;
  // }


  // function downloadCSV(args) {  
  //       var data, filename, link;
  //       var csv = convertjsarraytocsv(args);
  //       if (csv == null) return;

  //       filename = 'export.csv';

  //       if (!csv.match(/^data:text\/csv/i)) {
  //            csv = 'data:text/csv;charset=utf-8,' + csv;
  //       }
  //       data = encodeURI(csv);
       
  //       link = document.createElement('a');
  //       link.setAttribute('href', data);
  //       link.setAttribute('download', filename);
  //       link.click();
  //   }

});