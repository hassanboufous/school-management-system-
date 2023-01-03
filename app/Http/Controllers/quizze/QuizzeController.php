<?php

namespace App\Http\Controllers\quizze;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuizzeRequest;
use App\Models\Quizze;
use App\Repository\quizze\QuizzeRepositoryInterface;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    protected $quizze ;
    public function __construct(QuizzeRepositoryInterface $quizze)
    {
        $this->quizze = $quizze;
    }
    public function index(){
      return $this->quizze->index();
    }

    public function create(){
       return $this->quizze->create();
    }

    public function store(StoreQuizzeRequest $request){
      return $this->quizze->store($request);
    }


    public function edit($id){
       return $this->quizze->edit($id);
    }

    public function update(Request $request, $id){
        return $this->quizze->update($request,$id);
    }

    public function destroy($id){
       return $this->quizze->destroy($id);
    }
}
