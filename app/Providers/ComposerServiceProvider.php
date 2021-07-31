<?php

namespace App\Providers;

use App\AbelReport;
use App\Department;
use App\EkidReport;
use App\Payment;
use App\Plan;
use App\Transport;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

//        view::composer(['layouts.finance','finance.index'], function ($view) {

//        view 1
        view::composer([
            'layouts.finance'
            , 'layouts.admin'

            , 'finance.index'
            , 'finance.view-details'
            , 'finance.first-payment'
            , 'finance.done-payment-first'
            , 'finance.done-payment-end'
            , 'finance.done-payment-end-self'
            , 'finance.directorate.ekid-report-list'
//            , 'admin.directorate.directorate-ekid-rest'
//            , 'admin.*'
//            , 'admin.directorate.*'
            , 'hidet.index'

            , 'admin.user-directorate'

            , 'layouts.hidet'
            , 'finance.invoice-print'
            , 'finance.print'
            , 'wanaazegaj.index'
            , 'layouts.wanaazegaj'
            , 'reporter.index'
            , 'layouts.reporter'
            , 'reporter.ekid-report-no-prepayment'
            , 'reporter.plan-seen'


        ], function ($view) {
            $view->with('planlist', Plan::all())
                ->with('department', Department::all())
                ->with('transport', Transport::all())
                ->with('users', User::all())
                ->with('payment', Payment::all());
        });

// view
        view::composer([
            'layouts.*'
//            , 'admin.directorate.reset-report-form'
            , 'admin.user-directorate'
            ,'layouts.finance', 'finance.index'
            , 'finance.view-details'
            , 'finance.first-payment'
            , 'finance.done-payment-first'
            , 'hidet.report.index'
            , 'layouts.hidet'
            , 'finance.invoice-print'
            , 'finance.print'
            , 'wanaazegaj.index'
            , 'smanager.index'
            , 'layouts.wanaazegaj'
//            ,'admin.directorate.list-details-report-reset'
//            ,'admin.directorate.reset-report-form'


        ], function ($view1) {
            $view1->with('ekidreport', EkidReport::all())
                ->with('abelinfo', AbelReport::all())
                ->with('planlist', Plan::all())
                ->with('department', Department::all())
                ->with('transport', Transport::all())
                ->with('users', User::all())

                ->with('payment', Payment::all());
        });





//view 3
//
//        view::composer([
//            'layouts.admin', 'admin.index'
//            , 'admin.view-details'
//
//
//
//        ], function ($view1) {
//            $view1->with('ekidreport', EkidReport::all())
//                ->with('abelinfo', AbelReport::all())
//                ->with('planlist', Plan::all())
//                ->with('department', Department::all())
//                ->with('transport', Transport::all())
//                ->with('users', User::all())
//                ->with('payment', Payment::all());
//        });



//            View::composer(['reporter.index','reporter.ekid-report'] ,function ($view2){
//                $view2->('')
//            });
    }
}
