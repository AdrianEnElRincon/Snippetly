<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SnippetController;
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

Route::get('/snippets/discover', [SnippetController::class, 'discover'])->name('snippets.discover');

/**
 *
 * Communities Routes
 *
 */
Route::resource('communities', CommunityController::class);

Route::get('/communities/discover', [CommunityController::class, 'discover'])->name('communities.discover');

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