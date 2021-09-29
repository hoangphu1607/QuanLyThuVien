<?php
    class App{

        protected $controller = "Home";
        protected $action = "SayHi";
        protected $params = [];


        function __construct(){
             
            // echo $_GET["url"];
             $arr = $this->UrlProcess();
             print_r($arr);
        }

        function UrlProcess(){
            if( isset($_GET["url"]) ){
                 return explode("/",trim($_GET["url"], "/"));               
            }
            
        }
    }
?>