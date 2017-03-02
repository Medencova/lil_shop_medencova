-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 07 2017 г., 07:28
-- Версия сервера: 5.5.50
-- Версия PHP: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(10) unsigned NOT NULL,
  `goods_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `popularity` int(10) unsigned NOT NULL,
  `goods_category_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `goods_name`, `price`, `description`, `img`, `popularity`, `goods_category_id`) VALUES
(1, 'Ножи', '1256.00', 'Ножи из самой крутой нержавеющей стали. Фор мэн онли.', 'img_1', 0, 1),
(2, 'Полотенца', '1215.00', 'Розовенькие. Пушистенькие. Твои.', 'img_2', 0, 1),
(3, 'Плита', '15494.01', 'Да. Готовить на этой крошке одно удовольствие. Побалуй себя яишенкой.', 'img_3', 0, 1),
(4, 'Разделочные доски', '686.00', 'Поделят твои жизнь на до и после.', 'img_4', 0, 1),
(5, 'Стол', '86553.88', 'Место, за которым происходит все самое важное. В том числе и кормежка.', 'img_5', 0, 2),
(6, 'Стул', '1165.00', 'Усади себя за нечто волшебное.', 'img_6', 0, 2),
(7, 'Диван', '56456.00', 'Пожалуй, лучшее изобретение человечества.\r\nПосле велосипеда.', 'img_7', 0, 2),
(8, 'Поливалка', '1486.00', 'Настолько мощная, что достанет самый дальний цветочек.', 'img_8', 0, 3),
(9, 'Коса', '8686.00', 'Газонокосилка - для девочек. Будь мужчиной.', 'img_9', 0, 3),
(10, 'Лопата', '595495.00', 'Почувствуй себя экскалатором.', 'img_10', 0, 3),
(11, 'Мишка', '3445.00', 'Загладь свою вину правильно.', 'img_11', 0, 4),
(12, 'Мышка', '5667.00', 'Существует на случай, если Мишку ты уже пробовал.', 'img_12', 0, 4),
(13, 'Совушка', '2536.00', 'Удиви девушку и себя!', 'img_13', 0, 4),
(14, 'Хлеб', '453.00', 'Девушка далека, а есть хочется? это для тебя!', 'img_14', 0, 5),
(15, 'Вода', '3435.00', 'Иногда хочется и пить.', 'img_15', 0, 5),
(16, 'Микроволновка', '49887.00', 'Разогрей себе!', 'img_16', 0, 6),
(17, 'Чайник', '1524.00', 'Воду тоже надо греть!', 'img_17', 0, 6),
(18, 'Носовые платки', '686683.00', 'Самые мягкие и заботливые.', 'img_18', 0, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `goods_category`
--

CREATE TABLE IF NOT EXISTS `goods_category` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `goods_category`
--

INSERT INTO `goods_category` (`id`, `title`) VALUES
(1, 'Кухонная утварь'),
(2, 'Мебель'),
(3, 'Садовый инвентарь'),
(4, 'Мягкие игрушки'),
(5, 'Продукты'),
(6, 'Электроприборы'),
(7, 'Без категории');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `user_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`) VALUES
(1, '123', '202cb962ac59075b964b07152d234b70'),
(5, 'dusty', '55560ac161bd72c7a25a53fbb8bba86c'),
(6, 'kati', '05155838d6a9b3ff384a8b247be221b5');

-- --------------------------------------------------------

--
-- Структура таблицы `user_order`
--

CREATE TABLE IF NOT EXISTS `user_order` (
  `goods_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `amount` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user_order`
--

INSERT INTO `user_order` (`goods_id`, `user_id`, `amount`) VALUES
(0, 0, 3),
(1, 6, 3),
(2, 6, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods_category`
--
ALTER TABLE `goods_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`goods_id`,`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `goods_category`
--
ALTER TABLE `goods_category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
