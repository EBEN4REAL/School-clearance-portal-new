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

  <div class="content-wrapper">
    <section class="content-header">
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
    <section class="content csis" >
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Clearance Students (CSIS)</h3>
            </div>
            <div class="box-body">
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
              
                <?php $general->getKickoffRecords(); ?>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
     <section class="content fs">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Clearance Students (FINANCIAL SERVICES)</h3>
            </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
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
      
                <?php $general->getFinancialServiceStudents(); ?>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
    <section class="content clr">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Clearance Students (CLR)</h3>
            </div>
            <div class="box-body">
              <table id="example3" class="table table-bordered table-striped">
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
              
                <?php $general->getKickoffRecordsForCLR(); ?>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
    <section class="content reg">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Clearance Students (REGISTRY)</h3>
            </div>
            <div class="box-body">
              <table id="example4" class="table table-bordered table-striped">
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
      
                <?php $general->getRegistryStudents(); ?>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
    <section class="content hc">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Clearance Students (Health Center)</h3>
            </div>
            <div class="box-body">
              <table id="example5" class="table table-bordered table-striped">
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
              
                <?php $general->getKickoffDetailsForHealthCenter(); ?>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
    <section class="content ad">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Clearance Students (ACADEMIC DEPT.)</h3>
            </div>
            <div class="box-body">
              <table id="example6" class="table table-bordered table-striped">
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
              
                <?php $general->getKickoffRecordsForAcademicDept(); ?>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
    <section class="content sa">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Clearance Students</h3>
            </div>
            <div class="box-body">
              <table id="example7" class="table table-bordered table-striped">
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
              
                <?php $general->getKickoffForStudentAffairsDept(); ?>
                </tfoot>
              </table>
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
    $("#example2").DataTable();
    $("#example3").DataTable();
    $("#example4").DataTable();
    $("#example5").DataTable();
    $("#example6").DataTable();
    $("#example7").DataTable();
  });
document.querySelector('.csis').style.display = 'block'
document.querySelector('.fs').style.display = 'none'
document.querySelector('.clr').style.display = 'none'
document.querySelector('.reg').style.display = 'none'
document.querySelector('.fs').style.display = 'none'
document.querySelector('.hc').style.display = 'none'
document.querySelector('.ad').style.display = 'none'
document.querySelector('.sa').style.display = 'none'
document.querySelector('.select_dept').addEventListener('change' , (e) => {
    if(e.target.value == 'CSIS') {
        document.querySelector('.csis').style.display = 'block'
        document.querySelector('.fs').style.display = 'none'
        document.querySelector('.clr').style.display = 'none'
        document.querySelector('.reg').style.display = 'none'
        document.querySelector('.fs').style.display = 'none'
        document.querySelector('.hc').style.display = 'none'
        document.querySelector('.ad').style.display = 'none'
        document.querySelector('.sa').style.display = 'none'
    }
    if(e.target.value == 'Financial Services') {
        document.querySelector('.csis').style.display = 'none'
        document.querySelector('.fs').style.display = 'block'
        document.querySelector('.clr').style.display = 'none'
        document.querySelector('.reg').style.display = 'none'
        document.querySelector('.fs').style.display = 'none'
        document.querySelector('.hc').style.display = 'none'
        document.querySelector('.ad').style.display = 'none'
        document.querySelector('.sa').style.display = 'none'
    }
    if(e.target.value == 'CLR') {
        document.querySelector('.csis').style.display = 'none'
        document.querySelector('.fs').style.display = 'none'
        document.querySelector('.clr').style.display = 'block'
        document.querySelector('.reg').style.display = 'none'
        document.querySelector('.fs').style.display = 'none'
        document.querySelector('.hc').style.display = 'none'
        document.querySelector('.ad').style.display = 'none'
        document.querySelector('.sa').style.display = 'none'
    }
    if(e.target.value == 'Registry') {
        document.querySelector('.csis').style.display = 'none'
        document.querySelector('.fs').style.display = 'none'
        document.querySelector('.clr').style.display = 'none'
        document.querySelector('.reg').style.display = 'block'
        document.querySelector('.fs').style.display = 'none'
        document.querySelector('.hc').style.display = 'none'
        document.querySelector('.ad').style.display = 'none'
        document.querySelector('.sa').style.display = 'none'
    }
    if(e.target.value == 'Health Center') {
        document.querySelector('.csis').style.display = 'none'
        document.querySelector('.fs').style.display = 'none'
        document.querySelector('.clr').style.display = 'none'
        document.querySelector('.reg').style.display = 'none'
        document.querySelector('.hc').style.display = 'block'
        document.querySelector('.ad').style.display = 'none'
        document.querySelector('.sa').style.display = 'none'
    }
    if(e.target.value == 'Academic Department') {
        document.querySelector('.csis').style.display = 'none'
        document.querySelector('.fs').style.display = 'none'
        document.querySelector('.clr').style.display = 'none'
        document.querySelector('.reg').style.display = 'none'
        document.querySelector('.hc').style.display = 'none'
        document.querySelector('.ad').style.display = 'block'
        document.querySelector('.sa').style.display = 'none'
    }
    if(e.target.value == 'Student Affairs') {
        document.querySelector('.csis').style.display = 'none'
        document.querySelector('.fs').style.display = 'none'
        document.querySelector('.clr').style.display = 'none'
        document.querySelector('.reg').style.display = 'none'
        document.querySelector('.hc').style.display = 'none'
        document.querySelector('.ad').style.display = 'none'
        document.querySelector('.sa').style.display = 'block'
    }
})
</script>
</body>
</html>
