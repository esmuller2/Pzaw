import http from 'http'
import fs from 'fs'
const PORT = 5000;
let tekst1 = "";

const server = http.createServer((req, res)=>{
    res.setHeader("Content-Type", 'text/html');
    fs.writeFile("plik.txt", "czerwony\nzielony\nfioletowy\nniebieski\nczarny", (err)=>{
                    if(err) console.log(err);
                    else console.log("Zapis ukończył się powodzeniem");
    })
    fs.readFile("plik.txt", "utf-8", (err, zawartosc)=>{
        if(err) return "Błąd otwarcia pliku";
        else{
            tekst1 = zawartosc;
        }
    })
    let duzeLitery = tekst1.toUpperCase();
    fs.writeFile("plik2.txt", duzeLitery, (err)=>{
        if(err) console.log(err);
        else console.log("Zapis ukończył się powodzeniem");
    })
    fs.readFile("plik2.txt", "utf-8", (err, zawartosc)=>{
        duzeLitery = zawartosc;
    })
    res.end(`${tekst1}\n${duzeLitery}`)
})
server.listen(PORT, ()=>{
    console.log(`Server running at port: ${PORT}`);
})