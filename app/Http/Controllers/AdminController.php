<?php

namespace App\Http\Controllers;

use App\Models\User;
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


        //$t = $roles[0];
        //dd($t->hasPermission('Admins'));

        $admins = User::all();
        return view('dashboard.admins.index',compact('admins'));
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
        //dd($request->all());

        $admin = new User;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with(['success'=>'تم اضافه المشرف بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $admin)
    {

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with(['update'=>'تم تحديث بيانات المشرف بنجاح']);
    }


    public function update_profile(Request $request)
    {

        $profile = User::find(auth()->id());


        if($request->has('updatePassword')){
            if($request->password != null && $request->current_password != null ){
                if(!Hash::check($request->current_password, auth()->user()->password)){
                    return back()->with(['failed'=>'كلمه المرور الحاليه غير صحيحه']);
                }
            }
            if($request->password != null && $request->current_password != null ){
                $profile->password = Hash::make($request->password);
            }
        } else{
            $profile->name = $request->name;
            $profile->email = $request->email;
        }




        $profile->save();
        return back()->with(['update'=>'تم تحديث البيانات الشخصيه بنجاح']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
