<?php

use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContactController;
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

Route::get('/dashboard', [AuthController::class, 'index'])->name('admin.index');


// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware('auth')->name('dashboard');


//Route::prefix('admin')->name('admin.')->group(function () {

// User Routes
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('/users/document/{user}', [UserController::class, 'getDocument'])->name('users.document');
Route::post('/users/document', [DocumentController::class, 'store'])->name('users.upload.document');
Route::get('/users/document/list', [UserController::class, 'documentList'])->name('users.document.list');
Route::post('/users/document/destroy', [DocumentController::class, 'documentDestroy'])->name('users.document.destroy');
Route::post('/users/download/documents', [DocumentController::class, 'mergeDocuments'])->name('users.download.documents');

Route::get('/payment/{user}', [PaymentController::class, 'create'])->name('users.payment');
Route::post('/payment/store', [PaymentController::class, 'store'])->name('users.payment.store');
Route::get('/payment/edit/{payment}', [PaymentController::class, 'edit'])->name('users.payment.edit');
Route::get('/payment/list', [PaymentController::class, 'documentList'])->name('users.payment.list');
Route::post('/payment/destroy', [PaymentController::class, 'destroy'])->name('users.payment.destroy');
// Route::post('/payment/destroy/{payment}', [PaymentController::class, 'destroy'])->name('users.payment.destroy');

// Group Routes
Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
Route::post('/groups/store', [GroupController::class, 'store'])->name('groups.store');
Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');
Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
Route::put('/groups/{group}', [GroupController::class, 'update'])->name('groups.update');
Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');
Route::post('/groups', [GroupController::class, 'storeUsersGroup'])->name('groups.store.users');


Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/services', [HomeController::class, 'services'])->name('services');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');
