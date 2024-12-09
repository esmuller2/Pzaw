import http from 'http'
const PORT = 5000;

const server = http.createServer((req, res) => {
    // res.write("Hello world");
    res.setHeader('Content-type', 'text/html')
    res.end("<h1>Hello world</h1>");
    
})

server.listen(PORT, () =>{
    console.log(`Server runnng at port ${PORT}`);
})