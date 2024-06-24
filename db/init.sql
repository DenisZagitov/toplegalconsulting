SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `toplegalconsulting` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `toplegalconsulting`;

-- Устанавливаем кодировку и коллацию на уровне соединения
SET NAMES 'utf8' COLLATE 'utf8_general_ci';

-- Структура таблицы `client`
CREATE TABLE IF NOT EXISTS `client` (
    `client_id` int(11) NOT NULL AUTO_INCREMENT COMMENT "ID Клиента",
    `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Имя",
    `email` varchar(50) NOT NULL COMMENT "Почта",
    `password` varchar(24) NOT NULL COMMENT "Пароль",
    `address` varchar(255) NOT NULL COMMENT "Адрес",
    `phone` varchar(50) NOT NULL COMMENT "Телефон",
    `comment` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Комментарий",
    PRIMARY KEY (`client_id`)
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

-- Структура таблицы `contract`
CREATE TABLE IF NOT EXISTS `contract` (
    `contract_id` int(11) NOT NULL AUTO_INCREMENT COMMENT "Номер договора",
    `type_id` int(11) NOT NULL COMMENT "ID вида",
    `amount` int(11) NOT NULL COMMENT "Сумма договора",
    `organization_id` int(11) NOT NULL COMMENT "Контрагент",
    `client_id` int(11) NOT NULL COMMENT "ID Клиента",
    `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Примечание",
    `employee_id` int(11) NOT NULL COMMENT "Ответственный",
    PRIMARY KEY (`contract_id`),
    KEY `type_id` (`type_id`),
    KEY `organization_id` (`organization_id`),
    KEY `client_id` (`client_id`),
    KEY `employee_id` (`employee_id`)
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
        `employee_id`
    )
VALUES (1, 1, 20000, 1, 1, '', 1),
    (2, 2, 30000, 2, 1, '', 2),
    (3, 3, 10000, 3, 1, '', 3),
    (6, 1, 50000, 2, 1, '', 4),
    (11, 1, 200000, 3, 1, '', 5),
    (12, 2, 50000, 4, 1, '', 1),
    (15, 3, 350000, 1, 1, '', 2);

-- Структура таблицы `organization`
CREATE TABLE IF NOT EXISTS `organization` (
    `organization_id` int(11) NOT NULL AUTO_INCREMENT COMMENT "ID Контрагента",
    `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "ФИО",
    `inn` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "ИНН",
    `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Телефон",
    `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Адрес",
    `employee_id` int(11) NOT NULL COMMENT "Ответственный",
    PRIMARY KEY (`organization_id`)
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

-- Структура таблицы `employee`
CREATE TABLE IF NOT EXISTS `employee` (
    `employee_id` int(11) NOT NULL AUTO_INCREMENT COMMENT "Табельный номер",
    `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "ФИО",
    `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Телефон",
    `degree` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Ученая степень",
    `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT "Должность",
    PRIMARY KEY (`employee_id`)
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
        'Якуничева Анна Евгеньевна',
        '+7 987 428-6935',
        'Кандидат юридических наук',
        'Адвокат'
    ),
    (
        4,
        'Тунгускова Екатерина Константиновна',
        '+7 940 293-8198',
        'Нет',
        'Юристконсульт'
    ),
    (
        5,
        'Семенова Дарья Вадимовна',
        '+7 921 570-7775',
        'Нет',
        'Юристконсульт'
    );

-- Структура таблицы `contract_registry`
CREATE TABLE IF NOT EXISTS `contract_registry` (
    `contract_id` int(11) NOT NULL COMMENT "Номер договора",
    `status_id` int(11) NOT NULL COMMENT "Статус договора",
    `start_date` date NOT NULL COMMENT "Дата заключения",
    `end_date` date NOT NULL COMMENT "Дата окончания",
    PRIMARY KEY (`contract_id`, `status_id`),
    KEY `status_id` (`status_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COMMENT = "Реестр договоров";

-- Дамп данных таблицы `contract_registry`
INSERT INTO
    `contract_registry` (
        `contract_id`,
        `status_id`,
        `start_date`,
        `end_date`
    )
VALUES (
        1,
        1,
        '2023-01-15',
        '2023-12-31'
    ),
    (
        2,
        2,
        '2023-02-01',
        '2023-12-31'
    ),
    (
        3,
        3,
        '2023-03-10',
        '2023-12-31'
    ),
    (
        6,
        4,
        '2023-04-25',
        '2023-12-31'
    ),
    (
        11,
        5,
        '2023-05-30',
        '2023-12-31'
    ),
    (
        12,
        1,
        '2023-06-10',
        '2023-12-31'
    ),
    (
        15,
        2,
        '2023-07-05',
        '2023-12-31'
    );

-- Добавляем внешние ключи
ALTER TABLE `contract`
ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `contract_type` (`type_id`);

ALTER TABLE `contract`
ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`);

ALTER TABLE `contract`
ADD CONSTRAINT `contract_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`);

ALTER TABLE `contract`
ADD CONSTRAINT `contract_ibfk_4` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

ALTER TABLE `contract_registry`
ADD CONSTRAINT `contract_registry_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`contract_id`);

ALTER TABLE `contract_registry`
ADD CONSTRAINT `contract_registry_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `contract_status` (`status_id`);

CREATE VIEW `report` AS
SELECT
    contract.contract_id AS "Номер договора",
    contract_type.name AS "Вид договора",
    contract.amount AS "Сумма договора",
    organization.name AS "Контрагент",
    employee.name AS "Ответственный юрист",
    contract_status.name AS "Статус",
    contract_registry.start_date AS "Дата заключения",
    contract_registry.end_date AS "Дата окончания"
FROM
    contract_type
    INNER JOIN contract ON contract_type.type_id = contract.type_id
    INNER JOIN organization ON organization.organization_id = contract.organization_id
    INNER JOIN employee ON employee.employee_id = contract.employee_id
    INNER JOIN contract_registry ON contract_registry.contract_id = contract.contract_id
    INNER JOIN contract_status ON contract_status.status_id = contract_registry.status_id;