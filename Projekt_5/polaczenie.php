
<?php
    $host="localhost";
    $name="root";
    $pass="";
    $db="lowisko";

    $con = mysqli_connect($host, $name, $pass, $db);
    $query = mysqli_query($con,"SELECT  * FROM lowisko");
