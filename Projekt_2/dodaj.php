<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for="nazwa">Nazwa:</label>
    <input type="text" id="nazwa" name="nazwa" required>
    <br>
    <label for="wartosc">Wartość:</label>
    <input type="text" id="wartosc" name="wartosc" required>
    <br>
    <input type="submit" value="Zatwierdź">
</form>
<?php
    require 'polaczenie.php';
    ?>
</body>
</html>
