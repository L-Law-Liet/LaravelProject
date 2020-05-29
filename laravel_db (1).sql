-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 25 2020 г., 10:29
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Apparels', NULL, NULL),
(2, 'Electronics', NULL, NULL),
(3, 'Furniture', NULL, NULL),
(4, 'Sports', NULL, NULL),
(5, 'Jewelries', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uId` bigint(20) UNSIGNED NOT NULL,
  `pId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `pId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `image`, `comment`, `rate`, `pId`, `created_at`, `updated_at`) VALUES
(10, 'Arman Askarov', '1590126408.jpg', 'Many swore at the cutout in s10 ... to me that the iphone x monobrow was good, that with this point, I do not really notice them. Now, many Chinese manufacturers have figured out how to make a display without cutouts, starting from a small drop-shaped cutout like a huawei p30, ending with a generally retractable camera like an oppo, so the iphone monobrow seemed a little the last century, so I like the hole in the Samsung more.\r\nScreen. Screen resolution, quality and color reproduction, in my opinion so chic. Eyes after a long reading do not get tired! This is already good) But I was also happy with the iphone x screen, for me there are no fundamental differences.\r\nBattery. I use the phone mainly for the Internet, whats app, navigator, and several other programs, there are no games. Therefore, what about the Iphone, that with the Samsung battery, I calmly last for a day. By the way, the galaxy s 10 is charging relatively quickly, it just did not detect, but no more than 1h 20 min until fully charged.', 4, 44, '2020-05-22 03:20:43', '2020-05-22 03:20:43'),
(11, 'Arman Askarov', '1590126408.jpg', 'Good Product Galaxy', 4, 45, '2020-05-22 07:47:29', '2020-05-22 07:47:29');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_04_17_083622_create_products_table', 1),
(4, '2020_04_17_083736_create_categories_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(7, '2020_04_20_054156_create_roles_table', 3),
(8, '2020_05_02_095253_create_orders_table', 4),
(10, '2020_05_03_191803_create_favourites_table', 5),
(12, '2020_05_10_092758_create_feedback_table', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uId` bigint(20) UNSIGNED NOT NULL,
  `pId` bigint(20) UNSIGNED NOT NULL,
  `count` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user@gmail.com', '$2y$10$EEnFYut7xa0ovcbMxIXbSu7Fikw7PE4ED3scLX.9vUALT42GF5i4i', '2020-05-22 01:36:07');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `description` mediumtext CHARACTER SET utf8 NOT NULL,
  `hasDiscount` tinyint(1) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `category` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `hasDiscount`, `discount`, `category`, `path`, `created_at`, `updated_at`) VALUES
(25, 'T-shirt', 15, 'This premium T-shirt is as close to perfect as can be. It\'s optimized for all types of print and will quickly become your favorite T-shirt. Soft, comfortable and durable, this is a definite must-own.\r\nBrand: Spreadshirt\r\n100% cotton (heather gray and heather ice blue are 95% cotton /5% viscose. Heather blue & charcoal gray are 80% cotton/20% polyester. Heather burgundy is 60% cotton/40% polyester. Heather oatmeal is 99% cotton/1% viscose) | Fabric Weight: 4.42 oz (lightweight)\r\nWide range of sizes from S-5XL\r\nFairly produced, certified and triple audited.\r\nDouble stitched, reinforced seams at shoulder, sleeve, collar and waist\r\nOptimized for beautiful brilliance across all printing methods\r\nImported; processed and printed in the U.S.A.', 0, 0.00, 'Apparels', 't-shirt.jpg', '2019-02-13 03:45:12', '2020-05-19 04:50:19'),
(26, 'L-shirt', 16, 'So far with my shopping experience, i must say that size notation varies with the brands. However on an average you choose “L” if your height is around 170 cm, “L” stands for size 40–42 cm.\r\nEvery e-com websites, with the product, provides the size chart also you can refer that chart for enhancing your shopping experience.\r\nProduct dimension: The label states characteristic dimensions of the product.\r\nLike Shirt Size 40 or Jeans size 30.\r\nBody dimension: The label states the range of body measurements for which the product was designed.\r\nExample: The measurement taken by a tailor is body dimension.\r\nAd hoc sizes: Are sizes with no obvious relationship to any measurement.\r\nSize L has no relation to measurements. It only means “Large”.\r\nHappy Shoping.', 0, 0.00, 'Apparels', 'l-shirt.jpg', '2019-12-24 23:16:42', '2020-05-19 04:49:48'),
(27, 'LongSleeve', 18, 'Good LongSleeve', 0, 0.00, 'Apparels', 'longsleeve.jpg', '2018-03-21 18:31:22', NULL),
(29, 'Sneaker', 34, 'Good Sneaker', 0, 0.00, 'Apparels', 'sneakers.jpg', '2019-03-13 08:09:28', NULL),
(30, 'TV', 3200, 'Quality TV', 0, 0.00, 'Furniture', 'tv.jpg', '2019-06-25 10:20:32', NULL),
(31, 'Bed', 2700, 'Quality Bed', 0, 0.00, 'Furniture', 'bed.jpg', '2020-01-02 08:18:48', NULL),
(32, 'Table', 1200, 'Quality Table', 0, 0.00, 'Furniture', 'table.jpg', '2020-02-04 12:18:40', NULL),
(33, 'Mirror', 75, 'Quality Mirror', 0, 0.00, 'Furniture', 'mirror.jpg', '2019-08-11 08:21:44', '2020-05-24 07:14:10'),
(34, 'Door', 260, 'Quality Door', 0, 0.00, 'Furniture', 'door.jpg', '2020-05-30 12:21:42', NULL),
(35, 'Football Ball', 750, 'Useful Ball', 0, 0.00, 'Sports', 'fball.jpg', '2019-03-13 08:18:59', NULL),
(36, 'Basketball Ball', 470, 'Useful For BasketBall', 0, 0.00, 'Sports', 'bball.jpg', '2019-10-23 08:19:00', NULL),
(37, 'Dips', 1150, 'Useful Dips For Workout', 0, 0.00, 'Sports', 'dips.jpg', '2019-11-30 14:23:36', NULL),
(38, 'Cevlar', 310, 'Useful Cevlar', 0, 0.00, 'Sports', 'cevlar.jpg', '2019-05-04 12:11:00', NULL),
(39, 'Fitness Bracelet', 52, 'Useful Fit', 0, 0.00, 'Sports', 'miband.jpg', '2018-09-29 10:16:35', NULL),
(40, 'Ring', 5022, 'Expensive Ring Good beatyful.', 1, 20.00, 'Jewelries', 'ring.jpg', '2020-05-27 14:31:47', '2020-05-16 13:24:02'),
(41, 'Glasses', 72, 'Beautiful Glass', 0, 0.00, 'Jewelries', 'glasses.jpg', '2019-08-25 13:32:18', NULL),
(42, 'Band', 57, 'Beautiful BaND', 0, 0.00, 'Jewelries', 'band.jpg', '2020-01-15 07:39:22', NULL),
(43, 'Chain', 32, 'Beautiful Chain', 0, 0.00, 'Jewelries', 'chain.jpg', '2020-04-28 13:21:05', NULL),
(44, 'Galaxy S10+', 1160, 'Galaxy line in 2019 becomes anniversary, the tenth generation of these smartphones comes out. These are the most popular smartphones on Android, their sales amount to hundreds of millions of pieces over the years. Samsung has always tried to make uncompromising devices that incorporate the latest technology, while emphasizing not only the technology itself, but also its ease of use. In 2019, three rather than two devices appear on the market at once, as we are used to. Usually a company produces two models: one smaller, and the other, with the prefix “plus”, larger. But their design and capabilities have always been identical. For S10 and S10 +, this tradition continues, but a younger model is added, which is distinguished by a flat display, this is what many customers asked for. In addition to the flat screen, it is also the youngest model, and, accordingly, its cost is minimal. We will consider this device in a separate material, for now I want to focus on the two older models, since many will choose their device among them.', 1, 13.00, 'Electronics', 's10.jpg', '2020-02-01 16:36:19', '2020-05-01 04:42:05'),
(45, 'Galaxy S20', 1460, 'Flagship from 2020 manufactured by Samsung.', 0, 0.00, 'Electronics', 's20.jpg', '2020-03-26 14:26:59', NULL),
(46, 'Xiaomi mi 10', 800, 'Flagship from 2020 manufactured by Xiaomi.', 0, 0.00, 'Electronics', 'mi10.jpg', '2020-02-21 15:34:25', NULL),
(47, 'Iphone 11 pro', 1599, 'Flagship from 2019 manufactured by Apple.', 0, 0.00, 'Electronics', '11pro.jpg', '2019-11-01 16:17:00', NULL),
(48, 'Legion y540', 2000, 'Notebook from 2019 manufactured by Lenovo.', 0, 0.00, 'Electronics', 'y540.jpg', '2019-12-19 13:19:00', NULL),
(49, 'TV Samsung', 3200, 'TV from 2019 manufactured by Samsung.', 0, 0.00, 'Electronics', 'tv.jpg', '2020-04-27 14:22:00', NULL),
(50, 'Asus TUF 470', 2700, 'The latest AMD Ryzen processor and NVIDIA GeForce GTX graphics card are combined in the TUF Gaming FX505 laptop to provide great gaming experience on its NanoEdge thin-frame IPS display. Tested to comply with the MIL-STD-810G military industry standard, this affordable but high-performance model features enhanced durability and reliability, making it an excellent choice as a mobile gaming platform for everyday use.', 1, 14.00, 'Electronics', 'tuf.jpg', '2020-04-01 08:46:00', NULL),
(51, 'Xiaomi Airdots', 27, 'Xiaomi AirDots TWS-headset was introduced back in November 2018 at a price of 199 yuan, or 1,900 rubles, at the time of release and was positioned as a low-cost competitor primarily for Apple AirPods. The case can provide an additional 2.5 charges of headphones, in the end we get about 12-15 hours of music playback.\r\nLooking ahead, I’ll say that for 4 hours the headphones do not work. Real time is just over three hours. It seems that with such a low capacity of the built-in batteries, this operating time is achieved largely due to the current version of Bluetooth - 5.0.', 1, 4.00, 'Electronics', 'airdots.jpg', '2020-03-15 12:23:00', NULL),
(52, 'Nike Sneakers', 210, 'Deconstruct the past and step into the present with the Nike Daybreak-Type. The airy mesh upper and exaggerated stitching of the Nike Daybreak-Type add a bold, fresh look onto early Bowerman prototypes pulled from the archives. Retro suede and heel clips designed for support keep you connected to history while the rubber Waffle outsole features flashy angling at the back for a modern look.', 1, 18.00, 'Sports', 'nike.jpg', '2020-03-27 13:21:40', NULL),
(53, 'Armani Black Classic Coat', 320, 'The popular brand ARMANI EXCHANGE made a stylish men\'s coat with a length just above the knee, incredibly demanded for several seasons in a row. The simplicity and conciseness of the product\'s style will allow it to be combined with various images of your wardrobe. The model is made of a combination of materials: 54% wool 35% polyester 6% polyamide 4% acrylic 1% viscose. Coat of attractive blue. The coat is perfect for the off season. The model is complemented by elegant patch pockets on the sides.', 1, 37.00, 'Apparels', 'coat.jpg', '2020-02-26 15:12:00', NULL),
(54, 'Blue Classic Custome', 240, 'Three-piece suit with a full fit of the cage and side adjusters (straps) on the trousers. Cell - takes a leading position among prints for more than 200 years. The suits in the cage of our brand are made with a full fit for all elements, thereby possessing an optical effect and help to improve the proportions. A fitted jacket with 2 buttons and welt pockets with a flap is complemented by a vest with a fabric back and a classic trouser model without tucks for all occasions. Pants with side adjusters (straps) allow you to adjust a comfortable fit in the belt and control it throughout the day. The bottom of the trousers is not hemmed, this is done for your comfort, since for all men the leg length from the hip is different and most importantly you can hem the trousers under the shoes with which you plan to wear a suit.', 1, 7.00, 'Apparels', 'custome.jpg', '2019-10-20 19:24:32', '2020-05-01 05:07:08'),
(55, 'Gas stove Artel APETITO 10-G', 193, 'Gas stove Artel APETITO 10-G with mechanical control. Mechanical electric ignition. The oven is gas. The volume of the oven is 65 liters. Backlight oven. Hob: 4 gas hobs. The working surface is enamel. Dimensions (WxDxH): 60x60x85 cm. Color - brown. Gas stove, built-in gas surface. Electric oven: Volume - 65 l., Options: Desktop cover (glass), Baking tray - 2 pcs., Oven grill-1 pcs., Rotisserie with electric drive, Thermostat, Lower drawer.', 1, 3.00, 'Furniture', 'gaz.jpg', '2020-01-19 02:30:00', NULL),
(56, 'Earrings Cardio', 78, 'The products of the Pandora True Femininity collection are easily recognizable by the metal beads, and these small circle-shaped stud earrings are her brightest representative. The circle is a traditional symbol of personality and infinity, and these silver earrings inspire us to take a closer look at our life cycles, which define and redefine our essence and what we love. They look great on their own and in combination with other earrings (if there are several punctures).', 1, 5.00, 'Jewelries', 'earrings.jpg', '2019-07-06 12:16:00', NULL),
(57, 'Earrings Star', 420, 'Insert cube. - zirconium oxide, Metal - Silver 925. The price is for one earring of the Pandora Me collection. A shooting star in the shape of a shooting star with a minimalist finish of brilliant stones, artfully made of 925 sterling silver from environmentally friendly sources and decorated with stones obtained in compliance with the principles of social and environmental responsibility. Wear it alone, paired, or in combination with other stud earrings. My shooting star will be a great gift for important people, demonstrating your love and emotions.', 1, 23.00, 'Jewelries', 'earrings2.jpg', '2020-04-11 09:00:00', NULL),
(58, 'Healing Bracelet 18cm', 61, 'Our universal bracelet is made of black leather and PANDORA Rose, our unique alloy of metals coated with 585 gold. The flexible design has a sliding clasp for a perfect fit, decorated with sparkling stones. The bracelet will look equally attractive with and without pendants. Wear the item with your favorite charms, old and new, or with other bracelets for contrast.', 0, 0.00, 'Jewelries', 'bracelet.jpg', '2018-11-30 06:19:00', NULL),
(59, 'Huawei Mate 20', 788, 'Some time ago, the Mate line had a clear positioning: a top filling and a large screen diagonal. Now, it seems to me, this line is blurred if we say that the flagship P line also has decent parameters, and the diagonals of displays have long stepped over 6 inches even in a more accessible segment. At the very least, for the average user, it’s quite a logical choice: either I take the P20 Pro here and now, or I’m waiting for Mate 20. That is, in the head of the potential buyer there is no separation of the products of the P and Mate lines. A similar situation now exists with Samsung: they have a series of S and Note, which, in fact, differ in that the latter has a stylus.', 1, 3.00, 'Electronics', '1588752576.jpg', '2020-05-06 07:12:41', '2020-05-23 07:39:07');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` decimal(11,0) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `phone`, `email`, `email_verified_at`, `password`, `photo`, `isAdmin`, `remember_token`, `created_at`, `updated_at`) VALUES
(21, 'Admin', 'ADMIN', '87777777777', 'a@gmail.com', NULL, '$2y$10$iO4bgKw1pNzIMiJbVJ.P9eTSgyk5iCIZECHwbqv24I5ShAv.B3sg2', '1590322191.jpg', 1, NULL, '2020-04-22 04:39:32', '2020-05-24 07:09:51'),
(24, 'Arman', 'Askarov', '87074523576', 'user@gmail.com', NULL, '$2y$10$gNw6q4XyVFNc3fBDHY6xdO5vGl3BpyXfbUuPTxSA5xtFuAtyzS65m', '1590326639.jpg', 0, NULL, '2020-04-27 01:01:32', '2020-05-24 08:23:59');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_uid_foreign` (`uId`),
  ADD KEY `favourites_pid_foreign` (`pId`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_pid_foreign` (`pId`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_uid_foreign` (`uId`),
  ADD KEY `orders_pid_foreign` (`pId`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_pid_foreign` FOREIGN KEY (`pId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `favourites_uid_foreign` FOREIGN KEY (`uId`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_pid_foreign` FOREIGN KEY (`pId`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_pid_foreign` FOREIGN KEY (`pId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_uid_foreign` FOREIGN KEY (`uId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
