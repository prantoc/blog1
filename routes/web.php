<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'page'], function () {

	Route::get('{slug}', 'HomeController@getSinglePage')->name('single-page');
	// Route::get('{slug}', 'HomeController@getSinglePageImg')->name('single-page');

});
Route::group(['prefix' => 'pageimg'], function () {

Route::get('{slug}', 'HomeController@getSinglePageImg')->name('single-page-img');

});

Route::get('team-page', 'HomeController@getTeam')->name('team-page');
Route::get('client-page', 'HomeController@getClient')->name('clients');
Route::get('contact-page', 'HomeController@getContact')->name('contact');
Route::get('work-page', 'HomeController@getWork')->name('work');

Route::group(['prefix' => 'pagecareer'], function () {

	Route::get('{slug}', 'HomeController@getCareer')->name('career');
	Route::get('add-apply', 'HomeController@addApply')->name('add-apply');
	Route::post('post-apply', 'HomeController@postApply')->name('post-apply');

});






Route::group(['prefix' => 'admin'], function () {

Auth::routes();

Route::get('/', 'BackendController@dashboardHome')->name('dashboardHome');
// pages routes
Route::get('add-page', 'BackendController@addPage')->name('add-page');
Route::post('post-page', 'BackendController@postPage')->name('post-page');
Route::get('all-pages', 'BackendController@allPages')->name('all-pages');
Route::get('edit-page/{id}', 'BackendController@editPage')->name('edit-page');
Route::post('edit-page/{id}', 'BackendController@updatePage')->name('update-page');
Route::get('delete-page/{id}', 'BackendController@deletePage')->name('delete-page');

// principle routes
Route::get('add-principle', 'BackendController@addPrinciple')->name('add-principle');
Route::post('post-principle', 'BackendController@postPrinciple')->name('post-principle');
Route::get('all-principle', 'BackendController@allPrinciple')->name('all-principle');
Route::get('edit-principle/{id}', 'BackendController@editPrinciple')->name('edit-principle');
Route::post('edit-principle/{id}', 'BackendController@updatePrinciple')->name('update-principle');
Route::get('delete-principle/{id}', 'BackendController@deletePrinciple')->name('delete-principle');


// team routes
Route::get('add-team', 'BackendController@addTeam')->name('add-team');
Route::post('post-team', 'BackendController@postTeam')->name('post-team');
Route::get('all-team', 'BackendController@allTeam')->name('all-teams');
Route::get('edit-team/{id}', 'BackendController@editTeam')->name('edit-team');
Route::post('edit-team/{id}', 'BackendController@updateTeam')->name('update-team');
Route::get('delete-team/{id}', 'BackendController@deleteTeam')->name('delete-team');

// clints routes
Route::get('add-client', 'BackendController@addClient')->name('add-client');
Route::post('post-client', 'BackendController@postClient')->name('post-client');
Route::get('all-clients', 'BackendController@allClient')->name('all-clients');
Route::get('edit-client/{id}', 'BackendController@editClient')->name('edit-client');
Route::post('edit-client/{id}', 'BackendController@updateClient')->name('update-client');
Route::get('delete-client/{id}', 'BackendController@deleteClient')->name('delete-client');



// Career routes
Route::get('add-career', 'BackendController@addCareer')->name('add-career');
Route::post('post-career', 'BackendController@postCareer')->name('post-career');
Route::get('all-careers', 'BackendController@allCareers')->name('all-careers');
Route::get('edit-career/{id}', 'BackendController@editCareer')->name('edit-career');
Route::post('edit-career/{id}', 'BackendController@updateCareer')->name('update-career');
Route::get('delete-career/{id}', 'BackendController@deleteCareer')->name('delete-career');

Route::get('all-appliers', 'BackendController@allAppliers')->name('all-appliers');
Route::get('delete-applier/{id}', 'BackendController@deleteApplier')->name('delete-applier');







// work routes
Route::get('add-work', 'BackendController@addWork')->name('add-work');
Route::post('post-work', 'BackendController@postWork')->name('post-work');
Route::get('all-works', 'BackendController@allWorks')->name('all-works');
Route::get('edit-work/{id}', 'BackendController@editWork')->name('edit-work');
Route::post('edit-work/{id}', 'BackendController@updateWork')->name('update-work');
Route::get('delete-work/{id}', 'BackendController@deleteWork')->name('delete-work');

// work img text routes
Route::get('add-workfile', 'BackendController@addWorkFile')->name('add-workfile');
Route::post('post-workfile', 'BackendController@postWorkFile')->name('post-workfile');
Route::get('all-workfiles', 'BackendController@allWorkFiles')->name('all-workfiles');
Route::get('edit-workfile/{id}', 'BackendController@editWorkFile')->name('edit-workfile');
Route::post('edit-workfile/{id}', 'BackendController@updateWorkFile')->name('update-workfile');
Route::get('delete-workfile/{id}', 'BackendController@deleteWorkFile')->name('delete-workfile');




//Slider Routes
// Route::get('settings', 'BackendController@getSettings')->name('settings');
// Route::post('settings', 'BackendController@updateSettings')->name('update-settings');
Route::get('slider', 'BackendController@getSlider')->name('slider');
Route::post('slider', 'BackendController@addSlider')->name('add-slider');
Route::post('slider/{id}', 'BackendController@updateSlider')->name('update-slider');
Route::get('delete-slider/{id}', 'BackendController@deleteSlider')->name('delete-slider');


});
