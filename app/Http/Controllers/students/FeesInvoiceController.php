<?php

namespace App\Http\Controllers\students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Repository\FeesInvoices\FeesInvoiceRepositoryInterface;

class FeesInvoiceController extends Controller
{

    protected $fees_invoice ;

    public function __construct(FeesInvoiceRepositoryInterface $fees_invoice) {
        $this->fees_invoice = $fees_invoice;
    }

    public function index() {
        //
    }


    public function ajaxFees($id) {
       $fee = Fee::findOrFail($id);
       return $fee;
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return $this->fees_invoice->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
