<?php

namespace App\Http\Controllers;

use App;
use App\AbelReport;
use App\Department;
use App\EkidReport;
use App\Payment;
use App\Plan;
use App\Transport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDF;


class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('finance.index');
    }

    public function donePaymentFirst()
    {

        return view('finance.done-payment-first')
            ->with('department', Department::all())
            ->with('donePayment', Plan::all()->sortByDesc('id'))
//
//            ->where('check_by_super_hidet' ,'1')
//            ->where('check_by_hidet' ,'1')
//            ->where('check_by_finance', '1'))
            ->with('users', User::all())
            ->with('payment', Payment::all());
    }

    public function donePaymentEnd()
    {

        return view('finance.done-payment-end')
            ->with('department', Department::all())
            ->with('donePayment', Plan::all()->sortByDesc('id'))
            ->with('users', User::all())
            ->with('payment', Payment::all());
    }

    public function donePaymentEndSelf()
    {

        return view('finance.done-payment-end-self')
            ->with('department', Department::all())
            ->with('donePayment', Plan::all()->sortByDesc('id'))
            ->with('users', User::all())
            ->with('payment', Payment::all());
    }

    public function viewDetails($id)
    {
        $plan = Plan::findorFail($id);
//
//        if ($plan->check_by_hidet == 1 || $plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
//            session()->flash('error', 'እቅዱን  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
//            return redirect(route('plan'));
//        }
        return view('finance.view-details')
            ->with('plan', $plan)
            ->with('transport', Transport::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all());

    }

    public function firstPaymentStep1(Request $request, $id)
    {
        $plan = Plan::findorFail($id);
        $planStep = $request->session()->get('planStep ');
//        return view('products.create-step1',compact('planStep', $planStep));
//
//        if ($plan->check_by_hidet == 1 || $plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
//            session()->flash('error', 'እቅዱን  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
//            return redirect(route('plan'));
//        }
        return view('finance.first-payment ')
            ->with('plan', $plan)
            ->with('planStep', $planStep)
            ->with('transport', Transport::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all());

    }

    public function paymentSaveStep1(Request $request, $id)
    {
//        dd($request->all());
        $payment = Plan::findorFail($id);

        if ($payment->check_by_hidet == 1 && $payment->check_by_super_hidet == 1 && $payment->check_by_finance == 1) {
            session()->flash('error', 'ክፍያ መፈጸም እትችልም ፣  ክፍያ ተከፍሏል ');
            return redirect(route('finance'));
        }

        $validatedData = $request->validate([
            'wuloabel' => 'required|numeric|min:0',
            'transport' => 'required|numeric|min:0',
            'metebabekiya' => 'required|numeric|min:0',
            'nafta_oil' => 'required|numeric|min:0',
            'other' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
//            'voucher_no' => 'required|unique:payments',
//            'pdate' => 'required',
//            'plan_id'=>'required|unique'
        ]);

        if (empty($request->session()->get('planStep'))) {
            $planStep = new Payment();
            $planStep->fill($validatedData);
            $request->session()->put('planStep', $planStep);
        } else {
            $planStep = $request->session()->get('planStep');
            $planStep->fill($validatedData);
            $request->session()->put('planStep', $planStep);
        }
//        if ($payment->has('plan')) {
//            $department_id = $request->department;
//            $user['department_id'] = $department_id;
//        }



//        Payment::create([
//            'wuloabel' => $request->wuloabel,
//            'transport' => $request->transport,
//            'metebabekiya' => $request->metebabekiya,
//            'nafta_oil' => $request->nafta_oil,
//            'other' => $request->other,
//            'total' => $request->total,
//            'voucher_no' => $request->voucher_no,
//            'pdate' => $request->pdate,
//            'plan_id' => $payment->id,
//            'approved_by' => Auth::user()->name,
//            'approved_by_image' => Auth::user()->upload_image,
//            'user_id' => $payment->user->id,
//
//        ]);


//        $payment->payment_id = $payment->id;

//        $payment->save();

//        $pid = Payment::all()->where('plan_id' ,$id);


//        chalie comment start

//        $pid = Payment::all()->where('plan_id', $id);
//        foreach ($pid as $pp) {
//            $payment_id = $pp->id;
//        }
////        dd($payment_id);
//
//        $payment->check_by_finance = '1';
//
//
//        $payment->payment_id = $payment_id;
//        $payment->save();

//        chalie comment end

//        $payment->wuloabel = $request->wuloabel;
//        $payment->transport = $request->transport;
//        $payment->metebabekiya = $request->metebabekiya;
//        $payment->nafta_oil = $request->nafta_oil;
//        $payment->other = $request->other;
//
//        $payment->plan_id = $payment->id;
//        $payment->approved_by = Auth::user()->name;
//        $payment->user_id = $payment->user->id;
//        $payment->wuloabel = $request->wuloabel;

//        dd($payment);
//        $payment->save();


//        session()->flash('success', 'ክፍያ ተፈጽሟል  ፡ ደረሰኝ ፕሪንት አርገህ ማህደር አድርግ ');
//        return redirect(route('sample-print', $id));
        //        return redirect(route('invoice-print',$payment->id));


        return redirect(route('first-payment-step2',$id));
    }

    public function firstPaymentStep2(Request $request, $id)
    {
        $plan = Plan::findorFail($id);
        $planStep = $request->session()->get('planStep ');
//        return view('products.create-step1',compact('planStep', $planStep));
//
//        if ($plan->check_by_hidet == 1 || $plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
//            session()->flash('error', 'እቅዱን  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
//            return redirect(route('plan'));
//        }
        return view('finance.first-payment-step2')
            ->with('plan', $plan)
            ->with('planStep', $planStep)
            ->with('transport', Transport::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all());

    }

    public function paymentSaveStep2(Request $request, $id)
    {
//        dd($request->all());
        $payment = Plan::findorFail($id);

        if ($payment->check_by_hidet == 1 && $payment->check_by_super_hidet == 1 && $payment->check_by_finance == 1) {
            session()->flash('error', 'ክፍያ መፈጸም እትችልም ፣  ክፍያ ተከፍሏል ');
            return redirect(route('finance'));
        }

        $validatedData = $request->validate([
//            'wuloabel' => 'required|numeric|min:0',
//            'transport' => 'required|numeric|min:0',
//            'metebabekiya' => 'required|numeric|min:0',
//            'nafta_oil' => 'required|numeric|min:0',
//            'other' => 'required|numeric|min:0',
//            'total' => 'required|numeric|min:0',
            'voucher_no' => 'required|unique:payments',
            'pdate' => 'required',
//            'plan_id'=>'required|unique'
        ]);

        if (empty($request->session()->get('planStep'))) {
            $planStep = new Payment();
            $planStep->fill($validatedData);
            $request->session()->put('planStep', $planStep);
        } else {
            $planStep = $request->session()->get('planStep');
            $planStep->fill($validatedData);
            $request->session()->put('planStep', $planStep);
        }
//        if ($payment->has('plan')) {
//            $department_id = $request->department;
//            $user['department_id'] = $department_id;
//        }



//        Payment::create([
//            'wuloabel' => $request->wuloabel,
//            'transport' => $request->transport,
//            'metebabekiya' => $request->metebabekiya,
//            'nafta_oil' => $request->nafta_oil,
//            'other' => $request->other,
//            'total' => $request->total,
//            'voucher_no' => $request->voucher_no,
//            'pdate' => $request->pdate,
//            'plan_id' => $payment->id,
//            'approved_by' => Auth::user()->name,
//            'approved_by_image' => Auth::user()->upload_image,
//            'user_id' => $payment->user->id,
//
//        ]);


//        $payment->payment_id = $payment->id;

//        $payment->save();

//        $pid = Payment::all()->where('plan_id' ,$id);


//        chalie comment start

//        $pid = Payment::all()->where('plan_id', $id);
//        foreach ($pid as $pp) {
//            $payment_id = $pp->id;
//        }
////        dd($payment_id);
//
//        $payment->check_by_finance = '1';
//
//
//        $payment->payment_id = $payment_id;
//        $payment->save();

//        chalie comment end

//        $payment->wuloabel = $request->wuloabel;
//        $payment->transport = $request->transport;
//        $payment->metebabekiya = $request->metebabekiya;
//        $payment->nafta_oil = $request->nafta_oil;
//        $payment->other = $request->other;
//
//        $payment->plan_id = $payment->id;
//        $payment->approved_by = Auth::user()->name;
//        $payment->user_id = $payment->user->id;
//        $payment->wuloabel = $request->wuloabel;

//        dd($payment);
//        $payment->save();


//        session()->flash('success', 'ክፍያ ተፈጽሟል  ፡ ደረሰኝ ፕሪንት አርገህ ማህደር አድርግ ');
//        return redirect(route('sample-print', $id));
        //        return redirect(route('invoice-print',$payment->id));


        return redirect(route('first-payment-step2',$id));
    }



















































    public function samplePrint()
    {
//        $plan = Plan::findorFail($id);


//            ->with('payment', Payment::all()->where('plan_id' == $id));


        return view('finance.sample-print')
            ->with('department', Department::all())
            ->with('donePayment', Plan::all())
            ->with('users', User::all())
            ->with('payment', Payment::all());

    }

    public function invoicePrint($id)
    {
        $plan = Plan::findorFail($id);
//        $payment = Payment::all()->where('plan_id','');

//        if($plan->id == $payment){
        return view('finance.invoice-print')
            ->with('plan', $plan)
            ->with('transport', Transport::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all()->where('plan_id', $id)->sortByDesc('id'));

    }

    public function echo($id)
    {


        $plan = Plan::findorFail($id);

        return view('finance.print')
            ->with('plan', $plan)
            ->with('transport', Transport::all())
            ->with('department', Department::all())
            ->with('users', User::all())
            ->with('payment', Payment::all()->where('plan_id', $id));


//
//        view()->share('plan',$plan);
//        $pdf = PDF::loadView('finance.print', $plan)
//            ->setPaper('a4','portrait');
//        $fileName= $plan->title;
//        return $pdf->stream($fileName.'.pdf');

//        return $pdf->stream($fileName.'.pdf');

    }
//    public function pdf()
//    {
//        $pdf = \App::make('dompdf.wrapper');
//        $pdf->loadHTML($this->convert_customer_data_to_html('id'));
////        return $pdf->stream();
//        dd($pdf->stream());
//    }
//
//    public function convert_customer_data_to_html($id)
//    {
//        $customer_data = with('plan', Plan::findorFail($id))
//            ->with('transport', Transport::all())
//            ->with('department', Department::all())
//            ->with('payment', Payment::all()->where('plan_id' == $id));
//
//        $output = '
//     <h3 align="center">Customer Data</h3>
//     <table width="100%" style="border-collapse: collapse; border: 0px;">
//      <tr>
//    <th>Name</th>
//    <th>Task</th>
//   </tr>
//     ';
//        foreach ($customer_data as $p) {
//            $output .= '
//      <tr>
//       <td style="border: 1px solid; padding:12px;">' . $p->title . '</td>
//       <td style="border: 1px solid; padding:12px;">' . $p->task . '</td>
//      </tr>
//      ';
//        }
//        $output .= '</table>';
//        return $output;
//    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function directorateEkidList($id)
    {
        $department = Department::findorFail($id);

        return view('finance.directorate.directorate-ekid-list')
            ->with('department', $department)
            ->with('planlist', Plan::all()->where('department_id', $id)->sortByDesc('id'))
            ->with('users', User::all())
            ->with('ekidreport', EkidReport::all())
            ->with('abelinfo', AbelReport::all())
            ->with('payment', Payment::all());
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


    public function changePassword()
    {
        return view('finance.change-password');

    }

    public function updatePassword(Request $request)
    {
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return back()->with('error', 'Your Old password does not match to our database.');
        }
        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return back()->with('error', 'The new password cannot be the same with Your Current password .');
        }
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed'
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return back()->with('success', 'Password Changed Successfully.');

    }

    public function profileSign()
    {
        return view('finance.profile-sign');
    }
}
