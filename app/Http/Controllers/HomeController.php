<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Comment;
use App\Models\Faq;
use App\Models\Image;
use App\Models\Job;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public static function categorylist()
    {
        return Category::where('parent_id', '=', 0)->with('children')->get();
    }

    public static function getSetting()
    {
        return Setting::first();
    }

//    rating functions for average and count:

    public static function commentsCount($id)
    {
        return Comment::where('job_id', $id)->count();
    }

    public static function avgRating($id)
    {
        $average = Comment::where('job_id', $id)->average('rate');

        return substr($average, 0, 3);
    }


    public function index()
    {
        $setting = Setting::first();
        $slider = Job::select('id', 'title', 'image', 'salary', 'slug')->limit(4)->get();
        $latest = Job::select('id', 'title', 'image', 'salary', 'slug', 'location')->limit(6)->orderByDesc('id')->get(); //latest jobs
        $data = [
            'setting' => $setting,
            'slider' => $slider,
            'latest' => $latest,
            'page' => 'home'
        ];
        return view(view: 'home.index', data: $data);
    }

    public function job($id)
    {
        $data = Job::find($id);
        $imagelist = Image::where('job_id', $id)->get(); //using the model to get to data
        $comment = Comment::where('job_id', $id)->get();
        //        print_r($data);
        //        exit();

        return view(view: 'home.job_single', data: ['data' => $data, 'imagelist' => $imagelist,
            'comment' => $comment]);

    }

    public function getjob(Request $request)
    {
        $search = $request->input('search');

        $count = Job::where('title', 'like', '%' . $search . '%')->get()->count();

        if ($count == 1) {
            $data = Job::where('title', 'like', '%' . $search . '%')->first();
            return redirect()->route('job', ['id' => $data->id, 'slug' => $data->slug]);

        } else {
            return redirect()->route('joblist', ['search' => $search]);
        }


    }

    public function joblist($search)
    {
        $datalist = Job::where('title', 'like', '%' . $search . '%')->get();
        $count = Job::where('title', 'like', '%' . $search . '%')->get()->count();
        return view('home.search_jobs', ['search' => $search, 'datalist' => $datalist, 'count' => $count]);
    }


    public function apply($id)
    {
        $data = Job::find($id);

    }


    public function categoryjobs($id, $slug)
    {
        $datalist = Job::where('category_id', $id)->get(); //using the model to get to data
        $data = Category::find($id);
//        print_r($data);
//        exit();

        //return total of jobs of the category by finding how many rows match with the category id
        $count = (Job::where('category_id', '=', $id))->count();

        $count = (Job::all())->count();
        return view(view: 'home.categoryjobs', data: ['data' => $data, 'datalist' => $datalist, 'count' => $count]);
    }


    public function login()
    {
        return view(view: 'admin.login');
    }

    public function aboutus()
    {
        $setting = Setting::first();
        return view(view: 'home.about', data: ['setting' => $setting]);
    }

    public function ref()
    {
        $setting = Setting::first();
        return view(view: 'home.references', data: ['setting' => $setting]);
    }

    public function contact()
    {
        $setting = Setting::first();
        return view(view: 'home.contact', data: ['setting' => $setting]);
    }

    public function sendmessage(Request $request)
    {
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->subject = $request->input('subject');
        $data->message = $request->input('message');
        $data->save();
        return redirect()->route('contact')->with('success', 'Message sent Successfully, Thank you!');;

    }

    public function faq()
    {
        $datalist = Faq::all()->sortBy('position');
        return view(view: 'home.faq', data: ['datalist' => $datalist]);
    }


    public function profile($id)
    {
//        $datalist = Profile::find($id);
        $datalist = Profile::where('user_id', '=', $id)->get();
        return view(view: 'home.public_profile', data: ['datalist' => $datalist]);
    }


    public function loginCheck(request $request)
    {
        if ($request->isMethod("post")) {

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('admin');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        } else {
            return view("admin.login");
        }

    }

    public function logout(request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
