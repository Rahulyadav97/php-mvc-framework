<?php


namespace app\core;

use app\core\Application;
class Controller
{
    public string $layout = 'main';
 public function render($view,$params = []){
     return Application::$app->router->renderView($view,$params);
 }

    /**
     * @param mixed $layout
     */
    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }
}