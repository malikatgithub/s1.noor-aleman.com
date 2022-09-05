<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use App\Exams;
use App\Bus;
use App\SchoolClass;
use App\AcademicYear;
use App\Student;
use App\Subjects;
use App\Teachers;
use App\Employees;

use function Opis\Closure\unserialize;

class searchController extends Controller
{
    public function index()
    {
        //return view('students.search');
    }


    public function action(Request $request)
    {

        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('students')
             ->where('name', 'like', '%'.$query.'%')
             ->where('academic_years_id', $academic_year_id )
             ->whereNull('deleted_at')
             ->orderBy('id', 'desc')
             ->get();
            } else {
                //    $data = DB::table('students')
            //      ->orderBy('id', 'desc')
            //      ->get();
            }

            $total_row = $data->count();
          
            if ($total_row > 0) {
                $output = '';
       
                $thead = "
            <tr>
                <th>#</th>
                <th>الرقم الأكاديمي</th>
                <th>إسم الطالب</th>
                <th>اسم الوالد</th>
                <th>رقم الهاتف</th>
                <th>الفصل الدراسي</th>
                <th>العنوان</th>
                <th class='text-center'>العمليات</th>
            </tr>
            ";
                $x=0;
                foreach ($data as $row) {
                    $x++;


                    $class_name = DB::Table('school_classes')->select('name')->where('id', $row->class_id)->where('deleted_at', NULL)->get('name');
                        
                    if ($class_name->isEmpty()) {
                        $c_nam = "<span class='font-weight-bold text-danger'> <i class='fas fa-exclamation-triangle fa-2x pt-2'></i> لم يحدد الفصل الدراسي أو تم مسحه</span>";
                    }

                    else{
                        foreach ($class_name as $name) {
                            $c_nam = $name->name;
                        }
                    }
            

                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->reg_no</td>
             <td>$row->name</td>
             <td>$row->fa_name</td>
             <td>$row->fa_phone</td>
             <td>$c_nam</td>
             <td>$row->address</td>
             <td class='text-center'>
                <abbr title='Edit Teacher Information'><a onclick='return edit()' href='student/edit/$row->id'><i class='far fa-edit fa-2x pt-2 ml-1 text-primary'></i></a></abbr>
                <abbr title='Show Teacher Information'><a  href='student/show/$row->id'><i class=' fas fa-address-card fa-2x pt-2 ml-1 text-success' ></i></a></abbr>
                <abbr title='Delete Teacher Information'><a onclick='return del()' href='student/delete/$row->id'><i class='fas fa-trash-alt fa-2x  pt-2 i text-danger' ></i></a></abbr>
             </td>
            </tr>
            ";
                }
            } 
            
            if ($data->isEmpty()) {
                $output .='
                            <tr>
                                <td align="center" colspan="5" class="text-danger font-weight-bold"><i class="fas fa-exclamation-triangle fa-2x"> لاتوجد نتائج </i></td>
                            </tr>
                            ';
            }

            //   $data = array(
            //    "table_data"  => "$output"
           
            //    //'total_data'  => $total_row
            //   );

            $data['table_header'] = $thead;
            $data['result'] = $output;
    
            echo json_encode($data);
        }
    }




    public function studentTrashed(Request $request)
    {

        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                
                $data = Student::onlyTrashed()->where('name', 'like', '%'.$query.'%')
                ->orWhere('reg_no', 'like', '%'.$query.'%')
                ->where('academic_years_id', $academic_year_id )
                ->whereNull('deleted_at')
                ->orderBy('id', 'desc')
                ->get();
              
            } 
            
            else {

                $data = Student::onlyTrashed()->get();
            }

            $total_row = $data->count();
          
            if ($total_row > 0) {
                $output = '';
       
           
                $x=0;
                foreach ($data as $row) {
                    $x++;

             
                        $class_name = DB::Table('school_classes')->select('name')->where('id', $row->class_id)->where('deleted_at', NULL)->get('name');
                        
                        if ($class_name->isEmpty()) {
                            $c_nam = "<span class='font-weight-bold text-danger'> <i class='fas fa-exclamation-triangle fa-2x pt-2'></i> لم يحدد الفصل الدراسي أو تم مسحه</span>";
                        }

                        else{
                            foreach ($class_name as $name) {
                                $c_nam = $name->name;
                            }
                        }

                        
             
           
            

                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->reg_no</td>
             <td>$row->name</td>
             <td>$row->fa_name</td>
             <td>$row->fa_phone</td>
             <td>$c_nam</td>
             <td>$row->address</td>
             <td class='text-center'>
                
                <abbr title='Restore Student Information'><a onclick='return studentTrashed()' href='restore_std/$row->id'><i class='fas fa-recycle fa-2x  pt-2 i text-success font-weight-bold ml-1' ></i></a></abbr>
             </td>
            </tr>
            ";
                }
            } 
            
            else {
                $output ='
                            <tr>
                                <td align="center" colspan="8" class="text-danger font-weight-bold"><i class="fas fa-exclamation-triangle fa-2x pt-2"></i> لاتوجد نتائج </td>
                            </tr>
                            ';
            }

     

            $data['table_data'] = $output;
    
            echo json_encode($data);
        }
    }





        


    public function class(Request $request)
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
                            }

        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('school_classes')
             ->where('name', 'like', '%'.$query.'%')
             ->where('academic_years_id', $academic_year_id)
             ->whereNull('deleted_at')
             ->orderBy('id', 'ASC')
             ->get();
            } else {
                        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();

                            if($academic_year->isEmpty()){

                                $academic_year_info = AcademicYear::all();
                                return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');;
                            }
                            else
                            {
                                foreach ($academic_year as $academic_year_id){
                                    $academic_year_id = $academic_year_id->id;
                                }
                                $data = DB::table('school_classes')
                                            ->whereNull('deleted_at')
                                            ->where('academic_years_id', $academic_year_id)
                                            ->orderBy('id', 'ASC')
                                            ->get();
                            }

                
            }

            $total_row = $data->count();
          
            if ($total_row > 0) {
                $x=0;
                foreach ($data as $row) {
                    $x++;
                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->name</td>
             <td>$row->capacity</td>
             <td>$row->class_note</td>
          
             <td class='text-center'>
                <a onclick='return edit()' href='class/edit/$row->id'><i class='far fa-edit fa-2x ml-1 pt-2 text-primary'></i></a>
                <a onclick='return del()' href='class/delete/$row->id'><i class='fas fa-trash-alt fa-2x pt-2 i text-danger ml-1' ></i></a>
             </td>
            </tr>
            ";
                }
            } else {
                $output ='
           <tr>
                <td align="center"  class="text-danger font-weight-bold" colspan="5"><i class="fas fa-exclamation-triangle fa-2x pt-2 text-danger"></i>  لاتوجد نتائج </td>
           </tr>
           ';
            }

            $data = array(
           "table_data"  => $output,
           
           'total_data'  => $total_row
          );

            // $data['table_header'] = $thead;
            // $data['result'] = $output;
    
            echo json_encode($data);
        }
    }


    


    public function class_trashed(Request $request)
    {
        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data =  SchoolClass::onlyTrashed()->where('name', 'like', '%'.$query.'%')
                                                ->where('academic_years_id', $academic_year_id )
                                                ->whereNull('deleted_at')
                                                ->orderBy('id', 'desc')
                                                ->get();
            } else {

                $data = SchoolClass::onlyTrashed()->get();

            
            }

            $total_row = $data->count();
          
            if ($total_row > 0) {
                $x=0;
                foreach ($data as $row) {

                    // VERFIY TEACHER NOTE 

                        if ($row->class_note == NULL){
                            $note = "<span class='font-weight-bold text-danger'>لاتوجد</span>";
                        }
                        else {
                            $note = $row->class_note;
                        }

                    //# VERFIY TEACHER NOTE 
                
                    $x++;
                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->name</td>
             <td>$row->capacity</td>
             <td>$note</td>
          
             <td class='text-center font-weight-bold bg-white'>

             <abbr title='Restore class Information'><a onclick='return classTrashed()' href='restore_class/$row->id'><i class='fas fa-recycle fa-2x  pt-2 i text-success font-weight-bold ml-1' ></i></a></abbr>

             </td>
            </tr>
            ";
                }
            } else {
                $output ='
           <tr>
                <td align="center"  class="text-danger font-weight-bold" colspan="7"><i class="fas fa-exclamation-triangle fa-1x text-danger"></i>  لاتوجد نتائج </td>
           </tr>
           ';
            }

            $data = array(
           "table_data"  => $output,
           
           'total_data'  => $total_row
          );

            // $data['table_header'] = $thead;
            // $data['result'] = $output;
    
            echo json_encode($data);
        }
    }








    

    public function buses(Request $request)
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
                            }

        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('buses')
             ->where('name', 'like', '%'.$query.'%')
             ->where('academic_years_id', $academic_year_id)
             ->whereNull('deleted_at')
             ->orderBy('id', 'ASC')
             ->get();
            } else {
                        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();

                            if($academic_year->isEmpty()){

                                $academic_year_info = AcademicYear::all();
                                return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');;
                            }
                            else
                            {
                                foreach ($academic_year as $academic_year_id){
                                    $academic_year_id = $academic_year_id->id;
                                }
                                $data = DB::table('buses')
                                            ->whereNull('deleted_at')
                                            ->where('academic_years_id', $academic_year_id)
                                            ->orderBy('id', 'ASC')
                                            ->get();
                            }

                
            }

            $total_row = $data->count();
          
            if ($total_row > 0) {
                $x=0;
                foreach ($data as $row) {
                    $x++;
                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->name</td>
             <td>$row->fees</td>
             <td>$row->note</td>
          
             <td class='text-center'>
                <a onclick='return edit()' href='bus/edit/$row->id'><i class='far fa-edit fa-2x ml-1 pt-2 text-primary'></i></a>
                <a onclick='return del()' href='bus/delete/$row->id'><i class='fas fa-trash-alt fa-2x pt-2 i text-danger ml-1' ></i></a>
             </td>
            </tr>
            ";
                }
            } else {
                $output ='
           <tr>
                <td align="center"  class="text-danger font-weight-bold" colspan="5"><i class="fas fa-exclamation-triangle fa-2x pt-2 text-danger"></i>  لاتوجد نتائج </td>
           </tr>
           ';
            }

            $data = array(
           "table_data"  => $output,
           
           'total_data'  => $total_row
          );

            // $data['table_header'] = $thead;
            // $data['result'] = $output;
    
            echo json_encode($data);
        }
    }

    

    

    public function busTrashed(Request $request)
    {

        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                
                $data = Bus::onlyTrashed()->where('name', 'like', '%'.$query.'%')
                ->where('academic_years_id', $academic_year_id )
                ->orderBy('id', 'desc')
                ->get();
              
            } 
            
            else {

                $data = Bus::onlyTrashed()->get();
            }

            $total_row = $data->count();
          
            if ($total_row > 0) {
             
                $x = 0;
                foreach ($data as $row) {
                $x = $x+1;

                    $output .= "
            <tr>
             <td>$x</td>
            
             <td>$row->name</td>
             <td>$row->fees</td>
             <td>$row->note</td>
             <td class='text-center'>
                
                <abbr title='Restore Student Information'><a onclick='return studentTrashed()' href='bus/restore/$row->id'  ><i class='fas fa-recycle fa-2x  pt-2 i text-success font-weight-bold ml-1' ></i></a></abbr>
             </td>
            </tr>
            ";
                }
                
            }
            
            
            else {
                $output ='
                            <tr>
                                <td align="center" colspan="8" class="text-danger font-weight-bold"><i class="fas fa-exclamation-triangle fa-2x pt-2"></i> لاتوجد نتائج </td>
                            </tr>
                            ';
            }

     

            $data['table_data'] = $output;
    
            echo json_encode($data);
        }
    }



    public function bus_payment_edit_search(Request $request)
    {



        $query = (string)$request->get('query');



        if ($request->ajax()) {
            if ($query != '') {
                $data = DB::table('bus_payments')
             ->where('id', 'like', '%'.$query.'%')
             ->orwhere('reg_no', $query)
             ->whereNull('deleted_at')
             ->get();
            } else {
         
            }

         
            $output = '';
            if (count($data)>0) {
               
                $thead = "
                        <tr>
                            <th>رقم الإيصال</th>
                            <th>التاريخ</th>
                            <th>الرقم الأكاديمي</th>
                            <th>الطالب</th>
                            <th>المبلغ</th>
                            <th>ملاحظات</th>
                            <th class='text-center'>العمليات</th>
                        </tr>
                        ";
                foreach ($data as $row) {

                        // ========== FUNCTION FOR RETURN THE STUDENT INFORMATION ==============.

                        $student_info = DB::Table('students')->select('name', 'reg_no')->where('reg_no', $row->reg_no)->where('deleted_at', NULL)->get('name');
                        foreach ($student_info as $name) {
                            $student_name = $name->name;
                            $reg_no = $name->reg_no;

                            if ($name->name = NULL) {
                                $student_name = 'هذا الطالب تم حذفة !! راجع سلة المهملات !';
                            }
                          
                        }
                        // ========== END FUNCTION FOR RETURN THE STUDENT INFORMATION ============ 

                        // NOTE FOR FEE IF EMPTY

                        if ($row->fees_note = 'NULL')
                        {
                            $fees_note = 'لاتوجد ملاحظات';
                        }
                        
                        else {
                            $fees_note = $row->fees_note;
                        }
            
                        $date = $row->created_at;
                
                    $output .= "
            <tr>
             <td>00B$row->id</td>
             <td>$date</td>
             <td>$reg_no</td>
             <td>$student_name</td>
             <td>$row->paid</td>
             <td>$fees_note</td>
             <td class='text-center'>
                <a href='bus_payment/reprint/$row->id' onclick='' class='btn btn-primary text-white' ><i class=' fas fa-print ml-1' ></i>طباعة</a>
                <a href='bus_payment/edit/$row->id' onclick='return edit()' class='btn btn-success text-white mr-2' ><i class=' fas fa-edit ml-2' ></i>تعديل</a>
                <a href='bus_payment/delete/$row->id' onclick='return del()' class='btn btn-danger text-white' ><i class=' fas fa-trash-alt ml-1' ></i>مسح</a>
             </td>
            </tr>
            ";
                }
            } 
            
          
            else{
                foreach ($data as $row)
                {
                    if($row->isEmpty){
                        $output.='
                        <td align="center" colspan="5" class="text-danger font-weight-bold"><i class="fas fa-exclamation-triangle fa-2x"> لاتوجد نتائج </i></td>
                       
                       ';
                    }
                }
               
            }

            //   $data = array(
            //    "table_data"  => "$output"
           
            //    //'total_data'  => $total_row
            //   );

            $data['table_header'] = $thead;
            $data['result'] = $output;

    
            echo json_encode($data);
        }
    }






    


    public function teacher(Request $request)
    {
        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('teachers')
                                            ->where('name', 'like', '%'.$query.'%')
                                            ->where('academic_years_id', $academic_year_id)
                                            ->whereNull('deleted_at')
                                            ->orderBy('id', 'DESC')
                                            ->get();
                                            

            } else {
                $data =  DB::table('teachers')->whereNull('deleted_at')
                 ->where('academic_years_id', $academic_year_id)
                 ->orderBy('id', 'DESC')
                 ->get();

                
            }

            $total_row = $data->count();
           
            if ($total_row > 0) {
                $x=0;

             
                foreach ($data as $row) {
                    $x++;

                    

                    // VERFIY TEACHER NOTE 

                        if ($row->teacher_note == NULL){
                            $note = "<span class='font-weight-bold text-danger'>لاتوجد</span>";
                        }
                        else {
                            $note = $row->teacher_note;
                        }

                    //# VERFIY TEACHER NOTE 


                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->name</td>
             <td>$row->phone</td>
             <td>$row->salary</td>
             <td>$row->address</td>
             <td>$note</td>
            
   
    
          
             <td class='text-center'>
                <abbr title='Show Teacher Information'><a  href='teacher/show/$row->id'><i class='fas fa-address-card fa-2x pt-2  text-success'></i></a></abbr>
                <abbr title='Edit Teacher Information'><a  onclick='return edit()' href='teacher/edit/$row->id'><i class='far fa-edit fa-2x pt-2 text-primary'></i></a></abbr>
                <abbr title='Delete Teacher Information'><a  onclick='return del()' href='teacher/delete/$row->id'><i class='fas fa-trash-alt fa-2x pt-2  text-danger'></i></a></abbr>
                
             </td>
            </tr>
            ";
                }
            } else {
                $output ='
           <tr>
                <td align="center"  class="text-danger font-weight-bold" colspan="7"><i class="fas fa-exclamation-triangle fa-1x text-danger"></i>  لاتوجد نتائج </td>
           </tr>
           ';
            }

            $data = array(
           "table_data"  => $output,
            'total_data'  => $total_row
            // 'links'  => $links
          );

            // $data['table_header'] = $thead;
            // $data['result'] = $output;
    
            echo json_encode($data);
        }
    }






    public function teacherTrashed(Request $request)
    {
        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data =  Teachers::onlyTrashed()->where('name', 'like', '%'.$query.'%')
                                                ->where('academic_years_id', $academic_year_id )
                                                ->whereNull('deleted_at')
                                                ->orderBy('id', 'desc')
                                                ->get();
            } else {

                $data = Teachers::onlyTrashed()->get();

            
            }

            $total_row = $data->count();
          
            if ($total_row > 0) {
                $x=0;
                foreach ($data as $row) {

                    // VERFIY TEACHER NOTE 

                        if ($row->teacher_note == NULL){
                            $note = "<span class='font-weight-bold text-danger'>لاتوجد</span>";
                        }
                        else {
                            $note = $row->teacher_note;
                        }

                    //# VERFIY TEACHER NOTE 
                
                    $x++;
                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->name</td>
             <td>$row->phone</td>
             <td>$row->email</td>
             <td>$row->address</td>
             <td>$note</td>
          
             <td class='text-center'>

             <abbr title='Restore Teacher Information'><a onclick='return teacherTrashed()' href='teacher/restore/$row->id'><i class='fas fa-recycle fa-2x  pt-2 i text-success font-weight-bold ml-1' ></i></a></abbr>

             </td>
            </tr>
            ";
                }
            } else {
                $output ='
           <tr>
                <td align="center"  class="text-danger font-weight-bold" colspan="7"><i class="fas fa-exclamation-triangle fa-1x text-danger"></i>  لاتوجد نتائج </td>
           </tr>
           ';
            }

            $data = array(
           "table_data"  => $output,
           
           'total_data'  => $total_row
          );

            // $data['table_header'] = $thead;
            // $data['result'] = $output;
    
            echo json_encode($data);
        }
    }

   
    public function teacher_salary(Request $request)
    {
        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('teachers')
                                            ->where('name', 'like', '%'.$query.'%')
                                            ->where('academic_years_id', $academic_year_id)
                                            ->whereNull('deleted_at')
                                            ->orderBy('id', 'DESC')
                                            ->get();
                                            

            } else {
                $data =  DB::table('teachers')->whereNull('deleted_at')
                 ->where('academic_years_id', $academic_year_id)
                 ->orderBy('id', 'DESC')
                 ->get();

                
            }

            $total_row = $data->count();
           
            if ($total_row > 0) {
                $x=0;

             
                foreach ($data as $row) {
                    $x++;

                    

                    // VERFIY TEACHER NOTE 

                        if ($row->teacher_note == NULL){
                            $note = "<span class='font-weight-bold text-danger'>لاتوجد</span>";
                        }
                        else {
                            $note = $row->teacher_note;
                        }

                    //# VERFIY TEACHER NOTE 


                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->name</td>
             <td>$row->phone</td>
             <td>$row->salary</td>
             <td>$row->address</td>
             <td>$note</td>
            
   
    
          
             <td class='text-center'>
                <abbr title='Show Teacher Information'><a  href='teacher_debt_create/$row->id' class='btn btn-success btn-sm'> سلفية </a></abbr>
                <abbr title='Show Teacher Information'><a  href='teacher_salary_create/$row->id' class='btn btn-primary btn-sm'> صرف </a></abbr>
             </td>
            </tr>
            ";
                }
            } else {
                $output ='
           <tr>
                <td align="center"  class="text-danger font-weight-bold" colspan="7"><i class="fas fa-exclamation-triangle fa-1x text-danger"></i>  لاتوجد نتائج </td>
           </tr>
           ';
            }

            $data = array(
           "table_data"  => $output,
            'total_data'  => $total_row
            // 'links'  => $links
          );

            // $data['table_header'] = $thead;
            // $data['result'] = $output;
    
            echo json_encode($data);
        }
    }       


    public function employee(Request $request)
    {
        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('employees')
                                            ->where('name', 'like', '%'.$query.'%')
                                            ->where('academic_years_id', $academic_year_id)
                                            ->whereNull('deleted_at')
                                            ->orderBy('id', 'DESC')
                                            ->get();
                                            

            } else {
                $data =  DB::table('employees')->whereNull('deleted_at')
                 ->where('academic_years_id', $academic_year_id)
                 ->orderBy('id', 'DESC')
                 ->get();

                
            }

            $total_row = $data->count();
           
            if ($total_row > 0) {
                $x=0;

             
                foreach ($data as $row) {
                    $x++;

                    

                    // VERFIY Employee  

                        if ($row->note == NULL){
                            $note = "<span class='font-weight-bold text-danger'>لاتوجد</span>";
                        }
                        else {
                            $note = $row->note;
                        }

                    //# VERFIY TEACHER  


                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->name</td>
             <td>$row->phone</td>
             <td>$row->salary</td>
             <td>$row->address</td>
             <td>$note</td>
            
   
    
          
             <td class='text-center'>
                <abbr title='Show Employee Information'><a  href='employee/show/$row->id'><i class='fas fa-address-card fa-2x pt-2  text-success'></i></a></abbr>
                <abbr title='Edit Employee Information'><a  onclick='return edit()' href='employee/edit/$row->id'><i class='far fa-edit fa-2x pt-2 text-primary'></i></a></abbr>
                <abbr title='Delete Employee Information'><a  onclick='return del()' href='employee/delete/$row->id'><i class='fas fa-trash-alt fa-2x pt-2  text-danger'></i></a></abbr>
                
             </td>
            </tr>
            ";
                }
            } else {
                $output ='
           <tr>
                <td align="center"  class="text-danger font-weight-bold" colspan="7"><i class="fas fa-exclamation-triangle fa-1x text-danger"></i>  لاتوجد نتائج </td>
           </tr>
           ';
            }

            $data = array(
           "table_data"  => $output,
            'total_data'  => $total_row
            // 'links'  => $links
          );

            // $data['table_header'] = $thead;
            // $data['result'] = $output;
    
            echo json_encode($data);
        }
    }






    public function employeeTrashed(Request $request)
    {
        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data =  Employees::onlyTrashed()->where('name', 'like', '%'.$query.'%')
                                                ->where('academic_years_id', $academic_year_id )
                                                ->whereNull('deleted_at')
                                                ->orderBy('id', 'desc')
                                                ->get();
            } else {

                $data = Employees::onlyTrashed()->get();

            
            }

            $total_row = $data->count();
          
            if ($total_row > 0) {
                $x=0;
                foreach ($data as $row) {

                    // VERFIY EMPLOYEE NOTE 

                        if ($row->note == NULL){
                            $note = "<span class='font-weight-bold text-danger'>لاتوجد</span>";
                        }
                        else {
                            $note = $row->note;
                        }

                    //# VERFIY EMPLOYEE NOTE 
                
                    $x++;
                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->name</td>
             <td>$row->phone</td>
             <td>$row->salary</td>
             <td>$row->address</td>
             <td>$note</td>
          
             <td class='text-center'>

             <abbr title='Restore Employee Information'><a onclick='return employeeTrashed()' href='employee/restore/$row->id'><i class='fas fa-recycle fa-2x  pt-2 i text-success font-weight-bold ml-1' ></i></a></abbr>

             </td>
            </tr>
            ";
                }
            } else {
                $output ='
           <tr>
                <td align="center"  class="text-danger font-weight-bold" colspan="7"><i class="fas fa-exclamation-triangle fa-1x text-danger"></i>  لاتوجد نتائج </td>
           </tr>
           ';
            }

            $data = array(
           "table_data"  => $output,
           
           'total_data'  => $total_row
          );

            // $data['table_header'] = $thead;
            // $data['result'] = $output;
    
            echo json_encode($data);
        }
    }



    public function employee_salary(Request $request)
    {
        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('employees')
                                            ->where('name', 'like', '%'.$query.'%')
                                            ->where('academic_years_id', $academic_year_id)
                                            ->whereNull('deleted_at')
                                            ->orderBy('id', 'DESC')
                                            ->get();
                                            

            } else {
                $data =  DB::table('employees')->whereNull('deleted_at')
                 ->where('academic_years_id', $academic_year_id)
                 ->orderBy('id', 'DESC')
                 ->get();

                
            }

            $total_row = $data->count();
           
            if ($total_row > 0) {
                $x=0;

             
                foreach ($data as $row) {
                    $x++;

                    

                    // VERFIY Employee  

                        if ($row->note == NULL){
                            $note = "<span class='font-weight-bold text-danger'>لاتوجد</span>";
                        }
                        else {
                            $note = $row->note;
                        }

                    //# VERFIY TEACHER  


                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->name</td>
             <td>$row->phone</td>
             <td>$row->salary</td>
             <td>$row->address</td>
             <td>$note</td>
            
   
    
          
            <td class='text-center'>
             <abbr title='Show Teacher Information'><a  href='employee_debt_create/$row->id' class='btn btn-success btn-sm'> سلفية </a></abbr>
             <abbr title='Show Teacher Information'><a  href='employee_salary_create/$row->id' class='btn btn-primary btn-sm'> صرف </a></abbr>
            </td>
            </tr>
            ";
                }
            } else {
                $output ='
           <tr>
                <td align="center"  class="text-danger font-weight-bold" colspan="7"><i class="fas fa-exclamation-triangle fa-1x text-danger"></i>  لاتوجد نتائج </td>
           </tr>
           ';
            }

            $data = array(
           "table_data"  => $output,
            'total_data'  => $total_row
            // 'links'  => $links
          );

            // $data['table_header'] = $thead;
            // $data['result'] = $output;
    
            echo json_encode($data);
        }
    }






    public function subject(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('subjects')
             ->where('name', 'like', '%'.$query.'%')
             ->whereNull('deleted_at')
             ->orderBy('id', 'ASC')
             ->get();
            } else {
                $data = DB::table('subjects')
                 ->whereNull('deleted_at')
                 ->orderBy('id', 'ASC')
                 ->get();
            }

            $total_row = $data->count();
          
            if ($total_row > 0) {
                $x=0;
                foreach ($data as $row) {
                    $x++;


                    if ($row->class_id == '') {
                        $c_nam = 'لم يحدد الفصل الدراسي أو تم مسحه ';
                    }
            

                    if ($row->teacher_id == '') {
                        $t_name = 'لم يحدد  المدرس أو تم مسحه ';
                    }

                    if ($row->class_id != '') {
                        $class_name = DB::Table('school_classes')->select('name')->where('id', $row->class_id)->where('deleted_at', NULL)->get('name');
                        foreach ($class_name as $name) {
                            $c_nam = $name->name;
                        }

                        if ($c_nam == 'NULL') {
                            $c_nam = ' لم يحدد الفصل الدراسي أو تم مسحه ';
                        }
                    }


                    if ($row->teacher_id != '') {
                        $teacher_name = DB::Table('teachers')->select('name')->where('id', $row->teacher_id)->get('name');
                        foreach ($teacher_name as $name) {
                            $t_name = $name->name;
                        }

                        if ($t_name == 'NULL') {
                            $t_name = 'لم يحدد  المدرس أو تم مسحه ';
                        }
                    }
           

                    $output .= "
                        <tr>
                        <td>$x</td>
                        <td>$row->name</td>
                        <td>$c_nam</td>
                        <td>$t_name</td>
                      
                        <td class='text-center'>
                            <a onclick='return edit()' href='subject/edit/$row->id'><i class='far fa-edit fa-2x pt-2 ml-1 text-primary'></i></a>
                            <a onclick='return del()'href='subject/delete/$row->id'><i class='fas fa-trash-alt fa-2x pt-2 i text-danger ml-1' ></i></a>
                        </td>
                        </tr>
                ";
                }
            } else {
                $output ='
           <tr>
                <td align="center"  class="text-danger font-weight-bold" colspan="5"><i class="fas fa-exclamation-triangle fa-1x text-danger"></i>  لاتوجد نتائج </td>
           </tr>
           ';
            }

            $data = array(
           "table_data"  => $output,
           
           'total_data'  => $total_row
          );

            // $data['table_header'] = $thead;
            // $data['result'] = $output;
    
            echo json_encode($data);
        }
    }



        

    public function subject_trashed(Request $request)
    {
        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data =  Subjects::onlyTrashed()->where('name', 'like', '%'.$query.'%')
                                                ->where('academic_years_id', $academic_year_id )
                                              
                                                ->orderBy('id', 'desc')
                                                ->get();
            } else {

                $data = Subjects::onlyTrashed()->get();

            
            }

            $total_row = $data->count();
          
            if ($total_row > 0) {
                $x=0;
                foreach ($data as $row) {

                    // VERFIY TEACHER NOTE 

                        if ($row->class_note == NULL){
                            $note = "<span class='font-weight-bold text-danger'>لاتوجد</span>";
                        }
                        else {
                            $note = $row->class_note;
                        }

                    //# VERFIY TEACHER NOTE 
                
                    $x++;
                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->name</td>
             <td>$row->capacity</td>
             <td>$note</td>
          
             <td class='text-center font-weight-bold bg-white'>

             <abbr title='Restore subject Information'><a onclick='return subjectTrashed()' href='subject/restore/$row->id'><i class='fas fa-recycle fa-2x  pt-2 i text-success font-weight-bold ml-1' ></i></a></abbr>

             </td>
            </tr>
            ";
                }
            } else {
                $output ='
           <tr>
                <td align="center"  class="text-danger font-weight-bold" colspan="7"><i class="fas fa-exclamation-triangle fa-1x text-danger"></i>  لاتوجد نتائج </td>
           </tr>
           ';
            }

            $data = array(
           "table_data"  => $output,
           
           'total_data'  => $total_row
          );

            // $data['table_header'] = $thead;
            // $data['result'] = $output;
    
            echo json_encode($data);
        }
    }




    public function calender(Request $request)
    {

        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }

        
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');

            if ($query != '') {
                $data = DB::table('calenders')
             ->where('event', 'like', '%'.$query.'%')
             ->orWhere('start_date', 'like', '%'.$query.'%')
             ->where('academic_years_id', $academic_year_id )
             ->whereNull('deleted_at')
             ->orderBy('start_date', 'ASC')
             ->get();
            } else {
                $data = DB::table('calenders')
                 ->whereNull('deleted_at')
                 ->where('academic_years_id', $academic_year_id)
                 ->orderBy('start_date', 'ASC')
                 ->get();
            }


            $total_row = $data->count();

            if ($total_row > 0) {
                $x=0;
                foreach ($data as $row) {
                    $x++;

                    $output .= "
                    <tr>
                     <td>$x</td>
                     <td>$row->event</td>
                     <td>$row->start_date</td>
                     <td>$row->end_date</td>
                     <td>$row->event_note</td>
                  
                     <td class='text-center'>
                        <a onclick='return edit()' href='calender/edit/$row->id'><i class='far fa-edit fa-1x ml-1 text-primary'></i></a>
                        <a onclick='return del()' href='calender/delete/$row->id'><i class='fas fa-trash-alt fa-1x i text-danger ml-1' ></i></a>
                     </td>
                    </tr>
                    ";

                }
            } else {
                $output ='
              <tr>
                   <td align="center"  class="text-danger font-weight-bold" colspan="7"><i class="fas fa-exclamation-triangle fa-1x text-danger"></i>  لاتوجد نتائج </td>
              </tr>
              ';
            }
            $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }



    function exams(Request $request)
    {

    $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
    
    foreach($academic_year_info as $info){
        $academic_year_id = $info->id;
        $academic_year_info = $info->name;
    }


   

     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if ($query != '') {
        $data = DB::table('exams')
        ->where('name', 'like', '%'.$query.'%')
        ->orWhere('start_date', 'like', '%'.$query.'%')
        ->where('academic_years_id', $academic_year_id )
        ->whereNull('deleted_at')
        ->orderBy('id', 'ASC')
        ->get();
      }

      else
      {
        $data = DB::table('exams')
        ->whereNull('deleted_at')
        ->where('academic_years_id', '=',$academic_year_id)
        ->orderBy('id', 'ASC')
        ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
        $x=0;
       foreach($data as $row)
       {

        $x++;
                    
        /* =========== Dynamic function for return the class name ===============*/

            $class_name = DB::Table('school_classes')->select('name')->where('id', $row->class_id)->where('deleted_at', NULL)->get('name');
                            
            if ($class_name->isEmpty()) {
                $c_nam = "<span class='font-weight-bold text-danger'> <i class='fas fa-exclamation-triangle fa-2x pt-2'></i> تم مسح الفصل </span>";
            }

            else{
                foreach ($class_name as $name) {
                    $c_nam = $name->name;
                }
            }
            

        /* =========== Dynamic function for return the class name ===============*/

        /*============ Academic year ===================*/

            $ac_year_name = AcademicYear::find($academic_year_id);

        /*============ End Academic year ===================*/

         $output .= "
                    <tr>
                    <td>$x</td>
                    <td>$row->name</td>
                    <td>$ac_year_name->name</td>
                    <td>$c_nam</td>
                    <td>$row->total_grade</td>
                    <td>$row->start_date</td>
                    <td>$row->end_date</td>
                    <td>$row->exam_note</td>
                    <td class='text-center'>
                    <a onclick='return edit()' href='exam/edit/$row->id'><i class='far fa-edit fa-1x ml-1 text-primary'></i></a>
                    <a onclick='return del()' href='exam/delete/$row->id'><i class='fas fa-trash-alt fa-1x i text-danger ml-1' ></i></a>
                    </td>
                    ";
       }
      }
      else
      {
        $output ='
        <tr>
            <td align="center"  class="text-danger font-weight-bold" colspan="9"><i class="fas fa-exclamation-triangle fa-1x text-danger"></i>  لاتوجد نتائج </td>
        </tr>
        ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }


    public function std_add_grades(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('students')
             ->where('name', 'like', '%'.$query.'%')
             ->whereNull('deleted_at')
             ->orderBy('id', 'desc')
             ->get();
            } else {
                //    $data = DB::table('students')
            //      ->orderBy('id', 'desc')
            //      ->get();
            }

            $total_row = $data->count();
          
            if ($total_row > 0) {
                $output = '';
       
                $thead = "
            <tr>
                <th>#</th>
                <th>إسم الطالب</th>
                <th>اسم الوالد</th>
                <th>رقم الهاتف</th>
                <th>الفصل الدراسي</th>
                <th>العنوان</th>
                <th class='text-center'>العمليات</th>
            </tr>
            ";
                $x=0;
                foreach ($data as $row) {
                    $x++;

                    // $data2 = DB::table('school_classes')
                    // ->where('id', '=', $row->class_id)
                    // ->get('name');

                    if ($row->class_id == '') {
                        $c_nam = 'لم يحدد الفصل الدراسي أو تم مسحه ';
                    }
            

                    if ($row->class_id != '') {

                        $class_name = DB::Table('school_classes')->select('name')->where('deleted_at', NULL)->where('id', $row->class_id)->get('name');
                        foreach ($class_name as $name) {
                            $c_nam = $name->name;
                        }

                        if ($c_nam == 'NULL') {
                            $c_nam = ' !! لم يحدد الفصل الدراسي أو تم مسحه ';
                        }
                    }
           
            

                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->name</td>
             <td>$row->fa_name</td>
             <td>$row->fa_phone</td>
             <td>$c_nam</td>
             <td>$row->address</td>
             <td class='text-center'>
                <a onclick='return edit()' href='student/edit/$row->id'><i class='far fa-edit fa-1x ml-1 text-primary'></i></a>
                <a href='/student/show/$row->id'><i class=' fas fa-address-card fa-1x ml-1 text-success' ></i></a>
                <a onclick='return del()' href='student/delete/$row->id'><i class='fas fa-trash-alt fa-1x i text-danger ml-1' ></i></a>
             </td>
            </tr>
            ";
                }
            } else {
                $output ='
           <tr>
            <td align="center" colspan="5" class="text-danger font-weight-bold"><i class="fas fa-exclamation-triangle fa-2x"> لاتوجد نتائج </i></td>
           </tr>
           ';
            }

            //   $data = array(
            //    "table_data"  => "$output"
           
            //    //'total_data'  => $total_row
            //   );

            $data['table_header'] = $thead;
            $data['result'] = $output;
    
            echo json_encode($data);
        }
    }




    function income(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data = DB::table('income_types')
        ->where('name', 'like', '%'.$query.'%')
        ->whereNull('deleted_at')
        ->orderBy('id', 'ASC')
        ->get();
      }
      else
      {
        $data = DB::table('income_types')
        ->whereNull('deleted_at')
        ->orderBy('id', 'ASC')
        ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
        $x=0;
       foreach($data as $row)
       {

        $x++;
                    
        /* =========== Dynamic function for return the class name ===============*/

        if ($row->class_id == '') {
            $c_nam = 'لم يحدد الفصل الدراسي أو تم مسحه ';
        }


        if ($row->class_id != '') {
            $class_name = DB::Table('school_classes')->select('name')->where('id', $row->class_id)->where('deleted_at', NULL)->get('name');
            foreach ($class_name as $name) {
                $c_nam = $name->name;
            }

            if ($c_nam == 'NULL') {
                $c_nam = ' !! لم يحدد الفصل الدراسي أو تم مسحه ';
            }
        }




        /* =========== Dynamic function for return the class name ===============*/

         $output .= "
                    <tr>
                    <td>$x</td>
                    <td>$row->name</td>
                    <td>$row->amount</td>
                    <td>$c_nam</td>
                    <td>$row->income_note</td>
                    <td class='text-center'>
                    <a onclick='return edit()' href='income/edit/$row->id'><i class='far fa-edit fa-1x ml-1 text-primary'></i></a>
                    <a onclick='return del()'  href='income/delete/$row->id'><i class='fas fa-trash-alt fa-1x i text-danger ml-1' ></i></a>
                    </td>
                    ";
       }
      }
      else
      {
        $output ='
        <tr>
             <td align="center"  class="text-danger font-weight-bold" colspan="9"><i class="fas fa-exclamation-triangle fa-1x text-danger"></i>  لاتوجد نتائج </td>
        </tr>
        ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }



    function fees_type(Request $request)
    {
        $academic_year  = DB::table('academic_years')->select('name', 'id')->where('status', '=', '1')->get();

        if ($academic_year->isEmpty()) {
            $academic_year_info = AcademicYear::all();
            return redirect('academic_year')->with('academic_year_info', $academic_year_info)
                                                    ->with('error', 'قم بتشغل عام دراسي معين !!');
            ;
        } else {
            foreach ($academic_year as $academic_year_id) {
                $academic_year_id = $academic_year_id->id;
            }
       

            if ($request->ajax()) {
                $output = '';
                $query = $request->get('query');
                if ($query != '') {
                    $data = DB::table('fees_types')
                    ->where('name', 'like', '%'.$query.'%')
                    ->where('academic_years_id', $academic_year_id)
                    ->whereNull('deleted_at')
                    ->orderBy('id', 'ASC')
                    ->get();
                } else {
                    $data = DB::table('fees_types')
                    ->whereNull('deleted_at')
                    ->where('academic_years_id', $academic_year_id)
                    ->orderBy('id', 'ASC')
                    ->get();
                }
                $total_row = $data->count();
                if ($total_row > 0) {
                    $x=0;
                    foreach ($data as $row) {
                        $x++;
                    
                        /* =========== Dynamic function for return the class name ===============*/

                        if ($row->class_id == '') {
                            $c_nam = 'لم يحدد الفصل الدراسي أو تم مسحه ';
                        }


                        if ($row->class_id != '') {
                            $class_name = DB::Table('school_classes')->select('name')->where('id', $row->class_id)->where('deleted_at', null)->get('name');
                            foreach ($class_name as $name) {
                                $c_nam = $name->name;
                            }

                            if ($c_nam == 'NULL') {
                                $c_nam = ' !! لم يحدد الفصل الدراسي أو تم مسحه ';
                            }
                        }




                        /* =========== Dynamic function for return the class name ===============*/

                        $output .= "
                            <tr>
                            <td>$x</td>
                            <td>$row->name</td>
                            <td>$row->amount</td>
                            <td>$row->date</td>
                            <td>$c_nam</td>
                            <td>$row->fees_note</td>
                            <td class='text-center'>
                            <a onclick='return edit()' href='fees_type/edit/$row->id'><i class='far fa-edit fa-1x ml-1 text-primary'></i></a>
                            <a onclick='return del()' href='fees_type/delete/$row->id'><i class='fas fa-trash-alt fa-1x i text-danger ml-1' ></i></a>
                            </td>
                    ";
                    }
                } else {
                    $output ='
                    <tr>
                        <td align="center"  class="text-danger font-weight-bold" colspan="9"><i class="fas fa-exclamation-triangle fa-1x text-danger"></i>  لاتوجد نتائج </td>
                    </tr>
                    ';
                            }
                $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

                echo json_encode($data); 
            }
        }
    }

    public function fees_panel(Request $request)
    {

        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


       
             if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('students')
             ->where('name', 'like', '%'.$query.'%')
             ->where('academic_years_id', $academic_year_id )
             ->whereNull('deleted_at')
             ->orderBy('id', 'desc')
             ->get();
            } else {
                //    $data = DB::table('students')
            //      ->orderBy('id', 'desc')
            //      ->get();
            }

            $total_row = $data->count();
          
            if ($total_row > 0) {
                $output = '';
       
                $thead = "
            <tr>
                <th>#</th>
                <th> الرقم الأكاديمي</th>
                <th>إسم الطالب</th>
                <th>الفصل الدراسي</th>
                <th class='text-center'>العمليات</th>
            </tr>
            ";
                $x=0;
                foreach ($data as $row) {
                    $x++;

                    // $data2 = DB::table('school_classes')
                    // ->where('id', '=', $row->class_id)
                    // ->get('name');

                    if ($row->class_id == '') {
                        $c_nam = 'لم يحدد الفصل الدراسي أو تم مسحه ';
                    }
            

                    if ($row->class_id != '') {
                        
                        $class_name = DB::select("select * from school_classes where id = $row->class_id ");
                        foreach ($class_name as $name) {


                            if ($name->deleted_at != NUll)
                            {
                                $c_name = "<td class='font-weight-bold text-danger'> لم يحدد الفصل الدراسي أو تم مسحه !!</td>";
                                $button = "<td class='text-center'><h5><a href='#' class='btn btn-danger text-white' ><i class=' fas fa-ban ml-1' ></i>حدد الفصل أولا</a></h5></td>";
                            }

                            else{
                                if($row->class_id = $name->id){
                                    $c_nam = $name->name;
                                    $c_name = "<td class='text-dark'> $c_nam </td>";
                                    $button = "<td class='text-center'><h5><a href='fees_panel/show/$row->id' class='btn btn-primary text-white' ><i class=' fas fa-dollar-sign ml-1' ></i>إستلام دفعية</a></h5></td>";
    
                                }
                            }
                          
                    }

                    }
           
            

                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->reg_no</td>
             <td>$row->name</td>
              $c_name
              $button
            </tr>
            ";
                }
            } else {
                $output ='
            <tr>
                <td align="center" colspan="5" class="text-danger font-weight-bold"><i class="fas fa-exclamation-triangle fa-2x"> لاتوجد نتائج </i></td>
            </tr>
           ';
            }

            //   $data = array(
            //    "table_data"  => "$output"
           
            //    //'total_data'  => $total_row
            //   );

            $data['table_header'] = $thead;
            $data['result'] = $output;
    
            echo json_encode($data);
        }
    }




    public function bus_panel(Request $request)
    {

        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


       
             if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                $data = DB::table('students')
             ->where('name', 'like', '%'.$query.'%')
             ->where('academic_years_id', $academic_year_id )
             ->whereNULL('deleted_at')
             ->orderBy('id', 'desc')
             ->get();
            } else {
                //    $data = DB::table('students')
            //      ->orderBy('id', 'desc')
            //      ->get();
            }

            $total_row = $data->count();
          
            if ($total_row > 0) {
                $output = '';
       
                $thead = "
            <tr>
                <th>#</th>
                <th>إسم الطالب</th>
                <th> الرقم الاكاديمي</th>
                <th>رقم الهاتف</th>
                <th>الفصل الدراسي</th>
                <th>العنوان</th>
                <th class='text-center'>العمليات</th>
            </tr>
            ";
                $x=0;
                foreach ($data as $row) {
                    $x++;

                    // $data2 = DB::table('school_classes')
                    // ->where('id', '=', $row->class_id)
                    // ->get('name');

                    if ($row->class_id == '') {
                        $c_nam = 'لم يحدد الفصل الدراسي أو تم مسحه ';
                    }
            

                    if ($row->class_id != '') {
                        
                        $class_name = DB::select("select * from school_classes where id = $row->class_id ");
                        foreach ($class_name as $name) {


                            if ($name->deleted_at != NUll)
                            {
                                $c_name = "<td class='font-weight-bold text-danger'> لم يحدد الفصل الدراسي أو تم مسحه !!</td>";
                                $button = "<td class='text-center'><h5><a href='#' class='btn btn-danger text-white' ><i class=' fas fa-ban ml-1' ></i>حدد الفصل أولا</a></h5></td>";
                            }

                            else{
                                if($row->class_id = $name->id){
                                    $c_nam = $name->name;
                                    $c_name = "<td class='text-dark'> $c_nam </td>";
                                    $button = "<td class='text-center'><h5><a href='bus_panel/show/$row->id' class='btn btn-primary text-white' ><i class=' fas fa-dollar-sign ml-1' ></i>إستلام رسوم</a></h5></td>";
    
                                }
                            }
                          
                    }

                    }
           
            

                    $output .= "
            <tr>
             <td>$x</td>
             <td>$row->name</td>
             <td>$row->reg_no</td>
             <td>$row->fa_phone</td>
              $c_name
             <td>$row->address</td>
              $button
            </tr>
            ";
                }
            } else {
                $output ='
           <tr>
            <td align="center" colspan="5" class="text-danger font-weight-bold"><i class="fas fa-exclamation-triangle fa-2x"> لاتوجد نتائج </i></td>
           </tr>
           ';
            }

            //   $data = array(
            //    "table_data"  => "$output"
           
            //    //'total_data'  => $total_row
            //   );

            $data['table_header'] = $thead;
            $data['result'] = $output;
    
            echo json_encode($data);
        }
    }





    public function student_report_search(Request $request)
    {
        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }


        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
            $data = DB::table('students')
                        ->where('name', 'like', '%'.$query.'%')
                        ->where('academic_years_id', '=', $academic_year_id)
                        ->orWhere('reg_no', 'like', '%'.$query.'%')
                        ->whereNull('deleted_at')
                        ->orderBy('id', 'desc')
                        ->get();
            } else {
                //    $data = DB::table('students')
            //      ->orderBy('id', 'desc')
            //      ->get();
            }

            $total_row = $data->count();
            $output = '';

            if ($total_row > 0) {
                
                $output = '';
                $thead = "
            <tr>
                <th>الرقم الأكاديمي</th>
                <th>العام الدراسي</th>
                <th>إسم الطالب</th>
                <th>اسم الوالد</th>
                <th>رقم الهاتف</th>
                <th>الفصل الدراسي</th>
                <th>العنوان</th>
                <th class='text-center'>العمليات</th>
            </tr>
            ";
            
                foreach ($data as $row) {
                    
                    if ($row->class_id != '') {
                        
                        $class_name = DB::select("select * from school_classes where id = $row->class_id AND deleted_at IS NULL");
                        foreach ($class_name as $name) {

                            if($row->class_id = $name->id){
                                $c_nam = $name->name;
                                $c_name = "<td class='text-dark'> $c_nam </td>";
                                $button = "<td class='text-center'><h5><a href='fees_report_print/$row->id' class='btn btn-primary text-white' ><i class=' fas fa-dollar-sign ml-1' ></i>عرض التقرير</a></h5></td>";

                            }
                        }

                        if($row->class_id != $name->id){
                            $c_name = "<td class='font-weight-bold text-danger'> لم يحدد الفصل الدراسي أو تم مسحه !!</td>";
                            $button = "<td class='text-center'><h5><a href='#' class='btn btn-danger text-white' ><i class=' fas fa-ban ml-1' ></i>حدد الفصل أولا</a></h5></td>";
                            
                        }
                    }
           
            

                    $output .= "
            <tr>
             <td>$row->reg_no</td>
             <td>$academic_year_info</td>
             <td>$row->name</td>
             <td>$row->fa_name</td>
             <td>$row->fa_phone</td>
                 $c_name
             <td>$row->address</td>
                 $button
            </tr>
            ";
                }
            } 
            else {
                $output .='
                    <tr>
                        <td align="center" colspan="5" class="text-danger font-weight-bold"><i class="fas fa-exclamation-triangle fa-2x"> لاتوجد نتائج </i></td>
                    </tr>
           ';
            }

    
            $data['table_header'] = $thead;
            $data['result'] = $output;
    
            echo json_encode($data);
        }
    }


  


    public function fees_edit_search(Request $request)
    {

        $academic_year_info  = DB::table('academic_years')->select('name', 'id')->where('status','=', '1')->get();
        foreach($academic_year_info as $info){
            $academic_year_id = $info->id;
            $academic_year_info = $info->name;
        }

        if ($request->ajax()) {
            $query = (string)$request->get('query');
            if ($query != '') {
                $data = DB::table('fees')
             ->where('reg_no', 'like', '%'.$query.'%')
             ->whereNull('deleted_at')
             ->get();
            } else {
         
            }

         
            $output = '';
            if (count($data)>0) {
               
                $thead = "
                        <tr>
                            <th>الرقم</th>
                            <th>الطالب</th>
                            <th>رقم الإيصال</th>
                            <th>التاريخ</th>
                            <th>المبلغ</th>
                            <th>ملاحظات</th>
                            <th class='text-center'>العمليات</th>
                        </tr>
                        ";
                foreach ($data as $row) {

                        // ========== FUNCTION FOR RETURN THE STUDENT INFORMATION ==============.

                        $student_info = DB::Table('students')->select('name', 'reg_no')->where('reg_no', $row->reg_no)->where('deleted_at', NULL)->get('name');
                        foreach ($student_info as $name) {
                            $student_name = $name->name;
                            $reg_no = $name->reg_no;

                            if ($name->name = NULL) {
                                $student_name = 'هذا الطالب تم حذفة !! راجع سلة المهملات !';
                            }
                          
                        }
                        // ========== END FUNCTION FOR RETURN THE STUDENT INFORMATION ============ 

                        // NOTE FOR FEE IF EMPTY

                        if ($row->fees_note = 'NULL')
                        {
                            $fees_note = 'لاتوجد ملاحظات';
                        }
                        
                        else {
                            $fees_note = $row->fees_note;
                        }
                    
           
            

                    $output .= "
            <tr>
             <td>$reg_no</td>
             <td>$student_name</td>
             <td>$row->bill_no</td>
             <td>$row->date</td>
             <td>$row->paid</td>
             <td>$fees_note</td>
         
             <td class='text-center'>
                <a href='fees/reprint/$row->id' onclick='' class='btn btn-sm btn-primary text-white' ><i class=' fas fa-print' ></i></a>
                <a href='fees/edit/$row->id' onclick='return edit()' class='btn btn-sm btn-success text-white' ><i class=' fas fa-edit' ></i></a>
                <a href='fees/delete/$row->id' onclick='return del()' class='btn btn-sm btn-danger text-white' ><i class=' fas fa-trash-alt' ></i></a>
             </td>
            </tr>
            ";
                }
            } 
            
          
            else{
                foreach ($data as $row)
                {
                    if($row->isEmpty){
                        $output.='
                        <td align="center" colspan="5" class="text-danger font-weight-bold"><i class="fas fa-exclamation-triangle fa-2x"> لاتوجد نتائج </i></td>
                       
                       ';
                    }
                }
               
            }

            //   $data = array(
            //    "table_data"  => "$output"
           
            //    //'total_data'  => $total_row
            //   );

            $data['table_header'] = $thead;
            $data['result'] = $output;

    
            echo json_encode($data);
        }
    }




    
}




