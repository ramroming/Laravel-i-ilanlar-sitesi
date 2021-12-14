<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        return view(view: 'home.index', data: ['setting'=>$setting]);
    }

    public function login()
    {
        return view(view: 'admin.login');
    }

    public function aboutus()
    {
        $setting = Setting::first();
        return view(view: 'home.about', data: ['setting'=>$setting]);
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
