<?php

namespace App\Http\Controllers;

use App\Exams;
use App\SchoolClass;
use App\Student;
use App\Subjects;
use App\ExamGrade;
use DB;
use Illuminate\Http\Request;

class examGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->whereNull('deleted_at')->get();

            if($academic_year->isEmpty()){

                $academic_year_info = AcademicYear::all();
                return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');;
            }
            else {

                foreach ($academic_year as $academic_year_info){
                    $academic_year_id = $academic_year_info->id;
                    $academic_year_name = $academic_year_info->name;
                }

                $classes = SchoolClass::all()->where('academic_years_id', $academic_year_id);

                return view('exams.grades')->with('academic_year_name', $academic_year_name)
                                           ->with('classes_list', $classes);
            }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->whereNull('deleted_at')->get();

        if($academic_year->isEmpty()){

            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                ->with('error', 'قم بتشغل عام دراسي معين !!');;
        }
        else {

            foreach ($academic_year as $academic_year_info){
                $academic_year_id = $academic_year_info->id;
                $academic_year_name = $academic_year_info->name;
            }

            $classes = SchoolClass::all()->where('academic_years_id', $academic_year_id);
            $exam = Exams::all()->where('academic_years_id', $academic_year_id);
            return view('exams.add_grades')->with('classes', $classes)
                                           ->with('exams_list', $exam)
                                           ->with('academic_year_name', $academic_year_name)
                                           ->with('academic_year_id', $academic_year_id)
                                           ->with('classes_list', $classes);

        }
        
       
    }

    /* ============== User Define Function =================*/

    public function list(Request $request)
    {
        /* For EXAM INFO  */
        $exam_id =  $request->exam_id;
        $exam = Exams::find($exam_id);

        /* For SUBJECT INFO  */
        $class_id =  $request->class_id;

        $subjects_name = DB::table('subjects')->select('name', 'id')->where('class_id','=', $class_id)->whereNull('deleted_at')->get();

        /* For STUDENT INFO  */
        $students = DB::table('students')->select('name', 'id')->where('class_id','=', $class_id)->whereNull('deleted_at')->get();


        /* For Added STUDENT RESULT INFO  */
        $student_result = DB::table('exam_grades')->select('std_id')->get();
        $exam_result = DB::table('exam_grades')->select('exam_id', 'std_id')->get();


        return view('exams.std_grades')->with('exam', $exam)
                                       ->with('subjects_name', $subjects_name)
                                       ->with('class_id', $class_id)
                                       ->with('student_result', $student_result)
                                       ->with('exam_result', $exam_result)
                                       ->with('students', $students);

    }
    
    public function list_edit_delete(Request $request)
    {
        /* For EXAM INFO  */
        $exam_id =  $request->exam_id;
        $exam = Exams::find($exam_id);

        /* For SUBJECT INFO  */
        $class_id =  $request->class_id;

        $subjects_name = DB::table('subjects')->select('name', 'id')->where('class_id','=', $class_id)->whereNull('deleted_at')->get();

        /* For STUDENT INFO  */
        $students = DB::table('students')->select('name', 'id')->where('class_id','=', $class_id)->whereNull('deleted_at')->get();


        /* For Added STUDENT RESULT INFO  */
        $student_result = DB::table('exam_grades')->select('std_id')->get();
        $exam_result = DB::table('exam_grades')->get();


        return view('exams.std_grades_edit_delete')->with('exam', $exam)
                                       ->with('subjects_name', $subjects_name)
                                       ->with('class_id', $class_id)
                                       ->with('student_result', $student_result)
                                       ->with('exam_result', $exam_result)
                                       ->with('students', $students);

    }

    
    /* ============== # User Define Function =================*/


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $student_id = $request->get('student_id');
        $exam_id = $request->exam_id;
       
        $loop_subjects = $request->get('subject_id');


        $check_grades = ExamGrade::all()->where('std_id', "$student_id");

        foreach($check_grades as $grades)
        {
            $x=0;
            foreach ($loop_subjects as $id)
            {
                $x++;

                if($id = $grades)
                {
                    /* For EXAM INFO  */
                    $exam_id =  $request->exam_id;
                    $exam = Exams::find($exam_id);

                    /* For SUBJECT INFO  */
                    $class_id =  $request->class_id;

                    $subjects_name = DB::table('subjects')->select('name', 'id')->where('class_id','=', $class_id)->whereNull('deleted_at')->get();

                    /* For STUDENT INFO  */
                    $students = DB::table('students')->select('name', 'id')->where('class_id','=', $class_id)->whereNull('deleted_at')->get();

                    /* For Added STUDENT RESULT INFO  */
                    $student_result = DB::table('exam_grades')->select('std_id')->where('exam_id','=', $exam_id)->where('class_id','=', $class_id)->whereNull('deleted_at')->get();
                    $exam_result = DB::table('exam_grades')->select('exam_id')->where('exam_id','=', $exam_id)->where('class_id','=', $class_id)->whereNull('deleted_at')->get();



                    return view('exams.std_grades')->with('exam', $exam)
                                                ->with('subjects_name', $subjects_name)
                                                ->with('class_id', $class_id)
                                                ->with('student_result', $student_result)
                                                ->with('exam_result', $exam_result)
                                                ->with('students', $students)
                                                ->with('success', 'تم إضافة النتيجة للطالب.');

                                                
                }

            }
        }

     
                $x=0;
                foreach ($loop_subjects as $id)
                {
                    $x++;
                    $exam_info = ExamGrade::create([
                    
                        'academic_years_id'=> $request->academic_year_id,
                        'class_id'=> $request->class_id,
                        'std_id'=> $student_id,
                        'grade'=> $request->get('grade'.$x),
                        'exam_id'=> $exam_id,
                        'subject_id'=> $id,
                        'total_grade'=> $request->total_grade,
                    ]);
                }

              
      
        
                /* For EXAM INFO  */
                $exam_id =  $request->exam_id;
                $exam = Exams::find($exam_id);

                /* For SUBJECT INFO  */
                $class_id =  $request->class_id;

                $subjects_name = DB::table('subjects')->select('name', 'id')->where('class_id','=', $class_id)->whereNull('deleted_at')->get();

                /* For STUDENT INFO  */
                $students = DB::table('students')->select('name', 'id')->where('class_id','=', $class_id)->whereNull('deleted_at')->get();

                /* For Added STUDENT RESULT INFO  */
                $student_result = DB::table('exam_grades')->select('std_id')->where('exam_id','=', $exam_id)->where('class_id','=', $class_id)->whereNull('deleted_at')->get();
                $exam_result = DB::table('exam_grades')->select('exam_id')->where('exam_id','=', $exam_id)->where('class_id','=', $class_id)->whereNull('deleted_at')->get();



                return view('exams.std_grades')->with('exam', $exam)
                                            ->with('subjects_name', $subjects_name)
                                            ->with('class_id', $class_id)
                                            ->with('student_result', $student_result)
                                            ->with('exam_result', $exam_result)
                                            ->with('students', $students)
                                            ->with('success', 'تم إضافة النتيجة للطالب.');
                                            

        

      
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
