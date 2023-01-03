<?php

namespace App\Http\Controllers\teachers\student;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Section;

class StudentController extends Controller
{
   public function index() {
        $teacher_sections = DB::table('teacher_section')
                            ->where('teacher_id',auth()->user()->id)
                            ->pluck('section_id');
        $students = Student::whereIn('section_id', $teacher_sections)->get();
        return view('teachers.dashboard.student',compact('students', 'teacher_sections'));

   }

   public function section(){
        $IDs = DB::table('teacher_section')
                                ->where('teacher_id', auth()->user()->id)
                                ->pluck('section_id');
        $sections = Section::whereIn('id', $IDs)->get();
        return view('teachers.dashboard.section', compact('sections'));
   }
}
