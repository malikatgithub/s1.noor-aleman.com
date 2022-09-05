<?php

namespace App\Http\Controllers;

use App\SchoolInfo as AppSchoolInfo;
use Illuminate\Http\Request;

class schoolInfo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school_infos = AppSchoolInfo::all();
        return view('school.school_info')->with('school_info', $school_infos);
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

        if ($request->hasFile('logo')) {
            $pic = $request->logo;
            $pic_new_name = time().$pic->getClientOriginalName();
            $pic->move('public/upload/school_logo', $pic_new_name);
        }
        else{
            $pic_new_name = 'default.png';
        }
        $school_info = AppSchoolInfo::create([

            'name_arabic'=> $request->name_arabic,
            'name_english'=> $request->name_english,
            'logo'=> '/upload/school_logo/'.$pic_new_name,
        ]);

        return redirect('/school_info')->with('success', 'تمت إضافة  بيانات المدرسة .');

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
        $school_infos = AppSchoolInfo::find($id);
        return view('school.school_info_edit')->with('school_info', $school_infos);
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
        
        $school_infos = AppSchoolInfo::find($id);


        if($request->hasFile('logo')){

            $pic = $request->logo;
            $pic_new_name = time().$pic->getClientOriginalName();
            $pic->move('public/upload/school_logo', $pic_new_name);
            $school_infos->logo = '/upload/school_logo/'.$pic_new_name;

        }


        $school_infos->name_arabic = $request->name_arabic;
        $school_infos->name_english = $request->name_english;
     

        $school_infos->save();

        //$student>tags()->sync($request->tags);

        return redirect('school_info')->with('success', 'تم تعديل بيانات المدرسة.');
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
