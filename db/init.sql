SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `toplegalconsulting` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `toplegalconsulting`;

-- Устанавливаем кодировку и коллацию на уровне соединения
SET NAMES 'utf8' COLLATE 'utf8_general_ci';

-- Структура таблицы `role`
CREATE TABLE IF NOT EXISTS `role` (
    `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT "ID роли",
    `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Роль",
    PRIMARY KEY (`role_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = "Роль";

-- Дамп данных таблицы `role`
INSERT INTO
    `role` (`role_id`, `name`)
VALUES (1, 'Гость'),
    (2, 'Пользователь сайта'),
    (3, 'Администратор сайта');
-- Структура таблицы `client`
CREATE TABLE IF NOT EXISTS `client` (
    `client_id` int(11) NOT NULL AUTO_INCREMENT COMMENT "ID Клиента",
    `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Фамилия И.О.",
    `email` varchar(50) NOT NULL COMMENT "Электронная почта",
    `password` varchar(24) NOT NULL COMMENT "Пароль",
    `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Адрес",
    `phone` varchar(50) NOT NULL COMMENT "Телефон",
    `comment` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT "Комментарий",
    `role_id` int(11) COMMENT "Роль",
    PRIMARY KEY (`client_id`),
    KEY `role_id` (`role_id`),
    CONSTRAINT `client_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = "Клиент";
-- Дамп данных таблицы `client`
INSERT INTO
    `client` (
        `client_id`,
        `name`,
        `email`,
        `password`,
        `address`,
        `phone`,
        `comment`
    )
VALUES (
        1,
        'Загитов Д.О.',
        'deniszagitov@gmail.com',
        '123',
        'Пирогова 8',
        '776994',
        ''
    );

-- Структура таблицы `contract_type`
CREATE TABLE IF NOT EXISTS `contract_type` (
    `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT "ID вида договора",
    `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Вид договора",
    PRIMARY KEY (`type_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = "Вид договора";

-- Дамп данных таблицы `contract_type`
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

-- Структура таблицы `contract_status`
CREATE TABLE IF NOT EXISTS `contract_status` (
    `status_id` int(11) NOT NULL AUTO_INCREMENT COMMENT "ID статуса",
    `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Статус",
    PRIMARY KEY (`status_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = "Статус договора";

-- Дамп данных таблицы `contract_status`
INSERT INTO
    `contract_status` (`status_id`, `name`)
VALUES (1, 'Проект'),
    (2, 'В работе'),
    (3, 'Закрыт'),
    (4, 'Расторгнут'),
    (5, 'На согласовании');

-- Структура таблицы `employee`
CREATE TABLE IF NOT EXISTS `employee` (
    `employee_id` int(11) NOT NULL AUTO_INCREMENT COMMENT "Табельный номер",
    `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "ФИО",
    `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT "Телефон",
    `degree` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT "Ученая степень",
    `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT "Должность",
    `role_id` int(11) COMMENT "Роль",
    PRIMARY KEY (`employee_id`),
    KEY `role_id` (`role_id`),
    CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = "Сотрудник";

-- Дамп данных таблицы `employee`
INSERT INTO
    `employee` (
        `employee_id`,
        `name`,
        `phone`,
        `degree`,
        `position`
    )
VALUES (
        1,
        'Колпакова Анастасия Тимофеевна',
        '+7 940 289-8526',
        'Доктор юриспруденции',
        'Старший адвокат'
    ),
    (
        2,
        'Каргина Алёна Андреевна',
        '+7 927 123-8730',
        'Кандидат юридических наук',
        'Адвокат'
    ),
    (
        3,
        'Герасимов Кирилл Вадимович',
        '+7 950 132-9458',
        'Доктор юриспруденции',
        'Партнер'
    ),
    (
        4,
        'Шевченко Ева Никитична',
        '+7 964 113-9652',
        'Кандидат юридических наук',
        'Старший адвокат'
    ),
    (
        5,
        'Тихонов Юрий Константинович',
        '+7 903 145-9856',
        'Доктор юриспруденции',
        'Партнер'
    ),
    (
        6,
        'Якуничева Анна Евгеньевна',
        '+7 987 428-6935',
        'Кандидат юридических наук',
        'Адвокат'
    );

-- Структура таблицы `organization`
CREATE TABLE IF NOT EXISTS `organization` (
    `organization_id` int(11) NOT NULL AUTO_INCREMENT COMMENT "ID Контрагента",
    `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Наименование",
    `inn` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "ИНН",
    `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT "Телефон",
    `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT "Адрес",
    `employee_id` int(11) COMMENT "Ответственный",
    PRIMARY KEY (`organization_id`),
    KEY `employee_id` (`employee_id`),
    CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = "Контрагент";

-- Дамп данных таблицы `organization`
INSERT INTO
    `organization` (
        `organization_id`,
        `name`,
        `inn`,
        `phone`,
        `address`,
        `employee_id`
    )
VALUES (
        1,
        'Томский государственный университет',
        '7018012970',
        '+7 382 252-97-72',
        'пр. Ленина, 36, Томск, Томская обл., Россия, 634050',
        1
    ),
    (
        2,
        'Строительная компания ТОО «Домострой»',
        '7204080543',
        '+7 345 245-64-68',
        'ул. Герцена, 86А, Тюмень, Тюменская обл., Россия, 625000',
        2
    ),
    (
        3,
        'Компания «КВАНТА+»',
        '7203115232',
        '+7 3452 56-15-56',
        '625009, Тюменская обл, Тюмень г, Товарное шоссе ул, 15',
        3
    ),
    (
        4,
        'Производственная компания «Мебель ГРУПП»',
        '7203250489',
        '+7 3452 63-88-90',
        '625034, Тюменская область, город Тюмень, Камчатская ул., д. 183',
        4
    );

-- Структура таблицы `contract`
CREATE TABLE IF NOT EXISTS `contract` (
    `contract_id` int(11) NOT NULL AUTO_INCREMENT COMMENT "Номер договора",
    `type_id` int(11) NOT NULL COMMENT "ID вида",
    `amount` int(11) COMMENT "Сумма договора",
    `organization_id` int(11) COMMENT "Контрагент",
    `client_id` int(11) COMMENT "ID Клиента",
    `comment` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT "Примечание",
    `employee_id` int(11) COMMENT "Ответственный",
    `status_id` int(11) NOT NULL COMMENT "Статус договора",
    `start_date` date COMMENT "Дата заключения",
    `end_date` date COMMENT "Дата окончания",
    PRIMARY KEY (`contract_id`),
    KEY `type_id` (`type_id`),
    KEY `organization_id` (`organization_id`),
    KEY `client_id` (`client_id`),
    KEY `employee_id` (`employee_id`),
    KEY `status_id` (`status_id`),
    CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `contract_type` (`type_id`),
    CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`),
    CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`),
    CONSTRAINT `contract_ibfk_4` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
    CONSTRAINT `contract_ibfk_5` FOREIGN KEY (`status_id`) REFERENCES `contract_status` (`status_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = "Договор";

-- Дамп данных таблицы `contract`
INSERT INTO
    `contract` (
        `contract_id`,
        `type_id`,
        `amount`,
        `organization_id`,
        `client_id`,
        `comment`,
        `employee_id`,
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
        1,
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
        1,
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

-- Структура таблицы contract_status_history
CREATE TABLE IF NOT EXISTS contract_status_history (
    history_id int(11) NOT NULL AUTO_INCREMENT COMMENT "ID истории",
    contract_id int(11) NOT NULL COMMENT "Номер договора",
    status_id int(11) NOT NULL COMMENT "Статус договора",
    changed_at datetime NOT NULL COMMENT "Дата изменения статуса",
    PRIMARY KEY (history_id),
    KEY contract_id (contract_id),
    KEY status_id (status_id),
    CONSTRAINT contract_status_history_ibfk_1 FOREIGN KEY (contract_id) REFERENCES contract (contract_id),
    CONSTRAINT contract_status_history_ibfk_2 FOREIGN KEY (status_id) REFERENCES contract_status (status_id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = "История изменения статусов договора";

-- Дамп данных таблицы contract_status_history
INSERT INTO
    contract_status_history (
        history_id,
        contract_id,
        status_id,
        changed_at
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

-- Структура таблицы `news`
CREATE TABLE IF NOT EXISTS `news` (
    `news_id` int(11) NOT NULL AUTO_INCREMENT COMMENT "ID новости",
    `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Заголовок",
    `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Содержание",
    `employee_id` int(11) NOT NULL COMMENT "ID автора",
    `published_date` date NOT NULL COMMENT "Дата публикации",
    PRIMARY KEY (`news_id`),
    KEY `employee_id` (`employee_id`),
    CONSTRAINT `news_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = "Новости";

-- Дамп данных таблицы `news`
INSERT INTO
    `news` (
        `news_id`,
        `title`,
        `content`,
        `employee_id`,
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

-- Структура представления report
CREATE OR REPLACE VIEW report AS
SELECT
    c.contract_id AS "Номер договора",
    ct.name AS "Вид договора",
    c.amount AS "Сумма договора",
    o.name AS "Контрагент",
    e.name AS "Ответственный юрист",
    cs.name AS "Статус",
    c.start_date AS "Дата заключения",
    c.end_date AS "Дата окончания"
FROM
    contract c
    INNER JOIN contract_type ct ON c.type_id = ct.type_id
    INNER JOIN organization o ON c.organization_id = o.organization_id
    INNER JOIN employee e ON c.employee_id = e.employee_id
    INNER JOIN contract_status cs ON c.status_id = cs.status_id;