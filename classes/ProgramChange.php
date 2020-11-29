<?php
session_start();
//  print_r($_SESSION);
   

	class ProgramChange{

		private $db;

		public function __construct(){
			require_once($_SERVER['DOCUMENT_ROOT'] . '/cuclearance/includes/config.php');
			$this->db = $pdo;
        }
        public function getProgramChangeRequests(){

			$query = "SELECT * FROM `changeofprogrammerequest`";
			$stmt = $this->db->prepare($query);
			$stmt->execute();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

				echo '
				
				<tr>
					<td>'.$row["regno"].'</td>
					<td>
					'.$row["newprogram"].'
					</td>
					<td>'.$row["oldprogram"].'</td>
					<td>'.$row["newlevel"].'</td>
					<td>'.$row["oldlevel"].'</td>
					<td>'.$row["changeremarks"].'</td>
					<td>'.$row["requeststatus"].'</td>
					<td>
						<a href="program_change_request_details.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
							<i class="fa fa-eye" aria-hidden="true"></i> 
							View
						</a>
					</td>
				</tr>
				';
			}
            
		}
		public function getProgramChangeRequestForVc(){

			$query = "SELECT * FROM `changeofprogrammerequest`";
			$stmt = $this->db->prepare($query);
			$stmt->execute();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

				echo '
				
				<tr>
					<td>'.$row["regno"].'</td>
					<td>
					'.$row["newprogram"].'
					</td>
					<td>'.$row["oldprogram"].'</td>
					<td>'.$row["newlevel"].'</td>
					<td>'.$row["oldlevel"].'</td>
					<td>'.$row["changeremarks"].'</td>
					<td>'.$row["requeststatus"].'</td>
					<td>
						<a href="vc_view.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
							<i class="fa fa-eye" aria-hidden="true"></i> 
							View
						</a>
					</td>
				</tr>
				';
			}
            
		}
		public function getProgramChangeRequestsByForRegisrar(){

			$query = "SELECT * FROM `changeofprogrammerequest`";
			$stmt = $this->db->prepare($query);
			$stmt->execute();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

				echo '
				
				<tr>
					<td>'.$row["regno"].'</td>
					<td>
					'.$row["newprogram"].'
					</td>
					<td>'.$row["oldprogram"].'</td>
					<td>'.$row["newlevel"].'</td>
					<td>'.$row["oldlevel"].'</td>
					<td>'.$row["changeremarks"].'</td>
					<td>'.$row["requeststatus"].'</td>
					<td>
						<a href="registrar_view.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
							<i class="fa fa-eye" aria-hidden="true"></i> 
							View
						</a>
					</td>
				</tr>
				';
			}
            
		}
		public function getTransactionHistory($matno){

			$query = "SELECT * FROM `changeofprogrammetrans` where regno = '$matno'";
			$stmt = $this->db->prepare($query);
			$stmt->execute();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

				echo '
				
				<tr>
					<td>'.$row["regno"].'</td>
					<td>'.$row["changetypeid"].'</td>
					<td>'.$row["changeremarks"].'</td>
					<td>'.$row["changeapproval"].'</td>
					<td>'.$row["semid"].'</td>
					<td>'.$row["transdatetime"].'</td>
					<td>
						<a href="transaction_history_details.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
							<i class="fa fa-eye" aria-hidden="true"></i> 
							View
						</a>
					</td>
				</tr>
				';
			}
            
		}
		public function getStudentsBeingAccepted(){

			$deptid = $_SESSION['pc_deptid'];
			$query = "SELECT * FROM `changeofprogrammerequest` where new_dept_id =  '$deptid' ";
			$stmt = $this->db->prepare($query);
			$stmt->execute();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

				echo '
				
				<tr>
					<td>'.$row["regno"].'</td>
					<td>
					'.$row["newprogram"].'
					</td>
					<td>'.$row["oldprogram"].'</td>
					<td>'.$row["newlevel"].'</td>
					<td>'.$row["oldlevel"].'</td>
					<td>'.$row["changeremarks"].'</td>
					<td>'.$row["requeststatus"].'</td>
					<td>
						<a href="program_change_request_details.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
							<i class="fa fa-eye" aria-hidden="true"></i> 
							View
						</a>
					</td>
				</tr>
				';
			}
            
		}
		public function getStudentsBeingReleased(){

			$deptid = $_SESSION['pc_deptid'];
			$query = "SELECT * FROM `changeofprogrammerequest` where old_dept_id =  '$deptid' ";
			$stmt = $this->db->prepare($query);
			$stmt->execute();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

				echo '
				
				<tr>
					<td>'.$row["regno"].'</td>
					<td>
					'.$row["newprogram"].'
					</td>
					<td>'.$row["oldprogram"].'</td>
					<td>'.$row["newlevel"].'</td>
					<td>'.$row["oldlevel"].'</td>
					<td>'.$row["changeremarks"].'</td>
					<td>'.$row["requeststatus"].'</td>
					<td>
						<a href="program_change_request_details.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
							<i class="fa fa-eye" aria-hidden="true"></i> 
							View
						</a>
					</td>
				</tr>
				';
			}
            
		}
		public function getSameDeptStudents(){

			$deptid = $_SESSION['pc_deptid'];
			$query = "SELECT * FROM `changeofprogrammerequest` where old_dept_id =  '$deptid' and new_dept_id = '$deptid'";
			$stmt = $this->db->prepare($query);
			$stmt->execute();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

				echo '
				
				<tr>
					<td>'.$row["regno"].'</td>
					<td>
					'.$row["newprogram"].'
					</td>
					<td>'.$row["oldprogram"].'</td>
					<td>'.$row["newlevel"].'</td>
					<td>'.$row["oldlevel"].'</td>
					<td>'.$row["changeremarks"].'</td>
					<td>'.$row["requeststatus"].'</td>
					<td>
						<a href="program_change_request_details.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
							<i class="fa fa-eye" aria-hidden="true"></i> 
							View
						</a>
					</td>
				</tr>
				';
			}
            
        }
        public function updateStudentRequest($matno, $cr, $deptid, $staffrole, $request_id , $oldlevel,$newLevel, $semesterid, $oldprogram, $newprogram) {
				
            // GET OLD  PROGRAM ID
            $query = "SELECT * from  programs  where program = '$oldprogram'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $old_prog_id = $row['prgid'];

            // GET NEW  PROGRAM ID
            $query = "SELECT * from  programs  where program = '$newprogram'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $new_prog_id = $row['prgid'];

            // GET STUDENT CHANGE TYPE
            $query = "SELECT * from  changeofprogrammefee  where regno = '$matno'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $changetype = $row['changetype'];
            
            $tdatetime = date("Y-m-d h:i:sa");


            // Isert into transaction table
            $sql = "INSERT INTO  changeofprogrammetrans (changetypeid, requestid, regno, staffrole, changeremarks, changeapproval, oldprgid, newprgid, oldlevel, newlevel, semid, transdatetime) VALUES ('$changetype', '$request_id', '$matno', '$staffrole','$cr', 'Processing', '$old_prog_id', '$new_prog_id', '$oldlevel', '$newLevel', '$semesterid', '$tdatetime')";
            $stmt = $this->db->query($sql);

            // Update requests
            $deptid = $_SESSION['pc_deptid'];
            $query = "UPDATE   changeofprogrammerequest SET changeremarks = '$cr', requeststatus = 'Processing' , deptid = '$deptid', staff_role = '$staffrole' WHERE regno = '$matno'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            if($stmt){
                return true;
            }else {
                false;
            }
        }
        public function effectChangeByRegistrar($regno, $nl, $np) {
            
            // Update reglist
            $query = "UPDATE   reglist SET program = '$np', `level` = '$nl' , `status` = 'approved'  WHERE matno = '$regno'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            // Update program request change status
            $query = "UPDATE   changeofprogrammerequest SET requeststatus = 'approved' WHERE regno = '$regno'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            if($stmt){
                return true;
            }else {
                false;
            }
        }
        public function getDepartmentsSerialNumbers(){

            $query = "SELECT * FROM  departments";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

        
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                echo '
                
                    <option value="'.$row['dpno'].'">'.$row['dpno'].'</option>
                ';
            }
            
        }
        public function updateVCAction($regno, $action){

            $query = "UPDATE  changeofprogrammerequest SET requeststatus = '$action'  WHERE regno = '$regno'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            $query = "UPDATE  changeofprogrammetrans SET changeapproval = '$action'  WHERE regno = '$regno'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            $sql = "INSERT INTO  exitclearancedeptitems (itemid, deptid, itemname, itemstatus, ddate) VALUES ('$item_id', '$deptid', '$item_name', '$item_status', '$ddate')";
            $stmt = $this->db->query($sql);

            

            if($stmt){
                return true;
            }else {
                false;
            }
        }
        public function getStudentRequestDetails($student_id){

            $query = "SELECT * from changeofprogrammerequest , reglist where changeofprogrammerequest.regno = '$student_id' AND reglist.matno = '$student_id'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($row){
                return $row;
            }
        }

        public function get_programs(){
            $query = "SELECT * FROM `programs`";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '
                    <option value="'.$row["program"].'">'.$row["program"].'</option>
                ';
            }
        }
        public function getDeptId(){
            $query = "SELECT * FROM `appointmenthistory`";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '
                    <option value="'.$row["unit"].'">'.$row["remark"].'</option>
                ';
            }
        }
        public function applyForChangeOfProgram($amount, $rowno, $old_level, $new_level, $old_program, $new_progam,	$semester, $change_type){

            // Get Old Program department Id
            $query = "SELECT * from  programs  where program = '$old_program'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $old_deptid = $row['deptid'];


            // Get New Program department Id
            $query = "SELECT * from  programs  where program = '$new_progam'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $new_deptid = $row['deptid'];


            $isChangeInitiated = $this->checkForMultipleChangeOfProgramRequests($rowno);



            if($isChangeInitiated) {
                return false;
            }else {
                $date = date("Y-m-d h:i:sa");

                $sql = "INSERT INTO  changeofprogrammefee (changetype, amount, regno, feedatetime) VALUES ('$change_type', '$amount', '$rowno', '$date')";
                
                $stmt = $this->db->query($sql);

                $sql = "INSERT INTO  changeofprogrammerequest (regno, newprogram, oldprogram, oldlevel, newlevel, semesterid, requestdatetime, old_dept_id, new_dept_id, changetypeid) VALUES ('$rowno', '$new_progam', '$old_program', '$old_level','$new_level', '$semester' , '$date', '$old_deptid', '$new_deptid' , '$change_type')";
                $stmt = $this->db->query($sql);

                if($stmt){
                    return true;
                }else {
                    return false;
                }
            }

            
        }

        public function checkForMultipleChangeOfProgramRequests($matno){
            $query = "SELECT * from changeofprogrammerequest WHERE regno='$matno'";
            $stmt = $this->db->prepare($query);
            $row_count = $this->db->query("select count(*) from changeofprogrammerequest WHERE regno='$matno'")->fetchColumn(); 
            $stmt->execute();


            
            if($row_count > 1){
                return true;
            }else {
                return false;
            }
        }

        public function saveStudentClearanceRecords($matric_no, $clearance_reason, $semester_id){
            $stm = $this->db->query("SELECT * from exitclearanceickoff  where   regno = '$matric_no'");
            $reg_no_count = $stm->rowCount();

            if($reg_no_count > 0) {
                return 'Duplicate Matric Number';
            }else {
                $sql = "INSERT INTO  exitclearanceickoff (regno, clearancereason, semesterid) VALUES ('$matric_no', '$clearance_reason', '$semester_id')";
                $stmt = $this->db->query($sql);

                if($stmt){
                    return 'success';
                }else {
                    return 'error';
                }
            }
        }

        public function checkForDuplicateTranscriptRequest($matric_no, $clearance_reason, $semester_id){
            $query = "SELECT * from exitclearanceickoff  where regno = '$matric_no' and semesterid = '$semester_id' and clearancereason = '$clearance_reason'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row > 0){
                return true;
            }else {
                return false;
            }
        }
        public function changeOfProgramDetails($matno) {
            $query = "SELECT * FROM reglist where matno = '$matno'";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
       
	}


?>