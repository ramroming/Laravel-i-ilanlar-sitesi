<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Cv;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $datalist = Application::where('user_id',Auth::id())->get();

        return view('home.user_view_applications',['datalist' => $datalist ]);


    }

    public function recApp()
    {
        $datalist = Application::where('owner_id',Auth::id())->get();

        return view('home.user_received_applications',['datalist' => $datalist ]);

    }

    public function showRecApp($job_id,$user_id){
        $datalist = Application::where('owner_id',Auth::id())->where('job_id',$job_id)->where('user_id',$user_id)->get();
        return view('home.user_single_received_application',['datalist' => $datalist ]);
    }

    public function EditRecApp($job_id,$user_id){
        $datalist = Application::where('owner_id',Auth::id())->where('job_id',$job_id)->where('user_id',$user_id)->get();
        return view('home.edit_received_application',['datalist' => $datalist ]);
    }

    public function showAppCv($id){
        $datalist = Cv::where('id',$id)->get();
        return view('home.user_app_cv',['datalist' => $datalist ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create($job_id)
    {
        $job_data = Job::where('id','=',$job_id)->get();
        return view('home.create_application',['job_data' => $job_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {

        $data = new Application();
        $data -> user_id = Auth::id();
        $data -> job_id = $request ->input('job_id');
//        $data -> note = $request -> input('note');
        $data -> IP = $_SERVER['REMOTE_ADDR'];
        $data -> owner_id = $data->job->user_id;
        $data -> save();

        $datalist = Application::where('user_id','=',Auth::id())->get();


//        return view('home.user_view_applications',['datalist'=>$datalist])->with('success','Application Created Successfully!');
        return redirect()->route('user_application',['datalist'=>$datalist])->with('success','Application Created Successfully!');


    }

    /**
     * Display the specified resource.
     *

     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $datalist = Application::where('user_id',Auth::id())->where('id',$id)->get();

        return view('home.user_application',['datalist' => $datalist ]);
    }

    /**
     * Show the form for editing the specified resource.
     *

     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $data = Application::find($id);
        return view("home.edit_application",['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {

        $data = Application::find($id);
        $data -> user_id = Auth::id();
        $data -> job_id = $request ->input('job_id');
//        $data -> note = $request -> input('note');
        $data -> status = $request -> input('status');
        $data -> save();


        if($data->owner_id == Auth::id()){
            $data -> note = $request -> input('note');
            $data -> status = $request -> input('status');
           return $this->showRecApp($data->user_id,$data->owner_id)->with('success','Received Application Updated Successfully!');
        }else{
            return  redirect()->route('user_application_show',['id' => $data -> id])->with('success','Application Updated Successfully!');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $data = Application::find($id);
        $data-> delete();

        if(!$data->owner_id == Auth::user()->id){
            return redirect()->route('user_application')->with('success','Application Deleted Successfully!');
        }
        else{
            return redirect()->route('user_received_applications')->with('success','Application Deleted Successfully!');

        }
    }
}
