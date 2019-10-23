-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 10 2014 г., 13:57
-- Версия сервера: 5.5.37-log
-- Версия PHP: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` tinyint(3) unsigned NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_id` (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `gallery_id`, `img`, `description`) VALUES
(1, 1, '01.jpg', 'Описание фото 1'),
(2, 1, '02.jpg', 'Описание фото 2'),
(3, 1, '03.jpg', 'Описание фото 3'),
(4, 1, '04.jpg', 'Описание фото 4'),
(5, 1, '05.jpg', 'Описание фото 5'),
(6, 1, '06.jpg', 'Описание фото 6'),
(7, 2, '07.jpg', 'Описание фото 7'),
(8, 2, '08.jpg', 'Описание фото 8'),
(9, 2, '09.jpg', 'Описание фото 9'),
(10, 2, '10.jpg', 'Описание фото 10'),
(11, 1, '11.jpg', 'Описание фото 11'),
(12, 1, '12.jpg', 'Описание фото 12'),
(13, 1, '13.jpg', 'Описание фото 13'),
(14, 1, '14.jpg', 'Описание фото 14'),
(15, 1, '15.jpg', 'Описание фото 15'),
(16, 1, '16.png', 'Описание фото 16'),
(17, 1, '17.gif', 'Описание фото 17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;