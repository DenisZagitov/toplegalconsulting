START TRANSACTION;

CREATE DATABASE IF NOT EXISTS `toplegalconsulting`;

SET NAMES 'utf8mb4' COLLATE 'utf8mb4_general_ci';

USE `toplegalconsulting`;

-- Таблица `role`
CREATE TABLE IF NOT EXISTS `role` (
    `role_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ID роли',
    `name` VARCHAR(50) NOT NULL COMMENT 'Роль',
    PRIMARY KEY (`role_id`)
) ENGINE = InnoDB COMMENT = 'Роль';

-- Данные для таблицы `role`
INSERT INTO
    `role` (`role_id`, `name`)
VALUES (1, 'Гость'),
    (2, 'Пользователь сайта'),
    (3, 'Администратор сайта');

-- Таблица `user`
CREATE TABLE IF NOT EXISTS `user` (
    `user_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ID пользователя',
    `name` VARCHAR(100) NOT NULL COMMENT 'ФИО',
    `email` VARCHAR(100) NOT NULL COMMENT 'Электронная почта',
    `password` VARCHAR(255) NOT NULL COMMENT 'Пароль',
    `address` VARCHAR(255) COMMENT 'Адрес',
    `phone` VARCHAR(50) COMMENT 'Телефон',
    `comment` TEXT COMMENT 'Комментарий',
    `degree` VARCHAR(255) COMMENT 'Ученая степень',
    `position` VARCHAR(255) COMMENT 'Должность',
    `role_id` INT(11) DEFAULT 2 COMMENT 'Роль',
    PRIMARY KEY (`user_id`),
    KEY `role_id` (`role_id`),
    CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`)
) ENGINE = InnoDB COMMENT = 'Пользователь';

-- Данные для таблицы `user`
INSERT INTO
    `user` (
        `user_id`,
        `name`,
        `email`,
        `password`,
        `address`,
        `phone`,
        `comment`,
        `degree`,
        `position`,
        `role_id`
    )
VALUES (
        1,
        'Загитов Д.О.',
        'deniszagitov@gmail.com',
        '123',
        'Пирогова 8',
        '776994',
        '',
        '',
        '',
        2
    ),
    (
        2,
        'Колпакова Анастасия Тимофеевна',
        'anastasia.kolpakova@toplegalconsult.com',
        'password1',
        'ул. Ленина, 12',
        '+7 940 289-8526',
        'Отличный сотрудник',
        'Доктор юриспруденции',
        'Старший адвокат',
        3
    ),
    (
        3,
        'Каргина Алёна Андреевна',
        'alena.kargina@toplegalconsult.com',
        'password2',
        'ул. Герцена, 34',
        '+7 927 123-8730',
        'Профессиональный адвокат',
        'Кандидат юридических наук',
        'Адвокат',
        3
    ),
    (
        4,
        'Герасимов Кирилл Вадимович',
        'kirill.gerasimov@toplegalconsult.com',
        'password3',
        'ул. Пушкина, 56',
        '+7 950 132-9458',
        'Партнер фирмы',
        'Доктор юриспруденции',
        'Партнер',
        3
    ),
    (
        5,
        'Шевченко Ева Никитична',
        'eva.shevchenko@toplegalconsult.com',
        'password4',
        'ул. Садовая, 78',
        '+7 964 113-9652',
        'Опытный адвокат',
        'Кандидат юридических наук',
        'Старший адвокат',
        3
    ),
    (
        6,
        'Тихонов Юрий Константинович',
        'yuri.tikhonov@toplegalconsult.com',
        'password5',
        'ул. Московская, 90',
        '+7 903 145-9856',
        'Партнер фирмы',
        'Доктор юриспруденции',
        'Партнер',
        3
    ),
    (
        7,
        'Якуничева Анна Евгеньевна',
        'anna.yakunicheva@toplegalconsult.com',
        'password6',
        'ул. Пирогова, 23',
        '+7 987 428-6935',
        'Опытный адвокат',
        'Кандидат юридических наук',
        'Адвокат',
        3
    );

-- Таблица `contract_type`
CREATE TABLE IF NOT EXISTS `contract_type` (
    `type_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ID вида договора',
    `name` VARCHAR(255) NOT NULL COMMENT 'Вид договора',
    PRIMARY KEY (`type_id`)
) ENGINE = InnoDB COMMENT = 'Вид договора';

-- Данные для таблицы `contract_type`
INSERT INTO
    `contract_type` (`type_id`, `name`)
VALUES (
        1,
        'Договор на сопровождение исполнительного производства по земельно-имущественным спорам'
    ),
    (
        2,
        'Договор оказания юридических услуг в пользу исполнителя'
    ),
    (
        3,
        'Договор оказания услуг с адвокатом'
    );

-- Таблица `contract_status`
CREATE TABLE IF NOT EXISTS `contract_status` (
    `status_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ID статуса',
    `name` VARCHAR(255) NOT NULL COMMENT 'Статус',
    PRIMARY KEY (`status_id`)
) ENGINE = InnoDB COMMENT = 'Статус договора';

-- Данные для таблицы `contract_status`
INSERT INTO
    `contract_status` (`status_id`, `name`)
VALUES (1, 'Проект'),
    (2, 'В работе'),
    (3, 'Закрыт'),
    (4, 'Расторгнут'),
    (5, 'На согласовании');

-- Таблица `organization`
CREATE TABLE IF NOT EXISTS `organization` (
    `organization_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Контрагента',
    `name` VARCHAR(255) NOT NULL COMMENT 'Наименование',
    `inn` VARCHAR(255) NOT NULL COMMENT 'ИНН',
    `phone` VARCHAR(255) COMMENT 'Телефон',
    `address` VARCHAR(255) COMMENT 'Адрес',
    `representative_id` INT(11) COMMENT 'Представитель контрагента',
    PRIMARY KEY (`organization_id`),
    KEY `representative_id` (`representative_id`),
    CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`representative_id`) REFERENCES `user` (`user_id`)
) ENGINE = InnoDB COMMENT = 'Контрагент';

-- Данные для таблицы `organization`
INSERT INTO
    `organization` (
        `organization_id`,
        `name`,
        `inn`,
        `phone`,
        `address`,
        `representative_id`
    )
VALUES (
        1,
        'Томский государственный университет',
        '7018012970',
        '+7 382 252-97-72',
        'пр. Ленина, 36, Томск, Томская обл., Россия, 634050',
        2
    ),
    (
        2,
        'Строительная компания ТОО «Домострой»',
        '7204080543',
        '+7 345 245-64-68',
        'ул. Герцена, 86А, Тюмень, Тюменская обл., Россия, 625000',
        3
    ),
    (
        3,
        'Компания «КВАНТА+»',
        '7203115232',
        '+7 3452 56-15-56',
        '625009, Тюменская обл, Тюмень г, Товарное шоссе ул, 15',
        4
    ),
    (
        4,
        'Производственная компания «Мебель ГРУПП»',
        '7203250489',
        '+7 3452 63-88-90',
        '625034, Тюменская область, город Тюмень, Камчатская ул., д. 183',
        5
    );

-- Таблица `contract`
CREATE TABLE IF NOT EXISTS `contract` (
    `contract_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Номер договора',
    `type_id` INT(11) COMMENT 'ID вида',
    `amount` INT(11) COMMENT 'Сумма договора',
    `organization_id` INT(11) COMMENT 'Контрагент',
    `client_id` INT(11) COMMENT 'ID Клиента',
    `comment` TEXT COMMENT 'Примечание',
    `responsible_id` INT(11) COMMENT 'Ответственный',
    `status_id` INT(11) NOT NULL DEFAULT 1 COMMENT 'Статус договора',
    `start_date` DATE COMMENT 'Дата заключения',
    `end_date` DATE COMMENT 'Дата окончания',
    `file_path` VARCHAR(255) COMMENT 'Путь к файлу',
    `uploaded_at` DATETIME COMMENT 'Дата загрузки',
    PRIMARY KEY (`contract_id`),
    KEY `type_id` (`type_id`),
    KEY `organization_id` (`organization_id`),
    KEY `client_id` (`client_id`),
    KEY `responsible_id` (`responsible_id`),
    KEY `status_id` (`status_id`),
    CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `contract_type` (`type_id`),
    CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`),
    CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `user` (`user_id`),
    CONSTRAINT `contract_ibfk_4` FOREIGN KEY (`responsible_id`) REFERENCES `user` (`user_id`),
    CONSTRAINT `contract_ibfk_5` FOREIGN KEY (`status_id`) REFERENCES `contract_status` (`status_id`)
) ENGINE = InnoDB COMMENT = 'Договор';

-- Данные для таблицы `contract`
INSERT INTO
    `contract` (
        `contract_id`,
        `type_id`,
        `amount`,
        `organization_id`,
        `client_id`,
        `comment`,
        `responsible_id`,
        `status_id`,
        `start_date`,
        `end_date`
    )
VALUES (
        1,
        1,
        20000,
        1,
        1,
        '',
        2,
        1,
        '2023-01-01',
        '2023-12-31'
    ),
    (
        2,
        2,
        30000,
        2,
        1,
        '',
        2,
        2,
        '2023-03-15',
        '2023-09-15'
    ),
    (
        3,
        3,
        10000,
        3,
        1,
        '',
        3,
        3,
        '2023-05-10',
        '2023-11-10'
    ),
    (
        6,
        1,
        50000,
        2,
        1,
        '',
        4,
        1,
        '2023-01-01',
        '2023-12-31'
    ),
    (
        11,
        1,
        200000,
        3,
        1,
        '',
        5,
        1,
        '2023-01-01',
        '2023-12-31'
    ),
    (
        12,
        2,
        50000,
        4,
        1,
        '',
        4,
        2,
        '2023-03-15',
        '2023-09-15'
    ),
    (
        15,
        3,
        350000,
        1,
        1,
        '',
        2,
        3,
        '2023-05-10',
        '2023-11-10'
    );

-- Таблица `contract_status_history`
CREATE TABLE IF NOT EXISTS `contract_status_history` (
    `history_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ID истории',
    `contract_id` INT(11) NOT NULL COMMENT 'Номер договора',
    `status_id` INT(11) NOT NULL COMMENT 'Статус договора',
    `changed_at` DATETIME NOT NULL COMMENT 'Дата изменения статуса',
    PRIMARY KEY (`history_id`),
    KEY `contract_id` (`contract_id`),
    KEY `status_id` (`status_id`),
    CONSTRAINT `contract_status_history_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`contract_id`),
    CONSTRAINT `contract_status_history_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `contract_status` (`status_id`)
) ENGINE = InnoDB COMMENT = 'История изменения статусов договора';

-- Данные для таблицы `contract_status_history`
INSERT INTO
    `contract_status_history` (
        `history_id`,
        `contract_id`,
        `status_id`,
        `changed_at`
    )
VALUES (
        1,
        1,
        1,
        '2023-01-15 09:00:00'
    ),
    (
        2,
        2,
        2,
        '2023-02-01 10:00:00'
    ),
    (
        3,
        3,
        3,
        '2023-03-10 11:00:00'
    ),
    (
        4,
        3,
        4,
        '2023-04-25 12:00:00'
    ),
    (
        5,
        3,
        5,
        '2023-05-30 13:00:00'
    ),
    (
        6,
        2,
        1,
        '2023-06-10 14:00:00'
    ),
    (
        7,
        1,
        2,
        '2023-07-05 15:00:00'
    );

-- Таблица `news`
CREATE TABLE IF NOT EXISTS `news` (
    `news_id` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'ID новости',
    `title` VARCHAR(255) NOT NULL COMMENT 'Заголовок',
    `content` TEXT COMMENT 'Содержание',
    `author_id` INT(11) NOT NULL COMMENT 'ID автора',
    `published_date` DATE NOT NULL COMMENT 'Дата публикации',
    PRIMARY KEY (`news_id`),
    KEY `author_id` (`author_id`),
    CONSTRAINT `news_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`user_id`)
) ENGINE = InnoDB COMMENT = 'Новости';

-- Данные для таблицы `news`
INSERT INTO
    `news` (
        `news_id`,
        `title`,
        `content`,
        `author_id`,
        `published_date`
    )
VALUES (
        1,
        'Корпоративные споры: новые вызовы, участники, методы',
        'В рамках XII Юридической недели в Тюмени — 2021 состоится сессия «Корпоративные споры: новые вызовы, участники, методы». Как отметил со-модератор сессии Александр Ермоленко, партнер ФБК Legal, (Москва): «Корпоративные споры, можно сказать, развивают нашу бизнес-среду. Через такого рода конфликты постепенно происходит тонкая настройка правовой и экономической системы. Помимо того, что интересно и сложно, это ещё и полезно для всех в перспективе. Поэтому, на мой взгляд, такие споры всегда популярны, поэтому ими стоит заниматься». Модератор сессии Степан Матаев, управляющий партнер ЮК «Аспект», Председатель Совета ЗСПП: «Самая горячая тема в этой сфере, традиционно, корпоративные конфликты: из нашей практики – в этом году прекратилось банкротство собственника бизнеса, у которого бывший партнер пытался отобрать долю через уголовное дело»',
        1,
        '2024-06-28'
    ),
    (
        2,
        'Жилье и городская среда: реализация национального проекта',
        'Постоянной традицией Юридической недели в Тюмени является рассмотрение хода и юридических аспектов реализации Национальных проектов России. На XII Юрнеделе — 2021 будет рассматриваться реализация проекта «Жилье и городская среда» реализуемый в рамках выполнения Указа Президента №204',
        2,
        '2024-06-27'
    ),
    (
        3,
        'Закупки для государственных и муниципальных нужд: тренды правового регулирования и практики',
        'Участие в государственных и муниципальных закупках остается привлекательным для бизнеса в условиях финансового кризиса. Однако деятельность в данной сфере сопровождается серьезными юридическими рисками в связи с повышенными требованиями, жесткой ответственностью и особыми последствиями в случае попадания в реестр недобросовестных поставщиков. Теме закупок посвящена сессия «Закупки для государственных и муниципальных нужд: тренды правового регулирования и практики», которая 27 мая 2021 откроет Юридическую неделю в Тюмени 2021',
        3,
        '2024-06-26'
    );

-- Представление `report`
CREATE OR REPLACE VIEW report AS
SELECT
    c.contract_id AS 'Номер договора',
    ct.name AS 'Вид договора',
    c.amount AS 'Сумма договора',
    o.name AS 'Контрагент',
    u.name AS 'Ответственный юрист',
    cs.name AS 'Статус',
    DATE_FORMAT(c.start_date, '%d.%m.%Y') AS 'Дата заключения',
    DATE_FORMAT(c.end_date, '%d.%m.%Y') AS 'Дата окончания'
FROM
    contract c
    INNER JOIN contract_type ct ON c.type_id = ct.type_id
    INNER JOIN organization o ON c.organization_id = o.organization_id
    INNER JOIN user u ON c.responsible_id = u.user_id
    INNER JOIN contract_status cs ON c.status_id = cs.status_id;

COMMIT;