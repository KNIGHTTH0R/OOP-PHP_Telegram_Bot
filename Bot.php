<?php

    /*
        Class writed by MrDeiv
    */

    require './lib/string.php';
    require 'config.php';
    require 'update.php';

    class Bot {

        //This class represents our bot

        //-- Attributes
        private $id; //chat id
        private $botAPI; //bot API key
        private $username; //bot username
        private $webhook; //webhook status

        //Methods
        //-- Contructor
        public function __construct() {
            /*
                APi key looks like --> 123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11
                API key is given by @BotFather after new bot creation.
                See Telegram Docs for more...
            */
            $this->setBotAPI($bot_config['API_KEY']); //put HERE your bot api key. 
            if ($this->setWebhook("https://www.example.tk/bot/index.php")) {//put HERE your HTTPS url where you want to receive updates
                echo "Successfully set webhook";
            } else echo "Something went wrong during webhook setting";
            
            

        }

        //-- Getters
        public function getId() { return $this->id; }
        public function getBotAPI() { return $this->botAPI; }
        public function getUsername() { return $this->username; }
        public function getWebhook() {return $this->webhook; }

        //--Setters
        public function setId($id) {
            if (isset($id) && is_integer($id)) $this->id= $id;
            else throw new Exception("Bot id must be an Integer");
        }
        public function setBotAPI($key) {
            if (isset($key)) {
                $botAPI= new String($key);
                if ($botAPI->getLength()===41) $this->botAPI= $botAPI;
                else throw new Exception("Wrong API key");
            } else throw new Exception("Wrong API key");
        }
        public function setUsername($username) {
            if (isset($username)) $this->username= $username;
            else throw new Exception("Username can't be null");
        }

        //Telegram methods implementation
        //-- setWebhook: https://core.telegram.org/bots/api#setwebhook
        public function setWebhook($link) {
            if ($config['secret_key'])
                $key= urlencode("?key=".$data['key']); 
            else $key="";
            $url= "https://api.telegram.org/bot".$this->getBotAPI()."/setWebhook?url=".urlencode($link).$key;
            $handle= fopen("./logs/bot_".time(),"a");
            fwrite($handle,"Trying to set webhook at: ".$url);
            $res= file_get_contents($url);
            $webhook= json_decode($res);
            fwrite($handle,"Get response:\n".$webhook);
            fclose($handle);
            if ($webhook['ok']) {
                $this->webhook= true;
                return true;
            } else {
                $this->webhook= false;
                return false;
            }
        }

        // -- sendMessage: https://core.telegram.org/bots/api#sendmessage
        public function sendMessage($chat_id, $text, $keyboard = false, $tinline = false, $reply_to_message = false, $disable_notify = false) {

            global $api;
            global $config;
        
            $args = array (
        
                'text' => $text,
                'chat_id' => $chat_id,
                'parse_mode' => $config['parse_mode'],
                'disable_web_page_preview' => $config['web_preview'],
                'disable_notification' => $config['disable_notification'];
        
            );
        
            if(is_array($keyboard)) {
        
                if(!$tinline)
                    $args['reply_markup'] = json_encode ( array (
        
                        'inline_keyboard' => $keyboard
        
                    ) );
                else 
                    $args['reply_markup'] = json_encode ( array (
        
                        'keyboard' => $keyboard,
                        'resize_keyboard' => true,
                        'one_time_keyboard' => false
        
                    ) );
            }
        
            if(is_numeric($reply_to_message))
                $args['reply_to_message_id'] = $reply_to_message;
        
            $r = request('post', 'https://api.telegram.org/' . $api . '/sendMessage', $args);
        
            $resp = json_decode($r, true);
        
            if($resp['ok'] == 'true') return $r['result']['message_id'];
            else return false;
        }
    }

?>