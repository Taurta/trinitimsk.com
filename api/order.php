<?php

function createOrder($request) {
    $original_data = $request->get_params();
    $data = [];

    // Санитайз
    foreach ($original_data as $key => $value) {
        if ($key == 'email') {
            $data[$key] = sanitize_email($value);
        } else {
            $data[$key] = sanitize_text_field($value);
        }
    }

    // Валидация
    if (!$data['phone']) {
        return [
            'success' => false,
            'message' => 'Не указан номер телефона.'
        ];
    }

    //Шаблон сообщения
    ob_start();
    extract($data);
    require_once (get_template_directory() . '/templates/mail.php'); 
    $message = ob_get_clean();

    // Отправка на почту
    $send_emails = get_field('send_emails', 'option');
    $mail_res = null;
    if ($send_emails) {
        $order_emails = get_field('order_emails', 'option');
        $emails = [];
        if ($order_emails) {

            foreach ($order_emails as $item) {
                array_push($emails, $item['email']);
            }

            $subject = 'Заявка с сайта';
            $headers = array(
                'From: AS-Conveyor <info@magrushome.com>',
                'content-type: text/html',
            );

            $mail_res = wp_mail($emails, $subject, $message, $headers);
        }
    }

    // Отправка в телеграм
    $send_tg = get_field('send_tg', 'option');
    $res = null;
    if ($send_tg) {
        $tg_chat_id = get_field('tg_chat_id', 'option');
        $tg_token = get_field('tg_token', 'option');

        if ($tg_chat_id && $tg_token) {
            $url = "https://api.telegram.org/bot{$tg_token}/sendMessage";

            $formatted_message = str_replace('</br>', "", $message); 

            $tg_params = [
                'chat_id' => $tg_chat_id,
                'text' => $formatted_message,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true,
            ];

            // Используем cURL
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $tg_params);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $res = curl_exec($ch);
            curl_close($ch);
        }
    }

    return [
        'success'  => true,
        'log' => [
            'send_emails' => $send_emails,
            'mail_res' => $mail_res,
            'send_tg' => $send_tg,
            'tg_res' => $res,
        ]
    ];
}

add_action( 'rest_api_init', function () {
        register_rest_route( 'methods', '/createOrder', array(
        'methods' => 'POST',
        'callback' => 'createOrder',
        'permission_callback' => '__return_true'
    ) );
} );