<?php

use App\Livewire\Admin\AddProduct;
use App\Livewire\Admin\AddStyle;
use App\Livewire\Admin\EditProduct;
use App\Livewire\Admin\EditStyle;
use App\Livewire\Admin\ShowSells;
use App\Livewire\ContactUs;
use App\Livewire\Product\CompleteCardprocess;
use App\Livewire\Product\GuestcompleteCardprocess;
use App\Livewire\Product\ShowallProduct;
use App\Livewire\Product\ShowCard;
use App\Livewire\Product\ShowProduct;
use App\Livewire\Product\ShowsGuestcard;
use App\Livewire\Student\MessangerChat;
use App\Livewire\Teacher\WelcometeacherPage;
use App\Livewire\WelcomePage;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomePage::class)->name('welcome');
Route::get('/messanger', MessangerChat::class)->name('chat.messanger');

Route::get('/hello_teacher', WelcometeacherPage::class)->name('welcome.teacher');
Route::get('/teacher_messanger/{student_id}', App\Livewire\Teacher\MessangerChat::class)->name('teacher.chat.messanger');


Route::get('/show_product/{product}', ShowProduct::class)->name('show.product');
Route::get('/show_all_the_products', ShowallProduct::class)->name('show.all.products');
Route::get('/show_card', ShowCard::class)->name('show.card');
Route::get('/show_guest_card', ShowsGuestcard::class)->name('show.guest.card');
Route::get('/complete_card_process/{style}/{size}/{quantity}', CompleteCardprocess::class)->name('complete.card.process');
Route::get('/guest_complete_card_process/{style}/{size}/{quantity}', GuestcompleteCardprocess::class)->name('guest.complete.card.process');



Route::group(['middleware' => ['role:Admin']], function () {
    Route::get('/add_product', AddProduct::class)->name('add.product');
    Route::get('/edit_product/{product}', EditProduct::class)->name('edit.product');
    Route::get('/add_style/{product}', AddStyle::class)->name('add.style');
    Route::get('/edit_style/{style}', EditStyle::class)->name('edit.style');
    Route::get('/show_sells', ShowSells::class)->name('show.sells');
});
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';