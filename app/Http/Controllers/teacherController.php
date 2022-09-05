<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teachers;
use DB;
use App\AcademicYear;

class teacherController extends Controller
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
        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();

                            if($academic_year->isEmpty()){

                                $academic_year_info = AcademicYear::all();
                                return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');;
                            }
                            else
                            {
                                foreach ($academic_year as $academic_year_id) {
                                    $academic_year_id = $academic_year_id->id;
                                }

                                return view('teachers.create')->with('academic_year_id',$academic_year_id);
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

        if ($request->hasFile('pic')) {
            $pic = $request->pic;
            $pic_new_name = time().$pic->getClientOriginalName();
            $pic->move('upload/teachers', $pic_new_name);
        }
        else
        {
            $pic_new_name = 'default.png';
        }
        
        $teacher = Teachers::create([

            'name'=> $request->name,
            'academic_years_id'=> $request->academic_year_id,
            'qualification'=> $request->qualification,
            'dob'=> $request->dob,
            'gender'=> $request->gender,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'id_card'=>$request->id_card,
            'salary'=>$request->salary,
            'join_date'=>$request->join_date,
            'pic'=>'/upload/teachers/'.$pic_new_name,
            'address'=>$request->address,
            'teacher_note'=>$request->teacher_note,
            
            
        ]);

        return redirect('teachers')->with('success', 'تمت إضافة الأستاذ بنجاح.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teachers::find($id);

        return view('teachers.show')->with('teacher', $teacher);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teachers::find($id);
        return view('teachers.edit')->with('teacher', $teacher);
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
        $teacher = Teachers::find($id);

        if($request->hasFile('pic')){

            $pic = $request->pic;
            $pic_new_name = time().$pic->getClientOriginalName();
            $pic->move('upload/teachers', $pic_new_name);
            $teacher->pic = '/upload/teachers/'.$pic_new_name;

        }

        if (isset($request->delete_pic))
        {
            $teacher->pic = '/upload/teachers/'.$request->delete_pic;
        }

        
        $teacher->name = $request->name;
        $teacher->qualification = $request->qualification;
        $teacher->dob = $request->dob;
       


        $teacher->gender = $request->gender;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;


       
        $teacher->id_card = $request->id_card;
        $teacher->salary = $request->salary;
        $teacher->address = $request->address;
        $teacher->teacher_note = $request->teacher_note;




     

        $teacher->save();

        //$student>tags()->sync($request->tags);

        return redirect('teachers')->with('success', 'تم تعديل بيانات المدرس.');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subjects')
        ->where("teacher_id", '=', $id)
        ->update(['teacher_id'=> NULL]);

        $teacher = Teachers::find($id);
        $teacher->delete();
        return back()->with('delete', 'تم مسح بيانات المدرس - يمكنك مراجعه سلة المهملات');
    }


    public function teacherTrashed(){

        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();

        if($academic_year->isEmpty()){

            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                ->with('error', 'قم بتشغل عام دراسي معين !!');;
        }
        else
        {
            foreach ($academic_year as $academic_year_id) {
                $academic_year_id = $academic_year_id->id;
            }
   

            // $data = DB::table('teachers')
            // ->where('academic_years_id', $academic_year_id)
            // ->whereNull('deleted_at')
            // ->orderBy('id', 'ASC')
            // ->get();

            return view('teachers.trashed.index');
        }


    }


    public function restore($id){

        $teacher = Teachers::withTrashed()->where('id', $id)->first();
        $teacher->restore();
        return redirect()->route('teacherTrashed')->with('success', 'تم إسترجاع بيانات المدرس.');
        
    }


}
