<?php


namespace App\Http\Controllers;

use App\Department;
use App\Payment;
use App\Plan;
use App\Transport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WanaAzegajiController extends Controller
{
    public function __construct()
    {
        $this->middleware('wanaazegaj');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wanaazegaj.index');

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

    public function viewDetails($id)
    {
        $plan = Plan::findorFail($id);
//
//        if ($plan->check_by_hidet == 1 || $plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
//            session()->flash('error', 'እቅዱን  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
//            return redirect(route('plan'));
//        }
        return view('wanaazegaj.view-details')
            ->with('plan', $plan)
            ->with('transport', Transport::all())
            ->with('users', User::all())
            ->with('department', Department::all());

    }

    public function listSingle($id)
    {
        $plan = Plan::findorFail($id);

        return view('wanaazegaj.single-article')
            ->with('plan', $plan)
            ->with('transport', Transport::all())
            ->with('department', Department::all())
            ->with('users', User::all())
            ->with('payment', Payment::all());

    }


    public function approvePlan(Request $request, $id)
    {

        $approve = Plan::findorFail($id);
        $approve->sign_name_wana = Auth::user()->name;

        $approve->sign_name_wana_image = Auth::user()->upload_image;
        $approve->check_by_super_hidet = '1';
        $approve->save();

        session()->flash('success', 'The Plan is Approved ');
        return redirect(route('wanaazegaj'));
    }
    public function wanaCancelPlan(Request $request, $id)
    {

        $approve = Plan::findorFail($id);
        $approve->cancel_name_wana = Auth::user()->name; // wanaazegaje
        $approve->cancel = '1';
//        $approve->check_by_hidet = '0';
        $approve->save();
        session()->flash('error', 'እቅዱን ውድቅ አድርገሀል ');
        return redirect()->back();
    }

    public function wanaCancelEkidList()
    {
        return view('wanaazegaj.rejected.cancel-ekid')
            ->with('planlist', Plan::all())
            ->with('transport', Transport::all())
            ->with('department', Department::all());

    }

    public function listAll()
    {
//        $plan = Plan::findorFail($id);
//
//        if ($plan->check_by_hidet == 1 || $plan->check_by_super_hidet == 1 || $plan->check_by_finance == 1) {
//            session()->flash('error', 'እቅዱን  ማስተካል እትችልም ፣  ለሂደትህ እመልክተሃል ');
//            return redirect(route('plan'));
//        }
        return view('wanaazegaj.list-all')
            ->with('planlist', Plan::all())
            ->with('transport', Transport::all())
            ->with('users', User::all())
            ->with('department', Department::all());

    }
    public function listAllMDirector()
    {
        return view('wanaazegaj.hidet.list-all-mdirector')
            ->with('planlist', Plan::all())
            ->with('transport', Transport::all())
            ->with('users', User::all())
            ->with('department', Department::all());

    }
    public function wanaCancelAllmdirector()
    {
        return view('wanaazegaj.rejected.cancel-all-mdirector')
            ->with('planlist', Plan::all())
            ->with('transport', Transport::all())
            ->with('users', User::all())
            ->with('department', Department::all());

    }






    public function changePassword()
    {
        return view('wanaazegaj.change-password');

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
        return redirect(route('wanaazegaj'));

    }
    public function profileSign(){
        return view('wanaazegaj.profile-sign');
    }




    public function hidetEkidList(){
        return view('wanaazegaj.hidet.hidet-ekid-list')->with('planlist', Plan::all());
    }
}
