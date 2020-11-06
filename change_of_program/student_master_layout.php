<?php
  if(!$_SESSION['regno']){
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cu Clearance </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

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
          <img src="../img/culogo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="color:black;">Student</p>
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
         <li class="active">
            <a href="student_transaction_history.php" style="background: #404d9c29;color: black;">
              <i class="fa fa-dashboard"></i> <span>Transacton History</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          </li>
          <li class="active">
            <a href="change_program.php" style="background: #404d9c29;color: black;">
              <i class="fa fa-dashboard"></i> <span>Program Change</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          </li>
          <li class="active" style="background: #00a65a">
            <a href="logout.php" class=" btn-success" style="background: #404d9c29;color: white;">
              <i class="fa fa-dashboard"></i> <span>Logout</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
          </li>
      </ul>
    </section>
  </aside>