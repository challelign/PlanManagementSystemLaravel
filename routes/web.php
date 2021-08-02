<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

//Route::get('/', function () {
//    return view('welcome');
//})->name('welcome');


Route::view('/','welcome')->name('welcome');



//
//Route::post('login', 'Auth\LoginController@login');
//Route::get('/' , 'Auth\LoginController@showLoginForm');
//Route::get('/'     , 'Auth\AuthController@showLoginForm');

//Auth::routes();
//Route::get('/', 'HomeController@login')->name('login');

//Route::get('/home', 'HomeController@index')->name('home');


////addi yetechemera
//Route::get('/', function () {
//    if (Auth::check()) {
//        return Redirect::to('/');
////        return $next($request);
//    }
//});

//Route::match(['get', 'post'], 'login', function(){
//    return redirect('/');
//});

// end yetechemer

Route::get('/table', 'HomeController@table')->name('table');
Route::get('/wel', 'HomeController@wel')->name('wel');

Route::group(['middleware' => 'prevent-back-history'], function () {
//    Auth::routes();

    Auth::routes([

        'register' => false, // Register Routes...
//        'login' => false, // login Routes...

        'reset' => false, // Reset Password Routes...

        'verify' => false, // Email Verification Routes...

    ]);
    Route::get('/reporter/home', 'ReporterController@index')->name('reporter')->middleware('reporter');
    Route::get('/reporter/plan', 'ReporterController@create')->name('plan')->middleware('reporter');

    Route::get('/reporter/plan-seen', 'ReporterController@planSeen')->name('plan-seen')->middleware('reporter');

    Route::get('/reporter/register', 'ReporterController@register')->name('plan-register')->middleware('reporter');
    Route::get('/reporter/show', 'ReporterController@show')->name('show')->middleware('reporter');


    Route::get('/reporter/{reporter}/ekid-report', 'ReporterWuloAbel@ekidReport')->name('ekid-report')->middleware('reporter');
    Route::post('/reporter/{reporter}/ekid-report-save', 'ReporterWuloAbel@ekidReportSave')->name('ekid-report-save')->middleware('reporter');

    Route::post('/reporter/ekid-report-no-prepayment-save', 'ReporterWuloAbel@EkidReportNoPrepaymentSave')->name('ekid-report-no-prepayment-save')->middleware('reporter');

    Route::get('/reporter/ekid-report-list', 'ReporterWuloAbel@ekidReportList')->name('ekid-report-list')->middleware('reporter');
    Route::get('/reporter/{reporter}/ekid-report-edit', 'ReporterWuloAbel@ekidReportEdit')->name('ekid-report-edit')->middleware('reporter');
    Route::get('/reporter/{reporter}/ekid-report-view-one', 'ReporterWuloAbel@ekidReportViewOne')->name('ekid-report-view-one')->middleware('reporter');


    Route::post('/reporter/{reporter}/ekid-report-update', 'ReporterWuloAbel@ekidReportUpdate')->name('ekid-report-update')->middleware('reporter');
    Route::get('/reporter/{reporter}/ekid-abel', 'ReporterWuloAbel@ekidAbel')->name('ekid-abel')->middleware('reporter');
    Route::post('/reporter/{reporter}/ekid-abel-save', 'ReporterWuloAbel@ekidAbelSave')->name('ekid-abel-save')->middleware('reporter');

    Route::get('/reporter/{reporter}/abel-info', 'ReporterWuloAbel@abelInfo')->name('abel-info')->middleware('reporter');
    Route::get('/reporter/{reporter}/abel-edit', 'ReporterWuloAbel@abelEdit')->name('abel-edit')->middleware('reporter');
    Route::post('/reporter/{reporter}/ekid-edit-save', 'ReporterWuloAbel@ekidEditSave')->name('ekid-edit-save')->middleware('reporter');


//    Route::post('/reporter/{reporter}/ekid-summery', 'ReporterWuloAbel@ekidSummery')->name('ekid-summery')->middleware('reporter');


//Route::get('/reporter/ekid-abel', 'ReporterWuloAbel@ekidAbel')->name('ekid-abel')->middleware('reporter');


    Route::get('/reporter/ekid-report-no-prepayment', 'ReporterWuloAbel@EkidReportNoPrepayment')->name('ekid-report-no-prepayment')->middleware('reporter');

    Route::resource('/reporter', 'ReporterController')->middleware('reporter');


//Route::resource('/admin','AdminController')->middleware('admin');
    Route::get('/admin', 'AdminController@index')->name('admin')->middleware(['auth', 'admin']);
    Route::get('/admin/users', 'AdminController@create')->name('users-list')->middleware('admin');
    Route::get('/admin/user-register', 'AdminController@userRegister')->name('user-register')->middleware('admin');
    Route::post('/admin/register', 'AdminController@allRegister')->name('all-register')->middleware('admin');

    Route::get('/admin/user-directorate-create', 'AdminController@userDirectorateCreate')->name('user-directorate-create')->middleware('admin');
    Route::post('/admin/user-directorate-save', 'AdminController@userDirectorateSave')->name('user-directorate-save')->middleware('admin');

    Route::get('/admin/{id}/user-directorate-edit', 'AdminController@userDirectorateEdit')->name('user-directorate-edit')->middleware('admin');
    Route::post('/admin/{id}/user-directorate-update', 'AdminController@userDirectorateUpdate')->name('user-directorate-update')->middleware('admin');

    Route::get('/admin/{id}/user-directorate-delete', 'AdminController@userDirectorateDelete')->name('user-directorate-delete')->middleware('admin');


    Route::get('/admin/{admin}/edit', 'AdminController@edit')->name('edit')->middleware('admin');
    Route::post('/admin/{admin}/update', 'AdminController@update')->name('update')->middleware('admin');

    Route::get('/admin/{admin}/user-upload-sign', 'AdminController@userUploadSign')->name('user-upload-sign')->middleware('admin');
    Route::post('/admin/{admin}/user-upload-sign/upload', 'AdminController@upload')->name('user-upload-sign.upload')->middleware('admin');

    Route::delete('admin/{admin}/delete', 'AdminController@destroy')->name('delete')->middleware('admin');

    Route::get('/admin/{admin}/user-profile', 'AdminController@userProfile')->name('user-profile')->middleware('admin');


//for single admin user  change password
    Route::get('/admin/change-password', 'AdminController@changePassword')->name('change-password')->middleware('admin');
    Route::post('/admin/change-password', 'AdminController@updatePassword')->name('update-password')->middleware('admin');

//for single reporter  change password
    Route::get('/reporter-password', 'ReporterController@userChangePassword')->name('reporter-password')->middleware('reporter');
    Route::post('/reporter-password', 'ReporterController@userUpdatePassword')->name('reporter-password')->middleware('reporter');


    Route::post('/admin/{user}/make-Inactive', 'AdminController@makeInactive')->name('admin.make-inactive')->middleware('admin');
    Route::post('/admin/{user}/make-active', 'AdminController@makeActive')->name('admin.make-active')->middleware('admin');
//Route::resource('/admin', 'AdminController')->middleware('admin');


    Route::get('/admin/directorate/{admin}/directorate-ekid-reset', 'AdminEkidRestController@directorateEkidReset')->name('admin.directorate-ekid-reset')->middleware(['auth', 'admin']);
    Route::get('/admin/directorate/{admin}/list-details-reset', 'AdminEkidRestController@viewDetailsReset')->name('list-details-reset')->middleware(['auth', 'admin']);


    Route::get('/admin/directorate/{admin}/reset-form', 'AdminEkidRestController@resetForm')->name('reset-form')->middleware(['auth', 'admin']);

    Route::post('/admin/directorate/{admin}/reset-finance', 'AdminEkidRestController@resetFinance')->name('reset-finance')->middleware(['auth', 'admin']);
    Route::post('/admin/directorate/{admin}/reset-wana', 'AdminEkidRestController@resetWana')->name('reset-wana')->middleware(['auth', 'admin']);


    Route::get('/admin/directorate/{admin}/directorate-ekid-report-reset', 'AdminEkidRestController@directorateEkidReportReset')->name('admin.directorate-ekid-report-reset')->middleware(['auth', 'admin']);

    Route::get('/admin/directorate/{admin}/list-details-report-reset', 'AdminEkidRestController@viewDetailsReportReset')->name('list-details-report-reset')->middleware(['auth', 'admin']);
    Route::get('/admin/directorate/{admin}/reset-report-form', 'AdminEkidRestController@resetReportForm')->name('reset-report-form')->middleware(['auth', 'admin']);

//Route::get('/hidet');


    Route::get('/hidet/home', 'HidetMeriContoller@index')->name('hidet')->middleware(['auth', 'hidet']);
    Route::get('/hidet/{hidet}/list-details', 'HidetMeriContoller@viewDetails')->name('hidet-approve-details')->middleware(['auth', 'hidet']);
    Route::post('/hidet/{hidet}/approve-plan', 'HidetMeriContoller@approvePlan')->name('approve-plan')->middleware(['auth', 'hidet']);


    Route::post('/hidet/{hidet}/cancel-plan', 'HidetMeriContoller@cancelPlan')->name('cancel-plan')->middleware(['auth', 'hidet']);
//    Route::post('/hidet/{hidet}/re-approve-plan', 'HidetMeriContoller@reApprovePlan')->name('re-approve-plan')->middleware(['auth', 'hidet']);





    Route::get('/hidet/reject-cancel-ekid', 'HidetMeriContoller@cancelEkid')->name('reject-cancel-ekid')->middleware(['auth', 'hidet']);

    Route::get('/hidet/list-all', 'HidetMeriContoller@listAll')->name('hidet-list-all')->middleware(['auth', 'hidet']);
    Route::get('/hidet/{hidet}/single-article', 'HidetMeriContoller@listSingle')->name('hidet-single-details')->middleware(['auth', 'hidet']);

//for single admin user  change password
    Route::get('/hidet/change-password', 'HidetMeriContoller@changePassword')->name('change-password')->middleware(['auth', 'hidet']);
    Route::post('/hidet/change-password', 'HidetMeriContoller@updatePassword')->name('update-password')->middleware(['auth', 'hidet']);
    Route::get('/hidet/profile-sign', 'HidetMeriContoller@profileSign')->name('profile-sign')->middleware('hidet');


    Route::get('/hidet/report/ekid-report-list', 'HidetWuloAbelController@ekidReportList')->name('h1-ekid-report-list')->middleware(['auth', 'hidet']);
    Route::get('/hidet/report/{hidet}/index', 'HidetWuloAbelController@index')->name('h1-ekid-report')->middleware(['auth', 'hidet']);

    Route::get('/hidet/report/{hidet}/hidet-report-approve-details', 'HidetWuloAbelController@hidetReportDetails')->name('hidet-report-approve-details')->middleware(['auth', 'hidet']);
    Route::post('/hidet/report/{hidet}/hidet-approve-report', 'HidetWuloAbelController@hidetApproveReport')->name('hidet-approve-report')->middleware(['auth', 'hidet']);


    Route::get('/hidet/report/ekid-list-all', 'HidetWuloAbelController@ekidListAll')->name('ekid-list-all')->middleware(['auth', 'hidet']);
    Route::get('/hidet/report/{hidet}/single-ekid-detail', 'HidetWuloAbelController@singleEkidDetail')->name('single-ekid-detail')->middleware(['auth', 'hidet']);


    Route::get('/hidet/self/self-ekid-home','Self\HidetSelfController@selfEkidHome')->name('self-ekid-home')->middleware(['auth', 'hidet']);
    Route::get('/hidet/self/self-ekid-canceled','Self\HidetSelfController@selfEkidCanceled')->name('self-ekid-canceled')->middleware(['auth', 'hidet']);



    Route::get('/hidet/self/self-ekid-create','Self\HidetSelfController@selfEkidCreate')->name('self-ekid-create')->middleware(['auth', 'hidet']);
    Route::post('/hidet/self/self-ekid-save','Self\HidetSelfController@selfEkidSave')->name('self-ekid-save')->middleware(['auth', 'hidet']);

    Route::get('/hidet/self/{selfid}/self-edit-ekid','Self\HidetSelfController@selfEkidEdit')->name('self-edit-ekid')->middleware(['auth', 'hidet']);
    Route::post('/hidet/self/{selfid}/self-update-ekid','Self\HidetSelfController@selfEkidUpdate')->name('self-update-ekid')->middleware(['auth', 'hidet']);

    Route::delete('/hidet/self/{selfid}/self-delete-ekid','Self\HidetSelfController@selfEkidDelete')->name('self-delete-ekid')->middleware(['auth', 'hidet']);





//    hidet-report-approve-details
//                                                    hidet-approve-report

    Route::get('/wanaazegaj/home', 'WanaAzegajiController@index')->name('wanaazegaj')->middleware(['auth', 'wanaazegaj']);
    Route::get('/wanaazegaj/{wanaazegaj}/list-details', 'WanaAzegajiController@viewDetails')->name('wanaazegaj-approve-details')->middleware(['auth', 'wanaazegaj']);
    Route::post('/wanaazegaj/{wanaazegaj}/approve-plan', 'WanaAzegajiController@approvePlan')->name('wana-approve-plan')->middleware(['auth', 'wanaazegaj']);
    Route::post('/wanaazegaj/{wanaazegaj}/wana-cancel-plan', 'WanaAzegajiController@wanaCancelPlan')->name('wana-cancel-plan')->middleware(['auth', 'wanaazegaj']);


    Route::get('/wanaazegaj/wana-cancel-ekid', 'WanaAzegajiController@wanaCancelEkidList')->name('wana-cancel-ekid-list')->middleware(['auth', 'wanaazegaj']);
    Route::get('/wanaazegaj/self/self-ekid-home-wana','Self\WanaSelfController@selfEkidHome')->name('self-ekid-home-wana')->middleware(['auth', 'wanaazegaj']);
    Route::get('/wanaazegaj/self/self-ekid-canceled-wana','Self\WanaSelfController@selfEkidCanceled')->name('self-ekid-canceled-wana')->middleware(['auth', 'wanaazegaj']);
    Route::get('/wanaazegaj/self/self-ekid-create-wana','Self\WanaSelfController@selfEkidCreate')->name('self-ekid-create-wana')->middleware(['auth', 'wanaazegaj']);
    Route::post('/wanaazegaj/self/self-ekid-save-wana','Self\WanaSelfController@selfEkidSave')->name('self-ekid-save-wana')->middleware(['auth', 'wanaazegaj']);

    Route::get('/wanaazegaj/self/{selfid}/self-edit-ekid-wana','Self\WanaSelfController@selfEkidEdit')->name('self-edit-ekid-wana')->middleware(['auth', 'wanaazegaj']);



    Route::get('/wanaazegaj/hidet-ekid-list', 'WanaAzegajiController@hidetEkidList')->name('hidet-ekid-list')->middleware(['auth', 'wanaazegaj']);

    Route::get('/wanaazegaj/list-all', 'WanaAzegajiController@listAll')->name('wanaazegaj-list-all')->middleware(['auth', 'wanaazegaj']);
    Route::get('/wanaazegaj/{wanaazegaj}/single-article', 'WanaAzegajiController@listSingle')->name('wanaazegaj-single-details')->middleware(['auth', 'wanaazegaj']);

    Route::get('/wanaazegaj/hidet/list-all-mdirector', 'WanaAzegajiController@listAllMDirector')->name('wanaazegaj-list-all-mdirector')->middleware(['auth', 'wanaazegaj']);

//for single admin user  change password
    Route::get('/wanaazegaj/change-password', 'WanaAzegajiController@changePassword')->name('change-password')->middleware(['auth', 'wanaazegaj']);
    Route::post('/wanaazegaj/change-password', 'WanaAzegajiController@updatePassword')->name('update-password')->middleware(['auth', 'wanaazegaj']);
    Route::get('/wanaazegaj/profile-sign-wana', 'WanaAzegajiController@profileSign')->name('profile-sign-wana')->middleware(['auth', 'wanaazegaj']);

//report

    Route::get('/wanaazegaj/report/ekid-report-list', 'WanaAzegajWuloAbelController@ekidReportList')->name('w1-ekid-report-list')->middleware(['auth', 'wanaazegaj']);
    Route::get('/wanaazegaj/report/{wanaazegaj}/index', 'WanaAzegajWuloAbelController@index')->name('w1-ekid-report')->middleware(['auth', 'wanaazegaj']);

    Route::get('/wanaazegaj/report/{wanaazegaj}/wanaazegaj-report-approve-details', 'WanaAzegajWuloAbelController@wanaazegajReportDetails')->name('wanaazegaj-report-approve-details')->middleware(['auth', 'wanaazegaj']);
    Route::post('/wanaazegaj/report/{wanaazegaj}/wanaazegaj-approve-report', 'WanaAzegajWuloAbelController@wanaazegajApproveReport')->name('wanaazegaj-approve-report')->middleware(['auth', 'wanaazegaj']);



    Route::get('/wanaazegaj/report/ekid-list-all', 'WanaAzegajWuloAbelController@ekidListAll')->name('wanaazegaj-ekid-list-all')->middleware(['auth', 'wanaazegaj']);
    Route::get('/wanaazegaj/report/{wanaazegaj}/single-ekid-detail', 'WanaAzegajWuloAbelController@singleEkidDetail')->name('wanaazegaj-single-ekid-detail')->middleware(['auth', 'wanaazegaj']);


//end report


    Route::get('/finance/home', 'FinanceController@index')->name('finance')->middleware(['auth', 'finance']);
//Route::get('/finance/list', 'FinanceController@list')->name('list')->middleware(['auth', 'finance']);
    Route::get('/finance/{finance}/list-details', 'FinanceController@viewDetails')->name('list-details')->middleware(['auth', 'finance']);
//Route::get('/finance/{finance}/view-details', 'FinanceController@viewDetails')->name('view-details')->middleware(['auth', 'finance']);




    Route::get('/finance/{finance}/first-payment-step1', 'FinanceController@firstPaymentStep1')->name('first-payment-step1')->middleware(['auth', 'finance']);




    Route::post('/finance/{finance}/first-payment-step1', 'FinanceController@paymentSaveStep1')->name('payment-save-step1')->middleware(['auth', 'finance']);



    Route::get('/finance/{finance}/first-payment-step2', 'FinanceController@firstPaymentStep2')->name('first-payment-step2')->middleware(['auth', 'finance']);
    Route::post('/finance/{finance}/first-payment-step2', 'FinanceController@paymentSaveStep2')->name('payment-save-step2')->middleware(['auth', 'finance']);






    Route::get('/finance/done-payment-first', 'FinanceController@donePaymentFirst')->name('done-payment-first')->middleware(['auth', 'finance']);

    Route::get('/finance/done-payment-end', 'FinanceController@donePaymentEnd')->name('done-payment-end')->middleware(['auth', 'finance']);
    Route::get('/finance/done-payment-end-self', 'FinanceController@donePaymentEndSelf')->name('done-payment-end-self')->middleware(['auth', 'finance']);


    Route::get('/finance/sample-print', 'FinanceController@samplePrint')->name('sample-print')->middleware(['auth', 'finance']);
    Route::get('/finance/{finance}/invoice-print', 'FinanceController@invoicePrint')->name('invoice-print')->middleware(['auth', 'finance']);


//Route::get('/finance/{finance}/pdf', 'FinanceController@pdf')->name('pdf-print')->middleware(['auth', 'finance']);
    Route::get('/finance/{finance}/print', 'FinanceController@echo')->name('pdf-echo')->middleware(['auth', 'finance']);


//for single finance user  change password

    Route::get('/finance/change-password', 'FinanceController@changePassword')->name('f-change-password')->middleware(['auth', 'finance']);
    Route::post('/finance/change-password', 'FinanceController@updatePassword')->name('f-update-password')->middleware(['auth', 'finance']);
    Route::get('/finance/profile-sign-wana', 'FinanceController@profileSign')->name('profile-sign-finance')->middleware(['auth', 'finance']);


//report start
    Route::get('/finance/list-all', 'FinanceWuloAbelController@listAll')->name('finance-list-all')->middleware(['auth', 'finance']);

    Route::get('/finance/report/ekid-list-all', 'FinanceWuloAbelController@ekidListAll')->name('finance-ekid-list-all')->middleware(['auth', 'finance']);
    Route::get('/finance/report/{finance}/finance-report-approve-details', 'FinanceWuloAbelController@financeReportDetails')->name('finance-report-approve-details')->middleware(['auth', 'finance']);

    Route::get('/finance/report/{finance}/finance-report-approve-form', 'FinanceWuloAbelController@financeReportForm')->name('finance-report-approve-form')->middleware(['auth', 'finance']);
    Route::post('/finance/report/finance-report-approve-form/action', 'FinanceWuloAbelController@action')->name('finance-report-approve-save')->middleware(['auth', 'finance']);


//    Route::put('/finance/report/{finance}/finance-report-approve-save', 'FinanceWuloAbelController@financeReportSave')->name('finance-report-approve-save')->middleware(['auth', 'finance']);

//    Route::post('/finance/report/{finance}/finance-report-approve-form/action', 'FinanceWuloAbelController@action')->name('tabledit.action')->middleware(['auth', 'finance']);

    Route::get('tabledit', 'FinanceWuloAbelController@abelTable');
    Route::post('tabledit/action', 'FinanceWuloAbelController@action')->name('tabledit.action')->middleware(['auth', 'finance']);;
    Route::post('/finance/report/{finance}/finance-report-approve-final', 'FinanceWuloAbelController@financeReportSaveFinal')->name('finance-report-approve-save-final')->middleware(['auth', 'finance']);


    Route::get('/finance/report/ekid-report-list', 'FinanceWuloAbelController@ekidReportList')->name('finance-ekid-report-list')->middleware(['auth', 'finance']);
    Route::get('/finance/report/done-payment-ekid-end', 'FinanceWuloAbelController@DonePaymentEkidEnd')->name('done-payment-ekid-end')->middleware(['auth', 'finance']);

    Route::get('/finance/report/done-payment-ekid-end-self', 'FinanceWuloAbelController@DonePaymentEkidEndSelf')->name('done-payment-ekid-end-self')->middleware(['auth', 'finance']);

    Route::get('/finance/report/ekid-print-list', 'FinanceWuloAbelController@EkidPrintList')->name('ekid-print-list')->middleware(['auth', 'finance']);


    Route::get('/finance/report/{finance}/ekid-print', 'FinanceWuloAbelController@EkidPrint')->name('ekid-print')->middleware(['auth', 'finance']);
    Route::get('/finance/report/{finance}/print', 'FinanceWuloAbelController@FinalPrint')->name('final-print')->middleware(['auth', 'finance']);


    Route::get('/finance/directorate/{finance}/directorate-ekid-list', 'FinanceController@directorateEkidList')->name('directorate-ekid-list')->middleware(['auth', 'finance']);

    Route::get('/finance/directorate/{finance}/directorate-ekid-report-list', 'FinanceWuloAbelController@directorateEkidReportList')->name('directorate-ekid-report-list')->middleware(['auth', 'finance']);


    Route::get('/finance/report/{finance}/index', 'FinanceWuloAbelController@index')->name('finance-ekid-report')->middleware(['auth', 'finance']);


//    end report



//    smanager
    Route::get('/smanager/home', 'SmanagerController@index')->name('smanager')->middleware(['auth', 'smanager']);
    Route::get('/smanager/{smanager}/list-details', 'SmanagerController@viewDetails')->name('smanager-approve-details')->middleware(['auth', 'smanager']);
    Route::post('/smanager/{smanager}/approve-plan', 'SmanagerController@approvePlan')->name('smanager-approve-plan')->middleware(['auth', 'smanager']);

    Route::get('/smanager/list-all', 'SmanagerController@listAll')->name('smanager-list-all')->middleware(['auth', 'smanager']);
    Route::get('/smanager/{wanaazegaj}/single-article', 'SmanagerController@listSingle')->name('smanager-single-details')->middleware(['auth', 'smanager']);


    Route::post('/smanager/{smanager}/smanager-cancel-plan', 'SmanagerController@smanagerCancelPlan')->name('smanager-cancel-plan')->middleware(['auth', 'smanager']);
    Route::get('/smanager/smanager-cancel-ekid', 'SmanagerController@smanagerCancelEkidList')->name('smanager-cancel-ekid-list')->middleware(['auth', 'smanager']);








//for single admin user  change password
    Route::get('/smanager/change-password', 'SmanagerController@changePassword')->name('change-password-smanager')->middleware(['auth', 'smanager']);
    Route::post('/smanager/change-password', 'SmanagerController@updatePassword')->name('update-password-smanager')->middleware(['auth', 'smanager']);
    Route::get('/smanager/profile-sign-smanager', 'SmanagerController@profileSign')->name('profile-sign-smanager')->middleware(['auth', 'smanager']);


    Route::get('/smanager/directorate/{smanager}/directorate-ekid-list', 'SmanagerController@directorateEkidList')->name('smanager-directorate-ekid-list')->middleware(['auth', 'smanager']);

//    Route::get('/smanager/directorate/{smanager}/directorate-ekid-list', 'SmanagerController@directorateEkidList')->name('smanager-cancel-ekid-list')->middleware(['auth', 'smanager']);

});
