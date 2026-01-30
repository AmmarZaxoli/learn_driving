<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\Print_backPageController;

Route::get('/', function () {
    return view('layouts.index');
});



Route::view('/student', 'student.create')->name('student');
Route::view('/coach', 'coach.create')->name('coach');
Route::view('/nationality', 'nationality.create')->name('nationality');
Route::view('/cart', 'cart.create')->name('cart');



//printing

Route::get('/students/print/{id}', function ($id) {
    $student = Student::with('coach', 'nationality')->findOrFail($id);
    return view('student.print', compact('student'));
});

Route::get('/students/print_mror/{id}', function ($id) {
    $student = Student::with('coach', 'nationality')->findOrFail($id);
    return view('student.print_mror', compact('student'));
});
Route::get('/students/print_time/{id}', function ($id) {
    $student = Student::with('coach', 'nationality')->findOrFail($id);
    return view('student.print_time', compact('student'));
});
Route::get('/students/print_payment/{id}', function ($id) {
    $student = Student::with('coach', 'nationality')->findOrFail($id);
    return view('student.print_payment', compact('student'));
});

Route::get('/students/print-combined/{id}', function ($id) {
    $student = Student::with('coach', 'nationality')->findOrFail($id);
    return view('student.print_combined', compact('student'));
});

// Route::get('/cart/print_cart/{id}', function ($id) {
//     $student = Student::with('coach', 'nationality')->findOrFail($id);
//     return view('cart.print_cart', compact('student'));
// })->name('cart.print');




Route::get('/print/selected-students/{ids}', [PrintController::class, 'printSelectedStudents'])
    ->name('print.selected-students');

Route::get('/print/selectedstudentsBackPage/{ids}',[Print_backPageController::class, 'printSelectedStudents']
)->name('print.selectedstudentsBackPage');
