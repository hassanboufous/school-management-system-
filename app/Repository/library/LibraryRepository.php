<?php

namespace App\Repository\library;

use Exception;
use App\Models\Grade;
use App\Models\Library;
use App\traits\UploadImg;


class LibraryRepository implements LibraryRepositoryInterface {

    use UploadImg;
    public function index(){
        $books = Library::all();
        return view('library.index',compact('books'));
    }

    public function create(){
        $grades = Grade::all();
        return view('library.create',compact('grades'));
    }

    public function store($request){
        try {
            // return $request;
            $data = $request->except('title','teacher_id','file_name');
            $data['title'] = ['en'=>$request->title_en,'ar'=>$request->title_ar];
            $data['teacher_id'] = 4 ;
            $data['file_name'] = $this->uplodIgmage($request->file('file_name'),'library');
            Library::create($data);
            notify()->success(trans('messages.added'));
            return redirect()->route('library-books.index');
        }
        catch(Exception $e){
            return back()->with('error','Error : '.$e->getMessage());
        }
    }

    public function edit($id){
        $book = Library::findOrFail($id);
        $grades = Grade::all();
        return view('library.edit',compact('book','grades'));
    }

    public function update($request,$id){
         try {
            $book = Library::findOrFail($id);
            $data = $request->except('title','teacher_id','file_name');
            $data['title'] = ['en'=>$request->title_en,'ar'=>$request->title_ar];
            $data['teacher_id'] = 4 ;
            if($request->hasFile('file_name')){
                $this->DeleteFromStorage($book->file_name);
                $data['file_name'] = $this->uplodIgmage($request->file('file_name'),'library');
            }
            $book->update($data);
            notify()->success(trans('messages.edited'));
            return redirect()->route('library-books.index');
        }
        catch(Exception $e){
            return back()->with('error','Error : '.$e->getMessage());
        }

    }

    public function destroy($id){
        try{
            $book = Library::query()->findOrFail($id);
            $this->DeleteFromStorage($book->file_name);
            $book->delete();
            notify()->error(trans('messages.deleted'));
            return back();
        }
        catch(Exception $e){
            return back()->with('error','Error : '.$e->getMessage());
        }

    }
    public function download($id){
        return response()->download(storage_path('app/public/' . Library::findOrFail($id)->file_name));
    }

}
