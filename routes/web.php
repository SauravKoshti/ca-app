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
})->name('home');

Route::get('/users/login', function () {
    return view('users.auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'registration'])->name('user.register');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/dashboard', [AuthController::class, 'index'])->name('admin.index');


// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware('auth')->name('dashboard');


//Route::prefix('admin')->name('admin.')->group(function () {

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin:admin,user'])->group(function () {
        // User Routes
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::post('/users/download/csv', [UserController::class, 'downloadSelectedUsers'])->name('users.download.csv');

        // Forgot Username & Password Routes
        Route::get('/forgot-username', [UserController::class, 'showForgotUsernameForm'])->name('forgot.username');
        Route::post('/forgot-username', [UserController::class, 'sendUsername']);

        Route::get('/forgot.password', [UserController::class, 'showForgotPasswordForm'])->name('forgot.password.form');
        Route::post('/forgot.password', [UserController::class, 'sendPasswordResetLink'])->name('forgot.password.send');

        Route::get('/users/document/{user}', [UserController::class, 'getDocument'])->name('users.document');
        Route::post('/users/document', [DocumentController::class, 'store'])->name('users.upload.document');
        Route::get('/users/document/list', [UserController::class, 'documentList'])->name('users.document.list');
        Route::post('/users/document/destroy', [DocumentController::class, 'documentDestroy'])->name('users.document.destroy');
        Route::post('/users/download/documents', [DocumentController::class, 'mergeDocuments'])->name('users.download.documents');

        Route::get('/payment/{user}', [PaymentController::class, 'create'])->name('users.payment');
        Route::post('/payment/store', [PaymentController::class, 'store'])->name('users.payment.store');
        Route::get('/payment/{user}', [PaymentController::class, 'create'])->name('users.payment');
        Route::get('/payment/edit/{payment}', [PaymentController::class, 'edit'])->name('users.payment.edit');
        Route::put('/payment/{payment}', [PaymentController::class, 'update'])->name('users.payment.update');
        Route::post('/payment/destroy', [PaymentController::class, 'destroy'])->name('users.payment.destroy');

        // Group Routes
        Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
        Route::get('/groups/create', [GroupController::class, 'create'])->name('groups.create');
        Route::post('/groups/store', [GroupController::class, 'store'])->name('groups.store');
        Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');
        Route::get('/groups/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
        Route::put('/groups/{group}', [GroupController::class, 'update'])->name('groups.update');
        Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');
        Route::post('/groups', [GroupController::class, 'storeUsersGroup'])->name('groups.store.users');
        Route::post('/remove-user-from-group', [GroupController::class, 'removeUserFromGroup'])
            ->name('user.remove.from.group');

    });
});
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/services', action: [HomeController::class, 'services'])->name('services');
Route::get('/services/mutualfunds', [HomeController::class, 'mutualfunds'])->name('services.mutualfunds');
Route::get('/services/taxation', [HomeController::class, 'taxation'])->name('services.taxation');
Route::get('/services/gst', [HomeController::class, 'gst'])->name('services.gst');
Route::get('/services/accounting', [HomeController::class, 'accounting'])->name('services.accounting');
Route::get('/services/pancard', [HomeController::class, 'pancard'])->name('services.pancard');

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');
Route::post('/contact/download/csv', [ContactController::class, 'downloadSelectedContact'])->name('contact.download.csv');