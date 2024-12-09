<?php
    $host = 'localhost';
    $name = 'root';
    $pass = '';
    $db = 'egz';

    $conn = mysqli_connect($host, $name, $pass, $db);

    $query = mysqli_query($conn , "SELECT * FROM pracownicy");

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administracyjny</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>


    </style>

</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Adres</th>
                <th scope="col">Miasto</th>
                <th scope="col">RODO</th>
                <th scope="col">Badania</th>
                <th scope="col">Data Urodzenia</th>
            </tr>
        </thead>

        <tbody>

            <?php while($row = $query->fetch_assoc()): ?>
            <tr>
                <th scope="row"><?php echo $row['id']; ?></th>
                <td><?php echo $row['imie']; ?></td>
                <td><?php echo $row['nazwisko']; ?></td>
                <td><?php echo $row['adres']; ?></td>
                <td><?php echo $row['miasto']; ?></td>
                <td><?php echo $row['czyRODO']; ?></td>
                <td><?php echo $row['czyBadania']; ?></td>
                <td><?php echo $row['dataUr']; ?></td>
            </tr>
            <?php endwhile; ?>

        </tbody>
    </table>

    <form action="dodaj.php" method="post" id="dodaj"><button type="submit" class="btn btn-secondary btn-sm">Dodaj</button></form>
    
    
</body>
</html>