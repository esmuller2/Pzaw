<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body{
                padding: 10px;
                background-color: black;
            }
            .mb-3{
                width: 47%;
            }
            #gora,#dol{
                display: flex;
                justify-content: space-evenly;
            }
            #submit{
                width: 100%;
                display: flex;
                justify-content: center;
            }
            .btn{
                font-size: 30px;
                width: fit-content;
                margin: 10px;
            }
            form{
                background-color: #212529;
                padding: 5%;
            }
            #id{
                display: none;
            }
            #submit{
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;
            }
            
        </style>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
        <form method="POST" action="modyfikowanie.php">
            <div id="gora">
                <div class="form-floating mb-3">
                    <?php
                        require 'polaczenie.php';
                        @$id = $_POST['id'];
                        $queryId = mysqli_query($con,"SELECT * FROM lowisko WHERE id='$id'");
                        while ($row=mysqli_fetch_assoc($queryId)){
                            
                            echo "<input type='number' class='form-control' id='rybyId' placeholder='Ryby ID' name='rybyId' value='".$row['Ryby_id']."' required>";
                    ?>
                  
                  <label for="rybyId">1.Ryby ID</label>
                </div>
                <div class="form-floating mb-3">
                    <?php
                            echo "<input type='text' class='form-control' id='akwen' placeholder='Akwen' name='akwen' value='".$row['akwen']."' required>";
                    ?>
                  <label for="akwen">2.Akwen</label>
                </div>
            </div>
            <div id="dol">
                <div class="form-floating mb-3">
                    <?php
                            echo "<input type='text' class='form-control' id='wojewodztwo' placeholder='Województwo' name='wojewodztwo' value='".$row['wojewodztwo']."' required>";
                    ?>
                    <label for="wojewodztwo">3.Województwo</label>
                </div>
                <div class="form-floating mb-3">
                    <?php
                            echo "<input type='number' class='form-control' id='rodzaj' placeholder='Rodzaj' name='rodzaj' value='".$row['rodzaj']."' required>";
                        
                    ?>
                  <label for="rodzaj">4.Rodzaj</label>
                </div>
            </div>
            <div id="submit">
                <?php
                            echo '<input type="number" name="id" id="id" value="'.$row["id"].'"><button type="submit" class="btn btn-primary">Modyfikuj</button>';
                        }
                ?>
                <a href="panel.php"><button type="button" class="btn btn-secondary">Powrót</button></a>
            </div>
        </form>
        
    </body>
</html>
