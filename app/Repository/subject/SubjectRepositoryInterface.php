<?php

namespace App\Repository\subject;

interface SubjectRepositoryInterface {

    public function index();

    public function create();

    // public function show();

     public function update($request,$id);

    public function edit($id);

    public function store($request);

    public function destroy($subject);
}
