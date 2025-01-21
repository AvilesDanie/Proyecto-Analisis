<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class WebSocketServer implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
        $this->listConnections();
    }
    
    public function onMessage(ConnectionInterface $from, $msg) {
        echo "Message received from Connection {$from->resourceId}: $msg\n";
    
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                echo "Sending message to Connection {$client->resourceId}: $msg\n";
                $client->send($msg);
            }
        }
    
        $this->listConnections();
    }
    
    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
        $this->listConnections();
    }
    
    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

    private function listConnections() {
        $connections = [];
        foreach ($this->clients as $client) {
            $connections[] = $client->resourceId;
        }
        echo "Active connections: " . implode(', ', $connections) . "\n";
    }
}

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new WebSocketServer()
        )
    ),
    8080
);

echo "WebSocket server started on ws://localhost:8080\n";

$server->run();
