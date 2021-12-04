<?php

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

Route::middleware('auth')->prefix('admin')->group(function (){

    Route::get('/',[\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('adminHome');
   #Category
    Route::get('/category',[\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('adminCategory');
    Route::get('/category/add',[\App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('adminCategoryAdd');
    Route::post('/category/create',[\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('adminCategoryCreate');
    Route::get('/category/edit/{id}',[\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('adminCategoryEdit')->whereNumber("id");
    Route::post('/category/update/{id}',[\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('adminCategoryUpdate')->whereNumber("id");
    Route::get('/category/delete/{id}',[\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('adminCategoryDelete')->whereNumber("id");
    Route::get('/category/show',[\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('adminCategoryShow');

    #Job
    Route::prefix('job')->group(function(){

        Route::get('/',[\App\Http\Controllers\Admin\JobController::class,'index'])->name('admin_jobs');
        Route::get('/add',[\App\Http\Controllers\Admin\JobController::class,'create'])->name('admin_job_add');
        Route::post('store',[\App\Http\Controllers\Admin\JobController::class,'store'])->name('admin_job_store');
        Route::get('edit/{id}',[\App\Http\Controllers\Admin\JobController::class,'edit'])->name('admin_job_edit')->whereNumber("id");
        Route::post('update/{id}',[\App\Http\Controllers\Admin\JobController::class,'update'])->name('admin_job_update')->whereNumber("id");
        Route::get('delete/{id}',[\App\Http\Controllers\Admin\JobController::class,'destroy'])->name('admin_job_delete')->whereNumber("id");
        Route::get('show',[\App\Http\Controllers\Admin\JobController::class,'show'])->name('admin_job_show');

    });

    //job's image gallery
    Route::prefix('image')->group(function(){

        Route::get('/',[\App\Http\Controllers\Admin\ImageController::class,'index'])->name('admin_images');
        Route::get('/add/{job_id}',[\App\Http\Controllers\Admin\ImageController::class,'create'])->name('admin_image_add')->whereNumber("job_id");
        Route::post('store/{job_id}',[\App\Http\Controllers\Admin\ImageController::class,'store'])->name('admin_image_store')->whereNumber("job_id");;
        Route::get('delete/{id}/{job_id}',[\App\Http\Controllers\Admin\ImageController::class,'destroy'])->name('admin_image_delete')->whereNumber("id");
        Route::get('show',[\App\Http\Controllers\Admin\ImageController::class,'show'])->name('admin_image_show');

    });

    //Setting
    Route::get('setting',[\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin_settings');
    Route::post('setting/update',[\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin_setting_update');

});

Route::get('/admin/login',[HomeController::class, 'login'])->name('adminLogin');
Route::post('/admin/loginCheck',[HomeController::class, 'loginCheck'])->name('adminLoginCheck');
Route::get('/admin/logout',[HomeController::class, 'logout'])->name('adminLogout');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
