 <?php  
 $connect = mysqli_connect("ddac2018.mysql.database.azure.com", "game09488@ddac2018", "Knd89757879", "db_admin");  
 $sql = "SELECT booking_id,status FROM booking WHERE status='Pending'";
 $result = mysqli_query($connect, $sql);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<!-- Title -->
	<header class="main-header">   
    <a href="<?php echo base_url(); ?>index.php/admin/p_admin" class="logo">
      <span class="logo-mini"><b>M</b>L</span>
      <span class="logo-lg"><b>Maersk</b>Line</span>
    </a>
    <!-- /.Title -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
	  <div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
			<li class="messages-menu">
				<a href= "<?php echo base_url(); ?>index.php/main/logout">Logout</a>
			</li>
		</ul>
	   </div>
    </nav>
  </header>
</div>
  <!-- sidebar --> 
  <aside class="main-sidebar">
    <section class="sidebar">
       
	  <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Hello, <?php echo $_SESSION['username'];?></li>
		<li>
          <a href="<?php echo base_url(); ?>index.php/admin/p_admin_sm">
            <i class="fa fa-calendar"></i><span>Schedule Management</span>
          </a>
        </li>
		<li>
          <a href="<?php echo base_url(); ?>index.php/admin/p_admin_vm">
            <i class="fa fa-ship"></i><span>Vessel Management</span>
          </a>
        </li>
		<li>
          <a href="<?php echo base_url(); ?>index.php/admin/p_admin_im">
            <i class="fa fa-truck"></i><span>Item Management</span>
          </a>
        </li>
		<li>
          <a href="<?php echo base_url(); ?>index.php/admin/p_admin_um">
            <i class="fa fa-users"></i><span>Users Management</span>
          </a>
        </li>		
		<li>
          <a href="<?php echo base_url(); ?>index.php/admin/p_admin_a">
            <i class="fa fa-user"></i><span>Admin Management</span>
          </a>
        </li>
	  </ul>
    </section> 
  </aside>
  <!-- /sidebar -->
  <!-- Content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pending List</h3>					  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="status" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Booking ID</th>
				  <th>Status</th>
                </tr>
                </thead>
                <tbody>
				<?php if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
				?>				
                <tr>
                  <td><?php echo $row["booking_id"]; ?></td>
				  <td><?php echo $row["status"]; ?></td>
                </tr>
				<?php }
					}else{?>
                <tr>
                  <td>No data found</td>
                </tr>
				<?php }?>				
                </tbody>
                <tfoot>
                <tr>
                  <th>Booking ID</th>
				  <th>Status</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#status').DataTable()
  })
</script>
</body>
</html>
