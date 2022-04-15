var socket = require( 'socket.io' );
var express = require( 'express' );
var http = require( 'http' );
const { Server } = require("socket.io");
var app = express();
var server = http.createServer( app );

const io = new Server(server);

io.sockets.on( 'connection', function( client ) {
    console.log( "New client !" );

    client.on( 'message', function( data ) {
        console.log( 'Message received ' + data.userid + ":" + data.message );

        io.sockets.emit( 'message', { name: data.userid, message: data.message } );
    });
});

server.listen( 3000 );