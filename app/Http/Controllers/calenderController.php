<?php

namespace App\Http\Controllers;

use App\Calender;
use App\AcademicYear;
use App\SchoolInfo;
use DB;
use Illuminate\Http\Request;

class calenderController extends Controller
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

                return view('school.calender')->with('academic_year_name', $academic_year_name);;
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
                return view('school.create_calender')->with('academic_year_id', $academic_year_id)
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
        
        try{
            $calender = Calender::create([

                'academic_years_id'=> $request->academic_year_id,
                'event'=> $request->event,
                'start_date'=> $request->start_date,
                'end_date'=> $request->end_date,
                'event_note'=> $request->event_note,
            ]);
     }
        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'لم تتم إضافة الحدث ! الحدث مكرر .');
        }


        return redirect('/school/create_calender')->with('success', 'تمت إضافة  بيانات التقويم بنجاح.');
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




    // CUSTOM MADE FUNCTIONS

    public function print()
    {

          // ACADEMIC YEAR ID INFO 
          $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->orderBy('start_date', 'ASC')->get();
          foreach($academic_year as $info){
              $academic_year_id = $info->id;
              $academic_year_name = $info->name;
          }
          // # ACADEMIC YEAR ID INFO 


        //   CALENDER INFORMATION 
            $academic_calender_events = Calender::all()->where('academic_years_id',$academic_year_id);
        //   # CALENDER INFORMATION 


          $school_info = SchoolInfo::all()->first();
          return view('school.print_calender')->with('school_info', $school_info)
                                              ->with('academic_year_name', $academic_year_name)
                                              ->with('academic_calender_events', $academic_calender_events);
    }

    // # CUSTOM MADE FUNCTIONS




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calender = Calender::find($id);
        return view('school.edit_calender')->with('calender', $calender);
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
        $calender = Calender::find($id);


        $calender->academic_years_id = $request->academic_year_id;
        $calender->event = $request->event;
        $calender->start_date = $request->start_date;
        $calender->end_date = $request->end_date;
        $calender->event_note = $request->event_note;

        $calender->save();

        //$student>tags()->sync($request->tags);

        return redirect()->route('school.calender')->with('success', 'تم تعديل بيانات التقويم.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calender = Calender::find($id);
        $calender->delete();
      
        return back()->with('delete', 'تم مسح البيانات.');

    }
}
