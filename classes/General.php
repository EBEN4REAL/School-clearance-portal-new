<?php
session_start();
//  print_r($_SESSION);
   

	class General{

		private $db;

		public function __construct(){
			require_once($_SERVER['DOCUMENT_ROOT'] . '/cuclearance/includes/config.php');
			$this->db = $pdo;
		}

		/*** for login process ***/
		public function check_login($username){

			$query = "SELECT * from reglist WHERE matno='$username'";
			$stmt = $this->db->prepare($query);
			$row_count = $this->db->query("select count(*) from reglist WHERE matno='$username'")->fetchColumn(); 
			$stmt->execute();
			
			$row = $stmt->fetch(PDO::FETCH_ASSOC);


			if($row_count == 1){
				
				$_SESSION['regno'] = $username;
				header("location: ../change_of_program/change_program.php");
				return $row_count;
			}

		}
		public function checkStaffLogin($deptid){
			$query = "SELECT * from appointmenthistory where unit = '$deptid'";
			$stmt = $this->db->prepare($query);
			$stmt->execute(); 
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$_SESSION['pc_deptid'] = $deptid;
			$_SESSION['dept'] = $row['remark'];
			header("location: ../change_of_program/view_program_change_requests.php");
			return $row_count;
		}
		
		// public function getStudentProfile($matno){
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Registration Clearance'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];


		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			
		// 	$_SESSION['reg_status'] = $row['itemcleared'];
		// 	$_SESSION['reg_comment'] = $row['itemcomment'];

		// 	// Equipment Damage Clearance
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Equipment Damage Clearance'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$_SESSION['edc_status'] = $row['itemcleared'];
		// 	$_SESSION['edc_comment'] = $row['itemcomment'];

		// 	// Others
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Others(CSIS)'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno'ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['o_status'] = $row['itemcleared'];
		// 	$_SESSION['o_csis_comment'] = $row['itemcomment'];

		// 	// Other Service Charges
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Other Service Charges'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['osc_status'] = $row['itemcleared'];
		// 	$_SESSION['osc_comment'] = $row['itemcomment'];
		// }
		// public function getFinanceRecords($matno){
		// 	// Tution Related Fees status
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Tution Related Fees'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['trf_status'] = $row['itemcleared'];
		// 	$_SESSION['trf_comment'] = $row['itemcomment'];

		// 	// Make-up Resit/Late Registration charges Clearance
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Make-up Resit/Late Registration charges'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['mur_status'] = $row['itemcleared'];
		// 	$_SESSION['mur_comment'] = $row['itemcomment'];

		// 	// CMFB Loan
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'CMFB Loan'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['cmfb_status'] = $row['itemcleared'];
		// 	$_SESSION['cmfb_comment'] = $row['itemcomment'];

		// 	// Laptop Loan
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Laptop Loan'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['ll_status'] = $row['itemcleared'];
		// 	$_SESSION['ll_comment'] = $row['itemcomment'];

		// 	// Personal Financial Integrity
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Personal Financial Integrity'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['pfi_status'] = $row['itemcleared'];
		// 	$_SESSION['pfi_comment'] = $row['itemcomment'];

		// 	// Others
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Others'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['others_fin_status'] = $row['itemcleared'];
		// 	$_SESSION['others_comment'] = $row['itemcomment'];

		// 	// Staff Guarantee	
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Staff Guarantee'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['sg_status'] = $row['itemcleared'];
		// 	$_SESSION['sg_comment'] = $row['itemcomment'];
		// }
		
		// public function getHealthStatus($matno){
		// 	// reg clearance status
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Hall Damages'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['hd_status'] = $row['itemcleared'];
		// 	$_SESSION['hd_comment'] = $row['itemcomment'];

		// 	// Pending Disciplinary case
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Pending Disciplinary case'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['pdc_status'] = $row['itemcleared'];
		// 	$_SESSION['pdc_comment'] = $row['itemcomment'];

		// 	// Sport Center Clearance
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Sport Center Clearance'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['scc_status'] = $row['itemcleared'];
		// 	$_SESSION['scc_comment'] = $row['itemcomment'];

		// }
		// public function getCLRStudentProfile($matno){
		// 	// Books Damaged status
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'CLR'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['bo_status'] = $row['itemcleared'];
		// 	$_SESSION['bo_comment'] = $row['itemcomment'];

		// 	// Bills for damage Resources status
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Bills For Damaged Resources'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['bfdr_status'] = $row['itemcleared'];
		// 	$_SESSION['bfdr_comment'] = $row['itemcomment'];

			
		// }
		// public function getRegistryStudentProfile($matno){
		// 	// Books Damaged status
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Academic Record Status'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['ars_status'] = $row['itemcleared'];
		// 	$_SESSION['ars_comment'] = $row['itemcomment'];

		// 	// Bills for damage Resources status
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Final School Fees/Laptop Loan Clearance'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['fsf_status'] = $row['itemcleared'];
		// 	$_SESSION['fsf_comment'] = $row['itemcomment'];

			
		// }
		// public function getAcademicStudentProfile($matno){
		// 	// called
		// 	// reg clearance status
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Academic Requirement'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
		// 	$itemid = $row['itemid'];
		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['acad_req_status'] = $row['itemcleared'];
		// 	$_SESSION['acad_req_comment'] = $row['itemcomment'];

		// }

		// public function getHealthDeptRecords($matno){
		// 	// Fully Registered status
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Fully registered'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['fr_status'] = $row['itemcleared'];
		// 	$_SESSION['fr_comment'] = $row['itemcomment'];

		// 	// Bills for damage Resources status
		// 	$query = "SELECT * from exitclearancedeptitems where itemname = 'Outstanding Medical Bill'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$itemid = $row['itemid'];

		// 	$query = "SELECT * from exitclerancetransaction where itemid = '$itemid' and regno = '$matno' ORDER BY id DESC LIMIT 1";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute(); 
		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
		// 	$_SESSION['omb_status'] = $row['itemcleared'];
		// 	$_SESSION['omb_comment'] = $row['itemcomment'];

			
		// }
		// public function getStudentRecords(){

		// 	$query = "SELECT * FROM `reglist`";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute();

		// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

		// 		echo '
				
		// 		<tr>
		// 			<td>'.$row["matno"].'</td>
		// 			<td>
		// 			'.$row["fno"].'
		// 			</td>
		// 			<td>'.$row["sex"].'</td>
		// 			<td>'.$row["college"].'</td>
		// 			<td>'.$row["dept"].'</td>
		// 			<td>'.$row["program"].'</td>
		// 			<td>'.$row["level"].'</td>
		// 			<td>'.ucwords($row["fname"]).'</td>
		// 			<td>
		// 				<a href="student_profile.php?matno='.$row["matno"].'" class="btn btn-info" title="View  profile">
		// 					<i class="fa fa-eye" aria-hidden="true"></i> 
		// 				</a>
		// 			</td>
		// 		</tr>
		// 		';
		// 	}
            
		// }
		// public function getProgramChangeRequests(){

		// 	$query = "SELECT * FROM `changeofprogrammerequest`";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute();

		// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

		// 		echo '
				
		// 		<tr>
		// 			<td>'.$row["regno"].'</td>
		// 			<td>
		// 			'.$row["newprogram"].'
		// 			</td>
		// 			<td>'.$row["oldprogram"].'</td>
		// 			<td>'.$row["newlevel"].'</td>
		// 			<td>'.$row["oldlevel"].'</td>
		// 			<td>'.$row["changeremarks"].'</td>
		// 			<td>'.$row["requeststatus"].'</td>
		// 			<td>
		// 				<a href="program_change_request_details.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
		// 					<i class="fa fa-eye" aria-hidden="true"></i> 
		// 					View
		// 				</a>
		// 			</td>
		// 		</tr>
		// 		';
		// 	}
            
		// }
		// public function getProgramChangeRequestForVc(){

		// 	$query = "SELECT * FROM `changeofprogrammerequest`";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute();

		// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

		// 		echo '
				
		// 		<tr>
		// 			<td>'.$row["regno"].'</td>
		// 			<td>
		// 			'.$row["newprogram"].'
		// 			</td>
		// 			<td>'.$row["oldprogram"].'</td>
		// 			<td>'.$row["newlevel"].'</td>
		// 			<td>'.$row["oldlevel"].'</td>
		// 			<td>'.$row["changeremarks"].'</td>
		// 			<td>'.$row["requeststatus"].'</td>
		// 			<td>
		// 				<a href="vc_view.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
		// 					<i class="fa fa-eye" aria-hidden="true"></i> 
		// 					View
		// 				</a>
		// 			</td>
		// 		</tr>
		// 		';
		// 	}
            
		// }
		// public function getProgramChangeRequestsByForRegisrar(){

		// 	$query = "SELECT * FROM `changeofprogrammerequest`";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute();

		// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

		// 		echo '
				
		// 		<tr>
		// 			<td>'.$row["regno"].'</td>
		// 			<td>
		// 			'.$row["newprogram"].'
		// 			</td>
		// 			<td>'.$row["oldprogram"].'</td>
		// 			<td>'.$row["newlevel"].'</td>
		// 			<td>'.$row["oldlevel"].'</td>
		// 			<td>'.$row["changeremarks"].'</td>
		// 			<td>'.$row["requeststatus"].'</td>
		// 			<td>
		// 				<a href="registrar_view.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
		// 					<i class="fa fa-eye" aria-hidden="true"></i> 
		// 					View
		// 				</a>
		// 			</td>
		// 		</tr>
		// 		';
		// 	}
            
		// }
		// public function getTransactionHistory($matno){

		// 	$query = "SELECT * FROM `changeofprogrammetrans` where regno = '$matno'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute();

		// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

		// 		echo '
				
		// 		<tr>
		// 			<td>'.$row["regno"].'</td>
		// 			<td>'.$row["changetypeid"].'</td>
		// 			<td>'.$row["changeremarks"].'</td>
		// 			<td>'.$row["changeapproval"].'</td>
		// 			<td>'.$row["semid"].'</td>
		// 			<td>'.$row["transdatetime"].'</td>
		// 			<td>
		// 				<a href="transaction_history_details.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
		// 					<i class="fa fa-eye" aria-hidden="true"></i> 
		// 					View
		// 				</a>
		// 			</td>
		// 		</tr>
		// 		';
		// 	}
            
		// }
		// public function getStudentsBeingAccepted(){

		// 	$deptid = $_SESSION['pc_deptid'];
		// 	$query = "SELECT * FROM `changeofprogrammerequest` where new_dept_id =  '$deptid' ";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute();

		// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

		// 		echo '
				
		// 		<tr>
		// 			<td>'.$row["regno"].'</td>
		// 			<td>
		// 			'.$row["newprogram"].'
		// 			</td>
		// 			<td>'.$row["oldprogram"].'</td>
		// 			<td>'.$row["newlevel"].'</td>
		// 			<td>'.$row["oldlevel"].'</td>
		// 			<td>'.$row["changeremarks"].'</td>
		// 			<td>'.$row["requeststatus"].'</td>
		// 			<td>
		// 				<a href="program_change_request_details.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
		// 					<i class="fa fa-eye" aria-hidden="true"></i> 
		// 					View
		// 				</a>
		// 			</td>
		// 		</tr>
		// 		';
		// 	}
            
		// }
		// public function getStudentsBeingReleased(){

		// 	$deptid = $_SESSION['pc_deptid'];
		// 	$query = "SELECT * FROM `changeofprogrammerequest` where old_dept_id =  '$deptid' ";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute();

		// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

		// 		echo '
				
		// 		<tr>
		// 			<td>'.$row["regno"].'</td>
		// 			<td>
		// 			'.$row["newprogram"].'
		// 			</td>
		// 			<td>'.$row["oldprogram"].'</td>
		// 			<td>'.$row["newlevel"].'</td>
		// 			<td>'.$row["oldlevel"].'</td>
		// 			<td>'.$row["changeremarks"].'</td>
		// 			<td>'.$row["requeststatus"].'</td>
		// 			<td>
		// 				<a href="program_change_request_details.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
		// 					<i class="fa fa-eye" aria-hidden="true"></i> 
		// 					View
		// 				</a>
		// 			</td>
		// 		</tr>
		// 		';
		// 	}
            
		// }
		// public function getSameDeptStudents(){

		// 	$deptid = $_SESSION['pc_deptid'];
		// 	$query = "SELECT * FROM `changeofprogrammerequest` where old_dept_id =  '$deptid' and new_dept_id = '$deptid'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute();

		// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				

		// 		echo '
				
		// 		<tr>
		// 			<td>'.$row["regno"].'</td>
		// 			<td>
		// 			'.$row["newprogram"].'
		// 			</td>
		// 			<td>'.$row["oldprogram"].'</td>
		// 			<td>'.$row["newlevel"].'</td>
		// 			<td>'.$row["oldlevel"].'</td>
		// 			<td>'.$row["changeremarks"].'</td>
		// 			<td>'.$row["requeststatus"].'</td>
		// 			<td>
		// 				<a href="program_change_request_details.php?matno='.$row["regno"].'" class="btn btn-info" title="View  Details">
		// 					<i class="fa fa-eye" aria-hidden="true"></i> 
		// 					View
		// 				</a>
		// 			</td>
		// 		</tr>
		// 		';
		// 	}
            
		// }

		// public function getCsisStudentRecords(){
		// 	$query = "SELECT * FROM `reglist`";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute();

		// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

		// 		echo '
				
		// 		<tr>
		// 			<td>'.$row["matno"].'</td>
		// 			<td>
		// 			'.$row["fno"].'
		// 			</td>
		// 			<td>'.$row["sex"].'</td>
		// 			<td>'.$row["college"].'</td>
		// 			<td>'.$row["dept"].'</td>
		// 			<td>'.$row["program"].'</td>
		// 			<td>'.$row["level"].'</td>
		// 			<td>'.ucwords($row["fname"]).'</td>
		// 			<td>
		// 				<a href="csis_profile.php?matno='.$row["matno"].'" class="btn btn-info" title="View  profile">
		// 					<i class="fa fa-eye" aria-hidden="true"></i> 
		// 				</a>
		// 			</td>
		// 		</tr>
		// 		';
		// 	}
            
		// }
		// public function getClearanceDepartmentsForm($dept) {
		// 	// called
		// 	$query = "SELECT * FROM exitclerancedepts where clerance_department = '$dept'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute();

		// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$deptid = $row['deptid'];

		// 	$_SESSION['deptid'] = $deptid;


			
		// 	$query = "SELECT * FROM exitclearancedeptitems where deptid = '$deptid'";
		// 	$stmt = $this->db->prepare($query);
		// 	$stmt->execute();

		// 	$row_items = $stmt->fetch(PDO::FETCH_ASSOC);

		// 	$ids[] = null;

		// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		// 		$ids[] = (object)['itemid' => $row['itemid'], 'deptid' => $row['deptid']];
		// 	}

		// 	$_SESSION['items'] = $ids;
		// }
		// public function getClearanceDept(){

		// 		$query = "SELECT * FROM exitclerancedepts";
		// 		$stmt = $this->db->prepare($query);
		// 		$stmt->execute();

		// 		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					
		// 			echo '
					
		// 			<tr>
		// 				<td>'.$row["clerance_department"].'</td>
					
		// 				<td>
		// 					<a href="add_clearance_dept_table.php?clearance_dept='.$row["deptid"].'" class="btn btn-info" title="View  profile">
		// 						<i class="fa fa-edit" aria-hidden="true"></i> 
		// 					</a>
		// 				</td>
		// 				<td>
		// 					<a href="add_clearance_dept_table.php?status=delete&clearance_dept_id='.$row["deptid"].'" class="btn btn-danger" title="Delete Department">
		// 						<i class="fa fa-trash" aria-hidden="true"></i> 
		// 					</a>
		// 				</td>

		// 				<td>
		// 					<a href="add_dept_items.php?clerance_department='.$row["clerance_department"].'&clearance_dept_id='.$row["deptid"].'" class="btn btn-info" title="Add  Items to this department">
		// 						<i class="fa fa-plus" aria-hidden="true"></i> 
		// 					</a>
		// 				</td>

		// 				<td>
		// 					<a href="view_dept_items.php?clerance_department='.$row["clerance_department"].'&clearance_dept_id='.$row["deptid"].'" class="btn btn-info" title="View Items in this Department">
		// 						<i class="fa fa-eye" aria-hidden="true"></i> 
		// 					</a>
		// 				</td>
		// 			</tr>
		// 			';
		// 		}
				
		// 	}
			// public function addDeptItems( $item_name, $item_status, $ddate, $deptid ) {

			// 	$item_id = uniqid();
			// 	$sql = "INSERT INTO  exitclearancedeptitems (itemid, deptid, itemname, itemstatus, ddate) VALUES ('$item_id', '$deptid', '$item_name', '$item_status', '$ddate')";
			// 	$stmt = $this->db->query($sql);

			// 	if($stmt){
			// 		return true;
			// 	}else {
			// 		return false;
			// 	}
			// }
			// public function getExitClearanceKickOffTableNames(){

			// 	$query = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'cu_db' AND TABLE_NAME = 'exitclearanceickoff'			";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			
			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

			// 		echo '
					
			// 		<tr>
			// 			<td>'.$row["COLUMN_NAME"].'</td>
			// 			<td>
			// 				<a href="create_clearance_table.php?old_column_name='.$row["COLUMN_NAME"].'" class="btn btn-info" title="Edit  Column">
			// 					<i class="fa fa-edit" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
			// 			<td>
			// 				<a href="create_clearance_table.php?column_name='.$row["COLUMN_NAME"].'" class="btn btn-danger" title="Delete  Column">
			// 					<i class="fa fa-trash" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
						
			// 		</tr>
			// 		';
			// 	}
				
			// }
			
			// public function getDepartmentItems($deptId ,$dept){

			// 	$query = "SELECT * FROM exitclearancedeptitems WHERE deptid = '$deptId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();


			
			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

			// 		echo '
					
			// 		<tr>
			// 			<td>'.$row["itemname"].'</td>
			// 			<td>'.$row["itemstatus"].'</td>
			// 			<td>'.$row["ddate"].'</td>
			// 			<td>
			// 				<a href="add_dept_items.php?clerance_department='.$dept.'&clearance_dept_id='.$deptId.'&status=edit&item_id='.$row["itemid"].'&item_name='.$row["itemname"].'" class="btn btn-info" title="Edit  Item">
			// 					<i class="fa fa-edit" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
			// 			<td>
			// 				<a href="add_dept_items.php?clerance_department='.$dept.'&clearance_dept_id='.$deptId.'&status=delete&item_id='.$row["itemid"].'" class="btn btn-danger" title="Delete  Item">
			// 					<i class="fa fa-trash" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
						
			// 		</tr>
			// 		';
			// 	}
				
			// }
			// public function viewDeptItems($deptId){

			// 	$query = "SELECT * FROM exitclearancedeptitems WHERE deptid = '$deptId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();


			
			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

			// 		echo '
					
			// 		<tr>
			// 			<td>'.$row["itemname"].'</td>
			// 			<td>'.$row["itemstatus"].'</td>
			// 			<td>'.$row["ddate"].'</td>
			// 		</tr>
			// 		';
			// 	}
				
			// }
			// public function editDeptItems($itemid) {
			// 	$query = "UPDATE  exitclearancedeptitems SET itemname = '$itemname' WHERE itemid = '$itemid'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	if($stmt){
			// 		return true;
			// 	}else {
			// 		false;
			// 	}
			// }
			// public function updateStudentRequest($matno, $cr, $deptid, $staffrole, $request_id , $oldlevel,$newLevel, $semesterid, $oldprogram, $newprogram) {
				
			// 	// GET OLD  PROGRAM ID
			// 	$query = "SELECT * from  programs  where program = '$oldprogram'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$old_prog_id = $row['prgid'];

			// 	// GET NEW  PROGRAM ID
			// 	$query = "SELECT * from  programs  where program = '$newprogram'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$new_prog_id = $row['prgid'];

			// 	// GET STUDENT CHANGE TYPE
			// 	$query = "SELECT * from  changeofprogrammefee  where regno = '$matno'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$changetype = $row['changetype'];
				
			// 	$tdatetime = date("Y-m-d h:i:sa");


			// 	// Isert into transaction table
			// 	$sql = "INSERT INTO  changeofprogrammetrans (changetypeid, requestid, regno, staffrole, changeremarks, changeapproval, oldprgid, newprgid, oldlevel, newlevel, semid, transdatetime) VALUES ('$changetype', '$request_id', '$matno', '$staffrole','$cr', 'Processing', '$old_prog_id', '$new_prog_id', '$oldlevel', '$newLevel', '$semesterid', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

			// 	// Update requests
			// 	$deptid = $_SESSION['pc_deptid'];
			// 	$query = "UPDATE   changeofprogrammerequest SET changeremarks = '$cr', requeststatus = 'Processing' , deptid = '$deptid', staff_role = '$staffrole' WHERE regno = '$matno'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	if($stmt){
			// 		return true;
			// 	}else {
			// 		false;
			// 	}
			// }
			// public function effectChangeByRegistrar($regno, $nl, $np) {
				
			// 	// Update reglist
			// 	$query = "UPDATE   reglist SET program = '$np', `level` = '$nl' , `status` = 'approved'  WHERE matno = '$regno'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	// Update program request change status
			// 	$query = "UPDATE   changeofprogrammerequest SET requeststatus = 'approved' WHERE regno = '$regno'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	if($stmt){
			// 		return true;
			// 	}else {
			// 		false;
			// 	}
			// }
			// public function getDepartmentsSerialNumbers(){

			// 	$query = "SELECT * FROM  departments";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			
			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

			// 		echo '
					
			// 			<option value="'.$row['dpno'].'">'.$row['dpno'].'</option>
			// 		';
			// 	}
				
			// }
			// public function updateVCAction($regno, $action){

			// 	$query = "UPDATE  changeofprogrammerequest SET requeststatus = '$action'  WHERE regno = '$regno'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	$query = "UPDATE  changeofprogrammetrans SET changeapproval = '$action'  WHERE regno = '$regno'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	$sql = "INSERT INTO  exitclearancedeptitems (itemid, deptid, itemname, itemstatus, ddate) VALUES ('$item_id', '$deptid', '$item_name', '$item_status', '$ddate')";
			// 	$stmt = $this->db->query($sql);

				

			// 	if($stmt){
			// 		return true;
			// 	}else {
			// 		false;
			// 	}
			// }
			// public function updateClearanceDept ($status, $follow_order, $dept, $order_no, $deptid) {

			// 	$query = "UPDATE exitclerancedepts SET clerance_department = '$dept', followorder = '$follow_order', deptstatus = '$status', orderno = '$order_no'  WHERE deptid = '$deptid'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

				

			// 	if($stmt){
			// 		return true;
			// 	}else {
			// 		false;
			// 	}
			// }
			// public function updateClearanceDeptItems ($item_name, $item_status, $ddate,  $deptid, $item_id) {

			// 	$ddate = date("Y-m-d h:i:sa");
			// 	$query = "UPDATE exitclearancedeptitems SET itemname = '$item_name', itemstatus = '$item_status', ddate = '$ddate'  WHERE deptid = '$deptid' AND itemid = '$item_id'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

				

			// 	if($stmt){
			// 		return true;
			// 	}else {
			// 		false;
			// 	}
			// }
			// public function getKickoffRecords(){

			// 	$query = "SELECT * FROM exitclearanceickoff";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
				
			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// 		$cleared = $this->getDepartTotalItems($_SESSION['deptid'], $row["regno"]);
			// 		$student_status = '';
			// 		if($cleared == 'true') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px">cleared</span>';
			// 		}
			// 		else if($cleared == 'not treated') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: grey; font-size: 18px">Not Treated</span>';
			// 		}
			// 		else {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>';
			// 		} 
					
			// 		echo '
					
			// 		<tr>
			// 			<td>'.$row["regno"].'</td>
			// 			<td>'.$row["clearancereason"].'</td>
			// 			<td>'.$row["semesterid"].'</td>
			// 			<td>'.$student_status.'</td>
			// 			<td>
			// 				<a href="csis_profile.php?matno='.$row["regno"].'" class="btn btn-info" title="View Items in this Department">
			// 					<i class="fa fa-eye" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
			// 		</tr>
			// 		';
			// 	}
				
			// }
			// public function getKickOffRecordsForFinancialServices(){

			// 	$query = "SELECT * FROM exitclearanceickoff";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// 		$cleared = $this->getDepartTotalItems($_SESSION['deptid'], $row["regno"]);
			// 		$student_status = '';
			// 		if($cleared == 'true') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px">cleared</span>';
			// 		}
			// 		else if($cleared == 'not treated') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: grey; font-size: 18px">Not Treated</span>';
			// 		}
			// 		else {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>';
			// 		} 

			// 		echo '
					
			// 		<tr>
			// 			<td>'.$row["regno"].'</td>
			// 			<td>'.$row["clearancereason"].'</td>
			// 			<td>'.$row["semesterid"].'</td>
			// 			<td>'.$student_status.'</td>
			// 			<td>
			// 				<a href="fs_profile.php?matno='.$row["regno"].'" class="btn btn-info" title="View Items in this Department">
			// 					<i class="fa fa-eye" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
			// 		</tr>
			// 		';
			// 	}
				
			// }
			// public function getKickOffForRegistry(){

			// 	$query = "SELECT * FROM exitclearanceickoff";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// 		$cleared = $this->getDepartTotalItems($_SESSION['deptid'], $row["regno"]);
			// 		$student_status = '';
			// 		if($cleared == 'true') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px">cleared</span>';
			// 		}
			// 		else if($cleared == 'not treated') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: grey; font-size: 18px">Not Treated</span>';
			// 		}
			// 		else {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>';
			// 		} 

			// 		echo '
					
			// 		<tr>
			// 			<td>'.$row["regno"].'</td>
			// 			<td>'.$row["clearancereason"].'</td>
			// 			<td>'.$row["semesterid"].'</td>
			// 			<td>'.$student_status.'</td>
			// 			<td>
			// 				<a href="regs_profile.php?matno='.$row["regno"].'" class="btn btn-info" title="View Items in this Department">
			// 					<i class="fa fa-eye" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
			// 		</tr>
			// 		';
			// 	}
				
			// }
			// public function getKickoffForStudentAffairsDept(){

			// 	$query = "SELECT * FROM exitclearanceickoff";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// 		$cleared = $this->getDepartTotalItems($_SESSION['deptid'], $row["regno"]);
			// 		$student_status = '';
			// 		if($cleared == 'true') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px">cleared</span>';
			// 		}
			// 		else if($cleared == 'not treated') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: grey; font-size: 18px">Not Treated</span>';
			// 		}
			// 		else {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>';
			// 		} 

			// 		echo '
					
			// 		<tr>
			// 			<td>'.$row["regno"].'</td>
			// 			<td>'.$row["clearancereason"].'</td>
			// 			<td>'.$row["semesterid"].'</td>
			// 			<td>'.$student_status.'</td>
			// 			<td>
			// 				<a href="sa_profile.php?matno='.$row["regno"].'" class="btn btn-info" title="View Items in this Department">
			// 					<i class="fa fa-eye" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
			// 		</tr>
			// 		';
			// 	}
				
			// }
			// public function getKickoffRecordsForAcademicDept(){
			// 	// clerared
			// 	$query = "SELECT * FROM exitclearanceickoff";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// 		$cleared = $this->getDepartTotalItems($_SESSION['deptid'], $row["regno"]);
			// 		$student_status = '';
			// 		if($cleared == 'true') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px">cleared</span>';
			// 		}
			// 		else if($cleared == 'not treated') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: grey; font-size: 18px">Not Treated</span>';
			// 		}
			// 		else {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>';
			// 		} 

			// 		echo '
					
			// 		<tr>
			// 			<td>'.$row["regno"].'</td>
			// 			<td>'.$row["clearancereason"].'</td>
			// 			<td>'.$row["semesterid"].'</td>
			// 			<td>'.$student_status.'</td>
			// 			<td>
			// 				<a href="acad_dept_profile.php?matno='.$row["regno"].'" class="btn btn-info" title="View Items in this Department">
			// 					<i class="fa fa-eye" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
			// 		</tr>
			// 		';
			// 	}
				
			// }
			// public function getKickoffDetailsForHealthCenter(){
			// 	// cleared
			// 	$query = "SELECT * FROM exitclearanceickoff";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// 		$cleared = $this->getDepartTotalItems($_SESSION['deptid'], $row["regno"]);
			// 		$student_status = '';
			// 		if($cleared == 'true') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px">cleared</span>';
			// 		}
			// 		else if($cleared == 'not treated') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: grey; font-size: 18px">Not Treated</span>';
			// 		}
			// 		else {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>';
			// 		} 

			// 		echo '
					
			// 		<tr>
			// 			<td>'.$row["regno"].'</td>
			// 			<td>'.$row["clearancereason"].'</td>
			// 			<td>'.$row["semesterid"].'</td>
			// 			<td>'.$student_status.'</td>
			// 			<td>
			// 				<a href="medical_profile.php?matno='.$row["regno"].'" class="btn btn-info" title="View Items in this Department">
			// 					<i class="fa fa-eye" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
			// 		</tr>
			// 		';
			// 	}
				
			// }
			// public function getKickoffRecordsForCLR(){
			// 	// cleared

			// 	$query = "SELECT * FROM exitclearanceickoff";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// 		$cleared = $this->getDepartTotalItems($_SESSION['deptid'], $row["regno"]);
			// 		$student_status = '';
			// 		if($cleared == 'true') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px">cleared</span>';
			// 		}
			// 		else if($cleared == 'not treated') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: grey; font-size: 18px">Not Treated</span>';
			// 		}
			// 		else {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>';
			// 		} 

			// 		echo '
					
			// 		<tr>
			// 			<td>'.$row["regno"].'</td>
			// 			<td>'.$row["clearancereason"].'</td>
			// 			<td>'.$row["semesterid"].'</td>
			// 			<td>'.$student_status.'</td>
			// 			<td>
			// 				<a href="clr_profile.php?matno='.$row["regno"].'" class="btn btn-info" title="View Items in this Department">
			// 					<i class="fa fa-eye" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
			// 		</tr>
			// 		';
			// 	}
				
			// }
			
			// public function getClearanceDepartments($deptid) {
			// 	$query = "SELECT * from  exitclerancedepts  where deptid = '$deptid'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
				
			// 	if($row){
			// 		return $row;
			// 	}
			// }
			// public function deleteClearanceDepartment($deptid) {
			// 	$query = "DELETE FROM `exitclerancedepts` WHERE deptid= '$deptid'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
				
			// 	if($stmt){
			// 		return true;
			// 	}else {
			// 		return false;
			// 	}
			// }
			
			// public function deleteDepartmentItems($itemid) {
			// 	$query = "DELETE FROM `exitclearancedeptitems` WHERE itemid= '$itemid'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

				
			// 	if($stmt){
			// 		return true;
			// 	}else {
			// 		return false;
			// 	}
			// }
			// public function getAStudentRecord($student_id){
			// 	// called
				
			// 	$query = "SELECT * from exitclearanceickoff , reglist where exitclearanceickoff.regno = '$student_id' AND reglist.matno = '$student_id'
			// 	";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
				
			// 	if($row){
			// 		return $row;
			// 	}
			// }
			// public function getStudentRequestDetails($student_id){

			// 	$query = "SELECT * from changeofprogrammerequest , reglist where changeofprogrammerequest.regno = '$student_id' AND reglist.matno = '$student_id'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
				
			// 	if($row){
			// 		return $row;
			// 	}
			// }

			// public function get_programs(){
			// 	$query = "SELECT * FROM `programs`";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// 		echo '
			// 			<option value="'.$row["program"].'">'.$row["program"].'</option>
			// 		';
			// 	}
			// }
			// public function getDeptId(){
			// 	$query = "SELECT * FROM `appointmenthistory`";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// 		echo '
			// 			<option value="'.$row["unit"].'">'.$row["remark"].'</option>
			// 		';
			// 	}
			// }
			// public function getKickoffRecordsFinance(){

			// 	$query = "SELECT * FROM exitclearanceickoff";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			

			
			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

			// 		echo '
					
			// 		<tr>
			// 			<td>'.$row["regno"].'</td>
			// 			<td>'.$row["clearancereason"].'</td>
			// 			<td>'.$row["semesterid"].'</td>
			// 			<td>
			// 				<a href="finance_profile.php?matno='.$row["regno"].'" class="btn btn-info" title="View Items in this Department">
			// 					<i class="fa fa-eye" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
			// 		</tr>
			// 		';
			// 	}
				
			// }
			
			// public function dropTableColumn($columnName){
			// 	$tableName = 'exitclearanceickoff';
			// 	$columnName = $columnName;
			// 	$sql = "ALTER TABLE  `$tableName` DROP  `$columnName`";
			// 	$stmt = $this->db->query($sql);

			// 	if($stmt){
			// 		return true;
			// 	}else {
			// 		return false;
			// 	}
			// }
			// public function updateColumnName ($oldColumnName, $newColumnName) {
			// 	$tableName = 'exitclearanceickoff';
			// 	$columnName = $oldColumnName;
			// 	$sql = "ALTER TABLE `exitclearanceickoff` CHANGE `$oldColumnName` `$newColumnName` VARCHAR(255)  NULL";

			// 	$stmt = $this->db->query($sql);

			// 	if($stmt){
			// 		return true;
			// 	}else {
			// 		return false;
			// 	}
			// }
			// public function createNewExitClearancKickoffDBItem($column, $type){

			// 	$sql = '';

			// 	$tableName = 'exitclearanceickoff';
				
			// 	$columnName = $column;

			// 	if($type === 'int'){
			// 		$sql = "ALTER TABLE  `$tableName` ADD  `$columnName` INT(255)  NULL";
			// 	}else if($type === 'varchar') {
			// 		$sql = "ALTER TABLE  `$tableName` ADD  `$columnName` varchar(255)  NULL";
			// 	}else if($type === 'string'){
			// 		$sql = "ALTER TABLE  `$tableName` ADD  `$columnName` text(1000)  NULL";
			// 	}

			// 	$stmt = $this->db->query($sql);

			// 	if($stmt){
			// 		return true;
			// 	}else {
			// 		return false;
			// 	}
			// }
			
			// public function addClearanceDept($status, $follow_order, $dept, $order_no){

			// 	$sql = "INSERT INTO  exitclerancedepts (clerance_department, followorder, deptstatus, orderno) VALUES ('$dept', '$follow_order', '$status', '$order_no')";
			// 	$stmt = $this->db->query($sql);

			// 	if($stmt){
			// 		return true;
			// 	}else {
			// 		return false;
			// 	}
			// }

			// public function addCSISRecords($reg_clearance, $equipment_damge_clearance, $other_service_charges, $others, $deptid, $kickoffid , $row_no, $reg_action,$osc_action, $o_action,  $edc_action) {
				
			// 	// Process Equipment Damage Clearance
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Equipment Damage Clearance'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");
				
			// 	$itemId = $row['itemid'];

			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();
				
			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$row_no', '$deptid','$itemId', '$equipment_damge_clearance', '$edc_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);
			

				
			// 	// Process Other Service Charges
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Other Service Charges'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");


			// 	$itemId = $row['itemid'];

			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$row_no', '$deptid','$itemId', '$other_service_charges', '$osc_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

			

			// 	// Process Others Field
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Others(CSIS)'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");


			// 	$itemId = $row['itemid'];

			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();
			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$row_no', '$deptid','$itemId', '$others', '$o_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

			
			// 	// Process  Registration Clearance Field
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Registration Clearance'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");


			// 	$itemId = $row['itemid'];

			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$row_no', '$deptid','$itemId', '$reg_clearance', '$reg_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

			

			// 	if($stmt){
			// 		header("location: ./csis.php");
			// 		return true;
			// 	}else {
			// 		header("location: ./csis.php");
			// 		return false;
			// 	}

				
			// }
			// public function addFiancialServicesRecords($kickoffid,$ll, $cmfb, $others , $trf, $pfi, $mur, $sg , $ll_action, $cmfb_action, $others_action, $sg_action, $trf_action, $pfi_action, $mur_action,  $deptid, $row_no) {

			// 	// Process Laptop Loan
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Laptop Loan'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");
				


			// 	$itemId = $row['itemid'];


			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$row_no', '$deptid','$itemId', '$ll', '$ll_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

				
			// 	// Process Other Service Charges
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Tution Related Fees'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");


			// 	$itemId = $row['itemid'];

			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$row_no', '$deptid','$itemId', '$trf', '$trf_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

			// 	// Make-up Resit/Late Registration charges
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Make-up Resit/Late Registration charges'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");


			// 	$itemId = $row['itemid'];

			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$row_no', '$deptid','$itemId', '$mur', '$mur_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);


			// 	// Process  CMFB Loan
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'CMFB Loan'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");


			// 	$itemId = $row['itemid'];

			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();
				
			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$row_no', '$deptid','$itemId', '$cmfb', '$cmfb_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

			// 	// Process  Staff Guarantee
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Staff Guarantee'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");


			// 	$itemId = $row['itemid'];

			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$row_no', '$deptid','$itemId', '$cmfb', '$sg_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);


			// 	// Personal Financial Integrity
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Personal Financial Integrity'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");


			// 	$itemId = $row['itemid'];

			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$row_no', '$deptid','$itemId', '$cmfb', '$pfi_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);


			// 	// Personal Others
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Others'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");


			// 	$itemId = $row['itemid'];

			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$row_no', '$deptid','$itemId', '$others', '$others_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

			// 	if($stmt){
			// 		header("location: ./fs.php");
			// 		return true;
			// 	}else {
			// 		header("location: ./fs.php");
			// 		return false;
			// 	}

				
			// }
			// public function addStudentAffairsRecord($hd, $pdc, $scc, $deptid, $kickoffid , $regno, $hd_action, $pdc_action, $scc_action ) {

			// 	// Process Hall Damages
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Hall Damages'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");
				


			// 	$itemId = $row['itemid'];


			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$regno', '$deptid','$itemId', '$hd', '$hd_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

			
				
			// 	// Process Other Service Charges
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Pending Disciplinary case'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");


			// 	$itemId = $row['itemid'];

			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$regno', '$deptid','$itemId', '$pdc', '$pdc_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

			// 	// Process Sport Center Clearance
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Sport Center Clearance'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");


			// 	$itemId = $row['itemid'];

			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$regno', '$deptid','$itemId', '$scc', '$scc_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

			// 	if($stmt){
			// 		header("location: ./sa.php");
			// 		return true;
			// 	}else {
			// 		header("location: ./sa.php");
			// 		return false;
			// 	}

				
			// }
			// public function addAcademicDepartmentRecords($academic_requirement, $deptid, $kickoffid , $reg_no, $acad_req_action) {
				
			// 	// Process Equipment Damage Clearance
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Academic Requirement'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");
				


			// 	$itemId = $row['itemid'];



			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$reg_no', '$deptid','$itemId', '$academic_requirement', '$acad_req_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

			// 	if($stmt){
			// 		header("location: ./acad_dept.php");
			// 		return true;
			// 	}else {
			// 		header("location: ./acad_dept.php");
			// 		return false;
			// 	}

				
			// }
			// public function addClrDepartmentRecord($books_outstanding, $bills_for_damaged_resources,  $deptid, $kickoffid , $reg_no, $bfdr_action, $bo_action) {

			// 	// Process books_outstanding
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Books  Outstanding'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");
				

			// 	$itemId = $row['itemid'];



			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$reg_no', '$deptid','$itemId', '$books_outstanding', '$bo_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

			// 	// Process Bill Outstanding
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Bills For Damaged Resources'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");
				
			// 	$itemId = $row['itemid'];

			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$reg_no', '$deptid','$itemId', '$bills_for_damaged_resources', '$bfdr_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);


			// 	if($stmt){
			// 		header("location: ./clr.php");
			// 		return true;
			// 	}else {
			// 		header("location: ./clr.php");
			// 		return false;
			// 	}

				
			// }
			// public function addRegistryRecords($academic_record_status, $final_school_fees,  $deptid, $kickoffid , $reg_no, $ars_action, $fsf_action) {

				
			// 	// Academic Record Status
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Academic Record Status'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");
				

			// 	$itemId = $row['itemid'];



			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$reg_no', '$deptid','$itemId', '$academic_record_status', '$ars_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);
			
			// 	// Final School Fees/Laptop Loan Clearance
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Final School Fees/Laptop Loan Clearance'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");
				


			// 	$itemId = $row['itemid'];




			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$reg_no', '$deptid','$itemId', '$final_school_fees', '$fsf_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);
			

			// 	if($ars_action == 1 && $fsf_action == 1) {
			// 		$query = "UPDATE  exitclearanceickoff SET exitclrstatus	 = 'completed ' WHERE regno = '$reg_no'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 	}else {
			// 		$query = "UPDATE  exitclearanceickoff SET exitclrstatus	 = 'not completed ' WHERE regno = '$reg_no'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 	}

			// 	if($stmt){
			// 		header("location: ./regs.php");
			// 		return true;
			// 	}else {
			// 		header("location: ./regs.php");
			// 		return false;
			// 	}
			// }
			// public function addMedicalClearanceRecords($omb, $fr,  $deptid, $kickoffid , $reg_no, $omb_action, $fr_action) {

				
			// 	// Process Outstanding Medical Bill
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Outstanding Medical Bill'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");

			// 	$itemId = $row['itemid'];
				



			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$reg_no', '$deptid','$itemId', '$omb', '$omb_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);

			// 	// Process FUlly Registered
			// 	$query = "SELECT * from  exitclearancedeptitems  where deptid = '$deptid' and itemname = 'Fully registered'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$tdatetime = date("Y-m-d h:i:sa");
				


			// 	$itemId = $row['itemid'];




			// 	$query = "SELECT * from  exitclerancetransaction  where itemid = '$itemId'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("SELECT * from  exitclerancetransaction  where itemid = '$itemId'")->fetchColumn(); 
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$transId = uniqid();

			// 	$sql = "INSERT INTO  exitclerancetransaction (transactionid, kickoffid, regno, deptid, itemid,itemcomment, itemcleared, tdatetime) VALUES ('$transId', '$kickoffid', '$reg_no', '$deptid','$itemId', '$fr', '$fr_action', '$tdatetime')";
			// 	$stmt = $this->db->query($sql);


			// 	if($stmt){
			// 		header("location: ./medical.php");
			// 		return true;
			// 	}else {
			// 		header("location: ./medical.php");
			// 		return false;
			// 	}

				
			// }

			// public function applyForChangeOfProgram($amount, $rowno, $old_level, $new_level, $old_program, $new_progam,	$semester, $change_type){

			// 	// Get Old Program department Id
			// 	$query = "SELECT * from  programs  where program = '$old_program'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$old_deptid = $row['deptid'];


			// 	// Get New Program department Id
			// 	$query = "SELECT * from  programs  where program = '$new_progam'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$new_deptid = $row['deptid'];


			// 	$isChangeInitiated = $this->checkForMultipleChangeOfProgramRequests($rowno);



			// 	if($isChangeInitiated) {
			// 		return false;
			// 	}else {
			// 		$date = date("Y-m-d h:i:sa");

			// 		$sql = "INSERT INTO  changeofprogrammefee (changetype, amount, regno, feedatetime) VALUES ('$change_type', '$amount', '$rowno', '$date')";
					
			// 		$stmt = $this->db->query($sql);

			// 		$sql = "INSERT INTO  changeofprogrammerequest (regno, newprogram, oldprogram, oldlevel, newlevel, semesterid, requestdatetime, old_dept_id, new_dept_id, changetypeid) VALUES ('$rowno', '$new_progam', '$old_program', '$old_level','$new_level', '$semester' , '$date', '$old_deptid', '$new_deptid' , '$change_type')";
			// 		$stmt = $this->db->query($sql);

			// 		if($stmt){
			// 			return true;
			// 		}else {
			// 			return false;
			// 		}
			// 	}

				
			// }

			// public function checkForMultipleChangeOfProgramRequests($matno){
			// 	$query = "SELECT * from changeofprogrammerequest WHERE regno='$matno'";
			// 	$stmt = $this->db->prepare($query);
			// 	$row_count = $this->db->query("select count(*) from changeofprogrammerequest WHERE regno='$matno'")->fetchColumn(); 
			// 	$stmt->execute();


				
			// 	if($row_count > 1){
			// 		return true;
			// 	}else {
			// 		return false;
			// 	}
			// }

			// public function saveStudentClearanceRecords($matric_no, $clearance_reason, $semester_id){
			// 	$stm = $this->db->query("SELECT * from exitclearanceickoff  where   regno = '$matric_no'");
			// 	$reg_no_count = $stm->rowCount();

			// 	if($reg_no_count > 0) {
			// 		return 'Duplicate Matric Number';
			// 	}else {
			// 		$sql = "INSERT INTO  exitclearanceickoff (regno, clearancereason, semesterid) VALUES ('$matric_no', '$clearance_reason', '$semester_id')";
			// 		$stmt = $this->db->query($sql);

			// 		if($stmt){
			// 			return 'success';
			// 		}else {
			// 			return 'error';
			// 		}
			// 	}
			// }

			// public function checkForDuplicateTranscriptRequest($matric_no, $clearance_reason, $semester_id){
			// 	$query = "SELECT * from exitclearanceickoff  where regno = '$matric_no' and semesterid = '$semester_id' and clearancereason = '$clearance_reason'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	if($row > 0){
			// 		return true;
			// 	}else {
			// 		return false;
			// 	}
			// }

			// NEW CODE START5 HERE
			// public function getStudentDeptId($program){
			// 	$query = "SELECT * from programs  where program = '$program'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 	return  $row['deptid'];
			// }
			
			// public function getRegistryStudents(){
			// 	// GET REGISTRY DEPT ID
			// 	$query = "SELECT * FROM exitclerancedepts where clerance_department = 'Registry' ";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$registry_id = $row['deptid'];
				
			// 	$query = "SELECT * FROM exitclerancetransaction where deptid <> '$registry_id' ORDER BY id DESC";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
				
			// 	$records = array();
			// 	while ($record =  $stmt->fetch(PDO::FETCH_ASSOC)){
			// 		$records[] = $record;
			// 	}
			// 	$depCountArr = array();
			// 	$matric_nos = array();
			// 	foreach ($records as $record) {
			// 		$deptid = $record['deptid'];
			// 		$stmt = $this->db->query("SELECT * from exitclearancedeptitems  where deptid = '$deptid'");
			// 		$deptItemsCount = $stmt->rowCount();
			// 		$depCountArr[] = $deptItemsCount;
			// 		$mat_no_exits = in_array($record['regno'] , $matric_nos);
			// 		if(!$mat_no_exits) {
			// 			$matric_nos[] = $record['regno'];
			// 		}
			// 	}
			// 	$cleared_reg_nos = array();
			// 	foreach($matric_nos as $regno) {
			// 		$query = "SELECT * FROM exitclerancedepts where clerance_department = 'CSIS'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 		$csis_deptid = $row['deptid'];
			// 		$csis_status = $this->getStudentStatusForRegistry($csis_deptid,$regno );

			// 		$query = "SELECT * FROM exitclerancedepts where clerance_department = 'Financial Services'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 		$fs_deptid = $row['deptid'];
			// 		$fs_status = $this->getStudentStatusForRegistry($fs_deptid,$regno );

			// 		$query = "SELECT * FROM exitclerancedepts where clerance_department = 'CLR'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 		$clr_deptid = $row['deptid'];
			// 		$clr_status = $this->getStudentStatusForRegistry($clr_deptid,$regno );

			// 		$query = "SELECT * FROM exitclerancedepts where clerance_department = 'Academic Department'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 		$ad_deptid = $row['deptid'];
			// 		$ad_status = $this->getStudentStatusForRegistry($ad_deptid,$regno);

			// 		$query = "SELECT * FROM exitclerancedepts where clerance_department = 'Health Center'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 		$hc_deptid = $row['deptid'];
			// 		$hc_status = $this->getStudentStatusForRegistry($hc_deptid,$regno);

			// 		$query = "SELECT * FROM exitclerancedepts where clerance_department = 'Student Affairs'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 		$sa_deptid = $row['deptid'];
			// 		$sa_status = $this->getStudentStatusForRegistry($sa_deptid,$regno);

			// 		if($sa_status == 'true' && $hc_status == 'true' && $ad_status == 'true' && $clr_status == 'true' && $csis_status == 'true' && $fs_status == 'true') {
			// 			$cleared_reg_nos[] =  "'" . strval($regno) . "'";
			// 		}
			// 	}
			// 	$mat_nos = implode(",", $cleared_reg_nos);
			// 	$query = "SELECT * FROM exitclearanceickoff where regno IN ($mat_nos)";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// 		$cleared = $this->getDepartTotalItems($_SESSION['deptid'], $row["regno"]);
			// 		$student_status = '';
			// 		if($cleared == 'true') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px">cleared</span>';
			// 		}
			// 		else if($cleared == 'not treated') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: grey; font-size: 18px">Not Treated</span>';
			// 		}
			// 		else {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>';
			// 		} 

			// 		echo '
					
			// 		<tr>
			// 			<td>'.$row["regno"].'</td>
			// 			<td>'.$row["clearancereason"].'</td>
			// 			<td>'.$row["semesterid"].'</td>
			// 			<td>'.$student_status.'</td>
			// 			<td>
			// 				<a href="regs_profile.php?matno='.$row["regno"].'" class="btn btn-info" title="View Items in this Department">
			// 					<i class="fa fa-eye" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
			// 		</tr>
			// 		';
			// 	}
			// }
			// public function getStudentStatusForRegistry($deptId, $matric_no){
			// 	$query = "SELECT * FROM exitclerancedepts where clerance_department = 'Registry' ";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$registry_id = $row['deptid'];


			// 	$stmt = $this->db->query("SELECT * from exitclearancedeptitems  where deptid = $deptId AND deptid <> $registry_id");
			// 	$deptItemsCount = $stmt->rowCount();

			// 	$stmt_1 = $this->db->query("SELECT * from exitclerancetransaction  where deptid = '$deptId' and regno = '$matric_no' AND deptid <> $registry_id");
			// 	$student_transaction_count = $stmt_1->rowCount();

			// 	// GET TRANSACTION RECORDS
			// 	$query = "SELECT * from exitclerancetransaction  where deptid = '$deptId' and regno = '$matric_no' ORDER BY id DESC LIMIT $deptItemsCount ";
			// 	$stmt_2 = $this->db->prepare($query);
			// 	$stmt_2->execute();
			// 	$notClearedItems  = 0;
				
			// 	while($row = $stmt_2->fetch(PDO::FETCH_ASSOC)) {
			// 		if($row['itemcleared'] == 0) {
			// 			$notClearedItems++;
			// 		}
			// 	}
			// 	if($student_transaction_count == 0) {
			// 		return 'not treated';
			// 	}
			// 	if($notClearedItems > 0 ) {
			// 		return 'false';
			// 	}
			// 	if($notClearedItems == 0 && $student_transaction_count > 0) {
			// 		return 'true';
			// 	}
			// }
			// public function getStudentStatusForFinancialServices($deptId, $matric_no){
			// 	$query = "SELECT * FROM exitclerancedepts where clerance_department = 'Registry' ";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 	$registry_id = $row['deptid'];

			// 	$query = "SELECT * FROM exitclerancedepts where clerance_department = 'Financial Services'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 	$fs_id = $row['deptid'];

			// 	$stmt = $this->db->query("SELECT * from exitclearancedeptitems  where deptid = $deptId AND deptid <> $registry_id AND deptid <> $fs_id");
			// 	$deptItemsCount = $stmt->rowCount();

			// 	$stmt_1 = $this->db->query("SELECT * from exitclerancetransaction  where deptid = '$deptId' and regno = '$matric_no' AND deptid <> $registry_id AND deptid <> $fs_id");
			// 	$student_transaction_count = $stmt_1->rowCount();

			// 	// GET TRANSACTION RECORDS
			// 	$query = "SELECT * from exitclerancetransaction  where deptid = '$deptId' and regno = '$matric_no' ORDER BY id DESC LIMIT $deptItemsCount ";
			// 	$stmt_2 = $this->db->prepare($query);
			// 	$stmt_2->execute();
			// 	$notClearedItems  = 0;
				
			// 	while($row = $stmt_2->fetch(PDO::FETCH_ASSOC)) {
			// 		if($row['itemcleared'] == 0) {
			// 			$notClearedItems++;
			// 		}
			// 	}
			// 	if($student_transaction_count == 0) {
			// 		return 'not treated';
			// 	}
			// 	if($notClearedItems > 0 ) {
			// 		return 'false';
			// 	}
			// 	if($notClearedItems == 0 && $student_transaction_count > 0) {
			// 		return 'true';
			// 	}
			// }
			// public function getFinancialServiceStudents(){
			// 	// GET REGISTRY DEPT ID
			// 	$query = "SELECT * FROM exitclerancedepts where clerance_department = 'Registry' ";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$registry_id = $row['deptid'];

			// 	// GET Financial Services DEPT ID
			// 	$query = "SELECT * FROM exitclerancedepts where clerance_department = 'Financial Services' ";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 	$fs_id = $row['deptid'];
				
			// 	$query = "SELECT * FROM exitclerancetransaction where deptid <> '$registry_id' and deptid <> '$fs_id' ORDER BY id DESC";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
				
			// 	$records = array();
			// 	while ($record =  $stmt->fetch(PDO::FETCH_ASSOC)){
			// 		$records[] = $record;
			// 	}
			// 	$depCountArr = array();
			// 	$matric_nos = array();
			// 	foreach ($records as $record) {
			// 		$deptid = $record['deptid'];
			// 		$stmt = $this->db->query("SELECT * from exitclearancedeptitems  where deptid = '$deptid'");
			// 		$deptItemsCount = $stmt->rowCount();
			// 		$depCountArr[] = $deptItemsCount;
			// 		$mat_no_exits = in_array($record['regno'] , $matric_nos);
			// 		if(!$mat_no_exits) {
			// 			$matric_nos[] = $record['regno'];
			// 		}
			// 	}
			// 	$cleared_reg_nos = array();
			// 	foreach($matric_nos as $regno) {
			// 		$query = "SELECT * FROM exitclerancedepts where clerance_department = 'CSIS'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 		$csis_deptid = $row['deptid'];
			// 		$csis_status = $this->getStudentStatusForFinancialServices($csis_deptid,$regno );

			// 		$query = "SELECT * FROM exitclerancedepts where clerance_department = 'CLR'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 		$clr_deptid = $row['deptid'];
			// 		$clr_status = $this->getStudentStatusForFinancialServices($clr_deptid,$regno );

			// 		$query = "SELECT * FROM exitclerancedepts where clerance_department = 'Academic Department'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 		$ad_deptid = $row['deptid'];
			// 		$ad_status = $this->getStudentStatusForFinancialServices($ad_deptid,$regno);

			// 		$query = "SELECT * FROM exitclerancedepts where clerance_department = 'Health Center'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 		$hc_deptid = $row['deptid'];
			// 		$hc_status = $this->getStudentStatusForFinancialServices($hc_deptid,$regno);

			// 		$query = "SELECT * FROM exitclerancedepts where clerance_department = 'Student Affairs'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 		$sa_deptid = $row['deptid'];
			// 		$sa_status = $this->getStudentStatusForFinancialServices($sa_deptid,$regno);

			// 		if($sa_status == 'true' && $hc_status == 'true' && $ad_status == 'true' && $clr_status == 'true' && $csis_status == 'true') {
			// 			$cleared_reg_nos[] =  "'" . strval($regno) . "'";
			// 		}
			// 	}
			// 	$mat_nos = implode(",", $cleared_reg_nos);
			// 	$query = "SELECT * FROM exitclearanceickoff where regno IN ($mat_nos)";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();

			// 	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			// 		$cleared = $this->getDepartTotalItems($_SESSION['deptid'], $row["regno"]);
			// 		$student_status = '';
			// 		if($cleared == 'true') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: green; font-size: 18px">cleared</span>';
			// 		}
			// 		else if($cleared == 'not treated') {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: grey; font-size: 18px">Not Treated</span>';
			// 		}
			// 		else {
			// 			$student_status =  '<span class="badge badge-success badge-pill" style="background: red; font-size: 18px">Not cleared</span>';
			// 		} 

			// 		echo '
					
			// 		<tr>
			// 			<td>'.$row["regno"].'</td>
			// 			<td>'.$row["clearancereason"].'</td>
			// 			<td>'.$row["semesterid"].'</td>
			// 			<td>'.$student_status.'</td>
			// 			<td>
			// 				<a href="fs_profile.php?matno='.$row["regno"].'" class="btn btn-info" title="View Items in this Department">
			// 					<i class="fa fa-eye" aria-hidden="true"></i> 
			// 				</a>
			// 			</td>
			// 		</tr>
			// 		';
			// 	}
			// }
			// public function getDepartTotalItems($deptId, $matric_no){
			// 	// called
			// 	$stmt = $this->db->query("SELECT * from exitclearancedeptitems  where deptid = $deptId");
			// 	$deptItemsCount = $stmt->rowCount();

			// 	$stmt_1 = $this->db->query("SELECT * from exitclerancetransaction  where deptid = '$deptId' and regno = '$matric_no'");
			// 	$student_transaction_count = $stmt_1->rowCount();

			// 	// GET TRANSACTION RECORDS
			// 	$query = "SELECT * from exitclerancetransaction  where deptid = '$deptId' and regno = '$matric_no' ORDER BY id DESC LIMIT $deptItemsCount ";
			// 	$stmt_2 = $this->db->prepare($query);
			// 	$stmt_2->execute();
			// 	$notClearedItems  = 0;
				
			// 	while($row = $stmt_2->fetch(PDO::FETCH_ASSOC)) {
			// 		if($row['itemcleared'] == 0) {
			// 			$notClearedItems++;
			// 		}
			// 	}
			// 	if($student_transaction_count == 0) {
			// 		$query = "SELECT * from student_depts_status  where dept_id = '$deptId' and matric_no = '$matric_no'";
			// 		$stmt = $this->db->prepare($query);
			// 		$stmt->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);


			// 		if(!$row) {
			// 			$sql = "INSERT INTO  student_depts_status (matric_no, dept_id, dept_status) VALUES ('$matric_no', '$deptId', 0)";
			// 			$stmt = $this->db->query($sql);
			// 		}else {
			// 			$query = "UPDATE  student_depts_status SET matric_no = '$matric_no', dept_status = 0 WHERE dept_id = $deptId";
			// 			$stmt = $this->db->prepare($query);
			// 			$stmt->execute();
			// 		}

			// 		return 'not treated';
			// 	}
			// 	if($notClearedItems > 0 ) {
			// 		$query = "SELECT * from student_depts_status  where dept_id = '$deptId' and matric_no = '$matric_no'";
			// 		$stmt_2 = $this->db->prepare($query);
			// 		$stmt_2->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 		if(!$row) {
			// 			$sql = "INSERT INTO  student_depts_status (matric_no, dept_id, dept_status) VALUES ('$matric_no', '$deptId', 0)";
			// 			$stmt = $this->db->query($sql);
			// 		}else {
			// 			$query = "UPDATE  student_depts_status SET matric_no = '$matric_no', dept_status = 1 WHERE dept_id = '$deptId'";
			// 			$stmt = $this->db->prepare($query);
			// 			$stmt->execute();
			// 		}
			// 		return 'false';
			// 	}
			// 	if($notClearedItems == 0 && $student_transaction_count > 0) {
			// 		$query = "SELECT * from student_depts_status  where dept_id = '$deptId' and matric_no = '$matric_no'";
			// 		$stmt_2 = $this->db->prepare($query);
			// 		$stmt_2->execute();
			// 		$row = $stmt->fetch(PDO::FETCH_ASSOC);

			// 		if(!$row) {
			// 			$sql = "INSERT INTO  student_depts_status (matric_no, dept_id, dept_status) VALUES ('$matric_no', '$deptId', 1)";
			// 			$stmt = $this->db->query($sql);
			// 		}else {
			// 			$query = "UPDATE  student_depts_status SET matric_no = '$matric_no' , dept_status = 1 WHERE dept_id = '$deptId'";
			// 			$stmt = $this->db->prepare($query);
			// 			$stmt->execute();
			// 		}
			// 		return 'true';
			// 	}
			// } 
			// public function changeOfProgramDetails($matno) {
			// 	$query = "SELECT * FROM reglist where matno = '$matno'";
			// 	$stmt = $this->db->prepare($query);
			// 	$stmt->execute();
			// 	$row = $stmt->fetch(PDO::FETCH_ASSOC);
			// 	return $row;
			// }
	}


?>