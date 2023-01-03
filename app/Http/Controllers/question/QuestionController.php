<?php

namespace App\Http\Controllers\question;

use App\Models\Quizze;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\quizze\questions\QuestionRepositoryInterface;

class QuestionController extends Controller
{
    protected $question;
    public function __construct(QuestionRepositoryInterface $question){
        $this->question = $question;
    }

    public function index(){
        return $this->question->index();
    }

    public function create(){
        return $this->question->create();
    }

    public function store(Request $request){
        return $this->question->store($request);
    }

    public function edit($id){
        return $this->question->edit($id);
    }


    public function update(Request $request, $id){
       return $this->question->update($request,$id);
    }

    public function destroy($id){
        return $this->question->destroy($id);
    }
}
