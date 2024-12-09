const express = require('express');
const app = express();
const port = 5555;

const now = new Date();

const data = `${now.getDate()}.${now.getMonth()+1}.${now.getFullYear()}`
const czas = `${now.getHours()}:${now.getMinutes()}:${now.getSeconds()}`

const middlware = (req, res, next) => {
    console.log(`Nastąpiło żądanie: ${req.originalUrl}, czas żądania: ${czas} ${data}`)
    next()
}  

app.use(middlware);

app.get('/', (req, res)=>{
    res.send('<h1>Jesteś na stronie głównej</h1>');
})

app.listen(port, ()=>{
    console.log(`Serwer działa na porcie ${port}`)
})