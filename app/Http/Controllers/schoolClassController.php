<?php

namespace App\Http\Controllers;

use App\SchoolClass;
use DB;
use Illuminate\Http\Request;
use App\AcademicYear;
class schoolClassController extends Controller
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
            else{
          
                 
                                
                                return view('school.classes');
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
            else{
          
                                foreach ($academic_year as $academic_year_id) {
                                    $current_academic_year_id = $academic_year_id->id;
                                    $academic_year_name = $academic_year_id->name;
                                }
                                
                                return view('school.create_class')->with('academic_year_id', $current_academic_year_id)
                                                                  ->with('academic_year_name', $academic_year_name);
                            
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

        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();

            if($academic_year->isEmpty()){

                $academic_year_info = AcademicYear::all();
                return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');;
            }



            else {
                foreach ($academic_year as $academic_year_id) {
                    $academic_year_id = $academic_year_id->id;
                }
            }
            
        $class = SchoolClass::create([

            'name'=> $request->name,
            'academic_years_id'=> $request->academic_year_id,
            'capacity'=> $request->capacity,
            'class_note'=> $request->class_note,
        ]);

        return redirect('/school')->with('success', 'تمت إضافة  بيانات الفصل بنجاح.');
        
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
        $class = SchoolClass::find($id);
        return view('school.edit_class')->with('class', $class);
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

        $class = SchoolClass::find($id);

        $class->name = $request->name;
        $class->capacity = $request->capacity;
        $class->class_note = $request->class_note;

        $class->save();

        //$student>tags()->sync($request->tags);

        return redirect('school')->with('success', 'تم تعديل بيانات الفصل.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  

        $class = SchoolClass::find($id);
        $class->delete();
      

        return back()->with('delete', ' تم مسح بيانات الفصل يمكنك مراجعه سلة المهملات !!.');

    }



    public function classTrashed(){

        return view('school.trashed.class_index');
    }

    public function restore($id){
        $student = SchoolClass::withTrashed()->where('id', $id)->first();
        $student->restore();
        return redirect()->route('class_trashed')->with('success', 'تم إسترجاع بيانات الفصل.');
    }

}
