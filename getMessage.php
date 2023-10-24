<?php

function send_message($chat_id, $text) {
    $bot_token = "6365069296:AAFIUYKuOr1OPg3datUM6prHNUD6u03V2sg";
    $url = "https://api.telegram.org/bot{$bot_token}/sendMessage";
    $params = [
        "chat_id" => $chat_id,
        "text" => $text
    ];
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    return json_decode($response, true);
}

// Пример использования
$chat_id = "6365069296";
$text = "Привет, мир!";
$response = send_message($chat_id, $text);
print_r($response);
?>
