<?php

class User
{

    public static function checkAdmin($name, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE name = :name';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();

        $admin = $result->fetch();
        if ($password == $admin['password']) {
            return $admin['id'];
        }

        echo 'Aceess denied';
        die;
    }


    public static function auth($adminId)
    {
        $_SESSION['admin'] = $adminId;
    }

    public static function checkLogged()
    {
        //Если СЕССИЯ существует, вернем id пользователя
        if (isset($_SESSION['admin'])) {
            return $_SESSION['admin'];
        }

        //Если СЕССИИ нету, отправляем на страницу входа
        header('Location: /admin/');
    }

    public static function isAdmin()
    {
        if (isset($_SESSION['admin'])) {
            return true;
        }
        return false;
    }

}