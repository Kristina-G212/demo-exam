-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 21 2025 г., 05:22
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `de`
--

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(25) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'в работе'),
(2, 'выполнено'),
(3, 'отменено');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(25) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `type`) VALUES
(1, 'общий клининг'),
(2, 'генеральная уборка'),
(3, 'послестроительная уборка'),
(4, 'химчистка ковров и мебели'),
(5, 'Иная услуга');

-- --------------------------------------------------------

--
-- Структура таблицы `type_pay`
--

CREATE TABLE `type_pay` (
  `id` int(25) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `type_pay`
--

INSERT INTO `type_pay` (`id`, `type`) VALUES
(1, 'наличные'),
(2, 'банковская карта');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(25) NOT NULL,
  `login` varchar(120) NOT NULL,
  `password` text NOT NULL,
  `fio` varchar(255) NOT NULL,
  `tel` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `fio`, `tel`, `email`) VALUES
(1, '123@sf.ty', '25d55ad283aa400af464c76d713c07ad', 'цауцуа ау цау', '+7(999)-239-92-32', '3e@egr.com'),
(6, '123', '25d55ad283aa400af464c76d713c07ad', 'блабля була ацууцп', '+7(999)-239-92-32', 'login@loin.we'),
(7, '1234', 'e10adc3949ba59abbe56e057f20f883e', 'блабля була ацууцп', '+7(999)-239-92-32', 'login@loin.we'),
(8, 'adminka', 'e25ce9d8bc57a6f5d851d2c0bff36544', 'админ ваще админ', '+7(999)-239-92-32', 'alderava12@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `zay`
--

CREATE TABLE `zay` (
  `id` int(25) NOT NULL,
  `FK_user` int(25) NOT NULL,
  `address` text NOT NULL,
  `tel` text NOT NULL,
  `date` datetime NOT NULL,
  `FK_type` int(25) NOT NULL,
  `FK_type_pay` int(25) NOT NULL,
  `FK_status` int(25) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `admin_comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `zay`
--

INSERT INTO `zay` (`id`, `FK_user`, `address`, `tel`, `date`, `FK_type`, `FK_type_pay`, `FK_status`, `comment`, `admin_comment`) VALUES
(1, 7, 'улица пушкина дом калатушкина', 'date', '0000-00-00 00:00:00', 5, 2, 1, 'мне под дверь насрали', ''),
(2, 7, 'улица пушкина дом калатушкина', 'date', '0000-00-00 00:00:00', 3, 1, 1, '', ''),
(3, 7, 'wef', '2025-05-05 17:2500', '0000-00-00 00:00:00', 2, 1, 3, '', 'неть'),
(4, 7, 'улица пушкина дом калатушкина', '+7(234)-233-23-23', '0000-00-00 00:00:00', 2, 2, 1, '', ''),
(5, 7, 'улица пушкина дом калатушкина', '+7(234)-234-23-23', '2025-06-29 21:28:00', 5, 2, 1, 'ааааААА', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_pay`
--
ALTER TABLE `type_pay`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zay`
--
ALTER TABLE `zay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user` (`FK_user`),
  ADD KEY `FK_type` (`FK_type`),
  ADD KEY `FK_status` (`FK_status`),
  ADD KEY `FK_type_pay` (`FK_type_pay`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `type_pay`
--
ALTER TABLE `type_pay`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `zay`
--
ALTER TABLE `zay`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `zay`
--
ALTER TABLE `zay`
  ADD CONSTRAINT `zay_ibfk_1` FOREIGN KEY (`FK_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `zay_ibfk_2` FOREIGN KEY (`FK_type`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `zay_ibfk_3` FOREIGN KEY (`FK_status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `zay_ibfk_4` FOREIGN KEY (`FK_type_pay`) REFERENCES `type_pay` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
