-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 10 2024 г., 21:25
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `toplegalconsulting`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET cp1251 COLLATE cp1251_bin NOT NULL,
  `mail` varchar(50) NOT NULL,
  `pas` varchar(24) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `comment` mediumtext NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id_client`, `name`, `mail`, `pas`, `address`, `telefon`, `comment`) VALUES
(1, 'Петров П.О.', 'ivan@mail.ru', '111', 'Пирогова 8', '776994', '');

-- --------------------------------------------------------

--
-- Структура таблицы `kartochka_dogovora`
--

CREATE TABLE IF NOT EXISTS `kartochka_dogovora` (
  `Номер_договора` int(11) NOT NULL,
  `ID_вида` int(11) NOT NULL,
  `Сумма договора` int(11) NOT NULL,
  `Контрагент` int(11) NOT NULL,
  `Примечание` varchar(255) NOT NULL,
  `Ответственный` int(11) NOT NULL,
  PRIMARY KEY (`Номер_договора`),
  KEY `ID_вида` (`ID_вида`),
  KEY `Контрагент` (`Контрагент`),
  KEY `Ответственный` (`Ответственный`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kartochka_dogovora`
--

INSERT INTO `kartochka_dogovora` (`Номер_договора`, `ID_вида`, `Сумма договора`, `Контрагент`, `Примечание`, `Ответственный`) VALUES
(1, 1, 20000, 1, '', 1),
(2, 2, 30000, 2, '', 2),
(3, 3, 10000, 3, '', 3),
(6, 1, 50000, 2, '', 4),
(11, 1, 200000, 3, '', 5),
(12, 2, 50000, 4, '', 1),
(15, 3, 350000, 1, '', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `kontragentu`
--

CREATE TABLE IF NOT EXISTS `kontragentu` (
  `Код` int(11) NOT NULL,
  `Контрагент` varchar(255) NOT NULL,
  `РНН` varchar(255) NOT NULL,
  `Телефон` varchar(255) NOT NULL,
  `Адрес` varchar(255) NOT NULL,
  `Ответственный` varchar(255) NOT NULL,
  PRIMARY KEY (`Код`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kontragentu`
--

INSERT INTO `kontragentu` (`Код`, `Контрагент`, `РНН`, `Телефон`, `Адрес`, `Ответственный`) VALUES
(1, 'Томский государственный университет', '7018012970', '+7 382 252-97-72', 'пр. Ленина, 36, Томск, Томская обл., Россия, 634050', 'Доронина Екатерина Дмитриевна'),
(2, 'Строительная компания ТОО «Домострой»', '7204080543', '+7 345 245-64-68', 'ул. Герцена, 86А, Тюмень, Тюменская обл., Россия, 625000', 'Захаров Александр Александрович'),
(3, 'Компания «КВАНТА+»', '7203115232', '\n8 (3452) 56-15-56', '625009,Тюменская обл,Тюмень г,Товарное шоссе ул,15', 'Гришина Ольга Владимировна'),
(4, 'Производственная компания «Мебель ГРУПП»', '7203250489', '+7(3452)63-88-90', '625034, Тюменская область, город Тюмень, Камчатская ул., д. 183', 'Блинова Наталья Кирилловна');

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `otchet`
--
CREATE TABLE IF NOT EXISTS `otchet` (
`Номер договора` int(11)
,`Вид договора` varchar(255)
,`Статус` varchar(255)
,`Дата заключения` date
,`Дата окончания` date
,`Сумма договора` int(11)
);
-- --------------------------------------------------------

--
-- Структура таблицы `reestr_dogovorov`
--

CREATE TABLE IF NOT EXISTS `reestr_dogovorov` (
  `Номер договора` int(11) NOT NULL,
  `Статус договора` int(11) NOT NULL,
  `Дата заключения` date NOT NULL,
  `Дата окончания` date NOT NULL,
  PRIMARY KEY (`Номер договора`),
  KEY `Статус договора` (`Статус договора`),
  KEY `Статус договора_2` (`Статус договора`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reestr_dogovorov`
--

INSERT INTO `reestr_dogovorov` (`Номер договора`, `Статус договора`, `Дата заключения`, `Дата окончания`) VALUES
(1, 3, '2023-10-01', '2023-11-22'),
(2, 3, '2023-11-15', '2023-11-22'),
(3, 1, '2024-03-10', '2024-05-28'),
(6, 2, '2024-03-17', '2024-06-23'),
(11, 2, '2024-04-21', '2024-05-19'),
(12, 4, '2024-05-15', '2024-06-16'),
(15, 5, '2024-05-12', '2024-06-02');

-- --------------------------------------------------------

--
-- Структура таблицы `sotrudniki`
--

CREATE TABLE IF NOT EXISTS `sotrudniki` (
  `Табельный номер` int(11) NOT NULL,
  `ФИО` varchar(50) NOT NULL,
  `Телефон` varchar(50) NOT NULL,
  `Ученая степень` varchar(255) NOT NULL,
  `Должность` varchar(255) NOT NULL,
  PRIMARY KEY (`Табельный номер`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sotrudniki`
--

INSERT INTO `sotrudniki` (`Табельный номер`, `ФИО`, `Телефон`, `Ученая степень`, `Должность`) VALUES
(1, 'Колпакова Анастасия Тимофеевна', '+7(940) 289-8526\n', 'Доктор юриспруденции', 'Старший адвокат'),
(2, 'Каргина Алёна Андреевна', '+7(927) 123-8730\n', 'Кандидат юридических наук', 'Адвокат'),
(3, 'Якуничева Анна Евгеньевна', '+7(987) 428-6935\n', 'Кандидат юридических наук', 'Адвокат'),
(4, 'Тунгускова Екатерина Константиновна', '+7(940) 293-8198\n', 'Нет', 'Юристконсульт'),
(5, 'Семенова Дарья Вадимовна', '+7(921) 570-7775\n', 'Нет', 'Юристконсульт');

-- --------------------------------------------------------

--
-- Структура таблицы `stasus_dogovora`
--

CREATE TABLE IF NOT EXISTS `stasus_dogovora` (
  `ID_статуса` int(11) NOT NULL,
  `Статус` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_статуса`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stasus_dogovora`
--

INSERT INTO `stasus_dogovora` (`ID_статуса`, `Статус`) VALUES
(1, 'Проект'),
(2, 'В работе'),
(3, 'Закрыт'),
(4, 'Расторгнут'),
(5, 'На согласовании');

-- --------------------------------------------------------

--
-- Структура таблицы `vid_dogovora`
--

CREATE TABLE IF NOT EXISTS `vid_dogovora` (
  `ID_вида` int(11) NOT NULL,
  `Вид договора` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_вида`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vid_dogovora`
--

INSERT INTO `vid_dogovora` (`ID_вида`, `Вид договора`) VALUES
(1, 'Договор на сопровождение исполнительного производства по земельно-имущественным спорам'),
(2, 'Договор оказания юридических услуг в пользу исполнителя'),
(3, 'Договор оказания услуг с адвокатом');

-- --------------------------------------------------------

--
-- Структура для представления `otchet`
--
DROP TABLE IF EXISTS `otchet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `otchet` AS select `reestr_dogovorov`.`Номер договора` AS `Номер договора`,`vid_dogovora`.`Вид договора` AS `Вид договора`,`stasus_dogovora`.`Статус` AS `Статус`,`reestr_dogovorov`.`Дата заключения` AS `Дата заключения`,`reestr_dogovorov`.`Дата окончания` AS `Дата окончания`,`kartochka_dogovora`.`Сумма договора` AS `Сумма договора` from ((`vid_dogovora` join `kartochka_dogovora` on((`vid_dogovora`.`ID_вида` = `kartochka_dogovora`.`ID_вида`))) join (`stasus_dogovora` join `reestr_dogovorov` on((`stasus_dogovora`.`ID_статуса` = `reestr_dogovorov`.`Статус договора`))) on((`kartochka_dogovora`.`Номер_договора` = `reestr_dogovorov`.`Номер договора`))) group by `reestr_dogovorov`.`Номер договора`,`vid_dogovora`.`Вид договора`,`stasus_dogovora`.`Статус`,`reestr_dogovorov`.`Дата заключения`,`reestr_dogovorov`.`Дата окончания`,`kartochka_dogovora`.`Сумма договора`;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `kartochka_dogovora`
--
ALTER TABLE `kartochka_dogovora`
  ADD CONSTRAINT `kartochka_dogovora_ibfk_1` FOREIGN KEY (`Контрагент`) REFERENCES `kontragentu` (`Код`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kartochka_dogovora_ibfk_2` FOREIGN KEY (`ID_вида`) REFERENCES `vid_dogovora` (`ID_вида`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kartochka_dogovora_ibfk_3` FOREIGN KEY (`Ответственный`) REFERENCES `sotrudniki` (`Табельный номер`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reestr_dogovorov`
--
ALTER TABLE `reestr_dogovorov`
  ADD CONSTRAINT `reestr_dogovorov_ibfk_1` FOREIGN KEY (`Номер договора`) REFERENCES `kartochka_dogovora` (`Номер_договора`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reestr_dogovorov_ibfk_2` FOREIGN KEY (`Статус договора`) REFERENCES `stasus_dogovora` (`ID_статуса`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
