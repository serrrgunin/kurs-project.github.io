-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 11 2023 г., 10:50
-- Версия сервера: 10.1.48-MariaDB
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wash`
--

-- --------------------------------------------------------

--
-- Структура таблицы `menu_item`
--

CREATE TABLE `menu_item` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `menu_type` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_item`
--

INSERT INTO `menu_item` (`id`, `link`, `name`, `menu_type`, `class`, `parent`, `sort`) VALUES
(1, '/', 'Главная', 'header', 'nav__list-link', 0, 5),
(2, '/page/services.php', 'Анализы', 'header', 'nav__list-link', 0, 5),
(3, '/page/register.php', 'Регистрация', 'header', 'nav__list-link', 0, 5),
(4, '/page/authorise.php', 'Вход', 'header', 'nav__list-link', 0, 5),
(5, '/page/profile.php', 'Личный кабинет', 'header', 'nav__list-link', 0, 5),
(6, '/admin', 'Админ. панель', 'header', 'nav__list-link', 0, 5),
(7, '/page/logout.php', 'Выйти', 'header', 'nav__list-link', 0, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_type`
--

CREATE TABLE `menu_type` (
  `code` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_type`
--

INSERT INTO `menu_type` (`code`, `name`) VALUES
(1, 'header');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'user', 'Обычный пользователь системы'),
(2, 'admin', 'Администратор системы');

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `img_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `name`, `time`, `description`, `price`, `img_path`) VALUES
(1, 'Приём терапевта ', 20, 'Первичный осмотр и выписка лечения ', '600', 'img/1.jpg'),
(2, 'Приём пульмонолога', 40, 'Первичный осмотр и выписка лечения ', '1000', 'img/2.jpg'),
(3, 'Приём гинеколога ', 30, 'Первичный осмотр и выписка лечения ', '800', 'img/3.jpg'),
(4, 'Приём уролога ', 45, 'Первичный осмотр и выписка лечения', '1300', 'img/4.jpg'),
(5, 'Приём хирурга', 10, 'Первичный осмотр и выписка лечения', '100', '../uploads/8.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `services_cars`
--

CREATE TABLE `services_cars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `img_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `services_cars`
--

INSERT INTO `services_cars` (`id`, `name`, `time`, `description`, `price`, `img_path`) VALUES
(1, 'Анализ крови ', 20, 'На уровень гемоглобина ', '600', 'img/1.jpg'),
(2, 'Анализ мочи ', 40, 'Утром натощак ', '1000', 'img/2.jpg'),
(3, 'Анализ кала ', 30, 'Утром натощак ', '800', 'img/3.jpg'),
(4, 'Анализы по гинекологии ', 45, 'Врач сам скажет, как подготовиться к анализам ', '1300', 'img/4.jpg'),
(5, 'Анализы по урологии', 10, 'Врач сам скажет, как подготовиться к анализам ', '100', '../uploads/8.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `setting`
--

CREATE TABLE `setting` (
  `code` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `setting`
--

INSERT INTO `setting` (`code`, `value`) VALUES
('site_name', 'BestClinic - Медцентр'),
('template', 'BestClinic '),
('phone', '8  (912) 454-92-54 '),
('email', 'besclinic.derbent@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `role` int(11) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `surname`, `birthday`, `role`, `phone`, `order`) VALUES
(10, '1', 'privet', 'Арсений', 'Петров', '2023-12-23', 2, '32', 0),
(12, '2', 'privet', 'Кристина', 'Михайленко', '2023-12-14', 1, '799999999', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_type` (`menu_type`);

--
-- Индексы таблицы `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`code`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services_cars`
--
ALTER TABLE `services_cars`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `services_cars`
--
ALTER TABLE `services_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
