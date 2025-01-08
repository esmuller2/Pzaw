// konwertowanie na duże litery

function konwersja(text) {

    return text.toUpperCase();

  }
  
// Program  

const fs = require('fs');
const sciezka = 'plik.txt';

fs.readFile(sciezka, 'utf-8', (err, data) => {

    if(err) {
        console.error('Wystąpił błąd w wczytywaniu pliku!');
        return;
    }
    
    const skonwertowanyTekst = konwersja(data);

    console.log(skonwertowanyTekst);

});