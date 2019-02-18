-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2018 at 01:16 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umucyo`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `room_id`, `marks`, `teacher_id`, `lesson_id`, `created_at`, `updated_at`) VALUES
(1, '2nd Term Exam', 1, 100, 1, 1, '2018-09-10 14:59:32', '2018-09-10 14:59:32'),
(2, 'Electronics Exam', 1, 40, 1, 2, '2018-09-10 15:00:44', '2018-09-10 15:00:44'),
(3, 'Informatics Exams', 1, 80, 1, 3, '2018-09-10 15:01:30', '2018-09-10 15:01:30'),
(4, 'Francais', 1, 10, 2, 4, '2018-09-13 08:06:21', '2018-09-13 08:06:21'),
(5, 'Difficult Exam', 2, 40, 1, 8, '2018-09-16 03:39:31', '2018-09-16 03:39:31'),
(6, 'Drawing Exam', 2, 20, 1, 9, '2018-09-16 03:40:12', '2018-09-16 03:40:12'),
(7, 'Difficult Exam', 2, 30, 2, 6, '2018-09-16 03:48:55', '2018-09-16 03:48:55'),
(8, 'Examination', 2, 40, 2, 7, '2018-09-16 03:49:30', '2018-09-16 03:49:30'),
(11, 'Exam', 1, 40, 2, 5, '2018-09-16 03:58:53', '2018-09-16 03:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `room_id`, `hours`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 'Mathematics', 1, '3', 1, '2018-09-10 14:51:58', '2018-09-10 14:51:58'),
(2, 'Electronics', 1, '4', 1, '2018-09-10 14:52:26', '2018-09-10 14:52:26'),
(3, 'Informatics', 1, '8', 1, '2018-09-10 14:53:35', '2018-09-10 14:53:35'),
(4, 'Francais', 1, '1', 2, '2018-09-12 15:01:19', '2018-09-12 15:01:19'),
(5, 'English', 1, '2', 2, '2018-09-13 08:41:36', '2018-09-13 08:41:36'),
(6, 'Power Electronics', 2, '4', 2, '2018-09-15 14:37:07', '2018-09-16 03:30:21'),
(7, 'General Electronics', 2, '4', 2, '2018-09-15 14:52:01', '2018-09-15 14:52:01'),
(8, 'Analog And Digital Signal', 2, '3', 1, '2018-09-15 14:53:03', '2018-09-15 14:53:03'),
(9, 'DCG', 2, '2', 1, '2018-09-16 03:30:47', '2018-09-16 03:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Test Level', '2018-09-10 14:44:29', '2018-09-10 14:44:29'),
(2, 'Senior Six', '2018-09-15 14:35:42', '2018-09-15 14:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `marks` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `quiz_id`, `student_id`, `lesson_id`, `total`, `marks`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 120, 110, '2018-09-10 14:56:11', '2018-09-16 03:36:49'),
(2, 1, 2, 1, 120, 70, '2018-09-10 14:56:11', '2018-09-16 03:36:55'),
(3, 1, 3, 1, 120, 60, '2018-09-10 14:56:11', '2018-09-16 03:36:58'),
(4, 2, 1, 2, 20, 18, '2018-09-10 14:57:18', '2018-09-10 15:02:12'),
(5, 2, 2, 2, 20, 15, '2018-09-10 14:57:18', '2018-09-10 15:02:10'),
(6, 2, 3, 2, 20, 5, '2018-09-10 14:57:19', '2018-09-10 15:02:07'),
(7, 3, 1, 3, 10, 9, '2018-09-10 14:58:55', '2018-09-16 03:36:18'),
(8, 3, 2, 3, 10, 8, '2018-09-10 14:58:55', '2018-09-16 03:36:13'),
(9, 3, 3, 3, 10, 9, '2018-09-10 14:58:55', '2018-09-16 03:36:11'),
(13, 3, 4, 3, 10, 4, '2018-09-12 12:27:53', '2018-09-16 03:36:19'),
(14, 2, 4, 2, 20, 19, '2018-09-12 12:28:35', '2018-09-12 12:28:35'),
(15, 1, 4, 1, 120, 100, '2018-09-12 12:28:48', '2018-09-12 12:28:48'),
(16, 4, 1, 4, 10, 7, '2018-09-13 08:05:39', '2018-09-13 08:06:05'),
(17, 4, 2, 4, 10, 3, '2018-09-13 08:05:39', '2018-09-13 08:06:03'),
(18, 4, 3, 4, 10, 6, '2018-09-13 08:05:39', '2018-09-13 08:06:01'),
(19, 4, 4, 4, 10, 9, '2018-09-13 08:05:39', '2018-09-13 08:06:07'),
(20, 5, 1, 5, 20, 17, '2018-09-15 16:37:20', '2018-09-16 04:02:45'),
(21, 5, 2, 5, 20, 14, '2018-09-15 16:37:20', '2018-09-16 04:02:40'),
(22, 5, 3, 5, 20, 13, '2018-09-15 16:37:20', '2018-09-16 04:02:14'),
(23, 5, 4, 5, 20, 18, '2018-09-15 16:37:20', '2018-09-16 04:02:48'),
(24, 6, 5, 8, 120, 50, '2018-09-16 03:32:31', '2018-09-16 03:35:45'),
(25, 6, 7, 8, 120, 70, '2018-09-16 03:32:31', '2018-09-16 03:35:41'),
(26, 6, 9, 8, 120, 100, '2018-09-16 03:32:31', '2018-09-16 03:35:43'),
(27, 7, 5, 9, 5, 2, '2018-09-16 03:34:29', '2018-09-16 03:35:27'),
(28, 7, 7, 9, 5, 3, '2018-09-16 03:34:29', '2018-09-16 03:35:22'),
(29, 7, 9, 9, 5, 5, '2018-09-16 03:34:29', '2018-09-16 03:35:25'),
(30, 8, 5, 6, 80, 53, '2018-09-16 03:46:55', '2018-09-16 03:48:09'),
(31, 8, 7, 6, 80, 60, '2018-09-16 03:46:55', '2018-09-16 03:47:58'),
(32, 8, 9, 6, 80, 74, '2018-09-16 03:46:55', '2018-09-16 03:48:02'),
(33, 9, 5, 7, 40, 35, '2018-09-16 03:47:12', '2018-09-16 03:47:37'),
(34, 9, 7, 7, 40, 30, '2018-09-16 03:47:12', '2018-09-16 03:47:29'),
(35, 9, 9, 7, 40, 40, '2018-09-16 03:47:12', '2018-09-16 03:47:35'),
(40, 11, 1, 5, 40, 32, '2018-09-16 04:00:04', '2018-09-16 04:01:04'),
(41, 11, 2, 5, 40, 30, '2018-09-16 04:00:04', '2018-09-16 04:01:02'),
(42, 11, 3, 5, 40, 20, '2018-09-16 04:00:04', '2018-09-16 04:00:55'),
(43, 11, 4, 5, 40, 33, '2018-09-16 04:00:04', '2018-09-16 04:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `mark__archives`
--

CREATE TABLE `mark__archives` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `quiz` int(11) DEFAULT NULL,
  `exam` int(11) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `student_id`, `title`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Greet', 'Hello', 1, '2018-09-11 07:48:44', '2018-09-11 07:49:06'),
(2, 3, 'Greet Again', 'Hello Again', 1, '2018-05-09 07:53:33', '2018-06-13 07:54:01'),
(3, 3, 'Hello', 'Hello Parents', 1, '2018-09-11 15:47:19', '2018-09-11 15:47:42'),
(4, 3, 'umwana', 'umwana yarananiranye,', 1, '2018-09-11 15:48:08', '2018-09-11 15:48:21'),
(5, 1, 'Announce', 'Your students is really genius', 1, '2018-09-11 16:13:56', '2018-09-11 16:14:29'),
(6, 1, 'Greet', 'Hello Parents', 1, '2018-09-11 16:14:20', '2018-09-11 16:14:29'),
(7, 1, 'Inama', 'Tariki ya 23/09/2029 hari inama ya babyeyi', 1, '2018-09-11 16:15:21', '2018-09-11 16:15:29'),
(8, 4, 'Hello', 'Hello Parents', 1, '2018-09-12 12:50:19', '2018-09-16 04:48:14'),
(9, 4, 'Inform', 'You have a fuckin\' genius student', 1, '2018-09-12 12:55:24', '2018-09-16 04:48:14'),
(10, 4, 'Conduct', 'Umwana wanyu ni ikirara aheruste gukubita animatric none tumuhaye weekend yibyumweru bibiri. Mumwiteho.', 1, '2018-09-12 12:57:20', '2018-09-16 04:48:14'),
(11, 4, 'Greet', 'Hello Parents', 1, '2018-09-13 08:23:53', '2018-09-16 04:48:14'),
(13, 4, 'Hello', 'Hello parents', 1, '2018-09-13 08:49:51', '2018-09-16 04:48:14'),
(15, 0, 'Hello Again', 'Hello Parents', 1, '2018-09-13 15:04:39', '2018-09-13 15:14:58'),
(16, 0, 'Defense', 'Turamenyesha ababyeyi bose bafite abana muri senior six ko hari defense za project zabanyeshuri. Muboherereze amafaranga yibitabo.', 1, '2018-09-13 15:26:44', '2018-09-16 04:42:03'),
(18, 0, 'Announce', 'Ababyeyi bafite abana muri level turabamenyeshako abana babo bazataha tariki 1/10/2018 baje muri stage. Mube mubashakira stage. Murakoze.', 1, '2018-09-13 15:55:30', '2018-09-16 04:42:03'),
(19, 0, 'Greet', 'Fuck You All Parents', 1, '2018-09-13 15:58:33', '2018-09-16 04:42:03'),
(20, 4, 'Answer', 'Thanks. We are helping your student well, and i believe there will be changes in exams.', 1, '2018-09-16 04:48:05', '2018-09-16 04:48:14');

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
(1, '2018_06_02_005415_create_levels_table', 1),
(2, '2018_06_03_052856_create_students_table', 2),
(3, '2018_06_23_063101_create_messages_table', 2),
(4, '2018_06_24_110244_create_sends_table', 2),
(5, '2018_07_06_164251_create_lessons_table', 2),
(6, '2018_07_06_164436_create_teachers_table', 2),
(7, '2018_07_08_104611_room_teacher', 2),
(8, '2018_07_12_105916_create_quizzes_table', 2),
(9, '2018_07_13_073147_create_marks_table', 2),
(10, '2018_07_14_111807_create_exams_table', 2),
(11, '2018_07_14_120357_create_totals_table', 2),
(12, '2018_08_01_100354_create_sents_table', 2),
(13, '2018_08_14_171637_create_mark__archives_table', 2),
(14, '2018_08_14_172915_create_periods_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `term` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periods`
--

INSERT INTO `periods` (`id`, `year`, `term`, `created_at`, `updated_at`) VALUES
(1, 2018, 1, '2018-09-10 14:44:08', '2018-09-10 14:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `room_id`, `marks`, `teacher_id`, `lesson_id`, `created_at`, `updated_at`) VALUES
(1, 'General', 1, 120, 1, 1, '2018-09-10 14:56:11', '2018-09-10 14:56:11'),
(2, 'Simple', 1, 20, 1, 2, '2018-09-10 14:57:18', '2018-09-10 14:57:18'),
(3, 'Starting Term', 1, 10, 1, 3, '2018-09-10 14:58:55', '2018-09-10 14:58:55'),
(4, 'General', 1, 10, 2, 4, '2018-09-13 08:05:39', '2018-09-13 08:05:39'),
(5, 'General Test', 1, 20, 2, 5, '2018-09-15 16:37:19', '2018-09-15 16:37:19'),
(6, 'Biggining term', 2, 120, 1, 8, '2018-09-16 03:32:31', '2018-09-16 03:32:31'),
(7, 'Simple Test', 2, 5, 1, 9, '2018-09-16 03:34:29', '2018-09-16 03:34:29'),
(8, 'General Test', 2, 80, 2, 6, '2018-09-16 03:46:55', '2018-09-16 03:46:55'),
(9, 'Simple Test', 2, 40, 2, 7, '2018-09-16 03:47:12', '2018-09-16 03:47:12'),
(11, 'General', 1, 40, 2, 5, '2018-09-16 04:00:04', '2018-09-16 04:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `class`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 'Test Class', 1, '2018-09-10 14:46:10', '2018-09-11 16:28:20'),
(2, 'Computer Electronics', 2, '2018-09-15 14:36:05', '2018-09-15 14:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `room_teacher`
--

CREATE TABLE `room_teacher` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_teacher`
--

INSERT INTO `room_teacher` (`id`, `room_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-09-10 14:51:58', '2018-09-10 14:51:58'),
(4, 1, 2, '2018-09-12 15:01:19', '2018-09-12 15:01:19'),
(7, 2, 2, '2018-09-15 14:52:01', '2018-09-15 14:52:01'),
(8, 2, 1, '2018-09-15 14:53:03', '2018-09-15 14:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `sends`
--

CREATE TABLE `sends` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sents`
--

CREATE TABLE `sents` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sents`
--

INSERT INTO `sents` (`id`, `title`, `message`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'Greet', 'Hello', 3, '2016-05-11 07:49:34', '2018-09-11 07:49:34'),
(2, 'gusaba', 'turabasaba ko mwatumenyesha uko amanato yabana ahagaze', 3, '2018-09-11 15:41:17', '2018-09-11 15:41:17'),
(3, 'Hello', 'Hiiii', 4, '2018-09-12 12:59:09', '2018-09-12 12:59:09'),
(4, 'Hello School', 'Greet', 4, '2018-09-13 08:24:51', '2018-09-13 08:24:51'),
(5, 'Thanks', 'Thanks UMUCYO for your best education and accur acy. Please help my student in informatics and say congratulation in mathematics', 4, '2018-09-16 04:46:12', '2018-09-16 04:46:12'),
(6, 'Thanking again', 'Thank you very much. As you said i saw changes in exams.', 4, '2018-09-16 04:49:32', '2018-09-16 04:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `marks_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `room_id`, `level_id`, `gender`, `payment`, `mother`, `father`, `contact`, `address`, `created_at`, `updated_at`, `marks_total`) VALUES
(1, 'Mr Alan', 1, 1, 1, '0', 'Test Mother', 'Test Father', '123456', 'Test Address', '2018-09-10 14:46:52', '2018-09-16 04:03:23', 323),
(2, 'Mfura Aldo', 1, 1, 1, '0', 'Mother', 'Father', '23456', 'Test Address', '2018-09-10 14:47:45', '2018-09-16 04:03:23', 270),
(3, 'Grant Gustin', 1, 1, 0, '0', 'Mr. Gustin', 'Ms Grant', '4566', 'USA', '2018-09-10 14:48:45', '2018-09-16 04:03:23', 251),
(4, 'Ndizeye Yvan Patrick', 1, 1, 1, '0', 'NYIRABAGENI Domithile', 'HABAMENSHI Cyprien', '0788598774', 'Muhoza, Musanze mu mujyi hagati!', '2018-09-12 11:32:48', '2018-09-16 04:03:23', 276),
(5, 'MUHOZI Patrick', 2, 2, 1, '0', 'Muhozi\'s mother', 'Muhozi\'s father', '1234567', 'Nyamata, Hafi yisoko', '2018-09-15 14:39:36', '2018-09-16 04:03:32', 164),
(7, 'Giramata Vovo', 2, 2, 0, '0', 'Mother', 'Father', '345677', 'Western Province, Rubavu District, Gisenyi hafi yamazi.', '2018-09-15 14:46:46', '2018-09-16 04:03:32', 182),
(9, 'MFURAYACU MUCYO Alain', 2, 2, 1, '0', 'Mother', 'Father', '0788809391', 'Western Province, Rusizi District, Nyakabuye Sector', '2018-09-15 14:51:15', '2018-09-16 04:03:32', 239);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `degree`, `contact`, `gender`, `created_at`, `updated_at`) VALUES
(1, 'Dr Mfura Aldo', 'PHD', '998877', 1, '2018-09-10 14:51:30', '2018-09-15 16:35:06'),
(2, 'Professor MUCYO Alain', 'professor', '12345', 1, '2018-09-12 15:00:01', '2018-09-15 16:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `totals`
--

CREATE TABLE `totals` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `marks` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `totals`
--

INSERT INTO `totals` (`id`, `exam_id`, `student_id`, `lesson_id`, `total`, `marks`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 100, 80, '2018-09-10 14:59:32', '2018-09-11 16:25:29'),
(2, 1, 2, 1, 100, 69, '2018-09-10 14:59:32', '2018-09-11 16:25:21'),
(3, 1, 3, 1, 100, 77, '2018-09-10 14:59:32', '2018-09-11 16:25:28'),
(4, 2, 1, 2, 40, 35, '2018-09-10 15:00:44', '2018-09-10 15:06:15'),
(5, 2, 2, 2, 40, 32, '2018-09-10 15:00:44', '2018-09-10 15:06:09'),
(6, 2, 3, 2, 40, 30, '2018-09-10 15:00:44', '2018-09-10 15:06:03'),
(7, 3, 1, 3, 80, 77, '2018-09-10 15:01:30', '2018-09-12 12:38:10'),
(8, 3, 2, 3, 80, 65, '2018-09-10 15:01:30', '2018-09-10 15:06:44'),
(9, 3, 3, 3, 80, 60, '2018-09-10 15:01:30', '2018-09-10 15:06:38'),
(10, 1, 4, 1, 100, 90, '2018-09-12 12:37:28', '2018-09-12 12:37:37'),
(13, 2, 4, 2, 40, 32, '2018-09-12 12:41:49', '2018-09-12 12:41:50'),
(14, 3, 4, 3, 80, 70, '2018-09-12 12:42:11', '2018-09-12 12:42:11'),
(15, 4, 1, 4, 10, 10, '2018-09-13 08:06:21', '2018-09-13 08:06:47'),
(16, 4, 2, 4, 10, 6, '2018-09-13 08:06:21', '2018-09-13 08:06:44'),
(17, 4, 3, 4, 10, 9, '2018-09-13 08:06:21', '2018-09-13 08:06:41'),
(18, 4, 4, 4, 10, 10, '2018-09-13 08:06:21', '2018-09-13 08:06:49'),
(19, 5, 5, 8, 40, 30, '2018-09-16 03:39:31', '2018-09-16 03:41:19'),
(20, 5, 7, 8, 40, 27, '2018-09-16 03:39:31', '2018-09-16 03:41:16'),
(21, 5, 9, 8, 40, 37, '2018-09-16 03:39:31', '2018-09-16 03:41:24'),
(22, 6, 5, 9, 20, 15, '2018-09-16 03:40:12', '2018-09-16 03:42:12'),
(23, 6, 7, 9, 20, 16, '2018-09-16 03:40:12', '2018-09-16 03:42:04'),
(24, 6, 9, 9, 20, 19, '2018-09-16 03:40:12', '2018-09-16 03:42:06'),
(25, 7, 5, 6, 30, 17, '2018-09-16 03:48:55', '2018-09-16 03:52:07'),
(26, 7, 7, 6, 30, 20, '2018-09-16 03:48:55', '2018-09-16 03:52:02'),
(27, 7, 9, 6, 30, 26, '2018-09-16 03:48:55', '2018-09-16 03:52:04'),
(28, 8, 5, 7, 40, 22, '2018-09-16 03:49:30', '2018-09-16 03:51:03'),
(29, 8, 7, 7, 40, 30, '2018-09-16 03:49:30', '2018-09-16 03:50:51'),
(30, 8, 9, 7, 40, 36, '2018-09-16 03:49:30', '2018-09-16 03:50:54'),
(39, 11, 1, 5, 40, 36, '2018-09-16 03:58:53', '2018-09-16 03:59:25'),
(40, 11, 2, 5, 40, 34, '2018-09-16 03:58:53', '2018-09-16 03:59:23'),
(41, 11, 3, 5, 40, 30, '2018-09-16 03:58:53', '2018-09-16 03:59:19'),
(42, 11, 4, 5, 40, 33, '2018-09-16 03:58:53', '2018-09-16 03:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mucyo Mfurayacu Alain', 'alainmucyo3@gmail.com', '$2y$10$qmqSUugvJPplodxM1vRv1OU1sZ5QF3rcRbwOCyQevjXnKWGMPaZ2m', 1, 'oh3zROxcsWbDx67ctJvDQVBb5HGcgwkCpjSdxENpyNqYMf8RWYePH1pXm1YO', '2018-09-10 14:43:52', '2018-09-10 14:43:52'),
(2, 'Dr Mfura Aldo', 'alain', '$2y$10$zxCGPcZyq1Iin8mfdM8CXuWSY0mO9dw140a6SmQXCc8o5PmXHeZXS', 0, 'vqvmCZ6WWyiVjKBxpneumYSfyJxmlIO722MgqhLXKfK7jwT9LGe0ziEE7fSp', '2018-09-10 14:55:08', '2018-09-15 16:35:06'),
(3, 'Professor MUCYO Alain', 'mucyo', '$2y$10$PdcclBjViT55eKcWd0OUSuCTrd4Q6ecaU7afh889kJdaL/VZnhcPy', 0, 'O6I4eXylxR5ozywSqp7KOqgtKAttQ96PrehaJfaYhxBuSzCd32ZAtMPynrVb', '2018-09-13 08:05:09', '2018-09-15 16:34:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark__archives`
--
ALTER TABLE `mark__archives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_teacher`
--
ALTER TABLE `room_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sends`
--
ALTER TABLE `sends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sents`
--
ALTER TABLE `sents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `totals`
--
ALTER TABLE `totals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `mark__archives`
--
ALTER TABLE `mark__archives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room_teacher`
--
ALTER TABLE `room_teacher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sends`
--
ALTER TABLE `sends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sents`
--
ALTER TABLE `sents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `totals`
--
ALTER TABLE `totals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
