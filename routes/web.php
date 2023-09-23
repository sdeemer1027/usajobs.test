<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ImpersonationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\SeekerController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\WelcomeController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/company-dashboard', [CompanyController::class, 'index'])->name('company.dashboard');
    Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/companies/{id}', [CompanyController::class, 'update'])->name('companies.update');

    //Seekers Routes
    Route::get('/seeker-dashboard', [SeekerController::class, 'index'])->name('seeker.dashboard');
    Route::post('/resumes/upload', [ResumeController::class, 'upload'])->name('resumes.upload');
    Route::get('/seeker/resumes',  [SeekerController::class, 'resumes'])->name('seeker.resumes');
    Route::get('/seeker/appliedto',  [SeekerController::class, 'appliedto'])->name('seeker.applied');

    Route::get('/seeker/findjobs',  [SeekerController::class, 'findjobs'])->name('seeker.findjobs');
    Route::get('/job/details/{id}', [JobController::class, 'showDetails'])->name('job.details');

    Route::post('/apply/{job}', [JobController::class, 'apply'])->name('apply.job');

Route::resource('companies', CompanyController::class);
Route::resource('jobs', JobController::class);

Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');


});



// Start impersonation
Route::get('/start-impersonate/{user}', [ImpersonationController::class, 'startImpersonate'])->name('start.impersonate');
// Stop impersonation
Route::get('/stop-impersonate',  [ImpersonationController::class,'stopImpersonate'])->name('stop.impersonate');







require __DIR__.'/auth.php';
