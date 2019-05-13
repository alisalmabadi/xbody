<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    //    Route::resource('task', 'TasksController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes
});
*/

/*Route::get('getcompanies','ApiControllers\CompanyController@index');*/
/*Route::get('company/{id}','ApiControllers\CompanyController@getcompany');*/
/*Route::get('getdepartments/{token}','ApiControllers\DepartmentController@show');
Route::post('conversation','ApiControllers\ConversationController@store');
Route::post('sendmessage','ApiControllers\MessageController@store');
Route::post('readmessage','ApiControllers\MessageController@readmessage');*/

Route::get('GetReserves/token/{token}/Branch/{BranchID}','ApiControllers\ReserveController@index');

Route::get('ReserveDetail/token/{token}/Reserve/{ReserveID}','ApiControllers\ReserveController@show');