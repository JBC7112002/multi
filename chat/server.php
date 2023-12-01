<?php
$server = new WebSocketServer('localhost', 8080);

class WebSocketServer {
    private $clients = [];

    public function __construct($host, $port) {
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        socket_bind($this->socket, $host, $port);
        socket_listen($this->socket);
        $this->clients[] = $this->socket;
        $this->run();
    }

    private function run() {
        while (true) {
            $changed = $this->clients;
            socket_select($changed, $write, $except, null);

            foreach ($changed as $client) {
                if ($client == $this->socket) {
                    $newClient = socket_accept($this->socket);
                    $this->clients[] = $newClient;
                    $this->sendWelcomeMessage($newClient);
                } else {
                    $data = @socket_read($client, 1024, PHP_BINARY_READ);
                    if ($data === false) {
                        $index = array_search($client, $this->clients);
                        unset($this->clients[$index]);
                        socket_close($client);
                    } else {
                        $decoded = json_decode($data, true);
                        $this->broadcast($client, $decoded['user'], $decoded['message']);
                    }
                }
            }
        }
    }

    private function sendWelcomeMessage($client) {
        $message = json_encode(['user' => 'Servidor', 'message' => '¡Bienvenido al chat!']);
        socket_write($client, $message, strlen($message));
    }

    private function broadcast($sender, $user, $message) {
        foreach ($this->clients as $client) {
            if ($client !== $this->socket && $client !== $sender) {
                $response = json_encode(['user' => $user, 'message' => $message]);
                socket_write($client, $response, strlen($response));
            }
        }
    }
}
?>
