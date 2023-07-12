-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 12 2022 г., 14:02
-- Версия сервера: 5.5.62
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myishop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_group`
--

CREATE TABLE `attribute_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_product`
--

CREATE TABLE `attribute_product` (
  `attr_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `attr_group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'brand_no_image.jpg',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `title`, `alias`, `img`, `keywords`, `description`) VALUES
(1, 'H&M', 'h&m', 'h&m.jpg', 'h&m', 'Шведська компанія, найбільша в Європі роздрібна мережа з торгівлі одягом, штаб-квартири якої знаходяться у Стокгольмі та Нью-Йорку.'),
(2, 'Columbia', 'columbia', 'columbia.jpg', 'columbia', 'Американська компанія, виробник та постачальник одягу для активного відпочинку. Головний офіс розташований у місті Портленді, штат Орегон.'),
(3, 'Mango', 'mango', 'mango.jpg', 'mango', 'Іспанська компанія з дизайну та виготовлення одягу, заснована в Барселоні братами, Ісаком та Нахманом Андіком.'),
(4, 'Zara', 'zara', 'zara.jpg', 'zara', 'Провідна торгова мережа групи компаній Inditex, що належить іспанському магнату Амансіо Ортеге, також є власником таких брендів, як Massimo Dutti, Pull and Bear і т. д.\n');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `parent_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `alias`, `parent_id`, `keywords`, `description`) VALUES
(1, 'Чоловікам', 'men', 0, 'чоловікам', 'чоловікам'),
(2, 'Жінкам', 'women', 0, 'жінкам', 'жінкам'),
(3, 'Куртки', 'kurtki-men', 1, 'куртки', 'куртки'),
(4, 'Пальто', 'palto-men', 1, 'пальто', 'пальто'),
(5, 'Mango', 'mango-men-kurtki', 3, 'mango men', 'mango men'),
(6, 'H&M', 'h&m-men-kurtki', 3, 'h&m men', 'h&m men'),
(7, 'Куртки', 'kurtki-women', 2, 'куртки', 'куртки'),
(8, 'Пальто', 'palto-women', 2, 'пальто', 'пальто'),
(9, 'Парки', 'parki-women', 2, 'парки', 'парки'),
(10, 'Columbia', 'columbia-men-kurtki', 3, 'columbia men ', 'columbia men'),
(11, 'Mango', 'mango-men-palto', 4, 'mango men', 'mango men'),
(12, 'H&M', 'h&m-men-palto', 4, 'h&m men', 'h&m men'),
(13, 'Columbia', 'columbia-women-kurtka', 7, 'columbia women ', 'columbia women '),
(14, 'Mango', 'mango-women-kurtka', 7, 'mango women ', 'mango women '),
(15, 'H&M', 'h&m-women-kurtka', 7, 'h&m women ', 'h&m women '),
(16, 'Zara', 'zara-women-kurtka', 7, 'zara women ', 'zara women '),
(17, 'Mango', 'mango-women-palto', 8, 'mango women ', 'mango women '),
(18, 'H&M', 'h&m-women-palto', 8, 'h&m women ', 'h&m women '),
(19, 'Zara', 'zara-women-palto', 8, 'zara women ', 'zara women '),
(20, 'Mango', 'mango-women-parka', 9, 'mango women ', 'mango women '),
(21, 'H&M', 'h&m-women-parka', 9, 'h&m women ', 'h&m women ');

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE `currency` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `code` varchar(3) NOT NULL,
  `symbol_left` varchar(10) NOT NULL,
  `symbol_right` varchar(10) NOT NULL,
  `value` float(15,2) NOT NULL,
  `base` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `title`, `code`, `symbol_left`, `symbol_right`, `value`, `base`) VALUES
(1, 'гривня', 'UAH', '', ' грн.', 27.20, '0'),
(2, 'долар', 'USD', '$ ', '', 1.00, '1'),
(3, 'євро', 'EUR', '€ ', '', 0.88, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `modification`
--

CREATE TABLE `modification` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order_`
--

CREATE TABLE `order_` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  `currency` varchar(10) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `brand_id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `content` text,
  `price` float NOT NULL DEFAULT '0',
  `old_price` float NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'no_image.jpg',
  `hit` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `brand_id`, `title`, `alias`, `content`, `price`, `old_price`, `status`, `keywords`, `description`, `img`, `hit`) VALUES
(1, 11, 3, 'Пальто UTAH', 'mango-men-palto-utah', 'Пальто із м\'якого сумішевого текстилю. До складу входить перероблена шерсть. Деталі: застібка на ґудзиках, прямий фасон, комір з лацканами, довгі рукави, з обох боків дві кишені, шліци, підкладка.', 206, 0, '1', NULL, NULL, 'mango-men-palto-utah.jpg', '1'),
(2, 11, 3, 'Пальто SAVONA', 'mango-men-palto-savona', 'Демісезонне пальто виконане з переробленої вовни суміші. Модель прямого крою. Деталі: капюшон, комір-стійка, застібка на блискавку з вітрозахисною планкою на кнопках, дві кишені з боків, гладка текстильна підкладка.', 198, 0, '1', NULL, NULL, 'mango-men-palto-savona.jpg', '1'),
(3, 5, 3, 'Куртка утеплена GORRY', 'mango-men-kurtka-gorry', 'Утеплена куртка із штучним утеплювачем виконана із стьобаного текстильного матеріалу. Деталі: комір-стійка, застібка на блискавці, 2 внутрішні кишені та 2 зовнішні кишені, тонкий шар утеплювача.', 85, 97, '1', NULL, NULL, 'mango-men-kurtka-gorry.jpg', '1'),
(4, 5, 3, 'Куртка утеплена ASH2', 'mango-men-kurtka-ash2', 'Утеплена куртка прямого силуету виконана з водовідштовхувального текстилю. Деталі: знімний капюшон, комір-стійка, застібка на блискавку з вітрозахисною планкою на кнопках, дві кишені з боків, штучний утеплювач.\n\nСклад: Поліес', 198, 0, '1', NULL, NULL, 'mango-men-kurtka-ash2.jpg', '1'),
(5, 5, 3, 'Куртка MORYS-I', 'mango-men-morys-i', 'Куртка виготовлена ​​з бавовняного вельвету. Модель прямого крою. Деталі: відкладний комір, застібка на ґудзиках, дві втачні кишені з боків, дві накладні нагрудні кишені, обробка зі штучного хутра.', 96, 0, '1', NULL, NULL, 'no_image.jpg', '1'),
(6, 18, 1, 'Пальто 1', 'h&m-women-palto-1', NULL, 200, 0, '1', NULL, NULL, 'no_image.jpg', '1'),
(7, 18, 1, 'Пальто 2', 'h&m-women-palto-2', NULL, 223, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(8, 13, 2, 'Куртка 1', 'columbia-women-kurtka-1', NULL, 300, 0, '1', NULL, NULL, 'no_image.jpg', '1'),
(9, 13, 2, 'Куртка 2', 'columbia-women-kurtka-2', NULL, 260, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(10, 19, 4, 'Пальто 3', 'zara-women-palto-3', NULL, 225, 0, '1', NULL, NULL, 'no_image.jpg', '1'),
(11, 19, 4, 'Пальто 4', 'zara-women-palto-4', NULL, 221, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(12, 20, 3, 'Парка 1', 'mango-women-parka-1', NULL, 205, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(13, 20, 3, 'Парка 2', 'mango-women-parka-2', NULL, 249, 0, '1', NULL, NULL, 'no_image.jpg', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `related_product`
--

CREATE TABLE `related_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `related_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attribute_group`
--
ALTER TABLE `attribute_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD PRIMARY KEY (`attr_id`,`product_id`);

--
-- Индексы таблицы `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`value`);

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_`
--
ALTER TABLE `order_`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_ibfk_1` (`order_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `related_product`
--
ALTER TABLE `related_product`
  ADD PRIMARY KEY (`product_id`,`related_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attribute_group`
--
ALTER TABLE `attribute_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `modification`
--
ALTER TABLE `modification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_`
--
ALTER TABLE `order_`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
