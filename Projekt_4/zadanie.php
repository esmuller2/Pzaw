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
    <form action="addRow.php">
        <button class="btn btn-primary" id="add" style="margin: 1%;">Dodaj Pracownika</button>
    </form>
    
    <table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Imie</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Adres</th>
            <th scope="col">Miejscowość</th>
            <th scope="col">Czy rodo?</th>
            <th scope="col">Czy ma badania?</th>
            <th scope="col">Data urodzenia</th>
            <th scope="col">Stanowisko</th>
            <th scope="col" >Opis Stanowiska</th>
        </tr>
    </thead>
    <tbody>

    <?php
    require 'connection.php';

    $sql = "SELECT pracownicy.id,`imie`,`nazwisko`,`adres`,`miasto`,`czyRODO`,`czyBadania`,`dataUr`, stanowiska.nazwa, stanowiska.opis FROM `pracownicy` inner join stanowiska on pracownicy.stanowiska_id = stanowiska.id;";
    $result = mysqli_query($con,$sql) or die("Bład zapytania");

    while($row = mysqli_fetch_assoc($result)){
        echo"<tr>";
        foreach($row as $key => $value){  
            if($key == "id"){
                continue;
            }else{
                if($value == 1){
                    $value = "Tak";
                }elseif($value == 0){
                    $value = "Nie";
                }
                echo "<td class='text-muted'>".$value."</td>";
            }

            
        }
        echo "<td> <form action='updateRow.php'>
             <input type='number' name='update_input' style='display:none' value = ".$row['id']."><button class='btn btn-primary' type='submit'>Edytuj</button>
        </form></td>";
        echo "<td class='text-muted'> <form action='deleteRow.php'>
             <input type='number' name='delete_input' style='display:none' value = ".$row['id']."><button class='btn btn-danger' type='submit'>Usuń</button>
        </form></td>";
        
        echo"</tr>";
    }
    mysqli_close($con);
    ?>
    </tbody>
    </table>
    
</body>
</html>