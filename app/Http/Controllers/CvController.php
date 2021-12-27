<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $datalist = Cv::where('user_id',Auth::id())->get();

        //if the user hasn't created a cv yet or it's empty
        if($datalist->isEmpty()){
            return redirect() -> route('user_cv_create');
        }
         else{
            return view('home.user_cv',['datalist' => $datalist ]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $datalist = Category::with('children')->get();
        return view('home.user_cv_create',['datalist' => $datalist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $data = new Cv();
        $data -> user_id = Auth::id();
        $data -> category_id = $request ->input('category_id');
        $data -> title = $request -> input('title');
        $data -> location = $request -> input('location');
        $data -> minimum_rate = $request -> input('minimum_rate');
        $data -> content = $request -> input('content');
        $data -> skills = $request -> input('skills');
        $data -> save();


        return redirect() -> route('user_cv')->with('success','Cv Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function show(Cv $cv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Cv $cv,$id)
    {
        $data = Cv::find($id);
        $datalist = Category::with('children')->get();
        return view("home.user_cv_edit",['data' => $data, 'datalist' => $datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Cv $cv,$id)
    {
        $data = Cv::find($id);
        $data -> category_id = $request ->input('category_id');
        $data -> user_id = Auth::id();
        $data -> title = $request -> input('title');
        $data -> location = $request -> input('location');
        $data -> minimum_rate = $request -> input('minimum_rate');
        $data -> content = $request -> input('content');
        $data -> skills = $request -> input('skills');
        $data -> save();


        return redirect() -> route("user_cv")->with('success','Cv Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Cv $cv,$id)
    {
        $data = Cv::find($id);
        $data-> delete();
        return redirect()->route('user_cv')->with('success','Cv Deleted Successfully!');
    }
}
