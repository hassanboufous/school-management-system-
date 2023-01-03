<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuizzeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name_en'=>'required|string',
            'name_ar'=>'required|string',
            'grade_id'=>'required',
            'classroom_id'=>'required',
            'teacher_id'=>'required',
            'subject_id'=>'required',
        ];
    }
}
