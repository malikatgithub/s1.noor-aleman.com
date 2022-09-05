



@include('layouts.main_css')

 
    
<!-- Sidebar -->

<div class="bg-primary text-right" id="sidebar-wrapper" style="background-color: #1b486d;">
  <div class="sidebar-heading bg-info text-white text-center font-weight-bold p-4"> <i class="fas fa-file-contract fa-2x pt-1"></i> <h6>الإدارة الإمتحانات</h6></div>
  <div class="list-group list-group-flush border-left text-dark font-weight-normal">    
      
    <tbody>

      <a href="home" class="list-group-item list-group-item-action bg-light border-">  
        <tr>
          <td><i class="fas fa-home fa-1x"></i></td>
          <td> الصفحة الرئيسية</td>
        </tr>
      </a>



    {{-- =========================DROP DOWN MENU========================= --}}



    <a href="#" class="list-group-item list-group-item-action  border- "  onclick="show_menu1()" id='show1'>
        <tr>
          <td> <i class="fas fa-chevron-circle-down fa-1x "></i></td>
          <td> بيانات الامتحانات </td>
        </tr>
    </a>


    
    <span  id="menu1" style="display:none;" class="pr-5">
      

        <a href={{ url('/exams') }} class="list-group-item list-group-item-action bg-dark border- text-white">
          <tr>
            <td> <i class="fas fa-list fa-1x "></i></td>
            <td>قائمة الإمتحانات</td>
          </tr>
        </a>


        <a href={{ url('/exam/create') }} class="list-group-item list-group-item-action bg-dark border- text-white">
          <tr>
            <td> <i class="fas fa-plus-square fa-1x "></i></td>
            <td>إضافة إمتحان</td>
          </tr>
        </a>

        <a href={{ url('/class/trashed') }} class="list-group-item list-group-item-action bg-dark border- text-white"> 
      
            <td> <i class="fas fa-trash-alt fa-1x text-danger"></i></td>
            <td>سلة المهملات</td>
          
        </a>
      </span>

    {{-- =========================# DROP DOWN MENU========================= --}}


    

      <a href="{{route ('exam/grades')}}" class="list-group-item list-group-item-action bg-light border-">
        <tr>
          <td><i class="fas fa-file-invoice-dollar fa-1x"></i></td>
          <td>إضافة نتيجة</td>
        </tr>
      </a>


     

      
     

    <tbody>


   


   
  </div>
</div>

@include('layouts.top_nav')



</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
</script>

</body>

</html>
