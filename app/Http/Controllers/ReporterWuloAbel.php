<?php

namespace App\Http\Controllers;

use App\AbelReport;
use App\Department;
use App\EkidReport;
use App\Http\Requests\ReporterWuloAbelEditRequest;
use App\Http\Requests\ReporterWuloAbelRequest;
use App\Payment;
use App\Plan;
use App\Role;
use App\Transport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ReporterWuloAbel extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

    public function EkidReportNoPrepayment()
    {
        $planlist = Plan::all();
        foreach ($planlist as $plist) {
            if ($plist->check_by_hidet == 1
                && $plist->check_by_super_hidet == 1
                && $plist->check_by_finance == 1 && $plist->status == 0 ) {
                if ($plist->payment->total > 0) {
                    session()->flash('error', 'እቅድ ክንውን መሙላት እትችልም ፣  መጀምሪያ ሂሳብ እወራርድ ');
                    return redirect(route('plan'));
                }
            }


            if($plist->is_plan_complated == 0 && Auth::user()->id == $plist->user_id){
                session()->flash('error', 'እቅድ መሙላት እትችልም ፣  የመዘገብኽውን እቅድ አላወራረድኽም /እቅድ ክንውን አልጨረስህም ');
                return redirect(route('ekid-report-list'));
            }
        }


        return view('reporter.ekid-report-no-prepayment');
    }

    public function EkidReportNoPrepaymentSave(Request $request)
    {
//        dd($request->all());



              $this->validate($request, [
                  'title'=>'required|unique:ekid_reports',
                  'nodate' => 'required|string|max:2',
                  'transport_id' => 'required',
                  'ekid_on_list' => 'required',
                  'ekid_on_list_done' => 'required',
                  'ekid_ont_on_list_done' => 'required',
                  'not_done_reason' => 'required',
              ]);


        EkidReport::create([
            'nodate' => $request->nodate,
            'title' => $request->title,

//            'plan_id' => $request->plan_id,
//            'payment_id' => $request->payment_id,


            'user_id' => auth()->user()->id,
            'ekid_on_list' => $request->ekid_on_list,
            'ekid_on_list_done' => $request->ekid_on_list_done,
            'ekid_ont_on_list_done' => $request->ekid_ont_on_list_done,
            'not_done_reason' => $request->not_done_reason,
            'transport_id' => $request->transport_id,
        ]);
//        dd($e);

//        $plan->status = '1';
//        $plan->payment_id = $payment_id;
//        $plan->save();
        session()->flash('success', 'እቅድ ክንውን ተመዝግቧል');
        return redirect(route('plan'));
    }

    public
    function ekidReport($id)
    {


        $plan = Plan::findorFail($id);
        if ($plan->status == 1) {
            session()->flash('error', 'እቅድ ክንውን ተመዝግቧል፣  ድጋሚ መመዝገብ እትችልም ');
            return redirect(route('plan'));
        }
        return view('reporter.ekid-report')
            ->with('plan', $plan)
            ->with('department', Department::all())
            ->with('payment', Payment::all()->where('plan_id' == $id))
            ->with('transport', Transport::all())
            ->with('department', Department::all());


//        return view('reporter.ekid-report');
    }

    public
    function ekidReportSave(ReporterWuloAbelRequest $request, $id)
    {
        $plan = Plan::findorFail($id);
//        dd($plan);

//        if ($plan->has('payment')) {
//            $payment_id = $request->payment;
//            $plan['payment_id'] = $payment_id;
//        }
//
//        dd($payment_id);


        EkidReport::create([
            'nodate' => $request->nodate,
            'plan_id' => $request->plan_id,
            'payment_id' => $request->payment_id,
            'transport_id' => $request->transport_id,


            'user_id' => auth()->user()->id,
            'ekid_on_list' => $request->ekid_on_list,
            'ekid_on_list_done' => $request->ekid_on_list_done,
            'ekid_ont_on_list_done' => $request->ekid_ont_on_list_done,
            'not_done_reason' => $request->not_done_reason,
        ]);
//        dd($e);

        $plan->status = '1';
//        $plan->payment_id = $payment_id;
        $plan->save();
        session()->flash('success', 'እቅድ  መዝግበሃል፡');
        return redirect(route('plan'));
    }

    /**ekidAbel
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ekidReportList()
    {
        return view('reporter.ekid-report-list')
            ->with('ekidreport', EkidReport::all()->sortByDesc('id'))
            ->with('plan', Plan::all())
            ->with('transport', Transport::all())
            ->with('payment', Payment::all());
    }

    public function ekidReportEdit($id)
    {

        $ekidreport = EkidReport::findorFail($id);


//        $plan = Plan::findorFail($id);

        if ($ekidreport->check_by_hidet == 1 || $ekidreport->check_by_super_hidet == 1 || $ekidreport->check_by_finance == 1) {
            session()->flash('error', 'እቅዱን  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
            return redirect(route('ekid-report-list'));
        }

        return view('reporter.ekid-report-edit')
            ->with('ekidreport', $ekidreport)
            ->with('plan', Plan::all())
            ->with('transport', Transport::all())
            ->with('payment', Payment::all());

    }

    public function ekidReportUpdate(Request $request, int $id)
    {

//dd($request->all());
        $ekidreport = EkidReport::findorFail($id);

        $this->validate($request, [
            'nodate' => 'required',
            'transport_id' => 'required',
            'ekid_on_list' => 'required',
            'ekid_on_list_done' => 'required',
            'ekid_ont_on_list_done' => 'required',
            'not_done_reason' => 'required',
        ]);

//        if ($ekidreport->has('payment')) {
//            $payment_id = $request->payment;
//            $ekidreport['payment_id'] = $payment_id;
//        }
        $ekidreport->nodate = $request->nodate;
//        $ekidreport->title = $request->title;
//        $ekidreport->payment_id = $request->payment_id;
//        $ekidreport->plan_id = $request->plan_id;
//        $ekidreport->user_id = auth()->user()->id;
        $ekidreport->ekid_on_list = $request->ekid_on_list;
        $ekidreport->ekid_on_list_done = $request->ekid_on_list_done;
        $ekidreport->ekid_ont_on_list_done = $request->ekid_ont_on_list_done;
        $ekidreport->not_done_reason = $request->not_done_reason;
        $ekidreport->transport_id = $request->transport_id;

        $ekidreport->save();
        session()->flash('success', 'እቅድ ክንውን  እስተካክለሀል፡');
        return redirect(route('ekid-report-list'));

    }

    public function ekidReportViewOne($id)
    {
        $ekidreport = EkidReport::findorFail($id);
        return view('reporter.ekid-report-view-one')
            ->with('ekidreport', $ekidreport)
            ->with('payment', Payment::all())
            ->with('transport', Transport::all())
            ->with('plan', Plan::all());

    }


    public function ekidAbel($id)
    {

        $ekidreport = EkidReport::findorFail($id);
        $abelPayied = AbelReport::all();

        foreach ($abelPayied as $ab) {
            $abel_id = $ab->ekid_report_id;

            if ($id == $abel_id) {
                session()->flash('error', 'ውሎ አብል መዝግብሀል ፡ ድጋሚ መመዝገብ አትችልም');
                return redirect(route('ekid-report-list'));
            }

        }


        return view('reporter.ekid-abel')
            ->with('ekidreport', $ekidreport)
            ->with('payment', Payment::all())
            ->with('transport', Transport::all())
            ->with('plan', Plan::all());
    }


    function ekidAbelSave(Request $request, int $id)
    {

        $ekidreport = EkidReport::findorFail($id);

        $abelPayied = AbelReport::all();

        foreach ($abelPayied as $ab) {
            $abel_id = $ab->ekid_report_id;

            if ($id == $abel_id) {
                session()->flash('error', 'ውሎ አብል መዝግብሀል ፡ ድጋሚ መመዝገብ አትችልም');
                return redirect(route('ekid-report-list'));
            }

        }

        if ($request->ajax()) {
            $rules = array(
                'sdate.*' => 'required',
                'splace.*' => 'required',
                'dkplace.*' => 'required',
//                'dkbirr.*' => 'required',

                'dmplace.*' => 'required',
//                'dmbirr.*' => 'required',

                'deplace.*' => 'required',
//                'debirr.*' => 'required',

                'workddate.*' => 'required',

                'adarplace.*' => 'required',
//                'adarbirr.*' => 'required',
            );
            $error = Validator::make($request->all(), $rules);
            if ($error->fails()) {
                return response()->json([
                    'error' => $error->errors()->all()
                ]);
            }
            else {
                $sdate = $request->sdate;
                $splace = $request->splace;
                $dkplace = $request->dkplace;
//                $dkbirr = $request->dkbirr;

                $dmplace = $request->dmplace;
//                $dmbirr = $request->dmbirr;

                $deplace = $request->deplace;
//                $debirr = $request->debirr;

                $workddate = $request->workddate;

                $adarplace = $request->adarplace;
//                $adarbirr = $request->adarbirr;

                for ($count = 0; $count < count($splace); $count++) {
                    $data = array(
                        'user_id' => auth()->user()->id,
                        'plan_id' => $request->plan_id,
                        'payment_id' => $request->payment_id,
                        'ekid_report_id' => $id,

                        'sdate' => $sdate[$count],
                        'splace' => $splace[$count],
                        'dkplace' => $dkplace[$count],
//                        'dkbirr' => $dkbirr[$count],
                        'dmplace' => $dmplace[$count],
//                        'dmbirr' => $dmbirr[$count],
                        'deplace' => $deplace[$count],
//                        'debirr' => $debirr[$count],
                        'workddate' => $workddate[$count],
                        'adarplace' => $adarplace[$count],
//                        'adarbirr' => $adarbirr[$count],
                        'created_at' => \Carbon\Carbon::now(), # \Datetime()
                        'updated_at' => \Carbon\Carbon::now()  # \Datetime()
                    );

                    $insert_data[] = $data;

                }
                AbelReport::insert($insert_data);

                $ekidreport->ekid_status = '1';
                $ekidreport->save();
                return response()->json([
                    'success' => 'አብል መዝግበሀል ፡ መረጃውን ለማረጋግጥ ቀጣዩን በተን ተጫን.'
                ]);
            }

        } else {
            return response()->json([
                'error' => 'Data INsertion Error .'
            ]);
        }
    }

    public function abelInfo($id)
    {
        $ekidreport = EkidReport::findorFail($id);
//        $abelinfo = AbelReport::all();

//        foreach ($abelinfo as $ab){
//            $abId = $ab->ekid_report_id;
//
//            if($id != $abId){
//
//                session()->flash('error', 'ውሎ አብል አልመዘገብህም ፡ የትራንስፖርት አበለ መዝግብ ሚለውን ክሊክ ');
//                return redirect(route('ekid-report-list'));
//            }
//        }



            return view('reporter.abel-info')
                ->with('abelinfo', AbelReport::all()->where('ekid_report_id', $id))
                ->with('ekidreport', $ekidreport)
                ->with('payment', Payment::all())
                ->with('transport', Transport::all())
                ->with('plan', Plan::all());
    }

    public function abelEdit($id)
    {
        $abelinfo = AbelReport::findorFail($id);
//        $ekidreport = EkidReport::findorFail($id);

        if ($abelinfo->EkidReport->check_by_hidet == 1 || $abelinfo->EkidReport->check_by_super_hidet == 1 || $abelinfo->EkidReport->check_by_finance == 1) {
            session()->flash('error', 'ውሎ አበል  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
            return redirect(route('ekid-report-list'));
        }
        return view('reporter.abel-edit')
            ->with('abelinfo', $abelinfo)
            ->with('ekidreport', EkidReport::all())
            ->with('transport', Transport::all())
            ->with('payment', Payment::all())
            ->with('plan', Plan::all());
    }

    public function ekidEditSave(ReporterWuloAbelEditRequest $request, $id)
    {
        $abelinfo = AbelReport::findorFail($id);

//        $ekidreport = EkidReport::findorFail($id);

        if ($abelinfo->EkidReport->check_by_hidet == 1 || $abelinfo->EkidReport->check_by_super_hidet == 1 || $abelinfo->EkidReport->check_by_finance == 1) {
            session()->flash('error', 'ውሎ አበል  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
            return redirect(route('ekid-report-list'));
        }
        $sdate = $request->sdate;
        $splace = $request->splace;
        $dkplace = $request->dkplace;
        $dkbirr = $request->dkbirr;

        $dmplace = $request->dmplace;
        $dmbirr = $request->dmbirr;

        $deplace = $request->deplace;
        $debirr = $request->debirr;

        $workddate = $request->workddate;

        $adarplace = $request->adarplace;
        $adarbirr = $request->adarbirr;

        $abelinfo->sdate = $sdate;
        $abelinfo->splace = $splace;
        $abelinfo->dkplace = $dkplace;
        $abelinfo->dkbirr = $dkbirr;

        $abelinfo->dmplace = $dmplace;
        $abelinfo->dmbirr = $dmbirr;
        $abelinfo->deplace = $deplace;

        $abelinfo->debirr = $debirr;
        $abelinfo->workddate = $workddate;
        $abelinfo->adarplace = $adarplace;
        $abelinfo->adarbirr = $adarbirr;

        $abelinfo->save();
//        dd($user->save());
        session()->flash('success', ' የውሎ አበልና የትራንስፖርት:አስተካክለሀል ');
        return redirect(route('ekid-report-list'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
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
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
