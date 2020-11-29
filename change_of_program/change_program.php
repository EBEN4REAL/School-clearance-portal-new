<?php
include '../classes/ProgramChange.php';
$general = new ProgramChange();
$status = '';
$student_details = $general->changeOfProgramDetails( $_SESSION['regno']);
?>
<?php include("student_master_layout.php"); ?>

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
      <form method="POST">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
           
            </div>
            <div class="box-body">
            <div class="col-md-12">
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-info"></i> Program Change</h4>
                </div>
                <div class="form-group">
                    <label for="">Reg Number</label>
                    <input type="text" value="<?php echo $student_details['matno']; ?>"  class="form-control" placeholder="" name="regno" id="regno">
                </div>

                <div class="form-group">
                    <label for="">Old Level</label>
                    <select class="form-control" name="old_level" id="oldlevel">
                      <option value="<?php echo $student_details['level']; ?>" selected><?php echo $student_details['level']; ?></option>
                      <option value="100">100</option>
                      <option value="200">200</option>
                      <option value="300">300</option>
                      <option value="400">400</option>
                      <option value="400">500</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">New Level</label>
                    <select class="form-control" name="new_level" id="newlevel">
                      <option value="100">100</option>
                      <option value="200">200</option>
                      <option value="300">300</option>
                      <option value="400">400</option>
                      <option value="400">500</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Old Program</label>
                    <select class="form-control dept" name="old_program" id="oldprogram">
                      <option>Select program</option>
                      <option value="<?php echo $student_details['program']; ?>" selected><?php echo $student_details['program']; ?></option>
                      <?php echo $general->get_programs(); ?> 
                    </select>
                </div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <?php echo $status; ?>
            </div>
            <div class="box-body">
            <div class="col-md-12">
                    <div class="form-group">
                        <label for="">New Program</label>
                        <select class="form-control dept" name="new_program" id="newprogram">
                          <option>Select programm</option>
                          <?php echo $general->get_programs(); ?> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Change Type</label>
                        <select class="form-control" name="change_type" id="changeType">
                          <option value="intra_college_transfer">Intra College Transfer</option>
                          <option value="inter_college_transfer">Inter Collge Transfer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <select class="form-control" name="semester" id="semester">
                          <option value="Alpha Semester">Alpha Semester</option>
                          <option value="Omega Semester">Omega Semester</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <button id="submit" class="form-control btn btn-success" name="submit" type="submit">Submit</button>
                  </div>
            </div>
            </div>
          </div>
        </div>
        </div>
      </div>
      </form>
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
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
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

    
  document.getElementById("submit").addEventListener("click", function(event){
    event.preventDefault();
    if(document.getElementById("changeType").value === "intra_college_transfer")  {
      let resp = confirm("Intra College Transfer would cost #20,000, are you sure you want to continue this process?");
      if(resp){
        let resp = confirm("Intra College Transfer would cost #20,000, are you sure you want to continue this process?");
        if(resp) {
          let resp = confirm("Intra College Transfer would cost #20,000, are you sure you want to continue this process?");
          if(resp) {
            submitForm();
          }
        }
      }
    }else {
      let resp = confirm("Inter College Transfer would cost #20,000, are you sure you want to continue this process?");
      if(resp){
        let resp = confirm("Inter College Transfer would cost #20,000, are you sure you want to continue this process?");
        if(resp) {
          let resp = confirm("Inter College Transfer would cost #20,000, are you sure you want to continue this process?");
          if(resp) {
            submitForm();
          }
        }
      }
    }
  });


  function submitForm() {
    var regno = document.getElementById("regno").value;
    var oldlevel = document.getElementById("oldlevel").value;
    var newlevel = document.getElementById("newlevel").value;
    var oldprogram = document.getElementById("oldprogram").value;
    var newprogram = document.getElementById("newprogram").value;
    var changeType = document.getElementById("changeType").value;
    var semester = document.getElementById("semester").value;

    var amount = '';

    if(document.getElementById("changeType").value === "intra_college_transfer"){
      amount = 10000;
    }else {
      amount = 20000;
    }

    var dataString = 'amount=' + amount + '&regno=' + regno + '&oldlevel=' + oldlevel + '&newlevel=' + newlevel + '&oldprogram=' + oldprogram + '&newprogram=' + newprogram + '&changeType=' + changeType + '&semester=' + semester ;
    if (regno === '' || oldlevel == '' || newlevel == '' || oldprogram == '' || newprogram == '' || changeType == "" || semester == "") {
      alert("Please Fill All Fields");
    } else {
      $.ajax({
        type: "POST",
        url: "cop_ajax_js.php",
        data: dataString,
        cache: false,
        success: function(data) {
          alert(data);
          window.location.reload()
          }
        });
      }
      return false;
  }
  
</script>
</body>
</html>
