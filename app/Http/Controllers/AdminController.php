<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\AdminUserStoreRequest;
use App\Payment;
use App\Plan;
use App\Role;
use App\Transport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin')->except('logout');
//            ->only(['userRegister','allRegister','edit','update','destroy','makeInactive']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        if(request()->ajax()){
//           return datatables()->of(Department::latest()->get())->of(User::latest()->get());
//        }
//        return view('admin.index')->with('departments', Department::all())->with('users', User::all());

        if (Auth::check()) {
//            return view('admin.index')->with('departments', Department::all())->with('users', User::all());
            return view('admin.index');
        } else {
            return view('welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users')
            ->with('users', User::paginate(20))
            ->with('departments', Department::all())
            ->with('roles', Role::all());

    }

    public function allRegister(AdminUserStoreRequest $request)
    {

//        dd($request->all());


        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role_id' => $request->halafinet,
            'department_id' => $request->department,
            'password' => Hash::make($request['password'])
        ]);


        session()->flash('success', 'እዲስ ተጠቃሚ መዝግበሃል፡');
//        return redirect(route('all-register'));
        return redirect()->back();
//        return redirect(route('all-register'));

    }

    public function userRegister()
    {
        return view('admin.user-register')
            ->with('users', User::all())
            ->with('department', Department::all())
            ->with('roles', Role::all());


    }

    public function userUploadSign($id)
    {
        $user = User::findorFail($id);

        return view('admin.user-upload-sign')
            ->with('user', $user)
            ->with('department', Department::all())
            ->with('roles', Role::all());
    }

    function upload(Request $request, $id)
    {
        $user = User::findorFail($id);
        if ($request->ajax()) {

//            $user->name = $request->name;

            $image_data = $request->image;
            $image_array_1 = explode(";", $image_data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $image_name = time() . '.png';

            $upload_path = public_path('storage/crop_image/' . $image_name);
            file_put_contents($upload_path, $data);
            $user->upload_image = 'storage/crop_image/' . $image_name;
            $user->save();
            return response()->json([
                'path' => '/storage/crop_image/' . $image_name,
                'success'  => 'የ '.$user->name. ' ፊርማ አስገብተሀል :'
            ]);

        }
//        $user->upload_image = $upload_path;
//        $user->save();
        session()->flash('success', 'user profile updated ');
        return redirect(route('user-upload-sign'));

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //

        $user = User::findorFail($id);
        return view('admin.edit')
            ->with('users', $user)
            ->with('roles', Role::all())
            ->with('department', Department::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::find($id);


        if ($user->has('department')) {
            $department_id = $request->department;
            $user['department_id'] = $department_id;
        }
        if ($user->has('role')) {
            $role_id = $request->halafinet;
            $user['role_id'] = $role_id;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request['password']);
        $user->department_id = $department_id;
        $user->role_id = $role_id;
        $user->save();
//        dd($user->save());


        session()->flash('success', 'user profile updated ');
        return redirect(route('users-list'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorFail($id);

//        dd($user->plan()->count());

        if ($user->plan()->count() > 0) {
            session()->flash('error', 'You cannot delete the user, This user has   ' . $user->plan()->count() . ' number  of plans ');
            return redirect(route('users-list'));
        }


//        if ($user->plans()->check_by_hidet == 1 || $user->plans()->check_by_super_hidet == 1 || $user->plans()->check_by_finance == 1) {
//            session()->flash('error', 'You cannot delete the user, This user has number  of plans ');
//            return redirect(route('users-list'));
//        }

        if ($user->id == Auth::user()->id) {
            session()->flash('error', 'You cannot delete your account. ');
            return redirect(route('users-list'));
        }
//        dd($user->delete());
        $user->delete();
        session()->flash('success', 'The user is deleted  ');
        return redirect(route('users-list'));
    }


    public function makeInactive(User $user)
    {

        $user->active = '0';
        $user->save();
        session()->flash('success', 'You make User Inactive Successfully');

        return redirect(route('users-list'));

    }

    public function makeActive(User $user)
    {

        $user->active = '1';
        $user->save();
        session()->flash('success', 'You make User Active Successfully');

        return redirect(route('users-list'));

    }

    public function changePassword()
    {
        return view('admin.change-password');

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

    public function userProfile($id)
    {
        $user = User::findorFail($id);

        return view('admin.user-profile')
            ->with('users', $user)
            ->with('roles', Role::all())
            ->with('plans', Plan::where('user_id', $id)->paginate(10))
            ->with('department', Department::all());

    }

}
