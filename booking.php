<?php
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $car_type=$_POST['car_type'];
    $start=$_POST['date-booking'];
    $end=$_POST['date-return'];
    $count=$_POST['car_count'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "db1";
    $table ="booking";   
    $conn = new mysqli($servername,$username,$password,$dbname);

    $query2="select Car_Count from cars where Car_Type= '$car_type' ";
    $result = $conn->query($query2);
    $row = $result->fetch_assoc();
    $avail=(int)$row['Car_Count'];


    if( $avail > $count){

        $query2="update cars set Car_Count= Car_Count- $count where Car_Type= '$car_type' ";
        $conn->query($query2);

        $diff=strtotime($start)-strtotime($end);
        $diff=abs(round($diff / 86400));
    
        $query1="select Booking_Id from $table order by Booking_Id desc limit 1";
        $result = $conn->query($query1);
        $row = $result->fetch_assoc();
        $index=(int)$row['Booking_Id'] + 1;
    
        $query1="select Car_Id,Car_Cost from cars where Car_Type='$car_type'";
        $result=$conn->query($query1);
        $row=$result->fetch_assoc();
        $cost=(int)$row['Car_Cost'] *(int)$count * (int)$diff;
        $id=(int)$row['Car_Id'];
    
        $query="insert into $table (Booking_Id,User_Name,User_Phone,Car_Id,Car_Type,Car_Count,Start_Time,End_Time,Car_Cost) values ('$index','$name',$phone,$id,'$car_type',$count,'$start','$end',$cost)";
        if($conn->query($query)){
            echo 'success';
        }
    }
    else{
        echo "no";
    }

    
?>
