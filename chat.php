<?php
// backend.php

session_start();

// Manejo de conexiones WebSocket
if (isset($_GET['action']) && $_GET['action'] == 'setup') {
    $_SESSION['user'] = $_GET['user'];
    echo 'success';
    exit();
}

// Manejo de mensajes del chat
if (isset($_POST['message']) && isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $message = htmlspecialchars($_POST['message']);
    $data = array('user' => $user, 'message' => $message);
    echo json_encode($data);
    exit();
}
?>


<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Example</title>
</head>
<body>
    <div id="chat-box">
        <div id="chat-messages"></div>
        <input type="text" id="message-input" placeholder="Type your message">
        <button onclick="sendMessage()">Send</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.3/socket.io.js"></script>
    <script>
        const socket = io('http://localhost:3000'); // Replace with your server address

        socket.on('message', (data) => {
            const chatMessages = document.getElementById('chat-messages');
            chatMessages.innerHTML += `<p><strong>${data.user}:</strong> ${data.message}</p>`;
        });

        function sendMessage() {
            const messageInput = document.getElementById('message-input');
            const message = messageInput.value;

            if (message.trim() !== '') {
                socket.emit('message', { user: '<?php echo $_SESSION['user']; ?>', message: message });
                messageInput.value = '';
            }
        }
    </script>
</body>
</html>
