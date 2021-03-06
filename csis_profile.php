<?php
    include_once 'classes/Clearance.php';
    $general = new Clearance();
    $status_save = ""; $status ="";
    // GET DEPARTMENT TOTAL ITEM
    $student_cleared = $general->getDepartTotalItems($_SESSION['deptid'],  $_GET['matno']);
    // Get student profile
     if(isset($_GET['matno'])){
        $getStudentProfile = $general->getAStudentRecord($_GET['matno']);
        if($getStudentProfile){
        }else {
        }
    }
    $general->getClearanceDepartmentsForm("CSIS");
    if(isset($_POST['submit'])){
      
      $registration_clearance = $_POST['Registration_Clearance'];
      $equipment_damage_clearance = $_POST['Equipment_Damage_Clearance'];
      $other_service_charges = $_POST['Other_Service_Charges'];
      $Others = $_POST['Others'];

      $reg_action = $_POST['reg_action'];
      $edc_action = $_POST['edc_action'];
      $osc_action = $_POST['osc_action'];
      $o_action = $_POST['o_action'];

      $kickoffid = $getStudentProfile['kickoffid'];
      $reg_no = $_GET['matno'];

      $save_record = $general->addCSISRecords($registration_clearance, $equipment_damage_clearance, $other_service_charges, $Others , $_SESSION['deptid'], $kickoffid , $reg_no, $reg_action,$osc_action, $o_action,  $edc_action );

      

      if($save_record) {
        $status_save = '
          <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Success!</h4>
              Records Added Successfully
          </div>';
      }else {
          $status_save = '
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-close"></i> Failure!</h4>
              Failed to add records!
          </div>';
      }
    }

     // Get student profile
     if(isset($_GET['matno'])){
      $studentProfile = $general->getStudentProfile($_GET['matno']);
      // print_r($getStudentProfile);
      // return;
      if($studentProfile){
          $status = '
          <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 0 auto; width: 70%">
              Update Succesul!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>';
         
      }else {
          $status = '
          <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 0 auto; width: 70%">
              Sorry Could not update this item
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>';
      }
  }
 

?>

  <?php include("includes/master_layout.php");  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CSIS
         <?php  
            if($student_cleared == 'true') {
              echo '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px">cleared</span>';
            }
            else if($student_cleared == 'not treated') {
              echo '<span class="badge badge-success badge-pill" style="background: grey; font-size: 18px">Not Treated</span>';
            }
            else {
              echo '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>';
            } 
          ?>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">CSIS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        <section class="content">
            <div class="row">
            <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('dist/img/photo1.png') center center;">
              <h3 class="widget-user-username">
                <?php 
                    echo ucwords($getStudentProfile['sname']) . " " . ucwords($getStudentProfile['fname']);
                ?>
              </h3>
              <h5 class="widget-user-desc"><?php echo $getStudentProfile['matno']; ?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="data:image/jpeg;base64,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" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $getStudentProfile['program']; ?></h5>
                    <span class="description-text">Program</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $getStudentProfile['dept']; ?></h5>
                    <span class="description-text">Department</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $getStudentProfile['level']; ?></h5>
                    <span class="description-text">Level</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
            </div>
        </section>
         
        </div>
      </div>
    </section>

    <form method="POST">
        <section class="content">
            <form method="POST">
            <div class="row mt-10 py-5">
                <div class="col-md-12">
                    <?php echo $status_save ; ?>
                    <div class="alert alert-info alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h4><i class="icon fa fa-info"></i> Student Clearance Reason</h4>
                      <?php echo $getStudentProfile['clearancereason']; ?>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Clearance Item</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-group">
                              <label for="">Registration Clearance</label>
                              <input type="text" name="Registration_Clearance" class="form-control" width="70%" placeholder="Registration Clearance" value="<?php echo $_SESSION['reg_comment']; ?>" >
                            </div>
                          </td>
                          <td>
                          <div class="form-group" style="margin-top: 22px">
                            <select class="form-control" name="reg_action">
                              <option value="1">Clear</option>
                              <option value="0">Unclear</option>
                            </select>
                          </div>
                          </td>
                          <td>
                            <div style="margin-top: 22px" class="text-center">
                              <?php   
                                  echo $_SESSION["reg_status"]  == '0' ?
                                  '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>' 
                                  :null;
                              ?>
                              <?php   
                              
                                  echo $_SESSION["reg_status"]  == '1' ?
                                  '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px"> cleared</span>' 
                                  :null;
                              ?>
                            </div>
                            
                          </td>
                        </tr>
                        <tr>
                          <td>
                          <div class="form-group">
                            
                            <label for="">Equipment Damage Clearance</label>
                            <input type="text" name="Equipment_Damage_Clearance" value="<?php echo $_SESSION['edc_comment']; ?>"  class="form-control" width="70%" placeholder="">
                          </div>
                          </td>
                          <td>
                          <div class="form-group">
                            <label for="">Select action</label>
                            <select class="form-control" name="edc_action">
                              <option value="1">Clear</option>
                              <option value="0">Unclear</option>
                            </select>
                          </div>
                          </td>
                          <td>
                            <div style="margin-top: 22px" class="text-center">
                              <?php   
                                  echo $_SESSION["edc_status"] == '0' ?
                                  '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>' 
                                  :null;
                              ?>
                              <?php   
                                  echo $_SESSION['edc_status'] == '1' ?
                                  '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px"> cleared</span>' 
                                  :null;
                              ?>
                            </div>
                            
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-group">
                              <label for="">Other Service Charges</label>
                              <input type="text" value="<?php echo $_SESSION['osc_comment']; ?>" name="Other_Service_Charges" class="form-control" width="70%" placeholder="" >
                            </div>
                          </td>
                          <td>
                          <div class="form-group">
                            <label for="">Select action</label>
                            <select class="form-control" name="osc_action">
                              <option value="1">Clear</option>
                              <option value="0">Unclear</option>
                            </select>
                          </div>
                          </td>
                          <td>
                            <div style="margin-top: 22px" class="text-center">
                              <?php   
                                  echo $_SESSION['osc_status'] == '0' ?
                                  '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>' 
                                  :null;
                              ?>
                              <?php   
                                  echo $_SESSION['osc_status'] == '1' ?
                                  '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px"> cleared</span>' 
                                  :null;
                              ?>
                            </div>
                            
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="form-group">
                              <label for="">Others</label>
                              <input value="<?php echo $_SESSION['o_csis_comment']; ?>"  type="text" name="Others" class="form-control" width="70%" placeholder="">
                            </div>
                          </td>
                          <td>
                          <div class="form-group">
                            <label for="">Select action</label>
                            <select class="form-control" name="o_action">
                              <option value="1">Clear</option>
                              <option value="0">Unclear</option>
                            </select>
                          </div>
                          </td>
                          <td>
                            <div style="margin-top: 22px" class="text-center">
                              <?php   
                                  echo $_SESSION['o_status'] == '0' ?
                                  '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>' 
                                  :null;
                              ?>
                              <?php   
                                  echo $_SESSION['o_status']== '1' ?
                                  '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px"> cleared</span>' 
                                  :null;
                              ?>
                            </div>
                            
                          </td>
                        </tr>
                    </table>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button
                            name="submit"
                            type="submit"
                            class=" btn btn-primary form-control"
                        >
                        Add Records
                        </button>
                    </div>
                </div>
            </div>
            </form>
           
           
        </section>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2020 <a href="http://almsaeedstudio.com">Covenant University</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
