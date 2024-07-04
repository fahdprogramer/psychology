<?php

use App\Livewire\Admin\StudentListe;
use App\Livewire\Admin\TeacherListe;
use App\Livewire\Admin\WelcomeAdmin;
use App\Livewire\Other\ShowNotification;
use App\Livewire\Profile;
use App\Livewire\Student\MessangerChat;
use App\Livewire\Teacher\WelcometeacherPage;
use App\Livewire\WelcomePage;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomePage::class)->name('welcome');
Route::middleware(['auth'])->group(function () {
Route::get('/messanger', MessangerChat::class)->name('chat.messanger');
Route::get('/show_notifications', ShowNotification::class)->name('show.notifications');

Route::get('/hello_teacher', WelcometeacherPage::class)->name('welcome.teacher');
Route::get('/teacher_messanger/{student_id}', App\Livewire\Teacher\MessangerChat::class)->name('teacher.chat.messanger');

Route::get('/admin', WelcomeAdmin::class)->name('welcome.admin');
Route::get('/student_liste', StudentListe::class)->name('student.liste');
Route::get('/teacher_liste', TeacherListe::class)->name('teacher.liste');

});


Route::group(['middleware' => ['role:Admin']], function () {
});
Route::get('/dashboard', WelcomePage::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    Route::get('profile', Profile::class)->middleware(['auth'])->name('profile');


require __DIR__ . '/auth.php';