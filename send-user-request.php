<?php
    $phone = $_POST["phone-number"];
    $name = $_POST["name"];

    $phonePattern = "/^\+7\s\(\d{3}\)\s\d{3}\s\d{4}$/";
    $namePattern = "/^[A-zА-я0-9]{3,32}$/";
    if(!preg_match($phonePattern, $phone))
    {
        http_response_code(500);
        echo("Не валидный номер телефона: $phone");
        exit();
    }

    if(!preg_match($namePattern, $name))
    {
        http_response_code(500);
        echo("Не валидное имя: $name");
        exit();
    }

    $text = urlencode("🛎 Новая заявка\nИмя: $name\nТелефон: $phone");

    $token = '5606124841:AAFZy_T9Rv_HFg3ghRnOCcNtMtL4CKzO09I';
    $chat_id = '-1001775417606';

    $curl = curl_init("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$text");

    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $data = curl_exec($curl);
?>