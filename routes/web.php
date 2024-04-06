<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\DemandeRecrutmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Models\Employee;
use App\Models\Recruitment;
use GuzzleHttp\Middleware;

Route::get('/welcome', [StaticController::class, 'welcome'])->name('welcome');
Route::get('/', [StaticController::class, 'welcome']);

Route::get('/dashboard', [StaticController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');;
Route::get('/about', [StaticController::class, 'about'])->name('about');
Route::get('/contact', [StaticController::class, 'contact'])->name('contact');




Route::get('/add_employee', [EmployeeController::class, 'add_employee'])->middleware(['auth', 'verified'])->name('add_employee');
// Route::delete('/employees/deletemultiple', [EmployeeController::class, 'deleteMultiple'])->name('employees.deleteMultiple');
Route::resource('/employees', EmployeeController::class);
Route::get('/employee/login', [EmployeeController::class, 'showLoginForm'])->name('employee.login');
Route::get('/employee/{employee}/edit', [EmployeeController::class, 'Edit_V'])->name('employee.Edit');



Route::post('/employee/logout', [EmployeeController::class, 'logout'])->name('employee.logout')->middleware(['auth.employee']);;
Route::post('/employee/login', [EmployeeController::class, 'login']);
Route::get('/register_condidat', [EmployeeController::class, 'registerCondidat'])->name('register_condidat');
Route::post('/store_condidat', [EmployeeController::class, 'store_condidat'])->name('store_condidat');

// Route::post('register_condidat', [EmployeeController::class, 'store'])->name('register_condidat');;


Route::resource('/absences', AbsenceController::class)->middleware(['auth', 'verified']);
Route::get('/add_absence', [AbsenceController::class, 'add_absence'])->Middleware(['auth', 'verified'])->name('add_absence');


Route::resource('/conge', CongeController::class);
Route::GET('/demande_conge', [CongeController::class,'create'])->name('demande_conge')->middleware(['auth.employee']);
Route::POST('/store_demande_conge', [CongeController::class,'store'])->name('store_demande_conge')->middleware(['auth.employee']);



Route::resource('/formation', FormationController::class)->middleware(['auth', 'verified']);

Route::resource('/recruitment', RecruitmentController::class); //->middleware(['auth', 'verified'])

Route::get('/Affiche Condidat/{id}', [RecruitmentController::class, 'afficheCondidat'])->name('affiche_condidat');
Route::get('/Details Offre{id}', [RecruitmentController::class, 'detailsOffer'])->name('Offre_details')->middleware(['auth.employee']);
Route::get('/formulaire Offre{id}', [RecruitmentController::class, 'afficherOfferForm'])->name('form_candidat_offre')->middleware(['auth.employee']);
Route::get('/add_offer', [RecruitmentController::class, 'add_offer'])->middleware(['auth', 'verified'])->name('add_offer');
Route::get('/offre_emploi', [RecruitmentController::class, 'offre_emploi'])->name('offre_emploi')->middleware(['auth.employee']);

Route::resource('demande_recrutment', DemandeRecrutmentController::class);
Route::get('/demande_recrutment', [DemandeRecrutmentController::class, 'index'])->name('demande_recrutment.index')->middleware(['auth.employee']);


Route::resource('evaluations-formations', 'EvaluationFormationController');
Route::resource('employes-formations', 'EmployeFormationController');
Route::resource('sessions-formations', 'SessionFormationController');
Route::resource('formations', FormationController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






require __DIR__ . '/auth.php';
