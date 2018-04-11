 <?php  
 $connect = mysqli_connect("ddac2018.mysql.database.azure.com", "game09488@ddac2018", "Knd89757879", "db_admin");  
 $sql = "SELECT * FROM booking INNER JOIN agent WHERE booking.admin_agent_id = agent.agent_id";
 $result = mysqli_query($connect, $sql);
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Agent Page</title>
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
    <a href="<?php echo base_url(); ?>index.php/agent/p_agent" class="logo">
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
        <li class="header">Hello, <?php echo $_SESSION['full_name'];?></li>
		<li>
          <a href="<?php echo base_url(); ?>index.php/agent/p_agent_v">
            <i class="fa fa-calendar"></i><span>View Schedule</span>
          </a>
        </li>		
		<li>
          <a href="<?php echo base_url(); ?>index.php/agent/p_agent_ri">
            <i class="fa fa-truck"></i><span>Register Item</span>
          </a>
        </li>
		<li>
          <a href="<?php echo base_url(); ?>index.php/agent/p_agent_rc">
            <i class="fa fa-user"></i><span>Register Customer</span>
          </a>
        </li>		
		<li>
          <a href="<?php echo base_url(); ?>index.php/agent/p_agent_ab">
            <i class="fa fa-calendar-plus-o"></i><span>Booking List</span>
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
              <h3 class="box-title">Booking List</h3>					  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="status" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Booking ID</th>
				  <th>Booking Date/Time</th>
                  <th>Admin or Agent ID</th>
				  <th>Customer ID</th>            
				  <th>Vessel Model</th>                 
                  <th>Items ID</th>
				  <th>Status</th>
                </tr>
                </thead>
                <tbody>
				<?php if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
				?>				
                <tr>
                  <td><?php echo $row["booking_id"]; ?></td>
				  <td><?php echo $row["booking_date_time"]; ?></td>
				  <td><?php echo $row["admin_agent_id"]; ?></td>
				  <td><?php echo $row["customer_id"]; ?></td>
				  <td><?php echo $row["vessel_id"]; ?></td>
				  <td><?php echo $row["item_id"]; ?></td>
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
				  <th>Booking Date/Time</th>
                  <th>Admin or Agent ID</th>
				  <th>Customer ID</th>            
				  <th>Vessel Model</th>                 
                  <th>Items ID</th>
				  <th>Status</th>
                </tr>
                </tfoot>
              </table>
			  <div class="box-body">
			  	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus-circle"></i> Add
				</button>
			  </div>			  
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
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add new Booking</h4>
      </div>
      <div class="modal-body">
	  <form method="post" action="<?php echo base_url()?>index.php/agent/form_validation3">
	  <?php date_default_timezone_set("Asia/Kuala_Lumpur");
			$connect = mysqli_connect("localhost", "root", "", "db_admin");
	  ?>
        <div class="form-group">
            <span class="input-group-addon"><i class="fa fa-long-arrow-right"></i>Agent ID</span>
			<?php $row = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM agent WHERE full_name = '{$_SESSION['full_name']}'"));
				  echo '<input type="text" class="form-control" value="'.$row['agent_id'].'" disabled>';
			?>
        </div>
        <div class="form-group">
            <span class="input-group-addon"><i class="fa fa-long-arrow-right"></i>Customer ID</span>
			<?php $sql = mysqli_query($connect,"SELECT customer_id FROM customer INNER JOIN agent ON customer.register_agent = agent.full_name");
				  echo '<select class="form-control" name="customer_id">';
				  while($row = mysqli_fetch_array($sql)){
				  echo '<option value="'.$row['customer_id'].'">'.$row['customer_id'].'</option>';
				  }				  
				  echo '</select>';
			?>       			
        </div>
        <div class="form-group">           
            <span class="input-group-addon"><i class="fa fa-long-arrow-right"></i>Vessel ID</span>
			<?php $sql = mysqli_query($connect,"SELECT vessel_id FROM vessel");
				  echo '<select class="form-control" name="vessel_id">';
				  while($row = mysqli_fetch_array($sql)){
				  echo '<option value="'.$row['vessel_id'].'">'.$row['vessel_id'].'</option>';
				  }				  
				  echo '</select>';
			?>			 			
        </div>
        <div class="form-group">
            <span class="input-group-addon"><i class="fa fa-long-arrow-right"></i>Item ID</span>
			<?php $sql = mysqli_query($connect,"SELECT item_id FROM item INNER JOIN agent ON item.register_agent = agent.full_name");
				  echo '<select class="form-control" name="item_id">';
				  while($row = mysqli_fetch_array($sql)){
				  echo '<option value="'.$row['item_id'].'">'.$row['item_id'].'</option>';
				  }				  
				  echo '</select>';
			?>						
        </div>	
      </div>	  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<?php $row = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM agent WHERE full_name = '{$_SESSION['full_name']}'"));
			  echo '<input type="hidden" class="form-control" name ="admin_agent_id" value="'.$row['agent_id'].'">';
		?>
		<input type="hidden" name="booking_date_time" value="<?php echo date("Y/m/d h:i:sa")?>">
		<input type="hidden" name="status" value="Pending">
        <input type="submit" class="btn btn-primary" name="insert" value="Insert"/>
      </div>
	  </div>
	  </form>
    </div>
  </div>
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
