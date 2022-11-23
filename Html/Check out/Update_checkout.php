<?php

require('connect_checkout.php');

$room_number = $_POST["Room_No"];

$sql1 = "UPDATE stay_in SET State ='O'  WHERE Room_no='$room_number'";
$result1 = mysqli_query($connect,$sql1);
if($result1){
    echo "<br/>";
    echo "<br/>";
}else{
    echo mysqli_errors($connect);
}

?>