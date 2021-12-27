<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     *
     * /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index()
    {
        $joblist = Job::where('user_id',Auth::id())->get();
        return view('home.user_job',['joblist' => $joblist ]);
    }

    public function create()
    {
//        $datalist= Category::all();
        $datalist = Category::with('children')->get();
        return view('home.user_job_add',['datalist' => $datalist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $j = new Job();
        $j -> category_id = $request ->input('category_id');
        $j -> title = $request -> input('title');
        $j -> keywords = $request -> input('keywords');
        $j -> description = $request -> input('description');
        $j -> detail = $request -> input('detail');
        $j -> user_id = Auth::id();
        $j -> status = $request -> input('status');
        $j -> slug = $request -> input('slug');
        $j -> salary = $request -> input('salary');
        $j -> location = $request -> input('location');
        $j -> image = Storage::putFile('images', $request->file('image')); //file upload
        $j -> save();


        return redirect() -> route('user_jobs')->with('success','Job Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Job $job, $id)
    {
        $j = Job::find($id);
//        $datalist= Category::all();
        $datalist = Category::with('children')->get();
        return view("home.user_job_edit",['j' => $j, 'dataList' => $datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Job $job, $id)
    {
        $j = Job::find($id);
        $j -> category_id = $request ->input('category_id');
        $j -> title = $request -> input('title');
        $j -> keywords = $request -> input('keywords');
        $j -> description = $request -> input('description');
        $j -> detail = $request -> input('detail');
        $j -> user_id = Auth::id();
        $j -> status = $request -> input('status');
        $j -> salary = $request -> input('salary');
        $j -> location = $request -> input('location');
//        $j -> image = Storage::putFile('images', $request->file('image')); //file upload
        if($request -> file('image')!=null){
            $j -> image = Storage::putFile('images', $request->file('image')); //solution to hashName problem
        }
        $j -> save();


        return redirect() -> route("user_jobs");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Job $job, $id)
    {
//        DB::table('jobs')->where('id','=',$id)->delete();
        $j = Job::find($id);
        $j-> delete();
        return redirect()->route('user_jobs')->with('success','Job Deleted Successfully!');
    }
}
