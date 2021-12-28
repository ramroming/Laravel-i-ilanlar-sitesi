<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\JobController as AdminJobController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use \App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;

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


    //admin role authentication:
    Route::middleware('admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('adminHome');
    #Category
    Route::get('/category', [CategoryController::class, 'index'])->name('adminCategory');
    Route::get('/category/add', [CategoryController::class, 'add'])->name('adminCategoryAdd');
    Route::post('/category/create', [CategoryController::class, 'create'])->name('adminCategoryCreate');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('adminCategoryEdit')->whereNumber("id");
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('adminCategoryUpdate')->whereNumber("id");
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('adminCategoryDelete')->whereNumber("id");
    Route::get('/category/show', [CategoryController::class, 'show'])->name('adminCategoryShow');

    #Job
    Route::prefix('job')->group(function () {

        Route::get('/', [AdminJobController::class, 'index'])->name('admin_jobs');
        Route::get('/add', [AdminJobController::class, 'create'])->name('admin_job_add');
        Route::post('store', [AdminJobController::class, 'store'])->name('admin_job_store');
        Route::get('edit/{id}', [AdminJobController::class, 'edit'])->name('admin_job_edit')->whereNumber("id");
        Route::post('update/{id}', [AdminJobController::class, 'update'])->name('admin_job_update')->whereNumber("id");
        Route::get('delete/{id}', [AdminJobController::class, 'destroy'])->name('admin_job_delete')->whereNumber("id");
        Route::get('show', [AdminJobController::class, 'show'])->name('admin_job_show');
    });

    #Message
    Route::prefix('message')->group(function () {

        Route::get('/', [MessageController::class, 'index'])->name('admin_messages');
        Route::get('edit/{id}', [MessageController::class, 'edit'])->name('admin_message_edit')->whereNumber("id");
        Route::post('update/{id}', [MessageController::class, 'update'])->name('admin_message_update')->whereNumber("id");
        Route::get('delete/{id}', [MessageController::class, 'destroy'])->name('admin_message_delete')->whereNumber("id");
        Route::get('show', [MessageController::class, 'show'])->name('admin_message_show');

    });

    //job's image gallery
    Route::prefix('image')->group(function () {

        Route::get('/', [ImageController::class, 'index'])->name('admin_images');
        Route::get('/add/{job_id}', [ImageController::class, 'create'])->name('admin_image_add')->whereNumber("job_id");
        Route::post('store/{job_id}', [ImageController::class, 'store'])->name('admin_image_store')->whereNumber("job_id");;
        Route::get('delete/{id}/{job_id}', [ImageController::class, 'destroy'])->name('admin_image_delete')->whereNumber("id");
        Route::get('show', [ImageController::class, 'show'])->name('admin_image_show');

    });

    //comment
    Route::prefix('comment')->group(function () {

        Route::get('/', [CommentController::class, 'index'])->name('admin_comment');
        Route::post('update/{id}', [CommentController::class, 'update'])->name('admin_comment_update')->whereNumber("id");
        Route::get('show/{id}', [CommentController::class, 'show'])->name('admin_comment_show')->whereNumber("id");;
        Route::get('delete/{id}', [CommentController::class, 'destroy'])->name('admin_comment_delete')->whereNumber("id");


    });

    //Setting
    Route::get('setting', [SettingController::class, 'index'])->name('admin_settings');
    Route::post('setting/update', [SettingController::class, 'update'])->name('admin_setting_update');

    #FAQ
    Route::prefix('faq')->group(function () {

        Route::get('/', [FaqController::class, 'index'])->name('admin_faq');
        Route::get('/add', [FaqController::class, 'create'])->name('admin_faq_add');
        Route::post('store', [FaqController::class, 'store'])->name('admin_faq_store');
        Route::get('edit/{id}', [FaqController::class, 'edit'])->name('admin_faq_edit')->whereNumber("id");
        Route::post('update/{id}', [FaqController::class, 'update'])->name('admin_faq_update')->whereNumber("id");
        Route::get('delete/{id}', [FaqController::class, 'destroy'])->name('admin_faq_delete')->whereNumber("id");
        Route::get('show', [FaqController::class, 'show'])->name('admin_faq_show');
    });

    #Application
    Route::prefix('application')->group(function () {

        Route::get('/', [AdminApplicationController::class, 'index'])->name('admin_applications');
        Route::get('list/{status}', [AdminApplicationController::class, 'list'])->name('admin_applications_list');
        Route::get('/create/{job_id}', [AdminApplicationController::class, 'create'])->name('admin_application_create')->whereNumber("id");
        Route::post('store', [AdminApplicationController::class, 'store'])->name('admin_application_store');
        Route::get('edit/{id}', [AdminApplicationController::class, 'edit'])->name('admin_application_edit')->whereNumber("id");
        Route::post('update/{id}', [AdminApplicationController::class, 'update'])->name('admin_application_update')->whereNumber("id");
        Route::get('delete/{id}', [AdminApplicationController::class, 'destroy'])->name('admin_application_delete')->whereNumber("id");
        Route::get('show/{id}/{owner_id}', [AdminApplicationController::class, 'show'])->name('admin_application_show');
    });


}); //admin auth

}); // auth


// user routing
Route::middleware('auth')->prefix('user')->namespace('user')->group(function (){
    Route::get('/profile',[UserController::class, 'index'])->name('myprofile');
    Route::get( '/user/profile', [UserProfileController::class, 'show'] )->name('profile.show');
    Route::get('/mycomments',[UserController::class,'mycomments'])->name('mycomments');
    Route::get('delete/{id}',[UserController::class,'destroyComment'])->name('destroy-comment');
    Route::get('/recievedApplications',[ApplicationController::class,'recApp'])->name('user_received_applications');
    Route::get('/SingleReceivedApplication/{job_id}/{user_id}',[ApplicationController::class,'showRecApp'])->name('user_single_received_application');
    Route::get('/EditSingleReceivedApplication/{job_id}/{user_id}',[ApplicationController::class,'EditRecApp'])->name('user_edit_single_received_application');
    Route::get('/showAppCv/{id}',[ApplicationController::class,'showAppCv'])->name('show_application_cv');
    #Job
    Route::prefix('job')->group(function(){

        Route::get('/',[JobController::class,'index'])->name('user_jobs');
        Route::get('/add',[JobController::class,'create'])->name('user_job_add');
        Route::post('store',[JobController::class,'store'])->name('user_job_store');
        Route::get('edit/{id}',[JobController::class,'edit'])->name('user_job_edit')->whereNumber("id");
        Route::post('update/{id}',[JobController::class,'update'])->name('user_job_update')->whereNumber("id");
        Route::get('delete/{id}',[JobController::class,'destroy'])->name('user_job_delete')->whereNumber("id");
        Route::get('show',[JobController::class,'show'])->name('user_job_show');
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

        Route::get('/',[CvController::class,'index'])->name('user_cv');
        Route::get('/create',[CvController::class,'create'])->name('user_cv_create');
        Route::post('store',[CvController::class,'store'])->name('user_cv_store');
        Route::get('edit/{id}',[CvController::class,'edit'])->name('user_cv_edit')->whereNumber("id");
        Route::post('update/{id}',[CvController::class,'update'])->name('user_cv_update')->whereNumber("id");
        Route::get('delete/{id}',[CvController::class,'destroy'])->name('user_cv_delete')->whereNumber("id");
        Route::get('show',[CvController::class,'show'])->name('user_cv_show');
    });

    #Public Profile
    Route::prefix('public-profile')->group(function(){

        Route::get('/',[ProfileController::class,'index'])->name('user_public_profile');
        Route::get('/create',[ProfileController::class,'create'])->name('user_profile_create');
        Route::post('store',[ProfileController::class,'store'])->name('user_profile_store');
        Route::get('edit/{id}',[ProfileController::class,'edit'])->name('user_profile_edit')->whereNumber("id");
        Route::post('update/{id}',[ProfileController::class,'update'])->name('user_profile_update')->whereNumber("id");
        Route::get('delete/{id}',[ProfileController::class,'destroy'])->name('user_profile_delete')->whereNumber("id");
        Route::get('show/{id}',[ProfileController::class,'show'])->name('user_profile_show');
    });

    #Application
    Route::prefix('application')->group(function(){

        Route::get('/',[ApplicationController::class,'index'])->name('user_application');
        Route::get('/create/{job_id}',[ApplicationController::class,'create'])->name('user_application_create')->whereNumber("id");
        Route::post('store',[ApplicationController::class,'store'])->name('user_application_store');
        Route::get('edit/{id}',[ApplicationController::class,'edit'])->name('user_application_edit')->whereNumber("id");
        Route::post('update/{id}',[ApplicationController::class,'update'])->name('user_application_update')->whereNumber("id");
        Route::get('delete/{id}',[ApplicationController::class,'destroy'])->name('user_application_delete')->whereNumber("id");
        Route::get('show/{id}',[ApplicationController::class,'show'])->name('user_application_show');
    });

    #Users
    Route::prefix('user')->group(function(){

        Route::get('/',[AdminUserController::class,'index'])->name('admin_users');
        Route::get('/create/{job_id}',[AdminUserController::class,'create'])->name('admin_user_create')->whereNumber("id");
        Route::post('store',[AdminUserController::class,'store'])->name('admin_user_store');
        Route::get('edit/{id}',[AdminUserController::class,'edit'])->name('admin_user_edit')->whereNumber("id");
        Route::post('update/{id}',[AdminUserController::class,'update'])->name('admin_user_update')->whereNumber("id");
        Route::get('delete/{id}',[AdminUserController::class,'destroy'])->name('admin_user_delete')->whereNumber("id");
        Route::get('show/{id}',[AdminUserController::class,'show'])->name('admin_user_show');
//        user roles things
        Route::get('userRole/{id}',[AdminUserController::class,'user_roles'])->name('admin_user_roles')->whereNumber("id");
        Route::post('userRoleStore/{id}',[AdminUserController::class,'user_role_store'])->name('admin_user_role_add')->whereNumber("id");
        Route::get('userRoleDelete/{user_id}/{role_id}',[AdminUserController::class,'user_role_delete'])->name('admin_user_role_delete');
    });



});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
