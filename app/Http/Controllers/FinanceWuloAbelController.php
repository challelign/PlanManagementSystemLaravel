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
use Illuminate\Support\Facades\DB;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use phpDocumentor\Reflection\Types\True_;
use Validator;

use App;

class FinanceWuloAbelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('finance');
    }

    public function index()
    {
        //
    }

    public function ekidReportList()
    {
        return view('finance.report.ekid-report-list')
            ->with('plan', Plan::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all())
            ->with('ekidreport', EkidReport::all()->sortByDesc('id'))
            ->with('abelinfo', AbelReport::all());
    }

    public function financeReportDetails($id)
    {
//        if ($ekidreport = EkidReport::findorFail($id)) {
        $ekidreport = EkidReport::findorFail($id);;
        return view('finance.report.finance-report-approve-details')
            ->with('plan', Plan::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all())
            ->with('abelinfo', AbelReport::all()->where('ekid_report_id', $id))
            ->with('ekidreport', $ekidreport)
            ->with('users', User::all());

    }

    public function financeReportForm($id)
    {


        $ekidreport = EkidReport::findorFail($id);
        if ($ekidreport->check_by_hidet == 1 && $ekidreport->check_by_super_hidet == 1 && $ekidreport->check_by_finance == 1) {
            session()->flash('error', 'ውሎ አበል ከፍለሀል  ፣ድጋሚ መፈጸም እትችልም ');
            return redirect(route('finance'));
//            return redirect()->back();
        }
//        $abelinfo = DB::table('abel_reports')->where('ekid_report_id',$id)->get();

        return view('finance.report.finance-report-approve-form')
            ->with('plan', Plan::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all())
//            ->with('abelinfo', $abelinfo)
            ->with('abelinfo', DB::table('abel_reports')->where('ekid_report_id', $id)->get())
            ->with('ekidreport', $ekidreport)
            ->with('users', User::all());

    }

    public function abelTable()
    {
        $data = DB::table('abel_reports')->get();
//        $data = DB::table('abel_reports')->where('id',6)->get();

        return view('table_edit', compact('data'));
    }

    public function action(Request $request)
    {
//        dd($request->AbelReport::findorFail($id));
//        dd($abelinfo = AbelReport::findorFail($id));
//        $ekidreport = EkidReport::findorFail($id);
//        if ($ekidreport->check_by_hidet == 1 && $ekidreport->check_by_super_hidet == 1 && $ekidreport->check_by_finance == 1) {
//            session()->flash('success', 'ውሎ አበል ከፍሀል  ፣  መፈጸም እትችልም ');
//            return redirect(route('finance'));
//        }

        if ($request->ajax()) {
            if ($request->action == 'edit') {
                $data = array(
                    'dkbirr' => $request->dkbirr,
                    'dmbirr' => $request->dmbirr,
                    'debirr' => $request->debirr,
                    'adarbirr' => $request->adarbirr,


                    'nodatef' => $request->nodatef,
                    'wuloabel_meten' => $request->wuloabel_meten,
                    'transport_birr' => $request->transport_birr,
                    'nedaje_qibat' => $request->nedaje_qibat,
                    'alga' => $request->alga,
                    'total' => $request->total,


                );
                DB::table('abel_reports')
                    ->where('id', $request->id)
                    ->update($data);
            }
//            if ($request->action == 'delete') {
//                DB::table('abel_reports')
//                    ->where('id', $request->id)
//                    ->delete();
//            }
            return response()->json($request);
        }
    }


    public function financeReportSaveFinal(Request $request, $id)
    {

//        dd($request->all());
//        dd($ekidreport = EkidReport::findorFail($id));
        $ekidreport = EkidReport::findorFail($id);


        if ($ekidreport->check_by_hidet == 1 && $ekidreport->check_by_super_hidet == 1 && $ekidreport->check_by_finance == 1) {
            session()->flash('error', 'ውሎ አበል ከፍለሀል  ፣ ድጋሚፋ  መፈጸም እትችልም ');
            return redirect(route('finance'));

        }

        $this->validate($request, [
            'voucher_no' => 'required|unique:ekid_reports',
            'abel_total' => 'required',
            'temelash' => 'required',
            'yetekefel' => 'required',
            'datef' => 'required',

        ]);

        if ($ekidreport->has('plan')) {
            if (!$ekidreport->plan_id == null) {
                $plan = Plan::findorFail($ekidreport->plan_id);
                $plan->is_plan_complated = 1;
                $plan->save();
            }
        }
        $ekidreport->check_by_finance = '1';
        $ekidreport->is_ekid_complated = '1';


        $ekidreport->approved_by = auth()->user()->name;
        $ekidreport->approved_by_image = auth()->user()->upload_image;

        $ekidreport->voucher_no = $request->voucher_no;
        $ekidreport->abel_total = $request->abel_total;
        $ekidreport->yetekefel = $request->yetekefel;
        $ekidreport->temelash = $request->temelash;
        $ekidreport->datef = $request->datef;


        $ekidreport->save();;


        session()->flash('success', 'ውሎ አበል ከፍለሀል ፡ፕሪንት አርገህ መረጃውን  ማህደር አድርግ ፡');
        return redirect()->route('ekid-print-list',$id);
//        return redirect()->route('finance');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function DonePaymentEkidEnd()
    {

        return view('finance.report.done-payment-ekid-end')
            ->with('plan', Plan::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all())
            ->with('ekidreport', EkidReport::all()->sortByDesc('id'))
            ->with('abelinfo', AbelReport::all());
    }    public function DonePaymentEkidEndSelf()
    {

        return view('finance.report.done-payment-ekid-end-self')
            ->with('plan', Plan::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all())
            ->with('ekidreport', EkidReport::all()->sortByDesc('id'))
            ->with('abelinfo', AbelReport::all());
    }

    public function EkidPrintList()
    {
        return view('finance.report.ekid-print-list')
            ->with('plan', Plan::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all())
            ->with('ekidreport', EkidReport::all()->sortByDesc('id'))
            ->with('abelinfo', AbelReport::all());

    }


    public function EkidPrint($id)
    {
//       dd( $ekidreport = EkidReport::findorFail($id));
        $ekidreport = EkidReport::findorFail($id);
        return view('finance.report.ekid-print')
            ->with('plan', Plan::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all())
            ->with('abelinfo', AbelReport::all()->where('ekid_report_id', $id))
            ->with('ekidreport', $ekidreport)
            ->with('users', User::all());
    }

    public function FinalPrint($id)
    {
        $ekidreport = EkidReport::findorFail($id);



        return view('finance.report.print')
            ->with('plan', Plan::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all())
            ->with('abelinfo', AbelReport::all()->where('ekid_report_id', $id))
            ->with('ekidreport', $ekidreport)
            ->with('users', User::all());





//        view()->share('ekidreport', $ekidreport);
//        view()->share('abelinfo', AbelReport::all()->where('ekid_report_id', $id));
//        $pdf = PDF::loadView('finance.report.print', $ekidreport);
//        $pdf->SetProtection(['copy', 'print'], '', 'pass');
//        $fileName = $ekidreport->user->name;
//        return $pdf->stream($fileName . '.pdf');

    }

    public function directorateEkidReportList($id){

          $department = Department::findorFail($id);

        return view('finance.directorate.directorate-ekid-report-list')
            ->with('department', $department)
            ->with('planlist', Plan::all()->where('department_id', $id)->sortByDesc('id'))
            ->with('users', User::all())
            ->with('ekidreport', EkidReport::all())
            ->with('abelinfo', AbelReport::all())
            ->with('payment', Payment::all());
    }

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
