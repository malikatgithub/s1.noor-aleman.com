<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;


class dynamicDependent extends Controller
{
   

    function fetch(Request $request)
    {
 
     $value = $request->get('value');
     
      // ACADEMIC YEAR ID INFO 
      $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
      foreach($academic_year as $info){
          $academic_year_id = $info->id;
          $academic_year_name = $info->name;
      }
      // # ACADEMIC YEAR ID INFO 
      
     
     $data = DB::table('exams')
        ->where('academic_years_id', $academic_year_id)
       ->where('class_id','=', $value)
       ->whereNull('deleted_at')
       ->get();

     $output = '';

     foreach($data as $row)
     {
      

        $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
      
      
     }
     echo $output;
    }


    function fetch_exams(Request $request)
    {
 
     $value = $request->get('value');
     
      // ACADEMIC YEAR ID INFO 

        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year as $info){
            $academic_year_id = $info->id;
            $academic_year_name = $info->name;
        }

      // # ACADEMIC YEAR ID INFO 
      
     
     $data = DB::table('exams')->where('academic_years_id', $academic_year_id)->where('class_id', $value)
       ->whereNull('deleted_at')
       ->get();

     $output = '';

     foreach($data as $row)
     {
      

        $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
      
      
     }
     echo $output;
    }



    function fetch_fees_types(Request $request)
    {
    
     $value = $request->get('value');
     
     // ACADEMIC YEAR ID INFO 
     $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
     foreach($academic_year as $info){
         $academic_year_id = $info->id;
         $academic_year_name = $info->name;
     }
     // # ACADEMIC YEAR ID INFO 
     
     $data = DB::table('fees_types')
       ->where('id','=', $value)
       ->where('academic_years_id', $academic_year_id)
       ->whereNull('deleted_at')
       ->get();

     $output = '';

     foreach($data as $row)
     {


   
       $output .= "<input type='text' class='form-control font-weight-bold bg-white border border-danger text-danger' id='validationDefault01'  value='$row->amount' readonly required name='amount'>
       ";
      
     }
     echo $output;
    }



   


    function fetch_class_fees_types(Request $request)
    {

    $value = $request->get('value');
     
        // ACADEMIC YEAR ID INFO 
        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year as $info){
            $academic_year_id = $info->id;
            $academic_year_name = $info->name;
        }
        // # ACADEMIC YEAR ID INFO 
     
    $data = DB::table('fees_types')
                                  ->where('class_id','=', $value)
                                  ->where('academic_years_id', $academic_year_id)
                                  ->whereNull('deleted_at')
                                  ->get();

    $output = '';

    foreach($data as $row)
    {
    
       $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
     
     
    }
    echo $output;
    }



    function fetch_bus_fees(Request $request)
    {

    $value = $request->get('value');
     
        // ACADEMIC YEAR ID INFO 
        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year as $info){
            $academic_year_id = $info->id;
            $academic_year_name = $info->name;
        }
        // # ACADEMIC YEAR ID INFO 
     
    $data = DB::table('buses')
                                  ->where('id','=', $value)
                                  ->where('academic_years_id', $academic_year_id)
                                  ->whereNull('deleted_at')
                                  ->get();

    $output = '';

    foreach($data as $row)
    {
    

       $output .= "<input type='text' class='form-control font-weight-bold bg-white border border-danger text-danger' id='validationDefault01'  value='$row->fees' readonly required name='amount'>
       ";
   

     
     
    }
    echo $output;
    }


}
