<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Job;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public static function categorylist()
    {
        return Category::where('parent_id' , '=',0)->with('children')->get();
    }

    public static function getSetting()
    {
        return Setting::first();
    }


    public function index()
    {
        $setting = Setting::first();
        $slider = Job::select('id','title','image','salary','slug')->limit(3)->get();
        $data = [
            'setting'=> $setting,
             'slider' => $slider,
            'page'=>'home',
        ];
        return view(view: 'home.index', data: $data);
    }

    public function job($id,$slug)
    {
        $data = Job::find($id);
        print_r($data);
        exit();

    }

    public function categoryjobs($id,$slug)
    {
        $datalist = Job::where('category_id',$id)->get(); //using the model to get to data
        $data = Category::find($id);
//        print_r($data);
//        exit();

        //return total of jobs of the category by finding how many rows match with the category id
        $count = (Job::where('category_id','=',$id))->count();

        $count = (Job::all())->count();
        return view(view: 'home.categoryjobs', data :['data' => $data, 'datalist' => $datalist, 'count' => $count]);
    }


    public function login()
    {
        return view(view: 'admin.login');
    }

    public function aboutus()
    {
        $setting = Setting::first();
        return view(view: 'home.about', data: ['setting' => $setting ]);
    }
    public function ref()
    {
        $setting = Setting::first();
        return view(view: 'home.references', data: ['setting'=>$setting]);
    }
    public function contact()
    {
        $setting = Setting::first();
        return view(view: 'home.contact',data: ['setting'=>$setting]);
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
        return redirect() -> route('contact')->with('success','Message sent Successfully, Thank you!');;

    }

    public function faq()
    {
        return view(view: 'home.about');
    }


    public function loginCheck(request $request)
    {
        if ($request->isMethod("post")){

            $credentials = $request->only('email','password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('admin');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        else
        {
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
