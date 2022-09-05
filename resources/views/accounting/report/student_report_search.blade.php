
<div class="row">
    <div class="container">
        <input type="text" name="search" id="search" class="form-control" placeholder="أدخل إسم أو الرقم الأكاديمي " />
        <br>
        <div class="col-md-12">
            <div class="table-responsive">
              {{-- <h3 align="center">Total Data : <span id="total_records"></span></h3> --}}
              <table class="table table-striped table-bordered text-right" >
        
              <thead id='display1' class="thead">
              </thead>
        
              <tbody id='display2' class="text-right tbody">
              </tbody>
        
              </table>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query ='')
 {
  $.ajax({
   url:"{{ route('live_search.student_report_search') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   
    success:function(data)
    {
        
        $('.thead').html(data.table_header);
        $('.tbody').html(data.result);
        //$('#total_records').text(data.total_data);
        $("#display1").html(html).show();
        $("#display2").html(html).show();
    
    }
  
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
  $("#display1").html("");
  $("#display2").html("");

 });

});
</script>
