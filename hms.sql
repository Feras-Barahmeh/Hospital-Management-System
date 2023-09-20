-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2023 at 12:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$x/nscidIBXWqoxskBzFryOUj7GVdiLTTretT./Gu3dzwVtM14lKeW', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `created_at`, `updated_at`) VALUES
(1, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(2, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(3, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(4, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(5, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(6, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(7, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(8, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(9, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(10, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(11, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(12, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(13, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(14, '2023-09-20 11:56:41', '2023-09-20 11:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_translations`
--

CREATE TABLE `appointment_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_translations`
--

INSERT INTO `appointment_translations` (`id`, `locale`, `name`, `appointment_id`) VALUES
(1, 'en', 'Sunday', 1),
(2, 'en', 'Monday', 2),
(3, 'en', 'Tuesday', 3),
(4, 'en', 'Wednesday', 4),
(5, 'en', 'Thursday', 5),
(6, 'en', 'Friday', 6),
(7, 'en', 'Saturday', 7),
(8, 'ar', 'الأحد', 8),
(9, 'ar', 'الاثنين', 9),
(10, 'ar', 'الثلاثاء', 10),
(11, 'ar', 'الأربعاء', 11),
(12, 'ar', 'الخميس', 12),
(13, 'ar', 'الجمعة', 13),
(14, 'ar', 'السبت', 14);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `created_at`, `updated_at`) VALUES
(1, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(2, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(3, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(4, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(5, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(6, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(7, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(8, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(9, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(10, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(11, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(12, '2023-09-20 11:56:41', '2023-09-20 11:56:41'),
(13, '2023-09-20 11:56:42', '2023-09-20 11:56:42'),
(14, '2023-09-20 11:56:42', '2023-09-20 11:56:42'),
(15, '2023-09-20 11:56:42', '2023-09-20 11:56:42'),
(16, '2023-09-20 11:56:42', '2023-09-20 11:56:42'),
(17, '2023-09-20 11:56:42', '2023-09-20 11:56:42'),
(18, '2023-09-20 11:56:42', '2023-09-20 11:56:42'),
(19, '2023-09-20 11:56:42', '2023-09-20 11:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `department_translations`
--

CREATE TABLE `department_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_translations`
--

INSERT INTO `department_translations` (`id`, `locale`, `department_id`, `name`, `description`) VALUES
(1, 'en', 1, 'Emergency Department (ED)', 'Sint qui voluptas possimus doloribus quibusdam fugiat et nulla. Reprehenderit quo quam illum. Aliquam velit ullam quos qui illo rerum veritatis.'),
(2, 'en', 2, 'Nephrology Department', 'Ducimus aut et sunt. Quis sunt hic et sed. Perspiciatis dicta unde quisquam nam quis et. Et quis impedit nam quia.'),
(3, 'en', 3, 'Gastroenterology Department', 'Consequatur molestiae incidunt natus et cupiditate provident recusandae. Incidunt non est sunt et ad. Consequatur quaerat dolore ut laboriosam veniam. Dignissimos omnis id aut eius unde.'),
(4, 'en', 4, 'Dermatology Department', 'Quaerat temporibus molestias consequatur quia voluptatem ut inventore. Reprehenderit ducimus et deserunt veniam.'),
(5, 'en', 5, 'Pulmonology Department', 'Dolores facilis sint beatae ut qui vitae quisquam. Ullam molestias doloremque mollitia optio fugiat quam itaque quae. Porro quisquam sunt qui id et sint.'),
(6, 'en', 6, 'Intensive Care Unit (ICU)', 'Et veniam modi aut unde. Qui officiis quod velit sed minus nesciunt magnam. Et veniam ullam beatae consectetur sunt libero sapiente. Et quasi tenetur vero at enim quos.'),
(7, 'en', 7, 'Radiology Department', 'Voluptas sit optio ut. Quas aperiam maxime pariatur dolores quia. Ut in est eaque quia.'),
(8, 'en', 8, 'Neurology Department', 'Odit quis deserunt nihil numquam ex. Quod vel expedita odio sit in. Adipisci commodi a id in a unde beatae.'),
(9, 'en', 9, 'Anesthesiology Department', 'Et quam omnis adipisci labore nostrum. Numquam asperiores sapiente ad a.'),
(10, 'en', 10, 'Surgery Department', 'Dolores delectus est commodi cum laboriosam at earum. Sequi et repellendus totam qui quis quas ab. Voluptas nihil a quasi perspiciatis quos aut.'),
(11, 'en', 11, 'Obstetrics and Gynecology Department (OB/GYN)', 'Temporibus quia porro voluptates qui. Esse non assumenda rem dolor quos sed. Laboriosam dolorem maxime dicta perferendis aspernatur.'),
(12, 'en', 12, 'Pediatrics Department', 'Aut sit consequatur deserunt excepturi iste. Ex reprehenderit laborum qui deleniti et doloremque. Vitae cum minus velit ducimus distinctio omnis. Pariatur eius blanditiis enim exercitationem.'),
(13, 'en', 13, 'Internal Medicine Department', 'Rerum odit id in repellendus non accusamus temporibus. At omnis corrupti libero deserunt. Laboriosam eaque vel rerum officiis quis. Et vero omnis nobis.'),
(14, 'en', 14, 'ENT (Ear, Nose, and Throat) Department', 'Excepturi perferendis similique ad quas. Fugit fuga maiores voluptates et. Inventore nam laborum autem ab voluptates ex voluptas. Veritatis ipsum laboriosam aspernatur in aperiam.'),
(15, 'en', 15, 'Cardiology Department', 'Id soluta deleniti odit dolores sit et rem. Dolor provident voluptatem officiis ea nesciunt quis. Quia saepe illo eum suscipit. Blanditiis non consequuntur necessitatibus aspernatur ipsum corporis et. Et quod sed vel et ratione eius iusto.'),
(16, 'en', 16, 'Psychiatry Department', 'Eius natus voluptatem atque exercitationem qui. Ea facilis quidem omnis fugit eum deleniti iste. Expedita voluptatem quas eaque. Quos id tempora est explicabo est aut ut.'),
(17, 'en', 17, 'Oncology Department', 'Odit ducimus voluptas tempore rem cupiditate minus cum. Et porro quia reiciendis et aut ipsum. Et libero harum quia alias.'),
(18, 'en', 18, 'Urology Department', 'Quia eaque architecto doloremque nihil aut excepturi deleniti omnis. Aliquid nihil consectetur aut corporis voluptatem voluptatem. Maxime placeat ex assumenda quia aut.'),
(19, 'en', 19, 'Orthopedics Department', 'Fugiat expedita et corrupti autem iure eligendi repellendus. Omnis laudantium et natus rerum. Possimus eos perspiciatis aut at velit. Eos sed consectetur doloremque quia qui earum.');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `email`, `email_verified_at`, `password`, `phone`, `status`, `department_id`, `created_at`, `updated_at`) VALUES
(7, 'sigurd73@example.org', '2023-09-20 11:56:42', '$doctor$doctor', '+1.219.925.7092', 0, 6, '2023-09-20 11:56:44', '2023-09-20 16:42:11'),
(8, 'watsica.neoma@example.com', '2023-09-20 11:56:42', '$2y$10$.JkohP5rMq7PhB.qA.OcyuFKTtJFFUY67Bvj1BQ60uc7AA74oORhW', '(626) 327-2429', 1, 13, '2023-09-20 11:56:44', '2023-09-20 16:07:20'),
(9, 'moshe17@example.com', '2023-09-20 11:56:42', '$2y$10$1wv7tTL1pA/qKUKk/jlwKeZNGLTjYV5B8JKSZqFPXlvKuv8ejbNoS', '301-298-3384', 1, 10, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(10, 'phyllis.lubowitz@example.net', '2023-09-20 11:56:42', '$2y$10$Ii5MvY3UEjv8./gnUNH8pe78mKNcBBJmBo155AL9cB8agUoaloHyS', '248.963.2284', 1, 13, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(11, 'george.damore@example.org', '2023-09-20 11:56:42', '$2y$10$jP.sGChsJgn/kgOb8ajTfe0zvyPtuplyoR/EXC1KUuJXrbJl992RS', '1-848-467-0249', 1, 9, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(12, 'lavina.cole@example.org', '2023-09-20 11:56:42', '$2y$10$PWC6HLDA6Cem6SI0z08r4OgvyisnQY4FyxCsP25ATBpZ/Vh7rSUX.', '727.393.5307', 1, 15, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(13, 'imonahan@example.org', '2023-09-20 11:56:42', '$2y$10$wyf.tsWRDS1jBkuU2NY6ieJ7O.0STVdee5PBAtpjnJv8HMFe8gohC', '979-680-2563', 1, 9, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(14, 'shanelle92@example.net', '2023-09-20 11:56:42', '$2y$10$9clMEBvqTNBPknFlRJjNRuEaXpmGldkqaa47ZRQ4AGlAx0HUnU7Sy', '228-882-6986', 1, 9, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(15, 'ahill@example.net', '2023-09-20 11:56:42', '$2y$10$E161puDu/IR9lrSZJYKPM.0Xa0hVeu7N1IIwqvo6QDNO9rn8WQP56', '228.206.9012', 1, 11, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(16, 'tomasa27@example.net', '2023-09-20 11:56:42', '$2y$10$564Ua4F87yIURoSMB9jOpuyaxuj2ZTXW5a4P3MTkWh8y/qA.gEScK', '214.446.3436', 1, 17, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(17, 'torphy.abraham@example.org', '2023-09-20 11:56:42', '$2y$10$1SrAOi3V.az.DG3MkYyQFug.Ru6Hy6TBrOClf2oItbd9YQn2UbVcC', '1-202-414-9211', 1, 5, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(18, 'madilyn.koelpin@example.net', '2023-09-20 11:56:43', '$2y$10$pH.gQjG84duEDh9E9oND6u5UiAy8PM9mGj8km1uyxLefa34L/M03u', '+1 (838) 237-7405', 1, 18, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(19, 'larue90@example.org', '2023-09-20 11:56:43', '$2y$10$.R.e1LEAGW0ZDc0zXo4AKe49PbUK16IGXz9HAKrL3S2zEB27OXEAG', '+1 (361) 942-6554', 1, 3, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(20, 'coby.wilkinson@example.com', '2023-09-20 11:56:43', '$2y$10$v6QpgRx4q3pSICbFLBAQPeP0svUSnee6e0HwC6vfoPXhjpMUNo8Ue', '+18205699683', 1, 3, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(21, 'bconnelly@example.org', '2023-09-20 11:56:43', '$2y$10$rbSGVOv.glpc/SGo6KALvuVy9qhAcYmAch1DFCmhKTXAe8UY5lgAG', '360.390.7618', 1, 14, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(22, 'claude51@example.com', '2023-09-20 11:56:43', '$2y$10$MTYIzNnAzL147Ucs11woBO794ZsWf2dd8SzOus2YuhszXEkq.UlrW', '+1-920-645-5281', 1, 14, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(23, 'bradly45@example.com', '2023-09-20 11:56:43', '$2y$10$aV2PaFhfvQn47ignj4jezO79lTWCEj3KcQVKa75qiLsBBXzYVkxCq', '(985) 812-4151', 1, 5, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(24, 'stephen.kshlerin@example.org', '2023-09-20 11:56:43', '$2y$10$uZdApBzyokKZcRN1N7WY1ueMvyhxEvjIxZXX9zczGgpw/2l6HkcwK', '(629) 319-3762', 1, 14, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(25, 'soledad.reinger@example.org', '2023-09-20 11:56:43', '$2y$10$RCDqPdlAPTAaXH.abiz80OgZ6JRxxcdirHy73u1e9tzfq13mU414i', '1-938-430-9779', 1, 19, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(26, 'amos22@example.com', '2023-09-20 11:56:43', '$2y$10$rMF02/RiHeQr9dbI43hrLuWH5ZLT1l0N7bUnkbqJhCZh7.vivuoBu', '678.895.6023', 1, 7, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(27, 'cameron61@example.org', '2023-09-20 11:56:43', '$2y$10$feEdKgKJ5xSGmPoq.i/CWOmYejQJf35wzUXCJ9b47Lw0sJ2kjMuNC', '+1-321-374-4582', 1, 4, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(28, 'franecki.daphne@example.org', '2023-09-20 11:56:43', '$2y$10$LH0ATlZsnb79y9/X8Xn8m./5yO2ZXYql8AeKHZV/rjD95RplD9CZW', '+1.248.854.5108', 1, 17, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(29, 'morar.jaquan@example.net', '2023-09-20 11:56:43', '$2y$10$8aAq8JjTZBPWuvQO5ijN7egg9FZI4ThdFcsIgg24BQT4jF5m2ri4m', '443-785-6365', 1, 1, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(30, 'tre35@example.com', '2023-09-20 11:56:43', '$2y$10$kDCmcPkXe40aLbRwLU2eHOWrueizQvZ4UJfonu2pnbScbCGIpohLy', '1-941-435-2256', 1, 9, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(31, 'westley.bartoletti@example.net', '2023-09-20 11:56:43', '$2y$10$8k8Zft9Y45moBKxsgwqZt.vvV0Y1HRJpfJInEBY.LO4zKQ6PBTA.q', '1-574-227-1740', 1, 13, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(32, 'lelah65@example.org', '2023-09-20 11:56:43', '$2y$10$MmtqtZsNJjmU.cPmx.gwH.lHQMXx20CDqXVfMQfewEzn3rX9Jl8s6', '+1 (417) 512-7793', 1, 3, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(33, 'qconnelly@example.net', '2023-09-20 11:56:43', '$2y$10$Sx67xtW0hAjDu9J5MIqCbuymuSJtf2Aggvi7miXX4PmykkI1Dwe.K', '(903) 678-5789', 1, 15, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(34, 'jedediah78@example.net', '2023-09-20 11:56:43', '$2y$10$GdEFSXHhujydLviEm4NUb.d5PzJtE/sojQDMgzLjyuJc9e.KdXgfS', '+1-770-883-5126', 1, 18, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(35, 'retta41@example.net', '2023-09-20 11:56:43', '$2y$10$Kfm6sZX1O506mP9YpumbIebEtn6nF7m7ev0VYXKp88NszbAD.WE8y', '562.605.6291', 1, 2, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(36, 'kemmer.giovanny@example.org', '2023-09-20 11:56:43', '$2y$10$zHVEInOiXPwUhy3jRvFdteXRqh1lxH1KXiep3eAl1WWqckYNjG9ry', '(585) 416-0509', 1, 3, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(37, 'russel.peter@example.net', '2023-09-20 11:56:44', '$2y$10$XG21D7qGGO8.uRl9rnKAQ.8QSAceBd0tVSrqEBV0V7nb6Z2zsYUWm', '425.655.7127', 1, 2, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(38, 'emann@example.net', '2023-09-20 11:56:44', '$2y$10$F8FPlq2/4zFbAfAwh4U80ehkoOpFS6/vZhf4EH6I0jZokqJa.YhOG', '+1-262-971-0004', 1, 16, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(39, 'xmorar@example.com', '2023-09-20 11:56:44', '$2y$10$sjibzuSK7OPYRGH7piE2HuRIMEW.qDLfZWn1vifkp6Op723r.4ccC', '1-361-816-2242', 1, 16, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(40, 'arvid18@example.org', '2023-09-20 11:56:44', '$2y$10$n7N7gwWuozKRxivwYxrb9.kA86LsVCl5p1lUGxnyb8sxuXz6QFwWW', '(479) 354-2842', 1, 7, '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(41, 'FerasFadi@gmail.com', NULL, '$2y$10$T1nUeXXNsCJqbkQjeMSWr.ZDhbKaJd.1Ky8BV5k0yoyJCCtKsSJ8G', '0785102996', 1, 16, '2023-09-20 11:57:45', '2023-09-20 11:57:45'),
(42, 'MajdFadi@gmail.com', NULL, '$2y$10$JebBkeaIKD1zVAD6qjkWmuFqiFC/hLhNTO3lRhYsIbYs4k5ye4PbS', '0785102996', 1, 19, '2023-09-20 11:59:33', '2023-09-20 15:40:09'),
(43, 'BelalBarahmhe@gmail.com', NULL, '$2y$10$7diIWwyDBGMFSW2oTAfAQORr9a7D8Ap6r/p.XNOfl5eIo4tLu5CCm', '0785102996', 0, 19, '2023-09-20 19:18:53', '2023-09-20 19:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_translations`
--

CREATE TABLE `doctor_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `appointments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_translations`
--

INSERT INTO `doctor_translations` (`id`, `locale`, `doctor_id`, `name`, `appointments`) VALUES
(7, 'en', 7, 'Cornelius Morar', 'Tuesday'),
(8, 'en', 8, 'Ambrose Schmidt DDS', 'Tuesday'),
(9, 'en', 9, 'Abbey Carter', 'Monday'),
(10, 'en', 10, 'Miss Jada Nicolas DVM', 'Thursday'),
(11, 'en', 11, 'Ubaldo Bernhard', 'Thursday'),
(12, 'en', 12, 'Buster Brakus', 'Wednesday'),
(13, 'en', 13, 'Lambert Nader V', 'Friday'),
(14, 'en', 14, 'Mr. Maxwell McGlynn V', 'Friday'),
(15, 'en', 15, 'Dustin Daniel', 'Tuesday'),
(16, 'en', 16, 'Murphy Wyman', 'Sunday'),
(17, 'en', 17, 'Dr. Moriah Graham', 'Wednesday'),
(18, 'en', 18, 'Wendell Smitham', 'Tuesday'),
(19, 'en', 19, 'Dalton Schultz III', 'Friday'),
(20, 'en', 20, 'Dr. Gaylord Kunze Jr.', 'Monday'),
(21, 'en', 21, 'Ceasar Breitenberg Sr.', 'Wednesday'),
(22, 'en', 22, 'Ms. Maudie Spinka', 'Saturday'),
(23, 'en', 23, 'Jerome Jacobi', 'Wednesday'),
(24, 'en', 24, 'Jada Schimmel', 'Friday'),
(25, 'en', 25, 'Kacie Pagac', 'Saturday'),
(26, 'en', 26, 'Winfield Mohr', 'Thursday'),
(27, 'en', 27, 'Roma O\'Connell', 'Tuesday'),
(28, 'en', 28, 'Mr. Wilfredo Fisher IV', 'Friday'),
(29, 'en', 29, 'Mrs. Lessie Pagac', 'Monday'),
(30, 'en', 30, 'Bethel Murazik', 'Wednesday'),
(31, 'en', 31, 'Gordon Kohler', 'Thursday'),
(32, 'en', 32, 'Mafalda King', 'Monday'),
(33, 'en', 33, 'Mrs. Adella Sauer IV', 'Friday'),
(34, 'en', 34, 'Grayson Schinner', 'Saturday'),
(35, 'en', 35, 'Jamal Pfannerstill V', 'Saturday'),
(36, 'en', 36, 'Velda Stanton', 'Thursday'),
(37, 'en', 37, 'Royce Cormier', 'Monday'),
(38, 'en', 38, 'Prof. Hobart Lowe PhD', 'Wednesday'),
(39, 'en', 39, 'Zoey Runolfsdottir Sr.', 'Friday'),
(40, 'en', 40, 'Ara Smitham', 'Saturday'),
(41, 'en', 41, 'FerasFadi', 'Monday,Wednesday'),
(42, 'en', 42, 'MajdFadiMustafa', 'Monday,Thursday'),
(43, 'en', 43, 'Belal Barahmhe', 'Monday,Thursday');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(255) NOT NULL COMMENT 'column will contain the class name of the parent model',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(1, '3.png', 35, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(2, '4.png', 39, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(3, '3.png', 28, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(4, '4.png', 9, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(5, '1.png', 28, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(6, '3.png', 10, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(7, '1.png', 8, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(8, '3.png', 16, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(9, '3.png', 16, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(10, '3.png', 17, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(11, '4.png', 36, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(12, '4.png', 23, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(13, '2.png', 36, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(14, '1.png', 39, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(15, '3.png', 32, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(16, '2.png', 29, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(17, '3.png', 36, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(18, '4.png', 38, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(19, '2.png', 15, 'App\\Models\\Doctor', '2023-09-20 11:56:44', '2023-09-20 11:56:44'),
(21, '1.png', 18, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(22, '4.png', 38, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(23, '4.png', 34, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(25, '2.png', 32, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(26, '3.png', 25, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(27, '1.png', 33, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(28, '4.png', 15, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(29, '2.png', 12, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(30, '3.png', 31, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(31, '2.png', 28, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(32, '1.png', 28, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(33, '4.png', 10, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(34, '3.png', 38, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(35, '1.png', 2, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(36, '1.png', 31, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(37, '2.png', 35, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(38, '2.png', 3, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(39, '3.png', 33, 'App\\Models\\Doctor', '2023-09-20 11:56:45', '2023-09-20 11:56:45'),
(47, 'doctors/ferasfadi.png', 41, 'App\\Models\\Doctor', '2023-09-20 12:00:31', '2023-09-20 12:00:31'),
(48, 'doctors/majdfadi.png', 42, 'App\\Models\\Doctor', '2023-09-20 12:00:48', '2023-09-20 12:00:48'),
(49, 'doctors/testbug.png', 43, 'App\\Models\\Doctor', '2023-09-20 19:18:53', '2023-09-20 19:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_10_122421_create_admins_table', 1),
(6, '2023_09_12_211714_create_departments_table', 1),
(7, '2023_09_12_212453_create_department_translations_table', 1),
(8, '2023_09_16_093326_create_doctors_table', 1),
(9, '2023_09_16_093551_create_doctor_translations_table', 1),
(10, '2023_09_16_140526_create_images_table', 1),
(11, '2023_09_18_155335_create_appointments_table', 1),
(12, '2023_09_18_155440_create_appointment_translations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', NULL, '$2y$10$4BvM.ZGqOVPzWdimZBeh8uzvqyW2m5Xj8Y7PqjLh06fey1rcqpvBq', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_translations`
--
ALTER TABLE `appointment_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appointment_translations_appointment_id_locale_unique` (`appointment_id`,`locale`),
  ADD KEY `appointment_translations_locale_index` (`locale`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_translations`
--
ALTER TABLE `department_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_translations_department_id_locale_unique` (`department_id`,`locale`),
  ADD KEY `department_translations_locale_index` (`locale`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`),
  ADD KEY `doctors_department_id_foreign` (`department_id`);

--
-- Indexes for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctor_translations_doctor_id_locale_unique` (`doctor_id`,`locale`),
  ADD KEY `doctor_translations_locale_index` (`locale`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `appointment_translations`
--
ALTER TABLE `appointment_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `department_translations`
--
ALTER TABLE `department_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment_translations`
--
ALTER TABLE `appointment_translations`
  ADD CONSTRAINT `appointment_translations_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department_translations`
--
ALTER TABLE `department_translations`
  ADD CONSTRAINT `department_translations_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  ADD CONSTRAINT `doctor_translations_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
