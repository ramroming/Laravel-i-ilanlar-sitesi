<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $joblist = Job::all();
        return view('admin.job',['joblist' => $joblist ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $datalist= Category::all();
        return view('admin.job_add',['datalist' => $datalist]);
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
        $j -> image = Storage::putFile('images', $request->file('image')); //file upload
        $j -> save();

        return redirect() -> route('admin_jobs');
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
        $datalist= Category::all();
        return view("admin.job_edit",['j' => $j, 'dataList' => $datalist]);
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
        $j -> image = Storage::putFile('images', $request->file('image')); //file upload
        $j -> save();

        return redirect() -> route("admin_jobs");
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
        return redirect()->route('admin_jobs');
    }
}
