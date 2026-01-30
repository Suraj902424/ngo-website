-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql211.infinityfree.com
-- Generation Time: Jan 29, 2026 at 11:47 PM
-- Server version: 11.4.9-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_40041023_operation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '123'),
(2, 'suraj@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `description`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(8, 'Bringing Health and Hope to the Needy', '', '1757175373_carousel-1.jpg', '', '', '', '2025-06-25 21:30:28'),
(9, 'Safe Drinking Water for Every Family', '', '1757175382_carousel-2.jpg', '', '', '', '2025-09-06 21:46:22'),
(10, '\"Empowering Communities, Enriching', '', '1757175406_carousel-3.jpg', '', '', '', '2025-09-06 21:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `name`, `date`) VALUES
(9, 'How to spark passion-led, interest-based creativity.', 'How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.How to spark passion-led, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; interest-based creativity.', '1751301269_download (1).jpg', '', '', '', '2025-06-25 21:45:10', 'Suraj singh', ''),
(10, 'आज के डिजिटल युग में शिक्षा: ऑनलाइन क्लासेज़ बनाम पारंपरिक स्कूलिंग', 'आज की शिक्षा प्रणाली में हो रहे बदलाव, ऑनलाइन लर्निंग और क्लासरूम एजुकेशन के बीच तुलना और स्कूलों में तकनीक के बढ़ते उपयोग पर लेख।', '1751444837_blog-02.jpg', '', '', '', '2025-06-25 21:46:07', 'pradeep', ''),
(14, ' छात्रों में नेतृत्व गुण कैसे विकसित करें – स्कूल में लीडरशिप की भूमिका', 'स्कूल के दिनों में ही छात्रों में नेतृत्व और टीमवर्क कैसे विकसित किया जाए, इसके उपाय और स्कूल की भूमिका को समझाया गया है।', '1751444888_blog-03.jpg', '', '', '', '2025-07-02 13:40:45', 'pradeep', ''),
(15, 'पढ़ाई के साथ मानसिक स्वास्थ्य: क्यों जरूरी है स्कूल में काउंसलिंग?', '<p>छात्रों पर पढ़ाई का तनाव, परीक्षा की चिंता और सामाजिक दबाव से निपटने के लिए स्कूलों में काउंसलिंग और मानसिक स्वास्थ्य सेवाओं का महत्व।</p>', '1751444920_blog-04.jpg', '', '', '', '2025-07-02 13:58:40', 'krishan', ''),
(16, 'सफल विद्यार्थी बनने के 7 स्वर्णिम नियम', 'Time Management, Smart Study, Focused Routine और Discipline जैसी आदतें जो हर छात्र को अपनानी चाहिए।', '1751444949_blog-05.jpg', '', '', '', '2025-07-02 13:59:09', 'piyush', ''),
(17, ' स्कूल में सह-पाठ्यक्रम गतिविधियों का महत्व – सिर्फ पढ़ाई ही नहीं, कुछ और भी है ज़रूरी!', 'स्पोर्ट्स, आर्ट्स, म्यूज़िक, डिबेट और नाटक जैसी एक्टिविटीज़ का बच्चों के समग्र विकास में योगदान।', '1751445073_blog-06.jpg', '', '', '', '2025-07-02 14:01:13', 'Ronak', ''),
(18, 'विद्यालय जीवन की अनमोल सीखें', 'स्कूल न केवल पढ़ाई का स्थान है, बल्कि यहाँ जीवन जीने की असली शिक्षा भी मिलती है – अनुशासन, दोस्ती, संघर्ष और सफलता की प्रेरणा।', '1751445157_blog-07.jpg', '', '', '', '2025-07-02 14:02:37', 'ashok', ''),
(19, 'ऑनलाइन और ऑफलाइन शिक्षा में क्या बेहतर है?', 'कोविड के बाद शिक्षा पद्धति बदली है। यह ब्लॉग बताता है कि ऑनलाइन पढ़ाई कितनी सुविधाजनक है और ऑफलाइन स्कूलिंग क्यों अब भी ज़रूरी है।', '1751445236_blog-08.jpg', '', '', '', '2025-07-02 14:03:42', 'sanju', '2025-07-13 19:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Html'),
(3, 'Java Script'),
(4, 'pyhon'),
(7, 'Seo'),
(8, 'Rajsthan police'),
(10, 'Up police');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `subject_id`, `name`) VALUES
(8, 8, 'HTML5 परिचय – HTML5 Introduction'),
(9, 8, ' HTML5 Form Attributes'),
(10, 8, 'HTML5 Semantic Tags'),
(11, 8, 'HTML5 Canvas Tutorial'),
(12, 9, 'Full Course Seo'),
(13, 16, 'चित्रकला'),
(14, 16, 'लोक संगीत'),
(15, 16, 'लोक नृत्य'),
(16, 16, 'राजस्थान की हस्तशिल्प और कारीगरी'),
(17, 16, 'राजस्थान का साहित्य'),
(18, 16, 'राजस्थान की परंपराएं और रीति-रिवाज'),
(19, 16, 'लोक देवता और लोक विश्वास');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `age_group` varchar(100) DEFAULT NULL,
  `teacher_name` varchar(100) DEFAULT NULL,
  `teacher_image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `video_name` varchar(255) DEFAULT NULL,
  `video_url` text DEFAULT NULL,
  `video_file` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `title`, `image`, `duration`, `price`, `age_group`, `teacher_name`, `teacher_image`, `video`, `video_name`, `video_url`, `video_file`, `description`) VALUES
(11, 3, 'Java script Course in ', '08.jpg', '120 minute', '1.00', '5-6', 'Pradeep', '03.png', NULL, 'introducation', 'https://youtu.be/_CWcBWSKItk?si=Da16tWixjhUWBA9D', 'file_example_MP4_480_1_5MG.mp4', 'About Course\r\nIf filmmaking is your passion but you never went to film school you’ve come to the right place. Here, you will get hands-on experience and acquire skills that you never would’ve elsewhere like learning how to make feature films on your own, making do with any equipment, and doing it all faster and better.\r\n\r\nDescription\r\nYou will be taught the full process of filmmaking starting from planning, filming, and editing. Not only that but you will learn how to make films that look way more expensive than they are without spending a whole lot of time or money on them. In this course, we’ll focus on a few different forms of films from video ads, to movie trailers to travel vlogs, you name it. In addition to that, we’ll also go over Adobe Premiere Pro in detail so that you get an idea of all that you need to know to become an editing genius. And, if you feel like you’re stuck at any point then you can always ask for guidance and I’ll reply as soon as possible.\r\n\r\nWith this course, you also have access to a whole lot of resources not only for reference but also free media like aerial video shots, background music, fonts, and more. These all come with proper licensing so you can use them in your production worry free.\r\n\r\n'),
(12, 2, 'Html course ', '02.jpg', '120 minute', '122.00', '5-6', 'suraj', '04.png', NULL, 'https://www.youtube.com/embed/vxMoYmHDJ1A?si=0rirJ6hOG-i4fq9G&controls=0', 'https://www.youtube.com/embed/vxMoYmHDJ1A?si=0rirJ6hOG-i4fq9G&controls=0', 'file_example_MP4_480_1_5MG (1).mp4', 'this is html cousrs'),
(14, 4, 'Web Development Course', '02.jpg', '50 min', '122.00', '5-6', 'suraj', '04.jpg', NULL, 'Introduction to the course html', 'https://www.youtube.com/embed/vxMoYmHDJ1A?si=0rirJ6hOG-i4fq9G&controls=0', '', 'this is best course in world'),
(16, 7, 'Seo', 'download.jpg', '3 Months', '3999.00', 'all', 'Manoj ', 'download (1).jpg', NULL, 'Seo', '', '', 'this Course present Full Seo course include the all topic cover in seo \r\n✅ 1. SEO Basics (फाउंडेशनल टॉपिक्स)\r\nSEO क्या है?\r\nSearch Engine कैसे काम करता है (Google Algorithm)\r\nSERP (Search Engine Results Page)\r\nOrganic vs Paid Search Results\r\nDomain Authority / Page Authority\r\nDoFollow vs NoFollow Links\r\nCrawling, Indexing, Ranking\r\n\r\n 2. Keyword Research\r\n✅ Keyword Research क्या है?\r\nTypes of Keywords (Short-tail, Long-tail, LSI)\r\nSearch Intent (Informational, Navigational, Transactional)\r\nKeyword Difficulty\r\nTools for Keyword Research (Google Keyword Planner, Ubersuggest, Ahrefs, SEMrush)\r\n\r\n✅ 3. On-Page SEO (Website Content & Structure Optimization)\r\nTitle Tag Optimization\r\n\r\nMeta Description\r\n\r\nURL Structure (SEO-friendly URLs)\r\n\r\nHeader Tags (H1, H2, H3…)\r\n\r\nImage Optimization (Alt Tags, File Size, File Name)\r\n\r\nInternal Linking\r\n\r\nKeyword Placement & Density\r\n\r\nMobile Responsiveness\r\n\r\nContent Quality & Uniqueness\r\n\r\nSchema Markup / Rich Snippets\r\n\r\nCanonical Tags\r\n\r\nSEO-friendly HTML structure\r\n\r\n✅ 4. Technical SEO\r\nXML Sitemap\r\n\r\nRobots.txt\r\n\r\nSite Architecture\r\n\r\nWebsite Speed Optimization (PageSpeed)\r\n\r\nMobile-First Indexing\r\n\r\nHTTPS (SSL certificate)\r\n\r\nCore Web Vitals (LCP, FID, CLS)\r\n\r\nFixing Crawl Errors (404, 301 Redirects)\r\n\r\nAMP Pages\r\n\r\nDuplicate Content Issues\r\n\r\nPagination & Infinite Scroll Handling\r\n\r\nhreflang Tags for Multilingual Sites\r\n\r\n✅ 5. Off-Page SEO (Backlinks & Promotion)\r\nBacklinks क्या हैं?\r\n\r\nHigh Authority Link Building\r\n\r\nGuest Posting\r\n\r\nDirectory Submission\r\n\r\nSocial Bookmarking\r\n\r\nForum Posting\r\n\r\nBlog Commenting\r\n\r\nBroken Link Building\r\n\r\nInfluencer Outreach\r\n\r\nPress Releases\r\n\r\nLink Earning (vs Link Building)\r\n\r\n✅ 6. Local SEO\r\nGoogle My Business (GMB) Optimization\r\n\r\nNAP Consistency (Name, Address, Phone)\r\n\r\nLocal Keywords\r\n\r\nCustomer Reviews & Ratings\r\n\r\nLocal Citations\r\n\r\nMap Pack / Local Pack Optimization\r\n\r\nSchema for Local Business\r\n\r\n✅ 7. Mobile SEO\r\nMobile Friendliness\r\n\r\nResponsive Design\r\n\r\nMobile Page Speed\r\n\r\nAccelerated Mobile Pages (AMP)\r\n\r\nMobile Usability Errors\r\n\r\n✅ 8. Content SEO (Content-Focused Strategy)\r\nEvergreen vs Trending Content\r\n\r\nTopic Clusters & Pillar Pages\r\n\r\nBlog SEO\r\n\r\nContent-Length & Depth\r\n\r\nContent Freshness\r\n\r\nContent Optimization Tools (Surfer SEO, Frase)\r\n\r\n✅ 9. E-commerce SEO\r\nProduct Page Optimization\r\n\r\nCategory Page SEO\r\n\r\nUser Reviews on Products\r\n\r\nStructured Data for Products\r\n\r\nPagination Handling\r\n\r\nFilter & Faceted Navigation SEO\r\n\r\n✅ 10. SEO Tools\r\nGoogle Search Console\r\n\r\nGoogle Analytics\r\n\r\nGoogle Keyword Planner\r\n\r\nAhrefs\r\n\r\nSEMrush\r\n\r\nMoz\r\n\r\nScreaming Frog\r\n\r\nGTMetrix\r\n\r\nUbersuggest\r\n\r\nYoast SEO (WordPress)\r\n\r\nRank Math (WordPress)\r\n\r\n✅ 11. SEO Metrics & Reporting\r\nOrganic Traffic\r\n\r\nClick-Through Rate (CTR)\r\n\r\nBounce Rate\r\n\r\nDomain Authority (DA)\r\n\r\nPage Authority (PA)\r\n\r\nImpressions vs Clicks\r\n\r\nConversion Rate\r\n\r\nKeyword Rankings\r\n\r\n✅ 12. SEO for Different Platforms\r\nSEO for WordPress\r\n\r\nSEO for Shopify\r\n\r\nSEO for YouTube\r\n\r\nSEO for Blogs\r\n\r\nSEO for News Websites\r\n\r\nApp Store Optimization (ASO)\r\n\r\n✅ 13. SEO Updates & Algorithms\r\nGoogle Panda\r\n\r\nGoogle Penguin\r\n\r\nGoogle Hummingbird\r\n\r\nGoogle RankBrain\r\n\r\nGoogle BERT\r\n\r\nGoogle Core Web Vitals Update\r\n\r\nHelpful Content Update\r\n\r\nSpam Update\r\n\r\n✅ 14. SEO Best Practices\r\nWhite Hat vs Black Hat vs Grey Hat SEO\r\n\r\nEthical Link Building\r\n\r\nAvoiding Keyword Stuffing\r\n\r\nAvoiding Duplicate Content\r\n\r\nSEO Audit Process\r\n\r\nSEO Checklist (Daily / Weekly / Monthly)\r\n\r\n'),
(17, 8, 'वर्दी ख़ाकी', 'unnamed.png', 'till exam', '799.00', 'all', 'Manoj Clases', 'unnamed.png', NULL, '', '', '', '\"Welcome to the Khaki Batch – a specially designed course for candidates preparing for the Rajasthan Police Constable and SI exams. This course is structured to meet all eligibility criteria and ensure complete syllabus coverage.\r\n\r\n✅ Eligibility: Minimum 10th pass (as per official notification).\r\n⏱ Duration: 3 Months intensive preparation.\r\n🎯 Focus Areas: Reasoning, General Knowledge, Rajasthan GK, Law, Hindi, and Current Affairs.\r\n👨‍🏫 Expert Teachers: Each subject is taught by experienced faculty with a strong background in competitive exam coaching.\r\n📚 Course Includes:\r\n\r\nLive + Recorded video classes\r\n\r\nPDF Notes for each topic\r\n\r\nWeekly mock tests & practice sets\r\n\r\nFinal revision with model paper discussion\r\n\r\nSupport for doubts via Telegram/WhatsApp group\r\n🔒 Validation:\r\n\r\nCourse is updated as per latest syllabus and exam pattern\r\n\r\nAll content is reviewed and verified by subject matter experts\r\n\r\nRegular updates and additions based on exam notifications\r\n💰 Course Fee: Affordable and includes lifetime access to materials (for this batch).\r\n🧾 Certificate & Completion: Course completion certificate provided.\r\n🎓 Join Khaki Batch today and take your first step towards becoming a proud member of Rajasthan Police!\"\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `course_payments`
--

CREATE TABLE `course_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `payment_status` varchar(50) DEFAULT 'paid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_payments`
--

INSERT INTO `course_payments` (`id`, `user_id`, `course_id`, `payment_status`, `created_at`, `payment_date`) VALUES
(4, 1, 14, 'paid', '2025-06-26 15:10:15', '2025-07-01 08:43:55'),
(5, 2, 14, 'paid', '2025-06-29 10:17:10', '2025-07-01 08:43:55'),
(6, 3, 14, 'paid', '2025-06-29 10:27:25', '2025-07-01 08:43:55'),
(7, 1, 16, 'paid', '2025-06-29 14:46:30', '2025-07-01 08:43:55'),
(8, 3, 16, 'paid', '2025-06-29 14:50:07', '2025-07-01 08:43:55'),
(17, 5, 16, 'paid', '2025-07-01 07:21:03', '2025-07-01 12:51:03'),
(18, 5, 14, 'paid', '2025-07-01 07:22:30', '2025-07-01 12:52:30'),
(19, 6, 16, 'paid', '2025-07-01 07:47:51', '2025-07-01 13:17:51'),
(20, 7, 16, 'paid', '2025-07-02 14:49:42', '2025-07-02 20:19:42'),
(21, 1, 17, 'paid', '2025-07-03 07:10:44', '2025-07-03 12:40:44'),
(22, 6, 17, 'paid', '2025-07-03 07:46:34', '2025-07-03 13:16:34'),
(26, 8, 17, 'paid', '2025-07-03 08:43:42', '2025-07-03 14:13:42'),
(27, 8, 16, 'paid', '2025-07-03 10:31:37', '2025-07-03 16:01:37'),
(28, 10, 17, 'paid', '2025-07-10 08:55:25', '2025-07-10 14:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `course_videos`
--

CREATE TABLE `course_videos` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `chapter_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `video_url` text DEFAULT NULL,
  `video_file` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `subject` int(11) DEFAULT NULL,
  `chapter` int(11) DEFAULT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `quality` varchar(10) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_videos`
--

INSERT INTO `course_videos` (`id`, `course_id`, `subject_id`, `chapter_id`, `title`, `video_url`, `video_file`, `thumbnail`, `subject`, `chapter`, `pdf_file`, `quality`, `slug`) VALUES
(14, 12, 8, 8, 'HTML5 परिचय – HTML5 Introduction', 'https://www.youtube.com/embed/GpcMasRWUhI?list=PL0b6OzIxLPbxStBQ21C2toa5uQMqHEoRT', '', '', NULL, NULL, NULL, NULL, NULL),
(17, 12, 8, 8, 'HTML5 की नई Tags – New HTML5 Tags', 'https://www.youtube.com/embed/eZv8rNESNfA?list=PL0b6OzIxLPbxStBQ21C2toa5uQMqHEoRT', '', '', NULL, NULL, NULL, NULL, NULL),
(19, 12, 8, 9, 'HTML5 Form Attributes', 'https://www.youtube.com/embed/4eYg6dBGnOg?list=PL0b6OzIxLPbxStBQ21C2toa5uQMqHEoRT', '', '', NULL, NULL, NULL, NULL, NULL),
(20, 12, 8, 10, 'HTML5 Semantic Tags', 'https://www.youtube.com/embed/KqUVAyKFBtA?list=PL0b6OzIxLPbxStBQ21C2toa5uQMqHEoRT', '', '', NULL, NULL, NULL, NULL, NULL),
(21, 12, 8, 11, 'HTML5 Canvas Tutorial', 'https://www.youtube.com/embed/BC98kq9QqIY?list=PL0b6OzIxLPbxStBQ21C2toa5uQMqHEoRT', '', '', NULL, NULL, NULL, NULL, NULL),
(24, 16, 9, 12, 'What is SEO and How Does it Work? | Types of SEO | Search Engine Optimization Full Information', 'https://www.youtube.com/embed/bLUkIgY8MTE?si=4NzxvjCTCYrO9gNG', '', '', NULL, NULL, NULL, NULL, NULL),
(25, 16, 9, 12, 'On-Page vs. Off-Page SEO: What’s the Difference? - Types of SEO', 'https://www.youtube.com/embed/nX9CV3wj6Pk?si=38DfGgLUw8WBKEl_', '', '', NULL, NULL, NULL, NULL, NULL),
(26, 16, 9, 12, 'What is Search Engine and How Do They Work? | Google, Bing, Yahoo, Baidu & More - Explained', 'https://www.youtube.com/embed/aC0ais5QTwk?si=EWGw_9Eu2oKjNK4S', '', '', NULL, NULL, NULL, NULL, NULL),
(27, 16, 9, 12, 'How Search Engine Works? Crawling, Indexing, and Ranking - Complete Explanation', 'https://www.youtube.com/embed/9n4l491nuOI?si=w0ig0XFd4OD-Fo0I', '', '', NULL, NULL, NULL, NULL, NULL),
(28, 16, 9, 12, 'What is White Hat SEO & Gray Hat SEO & Black Hat SEO? - Techniques of SEO', 'https://www.youtube.com/embed/ltRyPOphpSc?si=j1jTutXPNRDZxNmd', '', '', NULL, NULL, '1751211675_Technical_SEO_Hindi_Notes.pdf', NULL, NULL),
(29, 16, 9, 12, 'Technical SEO Kya Hai? | Techniques & Benefit of Technical SEO | SEO Course 2023', 'https://www.youtube.com/embed/TwQc_wqzzAY?si=XQn-OOzIg-gJkO2F', '', '', NULL, NULL, '1751211446_Notice_Workplace Training Certificate Verification Process.pdf', NULL, NULL),
(50, 16, 9, 12, 'adfsd', '', '1751431078_25 JUNE 2025 Rajasthan current Affairs in Hindi _ Daily सुजस Report _ RPSC, RSSB _ NANAK CLASSES.mp4', '1751431078_download.jpg', NULL, NULL, '1751431078_Notice_Workplace Training Certificate Verification Process.pdf', NULL, NULL),
(54, 16, 9, 12, 'dskfjadhfkja', '', '1751467441_file_example_MP4_480_1_5MG.mp4', '1751467441_download.jpg', NULL, NULL, '1751467441_receipt-11-4 (2).pdf', NULL, NULL),
(56, 17, 16, 13, 'चित्रकला', 'https://www.youtube.com/embed/CIO_4TW2mUQ?si=89MGHsFl_vaSVLLi', '', '', NULL, NULL, '', NULL, NULL),
(57, 17, 16, 14, 'लोक संगीत', 'https://www.youtube.com/embed/ydYXWupGOrQ?si=8eoaYr7k60WEkHZQ', '', '', NULL, NULL, '', NULL, NULL),
(58, 17, 16, 15, 'लोक नृत्य', 'https://www.youtube.com/embed/7djzu7SjzgM?si=g8aCBcqqqkmuKvxX', '', '', NULL, NULL, '', NULL, NULL),
(59, 17, 16, 15, 'लोक नृत्य Part 2', 'https://www.youtube.com/embed/mdPQl3X0Lqg?si=zJTlYaYO1H8TlNoV', '', '', NULL, NULL, '', NULL, NULL),
(60, 17, 16, 16, 'राजस्थान की हस्तशिल्प और कारीगरी', 'https://www.youtube.com/embed/rBxBeNUOCEU?si=G9XySbbjXr5na-cZ', '', '', NULL, NULL, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `donor_name` varchar(255) NOT NULL,
  `donor_email` varchar(255) NOT NULL,
  `donor_phone` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donor_name`, `donor_email`, `donor_phone`, `amount`, `payment_method`, `message`, `created_at`) VALUES
(1, 'Suraj singh', 'Surajfoujdar45@gmail.com', '0902 424 4731', '10000.00', 'UPI', 'this is provide', '2025-09-06 16:34:33'),
(2, 'Suraj singh', 'Surajfoujdar45@gmail.com', '08239840816', '2331231.00', 'Net Banking', 'srewqfwe', '2025-09-06 16:43:40'),
(3, 'Aru', 'arushi.fs117@gmail.com', '7073306455', '99999999.99', 'Net Banking', '', '2025-10-07 07:00:20'),
(4, 'SUNIL SAINI', 'sunilsaini4822@gmail.com', '09024808993', '-99999999.99', 'UPI', 'dsd', '2025-11-25 10:47:43'),
(5, 'suraj', 'suraj@gmail.com', '8239840816', '10000.00', 'UPI', 'dfasdfdsd', '2025-12-10 17:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `dtype` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `fname`, `lname`, `email`, `phone`, `message`, `created_at`, `dtype`, `name`, `subject`) VALUES
(6, NULL, NULL, 'Surajfoujdar45@gmail.com', '0902 424 4731', 'dsfadsf', '2025-09-06 17:21:56', '', 'vishal', 'dwfasdf'),
(7, NULL, NULL, 'amitQ@gmail.com', '2309423094', 'nice', '2025-09-06 17:23:45', '', 'amit', 'math'),
(8, NULL, NULL, 'groverjanvi8@gmail.com', '9352578335', 'call me', '2025-09-10 10:58:07', '', 'janvi', 'donation'),
(9, NULL, NULL, 'arushi.gmail@com', '7073306455', 'Hi', '2025-10-07 02:11:46', '', 'Arushi', 'Hindi'),
(10, NULL, NULL, 'arshisehrawat123@gmail.com', '7073306455', 'Bsbshsjsjw', '2025-11-03 08:27:12', '', 'Arushi', 'Hindi'),
(11, NULL, NULL, 'arushi.sehrawat117@gmail.com', '2345678', 'provide me ', '2025-11-08 04:06:52', '', 'aaee', 'newsletter');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(1, ' What types of fitness classes do you offer?', 'We offer a wide variety of fitness classes including HIIT, yoga, spin, strength training, cardio, and more.', '', '', '', '2025-06-23 07:53:05'),
(2, 'Do I need to be a member to attend a class?', 'We offer a wide variety of fitness classes including HIIT, yoga, spin, strength training, cardio, and more.&lt;', '', '', '', '2025-06-23 07:53:50'),
(3, 'What should I bring to my first workout?', 'We offer a wide variety of fitness classes including HIIT, yoga, spin, strength training, cardio, and more.', '', '', '', '2025-06-23 07:55:09'),
(4, 'What is your cancellation policy for classes?', 'We offer a wide variety of fitness classes including HIIT, yoga, spin, strength training, cardio, and more.', '', '', '', '2025-06-23 07:55:31'),
(5, ' Do you have any special offers for new members?', 'We offer a wide variety of fitness classes including HIIT, yoga, spin, strength training, cardio, and more.\r\n', '', '', '', '2025-06-23 07:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(1, 'sdfds', '1750922615_07.jpg', '', '', '', '2025-06-25 21:35:38'),
(2, 'csdf', '1750922327_06.jpg', '', '', '', '2025-06-25 21:35:46'),
(3, 'adsfa', '1750922319_05.jpg', '', '', '', '2025-06-25 21:35:52'),
(4, 'sad', '1750922311_04.jpg', '', '', '', '2025-06-25 21:36:18'),
(5, 'sads', '1750922301_03.jpg', '', '', '', '2025-06-25 21:36:27'),
(6, 'cxvcxz', '1750922282_02.jpg', '', '', '', '2025-06-25 21:37:06'),
(7, 'dsgd', '1750922735_10.jpg', '', '', '', '2025-06-25 21:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `inckude`
--

CREATE TABLE `inckude` (
  `testmonial.php` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `title`, `description`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(1, 'aasda', '', '1752422532_aryamman.png', '', '', '', '2025-07-13 21:32:12'),
(2, 'asda', '', '1752422617_balaji.png', '', '', '', '2025-07-13 21:33:37'),
(3, 'df', '', '1752422626_asp.png', '', '', '', '2025-07-13 21:33:46'),
(4, 'sadas', '', '1752422637_client6.png', '', '', '', '2025-07-13 21:33:57'),
(5, 'adsf', '', '1752422657_client8.png', '', '', '', '2025-07-13 21:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `course_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `status`, `course_id`, `name`, `image`) VALUES
(8, 0, 12, 'Html', ''),
(9, 0, 16, 'Seo', '1751208083_download (1).jpg'),
(10, 0, 17, 'Reasoning & Logical Ability', ''),
(11, 0, 17, 'भारत का इतिहास', ''),
(12, 0, 17, 'भूगोल', '1751526252_unnamed.png'),
(13, 0, 17, 'संस्कृति', ''),
(14, 0, 17, 'राजस्थान का इतिहास,', ''),
(15, 0, 17, 'राजस्थान का भूगोल', ''),
(16, 0, 17, 'राजस्थान का संस्कृति और राजनीतिक व्यवस्था', '1751526316_unnamed.png'),
(17, 0, 17, 'भारतीय संविधान और प्रशासन', ''),
(18, 0, 17, 'पर्यावरणीय अध्ययन', ''),
(19, 0, 17, 'Physics', ''),
(20, 0, 17, 'Chemistry', ''),
(21, 0, 17, 'Biology', ''),
(22, 0, 17, 'Computer', '');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `post` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `facebook_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `instagram_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `title`, `post`, `description`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `facebook_url`, `twitter_url`, `instagram_url`) VALUES
(1, 'suraj', 'Dean', 'teacher', '1757177413_team-4.jpg', '', '', '', '2025-06-23 06:55:02', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/'),
(2, 'Meera Sehrawat', 'CEO & Founder', 'fitness coach ', '1757177395_team-3.jpg', '', '', '', '2025-06-23 07:47:15', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/'),
(3, 'Tanvi Shrimal', 'Team Lead ', '', '1757177387_team-2.jpg', '', '', '', '2025-06-23 07:49:16', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/'),
(4, 'Bhavdeep', 'Associate Professor', '', '1757177334_team-1.jpg', '', '', '', '2025-06-23 07:49:49', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `city`, `message`, `image`, `meta_title`, `meta_description`, `meta_keywords`) VALUES
(2, 'Suraj Singh', 'india', '“My daughter now goes to school regularly because of the free education and support from this NGO. Earlier, we couldn’t afford books or uniforms, but now she dreams of becoming a teacher. We are truly grateful for this help.”', '1762144684_testimonial-3.jpg', '', '', ''),
(3, 'Donar', 'Paris', '“Volunteering here has been one of the most fulfilling experiences of my life. The team is passionate, organized, and genuinely cares about the communities they serve. Seeing smiles on the children’s faces makes every effort worth it.”', '1762144395_team-4.jpg', '', '', ''),
(4, 'Adaline Bromine ', 'Londan', '“I’ve been donating to this NGO for over a year now, and I can truly see the difference they are making in children’s lives. From providing school supplies to organizing health camps — everything is transparent and impactful. I feel proud to be part of their mission.”', '1762144269_testimonial-1.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` enum('online','offline') NOT NULL DEFAULT 'offline',
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `status`, `last_login`) VALUES
(1, 'Suraj singh', 'admin@gmail.com', '8239840816', '$2y$10$IV6/riEKG4Mw45efXuoHIuS4HTqftM3b1XUA0M7rKCDgl12hAroJ2', 'offline', '2025-07-10 14:21:24'),
(3, 'manoj', 'manoj@gmail.com', '9057079083', '$2y$10$IECeSdapcp0zcvsuzy.dbe/60ly5iEIBY8Dc8Kw8UqKJUMIkf5fm2', 'online', '2025-07-01 16:41:17'),
(5, 'guddu', 'guddu@gmail.com', '7877452037', '$2y$10$x5ESEhnoIo5vQv5jbtf7xuY4FWiV0rSG5iqFSVLhez.OBVIrCVZJW', 'offline', '2025-07-01 12:59:04'),
(6, 'deeraj', 'hathenidheeraj@gmail.com', '7742150842', '$2y$10$2NBVXTsRpzBA2Fmxl/Coz.84Pb.78MhHGaiYGguI5HJrPuSdopQmO', 'online', '2025-07-03 13:16:10'),
(7, 'deepak', 'deepak@gmail.com', '8764480642', '$2y$10$99g7MARxc5PYM7wZgYWkBOrYzpGGCftbiyFyoRq8iXkbabXaoZace', 'online', '2025-07-02 20:19:25'),
(8, 'Shoru', 'shoru@gmail.com', '8209477517', '$2y$10$WBmLNpbepM0Ul4UaYAkmPeqHoZEwzXl0Ju0bmVm3a4O12J7vhf.1q', 'online', '2025-07-03 14:13:10'),
(10, 'sanju', 'sanju9636917801@gmail.com', '8619060680', '$2y$10$wq3qtcCqgqegto6Za5/8ruVwZ1Ysh5Ldy9mIHoprjEVuGsjh0INoy', 'online', '2025-07-10 14:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `websetting`
--

CREATE TABLE `websetting` (
  `id` int(11) NOT NULL,
  `about_title` varchar(255) DEFAULT NULL,
  `about_subtitle` varchar(255) DEFAULT NULL,
  `about_description` text DEFAULT NULL,
  `our_mission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_image` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `logo_image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `address1` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `our_commitment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `url` varchar(255) NOT NULL,
  `logo_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `websetting`
--

INSERT INTO `websetting` (`id`, `about_title`, `about_subtitle`, `about_description`, `our_mission`, `about_image`, `facebook_link`, `instagram_link`, `twitter_link`, `youtube_link`, `logo_image`, `meta_title`, `meta_description`, `meta_keywords`, `email1`, `email2`, `phone1`, `phone2`, `address1`, `address2`, `our_commitment`, `url`, `logo_text`) VALUES
(1, 'Vipul Pore - Premier E-commerce Website Developer in Mumbai.', 'Welcome to Sutdykids, where education meets inspiration, and every child\'s journey is a story of growth and discovery', 'At Grow Together, we are dedicated to creating a better and more equal world for every child, woman, and family in need.\r\nFounded with the vision of Empowering Lives and Building Hope, our organization works tirelessly to provide access to education, healthcare, clean drinking water, and livelihood opportunities for underprivileged communities across India.\r\n\r\nWe believe that true change begins at the grassroots level — that one small act of kindness can transform a life, a family, and ultimately an entire community. Through our dedicated volunteers, social workers, and supporters, we have touched thousands of lives and continue to expand our reach every year.', 'At studykids our mission is to cultivate an environment where curiosity is sparked.', '1752423326_creative-ag2a.jpg', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.twitter.com', 'https://www.youtube.com', '1757225061_donate.jpg', '', '', '', 'ngo@cv.in', 'ngo@cv.in', '+01234567890', '', 'Rohini Sec-13, Delhi', 'Rohini Sec-13,Delhi', 'At Compuer Classes, we are committed to nurturing young minds in a safe, inclusive, and inspiring environment. Our goal is to empower students to become confident, compassionate, and responsible global citizens.', 'https://www.google.com/maps?q=28.7162092,77.1170743&z=15&output=embed', 'Grow Together');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `course_payments`
--
ALTER TABLE `course_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_videos`
--
ALTER TABLE `course_videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `chapter_id` (`chapter_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inckude`
--
ALTER TABLE `inckude`
  ADD PRIMARY KEY (`testmonial.php`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `websetting`
--
ALTER TABLE `websetting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `course_payments`
--
ALTER TABLE `course_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `course_videos`
--
ALTER TABLE `course_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `websetting`
--
ALTER TABLE `websetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `course_videos`
--
ALTER TABLE `course_videos`
  ADD CONSTRAINT `course_videos_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_videos_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `course_videos_ibfk_3` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
