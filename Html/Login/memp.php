<?php
session_start();
$data = array();
include('connecthotel.php');
$sql = "SELECT * FROM `Employee` ORDER BY `Level` DESC";
$query = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-control" content="no-cache">
    <title>Manage Employee</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link href="./css/showemp.css" rel="stylesheet">
    <link href="./css/template.css" rel="stylesheet">
</head>
<body>
    <header>
        <div id="htext">
            <h1>Manage Employee</h1>
        </div>
        <div id="status">
            <p>
                <span><?php echo $_SESSION['username']; ?></span>
                <a href="logout.php">
                    <button>Log out</button>
                </a>
            </p>
        </div>

    </header>
    <main>
        <section id="nav">

        </section>
        <section id="content">            
            <table>
                <tr>
                    <th>ชื่อ</th>
                    <th>ID/passport</th>
                    <th>เบอร์โทรติดต่อ</th>
                    <th>Email</th>
                    <th>ที่อยู่</th>
                    <th>Level</th>
                    <th>Bod</th>
                    <th>จัดการ</th>
                </tr>
                <?php
                    $j = 0;
                    while($record=mysqli_fetch_row($query)){
                        $people = array();
        
                        $idpp = $record['0'];
                        $name = $record['1'];
                        $tel = $record['2'];
                        $email = $record['3'];
                        $address = $record['4'];
                        $elv = $record['5'];
                        $bod = $record['6'];
        
                        for($i=0;$i<6;$i++){
                            $people[$i] = $record[$i];
                        }
                        $data[$j] = $people;
                        $tr = "
                        <td>$name</td>
                        <td>$idpp</td>
                        <td>$tel</td>
                        <td>$email</td>
                        <td>$address</td>
                        <td style='text-align:center'>$elv</td>
                        <td>$bod</td>
        
                        <td style='text-align:center'>
                            <form action='deleteemp.php' method='post'>
                                <input name='index' value='$j' style='display:none;'>
                                <button type='submit' style='cursor: pointer;'>ลบ</button>
                            </form>
                        </td>";
                        echo "<tr>$tr</tr>";
                        $j++;
                    }
                ?>
                <tr>
                    <td colspan="9">
                        <a href="pre_reg.php"> + ลงทะเบียนพนักงานเพิ่ม</a>
                    </td>
                </tr>
            </table>
            <p id="res" style="margin:5px;color:red;">
                <?php 
                if(!empty($_SESSION['res'])){
                    echo $_SESSION['res'];
                    $_SESSION['res'] = null;
                }
                ?>
            </p>
        </section>
    </main>
</body>
</html>
<?php


$_SESSION['people'] = $data;
?>