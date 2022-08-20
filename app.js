var fs = require('fs');
var http = require('http');
var https = require('https');

var privateKey = fs.readFileSync('sslcert/server.key', 'utf8');
var certificate = fs.readFileSync('sslcert/server.crt', 'utf8');

var credentials = { key: privateKey, cert: certificate };
var express = require('express');
const { response } = require('express');
var app = express();

app.use("/resources", express.static(__dirname + "/resources"));

app.get("/index.appcache", (request, response) => {
    response.setHeader("Content-Type", "text/cache-manifest")
    response.sendFile(__dirname + "/index.appcache")
})

app.get("/", function (request, response) {
    response.sendFile(__dirname + "/index.html");
});


app.get('*', function(request, response){
    response.status(404);
    response.sendFile(__dirname + "/not-found.html");
});

var httpServer = http.createServer(app);
var httpsServer = https.createServer(credentials, app);

httpServer.listen(8080);
httpsServer.listen(8443);

console.log("http://localhost:8080/")
console.log("http://localhost:8443/")