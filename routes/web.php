<?php
//Illuminate
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
//Controllers
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
//Models
use App\Models\User;
use App\Models\Link;

// Halaman Publik & Statis
Route::get('/', [LinkController::class, 'index']);
Route::post('/shorten', [LinkController::class, 'store']);

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/terms', 'terms')->name('terms');
Route::view('/pricing', 'pricing')->name('pricing');

//Stats
    // Route::get('/stats', [App\Http\Controllers\StatsController::class, 'index'])->name('stats');
Route::get('/stats', function () {
    $totalUsers = User::count();
    $totalLinks = Link::count();
    $totalClicks = Link::sum('clicks');

    return view('stats', compact('totalUsers', 'totalLinks', 'totalClicks'));
})->name('stats');

// Autentikasi (Guest Only)
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    // Register
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    // Forgot Password
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    // Reset Password
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});


// Logout (Auth Only)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

// Verifikasi Email (Auth)
Route::middleware(['auth'])->group(function () {
    // Notice page
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    // Link verify
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/dashboard');
    })->middleware(['signed'])->name('verification.verify');

    // Kirim ulang verifikasi
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');
});

// Dashboard & Link (Auth)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [LinkController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/edit/{id}', [LinkController::class, 'edit'])->name('link.edit');
    Route::post('/dashboard/update/{id}', [LinkController::class, 'update'])->name('link.update');
    Route::delete('/dashboard/delete/{id}', [LinkController::class, 'destroy']);
});


// Profile (Auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Shortlink Redirect (Catch All)
Route::get('/{slug}', [LinkController::class, 'redirect'])->where('slug', '.*');
