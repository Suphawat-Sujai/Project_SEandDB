<?php
include('connecthotel.php');
session_start();
$_SESSION['reg']['username'] = $_POST['username'];
$_SESSION['reg']['pw'] = $_POST['pw'];
$_SESSION['reg']['pin'] = $_POST['pin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM Account WHERE Username = '{$_SESSION['reg']['username']}'";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_assoc($query);
    if(!empty($result)){
        echo "username นี้มีผู้ใช้แล้ว";
        $_SESSION['reg']['error'] = "username นี้มีผู้ใช้แล้ว";
        print_r($result);
        header('location:account1.php');
    }
    else{
        print_r($_SESSION['reg']);
        $neid = $_SESSION['reg']['neID'];
        $nename = $_SESSION['reg']['nename'];
        $netel = $_SESSION['reg']['netel'];
        $neemail = $_SESSION['reg']['neemail'];
        $neaddress = $_SESSION['reg']['neAddress'];
        $nelevel = $_SESSION['reg']['nelevel'];
        $nebod = $_SESSION['reg']['nebod'];

        $reID = $_SESSION['reg']['reID'];
        $rename = $_SESSION['reg']['rename'];
        $retel = $_SESSION['reg']['retel'];
        $reemail = $_SESSION['reg']['reemail'];
        $readdress = $_SESSION['reg']['reAddress'];

        $us = $_SESSION['reg']['username'];
        $pw = md5($_SESSION['reg']['pw']);
        $pin = $_SESSION['reg']['pin'];
        echo "<br>";
        $sql = "INSERT INTO Employee Values('$neid','$nename','$netel','$neemail','$neaddress','$nelevel','$nebod');";
        if($conn->query($sql)===false){
            $_SESSION['reg']['error'] = 'ERROR : Can\'t register new employee';
            header('location:register1.php');
        }else{
            $p1 = 1;
        }

        $sql = "INSERT INTO Reference Values('$reID','$rename','$retel','$reemail','$readdress','$neid');";
        if($conn->query($sql)===false){
            $_SESSION['reg']['error'] = 'ERROR : Can\'t register new employee';
            header('location:register1.php');
        }else{
            $p2 = 1;
        }

        $sql = "INSERT INTO Account Values('$neid','$us','$pw','$pin');";
        if($conn->query($sql)===false){
            $_SESSION['reg']['error'] = 'ERROR : Can\'t register new employee';
            header('location:register1.php');
        }else{
            $p3 = 1;
        }

        if ($p1==1 && $p2==1&&$p3==1){
            header('location:account3.php');
        }else{
            $_SESSION['reg']['error'] = 'ERROR : Can\'t register new employee';
            header('location:register1.php');
        }
        $_SESSION['reg']['success'] = 'success';
    }
    ?>
</body>
</html>
