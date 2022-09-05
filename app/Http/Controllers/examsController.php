<?php

namespace App\Http\Controllers;

use App\Exams;
use App\SchoolClass;
use App\AcademicYear;
use DB;
use Illuminate\Http\Request;

class examsController extends Controller
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

                foreach ($academic_year as $academic_year_info){
                    $academic_year_id = $academic_year_info->id;
                    $academic_year_name = $academic_year_info->name;
                }

                $exam = Exams::all()->where('academic_years_id', $academic_year_id);

                return view('exams.index')->with('academic_year_name', $academic_year_name)
                                         ->with('exam', $exam)
                                         ->with('academic_year_id', $academic_year_id);
            }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();

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

        

                $classes = SchoolClass::all()->where('academic_years_id', $academic_year_id);;
                return view('exams.create')->with('classes' , $classes)
                                            ->with('academic_year_name', $academic_year_name)
                                            ->with('academic_year_id', $academic_year_id);
            }
        

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $loop = $request->get('class_id');
        foreach ($loop as $value){
            
            $exam = Exams::create([
                'name'=> $request->name,
                'academic_years_id'=> $request->academic_year_id,
                'class_id'=> $value,
                'total_grade'=> $request->total_grade,
                'exam_note'=> $request->exam_note,
                'start_date'=> $request->start_date,
                'end_date'=> $request->end_date,
            ]);
        }

        return redirect('/exams')->with('success', 'تمت إضافة  بيانات الإمتحان بنجاح.');

        
        
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
        $exam = Exams::find($id);
        $classes = SchoolClass::all();
        return view('exams.edit')->with('exam', $exam)->with('classes', $classes);
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
        $exam = Exams::find($id);


        if ($exam->class_id == $request->class_id AND $exam->name ==  $request->name)
        {
            return redirect('exams')->with('error', 'يوجد تكرار لإسم الإمتحان لنفس الفصل !');
        }


        else{

            $exam->name = $request->name;
            $exam->academic_years_id = $request->academic_year_id;
            $exam->class_id = $request->class_id;
            $exam->total_grade = $request->total_grade;
            $exam->exam_note = $request->exam_note;
            $exam->start_date = $request->start_date;
            $exam->end_date = $request->end_date;
    
            $exam->save();
            return redirect('exams')->with('success', 'تم تعديل بيانات الإمتحان.');
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

        $exam = Exams::find($id);
        $exam->delete();
      
        return back()->with('delete', ' تم مسح بيانات الامتحان يمكنك مراجعه سلة المهملات !!.');

    }
}
