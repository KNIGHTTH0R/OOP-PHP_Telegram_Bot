<?php

    //main file


    require "Bot.php";
    require 'config.php';
    
    //create new bot object
    $bot= new Bot();

    //check if webhook is setted
    if ($bot->getWebhook()) {
        echo "The bot is working...";
    } else echo "Errore during object creation";

    //security check
    if ($config['secret_key'])
        if ($data['key']!=$_POST['key']) {

            //security issues
            $handle= fopen("./logs/securityIssue_".time(),"w");
            fwrite($handle,"Unauthorized request from: ".file_get_contents('php://input'));
            fclose($handle);
            exit(1);
        }
    
    //no security issues
    
    require 'update.php';
    
    //load plugins
    foreach($plugins as $plugin)
        require $plugin;


    

?>