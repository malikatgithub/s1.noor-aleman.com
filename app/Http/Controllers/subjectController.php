<?php

namespace App\Http\Controllers;

use App\SchoolClass;
use App\Subjects;
use App\Teachers;
use App\AcademicYear;
use Illuminate\Http\Request;

class subjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('school.create_subject');
    }


    public function add()
    {

        $academic_year  = AcademicYear::all()->where('status','=', '1');

            if($academic_year->isEmpty()){

                $academic_year_info = AcademicYear::all();
                return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');;
            }

            else{
                
                foreach ($academic_year as $academic_year_id) {
                    $current_academic_year_id = $academic_year_id->id;
                    $academic_year_name = $academic_year_id->name;
                }

                $teachers = Teachers::all();
                $classes = SchoolClass::all();
                return view('school.add_subject')->with('teachers', $teachers)->with('classes', $classes)
                ->with('academic_year_name', $academic_year_name)
                ->with('current_academic_year_id', $current_academic_year_id);
         
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
        
    
        try{
            $subject = Subjects::create([
           
                'name'=> $request->name,
                'academic_years_id'=> $request->current_academic_year_id,
                'class_id'=> $request->class_id,
                'teacher_id'=> $request->teacher_id,
            ]);

            $academic_year  = AcademicYear::all()->where('status','=', '1');

            foreach ($academic_year as $academic_year_id) {
                $current_academic_year_id = $academic_year_id->id;
                $academic_year_name = $academic_year_id->name;
            }

            

            $teachers = Teachers::all();
            $classes = SchoolClass::all();
    
            return back()->with('school.add_subject')->with('success', 'تمت إضافة  بيانات الفصل بنجاح.')->with('teachers', $teachers)->with('classes', $classes)->with('academic_year_name', $academic_year_name)
            ->with('current_academic_year_id', $current_academic_year_id);

        }
        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'لم تتم إضافة المادة ! الإسم مكرر .');
        }



      


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
        $subject = Subjects::find($id);
        $classes = SchoolClass::all();
        $teachers = Teachers::all();
        return view('school.edit_subject')->with('subject', $subject)
                                          ->with('classes', $classes)
                                          ->with('teachers', $teachers);
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

        $subject = Subjects::find($id);
        
        $subject->name = $request->name;
        $subject->class_id = $request->class_id;
        $subject->teacher_id = $request->teacher_id;

        $subject->save();

        //$student>tags()->sync($request->tags);

        return redirect('subject/create')->with('success', 'تم تعديل بيانات المادة.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subjects::find($id);
        $subject->delete();
      
        return back()->with('delete', 'تم مسح بيانات المادة !! يمكنك مراجعة سلة المهملات.');
    }



    public function subjectTrashed(){

        return view('school.trashed.subject_index');
    }

    public function restore($id){
        $student = Subjects::withTrashed()->where('id', $id)->first();
        $student->restore();
        return redirect()->route('subject.create')->with('success', 'تم إسترجاع بيانات المادة.');
    }

}
