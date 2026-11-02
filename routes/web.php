<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Models\Student;

Route::get('/', function () {
    return view('home');
});

// Part A: MVC and Routes

Route::get('/hello/{your_name}', function ($your_name) {
    return "Hello " . $your_name;
});

Route::get('/about', [PageController::class, 'about']);

// Part B: Resource Controller

Route::resource('students', StudentController::class);

Route::get('/roll/{your_roll}', function (Student $your_roll) {
    return "Welcome " . $your_roll->name;
});
