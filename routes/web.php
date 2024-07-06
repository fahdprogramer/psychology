<?php

use App\Livewire\Admin\AdminNotification;
use App\Livewire\Admin\AdminProfile;
use App\Livewire\Admin\Mainpage;
use App\Livewire\Admin\StudentListe;
use App\Livewire\Admin\TeacherListe;
use App\Livewire\Admin\WelcomeAdmin;
use App\Livewire\Other\ShowNotification;
use App\Livewire\Profile;
use App\Livewire\Student\MessangerChat;
use App\Livewire\Student\StudentMainpage;
use App\Livewire\Teacher\MessangerPage;
use App\Livewire\Teacher\TeacherMainpage;
use App\Livewire\Teacher\TeacherNotification;
use App\Livewire\Teacher\TeacherProfile;
use App\Livewire\Teacher\WelcometeacherPage;
use App\Livewire\WelcomePage;
use App\Livewire\Welcomepage\ShowPage2;
use Illuminate\Support\Facades\Route;

Route::get('/index', Mainpage::class)->name('index.page');
Route::get('/student_index', StudentMainpage::class)->name('index.page.student');
Route::get('/teacher_index', TeacherMainpage::class)->name('index.page.teacher');

Route::get('/', WelcomePage::class)->name('welcome');
Route::middleware(['auth'])->group(function () {
Route::get('/messanger', MessangerChat::class)->name('chat.messanger');
Route::get('/show_notifications', ShowNotification::class)->name('show.notifications');
Route::get('/show_notifications_teacher', TeacherNotification::class)->name('show.notifications.teacher');
Route::get('/show_notifications_admin', AdminNotification::class)->name('show.notifications.admin');

Route::get('/hello_teacher', WelcometeacherPage::class)->name('welcome.teacher');
Route::get('/teacher_chat_messanger/{student_id}', App\Livewire\Teacher\MessangerChat::class)->name('teacher.chat.messanger');
Route::get('/teacher_messanger/{student_id}', MessangerPage::class)->name('teacher.messanger');

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
    Route::get('admin_profile', AdminProfile::class)->middleware(['auth'])->name('admin.profile');
    Route::get('teacher_profile', TeacherProfile::class)->middleware(['auth'])->name('teacher.profile');


require __DIR__ . '/auth.php';