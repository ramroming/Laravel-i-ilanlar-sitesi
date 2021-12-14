<?php

use App\Http\Controllers\Admin\CategoryController;
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

// for slider to get to job ad
Route::get('/job/{id}/{slug}',[HomeController::class,'job'])->name('job');

//jobs from category list in nav
Route::get('/categoryjobs/{id}/{slug}',[HomeController::class,'categoryjobs'])->name('categoryjobs');

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

    //Setting
    Route::get('setting',[SettingController::class, 'index'])->name('admin_settings');
    Route::post('setting/update',[SettingController::class, 'update'])->name('admin_setting_update');



});

// account routing
Route::middleware('auth')->prefix('myaccount')->namespace('myaccount')->group(function (){
    Route::get('/',[\App\Http\Controllers\UserController::class, 'index'])->name('myprofile');
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
