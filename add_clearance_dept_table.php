<?php
include_once 'classes/General.php';
$general = new General();
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


if(isset($_POST['add_dept'])){
    
    $status = $_POST['status'];
    $follow_order = $_POST['follow_order'];
    $dept = $_POST['dept'];
    $order_no = $_POST['order_no'];

    $addClearanceDept = $general->addClearanceDept($status, $follow_order, $dept, $order_no );

    if($addClearanceDept) {
        $status = '
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Department Added succe4ssfully
        </div>';
    }else {
        $status = '
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-close"></i> Failure!</h4>
            Couldnt Add Department
        </div>';
    }
}

if(isset($_POST['update'])){
  if(isset($_GET['clearance_dept'])){
    $status = $_POST['status'];
    $follow_order = $_POST['follow_order'];
    $dept = $_POST['dept'];
    $order_no = $_POST['order_no'];
    $updateClearanceDept = $general->updateClearanceDept($status, $follow_order, $dept, $order_no, $_GET['clearance_dept']);

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
}

if(isset($_GET['clearance_dept'])){
    $getDepartment = $general->getClearanceDepartments($_GET['clearance_dept']);

}
if(isset($_GET['status']) && $_GET['status'] === "delete"){
    if($_GET['status'] === "delete"){
        $deletedept = $general->deleteClearanceDepartment($_GET['clearance_dept_id']);
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

                              if(isset($_GET['clearance_dept'])){
                                  echo '
                                  <h3 class="box-title mt-5">Update Clearance Department </h3>
                                  ';
                              }else {
                                echo '<h3 class="box-title mt-5">Add Clearance Department </h3>';
                              }

                              ?>
                        </div>
                        <div class="box-body">
                            <div class="form-group mt-5">
                            </div>
                            <div class="form-group mt-5">
                                <?php 

                                if(isset($_GET['clearance_dept'])){
                                    echo '
                                     <input type="text" name="dept" value="'.$getDepartment['clerance_department'].'" placeholder="Clearance Department"  class="form-control"/>
                                    ';
                                }else {
                                   echo ' <input type="text" name="dept" value="" placeholder="Clearance Department"  class="form-control"/>';
                                }
                                
                                ?>
                                
                            </div>
                            <div class="form-group mt-5">
                                
                                <?php 

                                if(isset($_GET['clearance_dept'])){
                                    echo '
                                    <input type="text" name="follow_order" value="'.$getDepartment['followorder'].'"  placeholder="Follow Order"  class="form-control"/>
                                    ';
                                }else {
                                    echo '<input type="text" name="follow_order"  placeholder="Follow Order"  class="form-control"/>';
                                }

                                ?>
                            </div>
                            <div class="form-group mt-5">
                                
                                <?php 

                                if(isset($_GET['clearance_dept'])){
                                    echo '
                                        <input type="text" name="status" value="'.$getDepartment['deptstatus'].'"  placeholder="Department Status"  class="form-control"/>
                                        ';
                                    }else {
                                    echo '<input type="text" name="status" placeholder="Department Status"  class="form-control"/>';
                                    }
                                ?>
                            </div>
                            <div class="form-group mt-5">
                                <?php 

                                if(isset($_GET['clearance_dept'])){
                                    echo '
                                        <input type="text" name="order_no" value="'.$getDepartment['orderno'].'"  placeholder="Order No"  class="form-control"/>
                                        ';
                                    }else {
                                        echo '<input type="text" name="order_no" placeholder="Order No"  class="form-control"/>';
                                    }
                                ?>
                            </div>
                            <div>
                            <?php 

                            if(isset($_GET['clearance_dept'])){
                                echo '
                                    
                                    <button type="submit" name="update" class="btn btn-success form-control" >Update Department </button>
                                    ';
                                }else {
                                    echo '<button type="submit" name="add_dept" class="btn btn-success form-control" >Add Department </button>';
                                }
                            ?>
                                
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="box mt-5">
                        <div class="box-header">
                        <h3 class="box-title mt-5">Clearance Departments</h3>
                        </div>
                        <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Department</th>
                                    <th>Edit Dept.</th>
                                    <th>Delete Dept.</th>
                                    <th>Add Items</th>
                                    <th>View Dept</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php  $general->getClearanceDept(); ?>
                            
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
