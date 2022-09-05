

      <input type="text" name="search" id="search" class="form-control" placeholder="أدخل إسم " />
     </div>
     <div class="table-responsive">
      <h5 align="center">نتائج البحث : <span id="total_records"></span></h5>
      <table class="table table-striped table-bordered text-right" >
      <br>
       <thead>
          <tr class="font-weight-bold">
              <td>#</td>
              <td>إسم الفصل</td>
              <td>السعة</td>
              <td>ملاحظات</td>
              <td class="text-center">العمليات</td>
            </tr>
       </thead>
        
       <tbody class="text-right tbody">
       </tbody>

      </table>
     </div>



     <script>
        $(document).ready(function(){
        
         fetch_customer_data();
        
         function fetch_customer_data(query = '')
         {
          $.ajax({
           url:"{{ route('live_search.class') }}",
           method:'GET',
           data:{query:query},
           dataType:'json',
           success:function(data)
           {
            $('.tbody').html(data.table_data);
            $('#total_records').text(data.total_data);
           }
          })
         }
        
         $(document).on('keyup', '#search', function(){
          var query = $(this).val();
          fetch_customer_data(query);
         });
        });
        </script>
