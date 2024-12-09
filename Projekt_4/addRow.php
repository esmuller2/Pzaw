<?php 


if(isset($_POST['add'])){
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $adres = $_POST['adres'];
    $miasto = $_POST['miasto'];
    $czyRODO = $_POST['czyRODO'];
    $czyBadania = $_POST['czyBadania'];
    $dataUR = $_POST['dataUR'];
    $stanowisko = $_POST['stanowisko'];



    require 'connection.php';
    $sql = "INSERT INTO `pracownicy`(`imie`, `nazwisko`, `adres`, `miasto`, `czyRODO`, `czyBadania`, `dataUr`, `stanowiska_id`) VALUES ('$imie','$nazwisko','$adres','$miasto','$czyRODO','$czyBadania','$dataUR', '$stanowisko')";
    $result = mysqli_query($con,$sql) or die("Bład zapytania");
    header("Location: ./zadanie.php");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <form action="addRow.php" method="post">
        Imie
        <input type="text" value="" name="imie">
        Nazwisko
        <input type="text" value="" name="nazwisko">
        Adres
        <input type="text" value="" name="adres">
        Miasto
        <input type="text" value="" name="miasto">
        Czy RODO?
        <input type="number" value="" name="czyRODO">
        Czy badania?
        <input type="number" value="" name="czyBadania">
        Data urodzenia
        <input type="date" value="" name="dataUR">
        Stanowisko
        <input type="number" value="" name="stanowisko" min="1" max="4">
        <input type="submit" value="Dodaj" name="add">

    </form>
<?php





?>
</body>
</html>