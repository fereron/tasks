<?php


class SiteController
{

    public function actionIndex()
    {
        require_once ROOT . '/views/site/welcome.php';

        return true;
    }

    public function actionView($page = 1)
    {
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
        $key = isset($_GET['key']) ? $_GET['key'] : 'id';
        $orderBy = " ORDER BY $key $sort";

        $tasks = array();
        $tasks = Task::getTasksList($page, $orderBy);

        $tasksCount = Task::getTasksCount();
        $pagination = new Pagination($tasksCount, $page, Task::SHOW_BY_DEFAULT, 'page-');
        $sort = $sort == 'desc' ? 'asc' : 'desc';

        require_once ROOT . '/views/site/index.php';

        return true;
    }


    public function actionCreate()
    {
        if (isset($_POST['submit'])) {

            $task['name'] = $_POST['name'];
            $task['email'] = $_POST['email'];
            $task['text'] = $_POST['text'];

            $task_id = Task::createTask($task);

            if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                $valid_types = array("gif", "jpg", "png");
                $filename = $_FILES['image']['tmp_name'];
                $ext = substr($_FILES['image']['name'], 1 + strrpos($_FILES['image']['name'], "."));

                if (!in_array($ext, $valid_types)) {
                    echo 'Ошибка: Неправильный тип файла.';
                    header('Location: /tasks/create');
                } else {
                    @move_uploaded_file($filename, $_SERVER['DOCUMENT_ROOT'] . "/upload/images/tasks/{$task_id}.jpg");
                }
            }

            header('Location: /tasks/page-1');
        }

        require_once ROOT . '/views/site/create.php';

        return true;
    }

}