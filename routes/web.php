<?php


use App\Livewire\{ArticleCreate,
    ArticleEdit,
    ArticlesUser,
    CategoriesUpdate,
    DeleteUser,
    Home,
    Category,
    PasswordForm,
    Profile,
    User,
    Article,
    ArticleShow};
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\{Register, Login, Forgot, Reset};


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

Route::get('/', Home::class)->name('home');

Route::get('category/{category}', Category::class)->name('category');

Route::get('user/{user:slug}', User::class)->name('user');

Route::get('article/create', ArticleCreate::class)->name('article.create')->middleware('auth');
Route::get('article/edit/{article:slug}', ArticleEdit::class)->name('article.edit')->middleware('auth');
Route::get('articles/user', ArticlesUser::class)->name('articles.user')->middleware('auth');
Route::get('article/{article:slug}', ArticleShow::class)->name('article.show');
Route::get('categories/update', CategoriesUpdate::class)->name('categories.update')->middleware('auth');

Route::middleware(['guest'])->group(function () {
    // route register
    Route::get('register', Register::class)->name('register');
    // route login
    Route::get('login', Login::class)->name('login');
    // route forgot
    Route::get('forgot', Forgot::class)->name('forgot');
    // route reset password
    Route::get('reset', Reset::class)->name('reset');


});

Route::middleware(['auth'])->group(function () {
    // route profile
    Route::get('profile', Profile::class)->name('profile');
    // route update password
    Route::get('password', PasswordForm::class)->name('password');
    //route delete user
    Route::get('delete', DeleteUser::class)->name('delete');



    // route logout
    Route::get('logout', function () {
        auth()->logout();;
        return redirect('/');
    })->name('logout');
});
