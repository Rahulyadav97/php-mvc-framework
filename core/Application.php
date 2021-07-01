<?php
namespace app\core;

/**
 * 
 * user:  Rahul Yadav
 * @namespace
 */

 class Application
 {
     public $router;
     public $request;
     public $response;
     public Database $db;
     public static $app;
     public static $Root_DIR;
     public Controller $controller;
     public Session $session;
     public function __construct($rootPath,array $config)
     {
         self::$Root_DIR = $rootPath;
         self::$app=$this;
         $this->request = new Request();
         $this->response = new Response();
         $this->session = new Session();
         $this->router = new Router($this->request,$this->response);

         $this->db = new Database($config['db']);
     }

     public function run()
     {
        echo  $this->router->resolve();
     }

     /**
      * @return Controller
      */
     public function getController(): Controller
     {
         return $this->controller;
     }

     /**
      * @param Controller $controller
      */
     public function setController(Controller $controller): void
     {
         $this->controller = $controller;
     }
 }