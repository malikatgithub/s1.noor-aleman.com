<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FeesTypes;
use App\SchoolClass;
use App\AcademicYear;
use DB;

class feesTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status', '=', '1')->get();

        if ($academic_year->isEmpty()) {
            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');
            
        } else {

            foreach ($academic_year as $academic_year_id) {
                $academic_year_name = $academic_year_id->name;
            }

            return view('accounting.fees_types')->with('academic_year_name', $academic_year_name );

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = SchoolClass::all();
        return view('accounting.create_fees_type')->with('classes', $classes);
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

            $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();

            if($academic_year->isEmpty()){
                return back()->with('error', 'لايوجد عام دراسي أو تم إيقاف العام الدراسي');       
            }

            else {
                foreach ($academic_year as $academic_year_id) {
                    $id = $academic_year_id->id;
              
            }

              
            // to Gentrate fees class this fees classes for aviod deplicate
            $fees_class = $request->name.$request->class_id;
            // End of Gentrate fees class this fees classes for aviod deplicate
            $fees = FeesTypes::create([
                'academic_years_id'=> $id,
                'name'=> $request->name,
                'class_id'=> $request->class_id,
                'fees_class'=> $fees_class,
                'amount'=> $request->amount,
                'date'=>$request->date,
                'fees_note'=> $request->fees_note,
                ]);

            return redirect('fees_type/create')->with('success', 'تمت إضافة  بيانات .');
            }
                 
         }

        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'لم تتم إضافة القسط ! الإسم مكرر .');
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
        $fees = FeesTypes::find($id);
        $classes = SchoolClass::all();
        return view('accounting.edit_fees_type')->with('fees', $fees)->with('classes', $classes);
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

        try{
            $fees = FeesTypes::find($id);

            /* ==========
                    to Gentrate fees class this fees classes for aviod deplicate 
                    this variable contain two things the fees name and the id of the class
               ==========

            */
            
            $fees_class = $request->name.$request->class_id;

            // End of Gentrate fees class this fees classes for aviod deplicate
    
            $fees->name = $request->name;
            $fees->class_id = $request->class_id;
            $fees->fees_class = $fees_class;
            $fees->amount = $request->amount;
            $fees->date = $request->date;
            $fees->fees_note = $request->fees_note;
    
            $fees->save();
    
            //$student>tags()->sync($request->tags);
    
            return redirect('fees_type/create')->with('success', 'تم تعديل بيانات القسط.');

        }

        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'لم تتم إضافة المادة ! الإسم مكرر .');
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
        $fee = FeesTypes::find($id);
        $fee->delete();
      
        return back()->with('delete', 'تم مسح البيانات نوع الايراد !! يمكنك مراجعة سلة المهملات');
    }
}
