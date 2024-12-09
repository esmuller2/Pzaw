const express = require('express');
const app = express();
const port = 5555;

app.get('/', (req,res) =>{
    res.send('Poprawnie wylogowano. Jesteś na stronie głównej');
})

app.get('/login/:uzytkownik', (req, res)=>{
    const uzytkownik = req.params.uzytkownik;
    res.cookie('uzytkownik_cookie', uzytkownik);
    res.send('Informacja o nazwie użytkownika została zapisana w pliku cookies');
})

app.get('/logout', (req, res)=>{
    res.clearCookie('uzytkownik_cookie');
    res.redirect('/');
})

app.listen(port, () =>{
    console.log(`Adres serwera:  http://localhost:${port}`);

})