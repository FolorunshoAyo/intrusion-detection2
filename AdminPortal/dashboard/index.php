<?php
include('connection.php');
include('header.php');
session_start();
if(!isset($_SESSION['Username']))
{
  header("Location: ../login.php");
}
$Username = $_SESSION['Username'];
$total_login_attempts = $_SESSION['total_login_attempts'];
$total_successful_attempts = $_SESSION['total_successful_attempts'];

if($total_login_attempts == 0 && $total_successful_attempts == 0){
  $total_login_attempts = $total_successful_attempts = "0";
}

?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-power-off"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          <a href="logout.php" class="dropdown-item">
            <i class="fa fa-sign-out-alt mr-2"></i> <b>logout</b>
          </a>
      </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    Brand Logo
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img  src="../images-files/doctor.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php echo $_SESSION['Username'] ?></a>
        </div>
      </div>

       <!-- Sidebar Menu -->
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- nav item for student -->
           <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="fas fa-home nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin-profile.php" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Admin Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="students.php" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Manage Student</p>
                </a>
              </li>
              <!-- Nav for Logs -->
              <li class="nav-item">
                <a href="student-log.php" class="nav-link">
                  <i class="fas fa-record-vinyl nav-icon"></i>
                  <p>Student Logs</p>
                </a>
              </li>
              <!-- nav item for students -->
              <li class="nav-item">
                <a href="result.php" class="nav-link">
                  <i class="fas fa-copy"></i>
                  <p>Students Result</p>
                </a>
              </li>
              <!-- nav for student payments -->
              <li class="nav-item">
                <a href="payments.php" class="nav-link">
                  <i class="fas fa-credit-card"></i>
                  <p>Student Payments</p>
                </a>
              </li>
               <!-- nav for create staff account -->
               <li class="nav-item">
                <a href="staffAccount.php" class="nav-link">
                  <i class="fas fa-user-plus"></i>
                  <p>Create Staff Account</p>
                </a>
              </li>

               <!-- nav for manage staff account -->
               <li class="nav-item">
                <a href="ManageStaff.php" class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>Manage Staff Account</p>
                </a>
              </li>

            <!-- nav for manage staff payroll -->
            <li class="nav-item">
                <a href="payroll.php" class="nav-link">
                  <i class="fas fa-user"></i>
                  <p>Staff Payroll</p>
                </a>
              </li>
              
              
              <!-- nav for logout -->
                <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="fas fa-power-off nav-icon"></i>
                  <p>Logout </p>
                </a>
              </li>
              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
         
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row mb-4">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box shadow-lg">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total members</span>
                  <span class="info-box-number">
                    <?php 
                  $query = mysqli_query($conn, "SELECT COUNT(*) FROM admin");
                  $result = mysqli_fetch_assoc($query);
                  echo $result['COUNT(*)'];
                  ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3 shadow-lg">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Username</span>
                  <span class="info-box-number">
                    <?php echo $_SESSION['Username'];?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3 shadow-lg">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-power-off"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Login attempts(s)</span>
                  <span class="info-box-number">
                    <?php echo $total_login_attempts;?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3 shadow-lg">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text"> Successful Logins</span>
                  <span class="info-box-number">
                    <?php echo $total_successful_attempts; ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="card">
              <div class="card-header">
                <h3 class="card-title text-primary">NOTIFICATION</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>S/N</th>
                      <th>Title</th>
                      <th>Notice</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td>1</td>
                      <td>Welcoming new Students</td>
                      <td>11-7-2014</td>
                    </tr>
                    <tr class="expandable-body">
                      <td colspan="5">
                        <p>
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                      </td>
                    </tr>
                    <tr data-widget="expandable-table" aria-expanded="true">
                      <td>2</td>
                      <td>Resumption Date</td>
                      <td>11-7-2014</td>
                    </tr>
                    <tr class="expandable-body">
                      <td colspan="5">
                        <p>
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Announcements</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <ol style="list-style-position: outside;">
                  <li>first number</li>
                  <li>second number</li>
                  <li>third number</li>
                  <li>fourth number</li>
                  <li>fifth number</li>
                </ol>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                2020/2021 session
              </div>
              <!-- /.card-footer-->
            </div>

          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  </div>
  <!--/. container-fluid -->
  </section>
  <!-- /.content -->
        
            

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
  <strong>Copyright &copy; 2020 <a href="http://adultxtra.com">ADULTXTRA</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
   
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
