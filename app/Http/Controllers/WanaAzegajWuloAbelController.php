<?php

namespace App\Http\Controllers;

use App\AbelReport;
use App\Department;
use App\EkidReport;
use App\Payment;
use App\Plan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WanaAzegajWuloAbelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('wanaazegaj');
    }

    public function index($id)
    {
        $plan = Plan::findorFail($id);
//        if ($plan->status == 1) {
//            session()->flash('error', 'እቅድ ክንውን ተመዝግቧል፣  ድጋሚ መመዝገብ እትችልም ');
//            return redirect(route('plan'));
//        }
        return view('wanaazegaj.report.index')
            ->with('plan', $plan)
            ->with('department', Department::all())
//            ->with('payment', Payment::all()->where('plan_id' == $id))
            ->with('payment', Payment::all())
            ->with('ekidreport', EkidReport::all())
//            ->with('ekidreport', EkidReport::all()->where('plan_id' ==$id))
            ->with('abelinfo', AbelReport::all());


    }

    public function ekidReportList()
    {
        return view('wanaazegaj.report.ekid-report-list')
            ->with('plan', Plan::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all())
            ->with('ekidreport', EkidReport::all())
            ->with('abelinfo', AbelReport::all());
    }

    public function ekidListAll()
    {
        return view('wanaazegaj.report.ekid-list-all')
            ->with('plan', Plan::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all())
            ->with('ekidreport', EkidReport::all())
            ->with('abelinfo', AbelReport::all());
    }

    public function singleEkidDetail($id)
    {
        $ekidreport = EkidReport::findorFail($id);;
        return view('wanaazegaj.report.single-ekid-detail')
            ->with('plan', Plan::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all())
            ->with('abelinfo', AbelReport::all()->where('ekid_report_id', $id))
            ->with('ekidreport', $ekidreport)
            ->with('users', User::all());
    }

    public function wanaazegajReportDetails($id)
    {
//        if ($ekidreport = EkidReport::findorFail($id)) {
        $ekidreport = EkidReport::findorFail($id);;
        return view('wanaazegaj.report.wanaazegaj-report-approve-details')
            ->with('plan', Plan::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all())
            ->with('abelinfo', AbelReport::all()->where('ekid_report_id', $id))
            ->with('ekidreport', $ekidreport)
            ->with('users', User::all());

    }

    public function wanaazegajApproveReport($id)
    {
        $ekidreport = EkidReport::findorFail($id);
        $ekidreport->sign_name_wana = Auth::user()->name;
        $ekidreport->sign_name_wana_image = Auth::user()->upload_image;
        $ekidreport->check_by_super_hidet = '1';
        $ekidreport->department_id = Auth::user()->department_id;
        $ekidreport->save();

        session()->flash('success', 'እቅዱ አጽቀሀል፡፡ ');
        return redirect(route('w1-ekid-report-list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
