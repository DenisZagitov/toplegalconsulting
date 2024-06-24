<div class="left-side">
    <div id="contracts-section">
        <h3>Категории договоров</h3>
        <div class="category">
            <?php
            $sql = "SELECT * FROM contract_type";
            $q_types = $db->query($sql);
            while ($row_types = mysqli_fetch_array($q_types, MYSQLI_NUM)) : ?>
                <span class="contract-category">
                    <p>
                        <a href="/otchet.php?type=<?= urlencode($row_types[1]) ?>"><?= htmlspecialchars($row_types[1]) ?></a>
                    </p>
                </span>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="auth-container">
        <?php if (isset($_SESSION['name_client'])) : ?>
            Здравствуйте, <?= $_SESSION['name_client'] ?>!
            <a href='/reg.php?exit=1'>Выход</a>
        <?php else : ?>
            <form method="get" action="/reg.php">
                <div>
                    <h3>Вход</h3>
                    <div class="input-group">
                        <label for="email">E-mail:</label>
                        <input id="email" name="email" type="text" size="30" maxlength="50" class="form-control" />
                    </div>
                    <div class="input-group">
                        <label for="current-password">Пароль:</label>
                        <input id="current-password" name="current-password" type="current-password" size="20" maxlength="20" class="form-control" />
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