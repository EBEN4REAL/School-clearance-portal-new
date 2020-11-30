<?php
include_once 'classes/Clearance.php';
$general = new Clearance();
$general->getClearanceDepartmentsForm("CSIS");
$general->getClearanceDepartmentsForm("Financial Services");
$general->getClearanceDepartmentsForm("CLR");
$general->getClearanceDepartmentsForm("Registry");
$general->getClearanceDepartmentsForm("Health Center");
$general->getClearanceDepartmentsForm("Academic Department");
$general->getClearanceDepartmentsForm("Student Affairs");
?>
<?php include("includes/master_layout.php");  ?>

  <div class="content-wrapper" id="app">
    <section class="content-header" >
        <label class="mr-5">Select a department to treat</label>
        <select class="form-control select_dept">
            <option value="CSIS">CSIS</option>
            <option value="Financial Services">Financial Services</option>
            <option value="CLR">CLR</option>
            <option value="Registry">Registry</option>
            <option value="Health Center">Health Center</option>
            <option value="Academic Department">Academic Department</option>
            <option value="Student Affairs">Student Affairs</option>
        </select>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Clearance Students For <span class="dept_text">CSIS<span> </h3>
            </div>
            <div class="box-body" >
              <div id="dept_list_wrapper" >
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>Reg No</th>
                    <th>Clearance Reason</th>
                    <th>Semester Id</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <div >
                            <?php 
                                $general->getKickoffRecords(); 
                            ?>
                        </div>
                    </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
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
    <strong>Copyright &copy; 2020 <a href="http://almsaeedstudio.com">Covenant University</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
 
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
  });


document.querySelector('.select_dept').addEventListener('change', (e) => {
    document.querySelector('.dept_text').textContent = e.target.value
    if(e.target.value == 'CSIS') {
        document.getElementById("dept_list_wrapper").innerHTML = `<table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
            <th>Reg No</th>
            <th>Clearance Reason</th>
            <th>Semester Id</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <div class="dept_list_wrapper">
                    <?php 
                        $general->getKickoffRecords(); 
                    ?>
                </div>
            </tfoot>
        </table>
        `
    }else if(e.target.value == 'Financial Services') {
        console.log(document.getElementById("dept_list_wrapper"))
        document.getElementById("dept_list_wrapper").innerHTML = `<table id="example1" class="table table-bordered table-striped"><thead><tr><th>Reg No</th><th>Clearance Reason</th><th>Semester Id</th><th>Status</th><th>Action</th></tr></thead><tbody><div class="dept_list_wrapper"><?php $general->getFinancialServiceStudents() ?></div></tfoot> </table>
        `
    }
    else if(e.target.value == 'CLR') {
        document.getElementById("dept_list_wrapper").innerHTML = `
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Reg No</th>
                <th>Clearance Reason</th>
                <th>Semester Id</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <div class="dept_list_wrapper">
                        <?php $general->getKickoffRecordsForCLR() ?>
                    </div>
                </tfoot>
            </table>
        `
    }else if(e.target.value == 'Registry') {
        document.getElementById("dept_list_wrapper").innerHTML = `
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Reg No</th>
                <th>Clearance Reason</th>
                <th>Semester Id</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <div class="dept_list_wrapper">
                        <?php $general->getRegistryStudents() ?>
                    </div>
                </tfoot>
            </table>
        `
    }
    else if(e.target.value == 'Health Center') {
        document.getElementById("dept_list_wrapper").innerHTML = `
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Reg No</th>
                <th>Clearance Reason</th>
                <th>Semester Id</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <div class="dept_list_wrapper">
                        <?php $general->getKickoffDetailsForHealthCenter() ?>
                    </div>
                </tfoot>
            </table>
        `
    }else if(e.target.value == 'Academic Department') {
        document.getElementById("dept_list_wrapper").innerHTML = `
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Reg No</th>
                <th>Clearance Reason</th>
                <th>Semester Id</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <div class="dept_list_wrapper">
                    <?php $general->getKickoffRecordsForAcademicDept() ?>
                    </div>
                </tfoot>
            </table>
            
        `
    }
    else if(e.target.value == 'Student Affairs') {
        document.getElementById("dept_list_wrapper").innerHTML = `
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Reg No</th>
                <th>Clearance Reason</th>
                <th>Semester Id</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <div class="dept_list_wrapper">
                        <?php $general->getKickoffForStudentAffairsDept() ?>
                    </div>
                </tfoot>
            </table>
            
        `
    }
            
})


 </script>


</body>
</html>





