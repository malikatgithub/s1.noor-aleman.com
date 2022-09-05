<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employees;
use DB;
use App\AcademicYear;

class employeeController extends Controller
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

                                return view('employees.create')->with('academic_year_id',$academic_year_id);
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

  
        
        $employee = Employees::create([

            'name'=> $request->name,
            'academic_years_id'=> $request->academic_year_id,
            'dob'=> $request->dob,
            'gender'=> $request->gender,
            'salary'=> $request->salary,
            'phone'=>$request->phone,
            'id_card'=>$request->id_card,
            'join_date'=>$request->join_date,
            'address'=>$request->address,
            'note'=>$request->note,
            
            
        ]);

        return redirect('employees')->with('success', 'تمت إضافة الأستاذ بنجاح.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employees::find($id);

        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employees::find($id);
        return view('employees.edit')->with('employee', $employee);
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
        $employee = Employees::find($id);

 

        
        $employee->name = $request->name;
        $employee->salary = $request->salary;
       


        $employee->gender = $request->gender;
        $employee->phone = $request->phone;


       
        $employee->id_card = $request->id_card;
        $employee->address = $request->address;
        $employee->note = $request->note;




     

        $employee->save();

        //$student>tags()->sync($request->tags);

        return redirect('employees')->with('success', 'تم تعديل بيانات الموظف.');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $employee = Employees::find($id);
        $employee->delete();
        return back()->with('delete', 'تم مسح بيانات الموظف - يمكنك مراجعه سلة المهملات');
    }


    public function employeeTrashed(){

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

            return view('employees.trashed.index');
        }


    }


    public function restore($id){

        $employee = Employees::withTrashed()->where('id', $id)->first();
        $employee->restore();
        return redirect()->route('employeeTrashed')->with('success', 'تم إسترجاع بيانات الموظف.');
        
    }


}
