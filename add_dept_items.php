<?php
include_once 'classes/Clearance.php';
$general = new Clearance();
$status = "";
if(isset($_POST['submit'])){
    $clearance_table = $_POST['clearance_table'];
    $type = $_POST['type'];

    $save_column = $general->createNewExitClearancKickoffDBItem($clearance_table , $type);

    if($save_column) {
        $status = '
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Records Added Successfully
        </div>';
    }else {
        $status = '
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-close"></i> Failure!</h4>
            Duplicate transcript request for this semester or Server Error
        </div>';
    }
}


if(isset($_POST['add_dept_items'])){
    
    $item_name = $_POST['item_name'];
    $item_status = $_POST['item_status'];
    $ddate = $_POST['ddate'];
    $item_id = $_POST['item_id'];

    $addClearanceDeptItems = $general->addDeptItems($item_id, $item_name, $item_status, $ddate, $_GET['clearance_dept_id'] );

    if($addClearanceDeptItems) {
        $status = '
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Items Added to '.$_GET['clerance_department'].' department  successfully
        </div>';
    }else {
        $status = '
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-close"></i> Failure!</h4>
            Couldnt Add  Items to  Department
        </div>';
    }
}

if(isset($_POST['update'])){
  if(isset($_GET['clerance_department'])){
    $item_name = $_POST['item_name'];
    $item_status = $_POST['item_status'];
    $ddate = $_POST['ddate'];
    $item_id = $_POST['item_id'];
    $updateClearanceDept = $general->updateClearanceDeptItems($item_name, $item_status, $ddate, $_GET['clearance_dept_id'], $_GET['item_id']);

    if($updateClearanceDept) {
        $status = '
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Item Updated Successfully!
        </div>';
    }else {
        $status = '
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-close"></i> Failure!</h4>
            Failed to Update Item
        </div>';
    }
  }
}

if(isset($_GET['clearance_dept'])){
  $getDepartment = $general->getClearanceDepartments($_GET['clearance_dept']);
    
}
if(isset($_GET['clearance_dept_id'])){
  $getDepartment = $general->getClearanceDepartments($_GET['clearance_dept_id']);
}
if(isset($_GET['status']) && $_GET['status'] === "delete"){
    if($_GET['status'] === "delete"){
        $deletedept = $general->deleteClearanceDepartment($_GET['item_id']);
        if($deletedept) {
            $status = '
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Success!</h4>
                    Department Deleted successfully
                </div>
            ';
        }else {
            $status = '
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-close"></i>Failure!</h4>
                Couldnt Delete Department
            </div>';
        }
    }
    
}

if(isset($_GET['item_id']) && isset($_GET['status'])){
  if($_GET['status'] === "delete"){
      $deletedept = $general->deleteDepartmentItems($_GET['item_id']);
      if($deletedept) {
          $status = '
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  Department Deleted successfully
              </div>
          ';
      }else {
          $status = '
          <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-close"></i>Failure!</h4>
              Couldnt Delete Department
          </div>';
      }
  }
  
}
if(isset($_GET['action'])) {
  $general->editDeptItems($_GET['itemid']);

  if($updateClearanceDept) {
      $status = '
      <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-check"></i> Success!</h4>
          Field Updated successfully
      </div>';
  }else {
      $status = '
      <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-close"></i> Failure!</h4>
          Failed to Update Table Column
      </div>';
  }
}

?>

<?php include("includes/master_layout.php");  ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <form method="POST">
        <section class="content">
            <div class="row">
                <div class="col-md-5">
                    <?php echo $status; ?>
                    <div class="box mt-5">
                        <div class="box-header">
                            <?php 
                              if(isset($_GET['status'])){
                                if($_GET['status'] === 'edit'){
                                  echo ' <h3 class="box-title mt-5">Update  "'.$_GET['item_name'].'" Item </h3>';
                                }else {
                                  echo ' <h3 class="box-title mt-5">Add Clearance Items to '.$_GET['clerance_department'].' Department </h3>';
                                }
                               
                              }else {
                                echo ' <h3 class="box-title mt-5">Add Clearance Items to '.$_GET['clerance_department'].' Department </h3>';
                              }
                             
                            ?>
                            
                        </div>
                        <div class="box-body">
                            <div class="form-group mt-5">
                              <select class="form-control" name="item_id">
                                <option>Select department Serial Number</option>
                                <?php  $general->getDepartmentsSerialNumbers(); ?>
                              </select>
                            </div>
                            <div class="form-group mt-5">
                              <label>Item Name</label>
                              <?php 
                              if(isset($_GET['status'])){
                                if($_GET['status'] === 'edit'){
                                  echo '   <input type="text" name="item_name" value="'.$_GET['item_name'].'"  placeholder="Item Name" class="form-control"/>';
                                
                                }else {
                                  echo ' <input type="text" name="item_name" value="" placeholder="Item Name"  class="form-control"/>';
                                }
                               
                              }else {
                                echo ' <input type="text" name="item_name" value="" placeholder="Item Name"  class="form-control"/>';
                              }
                             
                            ?>
                            </div>
                            <div class="form-group mt-5">
                            <label>Item Status</label>
                             <select name="item_status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Not Active</option>
                             </select>
                            </div>
                            <div class="form-group mt-5">
                              <label>Item Date</label>
                              <input type="date" name="ddate" placeholder="D Date"  class="form-control"/>
                            </div>
                            <div>
                              <?php 
                              if(isset($_GET['status'])){
                                if($_GET['status'] === 'edit'){
                                  echo '    <button type="submit" name="update" class="btn btn-success form-control" >Update Department Items</button>';
                                
                                }else {
                                  echo '  <button type="submit" name="update" class="btn btn-success form-control" >Add Department Item </button>';
                                }
                               
                              }else {
                                echo ' <button type="submit" name="update" class="btn btn-success form-control" >Add Department Item </button>';
                              }
                             
                            ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="box mt-5">
                        <div class="box-header">
                        <h3 class="box-title mt-5">Clearance Departments Items</h3>
                        </div>
                        <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                            <th>Item Name</th>
                            <th>Item Status</th>
                            <th>Item Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                          </thead>
                          <tbody>
                         
                          <?php $general->getDepartmentItems($_GET['clearance_dept_id'], $_GET['clerance_department']); ?>
                          </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
        </div>
      </div>
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2020 <a href="http:almsaeedstudio.com">Covenant University</a>.</strong> All rights
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
