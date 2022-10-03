<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
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

// Public Routes
Route::get('/', [PostController::class, 'index']);
Route::resource('posts', PostController::class)->only(['index', 'show']);
Route::view('about', 'about')->name('about');



// Admin only Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard', [
        'total_posts' => Post::count(),
        'total_category' => Category::count(),
    ])->name('dashboard');
    Route::view(
        'posts',
        'posts.admin_index',
        ['posts' => Post::with('category')->paginate(10)]
    )->name('posts');

    Route::resource('posts', PostController::class)->except(['index', 'show']);
    Route::resource('category', CategoryController::class);
});


require __DIR__ . '/auth.php';
