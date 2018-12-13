-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 13 2018 г., 21:45
-- Версия сервера: 5.5.58
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sales`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `email`, `first_name`, `last_name`) VALUES
(1, 'lovecraft.crowley@gmail.com', 'Eugan', 'Blotskyi'),
(2, 'customer@i.ua', 'Sigurdur', 'Swenson'),
(3, 'customer2@gmail.com', 'Ingvar', 'Gäterget'),
(4, 'customer3@gmail.com', 'Ben', 'Stones'),
(5, 'customer4@i.ua', 'Richard', 'Brale');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `country` varchar(64) NOT NULL,
  `device` text NOT NULL,
  `date` date NOT NULL COMMENT 'purchase date',
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `country`, `device`, `date`, `customer_id`) VALUES
(1, 'Ukraine', 'iPhone', '2018-12-11', 1),
(2, 'Sweden', 'iPhone', '2018-12-10', 1),
(3, 'Denmark', 'PC', '2018-11-15', 2),
(5, 'USA', 'TAB', '2018-09-04', 3),
(6, 'Ukraine', 'iPhone', '2018-09-12', 3),
(7, 'Ukraine', 'iPhone', '2018-09-08', 3),
(8, 'USA', 'iPhone', '2018-09-08', 4),
(9, 'USA', 'PC', '2018-09-29', 4),
(10, 'Norway', 'PC', '2018-10-19', 5),
(11, 'Norway', 'TAB', '2018-10-04', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `EAN` varchar(13) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `EAN`, `quantity`, `price`, `order_id`) VALUES
(1, '1234567890123', 11, 10, 1),
(2, '1234567890124', 7, 20, 1),
(3, '1234567890000', 100, 100, 3),
(4, '1234567890000', 5, 10, 2),
(5, '1234567890127', 5, 5, 3),
(6, '1234567890128', 7, 1, 3),
(7, '1234567890129', 1, 89, 3),
(10, '1111111111111', 5, 1, 11),
(11, '1111111111112', 5, 7, 11),
(12, '1111111111113', 5, 5, 5),
(13, '1111111111114', 6, 1000, 6),
(14, '1111111111115', 7, 30, 6),
(15, '1111111111116', 4, 100, 6),
(16, '1111111111117', 4, 1, 6),
(17, '1111111111116', 12, 500, 7),
(18, '1111111111118', 2, 1000, 7),
(19, '1111111111117', 5, 1, 8),
(20, '1111111111117', 6, 500, 9),
(21, '1111111111119', 5, 1000, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `class_name` varchar(32) NOT NULL,
  `title` varchar(65) NOT NULL,
  `description` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`class_name`, `title`, `description`) VALUES
('Customer', 'Customers', 'Total number of customers'),
('Home', 'My test', 'This is my test'),
('Order', 'Orders', 'Total number of orders'),
('Revenue', 'Revenues', 'Total number of revenue');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_fk` (`customer_id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_fk` (`order_id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD UNIQUE KEY `pages_unq_idx` (`class_name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
