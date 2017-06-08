<?php include ROOT . '/views/layouts/header.php' ?>

    <div class="container">
        <div class="row">
            <br>
            <h4>Добавить новую задачу</h4>

            <div class="add-task">
                <form id="add-task-form" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="name">Имя пользователя:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="form-group">
                        <label for="text">Текст задачи:</label>
                        <textarea class="form-control" rows="5" id="text" name="text"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Картинка:</label>
                        <input type="file" name="image" id="image">
                    </div>

                    <input type="submit" name="submit" value="Добавить" class="btn btn-default">

                    <button class="btn btn-default" id="btn-preview" style="margin: 10px 0">Предварительный
                        просмотр
                    </button>
                </form>
            </div>

            <div id="preview">
                <table class="table-bordered table" id="preview-table">
                    <tr>
                        <th>Имя пользователя</th>
                        <th>Email</th>
                        <th>Текст задачи</th>
                        <th>Картинка</th>
                        <th>Статус</th>
                    </tr>
                    <tr>
                        <td id="preview-name"></td>
                        <td id="preview-email"></td>
                        <td id="preview-text"></td>
                        <td></td>
                        <td>Не выполнено</td>
                    </tr>
                </table>
            </div>

        </div>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>