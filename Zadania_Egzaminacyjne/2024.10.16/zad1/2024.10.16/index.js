const express = require('express');

const app = express();
const port = 5555;
  const www = __dirname+'\\www';

// app.get("/", (req, res)=>{
//     res.send("Hello Express");
// })

app.listen(port, ()=>{
    console.log(`Adres serwera: http://localhost:${port}`)
})

app.use(express.static(www));