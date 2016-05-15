-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 09 2016 г., 21:23
-- Версия сервера: 5.5.45
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `profiles`
--

-- --------------------------------------------------------

--
-- Структура таблицы `profiles_tab`
--

CREATE TABLE IF NOT EXISTS `profiles_tab` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(11) COLLATE utf8_bin NOT NULL,
  `login` varchar(11) COLLATE utf8_bin NOT NULL,
  `password` varchar(11) COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `role` varchar(11) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `profiles_tab`
--

INSERT INTO `profiles_tab` (`id`, `name`, `login`, `password`, `email`, `role`) VALUES
(11, 'Oleg', 'testlogin', 'testpass', 'user@email.ru', 'user'),
(13, 'Andrew', 'TheAndrew', '1234556', 'Andrew@email.ru', 'manager'),
(14, 'Ivan', 'Ivengo', 'qwerty', 'Ivengo@email.ru', 'manager');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
