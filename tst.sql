-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 10 2024 г., 21:09
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tst`
--

-- --------------------------------------------------------

--
-- Структура таблицы `rentors`
--

CREATE TABLE `rentors` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `addres` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rentors`
--

INSERT INTO `rentors` (`id`, `name`, `phone`, `addres`, `uid`) VALUES
(2, 'Асхат Арманов', '+777878465461', 'Абаева 145/4 25 квартира', 30);

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `depo` varchar(50) NOT NULL,
  `source` varchar(50) NOT NULL,
  `summa` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `transactions`
--

INSERT INTO `transactions` (`id`, `uid`, `type`, `title`, `depo`, `source`, `summa`, `date`) VALUES
(1, 30, 'plus', 'Проверка', 'main', '2', 50000, '2024/05/10 20:03'),
(2, 30, 'plus', 'На запас', 'pool', 'Другое', 75000, '2024/05/10 20:03'),
(3, 30, 'plus', 'За январь', 'comn', 'Другое', 12500, '2024/05/10 20:04'),
(4, 30, 'minus', 'Электричество', 'comn', 'Другое', 2000, '2024/05/10 20:05');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `main` int(11) DEFAULT NULL,
  `comn` int(11) DEFAULT NULL,
  `pool` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `main`, `comn`, `pool`) VALUES
(30, 'Азамат Маратович', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '+77776262671', 50000, 10500, 75000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `rentors`
--
ALTER TABLE `rentors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `rentors`
--
ALTER TABLE `rentors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
