<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-color: black;
        }
        #dodaj{
            width: 100%;
            display: flex;
            justify-content: center;
        }
        .btn-success{
            font-size: 2em;
        }
        #id{
            display: none;
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <table class="table table-hover table-sm table-responsive table-dark">
    <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Ryby id</th>
            <th scope="col">Akwen</th>
            <th scope="col">Wojewodztwo</th>
            <th scope="col">Rodzaj</th> 
            <th scope="col">Modyfikowanie wierszy</th>
            <th scope="col">Usuwanie wierszy</th>
          </tr>
        </thead>
        <tbody>
        <?php
        
            require 'polaczenie.php';
            while ($row=mysqli_fetch_assoc($query)){
                echo "<tr>";
                foreach ($row as $key) {
                    echo"<td>".$key."</td>";
                }
                echo '<td><form action="modyfikuj.php" method="post"><input type="number" name="id" id="id" value="'.$row["id"].'"><button type="submit" class="btn btn-primary">Modyfikuj</button></form></td>';
                echo '<td><form action="usun.php" method="post"><input type="number" name="id" id="id" value="'.$row["id"].'"><button type="submit" class="btn btn-danger">Usun</button></form></td>';
                echo "</tr>";
            }
            
        ?>
        
        </tbody>
      </table>
    <form action="dodaj.php" method="post" id="dodaj"><button type="submit" class="btn btn-success">Dodaj</button></form>
</body>
</html>