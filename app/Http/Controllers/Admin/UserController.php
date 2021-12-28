<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $datalist =User::all();
        return view('admin.user',['datalist'=>$datalist]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = new User();
        $data -> name = $request -> input('name');
        $data -> email = $request -> input('email');
        $data -> phone = $request -> input('phone');
        $data -> address = $request -> input('address');
        if($request -> file('image')!=null){
            $data -> profile_photo_path = Storage::putFile('profile-photos', $request->file('image')); //solution to hashName problem
        }
        $data -> save();

        return redirect()->route('admin_users')->with('success','User successfully Added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return string
     */
    public function show(User $user,$id)
    {
        $data = User::find($id);
        $datalist = Role::all()->sortBy('name');
        return view('admin.user_show',['data' => $data,'datalist' => $datalist]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user,$id)
    {
        $data=User::find($id);
        return view('admin.user_edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user,$id)
    {
        $data = User::find($id);
        $data -> name = $request -> input('name');
        $data -> email = $request -> input('email');
        $data -> phone = $request -> input('phone');
        $data -> address = $request -> input('address');
        if($request -> file('image')!=null){
            $data -> profile_photo_path = Storage::putFile('profile-photos', $request->file('image')); //solution to hashName problem
        }
        $data -> save();

        return redirect()->route('admin_users')->with('success','user Information Updated!!');
    }

    public function user_roles(User $user,$id)
    {
        $data = User::find($id);
        $datalist = Role::all()->sortBy('name');
        return view('admin.user_roles',['data'=>$data, 'datalist'=>$datalist]);
    }

    public function user_role_store(Request $request,User $user,$id)
    {
        $user = User::find($id);
        $role_id = $request->input('role_id');
        $user->roles()->attach($role_id); //add data to a many to many relationship
        return redirect()->back()->with('success','Role successfully added to user');
    }

    public function user_role_delete(Request $request,User $user,$user_id,$role_id)
    {
        $user = User::find($user_id);
        $user->roles()->detach($role_id); //delete data from a many to many relationship
        return redirect()->back()->with('success','Role successfully deleted from user');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
