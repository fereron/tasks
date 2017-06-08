<?php  include ROOT. '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <div id="add-task">
                        <h2>Вход в админпанель</h2>
                        <form method="post">

                            <div class="form-group">
                                <label for="name">Логин:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="form-group">
                                <label for="password">Пароль:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <button type="submit" name="submit" class="btn btn-default">Войти</button>
                        </form>
                    </div>
                    <br>
                    <br>

            </div>
        </div>
    </div>
</section>


<?php  include ROOT. '/views/layouts/footer.php'; ?>

