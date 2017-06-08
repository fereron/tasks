<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="container">
        <div class="row">
            <br>

            <h4>Редактировать задачу № <?= $task['id'] ?></h4>

            <div class="col-lg-4">
                <div class="signup-form">
                    <form method="post" enctype="multipart/form-data">
                        <br>

                        <div class="form-group">
                            <label for="name">Имя пользователя:</label>
                            <input type="text" class="form-control" value="<?= $task['name'] ?>" id="name" name="name"
                                   disabled>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" value="<?= $task['email'] ?>" id="email"
                                   name="email" disabled>
                        </div>

                        <div class="form-group">
                            <label for="text">Текст задачи:</label>
                            <textarea class="form-control" rows="5" id="text"
                                      name="text"><?= $task['text'] ?></textarea>
                        </div>

                        <p>Изображение товара:</p>
                        <img src="<?= Task::getImage($task['id']) ?>" width="200px" height="200px" alt=""
                             style="margin-bottom: 7px;">

                        <div class="form-group">
                            <label for="status">Статус:</label>
                            <select id="status" name="status" class="form-control">
                                <option value="1" <?php if ($task['status'] == 1) echo 'selected="selected"' ?>>
                                    Выполнено
                                </option>
                                <option value="0" <?php if ($task['status'] == 0) echo 'selected="selected"' ?>>Не
                                    выполнено
                                </option>
                            </select>
                        </div>

                        <input type="submit" name="submit" class="btn btn-default" value="Изменить">

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>