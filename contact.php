<?php
    $name=$_POST['myname'];
    $email=$_POST['myemail'];
    $phone=$_POST['myphone'];
    $myquery=$_POST['myquery'];
    //$eligible=$_GET['eligible'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "db1";
    $table ="users";
     

    $conn = new mysqli($servername,$username,$password,$dbname);
    $query1="select User_Id from $table order by User_Id desc limit 1";
    $result = $conn->query($query1);
    $row = $result->fetch_assoc();
    $index=(int)$row['User_Id'] + 1;
    $query="insert into $table (User_Id,User_Name,User_Email,User_Phone,User_Query) values ('$index','$name','$email','$phone','$myquery')";

    if($conn->query($query)){
        echo "complaint noted!";
    }
?>
