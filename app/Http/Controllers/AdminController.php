<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Login');
    }

    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        $result = Admin::where(['email'=>$email])->first();

        if ($result) {
            if(Hash::check($request->post('password'), $result->password)){
                $request->session()->put('Admin_login',true);
                $request->session()->put('Admin_Id',$result->id);
                return redirect('admin/dashboard');
            }else{
                $request->session('error','Invalid credentials');
                return redirect('/admin/dashboard');
            }   
            // $request->session()->put('Admin_login',true);
            // $request->session()->put('Admin_Id',$result['0']->id);
            // return redirect('admin/dashboard');
        }
        else{
            $request->session('error','Invalid credentials');
            return redirect('/admin');
        }
        
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function updatePassword(){
        $r =Admin::find(1);
        $r->password = Hash::make('yuvraj');
        $r->save();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
