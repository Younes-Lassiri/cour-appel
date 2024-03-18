<?php

use App\Http\Controllers\DemandeAbsenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\employeController;
use App\Http\Controllers\messagesController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\ResponseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::post('/message', [messagesController::class, 'store'])->name('message.store');
Route::post('/download-pdf', [messagesController::class, 'downloadPdf'])->name('download.pdf');

Route::middleware(['auth.redirect'])->group(function () {
    Route::get('/admin-login', [AdminController::class, 'loginBlade'])->name('adminBlade');
});

Route::middleware(['admin.redirect'])->group(function () {
    Route::view('/addMessage', 'addMessage')->name('message.add')->middleware('message.employe');
    Route::get('/listMessage', [messagesController::class, 'index'])->name('message.index')->middleware('message.employe');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/message-gestion', [messagesController::class, 'gestion'])->name('message.gestion')->middleware('message.employe');
    Route::get('/send-demande', [DemandeAbsenceController::class, 'sendDemandeAbsence'])->name('demande.show')->middleware('message.employe');
    Route::post('/send_demande', [DemandeAbsenceController::class, 'sendDemandeAbsenceStore'])->name('demande.store')->middleware('message.employe');
});



Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/employe-signup', [employeController::class, 'signupBladeEpmploye'])->name('employe.signup.blade');
Route::post('/employe-signup', [employeController::class, 'signUpEpmploye'])->name('employe.signup');


Route::get('/admin-signup', [AdminController::class, 'signupBlade'])->name('signupBlade');
Route::post('/signup', [AdminController::class, 'signUp'])->name('admin.signup');







Route::middleware(['employe.role'])->group(function () {
    Route::get('/waitting-employees', [AdminController::class, 'listWaitingEmployees'])->name('listWaitingEmployees');
});


Route::post('/accept/{id}', [AdminController::class, 'acceptEmploye'])->name('employe.accept');



Route::get('/add-response/{id}', [ResponseController::class, 'show'])->name('response.show');

Route::post('/add-response', [ResponseController::class, 'create'])->name('response.create');



Route::post('/presence-register', [PresenceController::class, 'register'])->name('presence.register');


Route::post('/presence-time-out', [PresenceController::class, 'timeout'])->name('presence.timeout');


Route::get('/presence-list', [PresenceController::class, 'presenceList'])->name('presence.list');



Route::get('/demandes-list', [DemandeAbsenceController::class, 'index'])->name('demande.index');




Route::post('/accept-demande/{id}', [DemandeAbsenceController::class, 'acceptDemande'])->name('demande.accept');


Route::post('/refuse-demande/{id}', [DemandeAbsenceController::class, 'refuseDemande'])->name('demande.refuse');




Route::get('/list-demande', [DemandeAbsenceController::class, 'listDemande'])->name('list.demande');



Route::get('/settings', [AdminController::class, 'settingsShow'])->name('settings.show');




Route::post('/settings-update', [AdminController::class, 'settingsUpdate'])->name('settings.update');

