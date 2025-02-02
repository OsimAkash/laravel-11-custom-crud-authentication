<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\Admin;
use App\Models\User;

Route::get('/', function () {
    return view('welcome', [
        'users' => User::paginate(5),
        'posts' => Post::paginate(5),
        'admins' => Admin::paginate(5)
    ]); 
})->name('home');


// User Dashboard :
Route::get("/auth/register", [AuthController::class, "register"])->name("register");
Route::post("/auth/register", [AuthController::class, "register"])->name("register");


// Route::post('/user', [UserController::class, 'OurfileStore'])->name('user.store');

// FIXED: Removed spaces after {id}
Route::get('/user/edit/{id}', [UserController::class, 'usereditData'])->name('user.edit');
Route::post('/user/edit/{id}', [UserController::class, 'userupdateData'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'userdeleteData'])->name('user.delete');




// Admin Dashboard:

Route::get('/admin/create', [AdminController::class, 'create']);
Route::post('/adminstore', [AdminController::class, 'OurfileStore'])->name('admin.store');

// FIXED: Removed spaces after {id}
Route::get('/admin/edit/{id}', [AdminController::class, 'admineditData'])->name('admin.edit');
Route::post('/admin/edit/{id}', [AdminController::class, 'adminupdateData'])->name('admin.update');
Route::get('/admin/delete/{id}', [AdminController::class, 'admindeleteData'])->name('admin.delete');
Route::get('/admin/clone/{id}', [AdminController::class, 'admincloneData'])->name('admin.clone');

// Porducts 


Route::get('/product/create', [PostController::class, 'create']);
Route::post('/product/store', [PostController::class, 'ourfileStore'])->name('store');



Route::get('/product/edit/{id} ', [PostController::class, 'editData'])->name('product.edit');
Route::post('/product/edit/{id} ', [PostController::class, 'updateData'])->name('update');
Route::get('/product/delete/{id} ', [PostController::class, 'deleteData'])->name('delete');
Route::get('/product/clone/{id}', [PostController::class, 'cloneData'])->name('clone');



// Register
// Route::get("register", [AuthController::class, "register"])->name("register");
// Route::post("register", [AuthController::class, "register"])->name("register");

Route::group([
    "middleware" => ["guest"]
], function(){

    Route::match(["get", "post"], "register", [AuthController::class, "register"])->name("register");

    // Login
    //Route::get("login", [AuthController::class, "login"])->name("login");
    Route::match(["get", "post"], "login", [AuthController::class, "login"])->name("login");
});

Route::group([
    "middleware" => ["auth"]
], function(){

    // Dashboard
    Route::get("userdashboard", [AuthController::class, "userdashboard"])->name("userdashboard");
    Route::get("dashboard", [AuthController::class, "dashboard"])->name("dashboard");
    Route::get("admindashboard", [AuthController::class, "admindashboard"])->name("admindashboard");

    // Profile
    //Route::get("profile", [AuthController::class, "profile"])->name("profile");
    Route::match(["get", "post"], "profile", [AuthController::class, "profile"])->name("profile");

    // Logout
    Route::get("logout", [AuthController::class, "logout"])->name("logout");
});

