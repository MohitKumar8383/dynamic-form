<div class="py-6 px-10 text-center" >
            <p class="mb-0 fs-4">Developed by Mohit Kumar </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <script src="<?php echo asset('/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
  <script src="<?php echo asset('/assets/js/sidebarmenu.js');?>"></script>
  <script src="<?php echo asset('/assets/js/app.min.js');?>"></script>
  <script src="<?php echo asset('/assets/libs/simplebar/dist/simplebar.js');?>"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".select2").select2()
  })
</script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
  <script type="text/javascript">
    $(function () {
    $("#sortable-table").sortable({
      update: function (event, ui) {
        let order = [];
        $("#sortable-table tr").each(function (index) {
          let id = $(this).data("id");
          order.push({ id: id, order: index + 1 });
          $(this).find(".order-column").text(index + 1);
        });
        $.ajax({
          url: "{{ route('update.order') }}",
          method: "POST",
          data: {
            _token: "{{ csrf_token() }}",
            order: order
          },
          success: function (res) {
            console.log('Order updated');
          }
        });
      }
    });
  });

    function status_change(_this){
            var table_name = $(_this).attr('data-table');
            var id = $(_this).attr('data-id');
            var status_type = $(_this).attr('data-status');
            $.ajax({
                url:"{{ route('status_change') }}",
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "table_name":table_name,
                    "status_type":status_type,
                    },
                success: function(result){
                  var data = $.parseJSON(result);
                     if(data.status == true){
                      if(status_type == "inactive"){
                        $(_this).attr('data-status','active');
                        $(_this).find('span').removeClass('border-danger');
                        $(_this).find('span').addClass('border-success');
                        $(_this).find('span').removeClass('bg-label-danger');
                        $(_this).find('span').addClass('bg-label-success');
                        $(_this).find('span').removeClass('bg-danger');
                        $(_this).find('span').addClass('bg-success');
                        if(table_name == "contactuses" || table_name ==  "consult_with_us"){
                            $(_this).find('span').html('Close');
                        }else{
                            $(_this).find('span').html('Active');
                        }
                      }else{
                        $(_this).attr('data-status','inactive');
                        $(_this).find('span').addClass('border-danger');
                        $(_this).find('span').removeClass('border-success');
                        $(_this).find('span').addClass('bg-label-danger');
                        $(_this).find('span').removeClass('bg-label-success');
                        $(_this).find('span').addClass('bg-danger');
                        $(_this).find('span').removeClass('bg-success');
                        if(table_name == "contactuses" || table_name ==  "consult_with_us"){
                            $(_this).find('span').html('Pending');
                        }else{
                            $(_this).find('span').html('Inactive');
                        }
                      }  
                     }

                  }
              });
        }
  </script>

</body>

</html>