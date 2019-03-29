<?php

    $api = $_GET['token'];

    $bot = $_GET['bot'];

    $admin_id = $_GET['admin'];

    /*
        decode json request
        return an associative array with request values
        for more: https://core.telegram.org/bots/api#update
    */
    $update= json_decode(file_get_contents("php://input"),true);

    #Message
    $msg = $update['message']['text']; 
    $reply_text = $update['message']['reply_to_message']['text']; 
    $msg_id = $update['message']['message_id'];
    $reply_id = $update['message']['reply_to_message']['message_id']; 
    $caption = $update['message']['caption'];
    $username = $update['message']['from']['username'];
    $first_name = $update['message']['from']['first_name'];
    $last_name = $update['message']['from']['last_name'];

    #Chat
    $chat_id = $update['message']['chat']['id'];
    $type_chat = $update['message']['chat']['type'];
    $title = $update['message']['chat']['title']; 
    $forward_chatID = $update['message']['forward_from_chat']['chat']['id']; 
    $forward_type_chat = $update['message']['forward_from_chat']['chat']['type'];

    #User
    $user_id = $update['message']['from']['id'];
    $reply_from_id = $update['message']['reply_to_message']['from']['id'];
    $forward_from_id = $update['message']['forward_from']['id'];
    $forward_form_first_name = $update['message']['forward_from']['first_name'];
    $reply_from_first_name = $update['message']['reply_to_message']['from']['first_name']; 
    $forward_from_last_name = $update['message']['forward_from']['last_name']; 
    $reply_from_last_name= $update['message']['reply_to_message']['from']['last_name'];  
    $forward_from_username = $update['message']['forward_from']['username']; 
    $reply_from_username = $update['message']['reply_to_message']['from']['username']; 

    #callback query
    if(isset($update['callback_query'])) {

        $cb_from_id = $update['callback_query']['from']['id'];
        $cb_first_name = $update['callback_query']['from']['first_name'];
        $cb_last_name = $update['callback_query']['from']['last_name'];
        $cb_username = $update['callback_query']['from']['username'];
        $cb_id = $update['callback_query']['id'];
        $cb_msg = $update['callback_query']['data'];
        $cb_msg_id = $update['callback_query']['message']['message_id'];
        $cb_chat_id = $update['callback_query']['message']['chat']['id'];
        
    }

?>