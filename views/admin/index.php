<?php include ROOT. '/views/layouts/header.php' ?>

<div class="container">
    <div class="row">
        <br> <br>

        <h4>Список задач</h4>

        <table class="table-bordered table">
            <tr>
                <th>Имя пользователя</th>
                <th>Email</th>
                <th>Текст задачи</th>
                <th>Картинка</th>
                <th>Статус</th>
                <th></th>
            </tr>

            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= $task['name'] ?></td>
                    <td><?= $task['email'] ?></td>
                    <td><?= $task['text'] ?></td>
                    <td>
                        <img src="/upload/images/tasks/<?= $task['id'] ?>.jpg" alt="Task Image" width="100px" >
                    </td>
                    <?php if ($task['status'] == 0): ?>
                        <td>Не выполнено</td>
                    <?php else: ?>
                        <td>Выполнено</td>
                    <?php endif; ?>
                    <td><a href="/admin/update/<?=$task['id']?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                </tr>
            <?php endforeach; ?>

        </table>
        <br>

    </div>
</div>

<?php include ROOT. '/views/layouts/footer.php' ?>
