<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test/', function () {
    return "Testing...";
});

//params
Route::get('/item/{id}', function ($id) {
    return "Item ID->".$id;
});

//naming
Route::get('/dashboard', array('as'=>'admin.area', function () {
	$url = route('admin.area');
    return "Dashboard available".$url;
}));



// =============================================================================
// ROUTES
// =============================================================================
Route::get('/singup/{name}/{email}/{password}', 'TestController@addUser')->middleware('cors');
Route::get('/login/{email}/{password}', 'TestController@getUser')->middleware('cors');
Route::get('/setride/{email}/{start}/{end}/{date}/{time}/{seats}/{collaboration}/{notes}', 'TestController@addRide')->middleware('cors');
Route::get('/getride/{email}', 'TestController@getRide')->middleware('cors');
Route::get('/deleteride/{email}', 'TestController@deleteRide')->middleware('cors');
Route::get('/deleteridepassengers/{idride}', 'TestController@deleteRidePassengers')->middleware('cors');
Route::get('/findride/{start}/{useremail}', 'TestController@findRide')->middleware('cors');
Route::get('/getridepassenger/{idUser}', 'TestController@getRidePassenger')->middleware('cors');
Route::get('/joinride/{idRide}/{idPassanger}', 'TestController@joinRide')->middleware('cors');
Route::get('/restseat/{idRide}', 'TestController@restSeats')->middleware('cors');
Route::get('/sumseat/{idRide}', 'TestController@sumSeats')->middleware('cors');
Route::get('/showridepassenger/{idRide}', 'TestController@showRidePassenger')->middleware('cors');
Route::get('/getdrivername/{driveremail}', 'TestController@getDriverName')->middleware('cors');
Route::get('/exitride/{idpassenger}', 'TestController@exitRide')->middleware('cors');
Route::get('/getlistpassengers/{idride}', 'TestController@getListPassengers')->middleware('cors');

