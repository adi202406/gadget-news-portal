<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HpController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminHpController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GetImagesController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

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
    $categories = Category::all();
    $post = Post::all();
    return view('home',[
        "title" => "Home",
        "active" => "home",
        "categories" => $categories,
        "post" => $post
    ]);
});
Route::get('/about', function () {
    $categories = Category::all();
    $post = Post::all();
    return view('about', [
        "title" => "About",
        "name" => "Adi Ramadhan",
        "email" => "adiramadhan@gmail.com",
        "active" => "about",
        "categories" => $categories,
        "post" => $post
    ]);
});






Route::get('/blog', [PostController::class, 'index']);

Route::get('/daftarHp', [HpController::class, 'index']);

//single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('hp/{hp:slug}', [HpController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category){
    return view ('posts',[
        'title' => "Post By Category : $category->name",
        'active' => 'categories',
        'posts' => $category->posts->load('category', 'author')
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'logAuth']);


Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);


Route::get('/dashboard', function() {
    // Mengambil user yang sedang login
    $user = Auth::user();
    
    // Mengambil semua data kategori
    $categories = Category::all();
    
    // Menghitung jumlah post yang dibuat oleh pengguna dalam 30 hari terakhir
    $activePostCount = Post::where('user_id', $user->id)
        ->where('created_at', '>=', now()->subDays(30))
        ->count();
    
    // Menghitung total post yang dimiliki oleh pengguna
    $totalPostCount = Post::where('user_id', $user->id)->count();
    
    // Menghitung persentase keaktifan pengguna
    $activityPercentage = ($totalPostCount > 0) ? ($activePostCount / $totalPostCount) * 100 : 0;
    
    // Mengambil semua post milik user yang sedang login beserta jumlah like dan komentar
    $posts = Post::where('user_id', $user->id)->withCount(['likes', 'comments'])->get();
    
    // Menghitung total jumlah like dan komentar untuk semua post user
    $totalLikes = $posts->sum('likes_count');
    $totalComments = $posts->sum('comments_count');
    
    // Membuat array untuk menyimpan data yang dibutuhkan untuk chart
    $postTitles = [];
    $likeCounts = [];
    $commentCounts = [];
    
    // Mengisi array dengan judul post, jumlah like, dan jumlah komentar
    foreach ($posts as $postItem) {
        $postTitles[] = $postItem->title;
        $likeCounts[] = $postItem->likes_count;  // Mendapatkan jumlah like
        $commentCounts[] = $postItem->comments_count;  // Mendapatkan jumlah komentar
    }
    
    // Mengembalikan view dengan data categories, postTitles, likeCounts, commentCounts, jmlpost, totalLikes, totalComments, dan activityPercentage
    return view('dashboard.index', [
        'categories' => $categories,
        'postTitles' => $postTitles,
        'likeCounts' => $likeCounts,
        'commentCounts' => $commentCounts,
        'jmlpost' => $totalPostCount,
        'totalLikes' => $totalLikes,
        'totalComments' => $totalComments,
        'activityPercentage' => $activityPercentage
    ]);
})->middleware('auth');



Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']) ->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class) -> middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

Route::resource('/dashboard/hp', AdminHpController::class)->middleware('admin');

Route::get('/dashboard/categories/{slug}/edit', [AdminCategoryController::class, 'edit']);

Route::post('/post/{id}/like', [LikeController::class, 'likePost'])->name('post.like')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::post('/comments/{comment}/like', [CommentController::class, 'like'])->name('comments.like');
    Route::post('/comments/{comment}/unlike', [CommentController::class, 'unlike'])->name('comments.unlike');
    Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');
});

// Route::get('/storage/post-images/{filename}', [GetImagesController::class, 'displayImage'])->name('image.displayImage');




// Route::get('/authors/{author:username}', function(User $author){
    //     return view ('posts',[
        //         'title' => "Post By Author : $author->name",
        //         'posts' => $author->posts->load('category', 'author'),
        //         'active' => 'posts',
        //     ]);
        // });
        
        Route::view('/adminlte', 'adminlte.admin');

        Route::get('/tes', function() {
            Artisan::call('storage:link');
        });