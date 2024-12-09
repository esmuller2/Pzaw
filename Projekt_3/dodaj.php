<h2>Dodaj Pracownika</h2>
    <form method="post">
        <input type="text" name="pozycja_id" placeholder="Pozycja (1-4)" required>
        <input type="text" name="imie" placeholder="Imię" required>
        <input type="text" name="nazwisko" placeholder="Nazwisko" required>
        <input type="text" name="adres" placeholder="Adres" required>
        <input type="text" name="miasto" placeholder="Miasto" required>
        <input type="text" name="RODO" placeholder="RODO (0-1)" required>
        <input type="text" name="badania" placeholder="Badania (0-1)" required>
        <input type="date" name="Data_Ur" placeholder="Data Urodzenia" required>
        <button type="submit" name="add">Dodaj</button>
    </form>

    <?php
    include 'polaczenie.php';

    // Dodawanie nowego pracownika
    if (isset($_POST['add'])) {
        $pozycja_id = $_POST['pozycja_id'];
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $adres = $_POST['adres'];
        $miasto = $_POST['miasto'];
        $RODO = $_POST['RODO'];
        $badania = $_POST['badania'];
        $Data_Ur = $_POST['Data_Ur'];
        $sql = "INSERT INTO Pracownicy (pozycja_id, imie, nazwisko, adres, miasto, czyRODO, czyBadania, dataUr) VALUES ('$pozycja_id','$imie', '$nazwisko', '$adres', '$miasto','$RODO', '$badania', '$Data_Ur')";
        $conn->query($sql);
    }
    ?>