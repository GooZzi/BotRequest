<?php

// Ваш токен бота
$botToken = ‘6365069296:AAFIUYKuOr1OPg3datUM6prHNUD6u03V2sg’;

// Идентификаторы групп, в которые нужно отправить сообщение
$chatIds = [-1980493060, 1060887470, 6365069296];

// Сообщение, которое нужно отправить
$message = ‘Привет!’;

try {
// Создаем HTTP-клиент
$httpClient = new GuzzleHttp\Client();

// Готовим данные для отправки
$data = ['chat_id' => $chatIds, 'text' => $message];
$jsonData = json_encode($data);

foreach ($chatIds as $chatId) {
    // Отправляем сообщение в группу с идентификатором $chatId
    $response = $httpClient->post('https://api.telegram.org/bot' . $botToken . '/sendMessage', [
        'form_params' => $jsonData
    ]);
}

echo 'Сообщение успешно отправлено!';
} catch (Exception $e) {
echo 'Ошибка: ’ . $e->getMessage();
}