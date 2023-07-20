<?php

namespace App\Http\Controllers;

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

}
