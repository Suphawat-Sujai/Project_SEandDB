<?php 
    $RID = $_POST['RID'];
    $R_date = $_POST['R_date'];
    $Amount = $_POST['Amount'];
    $Room_no = $_POST['Room_no'];
    $IDPP = $_POST['IDPP'];


    $conn = new mysqli('localhost','root','','renovate');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("INSERT INTO receipt(Room_no,RID,R_date,Amount,IDPP)
        VALUES ('$Room_no','$RID','$R_date','$Amount','$IDPP')");
        $stmt->execute();
        $stmt->close();
        $conn->close();
        include 'complete.html';
        exit();
    }
?>