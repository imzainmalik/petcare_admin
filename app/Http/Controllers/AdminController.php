<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pet;
use App\Models\Service;
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


    public function category()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category_create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function category_store(Request $request)
    {
        $cate = new Category;
        $cate->name = $request->name;
        $cate->save();

        return redirect('admin/pet-types')->with('success', 'Pet type created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function category_show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function category_edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function categpry_update(Request $request, $type_id)
    {
        Category::where('id',$type_id)->update(array(
            'name' => $request->name
        ));

        return redirect()->back()->with('success', 'Pat type is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function change_status(Request $request, $category)
    {
        Category::where('id',$category)->update(array(
            'is_acitve' => $request->status_type
        ));

        return redirect()->back()->with('success', 'Category deleted successfully');
    }

    public function services(){
        $services = Service::where('is_available', 1)->get();
        return view('admin.services',get_defined_vars());
    }

    public function create_services(){
        return view('admin.service_create');
    }


    public function service_store(Request $request){
        $services = new Service;
        $services->name = $request->name;
        $services->description = $request->description;
        $services->save();
        return redirect('admin/services')->with('success', 'Service created successfully');

    }

    public function destroy_service($id){
        Service::where('id', $id)->update(array(
            'is_available' => 0
        ));

        return redirect('admin/services')->with('success', 'Service deleted successfully');
    }



}
