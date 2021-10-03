<?php
    class App{

        protected $controller = "Home";
        protected $action = "SayHi";
        protected $params = [];


        function __construct(){
             
            // echo $_GET["url"];
             $arr = $this->UrlProcess();
             
             // Xu li Controller
            if(file_exists("./mvc/controllers/".$arr[0].".php")){
                $this->controller = $arr[0];   
                unset($arr[0]);         
            }
            require_once "./mvc/controllers/".$this->controller.".php"

            // Xu li Action
            if(isset($arr[1])){
                if(method_exists($this->controller, $arr[1])){
                    $this->action = $arr[1];                     
                }
                unset($arr[1]);
            }

            //Xu ly Params
            $this->params = $arr? array-values($arr):[];
            call_user_func_array([$this->controller, $this->action, $this->params]);
        }

        

        function UrlProcess(){
            if( isset($_GET["url"]) ){
                 return explode("/",trim($_GET["url"], "/"));               
            }
            
        }
    }
?>