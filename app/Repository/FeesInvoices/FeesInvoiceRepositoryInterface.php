<?php

namespace App\Repository\FeesInvoices;

interface FeesInvoiceRepositoryInterface {

    public function index();

    public function show($id);

    public function store($request);

}
