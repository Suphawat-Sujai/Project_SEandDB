<?php

require('connect_checkin.php');
$name = $_POST["Name"];
$tel = $_POST["Tel"];
$email = $_POST["Email"];
$id = $_POST["CID"];
$id = $_POST["ID"];
$passport = $_POST["Passport"];
$room_number = $_POST["Room_No"];
$type = $_POST["Type"];

$sql = "INSERT INTO customer(CID,ID,Passport,Type,Name,Tel,Email) VALUES('$CID',,'$id','$passport','$type','$Name','$tel','$email')";
$result = mysqli_query($connect,$sql);
if($result){
    echo "<br/>";
}else{
    echo mysqli_errors($connect);
}

$sql2 = "INSERT INTO stay_in(CID,Room_no,CheckIn_date,CheckOut_date,state) VALUES('$CID','$room_number','$checkindate''$checkoutdate''$state')";
$result2 = mysqli_query($connect,$sql2);
if($result2){
    echo "<br/>";
}else{
    echo mysqli_errors($connect);
}

// $sql3 = "UPDATE stay_in SET state ='I' WHERE Room_no='$room_number'";
// $result3 = mysqli_query($connect,$sql3);
// if($result3){
//     echo "<br/>";
// }else{
//     echo mysqli_errors($connect);
// }

?>