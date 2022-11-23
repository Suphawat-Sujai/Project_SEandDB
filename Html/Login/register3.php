<?php
include('connecthotel.php');
session_start();
echo "<p>check ID of new employee</p>";

$idpp = $_SESSION['neID'];
$sql = "SELECT * FROM Employee WHERE IDPP='$idpp'";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($query);
if (empty($result)){
    echo "<p style='color:green'>IDPP not found in database, Can register new employee</p>";
    header("location:summaryinfo.php");
}else{
    $_SESSION['hlv_error']= "IDPP was found in database, Can't Register";
    header("location:register1.php");
}
?>