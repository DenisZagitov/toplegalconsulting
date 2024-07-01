<div class="header-container">
    <header class="d-flex justify-content-between align-items-center py-3">
        <div class="logo-container">
            <a href="/" class="logo"><img src="/img/hotpng.png" alt="Лого" class="img-fluid"></a>
        </div>
        <div class="contact-info d-flex flex-column align-items-start">
            <div class="phone-info d-flex align-items-center mb-2">
                <img src="/img/call.png" width="50" height="50" class="mr-2">
                <p class="phone-number mb-0">
                    <a href="tel:+73452500045" class="text-white">+7 (3452) 500-045</a>
                </p>
            </div>
            <div class="working-hours d-flex align-items-center">
                <img src="/img/time.png" width="50" height="50" class="mr-2">
                <p class="mb-0 text-white">09:00 - 20:00</p>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark denis-color">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex justify-content-center collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link" href="/">Главная</a>
                <a class="nav-link" href="/about.php">О нас</a>
                <a class="nav-link" href="/aboutdogovor.php">Услуги</a>
                <a class="nav-link" href="/read.php">Договоры</a>
                <a class="nav-link" href="/news.php">Новости</a>
                <a class="nav-link" href="/contacts.php">Контакты</a>
                <?php if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 3) { ?>
                    <a class='nav-link' href='/otchet.php'>Отчет</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <h1 class="text-center mt-4">Юридическая компания «TopLegalConsulting»</h1>
</div>