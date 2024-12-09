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
    <form method="POST">
        <?php 
            require 'connection.php';

            if (isset($_GET['update_input']) && !empty($_GET['update_input'])) {
                $id = intval($_GET['update_input']);
                $sql = "SELECT pracownicy.id, `imie`, `nazwisko`, `adres`, `miasto`, `czyRODO`, `czyBadania`, `dataUr`, stanowiska.nazwa, stanowiska.opis 
                        FROM `pracownicy` 
                        INNER JOIN stanowiska ON pracownicy.stanowiska_id = stanowiska.id 
                        WHERE pracownicy.id = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                if ($row) {
                    echo '<input type="number" name="id" value="' . $row['id'] . '" readonly>';
                    echo '<input type="text" name="imie" value="' . htmlspecialchars($row['imie']) . '">';
                    echo '<input type="text" name="nazwisko" value="' . htmlspecialchars($row['nazwisko']) . '">';
                    echo '<input type="text" name="adres" value="' . htmlspecialchars($row['adres']) . '">';
                    echo '<input type="text" name="miasto" value="' . htmlspecialchars($row['miasto']) . '">';
                    echo '<input type="number" name="czyRODO" min="0" max="1" value="' . $row['czyRODO'] . '">';
                    echo '<input type="number" name="czyBadania" min="0" max="1" value="' . $row['czyBadania'] . '">';
                    echo '<input type="date" name="dataUr" value="' . $row['dataUr'] . '">';
                    
                }
                $stmt->close();
            }
        ?>
        <input type="submit" value="Zapisz">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = intval($_POST['id']);
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $adres = $_POST['adres'];
        $miasto = $_POST['miasto'];
        $czyRODO = intval($_POST['czyRODO']);
        $czyBadania = intval($_POST['czyBadania']);
        $dataUr = $_POST['dataUr'];

        $updateSql = "UPDATE pracownicy SET imie=?, nazwisko=?, adres=?, miasto=?, czyRODO=?, czyBadania=?, dataUr=? WHERE id=?";
        $updateStmt = $con->prepare($updateSql);
        $updateStmt->bind_param("ssssiisi", $imie, $nazwisko, $adres, $miasto, $czyRODO, $czyBadania, $dataUr, $id);
        
        if ($updateStmt->execute()) {
            echo "Dane zostały zaktualizowane.";
        } else {
            echo "Błąd podczas aktualizacji: " . $con->error;
        }

        $updateStmt->close();
    }
    ?>
</body>
</html>
