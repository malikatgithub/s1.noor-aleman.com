<html>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    
    <style>
        @font-face {
            font-family: font;
            src: url("{{asset('public/fonts/Cairo-Regular.ttf')}}");
        }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- calling some java script files -->
    <script src="{{asset('public/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/js/bootstrap-jquery.js')}}"></script>
    <script src="{{asset('public/js/proper.js')}}"></script>
    <script src="{{asset('public/js/font-awsome.js')}}"></script>
    <script src="{{asset('public/js/plugins.js')}}"></script>

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/sidnav.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/font-awsome.css') }}" rel="stylesheet">

    <title>تقرير رسوم دراسية</title>
<!-- 
    <script type="text/javascript">
        $(document).ready(function () {
            window.print();
            setTimeout("closePrintView()", 3000);
        });
        function closePrintView() {
            document.location.href = "{{ url('fees_report') }}";
        }
    </script>  -->

</head>

{{-- === AUTO PRINT PAGE 
    
    onload="window.print()" 
    
    --}}

<body style='font-family:font; direction:rtl ' class="text-right mt-5 bg-white">
    <div class="pt-5 container">

        <div class="row">

            <div class="col-md-2">
                <center><img src="{{asset("public/$school_info->logo")}}" alt="" width="150px" height="150px" class="img-reponsive"></center>
            </div>

            <div class="col-md-8">
                <h5 class="text-center text-dark font-weight-bold">{{$school_info->name_arabic}}</h5>
                <h5 class="text-center text-dark font-weight-bold">{{$school_info->name_english}}</h5>
            </div>

            <div class="col-md-2">
                <center><img src="{{asset("public/$school_info->logo")}}" alt="" width="150px" height="150px" class="img-reponsive"></center>
            </div>

        </div>

    </div>
    <div class=" pt-3">
            <div class="alert alert-dark mt-3">
                    <center><h5 class="text-center font-weight-bold">الإدارة المالية</h5> </center>
            </div>
            
        <ul class="m-4"> 
            <li><h6>وحدة الاقساط</h6></li>
            <li><h6>تقرير اقساط</h6></li>
            <li><h6><b>تقرير للفصل الدراسي : {{ $class->name }}</b></h6></li>
            <li><h6>التاريخ  : {{date('Y-m-d')}}</h6></li>
            <li><h6><b>العام الدراسي  : {{$academic_year_name}}</b></h6></li>
        </ul>
     
                <table class="table table-striped table-bordered text-right" >
                    <br>
                        <thead >
                        <tr class="font-weight-bold">
                            <td>الرقم الأكاديمي</td>
                            <td>إسم الطالب</td>
                            <td>المبلغ المطلوب</td>
                            <td>المبلغ المدفوع</td>
                            <td>المستحق</td>
                            <td>ملاحظات</td>
                            <td>رقم ولي الامر</td>
                            </tr>
                        </thead>
                        <tbody class="text-right">

                            
                            @php
                                

                                $total_paid = 0;
                                $total_fees = 0;
                                $total_required = 0;
                                
                                foreach ($student_info as $info)
                                    {
                                        
                                        $total = 0;
                                        foreach ($fees_info as $fees){
                                            
                                            if ($info->reg_no == "$fees->reg_no") {
                                                 $total = $total+$fees->paid;
                                            }  


                                            
                                        }

// student required payment
                                            $std_required = $info->fees - $total;

                                        // Retrive the total paid info and and required

                                        $total_paid = $total_paid + $total;
                                        $total_fees = $total_fees + $info->fees;
                                        $total_required = $total_fees - $total_paid;


                                        

                                       

                                       

                                        
                                        

                                        echo "
                                        <td>$info->reg_no</td>
                                        <td>$info->name</td>
                                        <td>$info->fees</td>
                                        <td>$total</td>
                                        <td>$std_required</td>
                                        ";



                                        if ($total == ($info->fees)){
                                            echo "
                                            <td> تم تسديد كامل المبلغ </td>
                                            
                                            ";
                                        }

                                        else{
                                            echo "
                                            <td>***** لم يتم تسديد كامل المبلغ *****</td>
                                            ";
                                        }


                                        echo "
                                            <td>$info->fa_phone</td>
                                            </tr>
                                        ";
                                    }

                            @endphp 

                            <tr>
                                <td class="font-weight-bold text-center" colspan="6">إجمالي المستحقات من الفصل</td>
                                <td class="bg-danger font-weight-bold text-white">{{$total_required}}</td>
                            </tr>


                           

                        </tbody>
                </table>

                <div class="p-3">
                    <h6>الإدارة المالية</h6>
                    <h6>___________________________</h6>
                </div>
    
    </div>

    
    
</body>

</html>