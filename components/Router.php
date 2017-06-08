<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    //Функция определения URL
    private function getUrl()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], "/");
        }
    }

    public function Run()
    {
        //Получить строку запроса
        $url = $this->getUrl();

        //Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $urlpattern => $path) {
            if (preg_match("~$urlpattern~", $url)) {

                $internalRoute = preg_replace("~$urlpattern~", $path, $url);

                //Определить какой какой контроллер и метод action обрабатывает запрос
                $segments = explode("/", $internalRoute); //Функция разбиения строки

                $controllerName = ucfirst(array_shift($segments)).'Controller'; //Имя контроллера
                $actionName = 'action'.ucfirst(array_shift($segments));         //Имя метода

                $parameters = $segments;

                //Подключить файл класса контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                //Создать класс, вызвать метод (action)
                $conrollerObject = new $controllerName;
                $result = call_user_func_array( array ($conrollerObject, $actionName), $parameters);
                if ( $result != null) {
                    break;
                } else{
                    echo 'Нет такого пути';
                }
            }
        }

    }
}