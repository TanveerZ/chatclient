const express = require('express');
const app = express();
const http = require('http');
const cors = require('cors');
const server = http.createServer(app);
//const io = require("socket.io-client");
const io = require("socket.io-client");
const socket = io.connect("http://localhost:8080");


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
socket.on('connect', (sockett) => {
      console.log('a user connected');
      //console.log(socket); 
      socket.emit('chat', "chat with me 1");
      //var clients = io.of('/chat').clients();
    });
    socket.on('chatready', (msg) => {   
      //socket.emit('chat', "good");   
});
    //var clients = io.of('/chat').clients('room');
    socket.on('userchat', (msg) => {   
      console.log(msg);   
});
socket.emit('chat', "chat with me 2");
server.listen(3000, () => {  console.log('listening on *:3000');});
