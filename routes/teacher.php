<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\teachers\student\StudentController;
use App\Models\Student;
use App\Models\Teacher;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth:teacher']
    ],
    function () {
        Route::get('/teacher/dashboard', function () {

            $teacher_sections = Teacher::findOrFail(auth()->user()->id)->sections()->pluck('section_id');
            $sections_num = $teacher_sections->count();
            $teacher_students_num = Student::whereIn('section_id', $teacher_sections)->count();
            return view('teachers.dashboard.dashboard',compact('sections_num', 'teacher_students_num'));
        });

        Route::group(['prefix'=> '/teacher/dashboard','as'=> 'teacher.'],function(){
            route::get('students',[StudentController::class,'index'])->name('students.index');
            route::get('students-attendance',[StudentController::class,'show'])->name('students.show');
            route::get('sections',[StudentController::class,'section'])->name('sections');
        });

    }
);

