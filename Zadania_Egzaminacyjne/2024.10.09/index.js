const http = require("http");
const path = require("path");
const fs = require("fs");
const mysql = require("mysql");

let conn = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "prognoza",
});

conn.connect((error) => {
  if (error) throw error;
  console.log("Połączono");
});

const host = "127.0.0.1";
const port = 5000;

const response = (req, res) => {
  if (req.url === "/") {
    res.writeHead(200, { "Content-Type": "text/html; charset=utf-8" });

    conn.query("SELECT miasta.nazwa, pogoda.data_prognozy, pogoda.cisnienie FROM miasta INNER JOIN pogoda ON miasta.id=pogoda.miasta_id", (error, result) => {
        if (error) throw error;
        let table  = `<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                <table class='table table-striped table-bordered'><thead><th>Miasto</th><th>Data prognozy</th><th>Ciśnienie</th></thead><tbody>`;
        table += result.map((e) => {
            return `<tr><td>${e.nazwa}</td><td>${e.data_prognozy}</td><td>${e.cisnienie}</td></tr>`;
          }).join("");
        table += "</tbody></table>";
        res.end(table);
      }
    );
    console.log(`Otwarto stronę`);
  }
};

const server = http.createServer(response);
server.listen(port, host, () => {
  console.log(`Serwer WWW działa. Jego adres to ${host}:${port}`);
});