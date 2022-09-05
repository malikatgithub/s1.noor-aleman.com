         
     
      <div class="col-md-3 mb-3">
            <label for="validationDefault01">أختر  الترحيل <span class="required">*</span> </label>
            <select name="bus_type_id" id="bus_type_id" class="form-control input-md dynamic" data-dependent="amount" required>
                  <option value=""></option>
                  @foreach($buses as $bus)
                        <option value="{{$bus->id}}">{{$bus->name}}</option>
                  @endforeach
            </select>
      </div>

      <div class="col-md-3  pr-4 pl-4">
            <label for="validationDefault01">القيمة المالية المطلوبة<span class="required">*</span> </label>
           
                  <span  id="amount" id="form-control input-md dynamic amount font-weight-bold">
                        


            


            </span>
      </div>


           <script>
           $(document).ready(function(){
           
            $('.dynamic').change(function(){
             if($(this).val() != '')
             {
              var select = $(this).attr("id");
              var value = $(this).val();
              var dependent = $(this).data('dependent');
              var _token = $('input[name="_token"]').val();
              $.ajax({
               url:"{{ route('dynamicdependent.fetch_bus_fees') }}",
               method:"POST",
               data:{select:select, value:value, _token:_token, dependent:dependent},
               success:function(result)
               {
                $('#'+dependent).html(result);
               }
           
              })
             }
            });
           
            $('#bus_type_id').change(function(){
             $('#amount').val('');
            });
      
            
           
           });
           </script>