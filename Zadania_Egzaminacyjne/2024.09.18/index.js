// const system = require('os');
// console.log(`Node został zainstalowany i dziala pod kontrolą ${system.version()} (wywodzącego się z rodiny systemów ${system.type()}). System został uruchominoy ${system.uptime()} sekund temu, a ilość pamięci RAM ${(system.totalmem()/1073741824).toFixed(2)} GB`);

// const http = require('http');
// const port = 5000;
// const serverWWW = http.createServer((request, response)=>{
//     // response.write('Hello world');
//     response.setHeader('Content-Type','text-html')
//     response.end('<h1>Komunikat w end</h1>');
// });


// serverWWW.listen(port, ()=>{
//     console.log(`Server is running at port ${port}`);
    
// });


const http = require('http');
const path = require('path');
const fs = require('fs');

const host = '127.0.0.1';
const port = 5555;
function odpowiedz(req, res){

    const plik = path.join(__dirname, 'index.html');
    const css = path.join(__dirname, 'style.css');
    const script = path.join(__dirname, 'script.js');
    const favicon = path.join(__dirname, 'favicon.ico');

    if (req.url ==='/'){
        fs.readFile(plik, (err, dane) => {
        if (!err) {
            res.writeHead(200, { 'Content-Type': 'text/html; charset=utf-8'});
            res.end(`${dane}`);
            console.log(`Otwarto stronę ${req.url}`);}
        else {
        res.writeHead(404, {'Content-Type': 'text/html' });
        console.dir(err);
        es.end(`<h3>Strona o podanym adresie nie istnieje</h3>`);
        }
    })

}
    if (req.url === '/style.css'){
        fs.readFile(css, (err, dane) => {
            if(!err){
                res.writeHead(200, {'Content-Type': 'text/css; charset=utf-8'});
                res.end(`${dane}`);
                console.log(`Załadowano: ${req.url}`);
            }else{
                res.writeHead(404, {'Content-Type': 'text/html'});
                console.dir(`Nie wczytano pliku ${css}`);
                res.end();
            }
        });
    }

    if(req.url === '/script.js'){
        fs.readFile(script, (err, dane) =>{
            if (!err){
                res.writeHead(200, {'Content-Type': 'text/javasript; charset=utf-8'});
                res.end(`${dane}`);
                console.log(`Załadowano: ${req.url}`);
            }else{
                res.writeHead(404, {'Content-Type': 'text/html'});
                console.dir(`Nie wczytano pliku ${script}`);
                res.end();
            }
        });
    }


    if(req.url === '/favicon.ico'){
        fs.readFile(favicon, (err, dane) =>{
            if (!err){
                res.writeHead(404, {'Content-Type': 'text/html'});
                console.log(`Błąd - ne wczytano zasobu: ${favicon}`);
                res.end();
            }else{
                res.writeHead(200, {'Content-Type': 'image/x-icon'});
                console.log(`Załadowano: ${favicon}`);
                res.end(dane);
            }
        });
    }

}

const serwerWWW = http.createServer(odpowiedz);
serwerWWW.listen(port, host, () => console.log(`Serwer WWW działa. Jego adres to: ${host}:${port}`));

