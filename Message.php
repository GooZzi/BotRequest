<?php

// Получите токен бота от BotFather в Telegram
$token = '6365069296:AAFIUYKuOr1OPg3datUM6prHNUD6u03V2sg';

// Получите обновления от Telegram API
$base_url = 'https://api.telegram.org/bot' . $token . '/';
$update_url = $base_url . 'getUpdates';

// Получаем последнее обновление
$response = file_get_contents($update_url);
$data = json_decode($response, true);
$last_update = end($data['result']);
$message = $last_update['message'];

// Получаем ID чата, откуда пришло сообщение
$chat_id = $message['chat']['id'];

// Получаем текст сообщения
$text = $message['text'];

// Отправляем сообщение в группу
$group_chat_id = '-1001980493060';
file_get_contents($base_url . 'sendMessage?chat_id=' . $group_chat_id . '&text=' . urlencode($text));

?>
