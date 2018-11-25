<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//user login ,logout,students register,

Route::get('/','Auth\AuthController@getlogin');
Route::post('/','Auth\AuthController@postlogin');
Route::get('auth/login','Auth\AuthController@getlogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


Route::group(['prefix'=>'backend','middleware'=> ['auth',"permission"] ], function () {
	// GET
	Route::get('/', ['as' => 'backend.index', 'uses' => 'Backend\BackendController@index']);

	Route::resource('blog','Backend\BlogsController');
	Route::resource('course','Backend\CoursesController');
	Route::resource('batch',"Backend\BatchController");
	Route::resource('student', 'Backend\StudentsController');
	Route::resource('enrolledstudent', 'Backend\EnrolledStudentsController');
	Route::resource('attendence', 'Backend\AttendenceController');
	Route::resource("group","Backend\GroupsController");
	
	//PUT 
	 Route::put("batch/closeenroll/{id}",["as"=>"backend.batch.closeenroll","uses"=>"Backend\BatchController@closeenroll"]);
	 Route::put("roles/changeMethodPermission/{id}",["as"=>"backend.roles.changeMethodPermission","uses"=>"Backend\RolesPermissionController@changeMethodPermission"]);

	 // 
	 Route::get("roles",["as"=>"backend.roles.index","uses"=>"Backend\RolesPermissionController@index"]);

	 
	// POST
	Route::post('batch/indexdata',['as'=>"backend.batch.indexdata","uses"=>"Backend\BatchController@indexdata"]);
	Route::post('blog/ajax','Backend\BlogsController@listing_access');
	Route::post('blog/newpost','Backend\BlogsController@listing_newpost');
	Route::post('blog/updated','Backend\BlogsController@update_newpost');
	Route::post('course/select/{id}',['as' => 'backend.course.select','uses'=>'Backend\CoursesController@select']);

	Route::post('enrolledstudent/indexdata',['as'=>'backend.enrolledstudent.index',"uses"=>"Backend\EnrolledStudentsController@indexdata"]);
	Route::post('enrolledstudent/batch',['as'=>'backend.enrolledstudent.batch',"uses"=>"Backend\EnrolledStudentsController@batch"]);
	Route::post('enrolledstudent/courses',['as'=>'backend.enrolledstudent.courses',"uses"=>"Backend\EnrolledStudentsController@courses"]);
	Route::post('enrolledstudent/allbatches',['as'=>'backend.enrolledstudent.allbatches',"uses"=>"Backend\EnrolledStudentsController@allbatches"]);

	Route::post('enrolledstudent/updatepayment',['as'=>'backend.enrolledstudent.updatepayment',"uses"=>"Backend\EnrolledStudentsController@updatepayment"]);

	Route::post('attendence/indexdata',['as'=>'backend.attendence.indexdata',"uses"=>"Backend\AttendenceController@indexdata"]);
	Route::post('attendence/month',['as'=>"backend.attendence.month","uses"=>"Backend\AttendenceController@month"]);
	Route::post('attendence/timetable_date',['as'=>"backend.attendence.timetable_date","uses"=>"Backend\AttendenceController@timetable_date"]);
	Route::post('attendence/userdata',['as'=>"backend.attendence.userdata","uses"=>"Backend\AttendenceController@userdata"]);

	Route::post('roles/indexdata',["as"=>"backend.roles.indexdata","uses"=>"Backend\RolesPermissionController@indexdata"]);

	Route::post('roles/getMethods',["as"=>"backend.roles.getMethods","uses"=>"Backend\RolesPermissionController@getMethods"]);

	Route::post('roles/getMethodsPermission',["as"=>"backend.roles.getMethodsPermission","uses"=>"Backend\RolesPermissionController@getMethodsPermission"]);
	
	Route::post('roles/getRoles',["as"=>"backend.roles.getRoles","uses"=>"Backend\RolesPermissionController@getRoles"]);

	Route::post("group/getBatch",["as"=>"backend.group.getBatch","uses"=>"Backend\GroupsController@getBatch"]);
	
	Route::post("group/getGroups",["as"=>"backend.group.getGroups","uses"=>"Backend\GroupsController@getGroups"]);
	
	Route::post("group/getStudents",["as"=>"backend.group.getStudents","uses"=>"Backend\GroupsController@getStudents"]);
	

});

// apis

$api = app('Dingo\Api\Routing\Router');

$api->version('v1',["middleware" => 'api.throttle','limit' => 10,'expires' => 2000], function ($api) {

	
	// users route
	$api->group(["prefix"=>"users"], function ($api) {
       $api->get('/', ["uses"=>'App\Api\V1\Controllers\UserController@index']);

       $api->get('/search', ["uses"=>'App\Api\V1\Controllers\UserController@search']);

       $api->get('/{id}', ["uses"=>'App\Api\V1\Controllers\UserController@show']);

    });



	$api->group(["prefix"=>"batches"], function ($api) {
       

       
    });
	

	// $api->delete("users/",[]);
});


// $api->version('v2', function ($api) {
	
// 	$api->get('user', ["middleware" => 'api.throttle','limit' => 5,'expires' => 5,"as"=>"user.index","uses"=>'App\Api\V1\Controllers\UserController@index']);
// });