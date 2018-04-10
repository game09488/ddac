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
              <h3 class="box-title">Edit Item</h3>
            </div>
            <div class="box-body">          
              <div class="form-group">
                <label>Item ID:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-at"></i>
                  </div>
                  <input type="text" class="form-control" name="i_id" value="<?php echo $item->item_id?>">
                </div>      
              </div>  
              <div class="form-group">
                <label>Item Name:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-truck"></i>
                  </div>
                  <input type="text" class="form-control" name="i_name" value="<?php echo $item->item_name?>">
                </div>      
              </div>
              <div class="form-group">
                <label>Item Weight:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-balance-scale"></i>
                  </div>
                  <input type="text" class="form-control" name="i_weight" value="<?php echo $item->item_weight?>">
                </div>      
              </div>
              <div class="form-group">
                <label>Item Quantity:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-hand-o-right"></i>
                  </div>
                  <input type="text" class="form-control" name="i_quantity" value="<?php echo $item->item_quantity?>">
                </div>      
              </div>              <div class="form-group">
                <label>Item Description:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-info"></i>
                  </div>
                  <input type="text" class="form-control" name="i_desc" value="<?php echo $item->item_desc?>">
                </div>      
              </div>              <div class="form-group">
                <label>Register Agent:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
                  <input type="text" class="form-control" name="r_agent" value="<?php echo $item->register_agent?>">
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
<!-- SlimScroll -->
<script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.min.js"></script>
<!-- page script -->
</body>
</html>