<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [HomeController::class, 'index']);

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/about',[HomeController::class,'aboutus'])->name('about');
Route::get('/references',[HomeController::class,'ref'])->name('ref');
Route::get('/faq',[HomeController::class,'faq'])->name('faq');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::post('/sendmessage',[HomeController::class,'sendmessage'])->name('sendmessage');



//to view a person's profile
Route::get('/profile/{id}',[HomeController::class,'profile'])->name('viewProfile');

// for slider to get to job ad
Route::get('/job/{id}/{slug}',[HomeController::class,'job'])->name('job');

// for livewire job search
Route::post('/getjob',[HomeController::class,'getjob'])->name('getjob');
Route::get('/joblist/{search}',[HomeController::class,'joblist'])->name('joblist');

//jobs from category list in nav
Route::get('/categoryjobs/{id}/{slug}',[HomeController::class,'categoryjobs'])->name('categoryjobs');

//apply for job from the slider in home
Route::post('/apply/{id}',[HomeController::class,'apply'])->whereNumber('id')->name('apply');

// admin login/logout routing
Route::get('/admin/login',[HomeController::class, 'login'])->name('adminLogin');
Route::post('/admin/loginCheck',[HomeController::class, 'loginCheck'])->name('adminLoginCheck');
Route::get('/logout',[HomeController::class, 'logout'])->name('logout');

// admin routing
Route::middleware('auth')->prefix('admin')->group(function (){

    Route::get('/',[\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('adminHome');
   #Category
    Route::get('/category',[CategoryController::class, 'index'])->name('adminCategory');
    Route::get('/category/add',[CategoryController::class, 'add'])->name('adminCategoryAdd');
    Route::post('/category/create',[CategoryController::class, 'create'])->name('adminCategoryCreate');
    Route::get('/category/edit/{id}',[CategoryController::class, 'edit'])->name('adminCategoryEdit')->whereNumber("id");
    Route::post('/category/update/{id}',[CategoryController::class, 'update'])->name('adminCategoryUpdate')->whereNumber("id");
    Route::get('/category/delete/{id}',[CategoryController::class, 'destroy'])->name('adminCategoryDelete')->whereNumber("id");
    Route::get('/category/show',[CategoryController::class, 'show'])->name('adminCategoryShow');

    #Job
    Route::prefix('job')->group(function(){

        Route::get('/',[JobController::class,'index'])->name('admin_jobs');
        Route::get('/add',[JobController::class,'create'])->name('admin_job_add');
        Route::post('store',[JobController::class,'store'])->name('admin_job_store');
        Route::get('edit/{id}',[JobController::class,'edit'])->name('admin_job_edit')->whereNumber("id");
        Route::post('update/{id}',[JobController::class,'update'])->name('admin_job_update')->whereNumber("id");
        Route::get('delete/{id}',[JobController::class,'destroy'])->name('admin_job_delete')->whereNumber("id");
        Route::get('show',[JobController::class,'show'])->name('admin_job_show');
    });

    #Message
    Route::prefix('message')->group(function(){

        Route::get('/',[MessageController::class,'index'])->name('admin_messages');
        Route::get('edit/{id}',[MessageController::class,'edit'])->name('admin_message_edit')->whereNumber("id");
        Route::post('update/{id}',[MessageController::class,'update'])->name('admin_message_update')->whereNumber("id");
        Route::get('delete/{id}',[MessageController::class,'destroy'])->name('admin_message_delete')->whereNumber("id");
        Route::get('show',[MessageController::class,'show'])->name('admin_message_show');

    });

    //job's image gallery
    Route::prefix('image')->group(function(){

        Route::get('/',[ImageController::class,'index'])->name('admin_images');
        Route::get('/add/{job_id}',[ImageController::class,'create'])->name('admin_image_add')->whereNumber("job_id");
        Route::post('store/{job_id}',[ImageController::class,'store'])->name('admin_image_store')->whereNumber("job_id");;
        Route::get('delete/{id}/{job_id}',[ImageController::class,'destroy'])->name('admin_image_delete')->whereNumber("id");
        Route::get('show',[ImageController::class,'show'])->name('admin_image_show');

    });

    //comment
    Route::prefix('comment')->group(function(){

        Route::get('/',[CommentController::class,'index'])->name('admin_comment');
        Route::post('update/{id}',[CommentController::class,'update'])->name('admin_comment_update')->whereNumber("id");
        Route::get('show/{id}',[CommentController::class,'show'])->name('admin_comment_show')->whereNumber("id");;
        Route::get('delete/{id}',[CommentController::class,'destroy'])->name('admin_comment_delete')->whereNumber("id");


    });

    //Setting
    Route::get('setting',[SettingController::class, 'index'])->name('admin_settings');
    Route::post('setting/update',[SettingController::class, 'update'])->name('admin_setting_update');

    #FAQ
    Route::prefix('faq')->group(function(){

        Route::get('/',[FaqController::class,'index'])->name('admin_faq');
        Route::get('/add',[FaqController::class,'create'])->name('admin_faq_add');
        Route::post('store',[FaqController::class,'store'])->name('admin_faq_store');
        Route::get('edit/{id}',[FaqController::class,'edit'])->name('admin_faq_edit')->whereNumber("id");
        Route::post('update/{id}',[FaqController::class,'update'])->name('admin_faq_update')->whereNumber("id");
        Route::get('delete/{id}',[FaqController::class,'destroy'])->name('admin_faq_delete')->whereNumber("id");
        Route::get('show',[FaqController::class,'show'])->name('admin_faq_show');
    });



});

// user routing
Route::middleware('auth')->prefix('user')->namespace('user')->group(function (){
    Route::get('/profile',[\App\Http\Controllers\UserController::class, 'index'])->name('myprofile');
    Route::get('/mycomments',[\App\Http\Controllers\UserController::class,'mycomments'])->name('mycomments');
    Route::get('delete/{id}',[\App\Http\Controllers\UserController::class,'destroyComment'])->name('destroy-comment');
    Route::get('/recievedApplications',[\App\Http\Controllers\ApplicationController::class,'recApp'])->name('user_received_applications');

    #Job
    Route::prefix('job')->group(function(){

        Route::get('/',[\App\Http\Controllers\JobController::class,'index'])->name('user_jobs');
        Route::get('/add',[\App\Http\Controllers\JobController::class,'create'])->name('user_job_add');
        Route::post('store',[\App\Http\Controllers\JobController::class,'store'])->name('user_job_store');
        Route::get('edit/{id}',[\App\Http\Controllers\JobController::class,'edit'])->name('user_job_edit')->whereNumber("id");
        Route::post('update/{id}',[\App\Http\Controllers\JobController::class,'update'])->name('user_job_update')->whereNumber("id");
        Route::get('delete/{id}',[\App\Http\Controllers\JobController::class,'destroy'])->name('user_job_delete')->whereNumber("id");
        Route::get('show',[\App\Http\Controllers\JobController::class,'show'])->name('user_job_show');
    });

    //job's image gallery
    Route::prefix('image')->group(function(){

        Route::get('/',[ImageController::class,'index'])->name('user_images');
        Route::get('/add/{job_id}',[ImageController::class,'create'])->name('user_image_add')->whereNumber("job_id");
        Route::post('store/{job_id}',[ImageController::class,'store'])->name('user_image_store')->whereNumber("job_id");;
        Route::get('delete/{id}/{job_id}',[ImageController::class,'destroy'])->name('user_image_delete')->whereNumber("id");
        Route::get('show',[ImageController::class,'show'])->name('user_image_show');

    });

    #Cv
    Route::prefix('cv')->group(function(){

        Route::get('/',[\App\Http\Controllers\CvController::class,'index'])->name('user_cv');
        Route::get('/create',[\App\Http\Controllers\CvController::class,'create'])->name('user_cv_create');
        Route::post('store',[\App\Http\Controllers\CvController::class,'store'])->name('user_cv_store');
        Route::get('edit/{id}',[\App\Http\Controllers\CvController::class,'edit'])->name('user_cv_edit')->whereNumber("id");
        Route::post('update/{id}',[\App\Http\Controllers\CvController::class,'update'])->name('user_cv_update')->whereNumber("id");
        Route::get('delete/{id}',[\App\Http\Controllers\CvController::class,'destroy'])->name('user_cv_delete')->whereNumber("id");
        Route::get('show',[\App\Http\Controllers\CvController::class,'show'])->name('user_cv_show');
    });

    #Public Profile
    Route::prefix('public-profile')->group(function(){

        Route::get('/',[\App\Http\Controllers\ProfileController::class,'index'])->name('user_public_profile');
        Route::get('/create',[\App\Http\Controllers\ProfileController::class,'create'])->name('user_profile_create');
        Route::post('store',[\App\Http\Controllers\ProfileController::class,'store'])->name('user_profile_store');
        Route::get('edit/{id}',[\App\Http\Controllers\ProfileController::class,'edit'])->name('user_profile_edit')->whereNumber("id");
        Route::post('update/{id}',[\App\Http\Controllers\ProfileController::class,'update'])->name('user_profile_update')->whereNumber("id");
        Route::get('delete/{id}',[\App\Http\Controllers\ProfileController::class,'destroy'])->name('user_profile_delete')->whereNumber("id");
        Route::get('show',[\App\Http\Controllers\ProfileController::class,'show'])->name('user_profile_show');
    });

    #Application
    Route::prefix('application')->group(function(){

        Route::get('/',[\App\Http\Controllers\ApplicationController::class,'index'])->name('user_application');
        Route::get('/create/{job_id}',[\App\Http\Controllers\ApplicationController::class,'create'])->name('user_application_create')->whereNumber("id");
        Route::post('store',[\App\Http\Controllers\ApplicationController::class,'store'])->name('user_application_store');
        Route::get('edit/{id}',[\App\Http\Controllers\ApplicationController::class,'edit'])->name('user_application_edit')->whereNumber("id");
        Route::post('update/{id}',[\App\Http\Controllers\ApplicationController::class,'update'])->name('user_application_update')->whereNumber("id");
        Route::get('delete/{id}',[\App\Http\Controllers\ApplicationController::class,'destroy'])->name('user_application_delete')->whereNumber("id");
        Route::get('show/{id}',[\App\Http\Controllers\ApplicationController::class,'show'])->name('user_application_show');
    });


});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
