<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\MissionController;
use App\Http\Controllers\Backend\NewseventController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\VisionController;
use App\Http\Controllers\Frontend\FrontendController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//all header(frontend page)routes start from here
Route::get('/',[FrontendController::class,'index']);
Route::get('aboutUs',[FrontendController::class,'AboutUs'])->name('aboutUs');
Route::get('contactUs',[FrontendController::class,'contactUs'])->name('contactUs');
Route::get('mission',[FrontendController::class,'MiSsion'])->name('mission');
Route::get('vision',[FrontendController::class,'ViSion'])->name('vision');
Route::get('newsevent.details/{id}',[FrontendController::class,'NewsEventDetails'])->name('newsevent.details');
Route::post('Contact.Store',[FrontendController::class,'Store'])->name('Contact.Store');

// group middleware start from here
Route::group(['middleware' => ['test']], function () {
//all header(backend page)routes start from here
Route::prefix('users')->group(function () {
Route::get('/all',[UserController::class,'index'])->name('users.all');
Route::get('/create',[UserController::class,'create'])->name('users.create');
Route::post('/store',[UserController::class,'store'])->name('users.store');
Route::get('/edit/{id}',[UserController::class,'edit'])->name('users.edit');
Route::post('/update/{id}',[UserController::class,'update'])->name('users.update');
Route::get('/destroy/{id}',[UserController::class,'destroy'])->name('users.destroy');

});

// Profile Routes start from here
Route::prefix('profile')->group(function () {
Route::get('/user',[UserController::class,'index'])->name('profile.user');
Route::post('/store',[UserController::class,'store'])->name('profile.store');
Route::get('/edit',[UserController::class,'edit'])->name('profile.edit');
Route::post('/update',[UserController::class,'update'])->name('profile.update');
Route::get('/change-password',[ProfileController::class,'ChangePassword'])->name('change.password');
Route::post('/update-password',[ProfileController::class,'UpdatePassword'])->name('update.password');

});



//Logo routes start from here
Route::prefix('logos')->group(function () {
Route::get('/view',[LogoController::class,'index'])->name('logos.view');
Route::get('/create',[LogoController::class,'create'])->name('logos.create');
Route::post('/store',[LogoController::class,'store'])->name('logos.store');
Route::get('/edit/{id}',[LogoController::class,'edit'])->name('logos.edit');
Route::post('/update/{id}',[LogoController::class,'update'])->name('logos.update');
Route::get('/destroy/{id}',[LogoController::class,'destroy'])->name('logos.destroy');
});

//Sliders routes start from here
Route::prefix('sliders')->group(function () {
Route::get('/view',[SliderController::class,'index'])->name('sliders.view');
Route::get('/create',[SliderController::class,'create'])->name('sliders.create');
Route::post('/store',[SliderController::class,'store'])->name('sliders.store');
Route::get('/edit/{id}',[SliderController::class,'edit'])->name('sliders.edit');
Route::post('/update/{id}',[SliderController::class,'update'])->name('sliders.update');
Route::get('/destroy/{id}',[SliderController::class,'destroy'])->name('sliders.destroy');
});


//services routes start from here
Route::prefix('contacts')->group(function () {
Route::get('/view',[ContactController::class,'index'])->name('contacts.view');
Route::get('/create',[ContactController::class,'create'])->name('contacts.create');
Route::post('/store',[ContactController::class,'store'])->name('contacts.store');
Route::get('/edit/{id}',[ContactController::class,'edit'])->name('contacts.edit');
Route::post('/update/{id}',[ContactController::class,'update'])->name('contacts.update');
Route::get('/destroy/{id}',[ContactController::class,'destroy'])->name('contacts.destroy');
});

//services routes start from here
Route::prefix('about')->group(function () {
Route::get('/view',[AboutController::class,'destroy'])->name('about.view');
Route::get('/create',[AboutController::class,'create'])->name('about.create');
Route::post('/store',[AboutController::class,'store'])->name('about.store');
Route::get('/edit/{id}',[AboutController::class,'edit'])->name('about.edit');
Route::post('/update/{id}',[AboutController::class,'update'])->name('about.update');
Route::get('/destroy/{id}',[AboutController::class,'destroy'])->name('about.destroy');
});

//User Email route
Route::prefix('email')->group(function () {
Route::get('user-email.view',[FrontendController::class,'UserEmailView'])->name('user-email.view');
Route::get('/user-email.destroy/{id}',[FrontendController::class,'destroy'])->name('user-email.destroy');
});
});
// group middleware End here