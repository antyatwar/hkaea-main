<?php

use App\Http\Controllers\OrderController;
use App\Http\Livewire\About;
use App\Http\Livewire\Account;
use App\Http\Livewire\Application;
use App\Http\Livewire\Competition;
use App\Http\Livewire\Contact;
use App\Http\Livewire\Exchange;
use App\Http\Livewire\Performance;
use App\Http\Livewire\School;
use App\Http\Livewire\Cooperation;
use App\Http\Livewire\Exhibition;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Member;
use App\Http\Livewire\News;
use App\Http\Livewire\Photo;
use App\Http\Livewire\Post;
use App\Http\Livewire\Register;
use App\Http\Livewire\VerifyEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
    return redirect(config('app.locale'));
});

Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|zh-hk']], function () {
    Route::get('/', Home::class)->name('home');
    Route::get('/about', About::class)->name('about');
    Route::get('/contact', Contact::class)->name('contact');
    Route::get('/news', News::class)->name('news');
    Route::get('/post/{post}', Post::class)->name('post');
    Route::get('/competition/{competition:slug}', Competition::class)->name('competition');
    Route::get('/exchange', Exchange::class)->name('exchange');
    Route::get('/performance', Performance::class)->name('performance');
    Route::get('/school', School::class)->name('school');
    Route::get('/cooperation', Cooperation::class)->name('cooperation');
    Route::get('/exhibition', Exhibition::class)->name('exhibition');
    Route::get('/member', Member::class)->name('member');
    Route::get('/login', Login::class)->name('login')->middleware('guest');
    Route::get('/register/{role:slug}', Register::class)->name('register')->middleware('guest');
    Route::get('/account', Account::class)->name('account')->middleware(['auth', 'verified']);
    Route::get('/application/{competition:slug}', Application::class)->name('application')->middleware(['auth', 'verified']);

    // The Email Verification Notice
    Route::get('/email/verify', VerifyEmail::class)->middleware('auth')->name('verification.notice');

    // The Email Verification Handler
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('login');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    // Resending The Verification Email
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    Route::get('paymentasia', function (Request $request) {
        return view('paymentasia', ['fields' => $request->input('fields')]);
    })->name('paymentasia');
});

Route::post('paymentasia/return', [OrderController::class, 'register'])->name('paymentasia.return');
