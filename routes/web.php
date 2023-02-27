<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SnippetController;
use App\Mail\VerifyEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

    if(Auth::check() && Auth::user()->email_verified_at == null) {
        return view('auth.verify');
    }

    return view('home');
})->name('home');

Auth::routes();

/**
 *
 * Snippets Routes
 *
 */
Route::resource('snippets', SnippetController::class);

Route::get('/snippets/{snippet}/like', [SnippetController::class, 'like'])->name('snippets.like');

Route::get('/snippets/{snippet}/dislike', [SnippetController::class, 'dislike'])->name('snippets.dislike');

Route::get('/discover/snippets', [SnippetController::class, 'discover'])->name('snippets.discover');

/**
 *
 * Communities Routes
 *
 */
Route::resource('communities', CommunityController::class);

Route::get('/discover/communities', [CommunityController::class, 'discover'])->name('communities.discover');

Route::get('/communities/{community}/subscribe', [CommunityController::class, 'subscribe'])->name('communities.subscribe');

Route::get('/communities/{community}/unsubscribe', [CommunityController::class, 'unsubscribe'])->name('communities.unsubscribe');

/**
 *
 * Comments Routes
 *
 */
Route::resource('comments', CommentController::class)->only(['store', 'update', 'destroy']);

Route::get('/comments/{comment}/like', [CommentController::class, 'like'])->name('comments.like');

Route::get('/comments/{comment}/dislike', [CommentController::class, 'dislike'])->name('comments.dislike');

/**
 *
 * Profile Routes
 *
 */
Route::resource('profiles', ProfileController::class);

Route::get('/profile/settings', [ProfileController::class, 'config'])->name('profiles.config');

/**
 *
 * Locale Settings Route
 *
 */
Route::get('set-locale/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->middleware('check.locale')->name('locale.setting');

/**
 *
 * Administrative tasks routes
 *
 */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdministrationController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdministrationController::class, 'users'])->name('users');
    Route::get('/snippets', [AdministrationController::class, 'snippets'])->name('snippets');
    Route::get('/communities', [AdministrationController::class, 'communities'])->name('communities');
    Route::get('/comments', [AdministrationController::class, 'comments'])->name('comments');
});

/**
 *
 * Email verification
 *
 */
Route::get('/account/verify', function (Request $request) {
    return view('auth.verify');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
