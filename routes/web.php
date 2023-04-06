<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\BlogCategoryController;


Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

//Admin All Route
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'edit')->name('edit.profile');
    Route::get('/change/password', 'changePassword')->name('change.password');
    
    Route::post('/store/profile', 'store')->name('store.profile');
    Route::post('/update/password', 'updatePassword')->name('update.password');
});

//HomeSlider All Route
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide', 'homeSlider')->name('home.slide');

    Route::post('/update/slider', 'update')->name('update.slider');
});

//About All Route
Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'homeAbout')->name('home.about');
    Route::get('/about/page', 'aboutPage')->name('about.page');
    Route::get('/about/multi/image', 'aboutMulti')->name('about.multi.image');
    Route::get('/all/multi/image', 'allMulti')->name('all.multi.image');
    Route::get('/edit/multi/{id}', 'editItem')->name('edit.multi');
    Route::get('/delete/multi/image{id}', 'deleteMultiImage')->name('delete.multi.image');

    Route::post('/update/about', 'update')->name('update.about');
    Route::post('/update/multi', 'storeMulti')->name('store.multi.image');
    Route::post('/update/multi/image', 'updateMultiImage')->name('update.multi.image');
});

//Portfolio All Route
Route::controller(PortfolioController::class)->group(function () {
    Route::get('/portfolio', 'homePortfolio')->name('home.portfolio');
    Route::get('/all/portfolio', 'allPortfolio')->name('all.portfolio');
    Route::get('/add/portfolio', 'addPortfolio')->name('add.portfolio');
    Route::get('/edit/portfolio/{id}', 'editPortfolio')->name('edit.portfolio');
    Route::get('/delete/portfolio/{id}', 'deletePortfolio')->name('delete.portfolio');
    Route::get('/portfolio/details/{id}', 'portfolioDetails')->name('portfolio.details');
    
    Route::post('/store/portfolio', 'storePortfolio')->name('store.portfolio');
    Route::post('/update/portfolio', 'updatePortfolio')->name('update.portfolio');
});

//BlogCategory All Route
Route::controller(BlogCategoryController::class)->group(function () {
    Route::get('/all/blog/category', 'allBlog')->name('all.blog.category');
    Route::get('/add/blog/category', 'addBlog')->name('add.blog.category');
    Route::get('/edit/blog/category/{id}', 'editBlog')->name('edit.blog.category');
    Route::get('/delete/blog/category/{id}', 'deleteBlog')->name('delete.blog.category');
    
    Route::post('/store/blog/category', 'storeBlog')->name('store.blog.category');
    Route::post('/update/blog/category', 'updateBlog')->name('update.blog.category');
});

//Blog All Route
Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'homeBlog')->name('home.blog');
    Route::get('/all/blogs', 'allBlogs')->name('all.blogs');
    Route::get('/add/blogs', 'addBlogs')->name('add.blogs');
    Route::get('/edit/blog/{id}', 'editBlog')->name('edit.blog');
    Route::get('/delete/blog/{id}', 'deleteBlog')->name('delete.blog');
    Route::get('/blog/details/{id}', 'blogDetails')->name('blog.details');
    Route::get('/category/blog/{id}', 'categoryBlog')->name('category.blog');
    
    Route::post('/store/blog', 'storeBlog')->name('store.blog');
    Route::post('/update/blog', 'updateBlog')->name('update.blog');
});

//Footer All Route
Route::controller(FooterController::class)->group(function () {
    Route::get('/footer/setup', 'footerSetup')->name('footer.setup');

    // Route::post('/store/blog', 'storeBlog')->name('store.blog');
    Route::post('/update/footer', 'updateFooter')->name('update.footer');
});

//Contact All Route
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'contact')->name('contact.me');
    Route::get('/contact/message', 'contactMessage')->name('contact.message');
    Route::get('/delete/message/{id}', 'deleteMessage')->name('delete.message');

    Route::post('/store/message', 'storeMessage')->name('store.message');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';