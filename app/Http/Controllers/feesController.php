<?php

namespace App\Http\Controllers;

use App\AcademicYear;
use App\Fees;
use App\FeesTypes;
use App\SchoolInfo;
use App\Student;
use DB;
use Illuminate\Http\Request;

class feesController extends Controller
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
            return view('accounting.fees_panel');
        }
       
     

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
      
    
    
        /** To generate the reg_no */

        $fees = Fees::latest()->first();

        if (empty($fees)){
            $new_bill_no = "001";
        }
        else{

            $fess_no = $fees->id+1;
            $str_exp_no = (string) $fess_no;
    
            $new_bill_no = "00FEES$str_exp_no";
        }
      

        /** To generate the reg_no */

        if ($request->hasFile('doc')) {
            $doc = $request->doc;
            $doc_new_name = time().$doc->getClientOriginalName();
            $doc->move('upload/posts', $doc_new_name);
        }
        else{
            $doc_new_name = NULL;
        }

        // ======== Parameter for Function for check invoice to prevent the redendance 
        $fees_type_id = $request->fees_type_id;
        $reg_no = $request->reg_no;
        $student_id = $request->student_id;


        $invoice_info = DB::select(" SELECT * FROM fees WHERE fees_types_id = $fees_type_id AND reg_no = $reg_no AND deleted_at IS NULL ;");

        if (count($invoice_info)>0)
        {
            return redirect("/fees_panel/show/$student_id")->with('error', 'لقد تم دفع هذا القسط مسبقا !!');
        }
        // ======== End of Parameter for Function for check invoice to prevent the redendance 


        else{
            $fees = Fees::create([

                'academic_years_id'=> $request->academic_year_id,
                'reg_no'=> $request->reg_no,
                'student_id'=> $request->student_id,
                'class_id'=> $request->class_id,
                'bill_no'=> $new_bill_no,
                'date'=> $request->date,
                'doc'=> 'public/upload/invoices/'.$doc_new_name,
                'fees_note'=> $request->fees_note,
                'fees_types_id'=> $request->fees_type_id,
                'amount'=> $request->amount,
                'discount'=> $request->discount,
                'paid'=> $request->paid,
                'paid_method'=> $request->paid_method,
            ]);


            //====== Query for the return invoice information and other invoice informations

            $invoice_info = Fees::all()->where('bill_no', $new_bill_no)->where('academic_years_id', $request->academic_year_id)->first();


            $name = $request->student_name;
            $school_info = SchoolInfo::all()->first();

            $academic_year = AcademicYear::find($request->academic_year_id);

            //====== End of Query for the return invoice information and other invoice informations

            $fees_types = FeesTypes::all();
            return view('accounting.invoice_print')->with('invoice_info', $invoice_info)
                                                    ->with('fees_types', $fees_types)
                                                    ->with('school_info', $school_info)
                                                    ->with('academic_year_name', $academic_year->name)
                                                    ->with('name', $name);
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
        $studnet = Student::find($id);

        //====== Query for the return fees for each class alone
        $class_id = DB::table('students')->select('class_id')->where('id','=', $id)->get();
            // RETURN THE NAME REG_NO 
            foreach ($class_id as $class_id) {
                $class_id = $class_id->class_id;
            }
        $fees_types_list = DB::table('fees_types')->select('id','name','class_id', 'fees_class','amount','fees_note')->where('class_id','=', $class_id)->whereNull('deleted_at')->get();
            // $fees_types_list = FeesTypes::all();

        //======

        //====== Query for the return the paid fees for studnet
        $reg_no = DB::table('students')->select('reg_no')->where('id','=', $id)->get();
            // RETURN THE NAME REG_NO 
            foreach ($reg_no as $reg) {
                $no = $reg->reg_no;
            }

        $fees_types_id = DB::table('fees')->select('fees_types_id','paid', 'id')->where('reg_no','=',$no)->whereNull('deleted_at')->get();
        $fees_types = FeesTypes::all();


        //======

        return view('accounting.fees_pay_form')->with('student', $studnet)
                                               ->with('fees_types_id', $fees_types_id)
                                               ->with('fees_types', $fees_types)
                                               ->with('fees_types_list', $fees_types_list);
    }


    public function reprint($id){

           //====== Query for the return invoice information and other invoice informations

           $invoice_info = Fees::find($id);
           //$name = $request->student_name;
           $school_info = SchoolInfo::all()->first();

           $academic_year = AcademicYear::find($invoice_info->academic_years_id);

           //====== End of Query for the return invoice information and other invoice informations

           $fees_types = FeesTypes::all();
           return view('accounting.invoice_reprint')->with('invoice_info', $invoice_info)
                                                   ->with('fees_types', $fees_types)
                                                   ->with('school_info', $school_info)
                                                   ->with('academic_year_name', $academic_year->name);
                                                   //->with('name', $name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

            $fees = Fees::find($id);
            $reg_no = $fees->reg_no;
            //====== Query for the return fees for each class alone
            $student = DB::table('students')->select('class_id')->where('reg_no','=', $reg_no)->get();
                // RETURN THE CLASS ID
                foreach ($student as $student_class_id) {
                    $class_id = $student_class_id->class_id; 
                }
              
            //======

            //====== Fees paid and remain info
            $fees_types_id = DB::table('fees')->select('fees_types_id','paid', 'id')->where('reg_no','=',$reg_no)->get();
            $fees_types = FeesTypes::all();

            //======

            return view('accounting.fees_pay_edit_form')
                                                ->with('class_id', $class_id)
                                                ->with('fees', $fees)
                                                ->with('fees_types_id', $fees_types_id)
                                                ->with('fees_types', $fees_types);

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
        $fees = Fees::find($id);

        if($request->hasFile('doc')){

            $pic = $request->doc;
            $pic_new_name = time().$pic->getClientOriginalName();
            $pic->move('upload/posts', $pic_new_name);
            $fees->doc = '/upload/posts/'.$pic_new_name;

        }


         // ======== Parameter for Function for check invoice to prevent the redendance 

         $fees_type_id = $request->fees_type_id;
         $reg_no = $request->reg_no;
         

         $invoice_info = DB::select(" SELECT * FROM fees WHERE fees_types_id = $fees_type_id AND reg_no = $reg_no AND id != '$id';");
 
         if (count($invoice_info)>0)
         {
             return redirect("/fees_panel")->with('error', 'لقد تم دفع هذا القسط مسبقا !!');
         }

         // ======== End of Parameter for Function for check invoice to prevent the redendance 

         else {
             
            $fees_amount = DB::select(" SELECT * FROM fees_types WHERE id = $fees_type_id");
            foreach ($fees_amount as $amount) {
                $amount = $amount->amount;
            }

            $fees->date = $request->date;
            $fees->fees_note = $request->fees_note;
            $fees->fees_types_id = $request->fees_type_id;
            $fees->amount = $amount;
            $fees->discount = $request->discount;
            $fees->paid = $request->paid;
            $fees->paid_method = $request->paid_method;
    
        
            $fees->save();
            return redirect('/fees_panel')->with('success', 'تم تعديل بيانات الطالب.');
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
        $fees = Fees::find($id);
        $fees->delete();
      

        return back()->with('delete', ' تم مسح بيانات القسط   !!.');
    }
}
