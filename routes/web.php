<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>'guest'],function(){
	Route::get('/', function () {
    	return view('auth/login');
	});
});

Auth::routes();

Route::group(['middleware'=>'auth'],function(){

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/employee', 'EmployeeController@index');
	Route::post('/employee', 'EmployeeController@store');
	Route::post('/employee/import', 'EmployeeController@importEmployee');
	Route::get('/employee/{employee}/edit', 'EmployeeController@edit');
	Route::put('/employee/{employee}', 'EmployeeController@update');
	Route::get('/employee/remove', 'EmployeeController@removeEmployee');
	Route::get('/employee/list', 'EmployeeController@list');
	//Route::get('/employee/export', 'EmployeeController@export');
	// RECORD CONTROLLER
	Route::post('/record','RecordController@store');
	Route::get('/record/{employee}','RecordController@show');
	Route::get('/record/lawop/{employee}','RecordController@lawop');
	Route::put('/record/{record}','RecordController@update');
	Route::get('/record/remove/one', 'RecordController@removeRecord');
	Route::get('/record/{record}/edit','RecordController@edit');
	Route::get('/record/list/{id}','RecordController@list');
	Route::get('/record/lawopList/{employee}','RecordController@lawopList');
	Route::get('/record/last/{id}','RecordController@lastRecord');
	Route::post('/record/xlsx/import','RecordController@csv_employees');
	// Route::post('/record/autocomplete','RecordController@autocomplete_natureActivity');
	//PRINT CONTROLLER
	Route::get('/print/record/{id}','PrintController@printRecord');
	Route::get('/print/certificate/{id}','PrintController@printCertificate');
	Route::get('/print/cert/{id}','PrintController@downloadWord');
	Route::get('/print/selected/{employee}','PrintController@printSelected');
	//EXPORT EXCEL
	Route::get('/export/{employee}','ExportFileController@xslx_export');
	Route::get('/export/csv/employees','ExportFileController@csv_employees');
	Route::get('/export/csv/records','ExportFileController@csv_records');
	Route::get('/export/database/backup_database', 'ExportFileController@backup_database');
	Route::get('/export/database/db',function(){
		return Artisan::call('backup:run --only-db');
	});
	//IMPORT CSV FILE
	// Route::post('/import/csv/records','ImportFileController@csv_employees');

	// Route::get('/home',function(){
	// 	return view('home');
	// });
});

