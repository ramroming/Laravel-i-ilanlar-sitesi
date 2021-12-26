<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create($job_id)
    {
        $j = Job::find($job_id);
        $images = DB::table('images')->where('job_id',"=",$job_id)->get();
        return view('home.user_job_image_add',['j' => $j,'images' => $images]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request,$job_id)
    {
        $j = new Image();
        $j -> job_id = $job_id;
        $j -> title = $request -> input('title');
        $j -> image = Storage::putFile('images', $request->file('image')); //file upload
        $j -> save();

        return redirect() -> route('home.user_job_image_add', ['job_id' => $job_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Image $image,$id,$job_id)
    {
        $i = Image::find($id);
        $i -> delete($id);
        return redirect()->route('home.user_job_image_add',['job_id' => $job_id]);
    }
}
