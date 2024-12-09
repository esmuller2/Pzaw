const express = require('express');
const app = express();
const port = 3333;

app.get('/', (req, res) => {
    const imie = req.query;
    const nazwisko = req.query;
    const kwota = req.query;
    // const {imie, nazwisko, kwota} = res.query
    console.log(`Witaj ${imie} ${nazwisko}, stan twojego konta wynosi: ${kwota} zł`);
    res.send();
})

app.listen(port, ()=> {
    console.log(`Server is running on http://localhost:${port}`);
})