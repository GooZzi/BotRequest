<?php

// Получите токен бота от BotFather в Telegram
$token = 'YOUR_BOT_TOKEN';

// Установите вебхук для вашего бота
$base_url = 'https://api.telegram.org/bot' . $token . '/';
$webhook_url = 'https://your-domain.com/your-webhook-url.php';
file_get_contents($base_url . 'setWebhook?url=' . $webhook_url);

// Обработка входящих запросов
$update = json_decode(file_get_contents('php://input'), true);

// Проверяем, есть ли новое входящее сообщение
if (isset($update['message'])) {
    $message = $update['message'];
    
    // Получаем ID чата, откуда пришло сообщение
    $chat_id = $message['chat']['id'];
    
    // Получаем текст сообщения
    $text = $message['text'];
    
    // Отправляем сообщение в группу
    $group_chat_id = 'YOUR_GROUP_CHAT_ID';
    file_get_contents($base_url . 'sendMessage?chat_id=' . $group_chat_id . '&text=' . urlencode($text));
}

?>
