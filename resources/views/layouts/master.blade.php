<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>WestVint-Admin</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="hold-transition sidebar-mini skin-black-light sidebar-collapse">
<div class="wrapper" id="app">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>WV</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>WestVint</b></span>
    </a>


    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      
<div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o header"> SingOut</i>
            </a>
          </li>
        </ul>
      </div>




    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('images/user1-128x128.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{url('darbinieki')}}"><i class="fa fa-user-secret"></i> <span>Employees</span></a></li>
        <li><a href="{{url('client')}}"><i class="fa fa-group"></i> <span>Clients</span></a></li>
        <li><a href="{{url('product')}}"><i class="fa fa-cube"></i> <span>Product</span></a></li>
        <li><a href="{{url('invoice')}}"><i class="fa  fa-files-o"></i> <span>Invoices</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @yield('content')
    </section>

    <!-- Main content -->
    <section class="content container-fluid">


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<script src="{{asset('js/app.js')}}"></script>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
 
<script type="text/javascript">
    $('#editdarbinieks').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var firstname = button.data('empfirstname')
    var surname = button.data('empsurname')
    var adress = button.data('empadress')
    var birthday = button.data('empbirthdat')
    var contract = button.data('empcontract')
    var phone = button.data('empphone')
    var email = button.data('empemail')
    var username = button.data('empusernam')
    var statuss = button.data('empsts')
    var id = button.data('empid')
    var modal = $(this)

    modal.find('.modal-body #firstname').val(firstname);
    modal.find('.modal-body #surname').val(surname);
    modal.find('.modal-body #adress').val(adress);
    modal.find('.modal-body #birthday').val(birthday);
    modal.find('.modal-body #contract').val(contract);
    modal.find('.modal-body #phone').val(phone);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #username').val(username);    
    modal.find('.modal-body #statuss').val(statuss);  
    modal.find('.modal-body #employee_id').val(id);
})
$('#deletedarbinieks').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
    var id = button.data('empid')
    var modal = $(this)
    modal.find('.modal-body #employees_id').val(id);
    })

$('#edit-client').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var name = button.data('myname')
    var factadress = button.data('myfactadress')
    var devadress = button.data('mydevadress')
    var pvnregnr = button.data('mypvnregnr')
    var regnr = button.data('myregnr')
    var phonenr = button.data('myphonenr')
    var email = button.data('myemail')
    var bankname = button.data('mybankname')
    var bankcode = button.data('mybankcode')
    var bankaccnr = button.data('mybankaccnr')
    var description = button.data('mydescription')
    var id = button.data('myid')
    var modal = $(this)

    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #factadress').val(factadress);
    modal.find('.modal-body #devadress').val(devadress);
    modal.find('.modal-body #pvnregnr').val(pvnregnr);
    modal.find('.modal-body #regnr').val(regnr);
    modal.find('.modal-body #phonenr').val(phonenr);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #bankname').val(bankname);
    modal.find('.modal-body #bankcode').val(bankcode);
    modal.find('.modal-body #bankaccnr').val(bankaccnr);
    modal.find('.modal-body #description').val(description); 
    modal.find('.modal-body #id').val(id);
})
    $('#editproduct').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var group = button.data('progroup')
    var standart = button.data('prosts')
    var name = button.data('proname')
    var articul = button.data('proarticul')
    var barcode = button.data('probarcode')
    var bordercode = button.data('probordercode')
    var din_iso = button.data('prodiniso')
    var diameter_dm = button.data('prodiameterdm')
    var long_dm = button.data('prolongdm')
    var material = button.data('promaterial')
    var storage = button.data('prostor')
    var add_storage = button.data('proaddstor')
    var person_add = button.data('properadd')
    var edit_storage = button.data('proeditstor')
    var person_edit = button.data('properedit')
    var product_price = button.data('prop')
    var product_retail_price = button.data('propretp')
    var product_wholesale_price = button.data('propwholp')
    var product_product_minimum_price = button.data('proppminip')
    var product_revers_price = button.data('proprevp')
    var product_neto_mass_in_parcel_amount = button.data('propnmipa')
    var product_neto_mass_in_parcel = button.data('propnmip')
    var product_neto_mass_all = button.data('propnma')
    var product_bruto_mass_in_parcel_amount = button.data('propbmipa')
    var product_bruto_mass_in_parcel = button.data('propbmip')
    var product_bruto_mass_all = button.data('propbma')
    var modal = $(this)

    modal.find('.modal-body #group').val(group);
    modal.find('.modal-body #standart').val(standart);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #articul').val(articul);
    modal.find('.modal-body #barcode').val(barcode);
    modal.find('.modal-body #bordercode').val(bordercode);
    modal.find('.modal-body #din_iso').val(din_iso);
    modal.find('.modal-body #diameter_dm').val(diameter_dm);
    modal.find('.modal-body #long_dm').val(long_dm);
    modal.find('.modal-body #material').val(material);
    modal.find('.modal-body #storage').val(storage);
    modal.find('.modal-body #add_storage').val(add_storage);
    modal.find('.modal-body #person_add').val(person_add);
    modal.find('.modal-body #edit_storage').val(edit_storage);
    modal.find('.modal-body #person_edit').val(person_edit);
    modal.find('.modal-body #product_price').val(product_price);
    modal.find('.modal-body #product_retail_price').val(product_retail_price);
    modal.find('.modal-body #product_wholesale_price').val(product_wholesale_price);
    modal.find('.modal-body #product_product_minimum_price').val(product_product_minimum_price);
    modal.find('.modal-body #product_revers_price').val(product_revers_price);
    modal.find('.modal-body #product_neto_mass_in_parcel_amount').val(product_neto_mass_in_parcel_amount);
    modal.find('.modal-body #product_neto_mass_in_parcel').val(product_neto_mass_in_parcel);
    modal.find('.modal-body #product_bruto_mass_in_parcel_amount').val(product_bruto_mass_in_parcel_amount);
    modal.find('.modal-body #product_bruto_mass_in_parcel').val(product_bruto_mass_in_parcel);
    modal.find('.modal-body #product_bruto_mass_all').val(product_bruto_mass_all);
})

</script>  
<script type="text/javascript">
  $(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});
</script>
</body>
</html>