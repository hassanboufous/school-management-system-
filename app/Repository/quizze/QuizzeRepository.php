<?php

namespace App\Repository\quizze;

use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\Teacher;
use Exception;

class QuizzeRepository implements QuizzeRepositoryInterface {


    public function index() {
        $quizzes = Quizze::all();
        return view('quizzes.index',compact('quizzes'));
    }

    public function create(){
       $data['grades']   = Grade::all();
       $data['subjects'] = Subject::all();
       $data['teachers'] = Teacher::all();
       return view('quizzes.create',$data);
    }

    public function edit($id){
        $data['quizze']   = Quizze::findOrFail($id);
        $data['grades']   = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('quizzes.edit',$data);
    }
    public function store($request){
        try{
            $quizze = new Quizze();
            $quizze->name = ['en' => $request->name_en , 'ar' => $request->name_ar];
            $quizze->subject_id = $request->subject_id;
            $quizze->grade_id = $request->grade_id;
            $quizze->classroom_id = $request->classroom_id;
            $quizze->teacher_id = $request->teacher_id;
            $quizze->section_id = $request->section_id;
            $quizze->save();
            notify()->success(trans('messages.added'));
            return redirect()->route('quizzes.index');
        }
        catch(Exception $e){
            return back()->with('error','Error : '.$e->getMessage());
        }
    }


    public function update($request,$id){
        try{
            $quizze = Quizze::findOrFail($id);
            $quizze->name = ['en' => $request->name_en , 'ar' => $request->name_ar];
            $quizze->grade_id = $request->grade_id;
            $quizze->subject_id = $request->subject_id;
            $quizze->classroom_id = $request->classroom_id;
            $quizze->teacher_id = $request->teacher_id;
            $quizze->save();
            notify()->success(trans('messages.edited'));
            return redirect()->route('quizzes.index');
        }
        catch(Exception $e){
            return back()->with('error','Error : '.$e->getMessage());
        }
    }

    public function destroy($id){
        try{
            Quizze::findOrFail($id)->delete();
            notify()->error(trans('messages.deleted'));
            return back();
        }
        catch(Exception $e){
            return back()->with('error','Error : '.$e->getMessage());
        }
    }

}
