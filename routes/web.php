<?php

use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
    return view('users.dashboard');
});

Route::get('/users/login', function () {
    return view('users.auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/register', [AuthController::class, 'registration'])->name('user.register');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


//Route::prefix('admin')->name('admin.')->group(function () {

// User Routes
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::delete('/users/document/{document}', [UserController::class, 'documentDestroy'])->name('users.document.destroy');

Route::get('/users/document/{user}', [UserController::class, 'getDocument'])->name('users.document');
Route::post('/users/document', [UserController::class, 'uploadDocument'])->name('users.upload.document');
Route::get('/users/document/list', [UserController::class, 'documentList'])->name('users.document.list');

// Group Routes
Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');
Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
Route::put('/groups/{group}', [GroupController::class, 'update'])->name('groups.update');
Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');
Route::post('/groups', [GroupController::class, 'storeUsersGroup'])->name('groups.store.users');
// Route::get('/groups', [GroupController::class, 'getUsersGroup'])->name('groups.list.users');

//});
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');

Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/services', [HomeController::class, 'services'])->name('services');