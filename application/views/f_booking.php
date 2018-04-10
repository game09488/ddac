<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">  
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../../plugins/timepicker/bootstrap-timepicker.min.css">  
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../dist/css/skins/_all-skins.min.css">
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
  <div class="content-wrapper">
  <section class="content">
        <div class="row">
        <div class="col-md-6">
		<form action="" method="post">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Edit Booking</h3>
            </div>
            <div class="box-body"> 
              <div class="form-group">
                <label>Booking ID:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-at"></i>
                  </div>
                  <input type="text" class="form-control" name="booking_id" value="<?php echo $booking->booking_id?>">
                </div>      
              </div>			
              <div class="form-group">
                <label>Booking Date and Time:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control" name="booking_date_time" value="<?php echo $booking->booking_date_time?>" disabled>
                </div>      
              </div>
              <div class="form-group">
                <label>Admin or Agent ID:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-at"></i>
                  </div>
                  <input type="text" class="form-control" name="admin_agent_id" value="<?php echo $booking->admin_agent_id?>" disabled>
                </div>      
              </div>
              <div class="form-group">
                <label>Customer ID:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-at"></i>
                  </div>
                  <?php $connect = mysqli_connect("localhost", "root", "", "db_admin");
						$sql = mysqli_query($connect,"SELECT customer_id FROM customer");
						echo '<select class="form-control" name="customer_id">';
						while($row = mysqli_fetch_array($sql)){
						echo '<option value="'.$row['customer_id'].'">'.$row['customer_id'].'</option>';
						}				  
						echo '</select>';
				  ?>
                </div>      
              </div>
              <div class="form-group">
                <label>Vessel ID:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-at"></i>
                  </div>
				  <?php $sql = mysqli_query($connect,"SELECT vessel_id FROM vessel");
						echo '<select class="form-control" name="vessel_id">';
						while($row = mysqli_fetch_array($sql)){
						echo '<option value="'.$row['vessel_id'].'">'.$row['vessel_id'].'</option>';
						}				  
						echo '</select>';
				  ?>                  
                </div>      
              </div>
              <div class="form-group">
                <label>Item ID:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-at"></i>
                  </div>
				  <?php $sql = mysqli_query($connect,"SELECT item_id FROM item");
						echo '<select class="form-control" name="item_id">';
						while($row = mysqli_fetch_array($sql)){
						echo '<option value="'.$row['item_id'].'">'.$row['item_id'].'</option>';
						}				  
						echo '</select>';
				  ?>
                </div>      
              </div>
              <div class="form-group">
                <label>Status:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-font"></i>
                  </div>
                  <select class="form-control" name="status" value="<?php echo $booking->status?>">
					<option value="Pending">Pending</option>
					<option value="Approve">Approve</option>
					<option value="Reject">Reject</option>
				  </select>
                </div>      
              </div>			  
			  <div class="modal-footer">
			  <input type="submit" class="btn btn-primary" name="update" value="Update"/>
			  </div> 			  
            </div>
          </div>
		  </form>
		</div>
	</div>	
	</section>
</div>	
  <!-- jQuery 3 -->
<script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- page script -->
<script>
  $('#datepicker').datepicker({   
	format: 'yyyy-mm-dd'
  }) 
  $('#datepicker2').datepicker({    
	format: 'yyyy-mm-dd'
  })
  $('.timepicker').timepicker({  
    showInputs: false
  }) 
</script>
</body>
</html>