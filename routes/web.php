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
Route::get('/planes/pdf', array('as'=>'pdfview','uses'=>'PlanesController@pdfview'));
Route::get('/planes/txt', array('as'=>'txtView','uses'=>'PlanesController@txtview'));
Route::get('/planes/types', 'PlanesController@types')->name('planeTypes');
Route::get('/planes/type/{type}', 'PlanesController@type')->name('planeType');
Route::get('/planes/type/job/{type}', 'PlanesController@typePhotoJob');
Route::get('/planes/countries', 'PlanesController@countries')->name('planeCountries');
Route::get('/planes/country/{country}', 'PlanesController@country')->name('planeCountry');
Route::get('/planes/country/job/{countryCode}', 'PlanesController@countryPhotoJob');
Route::get('/planes/list', 'PlanesController@planesList')->name('planesList');
// Route::get('/planes/list/seen/{id}', 'PlanesController@seen');
// Route::get('/planes/list/scrape/{id}', 'PlanesController@scrape');
Route::post('/planes/ajax/', 'PlanesController@ajax');
Route::get('/planes/details/{id}', 'PlanesController@details');
Route::post('/planes/search/', 'PlanesController@search')->name('aircraftSearch');
Route::get('/planes/todo', 'PlanesController@todo')->name('planesTodo');
Route::get('/planes/help', 'PlanesController@help')->name('planesHelp');

// planesApi
Route::get('/planesApi', 'PlanesApiController@index')->name('planesApi');
Route::get('/planesApi/getTypes', 'PlanesApiController@getTypes')->name('planesApiGetTypes');

Route::get('/rss', 'RssController@index')->name('rss');
Route::get('/rss/jobs', 'RssController@jobs')->name('rssJobs');
Route::get('/rss/news', 'RssController@news')->name('rssNews');


Route::get('/londinium', 'LondiniumController@index')->name('londinium');
Route::get('/londinium/sites', 'LondiniumController@sites')->name('sites');
Route::get('/londinium/sites/save/{id}', 'LondiniumController@save');
Route::get('/londinium/sites/unsave/{id}', 'LondiniumController@unsave');

Route::get('/londinium/site/{id}', 'LondiniumController@site')->name('site');
Route::post('/londinium/siteEditUrl/{id}', 'LondiniumController@siteEditUrl');

Route::get('/londinium/saved', 'LondiniumController@saved')->name('saved');
Route::post('/londinium/search', 'LondiniumController@search')->name('search');
Route::get('/londinium/subcategories', 'LondiniumController@subcategories')->name('subcategories');
Route::get('/londinium/subcategory/{id}', 'LondiniumController@subcategory');
Route::get('/londinium/sitesBySubcategory', 'LondiniumController@sitesBySubcategory')->name('sitesBySubcategory');
Route::get('/londinium/outputHtml', 'LondiniumController@outputHtml')->name('outputHtml');
Route::get('/londinium/screenshot/{id}', 'LondiniumController@screenshot')->name('screenshot');
Route::get('/londinium/spider', 'LondiniumController@spider')->name('spider');

Route::get('/londinium/errors', 'LondiniumController@londiniumErrors')->name('londiniumErrors');



Route::get('/jquery', 'JqueryController@index')->name('jquery');
Route::get('/jquery/SmsMessage', 'JqueryController@jquery_smsMessage')->name('jquery_smsMessage');
Route::get('/jquery/TogglePanels', 'JqueryController@jquery_togglePanels')->name('jquery_togglePanels');
Route::get('/jquery/EmailRecipients', 'JqueryController@jquery_emailRecipients')->name('jquery_emailRecipients');

Route::get('/vue', 'VueController@index')->name('vue');
Route::get('/vueAjax', 'VueController@ajax')->name('vueAjax');
Route::get('/vuePlanesTypes', 'VueController@planesTypes')->name('vuePlanesTypes');
Route::get('/vuePlanesTypesAxios', 'VueController@planesTypesAxios')->name('vuePlanesTypesAxios');

Route::get('manage-vue', 'VueItemController@manageVue');
Route::resource('vueitems', 'VueItemController');


//twitter
Route::get('/userTimeline', function () {
    $tweets = Twitter::getUserTimeline(['screen_name' => 'londiniumcom', 'count' => 10, 'format' => 'array']);
    echo("<pre>");
    var_dump($tweets);
});
