
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cu Clearance </title>
  <!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!
  [endif]-->
</head>
<body class="" style="width: 100%">
<div class="wrapper">

 
  <aside class="main-sidebar" style="background:#c6e3f0">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/culogo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="color:black;">Staff</p>
          <a href="#" style="color:black;"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
    
      <ul class="sidebar-menu">
        <li class="treeview">
            <a href="#" style="background: #404d9c29;color: black;">
              <i class="fa fa-dashboard"></i> <span>Exit Clearance</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="create_clearance_table.php"><i class="fa fa-circle-o"></i>Create clearance table</a></li>
              <li><a href="clearance_students.php"><i class="fa fa-circle-o"></i> View Students</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#" style="background: #404d9c29;color: black;">
              <i class="fa fa-dashboard"></i> <span>Clearance Department</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="add_clearance_dept_table.php"><i class="fa fa-circle-o"></i>Manage  Departments</a></li>
            </ul>
          </li>
          <!-- <li class="treeview">
            <a href="#" style="background: #404d9c29;color: black;">
              <i class="fa fa-dashboard"></i> <span>Departments</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="csis.php"><i class="fa fa-circle-o"></i>CSIS</a></li>
              <li><a href="fs.php"><i class="fa fa-circle-o"></i>Financial Servi es</a></li>
              <li><a href="clr.php"><i class="fa fa-circle-o"></i>CLR</a></li>
              <li><a href="regs.php"><i class="fa fa-circle-o"></i>Registry</a></li>
              <li><a href="medical.php"><i class="fa fa-circle-o"></i>Medical Center</a></li>
              <li><a href="acad_dept.php"><i class="fa fa-circle-o"></i>Academic Department</a></li>
              <li><a href="sa.php"><i class="fa fa-circle-o"></i>Student Affairs</a></li>
            </ul>
          </li> -->
          <li class="">
            <a href="clearance_students_list.php" style="background: #404d9c29;color: black;">
              <i class="fa fa-dashboard"></i> <span>Departments Clearance</span>
              <span class="pull-right-container">
                <!-- <i class="fa fa-angle-left pull-right"></i> -->
              </span>
            </a>
          </li>
           <li class="">
            <a href="http://cuclearance.battenshub.com/" style="background: #404d9c29;color: black;">
              <i class="fa fa-dashboard"></i> <span>Home</span>
              <span class="pull-right-container">
                <!-- <i class="fa fa-angle-left pull-right"></i> -->
              </span>
            </a>
          </li>
      </ul>
    </section>
  </aside>