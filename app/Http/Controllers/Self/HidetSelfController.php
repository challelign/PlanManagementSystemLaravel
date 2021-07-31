<?php

namespace App\Http\Controllers\Self;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanStoreRequest;
use App\Plan;
use App\Transport;
use Illuminate\Support\Facades\Auth;

Auth::user();

class HidetSelfController extends Controller
{
    public function selfEkidHome()
    {
        return view('hidet.self.self-ekid-home')->with('planlist', Plan::all()->sortByDesc('created_at'));
    }

    public function selfEkidCanceled()
    {
        return view('hidet.self.self-ekid-canceled')->with('planlist', Plan::all()->sortByDesc('created_at'));
    }

    public function selfEkidCreate()
    {
        return view('hidet.self.self-ekid-create')
            ->with('planlist', Plan::all())
            ->with('transport', Transport::all());
    }

    public function selfEkidSave(PlanStoreRequest $request)
    {
//        dd($request->all());
        Plan::create([
            'title' => $request->title,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,
            'nodate' => $request->nodate,
            'pre_payment' => $request->pre_payment,
            'task' => $request->task,
            'transport_id' => $request->transport_id,
            'department_id' => Auth::user()->department_id,
            'department_name' => Auth::user()->department->name,
            'user_id' => auth()->user()->id,
        ]);

//        Plan::create($request->validated() + [
//                'department_id' => Auth::user()->department_id,
//                'department_name' => Auth::user()->department->name,
//                'user_id' => auth()->user()->id,
//            ]);
        session()->flash('success', 'እቅዱ  ተልኳል ');
        return redirect(route('self-ekid-home'));
    }

    public function selfEkidEdit($id)
    {
        $plan = Plan::findorFail($id);
        if ($plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
            session()->flash('error', 'እቅዱን  ማስተካከል እትችልም ፣  በሀላፊህ ጸድቋል ');
            return redirect(route('self-ekid-home'));
        }

        return view('hidet.self.self-ekid-edit')->with('plan', $plan)->with('transport', Transport::all());

    }

    public function selfEkidUpdate(\Illuminate\Http\Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'startdate' => 'required',

            'enddate' => 'required',
            'pre_payment' => 'required',
            'transport_id' => 'required',

            'nodate' => 'required|numeric|min:1',
            'task' => 'required|min:20'
        ]);
        $plan = Plan::findorFail($id);
        if ($plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
            session()->flash('error', 'እቅዱን  ማስተካከል እትችልም ፣  በሀላፊህ ጸድቋል ');
            return redirect(route('self-ekid-home'));
        }

//        $plan = Plan::find($id);
        if ($plan->has('transport')) {
            $transport_id = $request->transport_id;
            $plan['transport_id'] = $transport_id;
        }
        $plan->title = $request->title;
        $plan->startdate = $request->startdate;
        $plan->enddate = $request->enddate;
        $plan->nodate = $request->nodate;
        $plan->pre_payment = $request->nodate;

        $plan->task = $request->task;
        $plan->user_id = auth()->user()->id;
        $plan->transport_id = $request->transport_id;
        $plan->save();
        session()->flash('success', 'እቅዱ  ተልኳል ');
        return redirect(route('self-ekid-home'));
    }

    public function selfEkidDelete($id)
    {


        $plan = Plan::find($id);
        if ($plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
            session()->flash('error', 'እቅዱን  ማጥፋት እትችልም ፣  ለሂደትህ እመልክተሃል ');
            return redirect(route('self-ekid-home'));
        }
        $plan->delete();
        session()->flash('success', 'እቅዱ ጠፍቷል  ');
        return redirect(route('self-ekid-home'));
    }
}
