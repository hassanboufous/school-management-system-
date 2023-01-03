<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Authenticatable
{
    use HasFactory;
    use HasTranslations;


    public $translatable = ['name'];

    protected $guarded = [];

     public function genders()
    {
        return $this->belongsTo(Gender::class, 'gender');
    }


    public function specializations()
    {
        return $this->belongsTo(Specialization::class, 'specialization');
    }


    public function sections()
    {
        return $this->belongsToMany(Section::class, 'teacher_section');
    }
}
