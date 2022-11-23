<?php
include('connecthotel.php');
    session_start();
    // if(empty($_SESSION['username'])){
    //     header('location:login.php');
    //     session_destroy();
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/mainpage.css">

</head>
<body>
    <section id="header">
        <h1>Welcome <span style="color:green;text-decoration: underline;">
        <?php 
        // echo $_SESSION['username'];
        ?>
    </span></h1>
        <a href="logout.php">
            <button>Log out</button>
        </a>
    </section>
    <main>
        <section id="nav">
            <button>other feature</button>
            <a href="memp.php">
                <button>See employee</button>
            </a>
        </section>
        <section id="content">
            <table style="width:100%">
                <tr style="background:lightsteelblue">
                    <th rowspan="2">Room</th>
                    <th rowspan="2">Status</th>
                    <th rowspan="2">Price</th>
                    <th colspan="5">Facilities</th>
                </tr>
                <tr style="background:lightsteelblue">
                    <td style="text-align:center;font-weight:bold">Bed_type</td>
                    <td style="text-align:center;font-weight:bold">Bathroom</td>
                    <td style="text-align:center;font-weight:bold">Fridge</td>
                    <td style="text-align:center;font-weight:bold">TV</td>
                    <td style="text-align:center;font-weight:bold">Ventilation</td>
                </tr>
                <?php
                    $sql = "SELECT Room_no,Avaliable_state,Price,Bed_type,Bathroom,Fridge,TV,Ventilation FROM Room NATURAL JOIN room_description ";
                    $query = mysqli_query($conn,$sql);
                    while ($row=mysqli_fetch_row($query)){
                        $rno = $row[0];
                        $st = $row[1];
                        $Price = $row[2];
                        if($st=="Y"){
                            $bg = "style='background:limegreen'";
                        }elseif ($st=="N"){
                            $bg = "style='background:tomato'";
                        }elseif ($st=="R"){
                            $bg = "style='background:yellow'";
                        }
                        
                        $td = "
                        <td style='text-align:center'>$rno</td>
                        <td style='text-align:center'>$st</td>
                        <td>$Price</td>
                        <td style='text-align:center'>$row[3]</td>
                        <td style='text-align:center'>$row[4]</td>
                        <td style='text-align:center'>$row[5]</td>
                        <td style='text-align:center'>$row[6]</td>
                        <td style='text-align:center'>$row[7]</td>
                        ";

                        echo "<tr $bg>$td</tr>";
                    }
                ?>
            </table>
        </section>
    </main>
</body>
</html>