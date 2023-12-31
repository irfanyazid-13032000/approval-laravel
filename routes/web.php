<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\FillPDFController;
use App\Http\Controllers\ApprovalController;
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
    return view('dashboard.index');
})->middleware('auth');

Route::resource('intern', MagangController::class)->middleware('adminhr');
Route::get('/sertifikat/{email}', [FillPDFController::class, 'show'])->name('sertifikat.show')->middleware('adminhr');
Route::post('/sertifikat/{id}', [FillPDFController::class, 'process'])->name('sertifikat.process')->middleware('adminhr');
Route::resource('divisi', DivisiController::class)->middleware('adminhr');
Route::resource('role', RoleController::class)->middleware('adminhr');


// Route::resource('absensi', AbsensiController::class)->middleware('auth');
Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index')->middleware('admin');
Route::get('/absensi/{email}', [AbsensiController::class, 'show'])->name('absensi.show')->middleware('auth');
Route::get('/rekapabsensi', [AbsensiController::class, 'index'])->name('rekap.absensi')->middleware('auth');
Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create')->middleware('auth');
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store')->middleware('auth');
Route::get('/absensi/{absensi}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit')->middleware('auth');
Route::put('/absensi/{absensi}', [AbsensiController::class, 'update'])->name('absensi.update')->middleware('auth');
Route::delete('/absensi/{absensi}', [AbsensiController::class, 'destroy'])->name('absensi.destroy')->middleware('admin');
Route::get('/ekspor-pdf', [PdfController::class, 'eksporPDF'])->middleware('auth');
Route::get('/ekspor-pdf/bulan', [PdfController::class, 'eksporPDFBulan'])->middleware('auth');
Route::get('/ekspor-pdf/minggu', [PdfController::class, 'eksporPDFMinggu'])->middleware('auth');
Route::get('/ekspor-pdf/hari', [PdfController::class, 'eksporPDFHari'])->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('admin');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('admin');

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login-post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->name('register-post')->middleware('guest');


Route::get('/approval', [ApprovalController::class, 'index'])->name('approval.index')->middleware('auth');
Route::get('/approver/{i}', [ApprovalController::class, 'approver'])->name('approver.all')->middleware('auth');
Route::get('/approver-edit/{i}/{id}', [ApprovalController::class, 'approverEdit'])->name('approver.edit')->middleware('auth');
Route::get('/approver-show/{i}/{id}', [ApprovalController::class, 'approverShow'])->name('approver.show')->middleware('auth');
Route::post('/approver-store', [ApprovalController::class, 'store'])->name('approver.store')->middleware('auth');
Route::get('/submitted-approval-data', [ApprovalController::class, 'approval'])->name('submitted.approval.data')->middleware('auth');
Route::get('/delete-approval/{id}', [ApprovalController::class, 'destroy'])->name('delete.approval')->middleware('auth');
Route::get('/detail-approval/{id}', [ApprovalController::class, 'show'])->name('detail.approval')->middleware('auth');
Route::get('/edit-approval/{id}', [ApprovalController::class, 'edit'])->name('edit.approval')->middleware('auth');
Route::post('/update-approval/{id}', [ApprovalController::class, 'update'])->name('update.approval')->middleware('auth');
Route::get('/submit-approval/{id}', [ApprovalController::class, 'submit'])->name('submit.approval')->middleware('auth');
Route::get('/create-approval/', [ApprovalController::class, 'create'])->name('create.approval')->middleware('auth');
Route::get('/approver-approval/{id}', [ApprovalController::class, 'approver_approval'])->name('approver.approval')->middleware('auth');
Route::get('/lihat-approval/{id}', [ApprovalController::class, 'lihatApproval'])->name('lihat.approval')->middleware('auth');


Route::get('/responsibility', [ApprovalController::class, 'responsibility'])->name('responsibility.index')->middleware('auth');
Route::get('/responsibility-data', [ApprovalController::class, 'responsibilityData'])->name('responsibility.data')->middleware('auth');

Route::post('/approve-approval', [ApprovalController::class, 'approveApproval'])->name('approve.approval')->middleware('auth');
Route::post('/reject-approval', [ApprovalController::class, 'rejectApproval'])->name('reject.approval')->middleware('auth');