<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExtracurricularController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/tentang', function () {
//     return 9*9;
// });

// Route::get('/contact', function () {
//     return view('contact', ['name' => 'Atha', 'phone' => '089******949']);
// });

// // Route::view('/contact', 'contact', ['name' => 'Atha', 'phone' => '089******949']);

// Route::redirect('/contact', '/contact-us');

// Route::get('/product', function () {
//     return 'product';
// });

// // Route::get('/product/{id}', function ($id) {
// //     return 'product with id '.$id;
// // });

// Route::get('/product/{id}', function ($id) {
//     return view('product.detail', ['id' => $id]);
// });

// Route::prefix('admin')->group(function () {
//     Route::get('/profil-admin', function () {
//         return 'profil admin';
//     });
    
//     Route::get('/about-admin', function () {
//         return 'about admin';
//     });

//     Route::get('/contact-admin', function () {
//         return 'welcome';
//     });

//     Route::get('/profil-admin2', function () {
//         return 'profil admin 2';
//     });
    
//     Route::get('/about-admin2', function () {
//         return 'about admin 2';
//     });

//     Route::get('/contact-admin2', function () {
//         return 'contact admin';
//     });
// });

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

// Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
// Route::post('/register', [AuthController::class, 'registering'])->middleware('guest');


Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
// 
Route::get('/student/{id}', [StudentController::class, 'show'])->middleware(['auth', 'must-admin-or-teacher']);
Route::get('/student-add', [StudentController::class, 'create'])->middleware(['auth', 'must-admin-or-teacher']);
Route::post('/student', [StudentController::class, 'store'])->middleware(['auth', 'must-admin-or-teacher']);
Route::get('/student-edit/{id}', [StudentController::class, 'edit'])->middleware(['auth', 'must-admin-or-teacher']);
Route::put('/student/{id}', [StudentController::class, 'update'])->middleware(['auth', 'must-admin-or-teacher']);
// 
Route::get('/student-delete/{id}', [StudentController::class, 'delete'])->middleware(['auth', 'must-admin']);
Route::delete('/student-destroy/{id}', [StudentController::class, 'destroy'])->middleware(['auth', 'must-admin']);
Route::get('/student-deleted', [StudentController::class, 'deletedStudent'])->middleware(['auth', 'must-admin']);
Route::get('/student/{id}/restore', [StudentController::class, 'restore'])->middleware(['auth', 'must-admin']);


Route::get('/class', [ClassController::class, 'index'])->middleware('auth');
Route::get('/class-detail/{id}', [ClassController::class, 'show'])->middleware('auth');
//
Route::get('/class-add', [ClassController::class, 'create'])->middleware(['auth', 'must-admin']);
Route::post('/class-store', [ClassController::class, 'store'])->middleware(['auth', 'must-admin']);
Route::get('/class-edit/{id}', [ClassController::class, 'edit'])->middleware(['auth', 'must-admin']);
Route::put('/class/{id}', [ClassController::class, 'update'])->middleware(['auth', 'must-admin']);
Route::get('/class-delete/{id}', [ClassController::class, 'delete'])->middleware(['auth', 'must-admin']);
Route::delete('/class-destroy/{id}', [ClassController::class, 'destroy'])->middleware(['auth', 'must-admin']);
Route::get('/class-deleted', [ClassController::class, 'deletedClass'])->middleware(['auth', 'must-admin']);
Route::get('/class/{id}/restore', [ClassController::class, 'restore'])->middleware(['auth', 'must-admin']);


Route::get('/extracurricular', [ExtracurricularController::class, 'index'])->middleware('auth');
Route::get('/extracurricular-detail/{id}', [ExtracurricularController::class, 'show'])->middleware('auth');
//
Route::get('/extracurricular-add', [ExtracurricularController::class, 'create'])->middleware(['auth', 'must-admin']); 
Route::post('/extracurricular-store', [ExtracurricularController::class, 'store'])->middleware(['auth', 'must-admin']);
Route::get('/extracurricular-edit/{id}', [ExtracurricularController::class, 'edit'])->middleware(['auth', 'must-admin']);
Route::put('/extracurricular/{id}', [ExtracurricularController::class, 'update'])->middleware(['auth', 'must-admin']);
Route::get('/extracurricular-delete/{id}', [ExtracurricularController::class, 'delete'])->middleware(['auth', 'must-admin']);
Route::delete('/extracurricular-destroy/{id}', [ExtracurricularController::class, 'destroy'])->middleware(['auth', 'must-admin']);
Route::get('/extracurricular-deleted', [ExtracurricularController::class, 'deletedEkskul'])->middleware(['auth', 'must-admin']);
Route::get('/extracurricular/{id}/restore', [ExtracurricularController::class, 'restore'])->middleware(['auth', 'must-admin']);


Route::get('/teachers', [TeacherController::class, 'index'])->middleware('auth');
//
Route::get('/teacher/{id}', [TeacherController::class, 'show'])->middleware(['auth', 'must-admin']);
Route::get('/teacher-add', [TeacherController::class, 'create'])->middleware(['auth', 'must-admin']); 
Route::post('/teacher-store', [TeacherController::class, 'store'])->middleware(['auth', 'must-admin']);
Route::get('/teacher-edit/{id}', [TeacherController::class, 'edit'])->middleware(['auth', 'must-admin']);
Route::put('/teacher/{id}', [TeacherController::class, 'update'])->middleware(['auth', 'must-admin']);
Route::get('/teacher-delete/{id}', [TeacherController::class, 'delete'])->middleware(['auth', 'must-admin']);
Route::delete('/teacher-destroy/{id}', [TeacherController::class, 'destroy'])->middleware(['auth', 'must-admin']);
Route::get('/teacher-deleted', [TeacherController::class, 'deletedTeacher'])->middleware(['auth', 'must-admin']);
Route::get('/teacher/{id}/restore', [TeacherController::class, 'restore'])->middleware(['auth', 'must-admin']);

// Route::get('/student-mass-update', [StudentController::class, 'massUpdate']);