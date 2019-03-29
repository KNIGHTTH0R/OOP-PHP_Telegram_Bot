<?php

//bot settings
$config = array (

    'secret_key' => true, //enable secret key -- true/false
    'parse_mode' => 'HTML', // Html/MarkDown
    'web_preview' => false, // true/false => enable link preview
    'disable_notification'=> false // true/false

);

//some usefull datas
$data = array(
    'key' => 'YOUR_KEY' //change with strong hashed password if you want some security
);

/*
    If you want to run more plugins into ypur bot, add files to this array.
    Example:
        $plugins = array(
            "start.php",
            "post.php",
            "hello_world.php",
            "kung_foo.php"
        );
*/
$plugins = array(
    "start.php",
    "post.php"
);

//bot configuration
$bot_config = array(
    'API_KEY'="123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11" //this key is just an example, replace with yours
)
