-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 01:15 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techdyno`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@admin.com', '6204f90bd1b001644493067.jpg', '$2y$10$uAAMOXBJC6a/zVHtRuGr.uiUF1Zj1MiS3VpKOrYkL3kh7WwwdX9py', NULL, '2022-01-19 21:51:47', '2022-07-05 12:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meaning` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `subject`, `template`, `meaning`, `created_at`, `updated_at`) VALUES
(1, 'PASSWORD_RESET', 'Password Reset Code', '<p><b>Hi {username},\r\n                            </b></p>\r\n\r\n                            <p>\r\n                            Here is your password reset code : {code}</p>\r\n\r\n                            <p>\r\n                            Thanks,\r\n                            </p>\r\n\r\n                            <p>\r\n                            {sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"code\":\"Email Verification Code\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-01-20 03:51:47'),
(2, 'PAYMENT_SUCCESSFULL', 'PAYMENT SUCCESSFULL', '<p><b>Hi {username},</b></p><p><b>Your Payment for {membership} has been successfully paid.</b></p><p><b>Transaction Number : {trx}</b></p><p><b>Total Amount : {amount} {currency}</b></p><p><b><br></b></p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"trx\":\"Transaction Number\",\"amount\":\"Payment Amount\",\"membership\":\"membership Name\",\"currency\":\"Currency for Payment\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-06-16 08:49:00'),
(3, 'PAYMENT_RECEIVED', 'PAYMENT RECEIVED', '<p><b>Hi {username},</b></p><p><b>You Received Payment for {service} has been successfully paid.</b></p><p><b>Transaction Number : {trx}</b></p><p><b>Total Amount : {amount} {currency}</b></p><p><b><br></b></p><p><b>\r\n</b></p><p>\r\n\r\n</p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"trx\":\"Transaction Number\",\"amount\":\"Payment Amount\",\"service\":\"Service Name\",\"currency\":\"Currency for Payment\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-01-20 03:51:47'),
(4, 'VERIFY_EMAIL', 'Verify Your Email', '<p><b>Hi {username},</b></p><p><b>Your verification code is {code}</b></p><p><b><br></b></p><p><b>\r\n</b></p><p>\r\n\r\n</p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"code\":\"Email Verification Code\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-01-20 03:51:47'),
(5, 'PAYMENT_CONFIRMED', 'payment confirmed', '<p><b>Hi {username},</b></p><p><b>Your Payment for {membership} is accepted</b></p><p><b>Amount : {amount} {currency}</b></p><p><b>Charge : {charge} {currency}</b></p><p><b>Transaction ID : {trx}</b></p><p><b>&nbsp;</b></p><p><b><br></b></p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"amount\":\"Payment Amount\",\"charge\":\"Payment Charge\",\"membership\":\"membership Name\",\"trx\":\"Transaction ID\",\"currency\":\"Payment Currency\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-06-16 09:04:21'),
(6, 'PAYMENT_REJECTED', 'payment rejected', '<p><b>Hi {username},</b></p><p><b>Your payement is rejected&nbsp;</b></p><p><b>Pay for {plan}</b></p><p><b>charge : {charge}</b></p><p><b>amount : {amount}</b></p><p><b>Booking Id : {trx}</b></p><p><b>&nbsp;</b></p><p><b><br></b></p><p><b>\r\n</b></p><p>\r\n\r\n</p><p>\r\nThanks,\r\n</p><p>\r\n{sent_from}</p>', '{\"username\":\"Email Receiver Name\",\"amount\":\"Payment Amount\",\"charge\":\"Payment Charge\",\"plan\":\"plan Name\",\"trx\":\"Transaction ID\",\"currency\":\"Payment Currency\",\"sent_from\":\"Email Sent from\"}', '2022-01-20 03:51:47', '2022-01-20 03:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'php',
  `email_config` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontend_login_image` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontend_main_background_image` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcrumbs` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_image` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_image` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_reg` tinyint(1) NOT NULL,
  `is_email_verification_on` int(11) DEFAULT NULL,
  `is_sms_verification_on` int(11) DEFAULT NULL,
  `analytics_status` tinyint(1) DEFAULT NULL,
  `analytics_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow_modal` tinyint(4) DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cookie_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow_recaptcha` tinyint(4) DEFAULT NULL,
  `recaptcha_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recaptcha_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twak_allow` tinyint(4) DEFAULT NULL,
  `twak_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `primary_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `site_currency`, `site_email`, `email_method`, `email_config`, `logo`, `frontend_login_image`, `frontend_main_background_image`, `breadcrumbs`, `login_image`, `favicon`, `default_image`, `user_reg`, `is_email_verification_on`, `is_sms_verification_on`, `analytics_status`, `analytics_key`, `allow_modal`, `button_text`, `cookie_text`, `allow_recaptcha`, `recaptcha_key`, `copyright`, `map_link`, `recaptcha_secret`, `twak_allow`, `twak_key`, `seo_description`, `created_at`, `updated_at`, `primary_color`, `timezone`) VALUES
(1, 'Membership Now', '$', 'dd@gmail.com', 'smtp', '{\"smtp_host\":\"smtp.mailtrap.io\",\"smtp_username\":\"9c06581da96ead\",\"smtp_password\":\"705b690e04500a\",\"smtp_port\":\"2525\",\"smtp_encryption\":\"tls\"}', '62ab0771abdfa1655375729.png', '62a812f5bd10e1655182069.png', 'main.jpg', '62c3dc42ea4a51657003074.jpg', '62acd2e02b0cf1655493344.png', '62ab062bbcfed1655375403.png', 'default.png', 1, 0, 0, NULL, NULL, 1, 'Accept Cookie', 'Accept Cookie For This Site', 0, '6LfnhS8eAAAAAAg3LgUY0ZBU0cxvyO6EkF8ylgFL', 'develop and design by@membershipnow', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621', '6LfnhS8eAAAAADPPV4Z4nmii8B4-8rZW2o67O9pf', NULL, NULL, NULL, '2022-01-24 04:13:31', '2022-07-05 08:37:55', '', 'Asia/Singapore');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `short_code`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'English', 'EN', 1, '2022-01-23 23:00:40', '2022-01-23 23:00:40'),
(3, 'Spanish', 'SP', 0, '2022-06-16 09:41:19', '2022-06-16 09:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2021_11_23_044630_create_admins_table', 1),
(6, '2021_11_23_070339_create_admin_password_resets_table', 1),
(7, '2021_11_23_090928_create_general_settings_table', 1),
(13, '2021_12_14_052438_create_section_data_table', 1),
(15, '2021_12_14_064500_create_pages_table', 1),
(16, '2021_12_14_070239_create_email_templates_table', 1),
(23, '2022_01_20_073502_create_languages_table', 1),
(32, '2022_01_24_060831_create_notifications_table', 8),
(33, '2014_10_12_000000_create_users_table', 9),
(34, '2022_02_05_161414_create_subscribers_table', 10),
(40, '2019_12_14_000001_create_personal_access_tokens_table', 14),
(43, '2022_04_03_103201_create_jobs_table', 15),
(44, '2019_08_19_000000_create_failed_jobs_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('2202e5df-f715-478a-8e7c-05506640336b', 'App\\Notifications\\NewUserNotification', 'App\\Models\\Admin', 1, '{\"name\":\"ALEX JOE has just registered\",\"id\":9}', '2022-07-05 08:54:28', '2022-07-05 08:39:02', '2022-07-05 08:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_order` int(11) DEFAULT NULL,
  `sections` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_section_data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_dropdown` tinyint(4) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `page_order`, `sections`, `custom_section_data`, `seo_description`, `is_dropdown`, `status`, `created_at`, `updated_at`) VALUES
(6, 'home', 'home', 1, '[\"banner\"]', NULL, 'home', 0, 0, '2022-07-05 08:11:38', '2022-07-05 08:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section_data`
--

CREATE TABLE `section_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section_data`
--

INSERT INTO `section_data` (`id`, `key`, `data`, `category`, `created_at`, `updated_at`) VALUES
(3, 'about.content', '{\"title\":\"Who we are\",\"image\":\"62a4f48ea77a61654977678.jpg\",\"short_description\":\"There are many variations of passages of Lorem Ipsum available\",\"description\":\"<p><span style=\\\"color:rgb(0,0,0);font-family:\'Times New Roman\';font-size:14px;text-align:justify;\\\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.<\\/span><br><\\/p>\"}', NULL, '2022-02-28 10:57:30', '2022-06-11 14:01:20'),
(4, 'faq.content', '{\"title\":\"Frequently Asked Questions\",\"short_description\":\"We answer some of your Frequently Asked Questions regarding our platform.\",\"image\":\"621d1482722801646072962.jpg\"}', NULL, '2022-02-28 12:29:23', '2022-03-22 07:36:10'),
(5, 'faq.element', '{\"question\":\"My account is automatically expired?\",\"answer\":\"n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available                                Deposit and withdrawal are available for at any time. Be sure, that your funds are not used in any ongoing trade before the withdrawal. The available amount is shown in your dashboard on the main page of Investing platform.\"}', NULL, '2022-03-01 10:00:42', '2022-03-29 12:51:52'),
(6, 'faq.element', '{\"question\":\"When can i access file from account?\",\"answer\":\"n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available\"}', NULL, '2022-03-01 10:00:50', '2022-03-29 12:50:39'),
(7, 'newsletter.content', '{\"title\":\"Get Latest News and Keep Update\",\"short_description\":\"We are doing really well in this market and here are the words we loved to get from a few of our users.\",\"image\":\"62a56f408f21a1655009088.png\"}', NULL, '2022-03-04 05:41:11', '2022-06-12 03:40:54'),
(10, 'banner.content', '{\"title\":\"Ultimate File Manager and Share\",\"short_description\":\"Even with clients at the center of every business function, it\\u2019s all too easy to optimize business operations for the business\\u2019s benefit rather than the customer\\u2019s benefit. This is doubly true in organizations that haven\'t solidified their client management process and shared exclusive files to membership base access.\",\"button_text\":\"Register Now\",\"color_text\":\"Exclusive File\",\"image\":\"62a715140de5c1655117076.jpg\"}', NULL, '2022-03-04 12:20:21', '2022-06-13 04:44:37'),
(25, 'login.content', '{\"title\":\"Login\",\"short_description\":\"Login with your email address and password to keep connected with us.\",\"button_text\":\"Login\",\"left_button_text\":\"Register\",\"image\":\"62aec947b33ad1655621959.png\",\"left_title\":\"Hello !! Have a nice day\",\"left_short_description\":\"create an account to start join with\"}', NULL, '2022-03-12 11:22:01', '2022-06-19 08:59:20'),
(26, 'registration.content', '{\"title\":\"Register\",\"short_description\":\"create an account to start join with\",\"button_text\":\"Register\",\"right_button_text\":\"Login\",\"image\":\"62aec9582475b1655621976.png\",\"right_title\":\"Register\",\"right_short_description\":\"Create an account to start your journey with us.\"}', NULL, '2022-03-12 11:32:16', '2022-06-19 08:59:36'),
(27, 'footer.content', '{\"footer_logo\":\"62ab07c5062531655375813.png\",\"footer_short_description\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.\"}', NULL, '2022-03-12 12:14:49', '2022-06-16 12:36:53'),
(28, 'footer.element', '{\"social_link\":\"www.facebook.com\",\"social_icon\":\"fab fa-facebook-f\"}', NULL, '2022-03-12 12:17:50', '2022-03-12 12:17:50'),
(29, 'footer.element', '{\"social_link\":\"https:\\/\\/www.linkedin.com\\/feed\\/\",\"social_icon\":\"fab fa-linkedin\"}', NULL, '2022-03-12 12:18:32', '2022-03-12 12:20:55'),
(32, 'contact.content', '{\"location\":\"New York Plaza, New York\",\"email\":\"info@Molla.com\",\"phone\":\"+1 987-976-1234\",\"Get_in_touch_text\":\"We collaborate with ambitious brands and people; we\\u2019d love to build something great together.\"}', NULL, '2022-03-26 13:02:09', '2022-03-29 11:33:55'),
(33, 'service.element', '{\"title\":\"web Development\",\"description\":\"<p><span style=\\\"text-align:justify;font-family:Arial;\\\">It Is A Long Established Fact That A Reader Will Be Distracted By The Readable Content Of A Page When Looking At Its Layout. The Point Of Using Lorem Ipsum Is That It Has A More-Or-Less Normal Distribution Of Letters, As Opposed To Using \'Content Here, Content Here\', Making It Look Like Readable English. Many Desktop Publishing Packages And Web Page Editors Now Use Lorem Ipsum As Their Default Model Text, And A Search For \'Lorem Ipsum\' Will Uncover Many Web Sites Still In Their Infancy. Various Versions Have Evolved Over The Years, Sometimes By Accident, Sometimes On Purpose (Injected Humour And The Like.<\\/span><br><img src=\\\"https:\\/\\/images.unsplash.com\\/photo-1647147370078-e7f42d5d909d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1332&amp;q=80\\\" style=\\\"width: 1021.76px;\\\"><\\/p>\",\"slug\":\"web\"}', NULL, '2022-03-26 21:05:59', '2022-03-26 21:23:47'),
(34, 'privacy&policy.content', '{\"Title\":\"Privacy Policy\",\"Privacy_Policy\":\"<p><font color=\\\"#000000\\\" style=\\\"\\\"><span style=\\\"text-transform: capitalize; font-weight: bolder;\\\">Lorem Ipsum<\\/span><span style=\\\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; text-transform: capitalize;\\\">&nbsp;Is Simply Dummy Text Of The Printing And Typesetting Industry. Lorem Ipsum Has Been The Industry\'s Standard Dummy Text Ever Since The 1500s, When An Unknown Printer Took A Galley Of Type And Scrambled It To Make A Type Specimen Book. It Has Survived Not Only Five Centuries, But Also The Leap Into Electronic Typesetting, Remaining Essentially Unchanged. It Was Popularised In The 1960s With The Release Of Letraset Sheets Containing Lorem Ipsum Passages, And More Recently With Desktop Publishing Software Like Aldus PageMaker Including Versions Of Lorem Ipsum<\\/span><\\/font><br><\\/p>\"}', NULL, '2022-03-26 21:51:44', '2022-03-26 21:51:44'),
(41, 'testimonial.content', '{\"title\":\"What Users Say About Us\",\"short_description\":\"We are doing really well in this market and here are the words we loved to get from a few of our users.\"}', NULL, '2022-03-29 04:57:36', '2022-03-29 04:57:36'),
(42, 'testimonial.element', '{\"image\":\"6242e65c4087f1648551516.png\",\"clientname\":\"Alex John\",\"designation\":\"CTO\",\"answer\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui obcaecati officia aliquam molestias nulla possimus? Maiores minus rem qui eligendi. Dolor magnam eveniet dignissimos aliquid vero nisi dolorum illum ratione.\"}', NULL, '2022-03-29 04:58:36', '2022-03-29 04:58:36'),
(43, 'testimonial.element', '{\"image\":\"62430113c48c21648558355.png\",\"clientname\":\"Lima\",\"designation\":\"Ceo  Founder\",\"answer\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui obcaecati officia aliquam molestias nulla possimus? Maiores minus rem qui eligendi. Dolor magnam eveniet dignissimos aliquid vero nisi dolorum illum ratione.\"}', NULL, '2022-03-29 06:52:35', '2022-03-29 06:52:35'),
(44, 'testimonial.element', '{\"image\":\"6243014108b431648558401.png\",\"clientname\":\"Ross\",\"designation\":\"CEO Founder Google Inf\",\"answer\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui obcaecati officia aliquam molestias nulla possimus? Maiores minus rem qui eligendi. Dolor magnam eveniet dignissimos aliquid vero nisi dolorum illum ratione.\"}', NULL, '2022-03-29 06:53:21', '2022-03-29 06:53:21'),
(45, 'testimonial.element', '{\"image\":\"62447ea9ef6ac1648656041.jpg\",\"clientname\":\"Juba\",\"designation\":\"Dev\",\"answer\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui obcaecati officia aliquam molestias nulla possimus? Maiores minus rem qui eligendi. Dolor magnam eveniet dignissimos aliquid vero nisi dolorum illum ratione.\"}', NULL, '2022-03-29 06:53:58', '2022-03-30 10:00:42'),
(46, 'faq.element', '{\"question\":\"What should I include a File in App?\",\"answer\":\"n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available\"}', NULL, '2022-03-29 12:52:51', '2022-03-29 12:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(119) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=active, 0=deactivate',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `image`, `email_verified_at`, `verification_code`, `address`, `phone`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'ALEX', 'JOE', 'alex@gmail.com', NULL, '2022-07-05 08:39:26', NULL, NULL, NULL, '$2y$10$8EujrRHqM1g9wM/03RsMS.cUEZ7Yvq18wbEdV0RUqBOQyou80zDBa', 1, NULL, '2022-07-05 08:39:02', '2022-07-05 08:47:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `section_data`
--
ALTER TABLE `section_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_data_category_foreign` (`category`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section_data`
--
ALTER TABLE `section_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
