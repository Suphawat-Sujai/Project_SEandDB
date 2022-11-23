<?php
include('connecthotel.php');
session_start();

$_SESSION['reg']['nename'] = $_POST['nename'];
$_SESSION['reg']['netel'] = $_POST['netel'];
$_SESSION['reg']['neemail'] = $_POST['neemail'];
$_SESSION['reg']['nebod'] = $_POST['nebod'];
$_SESSION['reg']['neID'] = $_POST['neID'];
$_SESSION['reg']['neAddress'] = $_POST['neAddress'];
$_SESSION['reg']['nelevel'] = $_POST['nelevel'];
$_SESSION['reg']['rename'] = $_POST['rename'];
$_SESSION['reg']['retel'] = $_POST['retel'];
$_SESSION['reg']['reemail'] = $_POST['reemail'];
$_SESSION['reg']['reID'] = $_POST['reID'];
$_SESSION['reg']['reAddress'] = $_POST['reAddress'];

$sql="SELECT Level FROM Employee WHERE IDPP = $_SESSION[idpp]";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_row($query);
$reg = $result[0];

if ($reg > $_SESSION['reg']['nelevel']){
    header('location:register3.php');
    $_SESSION['reg']['error'] =  "";
}
else{
    $_SESSION['reg']['error'] =  "สามารถลงทะเบียนให้ได้เฉพาะพนักงานระดับต่ำกว่า";
    header('location:register1.php');
}
?>