<?php
require 'polaczenie.php'; // Połączenie z bazą danych

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Zbieranie ID do usunięcia
    @$id = $_POST['id'];

    // Zapytanie do usunięcia rekordu
    $sql = "DELETE FROM lowisko WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "Rekord został usunięty pomyślnie.";
    } else {
        echo "Błąd: " . mysqli_error($conm);
    }

    mysqli_close($con); // Zamknięcie połączenia z bazą danych
    header("location: panel.php");
}
?>