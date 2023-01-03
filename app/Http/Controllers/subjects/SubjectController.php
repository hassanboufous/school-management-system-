<?php

namespace App\Http\Controllers\subjects;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Repository\subject\SubjectRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectRequest;

class SubjectController extends Controller {

    public $subjects;

    public function __construct(SubjectRepositoryInterface $subjects) {
        $this->subjects = $subjects;
    }

    public function index() {
        return $this->subjects->index();
    }


    public function create(){
       return $this->subjects->create();
    }


    public function store(StoreSubjectRequest $request){
        return $this->subjects->store($request);
    }


    public function show(Subject $subject){
        //
    }


    public function edit($id){
        return $this->subjects->edit($id);
    }

    public function update(Request $request,$id){
        return $this->subjects->update($request,$id);
    }

    public function destroy(Subject $subject){
       return $this->subjects->destroy($subject);
    }
}
