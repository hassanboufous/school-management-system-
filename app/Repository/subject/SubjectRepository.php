<?php

namespace App\Repository\subject;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Exception;

class SubjectRepository implements SubjectRepositoryInterface {

        public function index(){
            $subjects = Subject::get();
            return view('subjects.index',compact('subjects'));
        }

        public function create(){
            $grades = Grade::all();
            return view('subjects.create',compact('grades'));
        }

        public function store($request){

            try{
                $subject = new Subject();
                $subject->name = ['en' => $request->name_en , 'ar' => $request->name_ar];
                $subject->grade_id = $request->grade_id;
                $subject->classroom_id = $request->classroom_id;
                $subject->teacher_id = $request->teacher_id;
                $subject->save();
                notify()->success(trans('messages.added'));
                return redirect()->route('subjects.index');
            }
            catch(Exception $e){
                return back()->with('error','Error : '.$e);
            }
        }
        public function edit($id){
            $subject = Subject::findOrFail($id);
            $grades = Grade::all();
            $teachers = Teacher::all();
            return view('subjects.edit',compact('subject','teachers','grades'));
        }


        public function update($request,$id){
            try{
                $subject =Subject::findOrFail($id);
                $subject->name = ['en' => $request->name_en , 'ar' => $request->name_ar];
                $subject->grade_id = $request->grade_id;
                $subject->classroom_id = $request->classroom_id;
                $subject->teacher_id = $request->teacher_id;
                $subject->save();
                notify()->success(trans('messages.edited'));
                return redirect()->route('subjects.index');
            }
            catch(Exception $e){
                return back()->with('error','Error : '.$e);
            }
        }
        public function destroy($subject){
            try{
               $subject->delete();
                notify()->error(trans('messages.deleted'));
                return back();
            }
            catch(Exception $e){
                return back()->with('error','Error : '.$e);
            }
        }
}





