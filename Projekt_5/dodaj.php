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
        <form method="POST" action="dodawanie.php">
            <div id="gora">
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" id="rybyId" placeholder="Ryby ID" name="rybyId" required>
                  <label for="rybyId">1.Ryby ID</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="akwen" placeholder="Akwen" name="akwen" required>
                  <label for="akwen">2.Akwen</label>
                </div>
            </div>
            <div id="dol">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="wojewodztwo" placeholder="Województwo" name="wojewodztwo" required>
                    <label for="wojewodztwo">3.Województwo</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="number" class="form-control" id="rodzaj" placeholder="Rodzaj" name="rodzaj" required>
                  <label for="rodzaj">4.Rodzaj</label>
                </div>
            </div>
            <div id="submit">
                <button type="submit" class="btn btn-success">Dodaj</button>
                <a href="panel.php"><button type="button" class="btn btn-secondary">Powrót</button></a>
            </div>
        </form>
        
    </body>
</html>
