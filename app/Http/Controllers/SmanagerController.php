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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SmanagerController extends Controller
{
    public function index()
    {


        $planlist = Plan::all();

        /*     foreach ($planlist as $p) {
                 $department = Department::all()->where('id', $p->department_id);
                 $dept = $department->sortByDesc('name')->pluck('name')->unique();
             }*/
        $dept = $planlist->sortByDesc('department_name')->pluck('department_name')->unique();

        return view('smanager.index', compact('planlist', 'department', 'dept'));

//        return view('smanager.index');

    }

    public function mazegajEkid()
    {

        $planlist = Plan::all();
        $dept = $planlist->sortByDesc('department_name')->pluck('department_name')->unique();
        return view('smanager.hidet.mazegaj-ekid', compact('department', 'dept', 'planlist', Plan::all()->sortByDesc('created_at')));

    }

    public function wanaazegajEkid()
    {

        $planlist = Plan::all();


        /*        foreach ($planlist as $p) {
                    $department = Department::all()->where('id', $p->department_id);
                    $dept = $department->sortByDesc('name')->pluck('name')->unique();
        }*/

//        this way
        $dept = $planlist->sortByDesc('department_name')->pluck('department_name')->unique();


        return view('smanager.hidet.wanaazegaj-ekid', compact('dept', 'planlist', Plan::all()->sortByDesc('created_at')));

//        return view('smanager.hidet.wanaazegaj-ekid')->with('planlist', Plan::all()->sortByDesc('created_at'));
    }

    public function mazegajEkidChecked()
    {
        $planlist = Plan::all();
        $dept = $planlist->sortByDesc('department_name')->pluck('department_name')->unique();
        return view('smanager.hidet.mazegaj-ekid-checked', compact('dept', 'planlist', Plan::all()->sortByDesc('created_at')));
    }
    public function wanaazegajEkidChecked()
    {
        $planlist = Plan::all();
        $dept = $planlist->sortByDesc('department_name')->pluck('department_name')->unique();
        return view('smanager.hidet.wanaazegaj-ekid-checked', compact('dept', 'planlist', Plan::all()->sortByDesc('created_at')));
    }


    public function viewDetails($id)
    {
        $plan = Plan::findorFail($id);
//
//        if ($plan->check_by_hidet == 1 || $plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
//            session()->flash('error', 'እቅዱን  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
//            return redirect(route('plan'));
//        }
        return view('smanager.view-details')
            ->with('plan', $plan)
            ->with('transport', Transport::all())
            ->with('users', User::all())
            ->with('department', Department::all());

    }

    public function listSingle($id)
    {
        $plan = Plan::findorFail($id);

        return view('smanager.single-article')
            ->with('plan', $plan)
            ->with('transport', Transport::all())
            ->with('department', Department::all())
            ->with('users', User::all())
            ->with('payment', Payment::all());

    }


    public function approvePlan(Request $request, $id)
    {

        $approve = Plan::findorFail($id);
        $approve->sign_name_smanager = Auth::user()->name;

        $approve->sign_name_smanager_image = Auth::user()->upload_image;
        $approve->check_by_smanager = '1';
        $approve->save();

        session()->flash('success', 'The Plan is Approved ');
        return redirect(route('smanager'));
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

    public function listAll()
    {
//        $plan = Plan::findorFail($id);
//
//        if ($plan->check_by_hidet == 1 || $plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
//            session()->flash('error', 'እቅዱን  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
//            return redirect(route('plan'));
//        }
        return view('smanager.list-all')
            ->with('planlist', Plan::all())
            ->with('transport', Transport::all())
            ->with('users', User::all())
            ->with('department', Department::all());

    }

    public function smanagerCancelPlan(Request $request, $id)
    {

        $approve = Plan::findorFail($id);
        $approve->cancel_name_smanager = Auth::user()->name; // smanager
        $approve->cancel = '1';
//        $approve->check_by_hidet = '0';
        $approve->save();
        session()->flash('error', 'እቅዱን ውድቅ አድርገሀል ');
        return redirect()->back();
    }

    public function smanagerCancelEkidList()
    {
        return view('smanager.rejected.cancel-ekid')
            ->with('planlist', Plan::all())
            ->with('transport', Transport::all())
            ->with('department', Department::all());

    }

    public function changePassword()
    {
        return view('smanager.change-password');

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
        session()->flash('success', 'Password Changed Successfully.');
        return redirect(route('smanager'));

    }

    public function profileSign()
    {
        return view('smanager.profile-sign');
    }


    public function directorateEkidList($id)
    {
        $department = Department::findorFail($id);

        return view('smanager.directorate.directorate-ekid-list')
            ->with('department', $department)
            ->with('planlist', Plan::all()->where('department_id', $id)->sortByDesc('id'))
            ->with('users', User::all())
            ->with('ekidreport', EkidReport::all())
            ->with('abelinfo', AbelReport::all())
            ->with('payment', Payment::all());
    }

}
