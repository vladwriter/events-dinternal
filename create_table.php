<?php

    $sql = "CREATE TABLE users(
            id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            f_name VARCHAR (30) NOT NULL,
            l_name VARCHAR (30) NOT NULL,
            email VARCHAR (50),
            phone VARCHAR (13),
            event_id VARCHAR (30),
            event_list VARCHAR (100),
            total INT (6),
            payment INT (1),
            date_time DATETIME)
            DEFAULT CHARSET=utf8";

      if($conn->query($sql)===TRUE){
           echo "<br>Table created successfully";
           };
?>