<?php

namespace App\Http\Controllers;

use App\Department;
use App\Payment;
use App\Plan;
use App\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HidetMeriContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hidet.index');
    }


    public function viewDetails($id)
    {
        $plan = Plan::findorFail($id);
//
//        if ($plan->check_by_hidet == 1 || $plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
//            session()->flash('error', 'እቅዱን  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
//            return redirect(route('plan'));
//        }
        return view('hidet.view-details')
            ->with('plan', $plan)
            ->with('transport', Transport::all())
            ->with('department', Department::all());

    }

    public function listSingle($id)
    {
        $plan = Plan::findorFail($id);

        return view('hidet.single-article')
            ->with('plan', $plan)
            ->with('transport', Transport::all())
            ->with('department', Department::all())
            ->with('payment', Payment::all());

    }


    public function approvePlan(Request $request, $id)
    {

        $approve = Plan::findorFail($id);
        $approve->sign_name = Auth::user()->name;
        $approve->sign_name_image = Auth::user()->upload_image;
        $approve->check_by_hidet = '1';
        $approve->department_id = Auth::user()->department_id;
        $approve->save();

        session()->flash('success', 'The Plan is Approved ');
        return redirect(route('hidet'));
    }

    public function cancelPlan(Request $request, $id)
    {

        $approve = Plan::findorFail($id);
        $approve->cancel_name = Auth::user()->name;
        $approve->cancel = '1';
//        $approve->check_by_hidet = '0';
        $approve->save();

        session()->flash('error', 'እቅዱን ውድቅ አድርገሀል ');
        return redirect()->back();
    }
//    public function reApprovePlan(Request $request, $id)
//    {
//
//        $approve = Plan::findorFail($id);
//        $approve->check_by_hidet = '1';
//        $approve->department_id = Auth::user()->department_id;
//        $approve->cancel = '0';
//        $approve->sign_name = Auth::user()->name;
//        $approve->sign_name_image = Auth::user()->upload_image;
//        $approve->cancel_name ='';
//        $approve->save();
//
//        session()->flash('success', 'እቅዱን በድጋሚ አጸድቀሀል ');
//        return redirect()->back();
//    }

    public function listAll()
    {
//        $plan = Plan::findorFail($id);
//
//        if ($plan->check_by_hidet == 1 || $plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
//            session()->flash('error', 'እቅዱን  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
//            return redirect(route('plan'));
//        }
        return view('hidet.list-all')
            ->with('planlist', Plan::all())
            ->with('transport', Transport::all())
            ->with('department', Department::all());

    }

    public function cancelEkid()
    {
        return view('hidet.rejected.cancel-ekid')
            ->with('planlist', Plan::all())
            ->with('transport', Transport::all())
            ->with('department', Department::all());

    }


    public function changePassword()
    {
        return view('hidet.change-password');

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
        return redirect(route('hidet'));

    }

    public function profileSign()
    {
        return view('hidet.profile-sign');
    }

}
