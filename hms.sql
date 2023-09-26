-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2023 at 10:10 PM
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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$XjTDbcr/nyBokLR.I2kYz.2QGyZF2.ZKmQXTu2cua.lbTsiaTSx1W', NULL, NULL, NULL);

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
(1, '2023-09-26 15:37:23', '2023-09-26 15:37:23'),
(2, '2023-09-26 15:37:23', '2023-09-26 15:37:23'),
(3, '2023-09-26 15:37:23', '2023-09-26 15:37:23'),
(4, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(5, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(6, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(7, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(8, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(9, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(10, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(11, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(12, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(13, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(14, '2023-09-26 15:37:24', '2023-09-26 15:37:24');

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
-- Table structure for table `assistants`
--

CREATE TABLE `assistants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assistants`
--

INSERT INTO `assistants` (`id`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 20.00, 1, '2023-09-26 15:40:45', '2023-09-26 15:40:45'),
(2, 15.00, 1, '2023-09-26 15:40:56', '2023-09-26 15:40:56'),
(3, 50.00, 1, '2023-09-26 15:41:09', '2023-09-26 15:41:09');

-- --------------------------------------------------------

--
-- Table structure for table `assistant_package`
--

CREATE TABLE `assistant_package` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `assistant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assistant_package`
--

INSERT INTO `assistant_package` (`id`, `package_id`, `assistant_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 4, 2, NULL, NULL),
(5, 6, 2, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 7, 2, NULL, NULL),
(8, 7, 3, NULL, NULL),
(9, 7, 1, NULL, NULL),
(10, 8, 2, NULL, NULL),
(11, 9, 1, NULL, NULL),
(12, 10, 1, NULL, NULL),
(13, 11, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assistant_translations`
--

CREATE TABLE `assistant_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `assistant_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assistant_translations`
--

INSERT INTO `assistant_translations` (`id`, `locale`, `name`, `note`, `assistant_id`) VALUES
(1, 'en', 'Medical Consultations', NULL, 1),
(2, 'en', 'Diagnostic Testing', NULL, 2),
(3, 'en', 'Pharmacy Services', NULL, 3);

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
(1, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(2, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(3, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(4, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(5, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(6, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(7, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(8, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(9, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(10, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(11, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(12, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(13, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(14, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(15, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(16, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(17, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(18, '2023-09-26 15:37:24', '2023-09-26 15:37:24'),
(19, '2023-09-26 15:37:24', '2023-09-26 15:37:24');

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
(1, 'en', 1, 'Pulmonology Department', 'Hic molestiae quis aut possimus soluta asperiores in. Sit reprehenderit omnis nostrum quo. Sint quia mollitia laudantium.'),
(2, 'en', 2, 'Urology Department', 'In adipisci ut nesciunt qui nulla autem est. Vitae consequatur quisquam corporis aliquam velit eum incidunt voluptatum. Et aspernatur est commodi quibusdam ut deleniti. Dolores nulla quibusdam officia ut.'),
(3, 'en', 3, 'Pediatrics Department', 'Officia ut est odit facilis cumque illo eos. Voluptatem quibusdam tempore quo quia. Reiciendis accusantium necessitatibus ea aspernatur placeat. Amet et illum laborum occaecati cum ipsa.'),
(4, 'en', 4, 'Obstetrics and Gynecology Department (OB/GYN)', 'Consequatur vero ut voluptas voluptas facere accusamus nemo. Quam eveniet unde quo consequatur similique. Explicabo adipisci iste commodi facere.'),
(5, 'en', 5, 'Radiology Department', 'Voluptate animi reprehenderit sit. Necessitatibus dolorem eos fuga praesentium mollitia. Et numquam eos est magni similique consequatur. Rerum sed at velit non in quasi laudantium.'),
(6, 'en', 6, 'Nephrology Department', 'Earum sed sit incidunt magnam laborum enim est. Assumenda incidunt asperiores vero vel non corrupti. Dicta rem voluptas dicta.'),
(7, 'en', 7, 'Emergency Department (ED)', 'Temporibus commodi voluptatem est voluptas blanditiis modi aut. Omnis vel quos voluptatem nam. Distinctio vel velit dolores sapiente. Voluptas quo et sit quia consequatur in libero.'),
(8, 'en', 8, 'Intensive Care Unit (ICU)', 'Unde fugiat dolores id eos sit. Vitae distinctio quae blanditiis modi quisquam. Ea iure vel reprehenderit quos porro est aut odit. Fugit sint magni ipsam aut labore eos provident. Repudiandae quo et nesciunt dolorem asperiores et amet.'),
(9, 'en', 9, 'Oncology Department', 'Eum minima eaque et beatae. At ipsum in unde quia. Aperiam tenetur sapiente quasi occaecati nam sed.'),
(10, 'en', 10, 'Cardiology Department', 'Occaecati dolorum consequatur in. Voluptates quia ipsa animi qui sunt laboriosam in. Consectetur eligendi fugit amet et aut non laudantium. Nemo laborum ut et voluptatibus vitae id.'),
(11, 'en', 11, 'Internal Medicine Department', 'Eius vitae suscipit minima ad autem. Quaerat aut perspiciatis dolorum sed cupiditate sed. Et tempora quaerat eius distinctio. Voluptatibus ullam reiciendis aliquid incidunt nihil cupiditate.'),
(12, 'en', 12, 'Gastroenterology Department', 'Tenetur ea qui beatae animi rerum eaque. Dolor occaecati accusamus dolor molestiae suscipit corporis. Consequatur ducimus eaque est tenetur in.'),
(13, 'en', 13, 'Psychiatry Department', 'In rerum quia corrupti sapiente quaerat maiores molestiae. Vitae dolores saepe perspiciatis molestiae laborum. Doloribus dicta fuga porro architecto.'),
(14, 'en', 14, 'Anesthesiology Department', 'Aut adipisci et expedita rerum aut unde omnis. Natus et libero mollitia alias. Quia fuga dolor ipsam voluptas repudiandae mollitia.'),
(15, 'en', 15, 'Surgery Department', 'Maxime accusamus iusto itaque quaerat explicabo illum est cum. Vero laborum impedit ab sit. Ut voluptatem et sit quidem. Explicabo est id qui dicta unde.'),
(16, 'en', 16, 'ENT (Ear, Nose, and Throat) Department', 'Voluptatem tempore nihil ab facilis cum. Tenetur sint ut repellendus occaecati ea quibusdam sed. Debitis quod placeat omnis quo. Ut qui distinctio rerum cum et.'),
(17, 'en', 17, 'Neurology Department', 'Id consectetur dolorum in qui non. Aperiam eaque velit magnam assumenda. Atque perspiciatis aliquid in perspiciatis consectetur voluptatibus.'),
(18, 'en', 18, 'Dermatology Department', 'Laborum omnis excepturi dolorem nihil quidem rerum pariatur assumenda. Amet cumque eaque temporibus cupiditate vitae. Quaerat voluptatibus fuga quisquam sed voluptatem nam explicabo. Maxime impedit ut aut perspiciatis.'),
(19, 'en', 19, 'Orthopedics Department', 'Distinctio praesentium iste delectus. Voluptatem reprehenderit cumque sunt quos qui sit. Non facere accusantium voluptate ut.');

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
(1, 'shaniya27@example.com', '2023-09-26 15:37:24', '$2y$10$TLjsW/06SeEKVbF1tvl6gulrcvoPSMrs3XjTupkMKRnytdiftPubW', '+15019246677', 1, 8, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(2, 'jammie.mosciski@example.com', '2023-09-26 15:37:24', '$2y$10$9D/EEKX0MxLAFjJ0gO3YZOoemrH8KSxEpfY64.EUpZ6dg8XUYv.Yi', '+1-220-312-5938', 1, 18, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(3, 'marcelle36@example.org', '2023-09-26 15:37:24', '$2y$10$JuPApwc3j0KioVR6IPcbruGPQhrHfhF5EScN6IRc2Ms6slUBsCQGi', '+1.531.267.9314', 1, 11, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(4, 'melisa.ohara@example.net', '2023-09-26 15:37:24', '$2y$10$khpfuQ2emPpg11ULiTh9Tu70rr1VALQ6YRfX3pa6JA.ib/vVa93ba', '662-420-8043', 1, 3, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(5, 'chanel19@example.com', '2023-09-26 15:37:24', '$2y$10$k.cRqxFROgEESiKGNkelmOKO6BlcyiiDepXqUFGSm5GyzgsDEc6yG', '(312) 824-3502', 1, 10, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(6, 'kolson@example.net', '2023-09-26 15:37:24', '$2y$10$T6JNj.RP9thE7u0aawe2xOAOyXoM9tID/LoR6q.euXCwfgzLNuUCW', '281-859-0501', 1, 2, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(7, 'blockman@example.net', '2023-09-26 15:37:24', '$2y$10$LMKno97akZZ9P5lBE99wjezxalDrl4jOmF.9WAbMaj7Vzsm72yeRy', '+1-283-436-4701', 1, 18, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(8, 'ppagac@example.org', '2023-09-26 15:37:24', '$2y$10$IQ.rVq5lZb.xWjlHi7nUX./rxd1Tvx.gFQKWb6OScZDLfCfT5IUpm', '+1-951-857-2541', 1, 19, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(9, 'rjohns@example.org', '2023-09-26 15:37:25', '$2y$10$WJSApezHpQSsrFXMKYgLyuhpLe6c7lzi3X9T2lex296Bay4zLkpEW', '+1.608.506.8835', 1, 8, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(10, 'lexus.zboncak@example.com', '2023-09-26 15:37:25', '$2y$10$1j7JffaQLigBs1B7l/.SWuB667uhFNSWrgFSnDntXfhZv0cI4.RbS', '704.853.3996', 1, 19, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(11, 'donnelly.velda@example.net', '2023-09-26 15:37:25', '$2y$10$giJgVMO5Py3EKMljix.sTOnHuAtwQCTTel1w/ot.exar.7avINucC', '+1-470-376-3968', 1, 19, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(12, 'zkozey@example.com', '2023-09-26 15:37:25', '$2y$10$orsmKD.wbNSHc7dksJF7tesWzLnwn5w.Gtm1Chll0g9kY0Nfp4ggG', '1-773-603-3692', 1, 13, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(13, 'alexander86@example.com', '2023-09-26 15:37:25', '$2y$10$IKvOyYFxf/pFolnp.AZdBOm8R3pMoYOxjEMQZbLkn1fjlsU7IJ6Jy', '310-871-5124', 1, 4, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(14, 'littel.archibald@example.net', '2023-09-26 15:37:25', '$2y$10$oZvQMk0ghuC6OWpLv2JJJ.griJLJbT28.ZezdzdCRFScO34Ptn6YW', '458-949-1357', 1, 10, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(15, 'donato.hane@example.org', '2023-09-26 15:37:25', '$2y$10$VEwZsBRFt.7sLvzx82As0uRCWywSLRMflSspqeA4JqPYR3A/KQoLy', '+1 (704) 713-0429', 1, 12, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(16, 'bonita.dooley@example.org', '2023-09-26 15:37:25', '$2y$10$dER/8eUHsy3sSScOJc1Bmuf9M2tuvf/w54qimIktg0HoYIgyXkkZ6', '(203) 273-9357', 1, 2, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(17, 'leonora.ferry@example.org', '2023-09-26 15:37:25', '$2y$10$sBFsL4WrnBDem.UR1ZavG.NcNa6VxjrE7j0BW78aF/tMRY.VShJhO', '+1.657.888.3877', 1, 12, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(18, 'kirsten35@example.com', '2023-09-26 15:37:25', '$2y$10$JSPhPDETRz.qvborxXKHKeVWM6P4UN5c6QRD00fDBIDPJlliEZbRe', '+12183214352', 1, 7, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(19, 'terrence81@example.org', '2023-09-26 15:37:25', '$2y$10$sP1lud5YFccSNNlIdFkBqOz3vVcTGgqaGuGVZ5J/ujZmcOfExygVa', '1-985-508-6055', 1, 16, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(20, 'ablanda@example.net', '2023-09-26 15:37:25', '$2y$10$d9wlnkqwIn/8TESXtx5OxO1vCOSggpRfpokZz0rvBKjXiY4b6yfvW', '+1-347-446-0338', 1, 12, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(21, 'ryan.ian@example.net', '2023-09-26 15:37:25', '$2y$10$Mh5na6P53ILnCtFiqUugh.0OYBwFVzMVaIxfNqr6BGGj4Accj6PP.', '336.581.5693', 1, 4, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(22, 'brown.lelah@example.org', '2023-09-26 15:37:25', '$2y$10$dKI6Y6JiQsB6QWs0jcgH0.erSsYllADqRSksWIpFWLAqPNVs3c0AC', '+1-806-541-0415', 1, 11, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(23, 'elta49@example.net', '2023-09-26 15:37:25', '$2y$10$1fG708kNykRUVR59uL.HGOA/QPeHgkOoMvXQRk0Vhjuj7Qm7JPwl.', '+1.216.518.5332', 1, 18, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(24, 'pink.hudson@example.net', '2023-09-26 15:37:25', '$2y$10$7kmZJdrROS.iyQJimeZXyu2Sap9eq.VUoVojxEkOwATQka2GPtFHC', '281-328-2307', 1, 14, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(25, 'bogisich.ebba@example.org', '2023-09-26 15:37:25', '$2y$10$hax.ri4syG2aEABJkh.rQOZvCGu6ePwfSeOd4QPHRRzdAdMZ4KUkO', '1-720-214-5925', 1, 5, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(26, 'kschroeder@example.com', '2023-09-26 15:37:25', '$2y$10$t6DHPTgn.j9Ykd6hOAco6.jU1Dcw8hZi7UZ6qMN4M0dNPAyDKjz92', '+1-678-739-1661', 1, 3, '2023-09-26 15:37:26', '2023-09-26 15:37:26'),
(27, 'wroberts@example.org', '2023-09-26 15:37:25', '$2y$10$zhjYd8RUUCdFCAtS/2WYF./XpU.piEEGr.1T8go63QmOnsBOPw6su', '+1-812-641-7327', 1, 2, '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(28, 'kwest@example.org', '2023-09-26 15:37:25', '$2y$10$Tzn36v3Cq0kroPESwOqy6u.fa.09zuPyZQRTcs1aGuNMVJvD2oKjy', '(740) 919-6426', 1, 6, '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(29, 'albin.lindgren@example.com', '2023-09-26 15:37:26', '$2y$10$7pE/MNdTlQzJRutv3lR5duqnb6QkyON9Utc1CyDO9hEmANwFTP01O', '(651) 524-8995', 1, 18, '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(30, 'hane.estefania@example.org', '2023-09-26 15:37:26', '$2y$10$FtMheg1ubTq7pe8z0t36luHyrIuqS0BGUDdrA0Jjp9nSZC0d2v1Ie', '(678) 658-2020', 1, 19, '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(31, 'maud18@example.com', '2023-09-26 15:37:26', '$2y$10$8XLQSXF1BJNVI3Udg7ompO12IRY.dYaS7a6moLB72Nnp3uSA.iEz6', '858.730.0020', 1, 4, '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(32, 'haley.gerlach@example.org', '2023-09-26 15:37:26', '$2y$10$8JfVdV3xJzZ9SrFiBF9TuOP.tcukjN8KDebm9leXJf0RM5cvDzIHu', '+1-929-318-3761', 1, 3, '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(33, 'libby.kutch@example.org', '2023-09-26 15:37:26', '$2y$10$6Cz8qsg2Z1EKqvBa84uu1uR5rPK./aQXu4NUzDGGcZhZKFMT81ujq', '+1.831.856.1527', 1, 13, '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(34, 'joaquin.gibson@example.org', '2023-09-26 15:37:26', '$2y$10$6wduknQx6bfEmB1f.n8yL.pZ1P7bPMzOhnNBdvldyD.e4GwjB7TLi', '775-391-3504', 1, 13, '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(35, 'ualtenwerth@example.org', '2023-09-26 15:37:26', '$2y$10$dFqBr.Ske.eDQ6TS2S5.V.W4adScLJECMizSI3U02HBogsZbRAr0.', '+12625202309', 1, 5, '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(36, 'gaylord.tremayne@example.com', '2023-09-26 15:37:26', '$2y$10$iq2qibh5JNEz9T7d/i2glez.7H.1A4qJ2eadbl9s6Q9GvoFZJIcI6', '+1-732-844-6690', 1, 8, '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(37, 'pierce.shields@example.net', '2023-09-26 15:37:26', '$2y$10$c2PJCY2EusT30MlbI/iQbeLjZbDaknUOjuiPj7HcV4qELlglMvZy2', '386-925-9011', 1, 15, '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(38, 'kuhn.johnpaul@example.org', '2023-09-26 15:37:26', '$2y$10$bSrxAk0aHX1rw39Nj1RK9OKrFphgzrLzSXbMq7Xmld7GCJrW33Ka.', '+1-906-989-3990', 1, 9, '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(39, 'elta.bergstrom@example.org', '2023-09-26 15:37:26', '$2y$10$KsIx8bFqsSdgWLBcZSfh9O6NgejVqMTRZfWQk/9HO1pIlhBCkekqm', '917.277.5475', 1, 1, '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(40, 'leta.gulgowski@example.com', '2023-09-26 15:37:26', '$2y$10$Tu0cJ7eYumMdVB/YaMrBN.bU3IM/jYEm74AQixft8gzLXFy1DADZC', '1-727-310-0021', 1, 18, '2023-09-26 15:37:27', '2023-09-26 15:37:27');

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
(1, 'en', 1, 'Marge Runolfsson', 'Monday'),
(2, 'en', 2, 'Prof. Casandra Shanahan V', 'Wednesday'),
(3, 'en', 3, 'Ms. Estelle Klein', 'Monday'),
(4, 'en', 4, 'Violet Feeney', 'Friday'),
(5, 'en', 5, 'Geraldine Rempel', 'Friday'),
(6, 'en', 6, 'Helga Glover', 'Wednesday'),
(7, 'en', 7, 'Mrs. Tara Torp PhD', 'Saturday'),
(8, 'en', 8, 'Ms. Allie Gerlach', 'Monday'),
(9, 'en', 9, 'Valentine Brekke', 'Monday'),
(10, 'en', 10, 'Dakota Hayes', 'Friday'),
(11, 'en', 11, 'Prof. Murphy Skiles', 'Thursday'),
(12, 'en', 12, 'Prof. Sylvia Kreiger V', 'Monday'),
(13, 'en', 13, 'Mr. Mason Ernser', 'Thursday'),
(14, 'en', 14, 'Ernestina Heathcote', 'Saturday'),
(15, 'en', 15, 'Keaton Barton', 'Thursday'),
(16, 'en', 16, 'Jessyca Osinski', 'Wednesday'),
(17, 'en', 17, 'Tremaine Mills IV', 'Monday'),
(18, 'en', 18, 'Celestino Mosciski', 'Saturday'),
(19, 'en', 19, 'Mr. Bernardo Rogahn', 'Saturday'),
(20, 'en', 20, 'Madilyn Parker', 'Wednesday'),
(21, 'en', 21, 'Dorcas Hahn', 'Friday'),
(22, 'en', 22, 'Rose Stiedemann', 'Saturday'),
(23, 'en', 23, 'Miss Grace Hessel I', 'Sunday'),
(24, 'en', 24, 'Ms. Heloise Murphy', 'Saturday'),
(25, 'en', 25, 'Verona Keebler', 'Saturday'),
(26, 'en', 26, 'Prof. Dudley Reinger', 'Thursday'),
(27, 'en', 27, 'Gay Wilkinson MD', 'Tuesday'),
(28, 'en', 28, 'Valentine Borer', 'Thursday'),
(29, 'en', 29, 'Adela Renner', 'Friday'),
(30, 'en', 30, 'Dr. Willis Armstrong', 'Tuesday'),
(31, 'en', 31, 'Ola Johnson', 'Thursday'),
(32, 'en', 32, 'Demond Botsford', 'Saturday'),
(33, 'en', 33, 'Samir Dicki', 'Thursday'),
(34, 'en', 34, 'Tobin Witting II', 'Thursday'),
(35, 'en', 35, 'Mrs. Bettie Blanda II', 'Thursday'),
(36, 'en', 36, 'Osvaldo Prohaska', 'Tuesday'),
(37, 'en', 37, 'Millie Jacobi', 'Tuesday'),
(38, 'en', 38, 'Noe Bartell', 'Sunday'),
(39, 'en', 39, 'Gabe Osinski', 'Tuesday'),
(40, 'en', 40, 'Mrs. Anabel Bernhard', 'Tuesday');

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
(1, '2.png', 11, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(2, '3.png', 24, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(3, '4.png', 33, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(4, '3.png', 13, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(5, '4.png', 32, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(6, '3.png', 6, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(7, '4.png', 16, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(8, '1.png', 21, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(9, '1.png', 3, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(10, '3.png', 10, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(11, '2.png', 31, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(12, '3.png', 3, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(13, '3.png', 27, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(14, '2.png', 5, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(15, '3.png', 12, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(16, '1.png', 30, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(17, '2.png', 30, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(18, '2.png', 22, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(19, '4.png', 26, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(20, '1.png', 15, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(21, '3.png', 6, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(22, '3.png', 1, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(23, '2.png', 37, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(24, '1.png', 33, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(25, '1.png', 31, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(26, '1.png', 10, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(27, '1.png', 35, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(28, '2.png', 22, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(29, '3.png', 24, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(30, '3.png', 36, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(31, '4.png', 34, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(32, '4.png', 38, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(33, '2.png', 25, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(34, '3.png', 30, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(35, '1.png', 32, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(36, '1.png', 36, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(37, '1.png', 7, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(38, '1.png', 29, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(39, '3.png', 28, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27'),
(40, '1.png', 12, 'App\\Models\\Doctor', '2023-09-26 15:37:27', '2023-09-26 15:37:27');

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
(12, '2023_09_18_155440_create_appointment_translations_table', 1),
(13, '2023_09_21_134221_create_assistants_table', 1),
(14, '2023_09_21_134311_create_assistant_translations_table', 1),
(15, '2023_09_24_123905_create_packages_table', 1),
(16, '2023_09_24_123917_create_package_translations_table', 1),
(17, '2023_09_24_123928_create_pivot_assistant_package_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_before_discount` decimal(8,2) NOT NULL,
  `total_after_discount` decimal(8,2) NOT NULL,
  `discount_amount` decimal(8,2) NOT NULL,
  `tax` double(4,2) NOT NULL,
  `out_the_door_price` decimal(8,2) NOT NULL COMMENT 'amount with price',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `total_before_discount`, `total_after_discount`, `discount_amount`, `tax`, `out_the_door_price`, `created_at`, `updated_at`) VALUES
(1, 15.00, 15.00, 0.00, 5.00, 15.75, '2023-09-26 15:41:27', '2023-09-26 15:41:27'),
(2, 15.00, 15.00, 0.00, 5.00, 15.75, '2023-09-26 15:41:30', '2023-09-26 15:41:30'),
(3, 15.00, 15.00, 0.00, 5.00, 15.75, '2023-09-26 15:41:31', '2023-09-26 15:41:31'),
(4, 15.00, 15.00, 0.00, 5.00, 15.75, '2023-09-26 15:41:32', '2023-09-26 15:41:32'),
(5, 20.00, 20.00, 0.00, 5.00, 21.00, '2023-09-26 15:41:53', '2023-09-26 15:41:53'),
(6, 35.00, 35.00, 0.00, 5.00, 36.75, '2023-09-26 15:45:14', '2023-09-26 15:45:14'),
(7, 115.00, 15.00, 100.00, 10.00, 116.50, '2023-09-26 15:49:32', '2023-09-26 15:49:32'),
(8, 15.00, 15.00, 0.00, 5.00, 15.75, '2023-09-26 16:41:59', '2023-09-26 16:41:59'),
(9, 20.00, 20.00, 0.00, 5.00, 21.00, '2023-09-26 16:43:26', '2023-09-26 16:43:26'),
(10, 20.00, 20.00, 0.00, 5.00, 21.00, '2023-09-26 16:45:00', '2023-09-26 16:45:00'),
(11, 20.00, 20.00, 0.00, 5.00, 21.00, '2023-09-26 17:01:32', '2023-09-26 17:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `package_translations`
--

CREATE TABLE `package_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package_translations`
--

INSERT INTO `package_translations` (`id`, `locale`, `package_name`, `description`, `package_id`) VALUES
(1, 'en', 'name', 'note', 1),
(2, 'en', 'name', 'note', 2),
(3, 'en', 'name', 'note', 3),
(4, 'en', 'name', 'note', 4),
(5, 'en', '', '', 5),
(6, 'en', '', '', 6),
(7, 'en', '', '', 7),
(8, 'en', 'name', '', 8),
(9, 'en', 'name', '', 9),
(10, 'en', 'name', '', 10),
(11, 'en', 'name', '', 11);

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
(1, 'user', 'user@gmail.com', NULL, '$2y$10$GSn5FLtEeQFzOe6ZHKfkMe0cwGhoR59d59ZOuTX14Be2cR095XYDm', NULL, NULL, NULL);

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
-- Indexes for table `assistants`
--
ALTER TABLE `assistants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assistant_package`
--
ALTER TABLE `assistant_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assistant_package_package_id_foreign` (`package_id`),
  ADD KEY `assistant_package_assistant_id_foreign` (`assistant_id`);

--
-- Indexes for table `assistant_translations`
--
ALTER TABLE `assistant_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assistant_translations_name_note_assistant_id_locale_unique` (`name`,`note`,`assistant_id`,`locale`) USING HASH,
  ADD KEY `assistant_translations_assistant_id_foreign` (`assistant_id`),
  ADD KEY `assistant_translations_locale_index` (`locale`);

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
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_translations`
--
ALTER TABLE `package_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `package_translations_package_id_locale_package_name_unique` (`package_id`,`locale`,`package_name`),
  ADD KEY `package_translations_locale_index` (`locale`);

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
-- AUTO_INCREMENT for table `assistants`
--
ALTER TABLE `assistants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assistant_package`
--
ALTER TABLE `assistant_package`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `assistant_translations`
--
ALTER TABLE `assistant_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `doctor_translations`
--
ALTER TABLE `doctor_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `package_translations`
--
ALTER TABLE `package_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Constraints for table `assistant_package`
--
ALTER TABLE `assistant_package`
  ADD CONSTRAINT `assistant_package_assistant_id_foreign` FOREIGN KEY (`assistant_id`) REFERENCES `assistants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assistant_package_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `assistant_translations`
--
ALTER TABLE `assistant_translations`
  ADD CONSTRAINT `assistant_translations_assistant_id_foreign` FOREIGN KEY (`assistant_id`) REFERENCES `assistants` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `package_translations`
--
ALTER TABLE `package_translations`
  ADD CONSTRAINT `package_translations_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
