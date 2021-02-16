<?php

namespace App\Http\Controllers;

use App\AbelReport;
use App\Department;
use App\EkidReport;
use App\Payment;
use App\Plan;
use App\Transport;
use App\User;
use Illuminate\Http\Request;

class AdminEkidRestController extends Controller
{

    public function directorateEkidReset($id)
    {

        $department = Department::findorFail($id);

        return view('admin.directorate.directorate-ekid-rest')
            ->with('department', $department)
            ->with('planlist', Plan::all()->where('department_id', $id)->sortByDesc('id'))
            ->with('users', User::all())
            ->with('ekidreport', EkidReport::all())
            ->with('abelinfo', AbelReport::all())
            ->with('payment', Payment::all());
    }


    public function viewDetailsReset($id)
    {
        $plan = Plan::findorFail($id);
        return view('admin.directorate.list-details-reset')
            ->with('plan', $plan)
            ->with('users', User::all())
            ->with('ekidreport', EkidReport::all())
            ->with('transport', Transport::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all());
    }


    public function resetForm($id)
    {
        $plan = Plan::findorFail($id);
        return view('admin.directorate.reset-form')
            ->with('plan', $plan)
            ->with('users', User::all())
            ->with('ekidreport', EkidReport::all())
            ->with('transport', Transport::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all());
    }

    public function resetFinance($id)
    {
        $plan = Plan::findorFail($id);

        $payment = Payment::findorFail($plan->payment_id);
        if ($plan->has('payment')) {
            if ($plan->payment_id == $payment->id) {


                $plan->payment_id = '0';
                $plan->check_by_finance = '0';
                $payment->delete();
                $plan->save();
                session()->flash('success', 'You have Successfully Reset Finance Data For this Ekid!! ');
                return redirect(route('reset-form', $id));
            }
        }
        session()->flash('error', 'NO Data Found Match To This Ekid!!!! ');
        return redirect()->back();
    }

    function resetWana($id)
    {
        $plan = Plan::findorFail($id);
        $plan->check_by_hidet = '0';
        $plan->check_by_super_hidet = '0';
        $plan->status = 0;
        $plan->is_plan_complated = 0;
        $plan->sign_name = '';
        $plan->sign_name_wana = '';
        $plan->save();
        session()->flash('success', 'You have Successfully Reset ዋና አዘጋጅ እና ምክትል ዋና አዘጋጅ  Data For this Ekid!! ');
        return redirect(route('reset-form', $id));

    }

    public function directorateEkidReportReset($id)
    {
        $department = Department::findorFail($id);

        return view('admin.directorate.directorate-ekid-report-list')
            ->with('department', $department)
            ->with('ekidreport', EkidReport::all()->where('department_id', $id))
            ->with('users', User::all())
            ->with('plan', Plan::all())
            ->with('abelinfo', AbelReport::all()->where('ekid_report_id', $id)->sortByDesc('id'))
            ->with('payment', Payment::all());
    }


    public function viewDetailsReportReset($id)
    {
        $ekidreport = EkidReport::findorFail($id);
        return view('admin.directorate.list-details-report-reset')
            ->with('plan', Plan::all())
            ->with('users', User::all())
            ->with('abelinfo', AbelReport::all()->where('ekid_report_id', $id)->sortByDesc('id'))
            ->with('ekidreport', $ekidreport)
            ->with('transport', Transport::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all());
    }

    public function resetReportForm($id)
    {
//        dd($id);
        $ekidreport = EkidReport::findorFail($id);
        return view('admin.directorate.reset-report-form')
            ->with('plan', Plan::all())
            ->with('users', User::all())
            ->with('abelinfo', AbelReport::all()->where('ekid_report_id', $id)->sortByDesc('id'))
            ->with('ekidreport', $ekidreport)
            ->with('transport', Transport::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all());
    }


    public function resetFinanceReport($id)
    {
        $ekid = EkidReport::findorFail($id);

        $plan = Plan::findorFail($ekid->plan_id);
        if ($ekid->has('plan')) {
            if ($ekid->plan_id == $plan->id) {
//                $ekid->payment_id = '0';
//                $ekid->plan_id = 0;

                $ekid->is_plan_complated = 0;
                $ekid->ekid_status = 0;
                $ekid->approved_by = '';


                $plan->is_plan_complated = 0;
                $plan->status = 0;

                $plan->save();
                session()->flash('success', 'You have Successfully Reset Finance Data For this Ekid!! ');
                return redirect(route('reset-report-form', $id));
            }
        }
        session()->flash('error', 'NO Data Found Match To This Ekid!!!! ');
        return redirect()->back();
    }
}
