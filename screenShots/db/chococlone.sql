-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 24 2020 г., 10:48
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chococlone`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Здоровье', 'Chococlone.me предлагает Вам купоны на медицинские услуги - это удобный  способ по акции пройти медицинские процедуры. Сертификат дает возможность получить качественное медицинское обслуживание недорого, своевременно выявить заболевания и предотвратить ос', NULL, NULL),
(2, 'Услуги ', 'Услуги широкого спектра с хорошей скидкой\r\nПриближается радостный момент вашей долгожданной свадьбы? Может быть, вы захотите пройти обучение в языковой школе? Мы поможем с выбором и тем, кто решил освоить новую профессию. ', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `certificates`
--

CREATE TABLE `certificates` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `discount` int(10) UNSIGNED NOT NULL,
  `bought` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `certificates`
--

INSERT INTO `certificates` (`id`, `company_id`, `name`, `price`, `discount`, `bought`, `created_at`, `updated_at`) VALUES
(2, 2, 'Консультация эндокринолога первичная — 2 000 тг.  вместо  4 000 тг.', 2000, 50, 0, NULL, NULL),
(3, 2, 'Консультация кардиолога первичная — 2 000 тг.  вместо  4 000 тг.', 4000, 50, 0, NULL, NULL),
(18, 7, 'Apple', 1000, 14, 0, '2020-06-02 15:52:12', '2020-06-02 15:52:12'),
(21, 8, 'Banana', 150, 70, 0, '2020-06-10 03:00:55', '2020-06-10 03:00:55'),
(22, 1, 'Берегите свое здоровье!', 999, 46, 1, '2020-06-11 03:49:02', '2020-06-11 03:49:15');

-- --------------------------------------------------------

--
-- Структура таблицы `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `companies`
--

INSERT INTO `companies` (`id`, `subcategory_id`, `name`, `description`, `address`, `phone`, `discount`, `created_at`, `updated_at`) VALUES
(1, 4, 'Берегите свое здоровье! Скидка до 46% на дневное и ночное МРТ в диагностическом центре Orhun Medical на Казыбек би!', 'Orhun Medical является филиалом центра Орхун Саалык (Турция), представляющим в г. Алматы свой 25-летний опыт в области диагностики. МРТ — это современный, безопасный и надежный метод визуализации для диагностики различных заболеваний.Специалисты, стаж', 'г. Алматы, ул. Казыбек би, 12В (уг. ул. Ришата и Муслима Абдуллиных)', '+7 (727) 291-29-99', 46, '2020-06-01 18:18:29', '2020-06-11 04:09:44'),
(2, 5, 'Прием и обследование у эндокринолога и кардиолога, ЭКГ и анализы в медицинском центре Fenix Med со скидкой до 50%!', 'Особенности:\r\n\r\nВрачи:\r\nПетлюк Анна Леонидовна, стаж 15 лет.\r\nИщанова Бахытгуль Хайбрахмановна, стаж 15 лет.\r\nИспользуемое медицинское оборудование — электрокардиограф Эк12 Т-01- «Р_Т» (Россия).\r\nАнализы необходимо сдавать натощак.', 'г. Алматы, ул. Жибек Жолы, 67, ТД Универсам, 2 этаж', '+7 (700) 978-03-03\r\n', 50, '2020-06-01 18:18:40', '2020-06-01 18:19:19'),
(7, 6, 'OYYYEEEE', 'kke', 'kek', 'OYYYEEEE', 14, '2020-06-02 15:51:05', '2020-06-11 04:14:34'),
(8, 1, 'Bid banana for you', 'asdf', 'Seyfulina 1 a', '87000910007', 50, '2020-06-02 15:54:28', '2020-06-11 04:30:16');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2020_05_12_102531_create_roles_table', 1),
('2020_05_12_112855_create_categories_table', 1),
('2020_05_12_112909_create_subcategories_table', 1),
('2020_05_12_113057_create_companies_table', 1),
('2020_05_12_115424_create_certificates_table', 1),
('2020_05_23_200201_create_orders_table', 2),
('2020_06_05_120925_create_reviews_table', 3),
('2020_06_21_130526_create_review_replies_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `certificate_id` int(10) UNSIGNED NOT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `certificate_id`, `count`, `created_at`, `updated_at`) VALUES
(12, 1, 22, 1, '2020-06-11 03:49:15', '2020-06-11 03:49:15');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `company_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 3, 'test', '2020-06-05 11:56:30', '2020-06-05 11:56:30'),
(8, 1, 1, 3, 'asdf', '2020-06-24 02:40:54', '2020-06-24 02:40:54'),
(9, 2, 1, 3, 'qwer', '2020-06-24 02:41:23', '2020-06-24 02:41:23'),
(10, 8, 1, 2, 'qqq', '2020-06-24 02:41:47', '2020-06-24 02:41:47');

-- --------------------------------------------------------

--
-- Структура таблицы `review_replies`
--

CREATE TABLE `review_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `review_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `review_replies`
--

INSERT INTO `review_replies` (`id`, `review_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'asdf', '2020-06-21 07:58:48', '2020-06-21 07:58:48'),
(2, 4, 1, 'asdf', '2020-06-21 13:14:35', '2020-06-21 13:14:35'),
(3, 8, 1, 'kek', '2020-06-24 02:41:05', '2020-06-24 02:41:05'),
(4, 10, 1, 'www', '2020-06-24 02:41:51', '2020-06-24 02:41:51');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'ROLE_ADMIN', NULL, NULL),
(2, 'ROLE_USER', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Для взрослых', '', NULL, NULL),
(2, 2, 'Химчистка', '', NULL, NULL),
(3, 2, 'Обучающие курсы', '', NULL, NULL),
(4, 1, 'МРТ и КТ', '', NULL, NULL),
(5, 1, 'УЗИ', '', NULL, NULL),
(6, 1, ' Анализы ', '', NULL, NULL),
(7, 1, 'Обследования', '', NULL, NULL),
(8, 1, 'Стоматологии', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL,
  `bonus` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `balance`, `bonus`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bekzhan Bershimbekov', 'bekzhan99@gmail.com', '$2y$10$kcerVgwRVa5drbAAg1Etz.BBgU6/NnOv0.0V7usfyJfZYlJY4NxGm', 0, 0, 'yp1Osa5E7qtNZ5g6hUJhdDcYwaXLfgMwhmA3hiiHSWzTD8B8HRzQT09fY82L', '2020-05-23 14:29:41', '2020-06-21 08:11:23');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_company_id_index` (`company_id`);

--
-- Индексы таблицы `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_subcategory_id_index` (`subcategory_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_index` (`user_id`),
  ADD KEY `orders_certificate_id_index` (`certificate_id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_company_id_index` (`company_id`),
  ADD KEY `reviews_user_id_index` (`user_id`);

--
-- Индексы таблицы `review_replies`
--
ALTER TABLE `review_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_replies_review_id_index` (`review_id`),
  ADD KEY `review_replies_user_id_index` (`user_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_index` (`category_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `review_replies`
--
ALTER TABLE `review_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `review_replies`
--
ALTER TABLE `review_replies`
  ADD CONSTRAINT `review_replies_review_id_foreign` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
