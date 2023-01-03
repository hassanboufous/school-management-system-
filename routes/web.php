<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\fees\FeeController;
use App\Http\Controllers\grades\GradeController;
use App\Http\Controllers\quizze\QuizzeController;

use App\Http\Controllers\library\LibraryController;
use App\Http\Controllers\sections\SectionController;
use App\Http\Controllers\students\StudentController;
use App\Http\Controllers\subjects\SubjectController;

use App\Http\Controllers\teachers\TeacherController;
use App\Http\Controllers\question\QuestionController;
use App\Http\Controllers\students\PromotionController;
use App\Http\Controllers\classrooms\ClassroomController;
use App\Http\Controllers\attendance\AttendanceController;
use App\Http\Controllers\graduation\GraduationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\onlineclass\OnlineClassController;
use App\Http\Controllers\settings\SettingController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



// Mcamara (package) laravel localisation (Arabic & English) ---------------------------
Route::group(
        [
            'prefix'=>LaravelLocalization::setLocale(),
            'middleware'=>['localeSessionRedirect','localizationRedirect','localeViewPath','auth']
        ],
     function() {

        // System dashboard ----------------------
        Route::get('/dashboard', [HomeController::class,'dashboard'])->middleware('auth:web')->name('dashboard');

        //-- classrooms ---------------------------------------------
        Route::resource('classrooms',ClassroomController::class);
        Route::post('classrooms/deleteChecked',[ClassroomController::class,'deleteCheckedItems'])->name('deleteCheckedItems');
        Route::post('classrooms/filter',[ClassroomController::class,'filterClasses'])->name('filterClasses');
        // sections & grades -------------------------------------
        Route::resource('grades',GradeController::class);
        Route::resource('sections', SectionController::class);

        // Teachers ---------------------------------------------
        Route::resource('teachers',TeacherController::class);
        // Students ------------------------------------------------------
        Route::resource('students',StudentController::class);
        Route::get('ajax-classes/{id}',[StudentController::class,'getClasses']);
        Route::get('ajax-section/{id}',[StudentController::class,'getSection']);
        Route::post('student-attachment',[StudentController::class,'StdAttachment'])->name('StdAttachment');

        // -----Attachments ------------------------------------------------------
        Route::get('download-attachment/{id}',[StudentController::class,'downloadAttachment'])->name('downloadAttachment');
        Route::get('show-attachment/{id}',[StudentController::class,'showAttachment'])->name('showAttachment');
        Route::get('delete-attachment/{id}',[StudentController::class,'deleteAttachment'])->name('deleteAttachment');

        // Students promotions and graduations ------------------------
        Route::resource('promotions',PromotionController::class);
        Route::resource('graduations',GraduationController::class);
        Route::get('graduation/{id}',[GraduationController::class,'restore'])->name('graduation.restore');
        Route::resource('fees',FeeController::class);
        Route::get('student-fees/{id}',[FeeController::class,'studentFees'])->name('studente-fees');

        // Add parent (Livewire form) ----------------------------
        Route::view('add-parent','livewire.show_Form')->name('parent.add');
        // Students Attendance -------------------------------
        Route::resource('attendance',AttendanceController::class);

        // Subjects ----------------------------------------
        Route::resource('subjects', SubjectController::class);
        // Quizzes ----------------------------------------
        Route::resource('quizzes', QuizzeController::class);
        // Questions ----------------------------------------
        Route::resource('questions', QuestionController::class);

        // Online classes - ZOOM integration ----------------------------------------
        Route::resource('online-courses', OnlineClassController::class);
        // Library (Books)----------------------------------------
        Route::get('library-book-download/{id}',[LibraryController::class,'download'])->name('book.download');
        Route::resource('library-books', LibraryController::class);

        // Settings --------------------------------
        Route::resource('settings',SettingController::class);

        // Logout ----------------------
        Route::delete('logout/{type}', [HomeController::class, 'destroy'])->name('logout.destroy');
    }
);

// Authentication ---------
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'guest']
    ],
    function () {
        Route::get('/', function () { return view('auth.selection'); })->name('seleciton');
        Route::get('login/{type}', [HomeController::class, 'index'])->name('login.index');
        Route::post('login', [HomeController::class, 'store'])->name('login.store');
    }
);

//require __DIR__.'/auth.php';
