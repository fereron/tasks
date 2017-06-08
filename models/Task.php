<?php


class Task
{
    const SHOW_BY_DEFAULT = 3;

    public static function getTasksCount()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT count(id) AS count FROM tasks");

        $row = $result->fetch();

        return $row['count'];
    }

    public static function createTask($task)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO tasks (name, email, text) VALUES (:name, :email, :text)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $task['name'], PDO::PARAM_STR);
        $result->bindParam(':email', $task['email'], PDO::PARAM_STR);
        $result->bindParam(':text', $task['text'], PDO::PARAM_STR);

        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }


    public static function getTaskById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * FROM tasks WHERE id = $id");
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }

        return false;
    }


    public static function getImage($id)
    {
        //Название изображения пустышки
        $noImage = 'no-image.jpg';

        //Путь к папке с изображениями
        $path = '/upload/images/tasks/';

        //Путь к изображению
        $pathToTaskImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToTaskImage)) {
            return $pathToTaskImage;
        }

        return $path . $noImage;
    }

    public static function updateTaskById($id, $task)
    {
        $id = intval($id);
        $db = Db::getConnection();

        $sql = "UPDATE tasks SET text = :text, status = :status WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':text', $task['text'], PDO::PARAM_STR);
        $result->bindParam(':status', $task['status'], PDO::PARAM_INT);

        return $result->execute();
    }

    public static function getAllTasksList()
    {
        $db = Db::getConnection();
        $tasks = array();
        $result = $db->query("SELECT * FROM tasks");

        $i = 0;
        while ($row = $result->fetch()) {
            $tasks[$i]['id'] = $row['id'];
            $tasks[$i]['name'] = $row['name'];
            $tasks[$i]['email'] = $row['email'];
            $tasks[$i]['text'] = $row['text'];
            $tasks[$i]['status'] = $row['status'];
            $i++;
        }

        return $tasks;
    }

    public static function getTasksList($page = 1, $orderBy)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();
        $tasks = array();
        $result = $db->query("SELECT * FROM tasks " . $orderBy . " LIMIT " . self::SHOW_BY_DEFAULT . " OFFSET " . $offset);

        $i = 0;
        while ($row = $result->fetch()) {
            $tasks[$i]['id'] = $row['id'];
            $tasks[$i]['name'] = $row['name'];
            $tasks[$i]['email'] = $row['email'];
            $tasks[$i]['text'] = $row['text'];
            $tasks[$i]['status'] = $row['status'];
            $i++;
        }

        return $tasks;
    }

}