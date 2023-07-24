<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function check_acccount_type()
    {
        if (Auth::user()->acc_type == 1) {
            return redirect('admin/home');

        } elseif (Auth::user()->acc_type == 0) {
            if (Auth::user()->account_status == 0) {
                Auth::logout();
                return redirect('login')->with('warning', 'Your account is on hold, Let admin apporve it first');
            }
            if (Auth::user()->account_status == 2) {
                Auth::logout();
                return redirect('login')->with('error', 'Your account suspended by admin');
            } else {
                return redirect('user/home');
            }

        } elseif (Auth::user()->acc_type == 2) {

            if (Auth::user()->account_status == 0) {
                Auth::logout();
                return redirect('login')->with('warning', 'Your account is on hold, Let admin apporve it first');
            }
            if (Auth::user()->account_status == 2) {
                Auth::logout();
                return redirect('login')->with('error', 'Your account suspended by admin');
            } else {
                return redirect('sitters/home');
            }

        }
    }

    public function profile()
    {
        return view('user.profile');
    }
    public function edit()
    {
        return view('user.edit-profile');
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'address_home' => 'required',
            'address_work' => 'required',
            'phone_number_home' => 'required',
            'phone_number_work' => 'required',
            'avatar' => 'required|mimes:jpeg,png,jpg',
        ]);

        $updateProfile = User::find(Auth::id());
        
        if ($request->hasfile('avatar')) {
            $avatar = $request->file('avatar');
            $image = time() . '-' . uniqid() . '.' . $avatar->extension();
            $avatar->move(public_path() . '/images/', $image);
            $updateProfile->avatar = $image;
        }
        $updateProfile->name = $request->name;
        $updateProfile->email = $request->email;
        $updateProfile->address_home = $request->address_home;
        $updateProfile->address_work = $request->address_work;
        $updateProfile->phone_number_home = $request->phone_number_home;
        $updateProfile->phone_number_work = $request->phone_number_work;
        $updateProfile->save();

        return redirect(route('profile'))->with('success', 'Profile updated successfully');
    }

}
