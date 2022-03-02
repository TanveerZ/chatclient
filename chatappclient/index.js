const express = require('express');
const app = express();
const http = require('http');
const cors = require('cors');
const server = http.createServer(app);
//const io = require("socket.io-client");
const { io }= require("socket.io-client");
const socket = io("http://localhost:3000");


//const io = new Server(server);

app.use(cors());
app.use(function(req, res, next) {
  res.header("Access-Control-Allow-Origin", "*");
  res.header('Access-Control-Allow-Methods', 'DELETE, PUT,GET');
  res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  if ('OPTIONS' == req.method) {
     res.sendStatus(200);
   }
   else {
     next();
   }});

app.get('/', (req, res) => {   res.sendFile(__dirname + '/index.html');});
socket.on('connection', (socket) => {
      console.log('a user connected');
      socket.on('chat', (msg) => {   
        alert(msg);   
  });
    });
server.listen(8080, () => {  console.log('listening on *:8080');});
