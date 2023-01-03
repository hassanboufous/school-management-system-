<?php

namespace App\Providers;

use App\Repository\StudentRepository;
use App\Repository\TeacherRepository;
use App\Repository\fees\FeeRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\quizze\QuizzeRepository;
use App\Repository\subject\SubjectRepository;
use App\Repository\library\LibraryRepository;
use App\Repository\StudentPromotionRepository;
use App\Repository\StudentRepositoryInterface;
use App\Repository\TeacherRepositoryInterface;
use App\Repository\fees\FeeRepositoryInterface;
use App\Repository\attendance\AttendanceRepository;

use App\Repository\graduation\GraduationRepository;
use App\Repository\quizze\QuizzeRepositoryInterface;
use App\Repository\FeesInvoices\FeesInvoiceRepository;
use App\Repository\subject\SubjectRepositoryInterface;
use App\Repository\library\LibraryRepositoryInterface;
use App\Repository\quizze\questions\QuestionRepository;
use App\Repository\StudentPromotionRepositoryInterface;
use App\Repository\attendance\AttendanceRepositoryInterface;
use App\Repository\graduation\GraduationRepositoryInterface;
use App\Repository\FeesInvoices\FeesInvoiceRepositoryInterface;
use App\Repository\quizze\questions\QuestionRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register() {
        $this->app->bind(TeacherRepositoryInterface::class,TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface ::class,StudentRepository::class);
        $this->app->bind(StudentPromotionRepositoryInterface::class,StudentPromotionRepository::class);
        $this->app->bind(GraduationRepositoryInterface::class,GraduationRepository::class);
        $this->app->bind(FeeRepositoryInterface::class,FeeRepository::class);
        $this->app->bind(FeesInvoiceRepositoryInterface::class,FeesInvoiceRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class,AttendanceRepository::class);
        $this->app->bind(SubjectRepositoryInterface::class,SubjectRepository::class);
        $this->app->bind(QuizzeRepositoryInterface::class,QuizzeRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class,QuestionRepository::class);
        $this->app->bind(LibraryRepositoryInterface::class,LibraryRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
