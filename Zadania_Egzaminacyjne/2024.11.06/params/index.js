const express = require('express');
const app = express();
const port = 3838;

app.get('/losowa/min/:min/max/:max', (req,res) =>{
    const min = Number(req.params.min);
    const max = Number(req.params.max);

    if(isNaN(min) ||  isNaN(max)){
            res.send('Nie wpisano liczb');
    }else{
        const losowa =  Math.floor(Math.random() * (max - min + 1)) + min;
        res.send(`<h2>Wylosowaną liczbą z przedziału  ${min} - ${max} jest ${losowa}</h2>`);
        console.log(`Zmienna min =  ${min}, Zmienna max = ${max}, a wylosowaną  liczbą jest ${losowa}`);
    }

})

app.listen(port, ()=>{
    console.log(`http://localhost:${port}`)
}
)

// http://localhost:3838/losowa/min/-34/max/120