<?php

namespace App\Repository\attendance;

interface AttendanceRepositoryInterface {

    public function index();

    public function show($id);

    public function store($request);

    public function update($request);

    public function destroy($id);

}
