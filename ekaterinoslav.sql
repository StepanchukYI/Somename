-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 10 2017 г., 02:11
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ekaterinoslav`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `idAuthor` int(11) NOT NULL,
  `name` text,
  `biography` text,
  `SinglPhoto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`idAuthor`, `name`, `biography`, `SinglPhoto`) VALUES
(1, 'Александр Леонтьевич Красносельский', 'Александр Леонтьевич Красносельский (1877—1944) — русский и советский архитектор. Внес значительный вклад в формирование архитектурного облика Екатеринослава — Днепропетровска. Спроектировал и построил около 200 зданий и сооружений, 30 из которых — в Днепропетровске.', 'Ekaterinoslav/photo/AuthorPhoto/1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `imageobject`
--

CREATE TABLE `imageobject` (
  `idImage` int(11) NOT NULL,
  `idPlace` int(11) DEFAULT NULL,
  `idAuthor` int(11) DEFAULT NULL,
  `url` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `imageobject`
--

INSERT INTO `imageobject` (`idImage`, `idPlace`, `idAuthor`, `url`) VALUES
(1, NULL, 1, '\\Somename\\photo\\AuthorPhoto');

-- --------------------------------------------------------

--
-- Структура таблицы `location`
--

CREATE TABLE `location` (
  `idLocation` int(11) NOT NULL,
  `idPlace` int(11) DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `location`
--

INSERT INTO `location` (`idLocation`, `idPlace`, `longitude`, `latitude`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `place`
--

CREATE TABLE `place` (
  `idPlace` int(11) NOT NULL,
  `title` text,
  `description` text,
  `SinglPhoto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `place`
--

INSERT INTO `place` (`idPlace`, `title`, `description`, `SinglPhoto`) VALUES
(1, 'АСТОРИЮ', 'Архитектор Виленский работал в Екатеринославе в начале XX века. Нам известны только его инициалы – С.В. В списке жителей Екатеринослава в «адрес-календаре» на 1915 год упомянут «Виленский С. В., ул. Садовая, 15». Улица Садовая – нынешняя Серова. Кем по происхождению был Виленский, какое образование он получил – эти вопросы ждут будущих исследователей. Архитектор совершенно не упоминается в литературе по истории Днепропетровска. Откуда удалось получить новые сведения?\r\n\r\nВ 1914 году в Екатеринославе сос­тоя­лась Первая архитектурно-худо­жест­венная выставка, которую организовала группа местных деятелей – Александр Красносельский, Федор Булацель, Дитрих Тиссен и другие. В «Каталоге» выставки перечислены экспонаты – авторские проекты зданий, чертежи, картины. В каталоге указано, что «С.В. Виленский» руководил собственным строительным бюро. Перечислен список проектов Виленского – маленькая краеведческая сенсация. Это доходный дом Анд­риевских, фасады домов Первого Екатерино­славского домостроительного общества и даже гостиница «Астория». Каталог выставки утвержден организаторами, поэтому сомневаться в достоверности материалов не приходится.', 'Ekaterinoslav/photo/PlacePhoto/1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `placeauthor`
--

CREATE TABLE `placeauthor` (
  `idPlaceAuthor` int(11) NOT NULL,
  `idPlace` int(11) DEFAULT NULL,
  `idAuthor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `placeauthor`
--

INSERT INTO `placeauthor` (`idPlaceAuthor`, `idPlace`, `idAuthor`) VALUES
(1, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`idAuthor`),
  ADD UNIQUE KEY `Author_idAuthor_uindex` (`idAuthor`);

--
-- Индексы таблицы `imageobject`
--
ALTER TABLE `imageobject`
  ADD PRIMARY KEY (`idImage`),
  ADD UNIQUE KEY `ImageObject_idImage_uindex` (`idImage`);

--
-- Индексы таблицы `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`idLocation`),
  ADD UNIQUE KEY `Location_idLocation_uindex` (`idLocation`);

--
-- Индексы таблицы `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`idPlace`),
  ADD UNIQUE KEY `Place_idPlace_uindex` (`idPlace`);

--
-- Индексы таблицы `placeauthor`
--
ALTER TABLE `placeauthor`
  ADD PRIMARY KEY (`idPlaceAuthor`),
  ADD UNIQUE KEY `PlaceAuthor_idPlaceAuthor_uindex` (`idPlaceAuthor`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `idAuthor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `imageobject`
--
ALTER TABLE `imageobject`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `location`
--
ALTER TABLE `location`
  MODIFY `idLocation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `place`
--
ALTER TABLE `place`
  MODIFY `idPlace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `placeauthor`
--
ALTER TABLE `placeauthor`
  MODIFY `idPlaceAuthor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
