<?php
    $info = array(
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'dbname' => 'renovate'
    );
    $conn = mysqli_connect($info['host'], $info['user'], $info['password'], $info['dbname']) or die('Error connection database!');
    mysqli_set_charset($conn, 'utf8');

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      echo "Connected successfully";
?>