 <?php  
 $connect = mysqli_connect("localhost", "root", "", "db_admin");  
 $sql = "SELECT * FROM customer INNER JOIN agent ON customer.register_agent = agent.full_name";
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
              <h3 class="box-title">Register Customer</h3>					  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<?php if($this->uri->segment(2) == "fail_insert2"){
					echo '<p class="text-danger">Fail to register Customer</p>';
				}?>	
				<?php if($this->uri->segment(2) == "inserted2"){
					echo '<p class="text-success">Successfully register Customer</p>';
				}?>			
              <table id="status" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Customer ID</th>
                  <th>Customer Full Name</th>
				  <th>Customer Contact</th>
                  <th>Customer Email</th>
				  <th>Customer Address</th>
				  <th>Register Agent</th>
                </tr>
                </thead>
                <tbody>
				<?php if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
				?>				
                <tr>
                  <td><?php echo $row["customer_id"]; ?></td>
				  <td><?php echo $row["customer_name"]; ?></td>
				  <td><?php echo $row["customer_contact"]; ?></td>
				  <td><?php echo $row["customer_email"]; ?></td>
				  <td><?php echo $row["customer_address"]; ?></td>
				  <td><?php echo $row["register_agent"]; ?></td>
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
				  <th>Customer ID</th>
                  <th>Customer Full Name</th>
				  <th>Customer Contact</th>
                  <th>Customer Email</th>
				  <th>Customer Address</th>
				  <th>Register Agent</th>
                </tr>
                </tfoot>
              </table>
			  <div class="box-body">
			  	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-user-plus"></i> Add
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
        <h4 class="modal-title" id="myModalLabel">Register Customer</h4>
      </div>
      <div class="modal-body">
	  <form method="post" action="<?php echo base_url()?>index.php/agent/form_validation2">
        <div class="form-group">
            <span class="input-group-addon"><i class="fa fa-long-arrow-right"></i></span>
            <input type="text" class="form-control" name="customer_name" placeholder="Customer Full Name">			
        </div>	
        <div class="form-group">
            <span class="input-group-addon"><i class="fa fa-long-arrow-right"></i></span>
            <input type="text" class="form-control" name="customer_contact" placeholder="Customer Contact">			
        </div>
        <div class="form-group">
            <span class="input-group-addon"><i class="fa fa-long-arrow-right"></i></span>
            <input type="text" class="form-control" name="customer_email" placeholder="Customer Email">			
        </div>
        <div class="form-group">
            <span class="input-group-addon"><i class="fa fa-long-arrow-right"></i></span>
            <input type="text" class="form-control" name="customer_address" placeholder="Customer Address">			
        </div>
        <div class="form-group">
            <span class="input-group-addon"><i class="fa fa-long-arrow-right"></i></span>
            <input type="text" class="form-control" placeholder="<?php echo $_SESSION['full_name']?>" disabled>			
        </div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="hidden" class="form-control" name="register_agent" value="<?php echo $_SESSION['full_name']?>">			
        <input type="submit" class="btn btn-primary" name="insert" value="Insert"/>
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