<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function clients()
    {
        $clients = User::where('acc_type', 0)->get();
        return view('admin.clients', get_defined_vars());
    }

    public function update_status(Request $request, $client_id)
    {
        User::where('id', $client_id)->update(array(
            'account_status' => (int) $request->status_type,
        ));
        return redirect()->back()->with('success', 'Account Status has been updated');
    }

    public function pets()
    {
        $pets = Pet::where('is_acitve', 1)->get();
        return view('admin.pet', get_defined_vars());
    }

    public function remove_pet($id)
    {
        Pet::where('id', $id)->update(array(
            'is_active' => 0,
        ));
        return redirect()->back()->with('success', 'Pet details has been removed');

    }

    public function pets_add()
    {
        $clients = User::where('acc_type', 0)->where('account_status', 1)->get();
        return view('admin.pet_add', get_defined_vars());
    }

    public function pet_create(Request $request)
    {
        $pet = new Pet;
        $pet->pet_name = $request->pet_name;
        $pet->client_id = $request->client_id;
        $pet->save();
        return redirect('/admin/pets')->with('success', 'Pet details has been created');

    }

    public function sitters()
    {
        $sitters = User::where('acc_type', 2)->get();
        return view('admin.sitters', get_defined_vars());
    }

    public function create_sitters()
    {
        return view('admin.sitter_create');
    }

    public function sitter_create(Request $request)
    {
        $create_sitter = new User;
        $create_sitter->name = $request->name;
        $create_sitter->email = $request->email;
        $create_sitter->address_home = $request->address_home;
        $create_sitter->phone_number_home = $request->phone_number_home;
        $create_sitter->password = Hash::make($request->password);
        $create_sitter->acc_type = 2;
        $create_sitter->save();

        return redirect('admin/sitters')->with('success', 'Sitter created successfuly.');
    }

    public function schedule(){
        return view('admin.schedule');
    }
}
