<?php
    require 'polaczenie.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rybyId = isset($_POST['rybyId']) ? $_POST['rybyId'] : '';
        $akwen = isset($_POST['akwen']) ? $_POST['akwen'] : '';
        $woj = isset($_POST['wojewodztwo']) ? $_POST['wojewodztwo'] : '';
        $rodzaj = isset($_POST['rodzaj']) ? $_POST['rodzaj'] : '';
        $id = isset($_POST['id']) ? $_POST['id'] : '';
    
    
        $sql = "UPDATE lowisko SET Ryby_id='$rybyId', akwen='$akwen', wojewodztwo='$woj', rodzaj='$rodzaj' WHERE id='$id'";
    
        if (mysqli_query($con, $sql)) {
            echo "Rekord został zmodyfikowany pomyślnie.";
        } else {
            echo "Błąd: " . mysqli_error($con);
        }
    
        mysqli_close($con);
        header("location: panel.php");
        exit(); 
    }


