<?php
include('connecthotel.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>CHECK IN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <style>
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        .row.content {
            height: 863px
        }

        .sidenav {
            padding-top: 10px;
            background-color: #4c95da;
            height: 100%;
        }

        footer {
            background-color: rgb(85, 85, 85);
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

        #main {
            transition: margin-left .5s;
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
    <!-- Hambergure -->
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
                <!-- <ul class="nav navbar-nav">
                        <li><a href="#">History</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        
                    </ul> -->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#">Manage Employee</a>
        <br>
        <a href="#">Check-in</a>
        <br>
        <a href="#">Booking/Reserve</a>
        <br>
        <a href="#">Room manage</a>
    </div>

    <!-- Content -->
    <div class="container-fluid text-center">
        <?php
        $sql = "SELECT * FROM Employee";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_row($query)) {
            echo print_r($row) . "<br>";
        }
        ?>
        <div class="row content">
            <!-- <div class="col-sm-2 sidenav">
                    <br>
                    <br>
                    <a href="UI_Checkout.html"><button type="button" class="btn btn-success btn-lg">&nbsp;&nbsp;&nbsp;&nbsp;Check out&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
                    <br>
                    <br>
                    <br>
                    <button type="button" class="btn btn-success btn-lg">&nbsp&nbsp&nbspUpdate room&nbsp&nbsp&nbsp</button>
                    <br>
                    <br>
                    <br>
                    <button type="button" class="btn btn-success btn-lg">&nbspRoom canceling&nbsp</button>
                    <br>
                    <br>
                    <br>
                    <button type="button" class="btn btn-success btn-lg">&nbsp&nbspRoom booking&nbsp&nbsp</button>
                    <br>
                    <br>
                    <br>
                    <button type="button" class="btn btn-success btn-lg">&nbsp&nbspPayment room&nbsp&nbsp</button>
                    
                    

                </div> -->



            <div class="container mt-3">
                <br>
                <h2>ตารางตรวจสอบห้องพัก</h2>
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Room</th>
                            <th>State</th>
                            <th>Price</th>
                            <th>Facilities</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr r>
                            <td>101</td>
                            <td>available</td>
                            <td>200</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>102</td>
                            <td>unavailable</td>
                            <td>300</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>103</td>
                            <td>unavailable</td>
                            <td>500</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>104</td>
                            <td>available</td>
                            <td>600</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>105</td>
                            <td>available</td>
                            <td>1000</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>
    </div>


    <footer class="container-fluid text-center">
        <p>Hotel_inside_management</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
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

</body>

</html>