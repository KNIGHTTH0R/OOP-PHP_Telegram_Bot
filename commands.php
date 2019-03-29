<?php

    /*
        Commands file
        --  Put here your /commands if you want to keep then in
            a single file. Otherwise, you can put them in other files
            but remember to add them to config.php
        --  With standard configuration, all your commands must start
            with "/". Ex.: /start, /help...
            If you want to have commands without "/", change settings
            throw @Botfather menu
        --  In this file, I manage commands from a chat with a person, not from groups.
            To check if a message come from a single person chat, you can check
            chat_id value: if this is higher than 0, you are in a private chat, else the message come from a group or channel.
        --  For group management, look group.php file
        --  You are not obliged to have "/start" command but when a person
            start a chat with your bot, he send automatically this command.
            Without /start management, the bot can't do anything, then someone
            may think that it does not work
    */

    # check if the bot are talking with a person
    require 'update.php';

    if ($chat_id > 0) {

        /*
            Get command from message, maybe,
            the command is in first position of the array
        */
        $cmd= explode($msg, " ");

        // manage commands
        switch ($cmd) {
            case "/start":
                
                break;
            default:
                #add here some code if you want to manage all other msgs
                break;
        }
    }

?>
