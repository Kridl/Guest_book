-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 25 2022 г., 17:20
-- Версия сервера: 5.7.39
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `testUsers`
--

CREATE TABLE `testUsers` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `testUsers`
--

INSERT INTO `testUsers` (`id`, `login`, `password`) VALUES
(1, 'admin1', '$2y$10$bYO99ifdo1/1sDuv9G4joe4Jal2eJ1.R0.jEzQn0f3b1YQtWqCSsm'),
(2, 'admin2', '$2y$10$3UQ2kXB7BqFBx5kmXnWs1.g1FwYf4S9NdL4qFOMcxJoZLNi08xCEe');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `testUsers`
--
ALTER TABLE `testUsers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `testUsers`
--
ALTER TABLE `testUsers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
