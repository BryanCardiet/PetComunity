<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\CommunityController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/dogs', [DogController::class, 'index'])->name('dogs');
    Route::post('/dogs', [DogController::class, 'store'])->name('dogs.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/communities', [CommunityController::class, 'index'])->name('community');
    Route::get('/community/join/{community_id}', [CommunityController::class, 'join'])->name('community.join');
    Route::post('/community/join-as-dog', [CommunityController::class, 'joinAsDog'])->name('community.joinAsDog');
    Route::get('/community/{id}', [CommunityController::class, 'show'])->name('community.show');
    Route::post('/community/{id}/post-as-dog', [CommunityController::class, 'createPostAsDog'])->name('community.createPostAsDog');
    Route::post('/community/leave', [CommunityController::class, 'leaveCommunity'])->name('community.leave');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/community/{community_id}/blog', [CommunityController::class, 'blog'])->name('blog');
    Route::get('/community/{community_id}/article/{article_id}', [CommunityController::class, 'article'])->name('community.article');
});

require __DIR__.'/auth.php';
