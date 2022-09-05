<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\AcademicYear;
use App\SchoolClass;
use App\Teachers;
use App\SchoolInfo;

class teachersReportController extends Controller
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
            foreach ($academic_year as $academic_year_id)
            {
                $academic_year_id = $academic_year_id->id;
            }

            $classes = SchoolClass::all()->where('academic_years_id', $academic_year_id);
            return view('teachers.reports.index')->with('classes', $classes)
                                                 ->with('academic_year_id', $academic_year_id);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show_class_report_teachers_name(Request $request)
    {
        $class_id = $request->class_id;
        $academic_year_id = $request->academic_year_id;


        $school_info = SchoolInfo::all()->first();
        $teachers = subjects::all()->where('class_id', $class_id);
        $academic_year = academicYear::find($academic_year_id);
        $class = schoolClass::find($class_id);

        // SET THE OPERATION FOR THE REPORT
        if (isset($request->show)){
            $operation = 'show';
        }

        if (isset($request->print)){
            $operation = 'print';
        }

        // # SET THE OPERATION FOR THE REPORT

        return view('students.reports.show_class_report_teachers_name_report')->with('teachers', $teachers)
                                                                             ->with('academic_year', $academic_year)
                                                                             ->with('class', $class)
                                                                             ->with('operation', $operation)
                                                                             ->with('school_info', $school_info);

            
    }

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
        //
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
