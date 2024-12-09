const fs = require('fs');

// const plik = 'text.txt';


// fs.access(plik,
//     fs.constants.F_OK | fs.constants.W_OK, (err) =>{
//         if(err){
//             console.log(`${plik}
//                  ${err.errno===-4058 ? "nie istnieje" : "tyko do odczytu"}`)
//         }else{
//             console.log(`plik ${plik} istnieje i pozwala na zapis`)
//         }
//     });



// const katalog = './';
// let licznik = 0;

// fs.readdir(katalog, (err, dane) => {
//     if(err) console.log(err);
//     else{
//         console.log('\nZawartość katalogu: ');
//         dane.forEach(plik =>{
//             console.log(plik);
//             licznik++;
//         })
//         console.log(`Liczba wszystkich elementów katalogu: ${licznik}`)
//     }
// });


// fs.readFile('text.txt', 'utf-8', (err, zawartosc) =>{
//     if(err) return console.log('Błąd otwarcia pliku');
//     // console.log(zawartosc);
//     else{
//         fs.writeFile('nowy_plik.txt', zawartosc, (err) =>{
//             if(err) console.log(err);
//             else console.log("Zapis zakonczył się powodzeniem");
//         })
//     }
// })


let nowa_zawartosc = "\nNIEDZIELA";

fs.appendFile('nowy_plik.txt', nowa_zawartosc, (err) =>{
            if(err) console.log(err);
            else console.log("Zapis zakonczył się powodzeniem");
});
    
