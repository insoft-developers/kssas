
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $setting->admin_title }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('template/frontend/images') }}/{{ $setting->favicon }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('template/backend') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template/backend') }}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('template/backend') }}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template/backend') }}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('template/backend') }}/dist/css/skins/_all-skins.min.css">
  
  @if($view == 'bo-dashboard')
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('template/backend') }}/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('template/backend') }}/bower_components/jvectormap/jquery-jvectormap.css">
  @endif
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('template/backend') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('template/backend') }}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('template/backend') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/backend') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  
        .img-tutup {
            width: 30px;
            height: 30px;
            position: absolute;
            top: -12px;
            right: 5px;
            cursor: pointer;
            display:none;
        }
        
        .img-pinjaman {
            border: 2px dashed red;
            cursor: pointer;
            border-radius: 8px;
            width: 164px;
            height: 129px;
        }
        
        .reset-form {
            float: right;
            background: linear-gradient(45deg, #60c94e, #b3c5f3);
            color: white;
            padding-left: 10px;
            padding-right: 10px;
            font-size: 14px;
            padding-top: 3px;
            padding-bottom: 3px;
            cursor: pointer;
            border-radius: 3px;
            margin-right:14px;
        }
        
        .btn-action {
            width: 76px !important;
            border: 1px solid;
            padding: 3px 5px 3px 5px;
            font-size: 11px;
            border-radius: 22px;
            background: white;
            display: block;
        }
        
        
        #table_anggota_length,#table_bo_saving_length,#table_financing_length,#table_bo_withdraw_length {
            margin-top:10px;
        }
        
        .img-status{
            position: absolute;
            top: 71px !important;
            right: 66px !important;
        }
        
        .table-cantik {
           font-size: 13px;
            background: linear-gradient(#d5eeee, #aeaece); 
        }
        
        .table-menawan {
            white-space: nowrap;
           font-size: 13px;
            background: linear-gradient(#d5eeee, #aeaece); 
        }
        
        #table_pinjaman_profile {
           font-size: 13px;
            background: linear-gradient(#d5eeee, #aeaece); 
        }
        
        #table_simpanan_profile {
           font-size: 13px;
            background: linear-gradient(#d5eeee, #aeaece); 
        }
  
        .img-me {
          width: 100px;
          height: 100px;
          Object-fit: cover;
          border-radius: 50px;
          padding: 3px;
          background: #8a6f61;
          position: relative;
          margin-left: 65px;

        }
        
        .img-customer {
            width: 68px;
            height: 88px;
            border-radius: 4px;
            border: 2px solid #b8e8e3;
            Object-fit: cover;
            cursor: pointer;
        }
        
        .badge-success {
            background: green;
            color: white;
            font-size: 12px;
            padding-left: 5px;
            padding-right: 5px;
            padding-top: 4px;
            padding-bottom: 4px;
            border-radius: 4px;
        }
        
        .badge-danger{
            background: red;
            color: white;
            font-size: 12px;
            padding-left: 5px;
            padding-right: 5px;
            padding-top: 4px;
            padding-bottom: 4px;
            border-radius: 4px;
        }
  
        .btn-me {
           height: auto !important;
            display: inline-block;
            width: 24px;
            text-align: center;
            padding: 2px;
            border-radius: 19px;
            margin-left: 5px;
            margin-top: 3px;
            cursor: pointer; 
        }
       
       .img-mitra {
            width: 120px;
            height: 120px;
            border-radius: 2px;
            border: 1px solid whitesmoke;
        }
       
       .img-staff{
            width: 100px;
            height: 121px;
            border-radius: 5px;    
        }
        
       .header-image {
            width: 100%;
            height: 183px;
            Object-fit: cover;
            border-radius: 5px;
            border: 2px dashed red;
            cursor: pointer;
       }        
        
       .body-box {
          padding:40px; 
       }    
  
      .img-topic{
        display:block;  
        width: 110px;
        height: 110px;
        border: 2px dashed red;
        padding: 9px;
        cursor: pointer;
        Object-fit: cover;
      }
      
      .img-master-slider{
        width: 180px;
        height: 110px;
        border-radius: 5px;    
      }
      
      .overlay {
            background: #1a67f1;
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            z-index: 9;
            opacity: 0.2;
        }
      .loading {
            width: 100px;
            height: 100px;
            position: fixed;
            z-index: 99999;
            left: 47%;
            top: 40%;
      }
      
  </style>
  
  
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>-</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ $setting->short_name }}</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!--<li class="dropdown notifications-menu">-->
          <!--  <a href="#" class="dropdown-toggle" data-toggle="dropdown">-->
          <!--    <i class="fa fa-bell-o"></i>-->
          <!--    <span class="label label-warning">10</span>-->
          <!--  </a>-->
            <!--<ul class="dropdown-menu">-->
            <!--  <li class="header">You have 10 notifications</li>-->
            <!--  <li>-->
                <!-- inner menu: contains the actual data -->
            <!--    <ul class="menu">-->
            <!--      <li>-->
            <!--        <a href="#">-->
            <!--          <i class="fa fa-users text-aqua"></i> 5 new members joined today-->
            <!--        </a>-->
            <!--      </li>-->
            <!--      <li>-->
            <!--        <a href="#">-->
            <!--          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the-->
            <!--          page and may cause design problems-->
            <!--        </a>-->
            <!--      </li>-->
            <!--      <li>-->
            <!--        <a href="#">-->
            <!--          <i class="fa fa-users text-red"></i> 5 new members joined-->
            <!--        </a>-->
            <!--      </li>-->
            <!--      <li>-->
            <!--        <a href="#">-->
            <!--          <i class="fa fa-shopping-cart text-green"></i> 25 sales made-->
            <!--        </a>-->
            <!--      </li>-->
            <!--      <li>-->
            <!--        <a href="#">-->
            <!--          <i class="fa fa-user text-red"></i> You changed your username-->
            <!--        </a>-->
            <!--      </li>-->
            <!--    </ul>-->
            <!--  </li>-->
            <!--  <li class="footer"><a href="#">View all</a></li>-->
            <!--</ul>-->
          <!--</li>-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('template/frontend/images/user') }}/{{ Auth::user()->profile_image }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('template/frontend/images/user') }}/{{ Auth::user()->profile_image }}" class="img-circle" alt="User Image">
                @php
                    $jabatan = \App\Models\Jabatan::findorFail(Auth::user()->level);
                @endphp
                <p>
                  {{ Auth::user()->name }} - {{ $jabatan->jabatan }}
                  <small>{{ Auth::user()->email }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ url('exit') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  @include('backend.menu')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  @yield('content')
  </div>
  <div style="display:none;" class="overlay" id="overlay"></div>
  <img style="display:none;" id="loading" class="loading" src="{{ asset('template/frontend/images') }}/loading.gif">
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> {{ $setting->versi }}
    </div>
    <strong>Copyright &copy; <?= date('Y') ;?> <a href="{{ $setting->website }}">{{ $setting->company_name }}</a>.</strong> All rights
    reserved.
  </footer>

  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('template/backend') }}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('template/backend') }}/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('template/backend') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
@if($view == 'bo-dashboard')
<!-- Morris.js charts -->
<script src="{{ asset('template/backend') }}/bower_components/raphael/raphael.min.js"></script>
<script src="{{ asset('template/backend') }}/bower_components/morris.js/morris.min.js"></script>
@endif
<!-- Sparkline -->
<script src="{{ asset('template/backend') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="{{ asset('template/backend') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{ asset('template/backend') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('template/backend') }}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('template/backend') }}/bower_components/moment/min/moment.min.js"></script>
<script src="{{ asset('template/backend') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{ asset('template/backend') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('template/backend') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{ asset('template/backend') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('template/backend') }}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- DataTables -->
<script src="{{ asset('template/backend') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('template/backend') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ asset('template/backend') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
@if($view == 'bo-dashboard')
<script src="{{ asset('template/backend') }}/dist/js/pages/dashboard.js"></script>
@endif
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template/backend') }}/dist/js/demo.js"></script>
<script src="{{ asset('template/backend') }}//bower_components/ckeditor/ckeditor.js"></script>
<script>

    function loading() {
        $("#overlay").show();
        $("#loading").show();
    }
    
    function unloading() {
        $("#overlay").hide();
        $("#loading").hide();
    }
    
    function show_alert(judul, text, icon) {
        Swal.fire({
          title: judul,
          text: text,
          icon: icon
        });
    }
    
    
</script>
@if($view == 'register-user-upload')
    <script>
        
        function deleteData(id) {
            var p = confirm("Hapus Data..?");
            if(p=== true) {
                confirm_delete(id);    
            }
        }
        
        function confirm_delete(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('form.upload.delete') }}",
                type: "POST",
                dataType: "JSON",
                data: {"id":id, "_token":csrf_token},
                success: function(data) {
                    window.location = "{{ url('register_user_upload') }}";
                }
            })
        }
        
        function editForm(id) {
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('form.upload.update') }}",
                type: "POST",
                dataType: "JSON",
                data: {"id":id, "_token":csrf_token},
                success: function(data) {
                    window.location = "{{ url('register_user_upload') }}";
                }
            })
        }
        
        
        $("#table_user_upload").DataTable();
    </script>
@endif
@if($view == 'bo-dashboard')
    <script>
    
        var area = new Morris.Area({
        element   : 'revenue-chart',
        resize    : true,
        data      : [
          { y: '<?= date('Y-01');?>', item1: 2666, item2: '<?= $wd1 ;?>' },
          { y: '<?= date('Y-02');?>', item1: 2778, item2: '<?= $wd2 ;?>' },
          { y: '<?= date('Y-03');?>', item1: 4912, item2: '<?= $wd3 ;?>' },
          { y: '<?= date('Y-04');?>', item1: 3767, item2: '<?= $wd4 ;?>' },
          { y: '<?= date('Y-05');?>', item1: 6810, item2: '<?= $wd5 ;?>' },
          { y: '<?= date('Y-06');?>', item1: 5670, item2: '<?= $wd6 ;?>' },
          { y: '<?= date('Y-07');?>', item1: 4820, item2: '<?= $wd7 ;?>' },
          { y: '<?= date('Y-08');?>', item1: 15073, item2: '<?= $wd8 ;?>' },
          { y: '<?= date('Y-09');?>', item1: 10687, item2: '<?= $wd9 ;?>' },
          { y: '<?= date('Y-10');?>', item1: 8432, item2: '<?= $wd10 ;?>' },
          { y: '<?= date('Y-11');?>', item1: 8432, item2: '<?= $wd11 ;?>' },
          { y: '<?= date('Y-12');?>', item1: '<?= $l12 ;?>', item2: '<?= $wd12 ;?>' }
        ],
        xkey      : 'y',
        ykeys     : ['item1', 'item2'],
        labels    : ['Item 1', 'Item 2'],
        lineColors: ['#a0d0e0', '#3c8dbc'],
        hideHover : 'auto'
      });
    </script>

@endif

@if($view == 'backoffice-profile')
<script>
    $('#display_profile').click(function(){ $('#profile_image').trigger('click'); });
    
    $("#profile_image").change(function() {
        document.getElementById('display_profile').src = window.URL.createObjectURL(this.files[0]);
    
    });
</script>

@endif

@if($view == 'backoffice-financing')
    <script>
          var imagePlaceholder = "{{ asset('template/frontend/images/image_placeholder.png') }}";
          var noImage = "{{ asset('template/frontend/images/noimage.png') }}";
          
          
          function simpan(id) {
              var jumlah = $("#input_jumlah_dibayar_"+id).val();
              if(jumlah == '') {
                  alert('Jumlah pembayaran tidak boleh kosong');
              } else {
                  var lanjut = confirm('anda akan menyimpan data pembayaran ini? data tidak bisa di ubah setelah penyimpanan');
                  if(lanjut == true) {
                      loading();
                      var csrf_token = $('meta[name="csrf-token"]').attr('content');
                      $.ajax({
                          url : "{{ url('bayar_cicilan') }}",
                          type : "POST",
                          dataType : "JSON",
                          data : {id:id, jumlah:jumlah,  '_token':csrf_token },
                          success : function(data) {
                              unloading();
                              alert('Pembayaran Sukses');
                              $("#modal-payment").modal("hide");
                          }
                      })
                  }
              }
          }        
          
          function bayar(id) {
              var jumlah_cicilan = $("#input_cicilan_"+id).val();
              $("#text_jumlah_dibayar_"+id).hide();
              $("#input_jumlah_dibayar_"+id).show();
              $("#input_jumlah_dibayar_"+id).val(jumlah_cicilan);
              $("#btn_bayar_"+id).hide();
              $("#btn_cancel_"+id).show();
              $("#btn_simpan_"+id).show();
              
          }
          
          function cancel(id) {
              $("#text_jumlah_dibayar_"+id).show();
              $("#input_jumlah_dibayar_"+id).hide();
              $("#btn_bayar_"+id).show();
              $("#btn_cancel_"+id).hide();
              $("#btn_simpan_"+id).hide();
              
          }
          
          function payData(id) {
              loading();
              $.ajax({
                 url : "{{ url('payment_show') }}"+"/"+id,
                 type : "GET",
                 success : function(data) {
                    console.log(data); 
                    $("#pembiayaan-modal-payment").html(data);
                    $("#modal-payment").modal("show"); 
                    unloading();
                 }
              });
              
          }
          
          
          function onApproveLoan() {
              var id = $("#id_detail").val();
              var popup = confirm('Approve Data Ini...?');
              if(popup == true) {
                  loading();
                  var csrf_token = $('meta[name="csrf-token"]').attr('content');
                  $.ajax({
                      url : "{{ url('loan_approve') }}",
                      type : "POST",
                      dataType : "JSON",
                      data: {id:id, '_token':csrf_token},
                      success : function(data) {
                          $("#modal-detail").modal("hide");
                          table.ajax.reload(null,false);
                          unloading();
                      }
                      
                  })
              }
          }
          
          
          
          function onProcessLoan() {
              var id = $("#id_detail").val();
              var popup = confirm('Process Data Ini...?');
              if(popup == true) {
                  loading();
                  var csrf_token = $('meta[name="csrf-token"]').attr('content');
                  $.ajax({
                      url : "{{ url('loan_process') }}",
                      type : "POST",
                      dataType : "JSON",
                      data: {id:id, '_token':csrf_token},
                      success : function(data) {
                          $("#modal-detail").modal("hide");
                          table.ajax.reload(null,false);
                          unloading();
                      }
                      
                  })
              }
          }
          
          
          function onResetLoan() {
              var id = $("#id_detail").val();
              var popup = confirm('Reset Data Ini...?');
              if(popup == true) {
                  loading();
                  var csrf_token = $('meta[name="csrf-token"]').attr('content');
                  $.ajax({
                      url : "{{ url('loan_reset') }}",
                      type : "POST",
                      dataType : "JSON",
                      data: {id:id, '_token':csrf_token},
                      success : function(data) {
                          $("#modal-detail").modal("hide");
                          table.ajax.reload(null,false);
                          unloading();
                      }
                      
                  })
              }
          }
          
          
          
          function detailForm(id) {
              loading();
              $.ajax({
                 url : "{{ url('financing') }}"+"/"+id,
                 type : "GET",
                 success: function(data) {
                     console.log(data);
                     unloading();
                     $("#id_detail").val(id);
                     $("#pembiayaan-modal-content").html(data.html);
                     $("#modal-detail").modal("show");
                     if(data.data.status_loan == 1) {
                         $("#btn_process_loan").show();
                         $("#btn_approve_loan").hide();
                         $("#btn_reset_loan").hide();
                     }
                     else if(data.data.status_loan == 2) {
                         $("#btn_process_loan").hide();
                         $("#btn_approve_loan").show();
                         $("#btn_reset_loan").show();
                     }
                     else if(data.data.status_loan == 3) {
                         $("#btn_process_loan").hide();
                         $("#btn_approve_loan").hide();
                         $("#btn_reset_loan").hide();
                     }
                     
                 }
              });
              
          }
          
          
              
          var table = $('#table_financing').DataTable({
              dom: 'Blfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
              ],

              processing:true,
              serverSide:true,
              ajax: "{{ route('api.financing') }}",
              order: [[2, 'desc']],
              columns: [
                
                {data:'action', name: 'action', orderable:false, searchable:false},
                {data:'created_at', name: 'created_at'},
                {data:'id', name: 'id'},
                {data:'customer_id_pinjaman', name: 'customer_id_pinjaman'},
                {data:'product_id', name: 'product_id'},
                {data:'nilai_pengajuan', name: 'nilai_pengajuan'},
                {data:'dp', name: 'dp'},
                {data:'total_harga', name: 'total_harga'},
                {data:'sisa_dibayar', name: 'sisa_dibayar'},
                {data:'periode', name: 'periode'},
                {data:'angsuran_pokok', name: 'angsuran_pokok'},
                {data:'pembayaran', name: 'pembayaran'},
                {data:'sisa', name: 'sisa'},
                
                {data:'status_loan', name: 'status_loan'},
                
              ]
          });
          
       
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-tambah').modal('show');
              $('#modal-tambah form')[0].reset();
              reset_isian();
              $('.modal-title').text('Tambah Data Pembiayaan');
          }
          
          
          $('#form-tambah').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('financing') }}";
              else url = "{{ url('financing') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData($('#modal-tambah form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-tambah').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              var URL_PINJAMAN = "{{ asset('template/frontend/images/pinjaman') }}" ;
              
              loading();
              save_method = 'edit';
              $('input[name=_method]').val('PATCH');
              $('#modal-tambah form')[0].reset();
              $.ajax({
                  url: "{{ url('financing') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                    unloading();
                    $('#modal-tambah').modal("show");
                    $('.modal-title').text("Edit Data Pembiayaan");
                    $("#angsuran_jasa").val(data.angsuran_jasa);
                    $("#angsuran_pokok").val(data.angsuran_pokok);
                    $("#customer_id_pinjaman").val(data.customer_id_pinjaman);
                    $("#dp").val(data.dp);
                    $("#gaji_pokok").val(data.gaji_pokok);
                    $("#id").val(data.id);
                    $("#image1").val(null);
                    $("#image2").val(null);
                    $("#image3").val(null);
                    if(data.image1 != null) {
                        $("#display_image1").attr("src", URL_PINJAMAN+'/'+data.image1);
                    }
                    if(data.image2 != null) {
                        $("#display_image2").attr("src", URL_PINJAMAN+'/'+data.image2);
                    }
                    if(data.image3 != null) {
                        $("#display_image3").attr("src", URL_PINJAMAN+'/'+data.image3);
                    }
                    
                    
                    $("#iuran_pensiun").val(data.iuran_pensiun);
                    $("#jamsostek").val(data.jamsostek);
                    $("#keterangan").val(data.keterangan);
                    $("#komentar").val(data.komentar);
                    $("#nilai_pengajuan").val(data.nilai_pengajuan);
                    $("#no_rekening").val(data.no_rekening);
                    $("#pajak_penghasilan").val(data.pajak_penghasilan);
                    $("#pembiayaan_lama").val(data.pembiayaan_lama);
                    $("#periode").val(data.periode);
                    $("#persentase").val(data.persentase);
                    $("#potongan_baru").val(data.potongan_baru);
                    $("#potongan_kssas").val(data.potongan_kssas);
                    $("#potongan_selain_kssas").val(data.potongan_selain_kssas);
                    $("#product_id").val(data.product_id);
                    $("#saldo_gaji_netto").val(data.saldo_gaji_netto);
                    $("#shift_premium").val(data.shift_premium);
                    $("#sisa_dibayar").val(data.sisa_dibayar);
                    $("#status_loan").val(data.status_loan);
                    $("#tanggal_masuk_kerja").val(data.tanggal_masuk_kerja);
                    $("#tanggal_pensiun").val(data.tanggal_pensiun);
                    $("#telepon").val(data.telepon);
                    $("#total_harga").val(data.total_harga);
                    $("#total_potongan").val(data.total_potongan);
                    $("#total_tunjangan").val(data.total_tunjangan);
                    $("#tunjangan_daerah").val(data.tunjangan_daerah);
                    $("#tunjangan_lain").val(data.tunjangan_lain);
                    $("#tunjangan_manajemen").val(data.tunjangan_manajemen);
                    $("#tunjangan_posisi").val(data.tunjangan_posisi);
                    $("#umur").val(data.umur);

                      
                }
              });
          }
          
          
          
          function deleteForm(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('financing') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
         $('#display_image1').click(function(){ $('#image1').trigger('click'); });
         $('#display_image2').click(function(){ $('#image2').trigger('click'); });
         $('#display_image3').click(function(){ $('#image3').trigger('click'); });
         
         $("#image1").change(function() {
            document.getElementById('display_image1').src = window.URL.createObjectURL(this.files[0]);
            $("#tutup1").show();
         });
         
         $("#image2").change(function() {
            document.getElementById('display_image2').src = window.URL.createObjectURL(this.files[0]); 
            $("#tutup2").show();
         });
         
         $("#image3").change(function() {
            document.getElementById('display_image3').src = window.URL.createObjectURL(this.files[0]); 
            $("#tutup3").show();
         });
         
         $("#tutup1").click(function(){
             $("#display_image1").attr('src', imagePlaceholder);
             $("#image1").val(null);
             $(this).hide();
         });
         
         
         $("#tutup2").click(function(){
             $("#display_image2").attr('src', imagePlaceholder);
             $("#image2").val(null);
             $(this).hide();
         });
         
         
         $("#tutup3").click(function(){
             $("#display_image3").attr('src', imagePlaceholder);
             $("#image3").val(null);
             $(this).hide();
         });
         
         
         $(".reset-form").click(function() {
             reset_isian();
         });
         
         
         function reset_isian() {
             $("#tanggal_pensiun").val("");
             $("#tanggal_masuk_kerja").val("");
             $("#telepon").val("");
             $("#no_rekening").val("");
             $("#gaji_pokok").val("");
             $("#tunjangan_posisi").val("");
             $("#tunjangan_manajemen").val("");
             $("#tunjangan_daerah").val("");
             $("#shift_premium").val("");
             $("#tunjangan_lain").val("");
             $("#total_tunjangan").val("");
             $("#pajak_penghasilan").val("");
             $("#iuran_pensiun").val("");
             $("#jamsostek").val("");
             $("#potongan_kssas").val("");
             $("#potongan_selain_kssas").val("");
             $("#total_potongan").val("");
             $("#product_id").val("");
             $("#nilai_pengajuan").val("");
             $("#dp").val("");
             $("#periode").val("");
             $("#angsuran_jasa").val("");
             $("#potongan_baru").val("");
             $("#pembiayaan_lama").val("");
             $("#persentase").val("");
             $("#total_harga").val("");
             $("#sisa_dibayar").val("");
             $("#angsuran_pokok").val("");
             $("#saldo_gaji_netto").val("");
             $("#keterangan").val("");
             $("#komentar").val("");
             $("#image1").val(null);
             $("#image2").val(null);
             $("#image3").val(null);
             $("#display_image1").attr('src', imagePlaceholder);
             $("#display_image2").attr('src', imagePlaceholder);
             $("#display_image3").attr('src', imagePlaceholder);
             $("#tutup1").hide();
             $("#tutup2").hide();
             $("#tutup3").hide();
         }
         
         
         $("#customer_id_pinjaman").change(function(){
            var id = $(this).val();
            loading();
            $.ajax({
                url : "{{ url('count_age') }}"+"/"+id,
                type : "GET",
                dataType : "JSON",
                success : function(data) {
                    unloading();
                    $("#umur").val(data);
                    console.log(data);
                }
            })
         });
         
         function hitung_total_tunjangan() {
              var gajipokok = $("#gaji_pokok").val();
              if(gajipokok == '') {
                  gajipokok = 0;
              }
              
              var tunjanganposisi = $("#tunjangan_posisi").val();
              if(tunjanganposisi == '') {
                  tunjanganposisi = 0;
              }
              
              var tunjanganmanajemen = $("#tunjangan_manajemen").val();
              if(tunjanganmanajemen == '') {
                  tunjanganmanajemen = 0;
              }
              
              
              var tunjangandaerah = $("#tunjangan_daerah").val();
              if(tunjangandaerah == '') {
                  tunjangandaerah = 0;
              }
              
              var shiftpremium = $("#shift_premium").val();
              if(shiftpremium == '') {
                  shiftpremium = 0;
              }
              
              var tunjanganlain = $("#tunjangan_lain").val();
              if(tunjanganlain == '') {
                  tunjanganlain = 0;
              }
                
              var total_tunjangan = parseInt(gajipokok) + parseInt(tunjanganposisi) + parseInt(tunjanganmanajemen) + parseInt(tunjangandaerah) + parseInt(shiftpremium) + parseInt(tunjanganlain);      
              $("#total_tunjangan").val(total_tunjangan);
              kalkulasi_sisa_gaji();
          }
          
          
          $(".tunjangan").keyup(function(){
             hitung_total_tunjangan(); 
          });
          
          
          function hitung_total_potongan() {
              var pajak = $("#pajak_penghasilan").val();
              if(pajak == '') {
                  pajak = 0;
              }
              
              var pensiun = $("#iuran_pensiun").val();
              if(pensiun == '') {
                  pensiun = 0;
              }
              
              var jamsostek = $("#jamsostek").val();
              if(jamsostek == '') {
                  jamsostek = 0;
              }
              
              
              var kssas = $("#potongan_kssas").val();
              if(kssas == '') {
                  kssas = 0;
              }
              
              var selain_kssas = $("#potongan_selain_kssas").val();
              if(selain_kssas == '') {
                  selain_kssas = 0;
              }
              
              
              var total_potongan = parseInt(pajak) + parseInt(pensiun) + parseInt(jamsostek) + parseInt(kssas) + parseInt(selain_kssas);      
              $("#total_potongan").val(total_potongan);  
              kalkulasi_sisa_gaji();
          }
          
          
          $(".potongan").keyup(function(){
             hitung_total_potongan(); 
          });
          
          
          $("#periode").change(function(){
              loading();
              var productId = $("#product_id").val();
              var nilaiPengajuan = $("#nilai_pengajuan").val();
              var dp = $("#dp").val();
              var lama = $(this).val();
              var csrf_token = $('meta[name="csrf-token"]').attr('content');
              
              if(productId == '') {
                  return show_alert("Error", "Produk Tidak Boleh Kosong...!", "error");
              }
              
              $.ajax({
                  url : "{{ url('kalkulasi_pinjaman') }}",
                  type : "POST",
                  dataType : "JSON",
                  data : {'productId':productId, 
                            'nilaiPengajuan':nilaiPengajuan, 
                            'dp':dp, 
                            'lama':lama,
                            '_token':csrf_token },
                  success : function(data) {
                      unloading();
                      $("#angsuran_jasa").val("0");
                      $("#potongan_baru").val(data.angsuran);
                      $("#pembiayaan_lama").val("0");
                      $("#persentase").val(data.persentase);
                      $("#total_harga").val(data.total_harga);
                      $("#sisa_dibayar").val(data.sisa);
                      $("#angsuran_pokok").val(data.angsuran);
                      hitung_sisa_gaji(data.angsuran);
                      
                  }
              })
              
          });
          
          function kalkulasi_sisa_gaji() {
              var totalTunjangan = $("#total_tunjangan").val();
              var totalPotongan = $("#total_potongan").val();
              var angsuranPokok = $("#angsuran_pokok").val();
              
              if(totalTunjangan == '') {
                  totalTunjangan = 0;
              }
              if(totalPotongan == '') {
                  totalPotongan = 0;
              }
              if(angsuranPokok == '') {
                  angsuranPokok = 0;
              }
              
              var sisaGaji = parseInt(totalTunjangan) - parseInt(totalPotongan) - parseInt(angsuranPokok);
              $("#saldo_gaji_netto").val(sisaGaji);
          }
          
          
          function hitung_sisa_gaji(angsuran) {
              var totalTunjangan = $("#total_tunjangan").val();
              var totalPotongan = $("#total_potongan").val();
              if(totalTunjangan == '') {
                  totalTunjangan = 0;
              }
              if(totalPotongan == '') {
                  totalPotongan = 0;
              }
              
              var sisaGaji = parseInt(totalTunjangan) - parseInt(totalPotongan) - parseInt(angsuran);
              $("#saldo_gaji_netto").val(sisaGaji);
          }
          
          
    </script>
@endif

@if($view == 'backoffice-withdraw')
    <script>
    
          function processData(id) {
              var popup = confirm('Proses Data Penarikan Ini...?');
              if(popup == true) {
                  loading();
                  var csrf_token = $('meta[name="csrf-token"]').attr('content');
                  $.ajax({
                      url : "{{ url('withdraw_process') }}",
                      type : "POST",
                      dataType : "JSON",
                      data : {id:id, '_token':csrf_token},
                      success : function(data) {
                          unloading();
                          if(data.success) {
                              table.ajax.reload(null, false); 
                              alert(data.message);
                          } else {
                              alert(data.message);
                          }
                                    
                      }
                  });
              }
          }
          
          
          
          function approveData(id) {
              var popup = confirm('Approve Data Penarikan Ini...?');
              if(popup == true) {
                  loading();
                  var csrf_token = $('meta[name="csrf-token"]').attr('content');
                  $.ajax({
                      url : "{{ url('withdraw_approve') }}",
                      type : "POST",
                      dataType : "JSON",
                      data : {id:id, '_token':csrf_token},
                      success : function(data) {
                          unloading();
                          if(data.success) {
                              table.ajax.reload(null, false); 
                              alert(data.message);
                          } else {
                              alert(data.message);
                          }
                      }
                  });
              }
          }
          
          
          
          function rejectData(id) {
              var popup = confirm('Reset Data Penarikan Ini...?');
              if(popup == true) {
                  loading();
                  var csrf_token = $('meta[name="csrf-token"]').attr('content');
                  $.ajax({
                      url : "{{ url('withdraw_reset') }}",
                      type : "POST",
                      dataType : "JSON",
                      data : {id:id, '_token':csrf_token},
                      success : function(data) {
                          unloading();
                          table.ajax.reload(null, false);            
                      }
                  });
              }
          }
    
    
          var table = $('#table_bo_withdraw').DataTable({
              dom: 'Blfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
              ],

              processing:true,
              serverSide:true,
              ajax: "{{ route('api.withdraw') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'customer_id', name: 'customer_id'},
                {data:'type', name: 'type'},
                {data:'amount', name: 'amount'},
                {data:'reason', name: 'reason'},
                {data:'status', name: 'status'},
                {data:'created_at', name: 'created_at'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-tambah').modal('show');
              $('#modal-tambah form')[0].reset();
              $('.modal-title').text('Tambah Simpanan Anggota');
          }
          
          
          $('#form-tambah').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('saving') }}";
              else url = "{{ url('saving') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData($('#modal-tambah form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-tambah').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $('input[name=_method]').val('PATCH');
              $('#modal-tambah form')[0].reset();
              $.ajax({
                  url: "{{ url('saving') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-tambah').modal("show");
                      $('.modal-title').text("Edit Simpanan Anggota");
                      $('#id').val(data.id);
                      $("#customer_id").val(data.customer_id);
                      $("#product_id").val(data.product_id);
                      $("#amount_in").val(data.amount_in);
                      $("#description").val(data.description);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('saving') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif

@if($view == 'backoffice-saving')
    <script>
          var table = $('#table_bo_saving').DataTable({
              dom: 'Blfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
              ],
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.saving') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'customer_id', name: 'customer_id'},
                {data:'product_id', name: 'product_id'},
                {data:'amount_in', name: 'amount_in'},
                {data:'amount_out', name: 'amount_out'},
                {data:'description', name: 'description'},
                {data:'created_at', name: 'created_at'},
                {data:'status', name: 'status'},
                
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-tambah').modal('show');
              $('#modal-tambah form')[0].reset();
              $('.modal-title').text('Tambah Simpanan Anggota');
          }
          
          
          $('#form-tambah').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('saving') }}";
              else url = "{{ url('saving') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData($('#modal-tambah form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-tambah').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $('input[name=_method]').val('PATCH');
              $('#modal-tambah form')[0].reset();
              $.ajax({
                  url: "{{ url('saving') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-tambah').modal("show");
                      $('.modal-title').text("Edit Simpanan Anggota");
                      $('#id').val(data.id);
                      $("#customer_id").val(data.customer_id);
                      $("#product_id").val(data.product_id);
                      $("#amount_in").val(data.amount_in);
                      $("#description").val(data.description);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('saving') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
          function approveForm(id) {
              var tambah = confirm('Dengan mengapprove data ini saldo simpanan anggota tsb akan otomatis bertambah..!');
              if(tambah == true) {
                  var csrf_token = $('meta[name="csrf-token"]').attr('content');
                  loading();
                    $.ajax({
                        url  : "{{ url('saving_approve') }}",
                        type : "POST",
                        data : {id:id, '_token':csrf_token},
                        success : function(data){
                                unloading();
                                table.ajax.reload(null, false);
                        }
                    });
              }
          }
          
          
    </script>
@endif

@if($view == 'backoffice-slider')
    <script>
          var table = $('#table_slider').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.slider') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'judul', name: 'judul'},
                {data:'gambar', name: 'gambar'},
                {data:'is_active', name: 'is_active'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-slider').modal('show');
              $('#modal-slider form')[0].reset();
              $('.modal-title').text('Tambah Data Slider');
              $("#gambar").attr('required', true);
          }
          
          
          $('#form-slider').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('slider') }}";
              else url = "{{ url('slider') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData($('#modal-slider form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-slider').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $("#gambar").removeAttr('required');
              $('input[name=_method]').val('PATCH');
              $('#modal-slider form')[0].reset();
              $.ajax({
                  url: "{{ url('slider') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-slider').modal("show");
                      $('.modal-title').text("Edit Data Slider");
                      $('#id').val(data.id);
                      $("#judul").val(data.judul);
                      $("#is_active").val(data.is_active);
                      $("#gambar").val(null);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('slider') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif

@if($view == 'backoffice-topic')
    <script>
    
    
    
        CKEDITOR.replace('judul');
        CKEDITOR.replace('isi');
        CKEDITOR.replace('sub_isi1');
        CKEDITOR.replace('sub_isi2');
        CKEDITOR.replace('sub_isi3');
        CKEDITOR.replace('sub_judul1');
        CKEDITOR.replace('sub_judul2');
        CKEDITOR.replace('sub_judul3');
        
        
        initTopicData(1);
        
        $('#display_image1').click(function(){ $('#gambar1').trigger('click'); });
        $('#display_image2').click(function(){ $('#gambar2').trigger('click'); });
        $('#display_image3').click(function(){ $('#gambar3').trigger('click'); });
        
        $("#gambar1").change(function() {
            document.getElementById('display_image1').src = window.URL.createObjectURL(this.files[0]);
        
        });
        $("#gambar2").change(function() {
            document.getElementById('display_image2').src = window.URL.createObjectURL(this.files[0]);
        
        });
        $("#gambar3").change(function() {
            document.getElementById('display_image3').src = window.URL.createObjectURL(this.files[0]);
        
        });
        
        function initTopicData(id) {
            loading();
            $.ajax({
                url : "{{ url('topic') }}"+"/"+id+"/edit",
                type: "GET",
                dataType : "JSON",
                success : function(data) {
                    unloading();
                    console.log(data);
                    CKEDITOR.instances.judul.setData(data.judul);
                    CKEDITOR.instances.isi.setData(data.isi);
                    CKEDITOR.instances.sub_judul1.setData(data.sub_judul1);
                    CKEDITOR.instances.sub_judul2.setData(data.sub_judul2);
                    CKEDITOR.instances.sub_judul3.setData(data.sub_judul3);
                    CKEDITOR.instances.sub_isi1.setData(data.sub_isi1);
                    CKEDITOR.instances.sub_isi2.setData(data.sub_isi2);
                    CKEDITOR.instances.sub_isi3.setData(data.sub_isi3);
                }
            })
        }
        
        
    </script>
@endif

@if($view == 'backoffice-benefit')
    <script>
          var table = $('#table_benefit').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.benefit') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'list_keuntungan', name: 'list_keuntungan'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-benefit').modal('show');
              $('#modal-benefit form')[0].reset();
              $('.modal-title').text('Tambah Data Keuntungan Menjadi Anggota');
          }
          
          
          $('#form-benefit').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('benefit') }}";
              else url = "{{ url('benefit') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData($('#modal-benefit form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-benefit').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $('input[name=_method]').val('PATCH');
              $('#modal-benefit form')[0].reset();
              $.ajax({
                  url: "{{ url('benefit') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-benefit').modal("show");
                      $('.modal-title').text("Edit Keuntungan Menjadi Anggota");
                      $('#id').val(data.id);
                      $("#list_keuntungan").val(data.list_keuntungan);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('benefit') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif



@if($view == 'backoffice-about')
<script>

    $('#display_image1').click(function(){ $('#visi_icon').trigger('click'); });
    $('#display_image2').click(function(){ $('#misi_icon').trigger('click'); });
    $('#display_image3').click(function(){ $('#tujuan_icon').trigger('click'); });
    $('#display_image4').click(function(){ $('#about_header_image').trigger('click'); });
    
    $("#visi_icon").change(function() {
        document.getElementById('display_image1').src = window.URL.createObjectURL(this.files[0]);
    
    });
    $("#misi_icon").change(function() {
        document.getElementById('display_image2').src = window.URL.createObjectURL(this.files[0]);
    
    });
    $("#tujuan_icon").change(function() {
        document.getElementById('display_image3').src = window.URL.createObjectURL(this.files[0]);
    
    });
    
     $("#about_header_image").change(function() {
        document.getElementById('display_image4').src = window.URL.createObjectURL(this.files[0]);
    
    });
    
    
    CKEDITOR.replace('judul_visi_misi');
    CKEDITOR.replace('visi');
    CKEDITOR.replace('misi');
    CKEDITOR.replace('tujuan');
    CKEDITOR.replace('about_title');
    CKEDITOR.replace('about_content');
    
    initAboutData(1);
    
    function initAboutData(id) {
        loading();
        $.ajax({
            url : "{{ url('backabout') }}"+"/"+id+"/edit",
            type : "GET",
            dataType : "JSON",
            success : function(data) {
                unloading();
                console.log(data);
                CKEDITOR.instances.judul_visi_misi.setData(data.judul_visi_misi);
                CKEDITOR.instances.visi.setData(data.visi);
                CKEDITOR.instances.misi.setData(data.misi);
                CKEDITOR.instances.tujuan.setData(data.tujuan);
                CKEDITOR.instances.about_title.setData(data.about_title);
                CKEDITOR.instances.about_content.setData(data.about_content);
            }
        })
    }
    
</script>

@endif

@if($view == 'backoffice-video')
    <script>
          var table = $('#table_video').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.video') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'link_video', name: 'link_video'},
                {data:'title', name: 'title'},
                {data:'is_home', name: 'is_home'},
                {data:'is_active', name: 'is_active'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-video').modal('show');
              $('#modal-video form')[0].reset();
              $('.modal-title').text('Tambah Data Video');
          }
          
          
          $('#form-video').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('video') }}";
              else url = "{{ url('video') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData($('#modal-video form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-video').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $('input[name=_method]').val('PATCH');
              $('#modal-video form')[0].reset();
              $.ajax({
                  url: "{{ url('video') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-video').modal("show");
                      $('.modal-title').text("Edit Video List");
                      $('#id').val(data.id);
                      $("#link_video").val(data.link_video);
                      $("#title").val(data.title);
                      $("#is_home").val(data.is_home);
                      $("#is_active").val(data.is_active);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('video') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif


@if($view == 'backoffice-product')
    <script>
            
          CKEDITOR.replace('product_desc');
              
          var table = $('#table_product').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.produk') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'product_name', name: 'product_name'},
                {data:'product_category', name: 'product_category'},
                {data:'product_description', name: 'product_description'},
                {data:'product_image', name: 'product_image'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-product').modal('show');
              $('#modal-product form')[0].reset();
              $('.modal-title').text('Tambah Data Product');
              $("#product_image").attr('required', true);
          }
          
          
          $('#form-product').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('produk') }}";
              else url = "{{ url('produk') .'/'}}"+ id;
              var form_data = new FormData($('#modal-product form')[0]);
              var description = CKEDITOR.instances.product_desc.getData();
              form_data.append('product_description', description);
              
              $.ajax({
                  url : url,
                  type : "POST",
                  data :  form_data ,
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-product').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $("#product_image").removeAttr('required');
              $('input[name=_method]').val('PATCH');
              $('#modal-product form')[0].reset();
              $.ajax({
                  url: "{{ url('produk') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-product').modal("show");
                      $('.modal-title').text("Edit Data Produk");
                      $('#id').val(data.id);
                      $("#product_name").val(data.product_name);
                      $("#product_category").val(data.product_category);
                      CKEDITOR.instances.product_desc.setData(data.product_description);
                      $("#product_image").val(null);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('produk') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif


@if($view == 'backoffice-staff')
    <script>
          var table = $('#table_staff').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.staff') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'staff_name', name: 'staff_name'},
                {data:'position', name: 'position'},
                {data:'staff_image', name: 'staff_image'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-staff').modal('show');
              $('#modal-staff form')[0].reset();
              $('.modal-title').text('Tambah Data Staff');
              $("#staff_image").attr('required', true);
          }
          
          
          $('#form-staff').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('staff') }}";
              else url = "{{ url('staff') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data :  new FormData($('#modal-staff form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-staff').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $("#staff_image").removeAttr('required');
              $('input[name=_method]').val('PATCH');
              $('#modal-staff form')[0].reset();
              $.ajax({
                  url: "{{ url('staff') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-staff').modal("show");
                      $('.modal-title').text("Edit Data Staff");
                      $('#id').val(data.id);
                      $("#staff_name").val(data.staff_name);
                      $("#position").val(data.position);
                      $("#staff_image").val(null);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('staff') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif


@if($view == 'backoffice-mitra')
    <script>
          var table = $('#table_mitra').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.mitra') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'logo', name: 'logo'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-mitra').modal('show');
              $('#modal-mitra form')[0].reset();
              $('.modal-title').text('Tambah Data Mitra');
              $("#logo").attr('required', true);
          }
          
          
          $('#form-mitra').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('mitra') }}";
              else url = "{{ url('mitra') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data :  new FormData($('#modal-mitra form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-mitra').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $("#logo").removeAttr('required');
              $('input[name=_method]').val('PATCH');
              $('#modal-mitra form')[0].reset();
              $.ajax({
                  url: "{{ url('mitra') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-mitra').modal("show");
                      $('.modal-title').text("Edit Data Mitra");
                      $('#id').val(data.id);
                      $("#logo").val(null);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('mitra') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif

@if($view == 'backoffice-rapat')
    <script>
          var table = $('#table_rapat').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.rapat') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'judul', name: 'judul'},
                {data:'waktu', name: 'waktu'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-rapat').modal('show');
              $('#modal-rapat form')[0].reset();
              $('.modal-title').text('Tambah Data RAT');
          }
          
          
          $('#form-rapat').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('rapat') }}";
              else url = "{{ url('rapat') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData($('#modal-rapat form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-rapat').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $('input[name=_method]').val('PATCH');
              $('#modal-rapat form')[0].reset();
              $.ajax({
                  url: "{{ url('rapat') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-rapat').modal("show");
                      $('.modal-title').text("Edit RAT");
                      $('#id').val(data.id);
                      $("#judul").val(data.judul);
                      $("#waktu").val(data.waktu);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('rapat') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif

@if($view == 'backoffice-galery')
    <script>
          var table = $('#table_galery').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.galery') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'foto', name: 'foto'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-tambah').modal('show');
              $('#modal-tambah form')[0].reset();
              $('.modal-title').text('Tambah Foto RAT');
              $("#foto").attr('required', true);
          }
          
          
          $('#form-tambah').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('galery') }}";
              else url = "{{ url('galery') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data :  new FormData($('#modal-tambah form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-tambah').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $("#foto").removeAttr('required');
              $('input[name=_method]').val('PATCH');
              $('#modal-tambah form')[0].reset();
              $.ajax({
                  url: "{{ url('galery') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-tambah').modal("show");
                      $('.modal-title').text("Edit Foto RAT");
                      $('#id').val(data.id);
                      $("#foto").val(null);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('galery') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif

@if($view == 'backoffice-document')
    <script>
          var table = $('#table_document').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.document') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'document_name', name: 'document_name'},
                {data:'document_link', name: 'document_link'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-tambah').modal('show');
              $('#modal-tambah form')[0].reset();
              $('.modal-title').text('Tambah Data Dokumen');
          }
          
          
          $('#form-tambah').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('document') }}";
              else url = "{{ url('document') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData($('#modal-tambah form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-tambah').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $('input[name=_method]').val('PATCH');
              $('#modal-tambah form')[0].reset();
              $.ajax({
                  url: "{{ url('document') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-tambah').modal("show");
                      $('.modal-title').text("Edit Dokumen Legal");
                      $('#id').val(data.id);
                      $("#document_name").val(data.document_name);
                      $("#document_link").val(data.document_link);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('document') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif

@if($view == 'backoffice-legalfaq')
    <script>
          CKEDITOR.replace('pertanyaan_input');
          CKEDITOR.replace('jawaban_input');
          
          var table = $('#table_legalfaq').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.legalfaq') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'pertanyaan', name: 'pertanyaan'},
                {data:'jawaban', name: 'jawaban'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-tambah').modal('show');
              $('#modal-tambah form')[0].reset();
              $('.modal-title').text('Tambah FAQ Legal');
          }
          
          
          $('#form-tambah').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('legalfaq') }}";
              else url = "{{ url('legalfaq') .'/'}}"+ id;
              var form_data = new FormData($('#modal-tambah form')[0]);
              var pertanyaan = CKEDITOR.instances.pertanyaan_input.getData();
              var jawaban = CKEDITOR.instances.jawaban_input.getData();
              form_data.append('pertanyaan', pertanyaan);
              form_data.append('jawaban', jawaban);
              
              $.ajax({
                  url : url,
                  type : "POST",
                  data : form_data,
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-tambah').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $('input[name=_method]').val('PATCH');
              $('#modal-tambah form')[0].reset();
              $.ajax({
                  url: "{{ url('legalfaq') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-tambah').modal("show");
                      $('.modal-title').text("Edit Legal Faq");
                      $('#id').val(data.id);
                      CKEDITOR.instances.pertanyaan_input.setData(data.pertanyaan);
                      CKEDITOR.instances.jawaban_input.setData(data.jawaban);
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('legalfaq') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif

@if($view == 'backoffice-berita')
    <script>
          
          CKEDITOR.replace('isi_input');
          var table = $('#table_berita').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.berita') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'judul', name: 'judul'},
                {data:'isi', name: 'isi'},
                {data:'tag', name: 'tag'},
                {data:'tanggal', name: 'tanggal'},
                {data:'author', name: 'author'},
                {data:'image', name: 'image'},
                {data:'is_popular', name: 'is_popular'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-tambah').modal('show');
              $('#modal-tambah form')[0].reset();
              $('.modal-title').text('Tambah Berita');
              $("#image").attr('required', true);
          }
          
          
          $('#form-tambah').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('news') }}";
              else url = "{{ url('news') .'/'}}"+ id;
              var form_data = new FormData($('#modal-tambah form')[0]);
              var content = CKEDITOR.instances.isi_input.getData();
              form_data.append('isi', content);
              
              $.ajax({
                  url : url,
                  type : "POST",
                  data : form_data,
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-tambah').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $("#image").removeAttr('required');
              $('input[name=_method]').val('PATCH');
              $('#modal-tambah form')[0].reset();
              $.ajax({
                  url: "{{ url('news') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-tambah').modal("show");
                      $('.modal-title').text("Edit Berita");
                      $('#id').val(data.id);
                      $("#judul").val(data.judul);
                      CKEDITOR.instances.isi_input.setData(data.isi);
                      $("#tag").val(data.tag);
                      $("#author").val(data.author);
                      $("#is_popular").val(data.is_popular);
                      $("#image").val(null);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('news') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif

@if($view == 'backoffice-faq')
    <script>
          CKEDITOR.replace('pertanyaan_input');
          CKEDITOR.replace('jawaban_input');
          
          var table = $('#table_faq').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.faq') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'pertanyaan', name: 'pertanyaan'},
                {data:'jawaban', name: 'jawaban'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-tambah').modal('show');
              $('#modal-tambah form')[0].reset();
              $('.modal-title').text('Tambah FAQ');
          }
          
          
          $('#form-tambah').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('faqs') }}";
              else url = "{{ url('faqs') .'/'}}"+ id;
              var form_data = new FormData($('#modal-tambah form')[0]);
              var pertanyaan = CKEDITOR.instances.pertanyaan_input.getData();
              var jawaban = CKEDITOR.instances.jawaban_input.getData();
              form_data.append('pertanyaan', pertanyaan);
              form_data.append('jawaban', jawaban);
              
              $.ajax({
                  url : url,
                  type : "POST",
                  data : form_data,
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-tambah').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $('input[name=_method]').val('PATCH');
              $('#modal-tambah form')[0].reset();
              $.ajax({
                  url: "{{ url('faqs') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-tambah').modal("show");
                      $('.modal-title').text("Edit Faq");
                      $('#id').val(data.id);
                      CKEDITOR.instances.pertanyaan_input.setData(data.pertanyaan);
                      CKEDITOR.instances.jawaban_input.setData(data.jawaban);
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('faqs') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif

@if($view == 'backoffice-setting')
    <script>
        CKEDITOR.replace('term');
        CKEDITOR.replace('privacy');
        CKEDITOR.replace('riba');
        CKEDITOR.replace('map_text');
        
        initSettingData(1);
        
        $('#display_logo').click(function(){ $('#logo').trigger('click'); });
        $('#display_footer_logo').click(function(){ $('#footer_logo').trigger('click'); });
        $('#display_favicon').click(function(){ $('#favicon').trigger('click'); });
        $('#display_product_header').click(function(){ $('#product_image_header').trigger('click'); });
        $('#display_berita_header').click(function(){ $('#berita_image_header').trigger('click'); });
        $('#display_faq_header').click(function(){ $('#faq_image_header').trigger('click'); });
        $('#display_contact_header').click(function(){ $('#contact_image_header').trigger('click'); });
        
        
        $("#logo").change(function() {
            document.getElementById('display_logo').src = window.URL.createObjectURL(this.files[0]);
        });
        $("#footer_logo").change(function() {
            document.getElementById('display_footer_logo').src = window.URL.createObjectURL(this.files[0]);
        });
        $("#favicon").change(function() {
            document.getElementById('display_favicon').src = window.URL.createObjectURL(this.files[0]);
        });
        
        $("#product_image_header").change(function() {
            document.getElementById('display_product_header').src = window.URL.createObjectURL(this.files[0]);
        });
        
        $("#berita_image_header").change(function() {
            document.getElementById('display_berita_header').src = window.URL.createObjectURL(this.files[0]);
        });
        $("#faq_image_header").change(function() {
            document.getElementById('display_faq_header').src = window.URL.createObjectURL(this.files[0]);
        });
        $("#contact_image_header").change(function() {
            document.getElementById('display_contact_header').src = window.URL.createObjectURL(this.files[0]);
        });
        
        function initSettingData(id) {
            loading();
            $.ajax({
                url : "{{ url('setting') }}"+"/"+id+"/edit",
                type: "GET",
                dataType : "JSON",
                success : function(data) {
                    unloading();
                    console.log(data);
                    CKEDITOR.instances.term.setData(data.term);
                    CKEDITOR.instances.privacy.setData(data.privacy);
                    CKEDITOR.instances.riba.setData(data.riba);
                    $("#website_title").val(data.website_title);
                    $("#admin_title").val(data.admin_title);
                    $("#short_name").val(data.short_name);
                    $("#company_name").val(data.company_name);
                    $("#phone").val(data.phone);
                    $("#email").val(data.email);
                    $("#lokasi").val(data.lokasi);
                    $("#jam_kerja").val(data.jam_kerja);
                    $("#map_lokasi").val(data.map_lokasi);
                    $("#map_text").val(data.map_text);
                    $("#website").val(data.website);
                    $("#versi").val(data.versi);
                    $("#facebook").val(data.facebook);
                    $("#twitter").val(data.twitter);
                    $("#instagram").val(data.instagram);
                    $("#youtube").val(data.youtube);
                    $("#whatsapp").val(data.whatsapp);
                    
                }
            })
        }
        
        
    </script>
@endif

@if($view == 'backoffice-product-setting')
    <script>
    
          function delete_product_item(id) {
              
              var popup = confirm('Hapus Data Ini...?');
              if(popup == true) {
                  var csrf_token = $('meta[name="csrf-token"]').attr('content');
                  loading();
                  $.ajax({
                      url : "{{ url('delete_product_item') }}",
                      type : "POST",
                      dataType : "JSON",
                      data : {id:id, '_token':csrf_token},
                      success : function(data) {
                          unloading();
                          table.ajax.reload(null, false);
                      }
                  })
              }
              
              
          }    
          
          
          
          function save_setting(id) {
              var csrf_token = $('meta[name="csrf-token"]').attr('content');
              loading();
              var productId = id;
              var productTerm = $("#term_product_"+id).val();
              var productRate = $("#rate_product_"+id).val();
              
              if(productTerm == '') {
                  unloading();
              } 
              else if(productRate == '') {
                  unloading();
              }
              else {
                  $.ajax({
                      url : "{{ url('update_rate') }}",
                      type : "POST",
                      dataType : "JSON",
                      data : {'_token':csrf_token, productId:productId, productTerm:productTerm, productRate:productRate},
                      success : function(data) {
                          unloading();
                          table.ajax.reload(null, false);
                      }
                  })
              }
          }
          
                  
          function add_product_rate(id) {
              $("#term_product_"+id).show();
              $("#rate_product_"+id).show();
              $("#btn_add_product_item_"+id).hide();
              $("#btn_save_product_item_"+id).show();
              $("#btn_cancel_product_item_"+id).show();
              $("#term_text_"+id).hide();
              $("#rate_text_"+id).hide();
          }
          
          
          function cancel_setting(id) {
              $("#term_product_"+id).hide();
              $("#rate_product_"+id).hide();
              $("#term_text_"+id).show();
              $("#rate_text_"+id).show();
              $("#btn_add_product_item_"+id).show();
              $("#btn_save_product_item_"+id).hide();
              $("#btn_cancel_product_item_"+id).hide();
              
          }
          
          
    
          var table = $('#table_product_setting').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.proset') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'product_name', name: 'product_name'},
                {data:'description', name: 'description'},
                
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-benefit').modal('show');
              $('#modal-benefit form')[0].reset();
              $('.modal-title').text('Tambah Data Keuntungan Menjadi Anggota');
          }
          
          
          $('#form-benefit').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('benefit') }}";
              else url = "{{ url('benefit') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData($('#modal-benefit form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-benefit').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $('input[name=_method]').val('PATCH');
              $('#modal-benefit form')[0].reset();
              $.ajax({
                  url: "{{ url('benefit') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-benefit').modal("show");
                      $('.modal-title').text("Edit Keuntungan Menjadi Anggota");
                      $('#id').val(data.id);
                      $("#list_keuntungan").val(data.list_keuntungan);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('benefit') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif

@if($view == 'backoffice-membership')
    <script>
          
          function activate() {
              $("#modal-activate").modal("show");
          }
          
          
          function disactivate() {
              $("#modal-disactivate").modal("show");
          }
          
          
          function displayActivate(id) {
              $("#id_anggota_register").val(id);
              $("#modal-activate").modal("show");
          }
          
          function displayDisactivate(id) {
              $("#id_anggota_remove").val(id);
              $("#modal-disactivate").modal("show");
          }
          
          
          
          $("#table_simpanan_profile").DataTable();    
    
          var table = $('#table_anggota').DataTable({
               dom: 'Blfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, 'All'],
              ],
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.membership') }}",
              order: [[2, 'desc']],
              columns: [
                {data:'action', name: 'action', orderable:false, searchable:false},
                {data:'is_active', name: 'is_active'},
                {data:'id', name: 'id'},
                {data:'file_image', name: 'file_image'},
                {data:'nama', name: 'nama'},
                {data:'tempat_lahir', name: 'tempat_lahir'},
                {data:'alamat', name: 'alamat'},
                {data:'nip', name: 'nip'},
                {data:'fungsi', name: 'fungsi'},
                {data:'jenis_kelamin', name: 'jenis_kelamin'},
                {data:'telepon', name: 'telepon'},
                {data:'email', name: 'email'},
               
                
              ]
          });
          
          function detailData(id) {
              $("#modal-detail").modal("show");
          }
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-slider').modal('show');
              $('#modal-slider form')[0].reset();
              $('.modal-title').text('Tambah Data Slider');
              $("#gambar").attr('required', true);
          }
          
          
          $('#form-tambah').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('membership') }}";
              else url = "{{ url('membership') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData($('#modal-tambah form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-tambah').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $("#file_image").removeAttr('required');
              $('input[name=_method]').val('PATCH');
              $('#modal-tambah form')[0].reset();
              $.ajax({
                  url: "{{ url('membership') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-tambah').modal("show");
                      $('.modal-title').text("Edit Data Anggota");
                      $('#id').val(data.id);
                      $("#nama").val(data.nama);
                      $("#nip").val(data.nip);
                      $("#fungsi").val(data.fungsi);
                      $("#jenis_kelamin").val(data.jenis_kelamin);
                      $("#telepon").val(data.telepon);
                      $("#email").val(data.email);
                      $("#alamat").val(data.alamat);
                      $("#istri").val(data.istri);
                      $("#tempat_lahir").val(data.tempat_lahir);
                      $("#tanggal_lahir").val(data.tanggal_lahir);
                      $("#nama_ibu").val(data.nama_ibu);
                      $("#jabatan").val(data.jabatan);
                      $("#file_image").val(null);
                      $("#lama_pemotongan").val(data.lama_pemotongan);
                      $("#jumlah_potongan").val(data.jumlah_potongan);
                      $("#mulai_berlaku").val(data.mulai_berlaku);
                      $("#tahun").val(data.tahun);
                      $("#simpanan_pokok").val(data.simpanan_pokok);
                      $("#simpanan_wajib").val(data.simpanan_wajib);
                      $("#simpanan_sukarela").val(data.simpanan_sukarela);
                }
              });
          }
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('membership') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
          function activate_confirm(id) {
              var csrf_token = $('meta[name="csrf-token"]').attr('content');
              loading();
              $.ajax({
                 url : "{{ url('register_activate') }}",
                 type : "POST",
                 dataType : "JSON",
                 data : {id:id, '_token':csrf_token},
                 success : function(data) {
                     unloading();
                     window.location = "{{ url('membership') }}"+"/"+id;
                 }
              });
          }
         
          function disactivate_confirm(id) {
              var csrf_token = $('meta[name="csrf-token"]').attr('content');
              loading();
              $.ajax({
                 url : "{{ url('register_unactivate') }}",
                 type : "POST",
                 dataType : "JSON",
                 data : {id:id, '_token':csrf_token},
                 success : function(data) {
                     unloading();
                     window.location = "{{ url('membership') }}"+"/"+id;
                 }
              });
          }
          
           
          
          function aktivasi_akun() {
              var id = $("#id_anggota_register").val();
              var csrf_token = $('meta[name="csrf-token"]').attr('content');
              loading();
              $.ajax({
                 url : "{{ url('register_activate') }}",
                 type : "POST",
                 dataType : "JSON",
                 data : {id:id, '_token':csrf_token},
                 success : function(data) {
                     unloading();
                     table.ajax.reload(null, false);
                     $("#modal-activate").modal("hide");
                 }
              });
          }
          
          
          
          function disaktivasi_akun() {
              var id = $("#id_anggota_remove").val();
              var csrf_token = $('meta[name="csrf-token"]').attr('content');
              loading();
              $.ajax({
                 url : "{{ url('register_unactivate') }}",
                 type : "POST",
                 dataType : "JSON",
                 data : {id:id, '_token':csrf_token},
                 success : function(data) {
                     unloading();
                     table.ajax.reload(null, false);
                     $("#modal-disactivate").modal("hide");
                 }
              });
          }
          
          
    </script>
@endif

@if($view == 'backoffice-user')
    <script>
          var table = $('#table_user').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.user') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'name', name: 'name'},
                {data:'email', name: 'email'},
                {data:'level', name: 'level'},
                {data:'profile_image', name: 'profile_image'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-tambah').modal('show');
              $('#modal-tambah form')[0].reset();
              $('.modal-title').text('Tambah Data User');
              $("#password").attr('required', true);
          }
          
          
          $('#form-tambah').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('user') }}";
              else url = "{{ url('user') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData($('#modal-tambah form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-tambah').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
             
              $("#password").removeAttr('required');
              $('input[name=_method]').val('PATCH');
              $('#modal-tambah form')[0].reset();
              $.ajax({
                  url: "{{ url('user') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-tambah').modal("show");
                      $('.modal-title').text("Edit Data User");
                      $('#id').val(data.id);
                      $("#name").val(data.name);
                      $("#email").val(data.email);
                      $("#password").val("");
                      $("#level").val(data.level);
                      $("#profile_image").val(null);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('user') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif


@if($view == 'backoffice-level')
    <script>
          function editAccess(id) {
              $("#level_id").val(id);
              loading();
              $.ajax({
                  url : "{{ url('get_access_setting') }}"+"/"+id,
                  type : "GET",
                  success : function(data) {
                      unloading();
                      
                      $("#content-modal-access").html(data);
                      $("#modal-access").modal("show");
                      setValue(id);
                  }
              })
              
          }
          
          
          function setValue(id) {
              loading();
              $.ajax({
                 url : "{{ url('set_access_value') }}"+"/"+id,
                 type : "GET",
                 dataType : "JSON",
                 success : function(data) {
                     unloading();
                    $("#slider").val(data.slider);
                    $("#topik_utama").val(data.topik_utama);
                    $("#keuntungan_anggota").val(data.keuntungan_anggota);
                    $("#staff_pengurus").val(data.staff_pengurus);
                    $("#mitra").val(data.mitra);
                    $("#about").val(data.about);
                    $("#video").val(data.video);
                    $("#rat").val(data.rat);
                    $("#rat_gallery").val(data.rat_gallery);
                    $("#legal").val(data.legal);
                    $("#legal_faq").val(data.legal_faq);
                    $("#produk").val(data.produk);
                    $("#setting_pembiayaan").val(data.setting_pembiayaan);
                    $("#berita").val(data.berita);
                    $("#daftar_anggota").val(data.daftar_anggota);
                    $("#simpanan").val(data.simpanan);
                    $("#penarikan").val(data.penarikan);
                    $("#pembiayaan").val(data.pembiayaan);
                    $("#faq").val(data.faq);
                    $("#user_list").val(data.user_list);
                    $("#user_level").val(data.user_level);
                    $("#general_setting").val(data.general_setting);
                     
                 } 
              });
          }
          
          
          $("#form-access").submit(function(e){
             e.preventDefault();
             loading();
             $.ajax({
                url : "{{ url('save_access') }}",
                type : "POST",
                dataType : "JSON",
                data : $(this).serialize(),
                success : function(data) {
                    unloading();
                    console.log(data);
                    $("#modal-access").modal("hide");
                }
             });
             
          });
          
    
          var table = $('#table_level').DataTable({
              processing:true,
              serverSide:true,
              ajax: "{{ route('api.level') }}",
              order: [[0, 'desc']],
              columns: [
                {data:'id', name: 'id'},
                {data:'jabatan', name: 'jabatan'},
                {data:'action', name: 'action', orderable:false, searchable:false}
              ]
          });
          
          
          function addData(){
              save_method = "add";
              $('input[name=_method]').val('POST');
              $('#modal-tambah').modal('show');
              $('#modal-tambah form')[0].reset();
              $('.modal-title').text('Tambah Level Anggota');
          }
          
          
          $('#form-tambah').on('submit', function(e){
              loading();
              e.preventDefault();
              var id = $('#id').val();
              if(save_method =='add')  url = "{{ url('level') }}";
              else url = "{{ url('level') .'/'}}"+ id;
              $.ajax({
                  url : url,
                  type : "POST",
                  data : new FormData($('#modal-tambah form')[0]),
                  contentType:false,
                  processData:false,
                  success : function(data){
                    unloading();
                    if(data.success == true){
                      $('#modal-tambah').modal('hide');
                      table.ajax.reload(null, false);
                    }
                  }
              });
          }); 
          
          
          
          function editForm(id){
              loading();
              save_method = 'edit';
              $('input[name=_method]').val('PATCH');
              $('#modal-tambah form')[0].reset();
              $.ajax({
                  url: "{{ url('level') }}" + '/'+id+'/edit',
                  type :"GET",
                  dataType : "JSON",
                  success:function(data){
                      unloading();
                      $('#modal-tambah').modal("show");
                      $('.modal-title').text("Edit Level Anggota");
                      $('#id').val(data.id);
                      $("#jabatan").val(data.jabatan);
                      
                }
              });
          }
          
          
          
          function deleteData(id){
              
            var popup = confirm('Anda Yakin Ingin Menghapus Data...?');
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            if(popup == true){
                loading();
                $.ajax({
                    url  : "{{ url('level') }}" + '/'+id,
                    type : "POST",
                    data : {'_method':'DELETE', '_token':csrf_token},
                    success : function(data){
                            unloading();
                            table.ajax.reload(null, false);
                    }
                });
            }
          }
          
          
    </script>
@endif

@if($view == 'backoffice-upload-anggota')
    <script>
        $("#table_upload_item").DataTable();
    </script>
@endif

@if($view == 'backoffice-upload-simpanan')
    <script>
        $("#table_upload_simpanan").DataTable();
    </script>
@endif

@if($view == 'backoffice-upload-pembiayaan')
    <script>
        $("#table_upload_pembiayaan").DataTable();
    </script>
@endif



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
