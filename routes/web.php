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
//login-custom
Route::post('/nailogin','CustomLoginController@nailogin')->name('nailogin');
Route::get('/dashboard','DashboardController@index')->name('dashboard');
Route::get('/compliant','DashboardController@compliant')->name('compliant');
Route::get('/noncompliant','DashboardController@noncompliant')->name('noncompliant');
Route::get('/clamped','DashboardController@clamped')->name('clamped');
Route::get('/tounclamp','DashboardController@tounclamp')->name('tounclamp');
Route::get('/unclamped','DashboardController@unclamped')->name('unclamped');
//Seasonal
Route::get('/seasonal','DashboardController@seasonal')->name('seasonal');
//offstreet
Route::get('/offstreet','DashboardController@offstreet')->name('offstreet');
//Queries
Route::get('/queries','DashboardController@queries')->name('queries');
//collections
Route::get('/collections', 'DashboardController@collections')->name('collections');
//byagent
Route::get('/byagent', 'DashboardController@byagent')->name('byagent');
//view
Route:: get('/view/{id}', 'DashboardController@view')->name('view');
//viewday
Route:: get('/viewday/{id}', 'DashboardController@viewday')->name('viewday');
//viewzone
Route:: get('/viewzone/{id}', 'DashboardController@viewzone')->name('viewzone');
//viewstreet
Route:: get('/viewstreet/{id}', 'DashboardController@viewstreet')->name('viewstreet');
//logs
Route::get('/logs', 'DashboardController@logs')->name('logs');
//plate
Route:: get('/plate/{id}', 'DashboardController@plate')->name('plate');
Route::get('/waiver','DashboardController@waiver')->name('waiver');
Route::get('/remark/{id}/{description}','DashboardController@remark')->name('remark');
Route::post('/postwaiver','DashboardController@postwaiver')->name('postwaiver');
//compliant search
Route::post('/filtercompliant','QueriesController@filtercompliant')->name('filtercompliant');
//noncompliant
Route::post('/filternoncompliant','QueriesController@filternoncompliant')->name('filternoncompliant');
//filterclamped
Route::post('/filterclamped','QueriesController@filterclamped')->name('filterclamped');
//filtertounclamp
Route::post('/filtertounclamp','QueriesController@filtertounclamp')->name('filtertounclamp');
//unclampedRange
Route::post('/filterunclamped','QueriesController@filterunclamped')->name('filterunclamped');
//filteroffstreet
Route::post('/filteroffstreet','QueriesController@filteroffstreet')->name('filteroffstreet');

Route::post('/filterqueries','QueriesController@filterqueries')->name('filterqueries');
//filterwaiver
Route::post('/filterwaiver','QueriesController@filterwaiver')->name('filterwaiver');

Route::get('/test', function () {
    return view('test.text');
});

//UBP
Route::get('/permits','PermitsController@index')->name('permits');
//newapplications
Route::get('/newapplications','PermitsController@newapplications')->name('newapplications');
//renewals
Route::get('/renewals','PermitsController@renewals')->name('renewals');
//invoices
Route::get('/invoices','PermitsController@invoices')->name('invoices');
//receipts
Route::get('/receipts','PermitsController@receipts')->name('receipts');
//summaries
Route::get('/summaries','PermitsController@summaries')->name('summaries');
Route:: get('/test/{id}', 'PermitsController@test')->name('test');
Route::post('/statechange','PermitsController@statechange')->name('statechange');
Route::get('/details','PermitsController@details')->name('details');
Route::post('/sbpdetails','PermitsController@sbpdetails')->name('sbpdetails');
//toinspect
Route::get('/approve','PermitsController@approve')->name('approve');



























Route::get('/', 'HomeController@index')->name('home');
Route::get('/agent','DashboardController@agent')->name('agent');

//Vquarried vehicles

Route::get('/queriedAgent-vehicle','DashboardController@queriedAgent')->name('queriedAgent.index');
//qRange
Route::post('/qRange','QueriesController@qRange')->name('qRange');
//attRange
Route::post('/attRange','QueriesController@attRange')->name('attRange');




//paid
Route::get('/paid-vehicle','DashboardController@paid1')->name('paid.index');
Route::get('/all','DashboardController@all')->name('all.index');
Route::get('/paidAgent-vehicle','DashboardController@paidAgent')->name('paidAgent.index');
//pRange
Route::post('/pRange','QueriesController@pRange')->name('pRange');
Route::post('/searchpaid','QueriesController@searchpaid')->name('searchpaid');


//unpaid
Route::get('/unpaid-vehicle','DashboardController@unpaid')->name('unpaid.index');
Route::get('/unpaidAgent-vehicle','DashboardController@unpaidAgent')->name('unpaidAgent.index');
//clampRange
Route::post('/clampRange','QueriesController@clampRange')->name('clampRange');
//Clamped
Route::get('/clamped-vehicle','DashboardController@clamped')->name('clamped.index');
Route::get('/clampedAgent-vehicle','DashboardController@clampedAgent')->name('clampedAgent.index');
//clampedRange
Route::post('/clampedRange','QueriesController@clampedRange')->name('clampedRange');

//unclamped
Route::get('/unclamped-vehicle','DashboardController@unclamped')->name('unclamped.index');
Route::get('/unclampedAgent-vehicle','DashboardController@unclampedAgent')->name('unclampedAgent.index');
//unclampedRange
Route::post('/unclampedRange','QueriesController@unclampedRange')->name('unclampedRange');

//due unclamped
Route::get('/due-unclamped-vehicle','DashboardController@due_unclamped')->name('dueunclamped.index');
Route::get('/unclampAgent-vehicle','DashboardController@unclampAgent')->name('unclampAgent.index');
//unclampRange
Route::post('/unclampRange','QueriesController@unclampRange')->name('unclampRange');

//towed
Route::get('/towed','DashboardController@towed')->name('towed.index');
Route::get('/towedAgent','DashboardController@towedAgent')->name('towedAgent.index');



// untowed
Route::get('/dueuntowing','DashboardController@dueuntowing')->name('dueuntowing.index');
Route::get('/untowed','DashboardController@untowed')->name('untowed.index');
Route::get('/untowedAgent','DashboardController@untowedAgent')->name('untowedAgent.index');
//seasonal
Route::get('/seasonal','DashboardController@seasonal')->name('seasonal');
Route::get('/seasonalAgent','DashboardController@seasonalAgent')->name('seasonalAgent');

Route::post('/offsearch','DashboardController@offsearch')->name('offsearch');



//Finance
Route::get('/finance','DashboardController@finance')->name('finance');

//ajaxRequest
Route::post('/daterange', 'DashboardController@daterange')->name('daterange');
//attendants
Route::get('/attendants', 'DashboardController@attendants')->name('attendants');
Route::get('/admattendants', 'DashboardController@admattendants')->name('admattendants');
//admattendants
//hourrange
Route::post('/hourrange', 'FilterController@hourrange')->name('hourrange');
//adminhourrange
Route::post('/adminhourrange', 'FilterController@adminhourrange')->name('adminhourrange');

//dayrange
Route::post('/dayrange', 'FilterController@dayrange')->name('dayrange');
//admindayrange
Route::post('/admindayrange', 'FilterController@admindayrange')->name('admindayrange');

//zonerange
Route::post('/zonerange', 'FilterController@zonerange')->name('zonerange');
//adminzonerange
Route::post('/adminzonerange', 'FilterController@adminzonerange')->name('adminzonerange');

//streetrange
Route::post('/streetrange', 'FilterController@streetrange')->name('streetrange');
//streetrangeadmin
Route::post('/streetrangeadmin', 'FilterController@streetrangeadmin')->name('streetrangeadmin');



Route::get('/dcollections', 'DetailedController@dcollections')->name('dcollections');
//fVehicles
Route::post('/fVehicles', 'FilterController@fVehicles')->name('fVehicles');
Route::post('/seasonalsearch', 'FilterController@seasonalsearch')->name('seasonalsearch');

//view




//plate
Route:: get('/plate/{id}', 'DashboardController@plate')->name('plate');



Route:: get('/pages/{id}', 'DashboardController@pages')->name('pages');
Route:: get('/unpages/{id}', 'DashboardController@unpages')->name('unpages');
Route:: get('/cpages/{id}', 'DashboardController@cpages')->name('cpages');
Route:: get('/dpages/{id}', 'DashboardController@dpages')->name('dpages');
Route:: get('/querypages/{id}', 'DashboardController@querypages')->name('querypages');
Route:: get('/seasonalpages/{id}', 'DashboardController@seasonalpages')->name('seasonalpages');


//Histoy
Route:: get('/history', 'DashboardController@history')->name('history');






//cStreetrange
Route::post('/cStreetrange', 'FilterController@cStreetrange')->name('cStreetrange');
//cZoneange
Route::post('/cZonerange', 'FilterController@cZonerange')->name('cZonerange');

//detailed
Route::post('/detaildate', 'DetailedController@detaildate')->name('detaildate');

Route::post('/detailed','DetailedController@detailed')->name('detailed');

Route::get('/remark/{id}/{description}','DashboardController@remark')->name('remark');
Route::post('/postWeiver','DashboardController@postWeiver')->name('postWeiver');

Route::get('querypages/{id}/{from}/{to}', 'DashboardController@querypages')->name('querypages');

Auth::routes();

