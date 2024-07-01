<div class="header-container">
    <header class="d-flex justify-content-between align-items-center py-3">
        <div class="logo-container">
            <a href="/" class="logo"><img src="/img/hotpng.png" alt="Лого" class="img-fluid"></a>
        </div>
        <div class="contact-info d-flex flex-column align-items-start">
            <div class="phone-info d-flex align-items-center">
                <img src="/img/call.png" width="50" height="50" class="mr-2">
                <p class="phone-number">
                    <a href="tel:+73452500045" class="text-light">+7 (3452) 500-045</a>
                </p>
            </div>
            <div class="working-hours d-flex align-items-center">
                <img src="/img/time.png" width="50" height="50" class="mr-2">
                <p class="text-light">09:00 - 20:00</p>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark denis-color">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="justify-content-center collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <?php
                $splited_url = explode('?', $_SERVER['REQUEST_URI']);
                $url = $splited_url[0];
                ?>

                <a class="nav-link <?php if ($url == '/' or $url == '/index.php') echo 'active'; ?>" href="/">Главная</a>
                <a class="nav-link <?php if ($url == '/about.php') echo 'active'; ?>" href="/about.php">О нас</a>
                <a class="nav-link <?php if ($url == '/aboutdogovor.php') echo 'active'; ?>" href="/aboutdogovor.php">Услуги</a>
                <a class="nav-link <?php if ($url == '/read.php') echo 'active'; ?>" href="/read.php">Договоры</a>
                <a class="nav-link <?php if ($url == '/news.php') echo 'active'; ?>" href="/news.php">Новости</a>
                <a class="nav-link <?php if ($url == '/contacts.php') echo 'active'; ?>" href="/contacts.php">Контакты</a>
                <?php if (isset($_SESSION['role_id']) and $_SESSION['role_id'] == 3) { ?>
                    <a class="nav-link <?php if ($url == '/otchet.php') echo 'active'; ?>" href="/otchet.php">Отчет</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <h1 class="text-center m-2">Юридическая компания «TopLegalConsulting»</h1>
</div>