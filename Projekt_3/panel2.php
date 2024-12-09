<?php
include('config.php');

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'add') {
        $stmt = $conn->prepare("INSERT INTO Pracownicy (stanowiska_id, imie, nazwisko, adres, miasto, czyRODO, czyBadania, dataUr) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('issssiii', $_POST['stanowiska_id'], $_POST['imie'], $_POST['nazwisko'], $_POST['adres'], $_POST['miasto'], $_POST['czyRODO'], $_POST['czyBadania'], $_POST['dataUr']);
        $stmt->execute();
    }

    if ($_POST['action'] == 'update') {
        $stmt = $conn->prepare("UPDATE Pracownicy SET stanowiska_id = ?, imie = ?, nazwisko = ?, adres = ?, miasto = ?, czyRODO = ?, czyBadania = ?, dataUr = ? WHERE id = ?");
        $stmt->bind_param('issssiiii', $_POST['stanowiska_id'], $_POST['imie'], $_POST['nazwisko'], $_POST['adres'], $_POST['miasto'], $_POST['czyRODO'], $_POST['czyBadania'], $_POST['dataUr'], $_POST['id']);
        $stmt->execute();
    }

    if ($_POST['action'] == 'delete') {
        $stmt = $conn->prepare("DELETE FROM Pracownicy WHERE id = ?");
        $stmt->bind_param('i', $_POST['id']);
        $stmt->execute();
    }
}

$result = $conn->query("SELECT * FROM Pracownicy");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administratora - Pracownicy</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
        input[type="text"], input[type="date"], select { width: 100%; padding: 5px; }
    </style>
</head>
<body>

    <h1>Panel Administratora - Pracownicy</h1>

    <h2>Dodaj nowego pracownika</h2>
    <form action="admin_panel.php" method="POST">
        <input type="hidden" name="action" value="add">
        <label for="stanowiska_id">Stanowisko ID</label>
        <input type="text" name="stanowiska_id" required>
        <label for="imie">Imię</label>
        <input type="text" name="imie" required>
        <label for="nazwisko">Nazwisko</label>
        <input type="text" name="nazwisko" required>
        <label for="adres">Adres</label>
        <input type="text" name="adres" required>
        <label for="miasto">Miasto</label>
        <input type="text" name="miasto" required>
        <label for="czyRODO">Czy RODO?</label>
        <select name="czyRODO" required>
            <option value="1">Tak</option>
            <option value="0">Nie</option>
        </select>
        <label for="czyBadania">Czy Badania?</label>
        <select name="czyBadania" required>
            <option value="1">Tak</option>
            <option value="0">Nie</option>
        </select>
        <label for="dataUr">Data urodzenia</label>
        <input type="date" name="dataUr" required>
        <button type="submit">Dodaj</button>
    </form>

    <h2>Lista pracowników</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Stanowisko ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Adres</th>
                <th>Miasto</th>
                <th>Czy RODO?</th>
                <th>Czy Badania?</th>
                <th>Data Urodzenia</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['stanowiska_id']; ?></td>
                <td><?php echo $row['imie']; ?></td>
                <td><?php echo $row['nazwisko']; ?></td>
                <td><?php echo $row['adres']; ?></td>
                <td><?php echo $row['miasto']; ?></td>
                <td><?php echo $row['czyRODO'] ? 'Tak' : 'Nie'; ?></td>
                <td><?php echo $row['czyBadania'] ? 'Tak' : 'Nie'; ?></td>
                <td><?php echo $row['dataUr']; ?></td>
                <td>
                    <form action="admin_panel.php" method="POST" style="display:inline;">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <button type="submit">Usuń</button>
                    </form>
                    <button onclick="editEmployee(<?php echo $row['id']; ?>)">Edytuj</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <script>
        function editEmployee(id) {
            const row = document.querySelector(`tr[data-id="${id}"]`);
            const form = document.forms['editForm'];

            form.stanowiska_id.value = row.cells[1].innerText;
            form.imie.value = row.cells[2].innerText;
            form.nazwisko.value = row.cells[3].innerText;
            form.adres.value = row.cells[4].innerText;
            form.miasto.value = row.cells[5].innerText;
            form.czyRODO.value = row.cells[6].innerText === 'Tak' ? 1 : 0;
            form.czyBadania.value = row.cells[7].innerText === 'Tak' ? 1 : 0;
            form.dataUr.value = row.cells[8].innerText;
        }
    </script>

</body>
</html>
