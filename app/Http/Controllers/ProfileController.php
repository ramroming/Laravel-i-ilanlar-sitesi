<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {

        $datalist = Profile::where('user_id',Auth::id())->get();

        //if the user hasn't created a cv yet or it's empty
        if($datalist->isEmpty()){
            return redirect() -> route('user_profile_create');
        }
        else{
            return view('home.user_public_profile',['datalist' => $datalist ]);
        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('home.user_profile_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = new Profile();
        $data -> user_id = Auth::id();
        $data -> address= $request ->input('address');
        $data -> phone_number = $request -> input('phone_number');
        $data -> company = $request -> input('company');
        $data -> save();

        $data1 = User::find($data->user_id);
        $data1 -> phone = $request ->input('phone_number');
        $data1->address =$request ->input('address');
        $data1->save();

        return redirect() -> route('user_public_profile')->with('success','Public profile created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($user_id)
    {
        $datalist = Profile::where('user_id',$user_id)->get();
        return view('home.public_profile',['datalist'=>$datalist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Profile $profile,$id)
    {
        $datalist = Profile::find($id);
        return view("home.user_profile_edit",['datalist' => $datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Profile $profile,$id)
    {

        $data = Profile::find($id);
        $data -> user_id = Auth::id();
        $data -> address= $request ->input('address');
        $data -> phone_number = $request -> input('phone_number');
        $data -> company = $request -> input('company');
        $data -> save();

        $data1 = User::find($data->user_id);
        $data1 -> phone = $request ->input('phone_number');
        $data1->address =$request ->input('address');
        $data1->save();


        return redirect() -> route("user_public_profile")->with('success','Public profile Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Profile $profile,$id)
    {
        $data = Profile::find($id);
        $data-> delete();
        return redirect()->route('user_public_profile')->with('success','Public Profile Deleted Successfully!');
    }
}
