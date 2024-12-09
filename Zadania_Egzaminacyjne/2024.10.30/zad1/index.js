const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');
 
const app = express();
const port = 3000;
 
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'dane'
})

db.connect((err) => {
  if(err){
    console.log('Błąd połączenia z bazą danych:', err);
    return;
  }
  console.log('Połączono z bazą danych')
})

app.use(bodyParser.urlencoded({extended: true}));

app.get('/', (req, res) => {
  res.send(`
    <h1>Formularz</h1>
    <form action="/submit" method="post">
      <label>Imię: <input type="text" name="imie" required></label><br/>
      <label>Nazwisko: <input type="text" name="nazwisko" required></label></br>
      <label>E-mail: <input type="text" name="email" required></label></br>
      <input type="submit" value="Wyślij">
    </form>
    `)
})

app.post('/submit',  (req, res) => {
  const {imie, nazwisko, email } = req.body;
  const query = `INSERT INTO uzytkownicy (imie, nazwisko, email)  VALUES ("${imie}","${nazwisko}","${email}")`;
  db.query(query, [imie, nazwisko, email], (err, result) => {
    if(err){
      console.log('Błąd przy dodawaniu użytkownika:', err);
      return res.send('Błąd przy dodawaniu użytkownika');
    }
    res.send("Dane zapisane do bazy")
  })
});

app.listen(port, () => {
  console.log(`Aplikacja działa na porcie ${port}`);
});
