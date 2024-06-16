<div class="left-side">
    <div id="contracts-section">
        <h3>Категории договоров:</h3>
        <div class="Category">
            <?php
            $sql = "SELECT * FROM `vid_dogovora` WHERE 1";
            $q_types = $db->query($sql);
            while ($row_types = mysqli_fetch_array($q_types, MYSQLI_NUM)) : ?>
                <span class="contract-category">
                    <p>
                        <a href="/?vid=catalog&type=<?= $row_types[0] ?>"><?= $row_types[1] ?></a>
                    </p>
                </span>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="auth-container">
        <?php if (isset($_SESSION['name_client'])) : ?>
            Здравствуйте, <?= $_SESSION['name_client'] ?>! <br>
            <a href='/reg.php?exit=1'>Выход</a>
        <?php else : ?>
            <form method="get" action="/reg.php">
                <div>
                    <h3>Вход</h3>
                    <div class="input-group">
                        <span>E-mail:</span>
                        <input name="mail" type="text" size="30" maxlength="50" />
                    </div>
                    <div class="input-group">
                        <span>Пароль:</span>
                        <input name="pas" type="password" size="20" maxlength="20" />
                    </div>
                    <div class="btn-container">
                        <input class="btn-new" name="enter" type="submit" value="Войти" />
                        <a href="/reg.php">Регистрация</a>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>