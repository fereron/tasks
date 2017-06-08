<?php include ROOT . '/views/layouts/header.php' ?>

<div class="container">
    <div class="row">
        <br> <br>

        <a href="/tasks/create" class="btn btn-default back" id="btn-add-task"><i class="fa fa-plus"></i>
            Добавить задачу</a>

        <h4>Список задач</h4>

        <div class="sort">
            <a class="btn btn-default" href="?key=name&sort=<?= $sort ?>">Сортировать по имени пользователя</a>
            <a class="btn btn-default" href="?key=email&sort=<?= $sort ?>">Сортировать по email </a>
            <a class="btn btn-default" href="?key=status&sort=<?= $sort ?>">Сортировать по статусу </a>
        </div>

        <table class="table-bordered table">
            <tr>
                <th>Имя пользователя</th>
                <th>Email</th>
                <th>Текст задачи</th>
                <th>Картинка</th>
                <th>Статус</th>
            </tr>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut beatae cum facilis incidunt natus odit quibusdam ratione suscipit tenetur voluptatum.

            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= $task['name'] ?></td>
                    <td><?= $task['email'] ?></td>
                    <td><?= $task['text'] ?></td>
                    <td>
                        <img src="/upload/images/tasks/<?= $task['id'] ?>.jpg" alt="Task Image" width="100px">
                    </td>
                    <?php if ($task['status'] == 0): ?>
                        <td>Не выполнено</td>
                    <?php else: ?>
                        <td>Выполнено</td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>

        </table>
        <br>

        <div class="col-md-5 col-md-offset-3">,
            <?php echo $pagination->get(); ?>
        </div>

    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php' ?>
