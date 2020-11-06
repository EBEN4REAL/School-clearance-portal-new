<?php
    include '../classes/General.php';
    $general = new General();
    if (isset($_POST['regno'])) {
        $regno = $_POST['regno'];
        $oldlevel = $_POST['oldlevel'];
        $newlevel = $_POST['newlevel'];
        $oldprogram = $_POST['oldprogram'];
        $changeType = $_POST['changeType'];
        $semester = $_POST['semester'];
        $newprogram = $_POST['newprogram'];

        $amount = $_POST['amount'];

        
        $login = $general->applyForChangeOfProgram($amount, $regno, $oldlevel, $newlevel, $oldprogram, $newprogram,$semester, $changeType);

  
        if ($login) {
            
            echo "Successful Request";
          
            
        } else {
            echo "Failed Request, Cannot initiate change of program request more than once";
        }
    }
?>