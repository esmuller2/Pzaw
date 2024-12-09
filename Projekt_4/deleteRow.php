<?php
    if(isset($_GET['delete_input'])){
        if(!empty($_GET['delete_input'])){
            require 'connection.php';
            $sql = "Delete from pracownicy where id='".$_GET['delete_input']."'";
            $result = mysqli_query($con,$sql) or die("Bład zapytania");
            header("location:zadanie.php");
        }else{
            header("location:zadanie.php");
        }
    }
?>