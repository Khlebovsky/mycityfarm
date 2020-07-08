-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: sql110.epizy.com
-- Время создания: Июл 08 2020 г., 04:04
-- Версия сервера: 5.6.47-87.0
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `epiz_22121448_apidb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `api_keys`
--

CREATE TABLE `api_keys` (
  `id` int(11) UNSIGNED NOT NULL,
  `api_key` varchar(32) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `api_keys`
--

INSERT INTO `api_keys` (`id`, `api_key`) VALUES
(1, 'r8jgn9pq-NvyxMy*SFavf33Sgkwt=GbV');

-- --------------------------------------------------------

--
-- Структура таблицы `farms`
--

CREATE TABLE `farms` (
  `id` int(11) UNSIGNED NOT NULL,
  `temp` int(4) NOT NULL,
  `temp_val` int(4) NOT NULL,
  `wet` int(3) UNSIGNED NOT NULL,
  `watering_val` text CHARACTER SET utf8 NOT NULL,
  `light` int(1) UNSIGNED NOT NULL,
  `light_val` text CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `farms`
--

INSERT INTO `farms` (`id`, `temp`, `temp_val`, `wet`, `watering_val`, `light`, `light_val`) VALUES
(1, 0, 0, 0, '', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 NOT NULL,
  `hash` varchar(32) CHARACTER SET utf8 NOT NULL,
  `email` varchar(120) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `surname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `farm_id` int(11) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `hash`, `email`, `name`, `surname`, `farm_id`) VALUES
(1, 'fort_dev', 'f90c81f80b22ee9f8bec5478365879d0', 'info@fort-dev.ml', 'кирилл', 'кирилл', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `api_key` (`api_key`);

--
-- Индексы таблицы `farms`
--
ALTER TABLE `farms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `farms`
--
ALTER TABLE `farms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
