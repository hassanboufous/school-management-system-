<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quizze extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded =[];



   public function grade(){
       return $this->belongsTo(Grade::class, 'grade_id');
   }
   public function section(){
       return $this->belongsTo(Section::class, 'section_id');
   }
   public function class(){
       return $this->belongsTo(Classroom::class, 'classroom_id');
   }
   public function teacher(){
       return $this->belongsTo(Teacher::class, 'teacher_id');
   }
   public function subject(){
       return $this->belongsTo(Subject::class, 'subject_id');
   }
}
