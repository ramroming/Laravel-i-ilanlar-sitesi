<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $datalist = Application::all();

        return view('admin.applications',['datalist' => $datalist ]);
    }

    public function list($status)
    {
        $datalist = Application::where('status',$status)->get();

        return view('admin.applications',['datalist' => $datalist ]);
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
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id,$owner_id){

        $datalist = Application::where('id',$id)->get(); //get the row of the application with the requested id

        //get the owner name and other info
       $owner = User::where('id',$owner_id)->get();
        return view('admin.application_edit',['datalist' => $datalist ,'owner' => $owner]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Application $application,$id)
    {
        $data = Application::find($id);
        $data -> note = $request -> input('note');
        $data -> status = $request -> input('status');
        $data -> save();
        return redirect()->back()->with('success','Application Updated Successfully!');
//        return redirect()->route('admin_application_show',['id'=>$data->id,'owner_id' => $data->owner_id])->with('success','Application Updated Successfully!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
