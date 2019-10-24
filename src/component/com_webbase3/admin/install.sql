-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 24 2019 г., 04:41
-- Версия сервера: 10.3.17-MariaDB-0+deb10u1
-- Версия PHP: 7.3.9-1+0~20190902.44+debian10~1.gbpf8534c

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webbase3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_libs`
--

CREATE TABLE `wb3_libs` (
  `wb3_id` int(11) NOT NULL,
  `wb3_patch` varchar(1024) NOT NULL,
  `wb3_order` int(11) NOT NULL,
  `wb3_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `wb3_libs`
--

INSERT INTO `wb3_libs` (`wb3_id`, `wb3_patch`, `wb3_order`, `wb3_active`) VALUES
(1, '<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">', 1, 1),
(2, '<script src=\"https://use.fontawesome.com/releases/v5.11.2/js/all.js\" data-auto-replace-svg=\"nest\"></script>\r\n\r\n', 2, 1),
(3, '<link href=\"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css\" rel=\"stylesheet\" />', 3, 1),
(5, '<script src=\"https://code.jquery.com/jquery-3.4.1.min.js\"></script>', 5, 1),
(6, '<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>', 6, 1),
(7, '<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>', 7, 1),
(8, '<script src=\"https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js\"></script>', 8, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_log`
--

CREATE TABLE `wb3_log` (
  `id` int(11) NOT NULL,
  `log_group` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wb3_log`
--

INSERT INTO `wb3_log` (`id`, `log_group`) VALUES
(1, 'Системный');

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_log_history`
--

CREATE TABLE `wb3_log_history` (
  `wb3_id` int(11) NOT NULL,
  `wb3_log_id` int(11) NOT NULL,
  `wb3_method` varchar(64) NOT NULL,
  `wb3_table` varchar(64) NOT NULL,
  `wb3_data` varbinary(60000) NOT NULL,
  `wb3_date` datetime NOT NULL DEFAULT current_timestamp(),
  `wb3_result` int(11) NOT NULL,
  `wb3_user` int(11) NOT NULL,
  `wb3_stream` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `wb3_log_history`
--

INSERT INTO `wb3_log_history` (`wb3_id`, `wb3_log_id`, `wb3_method`, `wb3_table`, `wb3_data`, `wb3_date`, `wb3_result`, `wb3_user`, `wb3_stream`) VALUES
(1, 1, 'update', 'wb3_scheme', 0x7b226669656c64223a227762335f6e616d65222c2276616c7565223a22d093d180d183d0bfd0bfd18b20d181d185d0b5d0bc31222c226b6579223a227762335f6964222c226964223a2231227d, '2019-10-24 04:06:38', 0, 988, 0),
(2, 1, 'update', 'wb3_scheme', 0x7b226669656c64223a227762335f6e616d65222c2276616c7565223a22d093d180d183d0bfd0bfd18b20d181d185d0b5d0bc222c226b6579223a227762335f6964222c226964223a2231227d, '2019-10-24 04:07:17', 0, 988, 0),
(3, 1, 'update', 'wb3_scheme', 0x7b226669656c64223a227762335f6e616d65222c2276616c7565223a22d0a1d0b8d181d182d0b5d0bcd0bdd18bd0b920d0bbd0bed0b32028d0a2d0b0d0b1d0bbd0b8d186d18b29222c226b6579223a227762335f6964222c226964223a223738227d, '2019-10-24 04:07:55', 0, 988, 0),
(4, 1, 'update', 'wb3_scheme', 0x7b226669656c64223a227762335f6e616d65222c2276616c7565223a22d0a1d0b8d181d182d0b5d0bcd0bdd18bd0b920d0bbd0bed0b320222c226b6579223a227762335f6964222c226964223a223234227d, '2019-10-24 04:08:02', 0, 988, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_log_list`
--

CREATE TABLE `wb3_log_list` (
  `wb3_id` int(11) NOT NULL,
  `wb3_log_id` int(11) NOT NULL,
  `wb3_database` varchar(128) NOT NULL,
  `wb3_table` varchar(128) NOT NULL,
  `wb3_active` int(11) NOT NULL,
  `wb3_stream` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `wb3_log_list`
--

INSERT INTO `wb3_log_list` (`wb3_id`, `wb3_log_id`, `wb3_database`, `wb3_table`, `wb3_active`, `wb3_stream`) VALUES
(1, 1, '', 'wb3_scheme', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_menu`
--

CREATE TABLE `wb3_menu` (
  `wb3_id` int(11) NOT NULL,
  `wb3_child` int(11) DEFAULT NULL,
  `wb3_group` int(11) DEFAULT NULL,
  `wb3_link_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wb3_menu`
--

INSERT INTO `wb3_menu` (`wb3_id`, `wb3_child`, `wb3_group`, `wb3_link_id`) VALUES
(1, 0, 8, 1),
(2, 1, 8, 2),
(3, 1, 8, 3),
(4, 5, 8, 4),
(5, 0, 8, 5),
(6, 1, 8, 6),
(7, 1, 8, 7),
(46, 1, 8, 8),
(47, 1, 8, 9),
(48, 1, 8, 10),
(49, 1, 8, 11),
(102, 5, 8, 19),
(105, 5, 8, 67);

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_menu_links`
--

CREATE TABLE `wb3_menu_links` (
  `wb3_id` int(11) NOT NULL,
  `wb3_name` varchar(128) NOT NULL,
  `wb3_link` varchar(1024) NOT NULL,
  `wb3_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wb3_menu_links`
--

INSERT INTO `wb3_menu_links` (`wb3_id`, `wb3_name`, `wb3_link`, `wb3_order`) VALUES
(1, 'Конструктор', '', 0),
(2, 'Группы схем', 'index.php?option=com_webbase3&format=raw&view=wb3_viewport&wb3_scheme=1', 1),
(3, 'Ссылки меню', 'index.php?option=com_webbase3&format=raw&view=wb3_viewport&wb3_scheme=7', 5),
(4, 'Группы пользователей', 'index.php?option=com_webbase3&format=raw&view=wb3_viewport&wb3_scheme=8', 1),
(5, 'Система', '', 1),
(6, 'Плагины отображения', 'index.php?option=com_webbase3&format=raw&view=wb3_viewport&wb3_scheme=6', 7),
(7, 'Плагины ввода', 'index.php?option=com_webbase3&format=raw&view=wb3_viewport&wb3_scheme=5', 7),
(8, 'Связи схем', 'index.php?option=com_webbase3&format=raw&view=wb3_viewport&wb3_scheme=10', 2),
(9, 'Плагины данных', 'index.php?option=com_webbase3&format=raw&view=wb3_viewport&wb3_scheme=11', 7),
(10, 'Плагины данных - Схема', 'index.php?option=com_webbase3&format=raw&view=wb3_viewport&wb3_scheme=12', 7),
(11, 'Параметры схем (справочник)', 'index.php?option=com_webbase3&format=raw&view=wb3_viewport&wb3_scheme=14', 2),
(12, 'Системный лог (История)', 'index.php?option=com_webbase3&format=raw&view=wb3_viewport&wb3_scheme=16', 2),
(13, 'База товаров', '', 3),
(19, 'Системный лог', 'index.php?option=com_webbase3&format=raw&view=wb3_viewport&wb3_scheme=24', 0),
(20, 'Сайты', '', 2),
(67, 'Библиотеки js/css', 'index.php?option=com_webbase3&format=raw&view=wb3_viewport&wb3_scheme=84', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_plugin_data`
--

CREATE TABLE `wb3_plugin_data` (
  `wb3_id` int(11) NOT NULL,
  `wb3_name` varchar(1024) NOT NULL,
  `wb3_function` varchar(128) NOT NULL,
  `wb3_comment` varchar(1024) NOT NULL,
  `wb3_active` int(11) NOT NULL DEFAULT 0,
  `wb3_busy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_plugin_input`
--

CREATE TABLE `wb3_plugin_input` (
  `wb3_id` int(11) NOT NULL,
  `wb3_name` varchar(128) NOT NULL,
  `wb3_function` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wb3_plugin_input`
--

INSERT INTO `wb3_plugin_input` (`wb3_id`, `wb3_name`, `wb3_function`) VALUES
(1, 'Строка', 'wb3_input'),
(3, 'Список БД', 'wb3_database'),
(4, 'Поля БД', 'wb3_dbfields'),
(5, 'Таблицы БД', 'wb3_dbtables'),
(6, 'Отметка', 'wb3_checkbox'),
(7, 'Связанный список', 'wb3_select2'),
(8, 'Скрытый', 'wb3_hidden'),
(10, 'Текст', 'wb3_textarea');

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_plugin_rights`
--

CREATE TABLE `wb3_plugin_rights` (
  `wb3_id` int(11) NOT NULL,
  `wb3_plugin_id` int(11) NOT NULL,
  `wb3_access` int(11) NOT NULL,
  `wb3_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_plugin_view`
--

CREATE TABLE `wb3_plugin_view` (
  `wb3_id` int(11) NOT NULL,
  `wb3_name` varchar(128) NOT NULL,
  `wb3_function` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wb3_plugin_view`
--

INSERT INTO `wb3_plugin_view` (`wb3_id`, `wb3_name`, `wb3_function`) VALUES
(1, 'Текст', 'wb3_text'),
(2, 'Иконка FA', 'wb3_faico'),
(3, 'Отметка', 'wb3_checkbox'),
(4, 'Длинный текст', 'wb3_longtext'),
(5, 'Миниатюра', 'wb3_photo'),
(6, 'Цена', 'wb3_textprice'),
(8, 'Пароль', 'wb3_password'),
(9, 'Связанный текст', 'wb3_textjoin'),
(10, 'Текст HTML', 'wb3_texthtml');

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_scheme`
--

CREATE TABLE `wb3_scheme` (
  `wb3_id` int(11) NOT NULL,
  `wb3_name` varchar(1024) NOT NULL,
  `wb3_group_id` int(11) NOT NULL,
  `wb3_faico` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wb3_scheme`
--

INSERT INTO `wb3_scheme` (`wb3_id`, `wb3_name`, `wb3_group_id`, `wb3_faico`) VALUES
(1, 'Группы схем', 1, 'far fa-object-group'),
(2, 'Схемы', 1, 'fas fa-vector-square'),
(3, 'Поля схем', 1, 'fas fa-columns'),
(5, 'Плагины ввода', 1, 'fas fa-puzzle-piece'),
(6, 'Плагины отображения', 1, 'fas fa-puzzle-piece'),
(7, 'Ссылки меню', 1, 'fas fa-link'),
(8, 'Группы пользователей', 2, 'fas fa-users'),
(9, 'Меню групп', 2, 'fas fa-bars'),
(10, 'Связи схем', 1, 'fas fa-link'),
(11, 'Плагины данных', 1, 'fas fa-puzzle-piece'),
(12, 'Связи плагин-схема ', 1, 'fas fa-link'),
(13, 'Права схем', 2, 'fas fa-key'),
(14, 'Параметры схем (справочник)', 1, 'fas fa-sliders-h'),
(15, 'Связи Параметр - Схема ', 1, 'fas fa-link'),
(16, 'Системный лог (История)', 2, 'fas fa-clipboard-list'),
(17, 'Права плагинов', 2, 'fas fa-key'),
(24, 'Системный лог ', 2, 'fas fa-clipboard-list'),
(78, 'Системный лог (Таблицы)', 2, 'fas fa-clipboard-list'),
(84, 'Библиотеки js/css', 1, 'fas fa-puzzle-piece');

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_scheme_fields`
--

CREATE TABLE `wb3_scheme_fields` (
  `wb3_id` int(11) NOT NULL,
  `wb3_scheme_id` int(11) DEFAULT NULL,
  `wb3_title` varchar(512) DEFAULT NULL,
  `wb3_base` varchar(512) DEFAULT NULL,
  `wb3_table` varchar(512) DEFAULT NULL,
  `wb3_field` varchar(128) DEFAULT NULL,
  `wb3_key` tinyint(1) DEFAULT NULL,
  `wb3_input_view` int(11) DEFAULT NULL,
  `wb3_input_edit` int(11) DEFAULT NULL,
  `wb3_input_add` int(11) DEFAULT NULL,
  `wb3_ordering` int(11) DEFAULT NULL,
  `wb3_base_slave` varchar(128) DEFAULT NULL,
  `wb3_table_slave` varchar(128) DEFAULT NULL,
  `wb3_field_slave` varchar(128) DEFAULT NULL,
  `wb3_key_slave` varchar(128) DEFAULT NULL,
  `wb3_searchable` tinyint(1) DEFAULT NULL,
  `wb3_unique` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wb3_scheme_fields`
--

INSERT INTO `wb3_scheme_fields` (`wb3_id`, `wb3_scheme_id`, `wb3_title`, `wb3_base`, `wb3_table`, `wb3_field`, `wb3_key`, `wb3_input_view`, `wb3_input_edit`, `wb3_input_add`, `wb3_ordering`, `wb3_base_slave`, `wb3_table_slave`, `wb3_field_slave`, `wb3_key_slave`, `wb3_searchable`, `wb3_unique`) VALUES
(1, 1, '#', '', 'wb3_scheme_group', 'wb3_id', 1, 1, 1, 0, 0, '', '', '', '', 0, 0),
(2, 1, 'Название', '', 'wb3_scheme_group', 'wb3_name', 0, 1, 1, 1, 2, '', '', '', '', 0, 0),
(3, 1, 'Описание', '', 'wb3_scheme_group', 'wb3_desc', 0, 1, 1, 1, 3, '', '', '', '', 0, 0),
(4, 1, 'Иконка', '', 'wb3_scheme_group', 'wb3_faico', 0, 2, 1, 1, 1, '', '', '', '', 0, 0),
(5, 2, '#', '', 'wb3_scheme', 'wb3_id', 1, 1, 1, 0, 0, '', '', '', '', 0, 0),
(6, 2, 'Название', '', 'wb3_scheme', 'wb3_name', 0, 1, 1, 1, 0, '', '', '', '', 0, 0),
(7, 2, 'Группа', '', 'wb3_scheme', 'wb3_group_id', 0, 1, 7, 7, 0, '', 'wb3_scheme_group', 'wb3_name', 'wb3_id', 0, 0),
(8, 2, 'Иконка', '', 'wb3_scheme', 'wb3_faico', 0, 2, 1, 1, 0, '', '', '', '', 0, 0),
(9, 3, '#', '', 'wb3_scheme_fields', 'wb3_id', 1, 1, 0, 0, 0, '', '', '', '', 0, 0),
(10, 3, 'Схема', '', 'wb3_scheme_fields', 'wb3_scheme_id', 0, 1, 7, 7, 0, '', 'wb3_scheme', 'wb3_name', 'wb3_id', 1, 0),
(11, 3, 'Заголовок', '', 'wb3_scheme_fields', 'wb3_title', 0, 1, 1, 1, 0, '', '', '', '', 0, 0),
(12, 3, 'База', '', 'wb3_scheme_fields', 'wb3_base', 0, 1, 3, 3, 0, '', '', '', '', 0, 0),
(13, 3, 'Таблица', '', 'wb3_scheme_fields', 'wb3_table', 0, 1, 5, 5, 0, '', '', '', '', 0, 0),
(14, 3, 'Поле', '', 'wb3_scheme_fields', 'wb3_field', 0, 1, 4, 4, 0, '', '', '', '', 1, 0),
(15, 3, 'Ключ', '', 'wb3_scheme_fields', 'wb3_key', 0, 3, 6, 6, 0, '', '', '', '', 0, 0),
(16, 3, 'Вид', '', 'wb3_scheme_fields', 'wb3_input_view', 0, 1, 7, 7, 0, '', 'wb3_plugin_view', 'wb3_name', 'wb3_id', 0, 0),
(17, 3, 'Изменить', '', 'wb3_scheme_fields', 'wb3_input_edit', 0, 1, 7, 7, 0, '', 'wb3_plugin_input', 'wb3_name', 'wb3_id', 0, 0),
(18, 3, 'Добавить', '', 'wb3_scheme_fields', 'wb3_input_add', 0, 1, 7, 7, 0, '', 'wb3_plugin_input', 'wb3_name', 'wb3_id', 0, 0),
(19, 3, 'Порядок', '', 'wb3_scheme_fields', 'wb3_ordering', 0, 1, 1, 1, 0, '', '', '', '', 0, 0),
(20, 3, 'База (слейв)', '', 'wb3_scheme_fields', 'wb3_base_slave', 0, 1, 3, 3, 0, '', '', '', '', 0, 0),
(21, 3, 'Таблица (слейв)', '', 'wb3_scheme_fields', 'wb3_table_slave', 0, 1, 1, 1, 0, '', '', '', '', 0, 0),
(22, 3, 'Поле (слейв)', '', 'wb3_scheme_fields', 'wb3_field_slave', 0, 1, 1, 1, 0, '', '', '', '', 0, 0),
(23, 3, 'Ключ (лейв)', '', 'wb3_scheme_fields', 'wb3_key_slave', 0, 1, 4, 4, 0, '', '', '', '', 0, 0),
(24, 3, 'Искать', '', 'wb3_scheme_fields', 'wb3_searchable', 0, 3, 6, 6, 0, '', '', '', '', 0, 0),
(25, 3, 'Уникальное', '', 'wb3_scheme_fields', 'wb3_unique', 0, 3, 6, 6, 0, '', '', '', '', 0, 0),
(26, 5, '#', '', 'wb3_plugin_input', 'wb3_id', 1, 1, 0, 0, 0, '', '', '', '', 0, 0),
(27, 5, 'Название', '', 'wb3_plugin_input', 'wb3_name', 0, 1, 1, 1, 0, '', '', '', '', 0, 0),
(28, 5, 'Функция', '', 'wb3_plugin_input', 'wb3_function', 0, 1, 1, 1, 0, '', '', '', '', 0, 0),
(29, 7, '#', '', 'wb3_menu_links', 'wb3_id', 1, 1, 0, 0, 0, '', '', '', '', 0, 0),
(30, 7, 'Имя', '', 'wb3_menu_links', 'wb3_name', 0, 1, 1, 1, 1, '', '', '', '', 0, 0),
(31, 7, 'Ссылка', '', 'wb3_menu_links', 'wb3_link', 0, 1, 1, 1, 3, '', '', '', '', 0, 0),
(32, 8, '#', '', '#__usergroups', 'id', 1, 1, 0, 0, 0, '', '', '', '', 0, 0),
(33, 8, 'Группа', '', '#__usergroups', 'title', 0, 1, 0, 0, 0, '', '', '', '', 0, 0),
(34, 9, '#', '', 'wb3_menu', 'wb3_id', 1, 1, 0, 0, 0, '', '', '', '', 0, 0),
(36, 9, 'Потомок', '', 'wb3_menu', 'wb3_child', 0, 1, 7, 7, 0, '', 'wb3_menu', 'wb3_id', 'wb3_id', 0, 0),
(37, 9, 'Группа', '', 'wb3_menu', 'wb3_group', 0, 1, 7, 7, 0, '', '#__usergroups', 'title', 'id', 0, 0),
(38, 9, 'Ссылка', '', 'wb3_menu', 'wb3_link_id', 0, 1, 7, 7, 0, '', 'wb3_menu_links', 'wb3_name', 'wb3_id', 0, 0),
(39, 6, '#', '', 'wb3_plugin_view', 'wb3_id', 1, 1, 0, 0, 0, '', '', '', '', 0, 0),
(40, 6, 'wb3_name', '', 'wb3_plugin_view', 'wb3_name', 0, 1, 1, 1, 0, '', '', '', '', 0, 0),
(41, 6, 'wb3_function', '', 'wb3_plugin_view', 'wb3_function', 0, 1, 1, 1, 0, '', '', '', '', 0, 0),
(42, 10, '#', NULL, 'wb3_scheme_link', 'wb3_id', 1, 1, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 10, 'wb3_master_id', '', 'wb3_scheme_link', 'wb3_master_id', 0, 1, 1, 1, 1, '', '', '', '', 0, 0),
(44, 10, 'wb3_slave_id', NULL, 'wb3_scheme_link', 'wb3_slave_id', NULL, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 10, 'wb3_description', NULL, 'wb3_scheme_link', 'wb3_description', NULL, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 11, '#', NULL, 'wb3_plugin_data', 'wb3_id', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 11, 'Название', NULL, 'wb3_plugin_data', 'wb3_name', 0, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 11, 'Папка плагина', NULL, 'wb3_plugin_data', 'wb3_function', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 11, 'Комментарий', NULL, 'wb3_plugin_data', 'wb3_comment', NULL, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 11, 'Активен', NULL, 'wb3_plugin_data', 'wb3_active', NULL, 3, 6, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 12, '#', NULL, 'wb3_scheme_plugin_links', 'wb3_id', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 12, 'Плагин', NULL, 'wb3_scheme_plugin_links', 'wb3_plugin_id', NULL, 1, 7, 7, NULL, NULL, 'wb3_plugin_data', 'wb3_name', 'wb3_id', NULL, NULL),
(53, 12, 'Схема', NULL, 'wb3_scheme_plugin_links', 'wb3_scheme_id', NULL, 1, 7, 7, NULL, NULL, 'wb3_scheme', 'wb3_name', 'wb3_id', NULL, NULL),
(60, 13, '#', '', 'wb3_scheme_rights', 'wb3_id', 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 13, 'Группа пользователей', '', 'wb3_scheme_rights', 'wb3_group_id', 0, 1, 1, 1, 1, NULL, '#__usergroups', 'title', 'id', NULL, NULL),
(62, 13, 'Схема', '', 'wb3_scheme_rights', 'wb3_scheme_id', 0, 1, 7, 7, 2, NULL, 'wb3_scheme', 'wb3_name', 'wb3_id', NULL, NULL),
(63, 13, 'Чтение', '', 'wb3_scheme_rights', 'wb3_r', 0, 3, 6, 6, 3, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 13, 'Запись', '', 'wb3_scheme_rights', 'wb3_w', 0, 3, 6, 6, 4, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 13, 'Удаление', '', 'wb3_scheme_rights', 'wb3_x', 0, 3, 6, 6, 5, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 14, '#', '', 'wb3_scheme_params', 'wb3_id', 1, 1, 0, 0, 0, '', '', '', '', 0, 0),
(67, 14, 'Имя', '', 'wb3_scheme_params', 'wb3_name', 0, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 14, 'Описание', '', 'wb3_scheme_params', 'wb3_desc', 0, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 14, 'Ключ', NULL, 'wb3_scheme_params', 'wb3_key', NULL, 1, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 15, '#', '', 'wb3_scheme_params_link', 'wb3_id', 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 15, 'Схема', '', 'wb3_scheme_params_link', 'wb3_scheme_id', 0, 1, 7, 7, 1, NULL, 'wb3_scheme', 'wb3_name', 'wb3_id', NULL, NULL),
(72, 15, 'Параметр', '', 'wb3_scheme_params_link', 'wb3_param_id', 0, 1, 7, 7, 2, NULL, 'wb3_scheme_params', 'wb3_name', 'wb3_id', NULL, NULL),
(73, 15, 'Значение', '', 'wb3_scheme_params_link', 'wb3_value', 0, 1, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 17, '#', '', 'wb3_plugin_rights', 'wb3_id', 1, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 17, 'Плагин', '', 'wb3_plugin_rights', 'wb3_plugin_id', 0, 1, 7, 7, 1, '', 'wb3_plugin_data', 'wb3_name', 'wb3_id', 0, 0),
(84, 17, 'Доступен', '', 'wb3_plugin_rights', 'wb3_access', 0, 3, 6, 6, 2, '', '', '', '', 0, 0),
(85, 17, 'Группа', '', 'wb3_plugin_rights', 'wb3_group_id', 0, 1, 7, 7, 3, NULL, '#__usergroups', 'title', 'id', NULL, NULL),
(143, 24, 'id', '', 'wb3_log', 'id', 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 24, 'Группа логирования', '', 'wb3_log', 'log_group', 0, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 7, 'Порядок', NULL, 'wb3_menu_links', 'wb3_order', NULL, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(430, 78, '#', '', 'wb3_log_list', 'wb3_id', 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(431, 78, 'Группа', '', 'wb3_log_list', 'wb3_log_id', 0, 1, 7, 7, 1, NULL, 'wb3_log', 'log_group', 'id', NULL, NULL),
(432, 78, 'База данных', '', 'wb3_log_list', 'wb3_database', 0, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(433, 78, 'Таблица', '', 'wb3_log_list', 'wb3_table', 0, 1, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL),
(434, 78, 'Активен', '', 'wb3_log_list', 'wb3_active', 0, 3, 6, 6, 4, NULL, NULL, NULL, NULL, NULL, NULL),
(452, 16, '#', '', 'wb3_log_history', 'wb3_id', 1, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(453, 16, 'Группа', '', 'wb3_log_history', 'wb3_log_id', 0, 1, 1, 1, 1, NULL, 'wb3_log', 'log_group', 'id', NULL, NULL),
(454, 16, 'Метод', '', 'wb3_log_history', 'wb3_method', 0, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(455, 16, 'Таблица', '', 'wb3_log_history', 'wb3_table', 0, 1, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL),
(456, 16, 'Данные', '', 'wb3_log_history', 'wb3_data', 0, 4, 10, 10, 4, NULL, NULL, NULL, NULL, 1, NULL),
(457, 16, 'Дата', '', 'wb3_log_history', 'wb3_date', 0, 1, 1, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL),
(458, 16, 'Обработан', '', 'wb3_log_history', 'wb3_result', 0, 1, 1, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL),
(459, 16, 'Пользователь', '', 'wb3_log_history', 'wb3_user', 0, 1, 1, 1, 7, NULL, '#__users', 'name', 'id', NULL, NULL),
(466, 78, 'Поток', NULL, 'wb3_log_list', 'wb3_stream', NULL, 1, 1, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL),
(467, 16, 'Поток', NULL, 'wb3_log_history', 'wb3_stream', NULL, 1, 1, 1, 7, NULL, '', '', '', NULL, NULL),
(471, 84, 'wb3_id', '', 'wb3_libs', 'wb3_id', 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(472, 84, 'wb3_patch', '', 'wb3_libs', 'wb3_patch', 0, 10, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(473, 84, 'wb3_order', '', 'wb3_libs', 'wb3_order', 0, 1, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(474, 84, 'wb3_active', '', 'wb3_libs', 'wb3_active', 0, 3, 6, 6, 3, '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_scheme_group`
--

CREATE TABLE `wb3_scheme_group` (
  `wb3_id` int(11) NOT NULL,
  `wb3_name` varchar(128) NOT NULL,
  `wb3_desc` varchar(128) NOT NULL,
  `wb3_faico` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wb3_scheme_group`
--

INSERT INTO `wb3_scheme_group` (`wb3_id`, `wb3_name`, `wb3_desc`, `wb3_faico`) VALUES
(1, 'Архитектура', 'Архитектура схем', 'fas fa-microchip'),
(2, 'Система', 'Настройки окружения', 'fas fa-cog');

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_scheme_link`
--

CREATE TABLE `wb3_scheme_link` (
  `wb3_id` int(11) NOT NULL,
  `wb3_master_id` int(11) NOT NULL,
  `wb3_slave_id` int(11) NOT NULL,
  `wb3_description` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wb3_scheme_link`
--

INSERT INTO `wb3_scheme_link` (`wb3_id`, `wb3_master_id`, `wb3_slave_id`, `wb3_description`) VALUES
(1, 1, 7, 'Группы схем - Схемы'),
(2, 5, 10, 'Схемы - Поля схем'),
(3, 32, 37, 'Группы пользователей - Меню групп'),
(4, 32, 61, 'Группы пользователей - Права схем'),
(5, 5, 71, 'Схемы - Параметры'),
(6, 32, 85, 'Группы пользователей - Права плагинов'),
(30, 143, 431, 'Системный лог - Таблицы'),
(41, 143, 453, 'Системный лог - История');

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_scheme_params`
--

CREATE TABLE `wb3_scheme_params` (
  `wb3_id` int(11) NOT NULL,
  `wb3_name` varchar(128) NOT NULL,
  `wb3_desc` varchar(512) NOT NULL,
  `wb3_key` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_scheme_params_link`
--

CREATE TABLE `wb3_scheme_params_link` (
  `wb3_id` int(11) NOT NULL,
  `wb3_scheme_id` int(11) NOT NULL,
  `wb3_param_id` int(11) NOT NULL,
  `wb3_value` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_scheme_plugin_links`
--

CREATE TABLE `wb3_scheme_plugin_links` (
  `wb3_id` int(11) NOT NULL,
  `wb3_plugin_id` int(11) NOT NULL,
  `wb3_scheme_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `wb3_scheme_rights`
--

CREATE TABLE `wb3_scheme_rights` (
  `wb3_id` int(11) NOT NULL,
  `wb3_group_id` int(11) NOT NULL,
  `wb3_scheme_id` int(11) NOT NULL,
  `wb3_r` int(11) NOT NULL,
  `wb3_w` int(11) NOT NULL,
  `wb3_x` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `wb3_scheme_rights`
--

INSERT INTO `wb3_scheme_rights` (`wb3_id`, `wb3_group_id`, `wb3_scheme_id`, `wb3_r`, `wb3_w`, `wb3_x`) VALUES
(1, 8, 1, 1, 1, 1),
(2, 8, 2, 1, 1, 1),
(3, 8, 3, 1, 1, 1),
(4, 8, 5, 1, 1, 1),
(5, 8, 6, 1, 1, 1),
(6, 8, 7, 1, 1, 1),
(7, 8, 10, 1, 1, 1),
(8, 8, 11, 1, 1, 1),
(9, 8, 12, 1, 1, 1),
(10, 8, 8, 1, 1, 1),
(11, 8, 9, 1, 1, 1),
(12, 8, 13, 1, 1, 1),
(13, 8, 14, 1, 1, 1),
(14, 8, 15, 1, 1, 1),
(15, 8, 16, 1, 1, 1),
(16, 8, 17, 1, 1, 1),
(23, 8, 24, 1, 1, 1),
(78, 8, 78, 1, 1, 1),
(86, 8, 84, 1, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `wb3_libs`
--
ALTER TABLE `wb3_libs`
  ADD PRIMARY KEY (`wb3_id`);

--
-- Индексы таблицы `wb3_log`
--
ALTER TABLE `wb3_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `wb3_log_history`
--
ALTER TABLE `wb3_log_history`
  ADD PRIMARY KEY (`wb3_id`),
  ADD KEY `wb3_apikey` (`wb3_log_id`),
  ADD KEY `wb3_method` (`wb3_method`),
  ADD KEY `wb3_table` (`wb3_table`);

--
-- Индексы таблицы `wb3_log_list`
--
ALTER TABLE `wb3_log_list`
  ADD PRIMARY KEY (`wb3_id`),
  ADD KEY `wb3_key_id` (`wb3_log_id`),
  ADD KEY `wb3_database` (`wb3_database`),
  ADD KEY `wb3_table` (`wb3_table`),
  ADD KEY `wb3_stream` (`wb3_stream`);

--
-- Индексы таблицы `wb3_menu`
--
ALTER TABLE `wb3_menu`
  ADD UNIQUE KEY `id` (`wb3_id`),
  ADD KEY `wb3_child` (`wb3_child`),
  ADD KEY `wb3_group` (`wb3_group`),
  ADD KEY `wb3_link_id` (`wb3_link_id`);

--
-- Индексы таблицы `wb3_menu_links`
--
ALTER TABLE `wb3_menu_links`
  ADD PRIMARY KEY (`wb3_id`);

--
-- Индексы таблицы `wb3_plugin_data`
--
ALTER TABLE `wb3_plugin_data`
  ADD PRIMARY KEY (`wb3_id`);

--
-- Индексы таблицы `wb3_plugin_input`
--
ALTER TABLE `wb3_plugin_input`
  ADD PRIMARY KEY (`wb3_id`);

--
-- Индексы таблицы `wb3_plugin_rights`
--
ALTER TABLE `wb3_plugin_rights`
  ADD PRIMARY KEY (`wb3_id`);

--
-- Индексы таблицы `wb3_plugin_view`
--
ALTER TABLE `wb3_plugin_view`
  ADD PRIMARY KEY (`wb3_id`);

--
-- Индексы таблицы `wb3_scheme`
--
ALTER TABLE `wb3_scheme`
  ADD PRIMARY KEY (`wb3_id`);

--
-- Индексы таблицы `wb3_scheme_fields`
--
ALTER TABLE `wb3_scheme_fields`
  ADD PRIMARY KEY (`wb3_id`),
  ADD KEY `wb3_scheme_id` (`wb3_scheme_id`);

--
-- Индексы таблицы `wb3_scheme_group`
--
ALTER TABLE `wb3_scheme_group`
  ADD PRIMARY KEY (`wb3_id`);

--
-- Индексы таблицы `wb3_scheme_link`
--
ALTER TABLE `wb3_scheme_link`
  ADD PRIMARY KEY (`wb3_id`),
  ADD KEY `wb3_id` (`wb3_id`),
  ADD KEY `wb3_master_id` (`wb3_master_id`),
  ADD KEY `wb3_slave_id` (`wb3_slave_id`),
  ADD KEY `wb3_master_id_2` (`wb3_master_id`),
  ADD KEY `wb3_slave_id_2` (`wb3_slave_id`);

--
-- Индексы таблицы `wb3_scheme_params`
--
ALTER TABLE `wb3_scheme_params`
  ADD PRIMARY KEY (`wb3_id`);

--
-- Индексы таблицы `wb3_scheme_params_link`
--
ALTER TABLE `wb3_scheme_params_link`
  ADD PRIMARY KEY (`wb3_id`),
  ADD KEY `wb3_scheme_id` (`wb3_scheme_id`),
  ADD KEY `wb3_param_id` (`wb3_param_id`);

--
-- Индексы таблицы `wb3_scheme_plugin_links`
--
ALTER TABLE `wb3_scheme_plugin_links`
  ADD PRIMARY KEY (`wb3_id`),
  ADD KEY `wb3_plugin_id` (`wb3_plugin_id`),
  ADD KEY `wb3_scheme_id` (`wb3_scheme_id`);

--
-- Индексы таблицы `wb3_scheme_rights`
--
ALTER TABLE `wb3_scheme_rights`
  ADD PRIMARY KEY (`wb3_id`),
  ADD KEY `wb3_group_id` (`wb3_group_id`),
  ADD KEY `wb3_scheme_id` (`wb3_scheme_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `wb3_libs`
--
ALTER TABLE `wb3_libs`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `wb3_log`
--
ALTER TABLE `wb3_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `wb3_log_history`
--
ALTER TABLE `wb3_log_history`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `wb3_log_list`
--
ALTER TABLE `wb3_log_list`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `wb3_menu`
--
ALTER TABLE `wb3_menu`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT для таблицы `wb3_menu_links`
--
ALTER TABLE `wb3_menu_links`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT для таблицы `wb3_plugin_data`
--
ALTER TABLE `wb3_plugin_data`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `wb3_plugin_input`
--
ALTER TABLE `wb3_plugin_input`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `wb3_plugin_rights`
--
ALTER TABLE `wb3_plugin_rights`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `wb3_plugin_view`
--
ALTER TABLE `wb3_plugin_view`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `wb3_scheme`
--
ALTER TABLE `wb3_scheme`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT для таблицы `wb3_scheme_fields`
--
ALTER TABLE `wb3_scheme_fields`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;

--
-- AUTO_INCREMENT для таблицы `wb3_scheme_group`
--
ALTER TABLE `wb3_scheme_group`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `wb3_scheme_link`
--
ALTER TABLE `wb3_scheme_link`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `wb3_scheme_params`
--
ALTER TABLE `wb3_scheme_params`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `wb3_scheme_params_link`
--
ALTER TABLE `wb3_scheme_params_link`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `wb3_scheme_plugin_links`
--
ALTER TABLE `wb3_scheme_plugin_links`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `wb3_scheme_rights`
--
ALTER TABLE `wb3_scheme_rights`
  MODIFY `wb3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
