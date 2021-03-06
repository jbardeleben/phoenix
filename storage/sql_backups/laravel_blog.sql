-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2016 at 08:50 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_blog`
--
CREATE DATABASE IF NOT EXISTS `laravel_blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `laravel_blog`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--
-- Creation: May 10, 2016 at 08:12 PM
-- Last update: Aug 02, 2016 at 11:07 PM
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Water Contamination', '2016-05-11 09:05:26', '2016-05-11 09:05:26'),
(2, 'Water Quality', '2016-05-11 09:05:50', '2016-05-11 09:05:50'),
(3, 'Fresh Water Contamination', '2016-05-11 09:06:02', '2016-05-11 09:06:02'),
(4, 'Fresh Water Lakes', '2016-05-11 09:06:13', '2016-05-11 09:06:13'),
(5, 'Ocean Water', '2016-05-11 09:06:24', '2016-05-11 09:06:24'),
(6, 'Ocean Water Contamination', '2016-05-11 09:07:17', '2016-05-11 09:07:17'),
(7, 'Ocean Water Quality', '2016-05-11 09:07:38', '2016-05-11 09:07:38'),
(8, 'Press Release', '2016-07-25 18:13:09', '2016-07-25 18:13:09'),
(9, 'Environmental Protection Agency', '2016-07-25 18:13:22', '2016-07-25 18:13:22'),
(10, 'Drinking Water', '2016-07-25 18:28:53', '2016-07-25 18:28:53'),
(11, 'Drinking Water: Contamination', '2016-07-25 21:48:33', '2016-07-25 21:48:33'),
(12, 'Drinking Water: Toxic Chemicals', '2016-07-25 21:48:33', '2016-07-25 21:48:33'),
(13, 'Drinking Water: Toxic Algae', '2016-07-26 03:40:43', '2016-07-26 03:40:43'),
(14, 'Drinking Water: Lead Contamination', '2016-07-26 04:12:59', '2016-07-26 04:12:59'),
(15, 'Drinking Water: Quality', '2016-07-26 18:04:15', '2016-07-26 18:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--
-- Creation: Apr 12, 2016 at 10:11 PM
-- Last update: Apr 20, 2016 at 03:46 PM
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_12_210256_create_posts_table', 1),
('2016_04_18_212658_add_slug_to_posts', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--
-- Creation: Apr 18, 2016 at 09:51 PM
-- Last update: Apr 20, 2016 at 03:47 PM
-- Last check: Apr 18, 2016 at 09:51 PM
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--
-- Creation: Aug 02, 2016 at 11:17 PM
-- Last update: Aug 02, 2016 at 11:17 PM
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'When a Tornado Strikes', '<h1>Tornadoes</h1>\r\n\r\n<h2>What you need to know if you are in a tornado warning</h2>\r\n\r\n<p>What do you do if you are out and about and a tornado is suddenly barring down on you? Where do you go? What happens if it\'s at night and you and your family are asleep? Read these overview instructions to help make you more prepared for these scary weather events.</p>\r\n\r\n<h2>Daytime Storm Warnings</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tortor enim, adipiscing in semper a, pellentesque quis sem. Vivamus eu odio at tellus sollicitudin viverra. Sed dignissim molestie imperdiet. Nulla sit amet tortor eu nisl vestibulum dignissim. Donec scelerisque vulputate tortor, non dapibus massa molestie at. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam a mauris sit amet augue suscipit dapibus non in lectus. Nunc mattis eros ligula, ut tincidunt sapien. Nulla eget velit ipsum. Suspendisse potenti. Suspendisse et sem at sem sagittis lobortis. Quisque lacinia, nisl in elementum aliquet, arcu neque rhoncus tellus, at ornare mi enim sit amet sem. Phasellus a nisi vel ipsum laoreet mollis.</p>\r\n\r\n<h2>Nighttime Storm Warnings</h2>\r\n<p>Night time storms are perhaps probably the scariest as the majority of us are sleeping. What should you do to prepare yourself for one of these unfortunate events should it occur? The first and most important thing to do is to have a plan in place. Think of it like a fire drill. A fire at night is a very scary event as you wake up to a sounding alarm and have just seconds to realize what is happening and react accordingly. The difference is that most of us (especially with family) have some sort of action plan in place. Get up, get out, and meet at area x. We should have the same routine, especially for those who live in tornado prone areas, to practice as we do with fire alarms.</p>\r\n\r\n<p>If a warning is issued (thankfully modern technology has given us much more response time today than ever before), get your family and get to a storm "safe" meeting area, whether a storm cellar, a special place in a basement, or some sort of area that you have deemed the best place to wait out a storm. A storm kit should probably include at least two days worth of emergency supplies - such as water, batteries, canned/non-perishable food (and of course a flashlight and NOAA battery powered radio), to name a couple. This is a plan that should be practiced just like with fire alarm testing. Simulate these storm scenarios with everyone in your household just as you would a fire alarm. The habit and reactionary response it will build could one day save your life, just as it would if a fire was to happen.</p>\r\n\r\n<hr>\r\n\r\n<p>Safety is everything and with these storms, it can be a real challenge, especially if they are at night. So have a storm safety plan in place and practice it. These habits could very well be the one thing that no matter how much you may feel may never happen, and hey, let\'s hope it never does, could save you and your family\'s lives. Be sure to keep your storm safety kit up to date and keep a battery operated NOAA radio handy as these monsters can strike not just at any time, but any where in the US and Canada. Check out <a href="http://www.weather.com">The Weather Channel</a>\'s website as you will find a lot of guide lines to preparing a storm safety kit with a lot of valuable information on what to do should disaster strike your area.</p>', 'When-a-Tornado-Strikes', 1, '2016-07-14 20:28:01', '2016-07-14 20:28:01'),
(27, 'Florida mulls new standards on water toxins', '<p>A governor-appointed panel next week will consider new criteria that some fear will let polluters dump too much toxic chemicals into rivers and lakes used for drinking water, including benzene — a cancer-causing petroleum byproduct used in hydraulic fracking and pervasive in tobacco smoke.</p>\r\n\r\n<p>On Tuesday, the Environmental Regulation Commission is expected to vote on new water quality standards for more than 100 toxic chemicals during its regular meeting in Tallahassee. If approved, the new criteria would then go to the U.S. Environmental Protection Agency for approval.</p>\r\n\r\n<p><a href="http://www.floridatoday.com/story/news/local/environment/2016/07/21/florida-mulls-new-standards-water-toxins/87386596/">http://www.floridatoday.com/story/news/local/environment/2016/07/21/florida-mulls-new-standards-water-toxins/87386596/</a></p>', 'Florida-mulls-new-standards-on-water-toxins', 12, '2016-07-26 17:57:44', '2016-07-26 17:57:44'),
(2, 'Utah Lake\'s toxic algae affecting Saratoga Springs secondary water, flowing into Jordan River', '<p>State officials are reporting that the toxic algae bloom that struck Utah Lake last week has extended north into the Jordan River system.</p>\r\n\r\n<p>Blooms have also reportedly formed in the lower Spanish Fork River, and algae has been detected in lower Little Cottonwood Creek.</p>\r\n\r\n<p>The Salt Lake County Health Department reported Sunday that the Jordan River and all county canals are potentially unsafe for people or animals, according to information from the state Department of Environmental Quality.</p>\r\n\r\n<p><a href="http://www.heraldextra.com/news/local/utah-lake-s-toxic-algae-affecting-saratoga-springs-secondary-water/article_9d84f277-8873-52ba-b8e5-1ac99800cc9b.html">http://www.heraldextra.com/news/local/utah-lake-s-toxic-algae-affecting-saratoga-springs-secondary-water/article_9d84f277-8873-52ba-b8e5-1ac99800cc9b.html</a></p>', 'Utah-Lakes-toxic-algae-affecting-Saratoga-Springs-secondary-water-flowing-into-Jordan-River', 12, '2016-07-26 18:01:43', '2016-07-26 18:01:43'),
(3, 'Toxic algae at Pyramid Lake makes bad choice for swimming, drinking', '<p>State water officials warned visitors to Pyramid Lake Friday that a toxic algae bloom continues to make the water unsafe for swimming and other recreational activities.</p>\r\n\r\n<p>The latest samples still show microcystin toxins in harmful amounts, according to the Department of Water Resources. The algae bloom was first discovered late last month at the reservoir near Castaic, about 60 miles from downtown Los Angeles.</p>\r\n\r\n<p><a href="http://www.dailynews.com/environment-and-nature/20160722/toxic-algae-at-pyramid-lake-makes-bad-choice-for-swimming-drinking">http://www.dailynews.com/environment-and-nature/20160722/toxic-algae-at-pyramid-lake-makes-bad-choice-for-swimming-drinking</a></p>', 'Toxic-algae-at-Pyramid-Lake-makes-bad-choice-for-swimming-drinking', 13, '2016-07-26 18:06:33', '2016-07-26 18:06:33'),
(4, 'Politics Keeps Water Toxic Across Vojvodina', '<p>Residents of Zrenjanin, a town of some 123,000 people 80 kilometres north of the capital of Belgrade, are anticipating the approaching holiday season with mixed feelings. While most look forward to their summer recess, they also worry that the summer heat will worsen their problems with the water supply.</p>\r\n\r\n<p>Experts warn that in many local communities across the province of Vojvodina, people are drinking water that is either downright toxic or unsuitable for consumption.</p>\r\n\r\n<p>However, political rows are bedevilling the reconstruction of old water supplies and construction of new ones.</p>\r\n\r\n<p><a href="http://www.balkaninsight.com/en/article/politics-keeps-water-toxic-across-vojvodina-06-28-2016">http://www.balkaninsight.com/en/article/politics-keeps-water-toxic-across-vojvodina-06-28-2016</a></p>', 'Politics-Keeps-Water-Toxic-Across-Vojvodina', 11, '2016-07-26 18:11:26', '2016-07-26 18:11:26'),
(5, 'Elevated cancer rates found south of Colorado Springs where water supplies contain toxic chemicals', '<p>Elevated cancer rates found south of Colorado Springs where water supplies contain toxic chemicals</p>\r\n\r\n<p>State health officials have found elevated cancer rates among residents of an area south of Colorado Springs where public water supplies contain toxic chemicals at levels exceeding an EPA health limit.</p>\r\n\r\n<p>The Colorado Department of Public Health and Environment emphasized, in a preliminary health assessment, that there’s no established link between these perflourinated chemicals (PFCs) and the elevated kidney, lung and bladder cancer documented in Security, Widefield and Fountain.</p>\r\n\r\n<p><a href="http://www.denverpost.com/2016/07/05/toxic-water-cancer-colorado-springs-air-force/">http://www.denverpost.com/2016/07/05/toxic-water-cancer-colorado-springs-air-force/</a></p>', 'Elevated-cancer-rates-found-south-of-Colorado-Springs-where-water-supplies-contain-toxic-chemicals', 12, '2016-07-19 10:44:00', '2016-07-19 10:44:00'),
(6, '5,300 U.S. water systems are in violation of lead rules', '<p>Eighteen million Americans live in communities where the water systems are in violation of the law. Moreover, the federal agency in charge of making sure those systems are safe not only knows the issues exist, but it\'s done very little to stop them, according to a new report and information provided to CNN by multiple sources and water experts.</p>\r\n\r\n<p><a href="http://www.cnn.com/2016/06/28/us/epa-lead-in-u-s-water-systems/">http://www.cnn.com/2016/06/28/us/epa-lead-in-u-s-water-systems/</a></p>', '5300-US-water-systems-are-in-violation-of-lead-rules', 11, '2016-07-26 17:51:45', '2016-07-26 17:51:45'),
(7, 'Could toxic chemicals along the Ohio River be a danger to our drinking water?', '<p>Arsenic. Lead. Mercury. Sulfuric Acid.</p>\r\n\r\n<p>At a closed Duke Energy power plant, at least 10 billion pounds of coal ash containing these toxins and more are sitting on the banks of the Ohio River – a source of drinking water for more than 5 million people.</p>\r\n\r\n<p>How the polluted ponds got there is a story that began long before environmental laws were created to keep people and drinking water safe from toxic waste.</p>\r\n\r\n<p><a href="http://www.wcpo.com/longform/big-decisions-loom-for-toxic-ponds-on-ohio-river">http://www.wcpo.com/longform/big-decisions-loom-for-toxic-ponds-on-ohio-river</a></p>', 'Could-toxic-chemicals-along-the-Ohio-River-be-a-danger-to-our-drinking-water', 12, '2016-07-23 02:28:35', '2016-07-23 23:55:15'),
(8, 'How toxic green slime caused a state of emergency in Florida', '<p>Florida Gov. Rick Scott declared a state of emergency in counties on the state\'s Atlantic coast last week over expansive algae blooms in the St. Lucie River.</p>\r\n\r\n<p>Scott\'s executive order in Martin and St. Lucie counties called on state agencies to take actions to address the thick toxic blooms that are ruining the river\'s ecology, devastating water-related businesses and that could potentially cause health problems for those in contact with the water.</p>\r\n\r\n<p>The smelly, disgusting blue-green algae blooms plaguing the St. Lucie River and Indian River Lagoon are the result of discharges flowing out of Lake Okeechobee in southeast Florida.</p>\r\n\r\n<p>Since the discharges started Jan. 30, about 150 billion gallons of the lake\'s water has been sent to the river, dumping nutrients and lowering the salinity of the naturally brackish water. Both spur the growth of blue-green algae.</p>\r\n\r\n<p><a href="http://www.usatoday.com/story/news/nation-now/2016/07/04/how-toxic-green-slime-caused-state-emergency-florida/86679518/">http://www.usatoday.com/story/news/nation-now/2016/07/04/how-toxic-green-slime-caused-state-emergency-florida/86679518/</a></p>', 'How-toxic-green-slime-caused-a-state-of-emergency-in-Florida', 1, '2016-07-23 23:39:05', '2016-07-23 23:53:19'),
(9, 'PRESS RELEASE/Phoenix Revolution, Inc.', '<p><strong>November 13, 2015</strong></p>\r\n\r\n<p><em>FOR IMMEDIATE RELEASE</em></p>\r\n\r\n<p><strong>On Tuesday, November 17, 2015 at 3 p.m., Boston-based green technology company, Phoenix Revolution, Inc., will be conducting a public test of their Ocean Pure Water System (OPWS) on Castle Island in South Boston, MA. The test will be a demonstration to show the effectiveness of the OPWS in transforming the Boston Harbor water into potable, fresh water.</strong></p>\r\n\r\n<p>The Ocean Pure Water System uses modern and proven water desalination processes in a new innovative way to reduce power consumption and upfront costs, while maximizing water production.  The system’s viability comes from using a technology that has been employed in the water industry for decades. Using desalination and purification techniques based on reverse osmosis (RO), the OPWS does not innovate on the removal of dissolved solids, but on the ability to supply water to the system.  The outcome of the OPWS is that it drastically reduces the significant costs associated with desalinating, purifying, and pumping to the surface fresh water, from major water sources such as: oceans, seas, rivers, lakes, ponds and aquifer. And due to the OPWS’s modularity, the system is rapidly scalable to provide any amount of water desired. Many public and private sector executives, elected officials and their representatives will be on hand for this demonstration.</p>\r\n\r\n<p>Founded in Boston in 2012, Phoenix Revolution’s mission is to overcome the most challenging problems that face our world today, through engineering economic and environmental solutions. Phoenix strives for the betterment of the worldwide community through innovative products that increase the quality of the earth’s finite resources. To that end, our goal is to expand our ever-increasing range of products to benefit consumers and grow its place in the market, while producing dynamic solutions to problems on a global scale. Unlike many other promising technologies in this space, Phoenix’s OPWS is market ready and scalable, ready to be used today, at a fraction of the cost of conceptual periphery technologies, which positions Phoenix to be able to solve the global water crisis today.</p>\r\n\r\n<p>For additional information about Phoenix Revolution Inc., please contact Chief Operating Officer Sean Goodwin at: 617-784-8283 or <a href="mailto:sean@phoenixrevolutioninc.com">sean@phoenixrevolutioninc.com</a> or check the Phoenix Revolution website at <a href="http://www.phoenixrevolutioninc.com">Phoenix Revolution Inc. Website</a></p>\r\n', 'press-release-11-13-2015', 8, '2015-11-13 17:00:00', '2015-11-13 17:00:00'),
(28, 'Tainted Water Near Colorado Bases Hints at Wider Safety Concerns', '<p>FOUNTAIN, Colo. - Volk Sanders burst into this world on June 7, a six-pound fuzz-headed ball of joy and his mother\'s first child.</p>\r\n\r\n<p>Days later, Volk\'s mother learned that the well water she had consumed for years had been laced with chemicals that the Environmental Protection Agency associates with low birth weight, cancers, thyroid disease and more.</p>\r\n\r\n<p>The aquifer that courses beneath this community in the shadow of five military installations showed traces of perfluorinated chemicals at up to 20 times the levels viewed as safe, environmental authorities said. A sudsy foam used for fighting fires on military bases was probably responsible, according to the Air Force, with the contamination perhaps decades old.</p>\r\n\r\n<p><a href="http://www.nytimes.com/2016/07/26/us/tainted-water-near-colorado-bases-hints-at-wider-safety-concerns.html?_r=0">http://www.nytimes.com/2016/07/26/us/tainted-water-near-colorado-bases-hints-at-wider-safety-concerns.html?_r=0</a></p>', 'Tainted-Water-Near-Colorado-Bases-Hints-at-Wider-Safety-Concerns', 11, '2016-08-02 23:28:32', '2016-08-02 23:28:32'),
(29, 'Cape Cod\'s big drinking water problem', '<p>Barnstable is the Cape\'s hub of transportation, commerce, and tourism, with a year-round population of just under 50,000 that swells to 150,000 in the summer. And in May, just before vacation season kicked into high gear, town officials said there was something wrong with the drinking water.</p>\r\n\r\n<p>The previous week, the US Environmental Protection Agency had dramatically lowered its advisory levels for two chemical compounds - perfluorooctanoic acid (PFOA) and perfluorooctane sulfonate (PFOS), once found in things like nonstick coatings and stain-resistant clothes, and still used in some industrial applications such as flame retardants - instantly putting water from the Hyannis Water System, one of three feeding into Barnstable, over the limit. Town officials recommended that pregnant women and nursing mothers in Hyannis not drink or cook with municipal water, nor should babies drink it, they said, noting that exposure to elevated levels of PFOA and PFOS might cause developmental problems. Daniel Santos, the Barnstable director of public works, describes the water supply as "under siege."</p>\r\n\r\n<p><a href="https://www.bostonglobe.com/magazine/2016/08/02/cape-cod-big-drinking-water-problem/Q17CHGAxFoYGJzWeaK7YNP/story.html">https://www.bostonglobe.com/magazine/2016/08/02/cape-cod-big-drinking-water-problem/Q17CHGAxFoYGJzWeaK7YNP/story.html</a></p>', 'Cape-Cods-big-drinking-water-problem', 12, '2016-08-02 23:29:48', '2016-08-02 23:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Apr 18, 2016 at 09:51 PM
-- Last update: Jul 27, 2016 at 04:29 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jay Bardeleben', 'jay@wavlite.com', '$2y$10$9/J/Ckzv8GI54RL5CViQgOx4rsmjUsYd31CfLH36quRM62jKUM2ie', 'djF0FRVzb21UnGkXVaC5NL5RJ6KTGQT9fbtQPVQp6omFRAX5FwqeelFq402j', '2016-04-20 02:33:44', '2016-07-28 18:17:17'),
(2, 'Jason', 'jbardeleben@gmail.com', '$2y$10$I8xG5hh2lzaKot1LfVRNiO5b5PcIWkaab.PdqFbe5fhboU64Xz4uy', 'vt2WUHaySQSTbIL4EghNavMAcSD8r8jplPWKf7v0wTX9Tb6p8Je8BlR8hnrE', '2016-04-22 22:29:39', '2016-04-22 23:08:33'),
(3, 'Wavlite', 'info@wavlite.com', '$2y$10$bRQ9ST13ZDAMIybMsj1r1eRPnPWGPbg5vxuooQNDOlrXsW5mkjFpi', 'XEVemRrzILfV98HrPeYio059xBiYVkl6i1x36bJTxtriaamfk75siZjjJ1b4', '2016-04-22 23:09:06', '2016-04-22 23:12:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
