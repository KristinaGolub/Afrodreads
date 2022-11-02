var fs = require('fs');
var http = require('http');
var https = require('https');
var axios = require('axios');
var date = require('date-and-time');
var express = require('express');
const { response } = require('express');

const validatePhone = (value) => /^\+7\s\(\d{3}\)\s\d{3}\s\d{4}$/.test(value);

const CreateMessage = (name, phone) =>{

    const now = new Date();
    var time = date.format(now,'YYYY-MM-DD HH:mm');

    let text = `🛎 Новая заявка\nДата: ${time}\nИмя: ${name}\nТелефон: ${phone}`;
    return encodeURI(text);
}


var privateKey = fs.readFileSync('sslcert/server.key', 'utf8');
var certificate = fs.readFileSync('sslcert/server.crt', 'utf8');

var credentials = { key: privateKey, cert: certificate };

var app = express();

app.use(express.json());
app.use("/resources", express.static(__dirname + "/resources"));

app.get("/index.appcache", (request, response) => {
    response.setHeader("Content-Type", "text/cache-manifest")
    response.sendFile(__dirname + "/index.appcache")
})

app.get("/", function (request, response) {
    response.sendFile(__dirname + "/index.html");
});

app.post("/send-user-request", async function(request, response)
{
    let phone = request.body['phone-number'];
    let name = request.body['name'];

    if(!validatePhone(String(phone))){
        response.status = 500;
        response.json({error: 'Phone number is not valid'});
    }

    if(String(name).lenght < 3){
        response.status = 500;
        response.json({error: 'Name should be has at least 3 letters'});
    }

    try
    {
        const token = 'secret'; //to connfig
        const chat_id = 'secret'; //to connfig
        const text = CreateMessage(name, phone);
        let response = await axios.get(`https://api.telegram.org/bot${token}/sendMessage?chat_id=${chat_id}&text=${text}`);
        if(response.date.status == 'ok')
        {
            response.json({status: 'OK'})
        }
        else
        {
            response.status = 500;
            response.json({error: 'Something went wrong'})
        }
    }
    catch
    {
        response.status = 500;
        response.json({error: 'Something went wrong'})
    }
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
