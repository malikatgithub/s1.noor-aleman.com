<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AcademicYear;
use App\Fees;
use App\FeesTypes;
use App\SchoolClass;
use App\SchoolInfo;
use App\Student;
use DB;
class feesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();

        if($academic_year->isEmpty()){

            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                ->with('error', 'قم بتشغل عام دراسي معين !!');;
        }

        else {
            
            $classes = SchoolClass::all();
            return view('accounting.report.fees_report')->with('classes', $classes);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            // ACADEMIC YEAR ID INFO 
            $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();

            if($academic_year->isEmpty()){

                $academic_year_info = AcademicYear::all();
                return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');;
            }

            else { 

                
                foreach($academic_year as $info){
                    $academic_year_id = $info->id; 
                    $academic_year_name = $info->name;
                }
            // # ACADEMIC YEAR ID INFO

            $student_info = Student::find($id);

            $fees_info  = DB::select("select * from fees WHERE reg_no =  $student_info->reg_no AND academic_years_id = $academic_year_id AND deleted_at is NULL");
            $school_info = SchoolInfo::all()->first();
            $fees_types_id = FeesTypes::all();
            return view('accounting.report.student_fees_report_print')->with('school_info', $school_info)
                                                             ->with('academic_year_name', $academic_year_name)
                                                             ->with('student_info', $student_info)
                                                             ->with('fees_types_id', $fees_types_id)
                                                             ->with('fees_info', $fees_info);
        }
       
    }
    

    public function show_class_report(Request $request)
    {
        $class_type_id = $request->class_type_id;

        // ACADEMIC YEAR ID INFO 
        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year as $info){
            $academic_year_id = $info->id;
            $academic_year_name = $info->name; 
        }
        // # ACADEMIC YEAR ID INFO 

        if($academic_year->isEmpty()){

            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                ->with('error', 'قم بتشغل عام دراسي معين !!');;
        }

        else {
            $fees_info  = DB::select("select * from fees WHERE class_id =  $class_type_id AND academic_years_id = $academic_year_id AND deleted_at is NULL");
            $class = SchoolClass::find($class_type_id);
            $student_info = DB::select("select * from students WHERE class_id = $class_type_id AND academic_years_id = $academic_year_id AND deleted_at is NULL");

       
            $school_info = SchoolInfo::all()->first();
            return view('accounting.report.class_fees_report_print')->with('school_info', $school_info)
                                                                    ->with('class', $class)
                                                                    ->with('academic_year_name', $academic_year_name)
                                                                    ->with('student_info', $student_info)
                                                                    ->with('fees_info', $fees_info);

        }

    }


    public function show_class_report_no_pay(Request $request)
    {
        $class_type_id = $request->class_type_id;
        $fees_type_id = $request->fees_type_id;

        // ACADEMIC YEAR ID INFO 
        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year as $info){
            $academic_year_id = $info->id;
            $academic_year_name = $info->name;
        }
        // # ACADEMIC YEAR ID INFO 

        if($academic_year->isEmpty()){

            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                ->with('error', 'قم بتشغل عام دراسي معين !!');;
        }

        else {
            $school_info = SchoolInfo::all()->first();
            $fees_type = FeesTypes::find($fees_type_id);
            $class = SchoolClass::find($class_type_id);

            //$students_info = DB::select("select * from students WHERE class_id = '$class_type_id' AND academic_years_id = '$academic_year_id' AND deleted_at is NULL");
            $fees_info = DB::select("select reg_no from fees WHERE class_id = '$class_type_id' AND fees_types_id = '$fees_type_id' AND academic_years_id = '$academic_year_id' AND deleted_at is NULL");


            $students_info = DB::table('students')
                            ->where('class_id','=', $class_type_id)
                            ->where('academic_years_id','=', $academic_year_id)
                            ->whereNull('deleted_at')->get();



            // $fees_info = DB::table('fees')
            //                 ->select('reg_no')
            //                 ->where('class_id','=', $class_type_id)
            //                 ->where('fees_types_id','=', $fees_type_id)
            //                 ->where('academic_years_id','=', $academic_year_id)
            //                 ->whereNull('deleted_at')->get();
            
            return view('accounting.report.class_fees_report_print_no_pay')->with('school_info', $school_info)
                                                                    ->with('class', $class)
                                                                    ->with('academic_year_name', $academic_year_name)
                                                                    ->with('academic_year_id', $academic_year_id)
                                                                    ->with('students_info', $students_info)
                                                                    ->with('fees_type', $fees_type)
                                                                    ->with('class_type_id', $class_type_id)
                                                                    ->with('fees_info', $fees_info);

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
}
