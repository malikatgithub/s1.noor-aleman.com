<?php

namespace App\Http\Controllers;

use App\SchoolInfo;
use App\BusPayment;
use App\AcademicYear;
use App\Fees;
use App\Expenses;
use DB;
use Illuminate\Http\Request;

class treasuryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academic_year  = AcademicYear::all()->where('status', '=', '1');
        
       
        if ($academic_year->isEmpty()) {
            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');
        } else {

            foreach ($academic_year as $academic_year_info) {
                $academic_year_id = $academic_year_info->id;
                $academic_year_name = $academic_year_info->name;
            }


            return view('accounting.report.treasury.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $academic_year  = AcademicYear::all()->where('status', '=', '1');

        if ($academic_year->isEmpty()) {
            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');
        } 
        
        else {
            
            foreach ($academic_year as $academic_year_info) {
                $academic_year_id = $academic_year_info->id;
                $academic_year_name = $academic_year_info->name;
            }


            // RETRIVE SCHOOL INFORMATION
            $school_info = SchoolInfo::all()->first();
            // # RETRIVE SCHOOL INFORMATION

            // SET THE OPERATION FOR THE REPORT
            if (isset($request->show)){
                $operation = 'show';
            }

            if (isset($request->print)){
                $operation = 'print';
            }

            // # SET THE OPERATION FOR THE REPORT


            
            $date = $request->date;
            if (isset($date)) {
                $treasury_info = DB::select(" SELECT * FROM fees WHERE `date` = '$date' AND `academic_years_id` = '$academic_year_id' AND `deleted_at` IS NULL;");
                /* Second info of treasury from bus payment */
                $treasury_info2 = DB::select(" SELECT * FROM bus_payments WHERE `created_at` = '$date' AND `academic_year_id` = '$academic_year_id' AND `deleted_at` IS NULL;");


                return view('accounting.report.treasury.treasury_report')->with('treasury_info', $treasury_info)
                                                                         ->with('treasury_info2', $treasury_info2)
                                                                         ->with('school_info', $school_info)
                                                                         ->with('date', $date)
                                                                         ->with('operation', $operation);
            }

            $start_date = $request->start_date;
            $end_date = $request->end_date;

            if (isset($start_date) and isset($end_date)) {
                $treasury_info = DB::select(" SELECT * FROM fees WHERE `date` between '$start_date' and '$end_date' AND `academic_years_id` = '$academic_year_id' AND `deleted_at` IS NULL;");
                /* Second info of treasury from bus payment */
                $treasury_info2 = DB::select(" SELECT * FROM bus_payments WHERE `created_at` between '$start_date' and '$end_date' AND `academic_year_id` = '$academic_year_id' AND `deleted_at` IS NULL;");
                return view('accounting.report.treasury.treasury_report')->with('treasury_info', $treasury_info)
                                                                         ->with('treasury_info2', $treasury_info2)
                                                                         ->with('school_info', $school_info)
                                                                         ->with('start_date', $start_date)
                                                                         ->with('end_date', $end_date)
                                                                         ->with('operation', $operation);
            }
        }
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


    /**
     * Custom function herer
     */

     public function inventory(){
         return view('accounting.report.treasury.inventory');
     }


     public function show_inventory(Request $request){

        $academic_year  = AcademicYear::all()->where('status', '=', '1');

        if ($academic_year->isEmpty()) {
            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');
        } 
        
        else {
            
            foreach ($academic_year as $academic_year_info) {
                $academic_year_id = $academic_year_info->id;
                $academic_year_name = $academic_year_info->name;
            }


            // RETRIVE SCHOOL INFORMATION
            $school_info = SchoolInfo::all()->first();
            // # RETRIVE SCHOOL INFORMATION

            // SET THE OPERATION FOR THE REPORT
            if (isset($request->show)){
                $operation = 'show';
            }

            if (isset($request->print)){
                $operation = 'print';
            }

            // # SET THE OPERATION FOR THE REPORT


            
            $date = $request->date;
            if (isset($date)) {
                $treasury_info = DB::select(" SELECT * FROM fees WHERE `date` = '$date' AND `academic_years_id` = '$academic_year_id' AND `deleted_at` IS NULL;");
                /* Second info of treasury from bus payment */
                $treasury_info2 = DB::select(" SELECT * FROM bus_payments WHERE `created_at` = '$date' AND `academic_year_id` = '$academic_year_id' AND `deleted_at` IS NULL;");


                $expense_info = DB::select(" SELECT * FROM expenses WHERE `date` = '$date' AND `academic_years_id` = '$academic_year_id' AND `deleted_at` IS NULL;");
                $total_treasury = Fees::all();
                $total_expense = Expenses::all();
                $total_bus_payment = BusPayment::all();


                return view('accounting.report.treasury.inventory_report')->with('treasury_info', $treasury_info)
                                                                         ->with('treasury_info2', $treasury_info2)
                                                                         ->with('school_info', $school_info)
                                                                         ->with('date', $date)
                                                                         ->with('operation', $operation)
                                                                         ->with('total_treasury', $total_treasury)
                                                                         ->with('total_expense', $total_expense)
                                                                         ->with('total_bus_payment', $total_bus_payment)
                                                                         ->with('expense_info', $expense_info);

            }

            $start_date = $request->start_date;
            $end_date = $request->end_date;

            if (isset($start_date) and isset($end_date)) {
                $treasury_info = DB::select(" SELECT * FROM fees WHERE `date` between '$start_date' and '$end_date' AND `academic_years_id` = '$academic_year_id' AND `deleted_at` IS NULL;");
                $treasury_info2 = DB::select(" SELECT * FROM bus_payments WHERE `created_at` between '$start_date' and '$end_date' AND `academic_year_id` = '$academic_year_id' AND `deleted_at` IS NULL;");
                $expense_info = DB::select(" SELECT * FROM expenses WHERE `date` between '$start_date' and '$end_date' AND `deleted_at` IS NULL;");
                $total_treasury = Fees::all();
                $total_bus_payment = BusPayment::all();
                $total_expense = Expenses::all();
                return view('accounting.report.treasury.inventory_report')->with('treasury_info', $treasury_info)
                                                                         ->with('treasury_info2', $treasury_info2)
                                                                         ->with('school_info', $school_info)
                                                                         ->with('start_date', $start_date)
                                                                         ->with('end_date', $end_date)
                                                                         ->with('operation', $operation)
                                                                         ->with('total_treasury', $total_treasury)
                                                                         ->with('total_expense', $total_expense)
                                                                         ->with('total_bus_payment', $total_bus_payment)
                                                                         ->with('expense_info', $expense_info);
                
            }
        }
     }
}
