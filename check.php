<?php
    $dir=$_GET['direct'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "db1";   
    $conn = new mysqli($servername,$username,$password,$dbname);

    $query2="select Car_Count from cars where Car_Type= '$dir' ";
    $result = $conn->query($query2);
    $row = $result->fetch_assoc();
    $avail=(int)$row['Car_Count'];
    // echo $avail;

    if($dir==='prime'){
        header("Location: prime.html?count=" . $avail);
        exit;
    }
    if($dir==='mini'){
        header("Location: mini.html?count=" . $avail);
        exit;
    }
    if($dir==='micro'){
        header("Location: micro.html?count=" . $avail);
        exit;
    }
    if($dir==='sedan'){
        header("Location: sedan.html?count=" . $avail);
        exit;
    }

 ?>
