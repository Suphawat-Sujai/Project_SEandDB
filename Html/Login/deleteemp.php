<?php
include('connecthotel.php');
session_start();

$sql = "SELECT Level FROM Employee WHERE IDPP = '$_SESSION[idpp]' ";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($query);

$index = $_SESSION['index'] = $_POST['index'];
$person = $_SESSION['people'][$index];

if(empty($result) || $result['Level']<= $person[5]){
    $_SESSION['res'] = 'can\'t delete employee : ต้องมีระดับสูงกว่าจึงจะสามารถลบชื่อพนักงานได้';
    print_r($result);
    header('location:memp.php');
}else{
    $sql = "DELETE FROM Employee WHERE IDPP = '$person[0]'";
    print_r($person);
    $_SESSION['res'] = "$person[1] ถูกลบแล้ว";
    if($conn->query($sql)===true){
        header("location:memp.php");
    }else{
        echo "ERROR!";
    }   
}
?>