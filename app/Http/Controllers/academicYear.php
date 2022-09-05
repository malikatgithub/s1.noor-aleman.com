<?php

namespace App\Http\Controllers;

use App\AcademicYear as AppAcademicYear;
use Illuminate\Http\Request;

class academicYear extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academic_year_info = AppAcademicYear::all();
        return view('school.academic_year')->with('academic_year_info', $academic_year_info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appAcademicYear = AppAcademicYear::create([

            'name'=> $request->name,
            'start_date'=> $request->start_date,
            'end_date'=> $request->end_date,
            'status'=> '0',
        ]);

        return redirect('/academic_year')->with('success', 'تمت إضافة  بيانات العام الدراسي .');
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
        $academic_year = AppAcademicYear::find($id);
        return view('school.academic_year_edit')->with('academic_year', $academic_year);
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

        if($request->status == '0')
            {
                $academic_year_all = AppAcademicYear::all();
                foreach ($academic_year_all as $academic_year_all) {
                    $academic_year_all->status = '0';
                    $academic_year_all->save();
                }
                $academic_year = AppAcademicYear::find($id);
                $academic_year->status = '1';
                $academic_year->save();
                return redirect('academic_year')->with('success', 'تم تشغيل العام الدراسي المحدد !! سوف يتم إعتمادة في عمليات البحث و الإضافة و سداد الرسوم و غيرها !');
                
            }

            else
                {
                    $academic_year_all = AppAcademicYear::all();
                    foreach ($academic_year_all as $academic_year_all) {
                        $academic_year_all->status = '0';
                        $academic_year_all->save();
                    }

                    $academic_year = AppAcademicYear::find($id);
                    $academic_year->status = '0';
                    $academic_year->save();
                    return redirect('academic_year')->with('error', 'تم إيقاف العام الدراسي المحدد !! قم بشغيل عام دراسي آخر');
                    
                    
                }
        
        }


        /* ==== custom function for edit the information of academic year ==== */
        public function update_info(Request $request, $id)
        {
            $academic_year = AppAcademicYear::find($id);
            $academic_year->name = $request->name;
            $academic_year->start_date = $request->start_date;
            $academic_year->end_date = $request->end_date;
            $academic_year->save();

            return redirect('academic_year')->with('success', 'تم تعديل بيانات العام الدراسي !!');

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
