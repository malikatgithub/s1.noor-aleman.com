<?php

namespace App\Http\Controllers;

use App\Bus;
use App\SchoolInfo;
use App\Student;
use App\BusPayment;
use DB;
use Illuminate\Http\Request;
use App\AcademicYear;
class busController extends Controller
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
          
         
                                return view('bus.index');
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
                                
                                return view('bus.create')->with('academic_year_id', $current_academic_year_id)
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
            
        $class = Bus::create([

            'name'=> $request->name,
            'academic_years_id'=> $request->academic_year_id,
            'fees'=> $request->fees,
            'note'=> $request->note,
        ]);

        return redirect('/bus')->with('success', 'تمت إضافة  بيانات الفصل بنجاح.');
        
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
        $bus = Bus::find($id);
        return view('bus.edit')->with('bus', $bus);
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

        $bus = Bus::find($id);

        $bus->name = $request->name;
        $bus->fees = $request->fees;
        $bus->note = $request->note;

        $bus->save();

        //$student>tags()->sync($request->tags);

        return redirect('bus')->with('success', 'تم تعديل بيانات الترحيل.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  

        $bus = Bus::find($id);
        $bus->delete();
      

        return back()->with('delete', ' تم مسح بيانات الفصل يمكنك مراجعه سلة المهملات !!.');

    }



    public function Trashed(){

        return view('bus.trashed.index');
    }



    public function restore($id){
        $bus = Bus::withTrashed()->where('id', $id)->first();
        $bus->restore();
        return redirect('bus')->with('success', 'تم  إسترجاع الترحيل.');
    }

 


    /** Fees Income controller **/

    public function fees_index(){
        return view ('accounting.bus_panel');
    }



        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payform($id)
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


        $buses = Bus::all();


        //======

        return view('accounting.bus_pay_form')->with('student', $studnet)
                                               ->with('buses', $buses);
    }




        /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payment_store(Request $request)
    {


        $save = BusPayment::create($request->all());
        $school_info = SchoolInfo::all()->first();


        
        $academic_year = AcademicYear::find($request->academic_year_id);

        $id = BusPayment::all()->last();

        $name =  $request->std_name;
        $paid =  $request->paid;
        $fees_note =  $request->fees_note;
        $month =  $request->month;


        return view('accounting.bus_payment_print')->with('name', $name)
                                                    ->with('invoice_id', $id)
                                                    ->with('paid', $paid)
                                                    ->with('month', $month)
                                                    ->with('fees_note', $fees_note)
                                                    ->with('school_info', $school_info)
                                                    ->with('academic_year_name', $academic_year->name)
                                                    ->with('invoice_id', $id)
                                                    ;





        // return redirect('bus_panel')->with('success', 'تم دفع رسوم الترحيل للطالب');



    }



    public function payment_reprint($id){

        //====== Query for the return invoice information and other invoice informations

        $invoice_info = Fees::find($id);
        //$name = $request->student_name;
        $school_info = SchoolInfo::all()->first();

        //$academic_year = AcademicYear::find($request->academic_year_id);

        //====== End of Query for the return invoice information and other invoice informations

        $fees_types = FeesTypes::all();
        return view('accounting.invoice_reprint')->with('invoice_info', $invoice_info)
                                                ->with('fees_types', $fees_types)
                                                ->with('school_info', $school_info);
                                                //->with('academic_year_name', $academic_year->name)
                                                //->with('name', $name);
        }

        /**
         * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function payment_edit($id)
        {

                $payment = BusPayment::find($id);
                $reg_no = $payment->reg_no;
                //====== Query for the return fees for each class alone
                $student = Student::where('reg_no','=', $reg_no)->get()->first();
                $buses = Bus::all();
             
                //======

                return view('accounting.bus_payment_edit_form')
                                                    ->with('payment', $payment)
                                                    ->with('student', $student)
                                                    ->with('buses', $buses);

        }


             /**
         * Show the form for editing the specified resource.
        *
        * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function payment_update(Request $request, $id)
        {

                $payment = BusPayment::find($id);
                $update =  $payment->update($request->all());
                $school_info = SchoolInfo::all()->first();


        
                $academic_year = AcademicYear::find($request->academic_year_id);
        
                $id = BusPayment::all()->last();
        
                $name =  $request->std_name;
                $paid =  $request->paid;
                $fees_note =  $request->fees_note;
                $month =  $request->month;
        
        
                return view('accounting.bus_payment_print')->with('name', $name)
                                                            ->with('invoice_id', $id)
                                                            ->with('paid', $paid)
                                                            ->with('month', $month)
                                                            ->with('fees_note', $fees_note)
                                                            ->with('school_info', $school_info)
                                                            ->with('academic_year_name', $academic_year->name)
                                                            ->with('invoice_id', $id)
                                                            ;
        

        }

        
    
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payment_destroy($id)
    {
        $payment = BusPayment::find($id);
        $payment->delete();
      

        return back()->with('delete', 'تم مسح بيانات الرسوم  !!.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
        $buses = Bus::all();
        return view('accounting.report.bus.index')
        ->with('buses', $buses);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report_print(Request $request)
    {
       

        $academic_year  = AcademicYear::all()->where('status', '=', '1');

        if ($academic_year->isEmpty()) {
            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');
        } 
        
        else {
            
            foreach ($academic_year as $academic_year_info) {
                $academic_year_id = $academic_year_info->id;
                $academic_year_name = $academic_year_info->name;
            }


            // RETRIVE SCHOOL INFORMATION
            $school_info = SchoolInfo::all()->first();
            // # RETRIVE SCHOOL INFORMATION

            // SET THE OPERATION FOR THE REPORT
            if (isset($request->show)){
                $operation = 'show';
            }

            if (isset($request->print)){
                $operation = 'print';
            }

            // # SET THE OPERATION FOR THE REPORT
        
            // $info = DB::select(" SELECT * FROM bus_payments WHERE `month` = '$request->month' AND `bus_type_id` = '$request->bus_id' AND `deleted_at` IS NULL;");

    

            $info = BusPayment::all() 
            ->where('month', $request->month)
            ->where('bus_type_id', $request->bus_id )
            ->where('academic_year_id', $academic_year_id )
            ->where('deleted_at', NULL)
            ;


            

            return view('accounting.report.bus.report')->with('info', $info)
                                                                        ->with('school_info', $school_info)
                                                                        ->with('month', $request->month)
                                                                        ->with('operation', $operation);
         
        }
    }

    












}
