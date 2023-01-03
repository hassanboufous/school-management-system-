<?php

namespace App\Repository\FeesInvoices;

use Exception;
use App\Models\Fee;
use App\Models\FeesInvoice;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class FeesInvoiceRepository implements FeesInvoiceRepositoryInterface {



    public function index()
    {

    }
    public function show($id){
        $student = Student::findOrFail($id);
        $fees = Fee::where('class_id',$student->class_id)->get();
        return view('Fees.students.addfees',compact('student','fees'));
    }

    public function store($request) {
        $fees_list = $request->fees_list;

        DB::beginTransaction();
        try{
            foreach($fees_list as $fee_list){
                $fee = new FeesInvoice();

                // $fee->invoice_date =$request->;
                // $fee->amount =$request->;
                // $fee->student_id =$request->;
                $fee->grade_id =$request->grade_id;
                $fee->class_id =$request->class_id;
                // $fee->fee_id =$request->;
                // $fee->description =$request->;

            }
        }
        catch(Exception $ex){

        }

    }

}
