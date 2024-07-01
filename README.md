# TopLegalConsulting

![TopLegalConsulting Logo](img/hotpng.png)

В этом репозитории я разработал современный и функциональный веб-сайт для юридической компании "TopLegalConsulting". Сайт предоставляет пользователям удобный доступ к информации о юридических услугах, шаблонам договоров и новостям компании. Основная цель сайта - улучшение информационной поддержки компании и привлечение новых клиентов.

## Сайт опубликован по адресу

http://tusur.toplegalconsult.com

## Основные функции

- Регистрация и авторизация пользователей
- Просмотр и скачивание шаблонов договоров
- Информация о предоставляемых юридических услугах
- Последние новости компании
- Контактные данные и форма обратной связи

## Технологии

Проект разработан с использованием следующих технологий:

<p align="left">
  <a href="https://developer.mozilla.org/en-US/docs/Web/HTML" target="_blank" rel="noreferrer">
    <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original.svg" alt="html5" width="40" height="40"/>
  </a>
  <a href="https://developer.mozilla.org/en-US/docs/Web/CSS" target="_blank" rel="noreferrer">
    <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original.svg" alt="css3" width="40" height="40"/>
  </a>
  <a href="https://www.php.net" target="_blank" rel="noreferrer">
    <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" alt="php" width="40" height="40"/>
  </a>
  <a href="https://www.mysql.com" target="_blank" rel="noreferrer">
    <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" alt="mysql" width="40" height="40"/>
  </a>
  <a href="https://www.docker.com/" target="_blank" rel="noreferrer">
    <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/docker/docker-original-wordmark.svg" alt="docker" width="40" height="40"/>
  </a>
</p>

## Установка и запуск

Для локального запуска проекта используйте Docker. Убедитесь, что Docker и Docker Compose установлены на вашем компьютере.

### Команды для запуска

1. Остановите и удалите все существующие контейнеры и тома:
    ```sh
    docker-compose down -v
    ```

2. Сборка и запуск контейнеров:
    ```sh
    docker-compose up --build -d
    ```

3. Откройте браузер и перейдите по адресу:

    [http://localhost](http://localhost)