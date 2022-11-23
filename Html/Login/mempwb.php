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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <title>MAIN</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/showemp.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <style>
            .navbar {
              margin-bottom: 0;
              border-radius: 0;
            }
      
            .row.content {
              height: 863px;
            }
      
            .sidenav {
              padding-top: 10px;
              background-color: #4c95da;
              height: 100%;
            }
      
            footer {
              background-color: rgb(113, 117, 113);
              color: white;
              padding: 8px;
            }
      
            @media screen and (max-width: 767px) {
              .sidenav {
                height: auto;
                padding: 30px;
              }
              .row.content {
                height: auto;
              }
            }
      
            .sidebar {
              height: 100%;
              width: 0;
              position: fixed;
              z-index: 1;
              top: 0;
              left: 0;
              background-color: #111;
              overflow-x: hidden;
              transition: 0.5s;
              padding-top: 60px;
            }
      
            .sidebar a {
              padding: 8px 8px 8px 32px;
              text-decoration: none;
              font-size: 20px;
              color: #ffffff;
              display: block;
              transition: 0.3s;
            }
      
            .sidebar a:hover {
              color: #f1f1f1;
            }
      
            .sidebar .closebtn {
              position: absolute;
              top: 0;
              right: 25px;
              font-size: 36px;
              margin-left: 50px;
            }
      
            .openbtn {
              font-size: 20px;
              cursor: pointer;
              background-color: #111;
              color: white;
              padding: 10px 15px;
              border: none;
            }
      
            .openbtn:hover {
              background-color: #444;
            }
      
            .sidenav a,
            .dropdown-btn {
              padding: 6px 8px 6px 16px;
              text-decoration: none;
              font-size: 20px;
              color: #ffffff;
              display: block;
              border: none;
              background: none;
              width: 100%;
              text-align: left;
              cursor: pointer;
              outline: none;
            }
      
            /* On mouse-over */
            .sidenav a:hover,
            .dropdown-btn:hover {
              color: #f1f1f1;
            }
      
            /* Main content */
            .main {
              margin-left: 200px; /* Same as the width of the sidenav */
              font-size: 20px; /* Increased text to enable scrolling */
              padding: 0px 10px;
            }
      
            /* Add an active class to the active dropdown button */
            .active {
              background-color: rgb(113, 117, 113);
              color: white;
            }
      
            /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
            .dropdown-container {
              display: none;
              background-color: #262626;
              padding-left: 8px;
            }
      
            /* Optional: Style the caret down icon */
            .fa-caret-down {
              float: right;
              padding-right: 8px;
            }
      
            #main {
              transition: margin-left 0.5s;
              padding: 16px;
            }
      
            /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
            @media screen and (max-height: 450px) {
              .sidebar {
                padding-top: 15px;
              }
              .sidebar a {
                font-size: 18px;
              }
            }
          </style>
    </head>
<body>
    <main>
    <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <button class="openbtn" onclick="openNav()">&nbsp;&nbsp;☰&nbsp;&nbsp; </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                     <ul class="nav navbar-nav">
                        <a class="navbar-brand" href="#">&nbsp;&nbsp;HOTEL</a>
                        <!-- <li><a href="#">History</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li> -->
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="Payment_status.php">Main</a></li>
                        <li><a href="insert_receipt.html">Insert</a></li>
                        <li><a href="Payment_Method.html">Payment Method</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="./Login/mempwb.php">Manage Employee</a>
            <br />
            <a href="./Check-in/UI_Checkin.html">Check-in</a>
            <br />
            <a href="./Check-out/UI_Checkout.html">Check-out</a>
            <br />
            <a href="./Booking/booking.php">Booking/Reserve</a>
            <br />
            <a href="#">Cancel room</a>
            <br />
            <button class="dropdown-btn"> &nbsp;&nbsp;&nbsp;Room manage<i class="fa fa-caret-down"></i></button>
            <div class="dropdown-container">
              <a href="./Update/UI_UP_Basic.html">Basic</a>
              <a href="/Html/Update/UI_UP_Standard.html">Standard</a>
              <a href="/Html/Update/UI_UP_superior.html">Superior</a>
              <a href="/Html/Update/UI_UP_Deluxe.html">Deluxe</a>
              <a href="/Html/Update/UI_UP_Suite.html">Suite</a>
            </div>
          </div>
        <section id="content">  
            <h1>Manage Employee</h1>          
            <table >
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
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"
  ></script>
  <script src="../js/checkIn.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <script>
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.marginLeft = "0";
    }
  </script>

  <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }
  </script>

</html>
</html>
<?php


$_SESSION['people'] = $data;
?>