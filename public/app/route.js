'use strict';
var app= angular.module('students-App',['ngRoute','ui.bootstrap']);

app.config(['$routeProvider',function($routeProvider){
	$routeProvider.
	when('/batches',{
	// templateUrl:'templates/items.html',
	controller:'BatchController'
	});

}]);