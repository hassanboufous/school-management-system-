<?php

namespace App\Repository\library;

interface LibraryRepositoryInterface {

    public function index();

    public function create();

    public function store($request);

    public function edit($id);

    public function update($request,$id);

    public function destroy($id);

    public function download($id);
}
