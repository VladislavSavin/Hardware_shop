-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 25 2024 г., 11:12
-- Версия сервера: 5.7.39
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `savinvzf_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Cart`
--

CREATE TABLE `Cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Cart`
--

INSERT INTO `Cart` (`id`, `user_id`, `product_id`) VALUES
(2, 2, 11),
(3, 2, 4),
(20, 2, 6),
(21, 2, 45),
(22, 2, 15),
(23, 2, 22),
(28, 1, 10),
(31, 4, 4),
(35, 1, 26),
(36, 1, 11),
(37, 5, 1),
(38, 1, 1),
(45, 6, 1),
(52, 1, 2),
(53, 1, 3),
(54, 1, 16),
(55, 1, 43);

-- --------------------------------------------------------

--
-- Структура таблицы `Products`
--

CREATE TABLE `Products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `cost` decimal(8,2) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Products`
--

INSERT INTO `Products` (`product_id`, `name`, `photo`, `cost`, `type`) VALUES
(1, 'Apple AirPods Pro 2', '..\\products_photo\\apple_airpodsPro2.png', '21999.90', 'Наушники'),
(2, 'Apple Iphone 11', '..\\products_photo\\apple_iphone11.png', '43990.90', 'Смартфон'),
(3, 'Apple Iphone13', '..\\products_photo\\apple_iphone13.png', '57990.90', 'Смартфон'),
(4, 'Apple Iphone14', '..\\products_photo\\apple_iphone14.png', '67990.90', 'Смартфон'),
(5, 'Honor 200', '..\\products_photo\\honor_200.png', '59990.90', 'Смартфон'),
(6, 'Honor Magic 6 Pro', '..\\products_photo\\honor_mag6pro.png', '87990.90', 'Смартфон'),
(7, 'Атомная бомба С4', '..\\products_photo\\bomba.png', '227990.90', 'Смартфон'),
(8, 'Honor X9b', '..\\products_photo\\honor_X9b.png', '39990.90', 'Смартфон'),
(9, 'Huawei 12S', '..\\products_photo\\hu_12s.png', '29990.90', 'Смартфон'),
(10, 'Huawei Pura 70', '..\\products_photo\\hu_pura70.png', '49990.90', 'Смартфон'),
(11, 'Huawei Y72', '..\\products_photo\\hu_y72.png', '8990.90', 'Смартфон'),
(12, 'Samsung a15', '..\\products_photo\\sam_a15.png', '10990.90', 'Смартфон'),
(13, 'Samsung a55', '..\\products_photo\\sam_a55.png', '39990.90', 'Смартфон'),
(14, 'Samsung Galaxy S24 Ultra', '..\\products_photo\\sam_s24ultra.png', '149990.90', 'Смартфон'),
(15, 'Asus Tuf Gaming F15', '..\\products_photo\\asus_tuf.png', '89990.90', 'Ноутбук'),
(16, 'Apple Macbook Air', '..\\products_photo\\apple_macAir.png', '79990.90', 'Ноутбук'),
(17, 'Apple Macbook Pro', '..\\products_photo\\apple_macPro.png', '97990.90', 'Ноутбук'),
(18, 'Asus Rog Q15', '..\\products_photo\\asus_rog.png', '149990.90', 'Ноутбук'),
(19, 'Asus Tuf Gaming F15', '..\\products_photo\\asus_tuf.png', '72490.90', 'Ноутбук'),
(20, 'Asus Vivobook14', '..\\products_photo\\asus_vivobook.png', '34990.90', 'Ноутбук'),
(21, 'Honor Magicbook 14', '..\\products_photo\\honor_mag14.png', '68990.90', 'Ноутбук'),
(22, 'Apple Watch Series 9', '..\\products_photo\\apple_watchSeries9.png', '38990.90', 'Часы'),
(23, 'Apple Watch SE', '..\\products_photo\\apple_watchSE.png', '36990.90', 'Часы'),
(24, 'Honor Magicbook 15', '..\\products_photo\\honor_mag15.png', '78990.90', 'Ноутбук'),
(25, 'Honor Magicbook X16', '..\\products_photo\\honor_magX16.png', '82990.90', 'Ноутбук'),
(26, 'Huawei Watch 4 Pro', '..\\products_photo\\hu_4pro.png', '36990.90', 'Часы'),
(27, 'Huawei Fit 3', '..\\products_photo\\hu_fit3.png', '3490.90', 'Часы'),
(28, 'Huawei Freebuds SE2', '..\\products_photo\\hu_frebudsSE2.png', '3990.90', 'Наушники'),
(29, 'Huawei Freebuds 5i', '..\\products_photo\\hu_freebuds5i.png', '4990.90', 'Наушники'),
(30, 'Huawei Watch GT 4', '..\\products_photo\\hu_gt4.png', '32990.90', 'Часы'),
(31, 'Huawei Matebook 16S', '..\\products_photo\\hu_matebook16s.png', '65990.90', 'Ноутбук'),
(32, 'Huawei Matebook D15', '..\\products_photo\\hu_matebookD15.png', '58990.90', 'Ноутбук'),
(33, 'Huawei Matebook D16', '..\\products_photo\\hu_matebookD16.png', '61990.90', 'Ноутбук'),
(34, 'Lenovo IdeaPad 1', '..\\products_photo\\len_Ideapad1.png', '40990.90', 'Ноутбук'),
(35, 'Lenovo LOQ', '..\\products_photo\\len_LOQ.png', '29990.90', 'Ноутбук'),
(36, 'Lenovo V15', '..\\products_photo\\len_V15.png', '49990.90', 'Ноутбук'),
(37, 'Samsung GalaxyBuds 2 Pro', '..\\products_photo\\sam_galaxybuds2pro.png', '17990.90', 'Наушники'),
(38, 'Samsung Galaxy Buds 3 Pro', '..\\products_photo\\sam_galaxybuds3pro.png', '27990.90', 'Наушники'),
(39, 'Samsung Galaxy Tab A9+', '\\products_photo\\sam_galaxytabA9+.png', '25990.90', 'Планшет'),
(40, 'Samsung Galaxy Tab S9+', '..\\products_photo\\sam_galaxytabS9+.png', '64990.90', 'Планшет'),
(41, 'Samsung Galaxy Tab S9 FE', '..\\products_photo\\sam_galaxytabS9fe.png', '53990.90', 'Планшет'),
(42, 'Xiaomi Samart Mi Band 8 Pro', '..\\products_photo\\xiaomi_smartband8pro.png', '5690.90', 'Часы'),
(43, 'Xiaomi Smart Mi Band 9', '..\\products_photo\\xiaomi_smartband9.png', '4590.90', 'Часы'),
(44, 'Xiaomi Smart Mi Band 8', '..\\products_photo\\xiaomi_smartbnd8.png', '3590.90', 'Часы'),
(45, 'Xiaomi 14 Ultra', '..\\products_photo\\xiomi_14ultra.png', '109990.90', 'Смартфон'),
(46, 'Xiaomi Redmi Note 13', '..\\products_photo\\xiomi_redminote13.png', '34990.90', 'Смартфон'),
(47, 'Xiaomi Redmi Note 13 Pro', '..\\products_photo\\xiomi_redminote13pro.png', '38990.90', 'Смартфон');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`user_id`, `name`, `login`, `password`) VALUES
(1, 'user1', 'user1', '$2y$10$5cAIHB1qzoA.dh6ea4dZWeokHdsReHN1UYn3dKo8DihQx1O2K4UdW'),
(2, 'user2', 'user2', '$2y$10$I0MQnUNtae2R5HvRKDztVeOnJkT1IMjb5eMH9oc7Nez7hjKwaluo2'),
(3, 'ussserrr', 'ussserrr', '$2y$10$eDq1UM5JOTnH/JMUzD.VauHRy49AB//gqQFlm/Wz4DlYuoa1QV5uK'),
(4, 'Vladislav', 'Vlad2302', '$2y$10$5jpS/mxj1C9t/26CdVmTCeORRzxTrwHaLMcbp6BLIt2NO017q39wa'),
(5, 'Ярослав', 'sqlmonster', '$2y$10$BAQM.7XLoa7QPyaEHjS23.ZJPcEUArVb0bYfpY02Nn30BdVNdVR7i'),
(6, 'kse', 'ksen', '$2y$10$ArVMmQ4H.dx8A89bAn1muen2fENqol7JDr00/1LeTfJ6P4/lktu9i');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Cart`
--
ALTER TABLE `Cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `Products`
--
ALTER TABLE `Products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `Cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  ADD CONSTRAINT `Cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
