<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function () {



    Route::get('/', function () {
        return view('home');
    });


 
    Route::get('update_user_information', 'Auth\RegisterController@show')->name('update_user_information');
    Route::post('update_user_info/{id}', 'Auth\RegisterController@update')->name('update_user_info');
    Route::post('store_user_info', 'Auth\RegisterController@store')->name('store_user_info');

    
Route::get('home', 'HomeController@index')->name('home');




    /*======= Dynamic Search Engine ========*/
    //Route::get('/dynamic_dependent', 'DynamicDependent@index');
    Route::post('dynamic_dependent/fetch', 'dynamicDependent@fetch')->name('dynamicdependent.fetch');
    Route::post('dynamic_dependent/fetch_exams', 'dynamicDependent@fetch_exams')->name('dynamicdependent.fetch_exams');
    Route::post('dynamic_dependent/fetch_fees_types', 'dynamicDependent@fetch_fees_types')->name('dynamicdependent.fetch_fees_types');
    Route::post('dynamic_dependent/fetch_bus_fees', 'dynamicDependent@fetch_bus_fees')->name('dynamicdependent.fetch_bus_fees');
    Route::post('dynamic_dependent/fetch_class_fees_types', 'dynamicDependent@fetch_class_fees_types')->name('dynamicdependent.fetch_class_fees_types');
    Route::post('dynamic_dependent/show_class_report_no_pay', 'dynamicDependent@show_class_report_no_pay')->name('dynamicdependent.show_class_report_no_pay');

    /*======= Dynamic Search Engine ========*/


/*=================================================================================================================================*/


/*==== Student operation Route ====*/
    Route::get('students', 'studnetsController@index')->name('students');
    Route::get('/student/create', 'studnetsController@create')->name('student/create');
    Route::post('/student/store', 'studnetsController@store')->name('student.store');
    Route::get('/student/show/{id}', 'studnetsController@show')->name('student.show');
    Route::get('/student/edit/{id}', 'studnetsController@edit')->name('student.edit');
    Route::post('/student/update/{id}', 'studnetsController@update')->name('student.update');
    Route::get('/student/delete/{id}', 'studnetsController@destroy')->name('student.destroy');
    Route::get('/studentTrashed', 'studnetsController@studentTrashed')->name('studentTrashed');
    Route::get('/restore_std/{id}', 'studnetsController@restore')->name('restore_std');

    /*==== Ajax Search ====*/
    Route::get('/searchpage', 'searchController@index');
    Route::get('/live_search/action', 'searchController@action')->name('live_search.action');
    Route::get('/live_search/studentTrashed', 'searchController@studentTrashed')->name('live_search.studentTrashed');
    /*==== End Ajax Search ====*/

    // ==== STUDENT REPORT ROUTE =====
    Route::get('/student_report', 'studentsReportController@index')->name('student_report');
    Route::post('/show_class_report_student_name', 'studentsReportController@show_class_report_student_name')->name('show_class_report_student_name');
    Route::post('/show_class_report_students_attend', 'studentsReportController@show_class_report_students_attend')->name('show_class_report_students_attend');
    //# === STUDENT REPORT ROUTE =====
    
/*==== End of Student operation Route ====*/





/*=================================================================================================================================*/

/*ٌ==== Route for teachers module ====*/
Route::get('/teachers', function (){
    return view('teachers.index');
});

Route::get('/teacher/show/{id}', 'teacherController@show')->name('teacher/show');
Route::get('/teacher/create', 'teacherController@create')->name('teacher/create');
Route::post('/teacher/store', 'teacherController@store')->name('teacher.store');
Route::get('/teacher/edit/{id}', 'teacherController@edit')->name('teacher.edit');
Route::post('/teacher/update/{id}', 'teacherController@update')->name('teacher.update');
Route::get('/teacher/delete/{id}', 'teacherController@destroy')->name('teacher.delete');
Route::get('/teacherTrashed', 'teacherController@teacherTrashed')->name('teacherTrashed');
Route::get('/teacher/restore/{id}', 'teacherController@restore')->name('teacher.restore');


/*==== Ajax Search Engine ====*/
Route::get('/live_search/teacher', 'searchController@teacher')->name('live_search.teacher');
Route::get('/live_search/teacherTrashed', 'searchController@teacherTrashed')->name('live_search.teacherTrashed');

/*==== End Ajax Search Engine ====*/


// ==== STUDENT REPORT ROUTE =====
    // Route::get('/teacher_report', 'teachersReportController@index')->name('teacher_report');
    // Route::post('/show_class_report_teachers_name', 'teachersReportController@show_class_report_teachers_name')->name('show_class_report_teachers_name');
    // Route::post('/show_class_report_students_attend', 'teachersReportController@show_class_report_students_attend')->name('show_class_report_students_attend');
//# === STUDENT REPORT ROUTE =====


/*ٌ==== End Route for teachers module ====*/


/*ٌ==== Route for emloyees module ====*/
Route::get('/employees', function (){
    return view('employees.index');
});

Route::get('/employee/show/{id}', 'employeeController@show')->name('employee/show');
Route::get('/employee/create', 'employeeController@create')->name('employee/create');
Route::post('/employee/store', 'employeeController@store')->name('employee.store');
Route::get('/employee/edit/{id}', 'employeeController@edit')->name('employee.edit');
Route::post('/employee/update/{id}', 'employeeController@update')->name('employee.update');
Route::get('/employee/delete/{id}', 'employeeController@destroy')->name('employee.delete');
Route::get('/employeeTrashed', 'employeeController@employeeTrashed')->name('employeeTrashed');
Route::get('/employee/restore/{id}', 'employeeController@restore')->name('employee.restore');


/*==== Ajax Search Engine ====*/
Route::get('/live_search/employee', 'searchController@employee')->name('live_search.employee');
Route::get('/live_search/employeeTrashed', 'searchController@employeeTrashed')->name('live_search.employeeTrashed');


/*ٌ==== End Route for emloyees module ====*/

/*=================================================================================================================================*/

/*ٌ==== Route for School module ====*/
Route::get('/school', function (){
    return view('school.index');
});

/*==== Class ====*/
    Route::get('/classes', 'schoolClassController@index')->name('classes');
    Route::get('/class/create', 'schoolClassController@create')->name('class/create');
    Route::post('/class/store', 'schoolClassController@store')->name('class.store');
    Route::get('/class/edit/{id}', 'schoolClassController@edit')->name('class.edit');
    Route::post('/class/update/{id}', 'schoolClassController@update')->name('class.update');
    Route::get('/class/delete/{id}', 'schoolClassController@destroy')->name('class.delete');


    Route::get('/class_trashed', 'schoolClassController@classTrashed')->name('class_trashed');
    Route::get('/restore_class/{id}', 'schoolClassController@restore')->name('restore_class');

    /*==== Ajax Search Engine ====*/
    Route::get('/live_search/class', 'searchController@class')->name('live_search.class');
    Route::get('/live_search/class_trashed', 'searchController@class_trashed')->name('live_search.class_trashed');
    /*==== End Ajax Search Engine ====*/

    
/*==== Buses ====*/
    Route::get('/bus', 'busController@index')->name('bus');
    Route::get('/bus/create', 'busController@create')->name('bus/create');
    Route::post('/bus/store', 'busController@store')->name('bus.store');
    Route::get('/bus/edit/{id}', 'busController@edit')->name('bus.edit');
    Route::post('/bus/update/{id}', 'busController@update')->name('bus.update');
    Route::get('/bus/delete/{id}', 'busController@destroy')->name('bus.delete');
    Route::get('/busTrashed', 'busController@Trashed')->name('busTrashed');
    Route::get('/bus/restore/{id}', 'busController@restore')->name('bus.restore');



  /*==== Ajax Search Engine ====*/
  Route::get('/live_search/buses', 'searchController@buses')->name('live_search.buses');
  Route::get('/live_search/bus_trashed', 'searchController@busTrashed')->name('live_search.bus_trashed');
  /*==== End Ajax Search Engine ====*/



    
/*==== Class ====*/


/*==== School Info ====*/

Route::get('/school_info', 'schoolInfo@index')->name('/school_info');
Route::post('/school_info/store', 'schoolInfo@store')->name('school_info.store');
Route::get('/school_info/edit/{id}', 'schoolInfo@edit')->name('school_info.edit');
Route::post('/school_info/update/{id}', 'schoolInfo@update')->name('school_info.update');

Route::get('/invoice_print', function (){
    return view('accounting.invoice_print');
});

/*==== End School Info ====*/

/*==== Subjects ====*/
Route::get('/subject/create', 'subjectController@create')->name('subject.create');
Route::get('/subject/add', 'subjectController@add')->name('subject/add');
Route::post('/subject/store', 'subjectController@store')->name('subject.store');
Route::get('/subject/edit/{id}', 'subjectController@edit')->name('subject.edit');
Route::post('/subject/update/{id}', 'subjectController@update')->name('subject.update');
Route::get('/subject/delete/{id}', 'subjectController@destroy')->name('subject.delete');


Route::get('/subject/trashed', 'subjectController@subjectTrashed')->name('subject.trashed');
Route::get('/subject/restore/{id}', 'subjectController@restore')->name('subject.restore');

/*==== Ajax Search Engine ====*/
Route::get('/live_search/subject', 'searchController@subject')->name('live_search.subject');
Route::get('/live_search/subject_trashed', 'searchController@subject_trashed')->name('live_search.subject_trashed');

/*==== End Ajax Search Engine ====*/

/*==== Subjects ====*/



/*==== calender ====*/
Route::get('/school/calender', 'calenderController@index')->name('school.calender');
Route::get('/school/create_calender', 'calenderController@create')->name('school.create_calender');
Route::get('/school/print_calender', 'calenderController@print')->name('school.print_calender');
Route::post('/calender/store', 'calenderController@store')->name('calender.store');
Route::get('/calender/edit/{id}', 'calenderController@edit')->name('calender.edit');
Route::post('/calender/update/{id}', 'calenderController@update')->name('calender.update');
Route::get('/calender/delete/{id}', 'calenderController@destroy')->name('calender.delete');

/*==== Ajax Search Engine ====*/
Route::get('/live_search/calender', 'searchController@calender')->name('live_search.calender');
/*==== End Ajax Search Engine ====*/

/*==== calender ====*/ 
Route::get('/test', function (){
    return view('exams.test');
});


/*===== Academic year ========*/
Route::get('/academic_year', 'academicYear@index')->name('Acadmic_year');
Route::post('/academic_year/store', 'academicYear@store')->name('academic_year.store');
Route::post('/academic_year/update/{id}', 'academicYear@update')->name('academic_year.update');
Route::get('/academic_year/edit/{id}', 'academicYear@edit')->name('academic_year.edit');
Route::post('/academic_year/update_info/{id}', 'academicYear@update_info')->name('academic_year.update_info');
/*===== End of Academic year ========*/

/*=================================================================================================================================*/



/*ٌ==== Route for Exam module ====*/

/*==== exams ====*/
    Route::get('/exams', 'examsController@index')->name('exam/create');
    Route::get('/exam/create', 'examsController@create')->name('exam/create');
    Route::post('/exams/store', 'examsController@store')->name('exam.store');
    Route::get('/exam/edit/{id}', 'examsController@edit')->name('exam.edit');
    Route::post('/exam/update/{id}', 'examsController@update')->name('exam.update');
    Route::get('/exam/delete/{id}', 'examsController@destroy')->name('exam.delete');

    /*==== Ajax Search Engine ====*/
     Route::get('/live_search/exams', 'searchController@exams')->name('live_search.exams');
    /*==== End Ajax Search Engine ====*/

/*==== exams ====*/

/*==== Grade ====*/

    Route::get('/exam/grades', 'examGradeController@index')->name('exam/grades');
    Route::get('/grades/create', 'examGradeController@create')->name('grades/create');
    Route::post('/grades/list', 'examGradeController@list')->name('grades.list');
    Route::post('/grades/list_edit_delete', 'examGradeController@list_edit_delete')->name('grades.list_edit_delete');
    Route::post('/grades/store', 'examGradeController@store')->name('grades.store');

/*==== End Grade ====*/

 /*==== Ajax Search Engine ====*/
    Route::get('/live_search/std_add_grades', 'searchController@std_add_grades')->name('live_search.std_add_grades');
 /*==== End Ajax Search Engine ====*/



/*=================================================================================================================================*/

/*ٌ==== Route for Accounting module ====*/


/*==== accountig home page ====*/
Route::get('accounting', function (){
    return view('accounting.index');
});


/*==== End accountig home page ====*/



/*==== icotreasuryme controller ====*/ 

    Route::get('/treasury', 'treasuryController@index')->name('treasury');
    Route::post('/treasury/report_print', 'treasuryController@show')->name('treasury.report_print');
    Route::post('/inventory/report_print', 'treasuryController@show_inventory')->name('inventory.report_print');
    Route::get('/inventory', 'treasuryController@inventory')->name('inventory');

/*==== treasury controller home ====*/



/*==== icome controller home page ====*/
    Route::get('/income/create', 'incometypesController@create')->name('income/create');
    Route::post('/income/store', 'incometypesController@store')->name('income.store');
    Route::get('/income/edit/{id}', 'incometypesController@edit')->name('income.edit');
    Route::post('/income/update/{id}', 'incometypesController@update')->name('income.update');
    Route::get('/income/delete/{id}', 'incometypesController@destroy')->name('income.delete');

/*==== icome controller home page ====*/


/*==== fees_types controller home page ====*/

    Route::get('/fees_types', 'feesTypesController@index')->name('fees_types');
    Route::get('/fees_type/create', 'feesTypesController@create')->name('fees_type/create');
    Route::post('/fees_type/store', 'feesTypesController@store')->name('fees_type.store');
    Route::get('/fees_type/edit/{id}', 'feesTypesController@edit')->name('fees_type.edit');
    Route::post('/fees_type/update/{id}', 'feesTypesController@update')->name('fees_type.update');
    Route::get('/fees_type/delete/{id}', 'feesTypesController@destroy')->name('fees_type.delete');

    // REPORT

    Route::get('/fees_report', 'feesReportController@index')->name('fees_report');
    Route::get('/fees_report_print/{id}', 'feesReportController@show')->name('fees_report_print');
    Route::post('/show_class_report', 'feesReportController@show_class_report')->name('show_class_report');
    Route::post('/show_class_report_no_pay', 'feesReportController@show_class_report_no_pay')->name('show_class_report_no_pay');
    
    //# REPORT


/*==== fees_types controller home page ====*/


/*==== fees panel controller home page ====*/

    Route::get('/fees_panel', 'feesController@index')->name('/fees_panel');
    Route::get('/fees_panel/show/{id}', 'feesController@show')->name('fees_panel.show');
    Route::post('/fees/store', 'feesController@store')->name('fees.store');
    Route::get('/fees/reprint/{id}', 'feesController@reprint')->name('fees.reprint');
    Route::get('/fees/edit/{id}', 'feesController@edit')->name('fees.edit');
    Route::post('/fees/update/{id}', 'feesController@update')->name('fees.update');
    Route::get('/fees/delete/{id}', 'feesController@destroy')->name('fees.delete'); 


/*==== End fees panel controller home page ====*/




/*==== bus fees panel controller home page ====*/

    Route::get('/bus_panel', 'busController@fees_index')->name('/bus_panel');
    Route::get('/bus_panel/show/{id}', 'busController@payform')->name('bus_panel.show');
    Route::post('/bus_payment/store', 'busController@payment_store')->name('bus_payment.store');  
    Route::get('/bus_payment/reprint/{id}', 'busController@payment_reprint')->name('bus_payment.reprint');
    Route::get('/bus_payment/edit/{id}', 'busController@payment_edit')->name('bus_payment.edit');
    Route::post('/bus_payment/update/{id}', 'busController@payment_update')->name('bus_payment.update');
    Route::get('/bus_payment/delete/{id}', 'busController@payment_destroy')->name('bus_payment.destroy'); 


    Route::get('/bus_report', 'busController@report')->name('bus_report');
    Route::post('/bus.report_print', 'busController@report_print')->name('bus.report_print');



/*==== END bus fees panel controller home page ====*/




/*==== Expenses controller home page ====*/

    /**
     * Salary expense route
     */

    Route::get('/teachers_salary', 'salaryController@teachers_index')->name('/teachers_salary');
    Route::get('/teacher_salary_create/{id}', 'salaryController@create_teacher_salary')->name('/teacher_salary_create');
    Route::get('/employee_salary', 'salaryController@employee_index')->name('/employee_salary');
    Route::get('/employee_salary_create/{id}', 'salaryController@create_employee_salary')->name('/employee_salary_create');
    Route::post('/salary/store', 'salaryController@store')->name('salary.store');


   
    Route::get('/teacher_debt_create/{id}', 'debtController@create_teacher_debt')->name('/teacher_debt_create');
    Route::get('/employee_debt_create/{id}', 'debtController@create_employee_debt')->name('/employee_debt_create');
    Route::post('/debt/store', 'debtController@store')->name('debt.store');

    Route::get('/debt_report', function (){
        return view('accounting.debt_report');
    });

    Route::post('/debt/report_print', 'debtController@report')->name('debt.report_print');




    //live search method
    Route::get('/live_search/teacher_salary', 'searchController@teacher_salary')->name('live_search.teacher_salary');
    Route::get('/live_search/employee_salary', 'searchController@employee_salary')->name('live_search.employee_salary');
    Route::get('/live_search/bus_payment_edit_search', 'searchController@bus_payment_edit_search')->name('live_search.bus_payment_edit_search');





    

    /**
     * Expense route 
     * */ 

    Route::get('/expenses', 'expensesController@index')->name('/expenses');
    Route::get('/expenses/create', 'expensesController@create')->name('expenses.create');
    Route::post('/expense/store', 'expensesController@store')->name('expense.store');
    Route::get('/expense/edit/{id}', 'expensesController@edit')->name('expense.edit');
    Route::post('/expense/update/{id}', 'expensesController@update')->name('expense.update');
    Route::get('/expense/print/{id}', 'expensesController@print')->name('expense.print');
    Route::get('/expense/delete/{id}', 'expensesController@destroy')->name('expense.delete');
    Route::post('/expense/report_print', 'expensesController@report')->name('expense.report_print');


// FOR THE SEARCH FOR EXPENSE

Route::post('/expense/show', 'expensesController@show')->name('expense.show');

//# FOR THE SEARCH FOR EXPENSE


Route::get('/expenses_search', function (){
    return view('accounting.expenses_search');
});


Route::get('/expenses_report', function (){
    return view('accounting.expenses_report');
});

/*==== End Expenses controller home page ====*/





/*==== Ajax Search Engine ====*/
    Route::get('/live_search/fees_type', 'searchController@fees_type')->name('live_search.fees_type');
    Route::get('/live_search/fees_panel', 'searchController@fees_panel')->name('live_search.fees_panel');
    Route::get('/live_search/bus_panel', 'searchController@bus_panel')->name('live_search.bus_panel');
    Route::get('/live_search/fees_edit_search', 'searchController@fees_edit_search')->name('live_search.fees_edit_search');
    Route::get('/live_search/student_report_search', 'searchController@student_report_search')->name('live_search.student_report_search');

/*==== End Ajax Search Engine ====*/

/*=================================================================================================================================*/
});