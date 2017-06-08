<?php

class AdminController
{

    public function actionLogin()
    {
        $admin = User::isAdmin();

        if ($admin) {
            header('Location: /admin/index');
        }

        if ( isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];

            $admin = User::checkAdmin($name, $password);

                //Если все правильно запоминаем админа
                User::auth($admin);

                header('Location: /admin/index');
        }

        require_once ROOT. '/views/admin/login.php';

        return true;
    }

    public function actionIndex()
    {
        User::checkLogged();

        $tasks = array();
        $tasks = Task::getAllTasksList();

        require_once ROOT. '/views/admin/index.php';

        return true;
    }

    public function actionUpdate($id)
    {
        User::checkLogged();
        if ( isset($_POST['submit'])) {

            $task['text'] = $_POST['text'];
            $task['status'] = $_POST['status'];

            Task::updateTaskById($id, $task);

            header('Location: /admin/index');
        }

        $task = Task::getTaskById($id);

        require_once ROOT. '/views/admin/update.php';

        return true;
    }

}