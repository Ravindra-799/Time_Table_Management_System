<?php
    $host = 'timetable.cd2ekhi0lppt.ap-south-1.rds.amazonaws.com';
    $user = 'admin';
    $pass = 'ttms12345';
    $dbname ='timetable';
    if($mycon = @mysqli_connect($host,$user,$pass))
    {
        if(!mysqli_select_db($mycon,$dbname))
        {
            echo 'Could not connect to the DataBase';
        }
    }
    else{
        echo 'Could not connect to the server';
    }
?>