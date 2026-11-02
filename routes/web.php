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

// Part C: Explicit Route Model Binding
Route::get('/roll/{roll}', function ($roll) {

    if ($roll instanceof Student) {
        $student = $roll;
    } else {
        $student = Student::where('roll_no', $roll)->firstOrFail();
    }

    return "Welcome " . $student->name;
});