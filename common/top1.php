<div class="content-container container">
    <div id="contracts-section">
        <strong>Наш сайт</strong>
        <br>
        <img src="/img/img.png" alt="Image">
        <br>
        <strong class="section-title">Категории договоров:<br></strong>
        <table class="table">
            <thead>
                <tr class="table-header" align="center">
                    <th>Категория</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `vid_dogovora` WHERE 1";
                $q_types = $db->query($sql);
                while ($row_types = mysqli_fetch_array($q_types, MYSQLI_NUM)) {
                    echo '<tr>
                                <td align="left"><p style="margin-left: 20px"><span class="contract-category">
                                <a href="/?vid=catalog&type=' . $row_types[0] . '">' . $row_types[1] . '</a>
                                </span></p></td>
                              </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>


    <div class="auth-container container">
        <div id="auth-section">
            <hr>
            <strong class="auth-title">
                <?php
                if (isset($_SESSION['name_client'])) {
                    echo "Здравствуйте, " . $_SESSION['name_client'] . "! <br> <a href='/reg.php?exit=1'> Выход</a>";
                } else {
                    echo '<form method="get" action="/reg.php">
                        Гость. Авторизация:
                        <br>e-mail:  <input name="mail" type="text" size="30" maxlength="50" />
                        <br>пароль:  <input name="pas" type="password" size="20" maxlength="20" />
                        <input class="btn btn-primary" name="enter" type="submit" value="Войти" />
                        <br><a href="/reg.php" class="btn btn-secondary">Регистрация</a>
                    </form>';
                }
                ?>
            </strong>
        </div>
    </div>
</div>