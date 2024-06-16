<div class="content-container container">
    <div id="contracts-section">
        <strong class="section-title">Категории договоров:<br></strong>
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
        <div id="auth-section">
            <strong class="auth-title">
                <?php if (isset($_SESSION['name_client'])) : ?>
                    Здравствуйте, <?= $_SESSION['name_client'] ?>! <br>
                    <a href='/reg.php?exit=1'>Выход</a>
                <?php else : ?>
                    <form method="get" action="/reg.php">
                        <div>
                            <p>Гость. Авторизация:</p>
                            <div class="input-group">
                                <span>e-mail:</span>
                                <input name="mail" type="text" size="30" maxlength="50" />
                            </div>
                            <div class="input-group">
                                <span>пароль:</span>
                                <input name="pas" type="password" size="20" maxlength="20" />
                            </div>
                            <div class="btn-container">
                                <input class="btn-new" name="enter" type="submit" value="Войти" />
                            </div>
                            <a href="/reg.php">Если у вас еще нет аккаунта, зарегистрируйтесь</a>
                        </div>
                    </form>
                <?php endif; ?>
            </strong>
        </div>
    </div>
</div>
