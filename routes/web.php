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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/planes', 'PlanesController@index')->name('planes');
Route::get('/planes/pdf',array('as'=>'pdfview','uses'=>'PlanesController@pdfview'));
Route::get('/planes/txt',array('as'=>'txtView','uses'=>'PlanesController@txtview'));
Route::get('/planes/types', 'PlanesController@types')->name('planeTypes');

Route::get('/planes/list', 'PlanesController@list')->name('planesList');
Route::get('/planes/list/seen/{id}', 'PlanesController@seen'); 
Route::get('/planes/list/scrape/{id}', 'PlanesController@scrape'); 


Route::get('/rss', 'RssController@index')->name('rss');;
Route::get('/rss/demo', 'RssController@demo')->name('rssdemo');;


Route::get('/londinium', 'LondiniumController@index')->name('londinium');;
Route::get('/londinium/sites', 'LondiniumController@sites')->name('sites');
Route::get('/londinium/sites/save/{id}', 'LondiniumController@save'); 
Route::get('/londinium/saved', 'LondiniumController@saved')->name('saved');
Route::post('/londinium/search', 'LondiniumController@search')->name('search');
Route::get('/londinium/subcategories', 'LondiniumController@subcategories')->name('subcategories');
Route::get('/londinium/subcategory/{id}', 'LondiniumController@subcategory'); 

Route::get('/jquery', 'JqueryController@index')->name('jquery');;
Route::get('/jquery/SmsMessage', 'JqueryController@jquery_smsMessage')->name('jquery_smsMessage');;
Route::get('/jquery/TogglePanels', 'JqueryController@jquery_togglePanels')->name('jquery_togglePanels');;
Route::get('/jquery/EmailRecipients', 'JqueryController@jquery_emailRecipients')->name('jquery_emailRecipients');;


//twitter
Route::get('/userTimeline', function()
{
	$tweets = Twitter::getUserTimeline(['screen_name' => 'andylondon', 'count' => 20, 'format' => 'array']);
	echo ("<pre>");
	var_dump($tweets);
});