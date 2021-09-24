<?php

use App\Mail\ContactMail;

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

Auth::routes();

//	PUBLIC ROUTES FOR WEBSITE
Route::get('/', 'NewsController@cmsView')->name('index');

// DASHBOARD
Route::get('/dashboard', 'ContactController@dashboard')->name('dashboard');
Route::get('/dashboard/sofearun', 'ContactController@dashboardSofeaRun')->name('dashboard-sofearun');
Route::get('/dashboard/noc', 'ContactController@dashboardNoc')->name('dashboard-noc');
Route::get('/dashboard/sales', 'ContactController@dashboardSales')->name('dashboard-sales');
Route::get('/dashboard/product', 'ContactController@dashboardProduct')->name('dashboard-product');


// VIEW CREATE FORM ROUTES
Route::get('/sofearun/feedback/create', 'FormController@sofearunFormCreateView')->name('create-form-sofearun');
Route::get('/noc/feedback/create', 'FormController@nocFormCreateView')->name('create-form-noc');
Route::get('/sales/feedback/create', 'FormController@salesFormCreateView')->name('create-form-sales');
Route::get('/product/feedback/create', 'FormController@productFormCreateView')->name('create-form-product');

// SEND EMAIL LINKS AND CREATE FORM
Route::post('/sofearun/send', 'FormController@sendEmail')->name('send-sofearun');
Route::post('/sales-product/send', 'FormController@sendEmailMultiple')->name('send-multiple');
// Route::post('/noc/send', 'FormController@sendEmailNoc')->name('send-noc');

// FORM VIEW ROUTES
Route::get('/form/sofearun', 'FeedbackController@sofearunForm')->name('sofearun-form-view');
Route::get('/form/noc', 'FeedbackController@nocForm')->name('noc-form-view');
Route::get('/form/sales', 'FeedbackController@salesForm')->name('sales-form-view');
Route::get('/form/product', 'FeedbackController@productForm')->name('product-form-view');

// FORM FILL ROUTES
Route::get('/form/{uniqueId}', 'FeedbackController@sofearunFormId')->name('sofearun-form-fill'); 
Route::post('/sofearun/feedback/send', 'FeedbackController@sofearunFormSubmit')->name('sofearun-form-submit');

// JSON FOR FEEDBACK
Route::post('/json/ticket/check','TicketController@checkTicket');
Route::post('/json/link/create','FormController@getLink');

Route::get('/test', 'FormController@testEmail');

Route::get('/sendreminder','FormController@sendReminder');



// CMS MENU ACTIONS
// Route::post('/cms/upload/slider', 'CmsController@uploadIndexSlider')->name('upload-indexslider');
// Route::post('/cms/upload/video', 'CmsController@uploadIndexVideo')->name('upload-indexvideo');
// Route::post('/cms/upload/news', 'CmsController@uploadNews')->name('upload-news');
// Route::post('/cms/upload/gallery', 'CmsController@uploadGallery')->name('upload-gallery');

// JSON ROUTES
// Route::get('/json/index','ContentController@jsonIndex');
// Route::post('/json/index/update','ContentController@jsonIndexUpdate');
// Route::post('/json/index/delete','ContentController@jsonIndexDelete');
// Route::get('/json/news','ContentController@jsonNews');
// Route::get('/json/gallery','ContentController@jsonGallery');
// Route::get('/get/gallery','ContentController@displayGallery');