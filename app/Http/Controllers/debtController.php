<?php

namespace App\Http\Controllers;

use App\Expenses;
use App\Teachers;
use App\Employees;
use App\AcademicYear;
use App\SchoolInfo;
use DB;
use Illuminate\Http\Request;

class debtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    }


    public function teachers_index(){

        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status', '=', '1')->get();

        if ($academic_year->isEmpty()) {
            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');
        } else {
            foreach ($academic_year as $academic_year_id) {
                $academic_year_name = $academic_year_id->name;
            }

        

            return view('accounting.debt.teachers');
        }
    }


    public function employee_index(){

        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status', '=', '1')->get();

        if ($academic_year->isEmpty()) {
            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');
        } else {
            foreach ($academic_year as $academic_year_id) {
                $academic_year_name = $academic_year_id->name;
            }


            return view('accounting.salary.employees');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_teacher_debt(Request $request, $id)
    {
        $info = Teachers::find($id);
        return view('accounting.expenses_form')->with('info' , $info)->with('salary', 'salary')->with('teacher_salary', 'teacher_salary')->with('dept', 'dept');
    }



    public function create_employee_debt(Request $request, $id)
    {
        $info = Employees::find($id);
        return view('accounting.expenses_form')->with('info' , $info)->with('salary', 'salary')->with('employee_salary', 'employee_salary')->with('dept', 'dept');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status', '=', '1')->get();

        if ($academic_year->isEmpty()) {
            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');
        } else {

        
            foreach ($academic_year as $academic_year_id) {
                $academic_year_id = $academic_year_id->id;
            }

            /** To generate the exp_no */


                $expense = Expenses::latest()->first();

                if (empty($expense)){
                    $new_exp_no = "001";
                }
                else{

                    $exp_no = $expense->id+1;
                    $str_exp_no = (string) $exp_no;
            
                    $new_exp_no = "00$str_exp_no";
                }
          
    
            /** To generate the exp_no */

            if($request->teacher_id){
                $expense = Expenses::create([

                    'academic_years_id'=> $academic_year_id,
                    'exp_no'=> $new_exp_no,
                    'date'=> $request->date,
                    'expense_owner'=> $request->expense_owner,
                    'teacher_id'=> $request->teacher_id,
                    'amount'=> $request->amount,
                    'expense_note'=> 'سلفية',
    
                ]);
    
            }
            else{
                $expense = Expenses::create([

                    'academic_years_id'=> $academic_year_id,
                    'exp_no'=> $new_exp_no,
                    'date'=> $request->date,
                    'expense_owner'=> $request->expense_owner,
                    'employee_id'=> $request->employee_id,
                    'amount'=> $request->amount,
                    'expense_note'=> 'سلفية',
    
                ]);
            }
            

            $school_info = SchoolInfo::all()->first();
            $expense_info = DB::select("SELECT * FROM expenses WHERE exp_no = '$new_exp_no' AND `deleted_at` IS NULL;");
            return view('accounting.expense_print')->with('school_info', $school_info)
                                                ->with('expense_info', $expense_info)
                                                ->with('salary', 'salary');

        }
       
        // return redirect('/expenses')->with('success', 'تمت إضافة  بيانات المنصرف .');

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status', '=', '1')->get();

        if ($academic_year->isEmpty()) {
            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');
        } else {
            foreach ($academic_year as $academic_year_id) {
                $academic_year_id = $academic_year_id->id;
            }

            $date = $request->date;
            if (isset($date)) {
                $expense_info = DB::select(" SELECT * FROM expenses WHERE `date` = '$date' AND `academic_years_id` = '$academic_year_id' AND `deleted_at` IS NULL;");
                return view('accounting.expenses_search')->with('expense_info', $expense_info);
            }

            $start_date = $request->start_date;
            $end_date = $request->end_date;

            if (isset($start_date) and isset($end_date)) {
                $expense_info = DB::select(" SELECT * FROM expenses WHERE `date` between '$start_date' and '$end_date' AND `deleted_at` IS NULL;");
                return view('accounting.expenses_search')->with('expense_info', $expense_info);
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
        $expense = Expenses::find($id);
        return view('accounting.expenses_edit_form')->with('expense', $expense);
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

        $expense = Expenses::find($id);

        $expense->date = $request->date;
        $expense->expense_owner = $request->expense_owner;
        $expense->amount = $request->amount;
        $expense->expense_note = $request->expense_note;

        $expense->save();

        $exp_no = $request->exp_no;

        $school_info = SchoolInfo::all()->first();
        $expense_info = DB::select(" SELECT * FROM expenses WHERE exp_no = '$exp_no';");
        return view('accounting.expense_print')->with('school_info', $school_info)
                                               ->with('expense_info', $expense_info);
    }


    public function print($id)
    {
        $school_info = SchoolInfo::all()->first();
        $expense_info = DB::select(" SELECT * FROM expenses WHERE id = '$id';");
        return view('accounting.expense_print')->with('school_info', $school_info)
                                               ->with('expense_info', $expense_info);
    }



    public function report(Request $request)
    {

         // SET THE OPERATION FOR THE REPORT
         if (isset($request->show)){
            $operation = 'show';
        }

        if (isset($request->print)){
            $operation = 'print';
        }

     

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $school_info = SchoolInfo::all()->first();

        if($request->type == 'employee'){
            if (isset($start_date) and isset($end_date)) {

                $expense_info = DB::select("
                
                SELECT * FROM expenses WHERE `date` between '$start_date' AND '$end_date' AND `teacher_id` IS NULL AND `expense_note` = 'سلفية' AND `deleted_at` IS NULL
                ");
             

                return view('accounting.debt_report_print')->with('expense_info', $expense_info)
                                                               ->with('school_info', $school_info)
                                                               ->with('start_date', $start_date)
                                                               ->with('operation', $operation)
                                                               ->with('end_date', $end_date)
                                                               ->with('employee_report', 'employee_report');
            }
        }

        else{

            if (isset($start_date) and isset($end_date)) {

                $expense_info = DB::select("
                
                SELECT * FROM expenses WHERE `date` between '$start_date' AND '$end_date' AND `employee_id` IS NULL AND `expense_note` = 'سلفية' AND `deleted_at` IS NULL
                ");
             

                return view('accounting.debt_report_print')->with('expense_info', $expense_info)
                                                               ->with('school_info', $school_info)
                                                               ->with('start_date', $start_date)
                                                               ->with('operation', $operation)
                                                               ->with('end_date', $end_date)
                                                               ->with('teacher_report', 'teacher_report');
            }

        }

     
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expenses::find($id);
        $expense->delete();
        return back()->with('delete', ' تم مسح بيانات المصروف يمكنك مراجعه سلة المهملات !!.');
    }
}
