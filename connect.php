<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "root";
    $dbname = "users_db";
    
    $conn = new mysqli($servername, $username, $password); 

    $sql="CREATE DATABASE $dbname";
      if ($conn->query($sql) === TRUE) {
          echo "Database was created!";
      }
    $conn->select_db($dbname);
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
?>