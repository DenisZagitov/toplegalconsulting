<div class="left-side container mt-4">
    <div class="row">
    <div class="col">
        <?php if (isset($_SESSION['name_client'])) : ?>
            <p class="text-center">Здравствуйте, <?= $_SESSION['name_client'] ?>!</p>
            <a href='/reg.php?exit=1' class="btn btn-danger btn-block">Выход</a>
        <?php else : ?>
            <form method="get" action="/reg.php">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Вход</h3>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input id="email" name="email" type="text" size="30" maxlength="50" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="current-password">Пароль:</label>
                            <input id="current-password" name="current-password" type="password" size="20" maxlength="20" class="form-control" />
                        </div>
                        <div class="d-flex text-center justify-content-between mt-2">
                            <input class="btn btn-primary" name="enter" type="submit" value="Войти" />
                            <a href="/reg.php" class="btn btn-link">Регистрация</a>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
    <div class="col mt-4">
        <h3 class="text-center">Категории договоров</h3>
        <div class="list-group">
            <?php
            $sql = "SELECT * FROM contract_type";
            $q_types = $db->query($sql);
            while ($row_types = mysqli_fetch_array($q_types, MYSQLI_NUM)) : ?>
                <a href="/index.php?type=<?= urlencode($row_types[1]) ?>" class="list-group-item list-group-item-action">
                    <?= htmlspecialchars($row_types[1]) ?>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
    </div>
</div>