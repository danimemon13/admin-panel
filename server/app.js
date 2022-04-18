var socket = require( 'socket.io' );
var express = require( 'express' );
var http = require( 'http' );
const { Server } = require("socket.io");
var app = express();
var server = http.createServer( app );

const io = new Server(server);

io.sockets.on( 'connection', function( client ) {
    console.log( "New client !" );

    client.on( 'addDepartment', function( data ) {
        console.log( 'Message received ' + data.userid + ":" + data.message );

        io.sockets.emit( 'addCompany', { name: data.userid, message: data.message } );
    });
    client.on( 'addRole', function( data ) {
        console.log( 'Message received ' + data.userid + ":" + data.message );

        io.sockets.emit( 'addCompany', { name: data.userid, message: data.message } );
    });
    client.on( 'addCompany', function( data ) {
        console.log( 'Message received ' + data.userid + ":" + data.message );

        io.sockets.emit( 'addCompany', { name: data.userid, message: data.message } );
    });
    client.on( 'DeleteCompany', function( data ) {
        console.log( 'Message received ' + data.userid + ":" + data.message );

        io.sockets.emit( 'DeleteCompany', { name: data.userid, message: data.message } );
    });
    client.on( 'DeleteDeparment', function( data ) {
        console.log( 'Message received ' + data.userid + ":" + data.message );

        io.sockets.emit( 'DeleteDeparment', { name: data.userid, message: data.message } );
    });
    client.on( 'DeleteRole', function( data ) {
        console.log( 'Message received ' + data.userid + ":" + data.message );

        io.sockets.emit( 'DeleteRole', { name: data.userid, message: data.message } );
    });
});

server.listen( 3000 );