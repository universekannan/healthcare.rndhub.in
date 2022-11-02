
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{!! asset('plugins/jquery/jquery.min.js') !!}"></script>
<!-- Bootstrap -->
<script src="{!! asset('plugins/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<!-- overlayScrollbars -->
<script src="{!! asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('dist/js/adminlte.js') !!}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{!! asset('plugins/jquery-mousewheel/jquery.mousewheel.js') !!}"></script>
<script src="{!! asset('plugins/raphael/raphael.min.js') !!}"></script>
<script src="{!! asset('plugins/jquery-mapael/jquery.mapael.min.js') !!}"></script>
<script src="{!! asset('plugins/jquery-mapael/maps/usa_states.min.js') !!}"></script>
<!-- ChartJS -->
<script src="{!! asset('plugins/chart.js/Chart.min.js') !!}"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="{!! asset('dist/js/demo.js') !!}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{!! asset('dist/js/pages/dashboard2.js') !!}"></script>

<!-- DataTables  & Plugins -->
<script src="{!! asset('plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}"></script>
<script src="{!! asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') !!}"></script>
<script src="{!! asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('plugins/jszip/jszip.min.js') !!}"></script>
<script src="{!! asset('plugins/pdfmake/pdfmake.min.js') !!}"></script>
<script src="{!! asset('plugins/pdfmake/vfs_fonts.js') !!}"></script>
<script src="{!! asset('plugins/datatables-buttons/js/buttons.html5.min.js') !!}"></script>
<script src="{!! asset('plugins/datatables-buttons/js/buttons.print.min.js') !!}"></script>
<script src="{!! asset('plugins/datatables-buttons/js/buttons.colVis.min.js') !!}"></script>
<script src="{!! asset('plugins/moment/moment.min.js') !!}"></script>
<script src="{!! asset('plugins/inputmask/jquery.inputmask.min.js') !!}"></script>
<script src="{!! asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') !!}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{!! asset('plugins/moment/moment.min.js') !!}"></script>
<script src="{!! asset('plugins/fullcalendar/main.js') !!}"></script>
<script src="{!! asset('plugins/jquery-ui/jquery-ui.min.js') !!}"></script>
<!-- date-range-picker -->
<script src="{!! asset('plugins/daterangepicker/daterangepicker.js') !!}"></script>
<!-- Ekko Lightbox -->
<script src="{!! asset('plugins/ekko-lightbox/ekko-lightbox.min.js') !!}"></script>
<!-- Select2 -->
<script src="{!! asset('plugins/select2/js/select2.full.min.js') !!}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<script>
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });
  </script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
function myFunction() {
  const input = document.getElementById("myInput");
  const inputStr = input.value.toUpperCase();
  document.querySelectorAll('#example2 tr:not(.header)').forEach((tr) => {
    const anyMatch = [...tr.children]
      .some(td => td.textContent.toUpperCase().includes(inputStr));
    if (anyMatch) tr.style.removeProperty('display');
    else tr.style.display = 'none';
  });
}
</script>


<script>
  $(document).ready(function(){
    $("#custom").click(function(){
      $("#showCustom").toggle(500);
    });
  });
</script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    //Date picker
    $('#reservationdate1').datetimepicker({
        format: 'YYYY-MM-DD'
    });

     //Timepicker
     $('#timepicker').datetimepicker({
      format: 'H:mm:ss'
    })

    //Date range picker
    $('#reservation').daterangepicker({
      locale: {
        format: 'YYYY-MM-DD'
      },
    })


</script>

<!-- <script>
  getajax();
  function getajax(){

    $.ajax({
        type:"get",
        url:"{{ url('ajaxnoticount/') }}",
        datatype:"json",
        success:function(data)
        {
          var obj = jQuery.parseJSON(data);
          $('#ajaxNotiCount').html(obj.count); 
          $('#ajaxNoti').html(obj.result);
        }
      });

  }
  setInterval(function()
  { 
     getajax();
  },5000);
</script> -->


<script>
  //$("#role").hide();
  $("#changeStatus").change(function(){
      if($(this).val() == "1"){
          $("#role").show();
      } else{
        $("#role").hide();
      }
  });
</script>

<script>
  
  function domainRefresh(shopID,shopDomainName) {
    $.ajax({
        type: "get",
        url: "{{ url('/domain_check') }}",
        data: { 
          shopID: shopID, 
          shopDomainName: shopDomainName 
        },
        beforeSend: function() {
          $('.refreshButton'+shopID).html('<i class="fa fa-sync-alt fa-spin"></i>')
        },

        success: function (res) {
          //console.log(res);
              var obj = jQuery.parseJSON(res);
              var $result=obj.apiCode;
              if($result=='400'){
                  var istatus='0';
                  insertDatabase(istatus,shopDomainName,res,shopID);    
              }else{
                  var nresult=obj.data.A[0];
                  if(nresult=='52.221.97.54'){
                      var istatus='1';
                      insertDatabase(istatus,shopDomainName,res,shopID);    
                  }else{
                      var istatus='0';
                      insertDatabase(istatus,shopDomainName,res,shopID);    
                  }
              }
              
          },

        // success: function (res) {
        //   // alert(res);
        //     var obj = jQuery.parseJSON(res);
        //     var result=obj.data[0].error;
        //     if(result=='Unable to reach the URL.'){
        //         var istatus='0';
        //         insertDatabase(istatus,shopDomainName,res,shopID);    
        //     }else{
        //         var nresult=obj.data[0].data.A[0];
        //         if(nresult=='52.221.97.54'){
        //           var istatus='1';
        //           insertDatabase(istatus,shopDomainName,res,shopID);  
        //         }else{
        //           var istatus='0';
        //           insertDatabase(istatus,shopDomainName,res,shopID);
        //         }       
        //     }
        //     //alert(istatus);
        // }
    });
  };


  function insertDatabase(istatus,shopDomainName,res,shopID)
    {
       var formData="istatus="+istatus+"&domain="+shopDomainName+"&res="+res; //alert(datastring); 
       $.ajax({
            url: "{{ url('/domain_update') }}",
            type: "POST",
            headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
            data: formData,
            success: function (result) {
                var obj = jQuery.parseJSON(res);
                console.log(obj);
                var $cresult=obj.message;
                if($cresult=='Unable to reach the URL.'){
                    if(result=='1'){
                        $('.toaster-danger').stop().fadeIn(400).delay(3000).fadeOut(500);
                        $('.refreshButton'+shopID).html('Refresh <i class="fa fa-sync-alt"></i>');
                        $(".pendingButton"+shopID).hide();
                        $('#arecstatus'+shopID).html('No')
                    }else{
                      $('.toaster-danger').stop().fadeIn(400).delay(3000).fadeOut(500);
                        $('.refreshButton'+shopID).html('Refresh <i class="fa fa-sync-alt"></i>');
                        $(".pendingButton"+shopID).hide();
                        $('#arecstatus'+shopID).html('No')
                    }
                    
                }else{
                    if(result=='1'){
                        var nresult=obj.data.A[0];
                        if(nresult=='52.221.97.54'){
                          $('.toaster-success').stop().fadeIn(400).delay(3000).fadeOut(500);
                          $('.refreshButton'+shopID).hide();
                          $(".pendingButton"+shopID).show();
                          $('#arecsta'+shopID).hide();
                          $('#arecstatus'+shopID).show().html('Yes')
                        }else{
                          $('.toaster-danger').stop().fadeIn(400).delay(3000).fadeOut(500);
                          $('.refreshButton'+shopID).html('Refresh <i class="fa fa-sync-alt"></i>');
                          $(".pendingButton"+shopID).hide();
                          $('#arecstatus'+shopID).html('No')
                        }
                        
                    }else{
                        $('.toaster-danger').stop().fadeIn(400).delay(3000).fadeOut(500);
                        $('.refreshButton'+shopID).html('Refresh <i class="fa fa-sync-alt"></i>');
                        $(".pendingButton"+shopID).hide();
                        $('#arecstatus'+shopID).html('No')

                    }  
                }
                },
            });
       
    }
</script>



<script>

  $(document).ready(function(){
    $("#folderID").hide();
    $("#fileID").hide();
      $('input[type=radio][name=choose]').change(function() {
        if (this.value == 'cfolder') {
          $("#folderID").show();
          $("#fileID").hide();
        }
        else if (this.value == 'cfile') {
          $("#fileID").show();
          $("#folderID").hide();
        }
      });
  });



  $(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide();



    $('#main').change(function(){

      var d_main= $('#main').val();
      $("#data").val(d_main);

        if($('#main').val() == 'app') {
            $('#appsub').show(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide();
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#main').val() == 'config') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#main').val() == 'public') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').show(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#main').val() == 'resources') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#main').val() == 'routes') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        }
    });
});


$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#appsub').change(function(){

      var d_main = $('#main').val();
      var d_appsub = $('#appsub').val();
      var d_main_appsub = d_main + '/' + d_appsub;
      $("#data").val(d_main_appsub);

        if($('#appsub').val() == 'Http') {
            $('#appsub').show(); 
            $('#httpsub').show(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#appsub').val() == 'Models') {
            $('#appsub').show(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').show();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#httpsub').change(function(){

      var d_main = $('#main').val();
      var d_appsub = $('#appsub').val();
      var d_httpsub = $('#httpsub').val();
      var d_main_appsub_d_httpsub = d_main + '/' + d_appsub + '/' + d_httpsub;
      $("#data").val(d_main_appsub_d_httpsub);

        if($('#httpsub').val() == 'Controllers') {
            $('#appsub').show(); 
            $('#httpsub').show(); 
            $('#controllersub').show(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#httpsub').val() == 'Middleware') {
            $('#appsub').show(); 
            $('#httpsub').show(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').show(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#controllersub').change(function(){

      var d_main = $('#main').val();
      var d_appsub = $('#appsub').val();
      var d_httpsub = $('#httpsub').val();
      var d_controllersub = $('#controllersub').val();
      var d_main_appsub_d_httpsub_controllersub = d_main + '/' + d_appsub + '/' + d_httpsub + '/' + d_controllersub;
      $("#data").val(d_main_appsub_d_httpsub_controllersub);

        if($('#controllersub').val() == 'AdminControllers' || $('#controllersub').val() == 'App' || $('#controllersub').val() == 'Auth' || $('#controllersub').val() == 'DeliveryBoy' || $('#controllersub').val() == 'Web') {
            $('#appsub').show(); 
            $('#httpsub').show(); 
            $('#controllersub').show(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#middlewaresub').change(function(){

      var d_main = $('#main').val();
      var d_appsub = $('#appsub').val();
      var d_httpsub = $('#httpsub').val();
      var d_middlewaresub = $('#middlewaresub').val();
      var d_main_appsub_d_httpsub_middlewaresub = d_main + '/' + d_appsub + '/' + d_httpsub + '/' + d_middlewaresub;
      $("#data").val(d_main_appsub_d_httpsub_middlewaresub);

        if($('#middlewaresub').val() == 'admin_type' || $('#middlewaresub').val() == 'app_setting' || $('#middlewaresub').val() == 'categories' || $('#middlewaresub').val() == 'collection' || $('#middlewaresub').val() == 'coupon' || $('#middlewaresub').val() == 'customer' || $('#middlewaresub').val() == 'dashboard' || $('#middlewaresub').val() == 'deliveryboy' || $('#middlewaresub').val() == 'finance' || $('#middlewaresub').val() == 'general_setting' || $('#middlewaresub').val() == 'languages' || $('#middlewaresub').val() == 'loyalty' || $('#middlewaresub').val() == 'manage_admin' || $('#middlewaresub').val() == 'user_permission' || $('#middlewaresub').val() == 'management' || $('#middlewaresub').val() == 'manufacturer' || $('#middlewaresub').val() == 'media' || $('#middlewaresub').val() == 'news' || $('#middlewaresub').val() == 'newsletter' || $('#middlewaresub').val() == 'notification' || $('#middlewaresub').val() == 'order' || $('#middlewaresub').val() == 'payment' || $('#middlewaresub').val() == 'pos_setting' || $('#middlewaresub').val() == 'product' || $('#middlewaresub').val() == 'report' || $('#middlewaresub').val() == 'reviews' || $('#middlewaresub').val() == 'shipping' || $('#middlewaresub').val() == 'shoppinginfo' || $('#middlewaresub').val() == 'tax' || $('#middlewaresub').val() == 'ticket' || $('#middlewaresub').val() == 'vendors' || $('#middlewaresub').val() == 'web_setting' ) {
            $('#appsub').show(); 
            $('#httpsub').show(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').show(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#modelsub').change(function(){

      var d_main = $('#main').val();
      var d_appsub = $('#appsub').val();
      var d_modelsub = $('#modelsub').val();
      var d_main_appsub_modelsub = d_main + '/' + d_appsub  + '/' + d_modelsub;
      $("#data").val(d_main_appsub_modelsub);

        if($('#modelsub').val() == 'Admin' || $('#modelsub').val() == 'AppModels' || $('#modelsub').val() == 'Core' || $('#modelsub').val() == 'DeliveryBoyModel' || $('#modelsub').val() == 'Web') {
            $('#appsub').show(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').show();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});

$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#publicsub').change(function(){

      var d_main = $('#main').val();
      var d_publicsub = $('#publicsub').val();
      var d_main_publicsub = d_main + '/' + d_publicsub;
      $("#data").val(d_main_publicsub);


        if($('#publicsub').val() == 'admin') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').show(); 
            $('#adminsub').show(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#publicsub').val() == 'images') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').show(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').show(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#publicsub').val() == 'web') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').show(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').show(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#adminsub').change(function(){

      var d_main = $('#main').val();
      var d_publicsub = $('#publicsub').val();
      var d_adminsub = $('#adminsub').val();
      var d_main_publicsub_adminsub = d_main + '/' + d_publicsub  + '/' + d_adminsub;
      $("#data").val(d_main_publicsub_adminsub);

        if($('#adminsub').val() == 'css' || $('#adminsub').val() == 'js' || $('#adminsub').val() == 'top-odder') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').show(); 
            $('#adminsub').show(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});


$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#adminimagesub').change(function(){

      var d_main = $('#main').val();
      var d_publicsub = $('#publicsub').val();
      var d_adminimagesub = $('#adminimagesub').val();
      var d_main_publicsub_adminimagesub = d_main + '/' + d_publicsub  + '/' + d_adminimagesub;
      $("#data").val(d_main_publicsub_adminimagesub);

        if($('#adminimagesub').val() == 'images') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').show(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').show(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});


$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#websub').change(function(){

      var d_main = $('#main').val();
      var d_publicsub = $('#publicsub').val();
      var d_websub = $('#websub').val();
      var d_main_publicsub_websub = d_main + '/' + d_publicsub + '/' + d_websub;
      $("#data").val(d_main_publicsub_websub);

        if($('#websub').val() == 'images') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').show(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').show(); 
            $('#webimagesub').show(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else{
          $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').show(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').show(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        }
    });
});

$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#webimagesub').change(function(){

      var d_main = $('#main').val();
      var d_publicsub = $('#publicsub').val();
      var d_websub = $('#websub').val();
      var d_webimagesub = $('#webimagesub').val();
      var d_main_publicsub_websub_webimagesub = d_main + '/' + d_publicsub + '/' + d_websub + '/' + d_webimagesub;
      $("#data").val(d_main_publicsub_websub_webimagesub);

        if($('#webimagesub').val() == 'images') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').show(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').show(); 
            $('#webimagesub').show(); 
            $('#resourcessub').hide();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});


$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#resourcessub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_main_resourcessub = d_main + '/' + d_resourcessub;
      $("#data").val(d_main_resourcessub);

        if($('#resourcessub').val() == 'assets') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').show();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#resourcessub').val() == 'lang') {
          $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').show();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#resourcessub').val() == 'views') {
          $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
          }
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#assetssub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_assetssub = $('#assetssub').val();
      var d_main_resourcessub_assetssub = d_main + '/' + d_resourcessub + '/' + d_assetssub;
      $("#data").val(d_main_resourcessub_assetssub);

        if($('#assetssub').val() == 'js') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').show();
            $('#jssub').show();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#jssub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_assetssub = $('#assetssub').val();
      var d_jssub = $('#jssub').val();
      var d_main_resourcessub_assetssub_jssub = d_main + '/' + d_resourcessub + '/' + d_assetssub + '/' + d_jssub;
      $("#data").val(d_main_resourcessub_assetssub_jssub);

        if($('#jssub').val() == 'components') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').show();
            $('#jssub').show();
            $('#langsub').hide();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#langsub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_langsub = $('#langsub').val();
      var d_main_resourcessub_assetssub_langsub = d_main + '/' + d_resourcessub + '/' + d_langsub;
      $("#data").val(d_main_resourcessub_assetssub_langsub);

        if($('#langsub').val() == 'en') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').show();
            $('#viewssub').hide();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});




$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewssub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_main_resourcessub_assetssub_viewssub = d_main + '/' + d_resourcessub + '/' + d_viewssub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub);


      if($('#viewssub').val() == 'admin') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        }  else if($('#viewssub').val() == 'auth') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').show();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewssub').val() == 'ipay') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewssub').val() == 'mail') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewssub').val() == 'web') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').show();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});




$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewadminsub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewadminsub = $('#viewadminsub').val();
      var d_main_resourcessub_assetssub_viewssub_viewadminsub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewadminsub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewadminsub);


        if($('#viewadminsub').val() == 'customers') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').show();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewadminsub').val() == 'deliveryboys') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').show();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewadminsub').val() == 'pages') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').show();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewadminsub').val() == 'products') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').show();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewadminsub').val() == 'products_attributes') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').show();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewadminsub').val() == 'settings') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').show();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        }
    });
});




$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewadminproductssub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewadminsub = $('#viewadminsub').val();
      var d_viewadminproductssub = $('#viewadminproductssub').val();
      var d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminproductssub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewadminsub + '/' + d_viewadminproductssub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminproductssub);


        if($('#viewadminproductssub').val() == 'images' || $('#viewadminproductssub').val() == 'videos') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').show();
            $('#viewadminproductsimagesub').show();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else{
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').show();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        }
    });
});





$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewadminproductsimagesub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewadminsub = $('#viewadminsub').val();
      var d_viewadminproductssub = $('#viewadminproductssub').val();
      var d_viewadminproductsimagesub = $('#viewadminproductsimagesub').val();
      var d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminproductssub_viewadminproductsimagesub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewadminsub + '/' + d_viewadminproductssub + '/' + d_viewadminproductsimagesub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminproductssub_viewadminproductsimagesub);


        if($('#viewadminproductsimagesub').val() == 'modal') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').show();
            $('#viewadminproductsimagesub').show();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});




$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewadminproductsattrsub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewadminsub = $('#viewadminsub').val();
      var d_viewadminproductsattrsub = $('#viewadminproductsattrsub').val();
      var d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminproductsattrsub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewadminsub  + '/' + d_viewadminproductsattrsub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminproductsattrsub);


        if($('#viewadminproductsattrsub').val() == 'options') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').show();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewadminsettingssub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewadminsub = $('#viewadminsub').val();
      var d_viewadminsettingssub = $('#viewadminsettingssub').val();
      var d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminsettingssub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewadminsub + '/' + d_viewadminsettingssub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminsettingssub);

        if($('#viewadminsettingssub').val() == 'app') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').show();
            $('#viewadminsettingsappsub').show();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewadminsettingssub').val() == 'general') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').show();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').show();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewadminsettingssub').val() == 'web') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').show();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').show();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});




$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewadminsettingsappsub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewadminsub = $('#viewadminsub').val();
      var d_viewadminsettingssub = $('#viewadminsettingssub').val();
      var d_viewadminsettingsappsub = $('#viewadminsettingsappsub').val();
      var d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminsettingssub_viewadminsettingsappsub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewadminsub + '/' + d_viewadminsettingssub + '/' + d_viewadminsettingsappsub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminsettingssub_viewadminsettingsappsub);


        if($('#viewadminsettingsappsub').val() == 'app') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').show();
            $('#viewadminsettingsappsub').show();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});




$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewadminsettingsgeneralsub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewadminsub = $('#viewadminsub').val();
      var d_viewadminsettingssub = $('#viewadminsettingssub').val();
      var d_viewadminsettingsgeneralsub = $('#viewadminsettingsgeneralsub').val();
      var d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminsettingssub_viewadminsettingsgeneralsub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewadminsub + '/' + d_viewadminsettingssub + '/' + d_viewadminsettingsgeneralsub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminsettingssub_viewadminsettingsgeneralsub);


        if($('#viewadminsettingsgeneralsub').val() == 'general') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').show();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').show();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewadminsettingswebsub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewadminsub = $('#viewadminsub').val();
      var d_viewadminsettingssub = $('#viewadminsettingssub').val();
      var d_viewadminsettingswebsub = $('#viewadminsettingswebsub').val();
      var d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminsettingssub_viewadminsettingswebsub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewadminsub + '/' + d_viewadminsettingssub + '/' + d_viewadminsettingswebsub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewadminsub_viewadminsettingssub_viewadminsettingswebsub);


        if($('#viewadminsettingswebsub').val() == 'web') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').show();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').show();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').show();
            $('#viewswebsub').hide();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewswebsub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewswebsub = $('#viewswebsub').val();
      var d_main_resourcessub_assetssub_viewssub_viewswebsub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewswebsub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewswebsub);
      
        if($('#viewswebsub').val() == 'common') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').show();
            $('#viewswebcommonsub').show();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewswebsub').val() == 'details') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').show();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').show();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewswebsub').val() == 'headers') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').show();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').show();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewswebsub').val() == 'footers') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').show();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').show();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } else if($('#viewswebsub').val() == 'tickets') {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').show();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').show(); 
        }  else {
            $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').show();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        }
    });
});




$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewswebcommonsub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewswebsub = $('#viewswebsub').val();
      var d_viewswebcommonsub = $('#viewswebcommonsub').val();
      var d_main_resourcessub_assetssub_viewssub_viewswebsub_viewswebcommonsub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewswebsub + '/' + d_viewswebcommonsub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewswebsub_viewswebcommonsub);

        if($('#viewswebcommonsub').val() == 'common') {
          $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').show();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewswebdetailsub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewswebsub = $('#viewswebsub').val();
      var d_viewswebdetailsub = $('#viewswebdetailsub').val();
      var d_main_resourcessub_assetssub_viewssub_viewswebsub_viewswebdetailsub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewswebsub + '/' + d_viewswebdetailsub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewswebsub_viewswebdetailsub);

        if($('#viewswebdetailsub').val() == 'details') {
          $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').show();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewswebfootersub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewswebsub = $('#viewswebsub').val();
      var d_viewswebfootersub = $('#viewswebfootersub').val();
      var d_main_resourcessub_assetssub_viewssub_viewswebsub_viewswebfootersub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewswebsub + '/' + d_viewswebfootersub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewswebsub_viewswebfootersub);

        if($('#viewswebfootersub').val() == 'footers') {
          $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').show();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});




$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewswebheadersub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewswebsub = $('#viewswebsub').val();
      var d_viewswebheadersub = $('#viewswebheadersub').val();
      var d_main_resourcessub_assetssub_viewssub_viewswebsub_viewswebheadersub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewswebsub + '/' + d_viewswebheadersub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewswebsub_viewswebheadersub);

        if($('#viewswebheadersub').val() == 'headers') {
          $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').show();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 
    });
});



$(document).ready(function(){
    $('#appsub').hide(); 
    $('#httpsub').hide(); 
    $('#controllersub').hide(); 
    $('#middlewaresub').hide(); 
    $('#modelsub').hide();
    $('#publicsub').hide(); 
    $('#adminsub').hide(); 
    $('#adminimagesub').hide(); 
    $('#websub').hide(); 
    $('#webimagesub').hide(); 
    $('#resourcessub').hide();
    $('#assetssub').hide();
    $('#jssub').hide();
    $('#langsub').hide();
    $('#viewssub').hide();
    $('#authsub').hide();
    $('#viewadminsub').hide();
    $('#viewadmincustomersub').hide();
    $('#viewadmindeliveryboysub').hide();
    $('#viewadminpagessub').hide();
    $('#viewadminproductssub').hide();
    $('#viewadminproductsimagesub').hide();
    $('#viewadminproductsattrsub').hide();
    $('#viewadminsettingssub').hide();
    $('#viewadminsettingsappsub').hide();
    $('#viewadminsettingsgeneralsub').hide();
    $('#viewadminsettingswebsub').hide();
    $('#viewswebsub').hide();
    $('#viewswebcommonsub').hide();
    $('#viewswebdetailsub').hide();
    $('#viewswebfootersub').hide();
    $('#viewswebheadersub').hide();
    $('#viewswebticketsub').hide(); 

    $('#viewswebticketsub').change(function(){

      var d_main = $('#main').val();
      var d_resourcessub = $('#resourcessub').val();
      var d_viewssub = $('#viewssub').val();
      var d_viewswebsub = $('#viewswebsub').val();
      var d_viewswebticketsub = $('#viewswebticketsub').val();
      var d_main_resourcessub_assetssub_viewssub_viewswebsub_viewswebticketsub = d_main + '/' + d_resourcessub + '/' + d_viewssub + '/' + d_viewswebsub + '/' + d_viewswebticketsub;
      $("#data").val(d_main_resourcessub_assetssub_viewssub_viewswebsub_viewswebticketsub);

        if($('#viewswebticketsub').val() == 'tickets') {
          $('#appsub').hide(); 
            $('#httpsub').hide(); 
            $('#controllersub').hide(); 
            $('#middlewaresub').hide(); 
            $('#modelsub').hide();
            $('#publicsub').hide(); 
            $('#adminsub').hide(); 
            $('#adminimagesub').hide(); 
            $('#websub').hide(); 
            $('#webimagesub').hide(); 
            $('#resourcessub').show();
            $('#assetssub').hide();
            $('#jssub').hide();
            $('#langsub').hide();
            $('#viewssub').show();
            $('#authsub').hide();
            $('#viewadminsub').hide();
            $('#viewadmincustomersub').hide();
            $('#viewadmindeliveryboysub').hide();
            $('#viewadminpagessub').hide();
            $('#viewadminproductssub').hide();
            $('#viewadminproductsimagesub').hide();
            $('#viewadminproductsattrsub').hide();
            $('#viewadminsettingssub').hide();
            $('#viewadminsettingsappsub').hide();
            $('#viewadminsettingsgeneralsub').hide();
            $('#viewadminsettingswebsub').hide();
            $('#viewswebsub').show();
            $('#viewswebcommonsub').hide();
            $('#viewswebdetailsub').hide();
            $('#viewswebfootersub').hide();
            $('#viewswebheadersub').hide();
            $('#viewswebticketsub').hide(); 
        } 

    });
});
  
</script>

<script>
  	$('.pay-success-set').hide();
  $(document).on('click', '.default_pay_method', function(){
    var method_id = $(this).val();
	var status = $('#status-'+method_id).val();
    $.ajax({
      url: '{{ URL::to("/payment_active")}}',
      type: "POST",
      headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      data: '&method_id='+method_id,
      success: function (data) {
        if(status == 0)
		{
			$('.pay-success-set').show();
			$('#status-'+method_id).val(1);
			$('#pay-success-msg').html('payment method Updated sucessfully');
		}
		else
		{
			$('.pay-success-set').show();
			$('#status-'+method_id).val(0);
			$('#pay-success-msg').html('payment method removed sucessfully');
		}
      },
    });
  });
  </script>

  <script>
    var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="row"><div class="col-sm-3 nopadding"><div class="form-group"><label>Label Name</label><input type="text" class="form-control" name="label_name[]"  placeholder="Enter Label name"></div></div><div class="col-sm-3 nopadding"><div class="form-group"><label>Label Value</label><input type="text" class="form-control"  name="label_value[]"  placeholder="Enter Label Value"></div></div><div class="input-group-btn" style="margin-top:32px"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="fa fa-minus" aria-hidden="true"></span> </button></div></div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>

<script>
  $("#cap_amount").hide();
  $("#discount_type").change(function(){
      if($(this).val() == "percent"){
          $("#cap_amount").show();
      } else{
        $("#cap_amount").hide();
      }
  });

  $("#rpoint").hide();
    $('#discount_type_edit').change(function() {
        var svalue=$(this).val();
        //alert(svalue);
        if(svalue=='percent') {
             $("#rpoint").hide();
             $("#editrpoint").show();
        } else {
             $("#rpoint").show();
             $("#editrpoint").hide();
        }
   });
</script>

<script>
  $('.allselect').on("select2:select", function (e) { 
        var data = e.params.data.text;
        if(data=='Select All'){
          $(".allselect > option").prop("selected","selected");
          $(".allselect").trigger("change");
        }
  });

  
</script>

<script>

  var minLength = 6;
  $(document).ready(function(){
      $('#txtNewPassword').keyup(function() {
          var char = $(this).val();
          var charLength = $(this).val().length;
          if(charLength < minLength){
              $('#warning-message').text('Length is short, minimum '+minLength+' required.');
          }else{
              $('#warning-message').text('');
          }
      });
  });

  $(function() {
    $("#txtConfirmPassword").keyup(function() {
        var password = $("#txtNewPassword").val();
        $("#divCheckPasswordMatch").html(password == $(this).val() ? "" : "Passwords do not match!");
    });

  });
</script>


<script type="text/javascript">
  $("#response").hide();

  $(function() {
    $(".table_sorting tbody").sortable({ opacity: 0.8, cursor: 'move', update: function() {
      var order = $(this).sortable("serialize") + '&update=update'; 
      $.post("{{url('/plan_sorting')}}", order, function(theResponse){
        $("#response").html(theResponse);
        $("#response").slideDown('slow');
        slideout();
      });
    }
    });
  });

  function slideout(){
    setTimeout(function(){
        $("#response").slideUp("slow", function () {
    });
    
  }, 2000);}
</script>



<script>
  $(document).on('click', '#delete_merchant_otp', function(){
    var shop_id = $('#shop_id').val();
    var shop_name = $('#shop_name').val();

    $.ajax({
      url: '{{ URL::to("/del_mer_otp_send")}}',
      type: "POST",
      headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      data: '&shop_id='+shop_id+'&shop_name='+shop_name,
      success: function (data) {
        $('#delete-merchant-otp').modal('hide')
        $('#delete-merchant').modal('show')
      },
    });
  });
  </script>

<script>
  $(document).on('click', '#delete_merch', function(){
    var shop_id = $('#shop_id').val();
    var otp = $('#otp').val();

    $.ajax({
      url: '{{ URL::to("/delete_merchant")}}',
      type: "POST",
      headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
      data: '&shop_id='+shop_id+'&otp='+otp,
      success: function (data) {
        if(data == 'success'){
          $('#delete-merchant').modal('hide');
          window.location.href='{{ URL::to("/merchant")}}';
        }else{
          $('#delete-merchant').modal('show');
          $('#delete-merchant_result').text('invalid OTP');
        }
      },
    });
  });
  </script>
  <script>
  $('#district').on('change', function () {
                var idTaluk = this.value;
                $("#taluk").html('');
                $.ajax({
                    url: "{{url('/gettaluk')}}",
                    type: "POST",
                    data: {
                        taluk_id: idTaluk,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#taluk').html('<option value="">-- Select Taluk Name --</option>');
                        $.each(result, function (key, value) {
                            $("#taluk").append('<option value="' + value
                                .id + '">' + value.taluk_name + '</option>');
                        });
                        $('#panchayath').html('<option value="">-- Select Panchayath --</option>');
                    }   
                });
            });
  $('#taluk').on('change', function () {
                var idPanchayath = this.value;
                $("#panchayath").html('');
                $.ajax({
                    url: "{{url('/getpanchayath')}}",
                    type: "POST",
                    data: {
                        panchayath_id: idPanchayath,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#panchayath').html('<option value="">-- Select Panchayath Name --</option>');
                        $.each(result, function (key, value) {
                            $("#panchayath").append('<option value="' + value
                                .id + '">' + value.panchayath_name + '</option>');
                        });
                    }   
                });
            });
</script>

  <script>
  $('#block').on('change', function () {
                var idroom = this.value;
                $("#room").html('');
                $.ajax({
                    url: "{{url('/getroom')}}",
                    type: "POST",
                    data: {
                        room_id: idroom,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#room').html('<option value="">-- Select Room --</option>');
                        $.each(result, function (key, value) {
                            $("#room").append('<option value="' + value
                                .id + '">' + value.room_name + '</option>');
                        });
                        $('#bed').html('<option value="">-- Select Bed --</option>');
                    }   
                });
            });
  $('#room').on('change', function () {
                var idbed= this.value;
                $("#bed").html('');
                $.ajax({
                    url: "{{url('/getbed')}}",
                    type: "POST",
                    data: {
                        bed_id: idbed,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#bed').html('<option value="">-- Select Bed --</option>');
                        $.each(result, function (key, value) {
                            $("#bed").append('<option value="' + value
                                .id + '">' + value.bed_number + '</option>');
                        });
                    }   
                });
            });
</script>

<script>
function duplicateEmail(id){
    var email = $("#email").val();
    var _token = $('input[name="_token"]').val();
    $.ajax({
        type: "post",
        url: '{{ ('checkemail') }}',
        data:{id:id,email:email, _token:_token},
        success: function(res) {
            if(res.exists){
                $("#dupemail").html("User already exists");
                $("#save").prop('disabled', true);
            }else{
                $("#dupemail").html("");
                $("#save").prop('disabled', false);
            }
        },
        error: function (jqXHR, exception) {
            console.log(exception);
        }
    });
}
</script>
<script>
   $(".alert-success").fadeTo(3000, 1000).slideUp(1000, function(){
            $(".alert-success").slideUp(1000);
        });
</script>

<script>  
   function ageCalculator() {  
       var userinput = document.getElementById("DOB").value;  
       var dob = new Date(userinput);  
       if(userinput==null || userinput=='') {  
         document.getElementById("message").innerHTML = "**Choose a date please!";    
         return false;   
       } else {  
         
       //calculate month difference from current date in time  
       var month_diff = Date.now() - dob.getTime();  
         
       //convert the calculated difference in date format  
       var age_dt = new Date(month_diff);   
         
       //extract year from date      
       var year = age_dt.getUTCFullYear();  
         
       //now calculate the age of the user  
       var age = Math.abs(year - 1970);  
         
       //display the calculated age  
       return document.getElementById("result").innerHTML =    
                "" + age + "";  
       }  
   }  
</script>  
<script>
   function submitBday() {
    var Q4A = "";
    var Bdate = document.getElementById('bday').value;
    var Bday = +new Date(Bdate);
    Q4A += + ~~ ((Date.now() - Bday) / (31557600000));
    var theBday = document.getElementById('resultBday');
    theBday.innerHTML = Q4A;
}
   
</script>