<?php

namespace App\Http\Controllers\Self;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanStoreRequest;
use App\Plan;
use App\Transport;
use Illuminate\Support\Facades\Auth;

class WanaSelfController extends Controller
{

    public function selfEkidHome()
    {
        return view('wanaazegaj.self.self-ekid-home')->with('planlist', Plan::all()->sortByDesc('created_at'));
    }
    public function selfEkidCanceled()
    {
        return view('wanaazegaj.self.self-ekid-canceled')->with('planlist', Plan::all()->sortByDesc('created_at'));
    }


    public function selfEkidCreate()
    {
        return view('wanaazegaj.self.self-ekid-create')
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

        session()->flash('success', 'እቅዱ  ተልኳል ');
        return redirect(route('self-ekid-home-wana'));
    }

    public function selfEkidEdit($id)
    {
        $plan = Plan::findorFail($id);
        if ($plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
            session()->flash('error', 'እቅዱን  ማስተካከል እትችልም ፣  በሀላፊህ ጸድቋል ');
            return redirect(route('self-ekid-home-wana'));
        }

        return view('wanaazegaj.self.self-ekid-edit')->with('plan', $plan)->with('transport', Transport::all());

    }
}
