<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\PlanStoreRequest;
use App\Payment;
use App\Plan;
use App\Transport;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ReporterController extends Controller
{

//

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('reporter.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('reporter.plan')->with('planlist', Plan::all()->sortByDesc('id'));
    }

    public function planSeen()
    {
        $planlist = Plan::all()->sortByDesc('id');

        foreach ($planlist as $plist) {
            if ($plist->check_by_hidet == 1
                && $plist->check_by_super_hidet == 1
                && $plist->check_by_finance == 1 && $plist->status == 0) {
                if ($plist->payment->total > 0) {

                    session()->flash('error', 'እቅድ ክንውን መሙላት እትችልም ፣ያላወራረድኽውን እቅድ ምረጥ');
                    return view('reporter.plan-seen')
                        ->with('transport', Transport::all())
                        ->with('department', Department::all())
                        ->with('payment', Payment::all());
                }
            }
        }

//        return view('reporter.plan-seen')
//            ->with('planlist', $planlist)
//            ->with('transport', Transport::all())
//            ->with('department', Department::all())
//            ->with('payment', Payment::all());
    }

    public function register()
    {
        $plan = Plan::all();

        foreach ($plan as $pl) {
            if (($pl->is_plan_complated == 0 && $pl->status == 0  && Auth::user()->id == $pl->user_id) && $pl->cancel == 0 ) {
                session()->flash('error', 'እቅድ መሙላት እትችልም ፣  የመዘገብኽውን እቅድ አላወራረድኽም /እቅድ ክንውን አልጨረስህም ');
                return redirect(route('plan'));
            }
            if ($pl->is_plan_complated == 0 && $pl->status == 0 && $pl->cancel == 1 && Auth::user()->id == $pl->user_id) {

                return view('reporter.register')
                    ->with('transport', Transport::all());
            }
        }
        return view('reporter.register')
            ->with('transport', Transport::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */


    public function store(PlanStoreRequest $request)
    {
//        $start = Carbon::createFromFormat('d/m/Y', $request->startdate)->format('Y-m-d');
//        $end = Carbon::createFromFormat('d/m/Y', $request->enddate)->format('Y-m-d');

//        dd($request->all());


        Plan::create([
            'title' => $request->title,
            'department_id' => Auth::user()->department_id,
            'department_name' => Auth::user()->department->name,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,
            'nodate' => $request->nodate,
            'task' => $request->task,
            'pre_payment' => $request->pre_payment,
            'user_id' => auth()->user()->id,
            'transport_id' => $request->transport_id

        ]);


        session()->flash('success', 'እቅዱ  ተልኳል ');
        return redirect(route('plan'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $plan = Plan::findorFail($id);

        return view('reporter.show')
            ->with('plan', $plan)
            ->with('transport', Transport::all())
            ->with('department', Department::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function edit($id)
    {

        $plan = Plan::findorFail($id);

        if ($plan->check_by_hidet == 1 || $plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
            session()->flash('error', 'እቅዱን  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
            return redirect(route('plan'));
        }
        return view('reporter.register')->with('plan', $plan)->with('transport', Transport::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
            'nodate' => 'required',
            'pre_payment' => 'required',
            'transport_id' => 'required',
            'task' => 'required'
        ]);

        $plan = Plan::find($id);

        if ($plan->check_by_hidet == 1 || $plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
            session()->flash('error', 'እቅዱን  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
            return redirect(route('plan'));
        }
//        $start = Carbon::createFromFormat('d/m/Y', $request->startdate)->format('Y-m-d');
//        $end = Carbon::createFromFormat('d/m/Y', $request->enddate)->format('Y-m-d');

        if ($plan->has('transport')) {
            $transport_id = $request->transport_id;
            $plan['transport_id'] = $transport_id;
        }


        $plan->title = $request->title;
        $plan->startdate = $request->startdate;
        $plan->enddate = $request->enddate;
        $plan->nodate = $request->nodate;
        $plan->task = $request->task;
        $plan->pre_payment = $request->pre_payment;
        $plan->user_id = auth()->user()->id;
        $plan->transport_id = $request->transport_id;
        $plan->save();
//        dd($plan->save());


//        dd($plan->update());
        session()->flash('success', 'እቅዱ ተስተካክሎ  ተልኳል ');
        return redirect(route('plan'));
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


        $plan = Plan::find($id);
        if ($plan->check_by_hidet == 1 || $plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
            session()->flash('error', 'እቅዱን  ማጥፋት እትችልም ፣  ለሂደትህ እመልክተሃል ');
            return redirect(route('plan'));
        }
        $plan->delete();
        session()->flash('success', 'እቅዱ ጠፍቷል  ');
        return redirect(route('plan'));
    }


    public function userChangePassword()
    {
//        return view('change-password');
        return view('reporter.reporter-password');


    }

    public function userUpdatePassword(Request $request)
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


}
