<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IncomeTypes;
use App\SchoolClass;

class incometypesController extends Controller
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
        $classes = SchoolClass::all();
        return view('accounting.create_income')->with('classes', $classes);
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

            $income = IncomeTypes::create([

                'name'=> $request->name,
                'class_id'=> $request->class_id,
                'amount'=> $request->amount,
                'income_note'=> $request->income_note,
            ]);
        }
        catch (\Illuminate\Database\QueryException $exception) {
            return back()->with('error', 'لم تتم إضافة المادة ! الإسم مكرر .');
        }
            return redirect('income/create')->with('success', 'تمت إضافة  بيانات .');

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
        $income = IncomeTypes::find($id);
        $classes = SchoolClass::all();
        return view('accounting.edit_income')->with('income', $income)->with('classes', $classes);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $income = IncomeTypes::find($id);
        $income->delete();
      
        return back()->with('delete', 'تم مسح البيانات نوع الايراد !! يمكنك مراجعة سلة المهملات');
    }
}
