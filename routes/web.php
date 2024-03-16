<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\RecruitmentController;


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Models\Employee;
use GuzzleHttp\Middleware;

Route::get('/', [StaticController::class, 'welcome']);
Route::get('/dashboard', [StaticController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');;
Route::get('/about', [StaticController::class, 'about'])->name('about');
Route::get('/contact', [StaticController::class, 'contact'])->name('contact');


Route::get('/add_employee', [EmployeeController::class, 'add_employee'])->name('add_employee');
// Route::delete('/employees/deletemultiple', [EmployeeController::class, 'deleteMultiple'])->name('employees.deleteMultiple');
Route::resource('/employees', EmployeeController::class);


Route::resource('/absences', AbsenceController::class);
Route::get('/add_absence', [AbsenceController::class, 'add_absence'])->Middleware(['auth', 'verified'])->name('add_absence');


Route::resource('/conge', CongeController::class);

Route::resource('/formation', FormationController::class);

Route::resource('/recruitment', RecruitmentController::class);






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






require __DIR__ . '/auth.php';
