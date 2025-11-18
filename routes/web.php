<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AgendaController;
use App\Models\Gallery;

// Halaman utama → tampilkan landing page
Route::get('/', function () {
    $latestGalleries = \App\Models\Gallery::latest()->take(16)->get();
    $latestNews = \App\Models\News::latest()->take(3)->get();
    $latestAgendas = \App\Models\Agenda::orderBy('start_date', 'asc')->take(4)->get();
    return view('magazine', compact('latestGalleries','latestNews','latestAgendas'));
})->name('home');

// ===================
// 🔹 Authentication Routes
// ===================
Route::middleware('prevent-back-history')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ===================
// 🔹 Halaman Publik (User)
// ===================
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{gallery}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/gallery/{gallery}/download', [GalleryController::class, 'download'])->name('gallery.download');

// Program pages
Route::get('/programs/tkj', function () {
    return view('programs.tkj');
})->name('programs.tkj');
Route::get('/programs/pplg', function () {
    return view('programs.pplg');
})->name('programs.pplg');
Route::get('/programs/to', function () {
    return view('programs.to');
})->name('programs.to');
Route::get('/programs/tpfl', function () {
    return view('programs.tpfl');
})->name('programs.tpfl');

// Public News pages
Route::get('/news', [NewsController::class, 'publicIndex'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'publicShow'])->name('news.show');

// Public Agenda page
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');

// About page
Route::get('/about', function () {
    return view('about');
})->name('about');

// Test route
Route::get('/test-about', function () {
    return 'About route is working!';
})->name('test.about');

// Test about view
Route::get('/test-about-view', function () {
    return view('about');
})->name('test.about.view');

// Contact page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// ===================
// 🔹 Halaman Admin (CRUD)
// ===================
Route::prefix('admin')->name('admin.')->middleware(['auth','prevent-back-history'])->group(function () {

    // Galeri
    Route::get('/gallery', [GalleryController::class, 'adminIndex'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{gallery}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    
    // API untuk kategori
    Route::get('/gallery/categories', [GalleryController::class, 'getCategories'])->name('gallery.categories');

    // Pesan kontak
    Route::get('/messages', [ContactController::class, 'index'])->name('messages.index');
    Route::delete('/messages/{message}', [ContactController::class, 'destroy'])->name('messages.destroy');

    // Berita
    Route::get('/news', [NewsController::class, 'adminIndex'])->name('news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');

    // Agenda
    Route::get('/agenda', [AgendaController::class, 'adminIndex'])->name('agenda.index');
    Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
    Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');
    Route::get('/agenda/{agenda}/edit', [AgendaController::class, 'edit'])->name('agenda.edit');
    Route::put('/agenda/{agenda}', [AgendaController::class, 'update'])->name('agenda.update');
    Route::delete('/agenda/{agenda}', [AgendaController::class, 'destroy'])->name('agenda.destroy');

    // Dashboard admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});
