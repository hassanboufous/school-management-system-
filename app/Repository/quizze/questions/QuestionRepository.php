<?php

namespace App\Repository\quizze\questions;

use App\Models\Question;
use App\Models\Quizze;
use Exception;

class QuestionRepository implements QuestionRepositoryInterface {

    public function index() {
       $questions = Question::all();
       return view('quizzes.questions.index',compact('questions'));
    }

    public function create(){
      $quizzes = Quizze::all();
       return view('quizzes.questions.create',compact('quizzes'));
    }

    public function edit($id){
        $data['question']   = Question::findOrFail($id);
        $data['quizzes'] = Quizze::all();
        return view('questions.edit',$data);
    }
    public function store($request){
        try{
            $question = new Question();
            $question->title       = $request->title;
            $question->answer     = $request->answer;
            $question->right_answer = $request->right_answer;
            $question->quizze_id    = $request->quizze_id;
            $question->score        = $request->score;
            $question->save();

            notify()->success(trans('messages.added'));
            return redirect()->route('questions.index');
        }
        catch(Exception $e){
            return back()->with('error','Error : '.$e);
        }
    }


    public function update($request,$id){
        try{
            $question  = Question::findOrFail($id);
            $question->title        = $request->title;
            $question->answer       = $request->answer;
            $question->right_answer = $request->right_answer;
            $question->quizze_id    = $request->quizze_id;
            $question->score        = $request->score;
            $question->save();

            notify()->success(trans('messages.edited'));
            return redirect()->route('quizzes.index');
        }
        catch(Exception $e){
            return back()->with('error','Error : '.$e);
        }
    }

    public function destroy($id){
        try{
            Question::findOrFail($id)->delete();
            notify()->error(trans('messages.deleted'));
            return back();
        }
        catch(Exception $e){
            return back()->with('error','Error : '.$e);
        }
    }

}
