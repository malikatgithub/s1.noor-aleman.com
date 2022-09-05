
<div class="row">
      <div class="container">
          <input type="text" name="search1" id="search1" class="form-control" placeholder="أدخل الرقم الأكاديمي فقط " />
          <br>
          <div class="col-md-12">
              <div class="table-responsive">
                {{-- <h3 align="center">Total Data : <span id="total_records"></span></h3> --}}
                <table class="table table-striped table-bordered text-right" >
          
                <thead id='display3' class="thead1">
                </thead>
          
                <tbody id='display4' class="text-right tbody2">
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
     url:"{{ route('live_search.fees_edit_search') }}",
     method:'GET',
     data:{query:query},
     dataType:'json',
     
      success:function(data)
      {
          
          $('.thead1').html(data.table_header);
          $('.tbody2').html(data.result);
          //$('#total_records').text(data.total_data);
          $("#display3").html(html).show();
          $("#display4").html(html).show();
      
      }
    
    })
   }
  
   $(document).on('keyup', '#search1', function(){
    var query = $(this).val();
    fetch_customer_data(query);
    $("#display3").html("");
    $("#display4").html("");
  
   });
  
  });
  </script>
  