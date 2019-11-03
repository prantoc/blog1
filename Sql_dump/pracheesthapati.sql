/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50637
 Source Host           : localhost:3306
 Source Schema         : pracheesthapati

 Target Server Type    : MySQL
 Target Server Version : 50637
 File Encoding         : 65001

 Date: 11/10/2019 20:42:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for address_maps
-- ----------------------------
DROP TABLE IF EXISTS `address_maps`;
CREATE TABLE `address_maps`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `lat` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `long` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of address_maps
-- ----------------------------
INSERT INTO `address_maps` VALUES (1, '23.7516288', '90.38145699999995', '113 Lake Circus Road, Kalabagan, Dhaka, Bangladesh', '2019-09-26 19:28:57', '2019-09-26 13:28:57');

-- ----------------------------
-- Table structure for applies
-- ----------------------------
DROP TABLE IF EXISTS `applies`;
CREATE TABLE `applies`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `up_cv` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `up_protfolio` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mgs` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of applies
-- ----------------------------
INSERT INTO `applies` VALUES (1, 'Hasan', 'tanvir@gmail.com', 'wewetfewt', 'E:\\Ampps\\tmp\\php465A.tmp', 'E:\\Ampps\\tmp\\php466B.tmp', 'fewgfwegeswgsgsgsr', '2019-09-18 06:14:31', '2019-09-18 06:14:31');
INSERT INTO `applies` VALUES (2, 'Fuad', 'fazlarabbi039@gmail.com', 'gwergrgrgrg', 'E:\\Ampps\\tmp\\php3B58.tmp', 'E:\\Ampps\\tmp\\php3B69.tmp', 'ggegegergerg', '2019-09-18 06:16:40', '2019-09-18 06:16:40');

-- ----------------------------
-- Table structure for careers
-- ----------------------------
DROP TABLE IF EXISTS `careers`;
CREATE TABLE `careers`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `details` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of careers
-- ----------------------------
INSERT INTO `careers` VALUES (11, 'career-page', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #ffffff;\">We are always looking for exceptional people to join our innovative. There are a wide range of opportunities, in both design and design support roles. The culture of our practice is open and dynamic and we welcome the very best talents.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #ffffff;\">&nbsp;</p>\r\n<h2 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; font-weight: 500; line-height: 1.2; font-size: 2rem; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; background-color: #ffffff;\">Full Time Employment !</h2>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #ffffff;\">If you are interested in pursuing employment opportunities at Prachee Sthapati, you are welcome to submit your resume and digital portfolio for review. We will contact you if there is an interest in your work.</p>\r\n<h2 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; font-weight: 500; line-height: 1.2; font-size: 2rem; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; background-color: #ffffff;\">Internships</h2>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #ffffff;\">Prachee Sthapati offers minimum six months internship program to undergraduate and graduate students who are eager to learn and develop their skills as interns in our office. You may submit your resume, digital portfolio and dates you are available for an internship. Selection is based solely on your portfolio and other applications materials.</p>', 1, '2019-09-18 17:22:27', '2019-09-18 11:22:27', 'career-page');

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `details` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES (10, 'sgsdgsdg', 'client-1.png', '<p>sxgsfdgsdfgs</p>', '2019-09-17 19:18:10', '2019-09-17 19:18:10', 1);
INSERT INTO `clients` VALUES (11, 'cb xcb xv', 'client-1_1.png', '<p>nxbxbxvcbxcb</p>', '2019-09-17 19:18:53', '2019-09-17 19:18:53', 1);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);

-- ----------------------------
-- Table structure for page_imgs
-- ----------------------------
DROP TABLE IF EXISTS `page_imgs`;
CREATE TABLE `page_imgs`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `details` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of page_imgs
-- ----------------------------
INSERT INTO `page_imgs` VALUES (13, 'principal', '<section class=\"middle-sec-one mt-2\" style=\"box-sizing: border-box; margin-top: 0.5rem !important;\">\r\n<h1 class=\"d-inline\" style=\"box-sizing: border-box; margin: 0.67em 0px; font-weight: 500; line-height: 1.2; font-size: 2em; display: inline !important;\">saumen hazra</h1>\r\n&nbsp;<span class=\"d-inline\" style=\"box-sizing: border-box; display: inline !important;\">.principal architect</span>\r\n<p class=\"mt-3\" style=\"box-sizing: border-box; margin-top: 1rem !important; margin-bottom: 1rem;\">Saumen Hazra was born in Khulna, the serine city of Southern Bangladesh and spend his childhood at Itna, a village beside the river Madhumati. He received his Bachelor of Architecture from Bangladesh University of Engineering and Technology (BUET) in 2001 and Masters in Architecture in 2019 from the same University. He is a member of the IAB (Institute of Architects Bangladesh) since 2001 and founded the architectural practice Prachee Sthapati at year 2005.<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" />Saumen&rsquo;s consciences is deeply rooted in the rich Bengali culture and vivacious traditions of his country. His origins coupled with the schooling in the very best architectural faculty, have awoken in him an innate sensitivity to the contemporary vernacular, rigorously simple architecture that speaks of the fundamentals but is also modest in character.<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" />Saumen has enhanced an ability to execute subtle yet exciting architecture within the constraints of real-world practices. He approaches people, architecture and the environment as interlinking identities reinforced by the</p>\r\n</section>\r\n<footer class=\"footer fixed-bottom\" style=\"box-sizing: border-box; position: fixed; right: 0px; bottom: 0px; left: 0px; z-index: 1030;\"><nav class=\"nav footer-active\" style=\"box-sizing: border-box; display: flex; flex-wrap: wrap; padding-left: 0px; margin-bottom: 0px; list-style: none; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #ffffff;\"></nav></footer>', 1, '2019-09-25 13:39:05', '2019-09-25 07:39:05', 'principal', 'profile-1.png');

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `details` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES (8, 'about-us', '<p>&nbsp;</p>\r\n<p style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; vertical-align: baseline;\"><img style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\" src=\"http://pracheesthapati.com/images/prache-bng.png\" alt=\"prachee\" width=\"29\" height=\"20\" />&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: inherit; vertical-align: baseline;\">n</span>&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 17px; line-height: inherit; vertical-align: baseline;\">the East; the Orient; the Eastern World.</span></p>\r\n<p style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 12px; line-height: 2; vertical-align: baseline;\">Bengali-English Dictionary, Bangla Academy</p>\r\n<p>&nbsp;</p>\r\n<p style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.5; font-family: inherit; vertical-align: baseline;\">the continuous search for who we are,</p>\r\n<p style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.5; font-family: inherit; vertical-align: baseline;\">makes us what we are and what our mission should be.</p>\r\n<p>&nbsp;</p>\r\n<p style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: 1.5; font-family: inherit; vertical-align: baseline;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 20px; line-height: inherit; font-family: inherit; vertical-align: baseline;\">it\'s a</span>&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bolder; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">journey</span>.&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.5; font-family: inherit; vertical-align: baseline;\">no doubt a tough one.</span></p>\r\n<p style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.5; font-family: inherit; vertical-align: baseline;\">the intetion is to continue with passion untill been satisfied- which is a never ending quest.</p>\r\n<p style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.5; font-family: inherit; vertical-align: baseline;\">crossing teh hurdles of boundaries and traveling through time</p>\r\n<p style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 16px; line-height: 1.5; font-family: inherit; vertical-align: baseline;\">- we aim to tie the newly born leaves with the roots.</p>\r\n<p>&nbsp;</p>\r\n<p style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.5; font-family: inherit; vertical-align: baseline;\">it\'s not&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bolder; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">old,</span>&nbsp;but&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bolder; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">eternal</span></p>\r\n<p style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; line-height: 1.5; font-family: inherit; vertical-align: baseline;\">it\'s not&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bolder; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">wall,</span>&nbsp;rather&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bolder; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">window.</span></p>', 1, '2019-09-18 23:20:34', '2019-09-18 17:20:34', 'about');
INSERT INTO `pages` VALUES (10, 'services', '<section class=\"middle-sec-one mt-5\" style=\"box-sizing: border-box; margin-top: 3rem !important;\">\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; font-weight: 500; line-height: 1.2; font-size: 2rem;\">architecture</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\"><span class=\"Concepts-area-color\" style=\"box-sizing: border-box; color: gray !important;\">Design at the intersection of enactment and human experience.</span><br style=\"box-sizing: border-box;\" />Our architecture reflects our knowledge of how people and organizations use and experience place and space. We work collaboratively with clients, communities and end-users to create buildings that work well on every level, inside and out.</p>\r\n<h2 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; font-weight: 500; line-height: 1.2; font-size: 2rem;\">urban planning &amp; landscape architecture</h2>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\"><span class=\"Concepts-area-color\" style=\"box-sizing: border-box; color: gray !important;\">Envisioning the future.</span><br style=\"box-sizing: border-box;\" />Since real life is never linear, a strong vision and a flexible approach give master plans the resilience they need to guide development over time. Successful master plans are robust enough to overcome the push and pull of the unforeseen. Sustainability is an important focus&mdash;with equal concern for the socio-economic health of the community and for its environmental quality. As urban designers, we know how to bring forward the experiential attributes that make a place memorable and attractive.<br style=\"box-sizing: border-box;\" />Creating places as memorable as they are financially and environmentally sustainable is the hallmark of Prachee&rsquo;s landscape architecture discipline. Connecting people with nature- connecting nature with performance, is our goal.</p>\r\n<h2 style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; font-weight: 500; line-height: 1.2; font-size: 2rem;\">interior design</h2>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\"><span class=\"Concepts-area-color\" style=\"box-sizing: border-box; color: gray !important;\">Enhancing business and human performance through design.</span><br style=\"box-sizing: border-box;\" />Prachee designs interior spaces for living and working. Interior performance can be measured in human and organizational terms: higher productivity, greater creativity and innovation, increased patronage or sales. Hitting the mark means designing not just for visual impact, but also for health, comfort, flexibility and ease of use.</p>\r\n<p class=\"col-md-2\" style=\"box-sizing: border-box; position: relative; width: 224.828px; padding-right: 15px; padding-left: 15px; flex: 0 0 16.6667%; max-width: 16.6667%;\">&nbsp;</p>\r\n</section>\r\n<footer class=\"footer fixed-bottom\" style=\"box-sizing: border-box; position: fixed; right: 0px; bottom: 0px; left: 0px; z-index: 1030;\">\r\n<p class=\"container-fluid-fluid\" style=\"box-sizing: border-box;\">&nbsp;</p>\r\n</footer>', 1, '2019-09-19 15:07:59', '2019-09-19 09:07:59', 'services');
INSERT INTO `pages` VALUES (14, 'approach', '<section class=\"middle-sec-one mt-5\" style=\"box-sizing: border-box; margin-top: 3rem !important;\">\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; font-weight: 500; line-height: 1.2; font-size: 2rem;\">preface</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\">Each space has its own desire. What the space wants to be is determined by its context. Context covers from history to territory, culture to social norms, people to phenomenon. Dialectically overcoming the constrains of context, the job of architecture is to fulfill the desire of the space. That&rsquo;s how Identity achieved. That&rsquo;s what architecture is all about. Architecture not only reflects our time and culture, but also shapes it. As architects, we create settings to inspire the way we live, learn, work and celebrate. It is our essential humanity that moves us to do good, create places that enhance the human experience and bring joy to the human spirit. Architecture is the celebration of life.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; font-weight: 500; line-height: 1.2; font-size: 2rem;\">goals</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\">Each space has its own desire. What the space wants to be is determined by its context. Context covers from history to territory, culture to social norms, people to phenomenon. Dialectically overcoming the constrains of context, the job of architecture is to fulfill the desire of the space. That&rsquo;s how Identity achieved. That&rsquo;s what architecture is all about. Architecture not only reflects our time and culture, but also shapes it. As architects, we create settings to inspire the way we live, learn, work and celebrate. It is our essential humanity that moves us to do good, create places that enhance the human experience and bring joy to the human spirit. Architecture is the celebration of life.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 0.5rem; font-weight: 500; line-height: 1.2; font-size: 2rem;\">Concepts</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem;\"><span class=\"Concepts-area-color\" style=\"box-sizing: border-box; color: gray !important;\">It\'s the idea that matters and then materialized into icon.</span><br style=\"box-sizing: border-box;\" />We dig deeper to understand how the spaces we design will impact human behavior. Our people oriented, holistic approach empowers us to understand, envision and design solutions that create meaning and value. We gather all perspectives and consider every angle. This depth of understanding allows us to deliver the right solutions to the right problems.<br style=\"box-sizing: border-box;\" /><span class=\"Concepts-area-color\" style=\"box-sizing: border-box; color: gray !important;\">We conceive the abstract and make it real.</span><br style=\"box-sizing: border-box;\" />Ideas are the source of innovation. They propel us forward, fueling new insights and breakthroughs. We engage our</p>\r\n</section>\r\n<footer class=\"footer fixed-bottom\" style=\"box-sizing: border-box; position: fixed; right: 0px; bottom: 0px; left: 0px; z-index: 1030;\">\r\n<div class=\"container-fluid\" style=\"box-sizing: border-box; width: 1349px; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;\">&nbsp;</div>\r\n</footer>', 1, '2019-09-19 15:06:27', '2019-09-19 09:06:27', 'approach');
INSERT INTO `pages` VALUES (15, 'vsvsdavca', '<p>adcvadcv</p>', 1, '2019-09-23 18:27:47', '2019-09-23 18:27:47', 'vsvsdavca');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('chakrabortypranto39@gmail.com', '$2y$10$n0ujlaCFaVXweMz4KsPU4O53rGbF4U36wifbYsM.BaQ1c0IzFk8gi', '2019-09-26 14:42:56');

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `img` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sliders
-- ----------------------------
INSERT INTO `sliders` VALUES (8, '04.jpg', 5, '2019-09-20 22:56:43', '2019-09-20 16:56:43');
INSERT INTO `sliders` VALUES (9, '4.jpg', 2, '2019-09-20 15:56:06', '2019-09-20 15:56:06');
INSERT INTO `sliders` VALUES (10, '11.jpg', 3, '2019-09-20 15:56:33', '2019-09-20 15:56:33');
INSERT INTO `sliders` VALUES (11, '6.jpg', 4, '2019-09-20 15:57:16', '2019-09-20 15:57:16');
INSERT INTO `sliders` VALUES (12, '1.jpg', 1, '2019-09-20 23:44:24', '2019-09-20 17:44:24');
INSERT INTO `sliders` VALUES (13, '2.jpg', 6, '2019-09-20 23:44:34', '2019-09-20 17:44:34');

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams`  (
  `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `degree` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of teams
-- ----------------------------
INSERT INTO `teams` VALUES (5, 'saumen hazra', 'principal architect', 'b. arch. (buet) 2001 m. arch. (buet) 2019', 'profile-1.png', '2019-09-21 15:23:25', '2019-09-18 16:20:07', 1);
INSERT INTO `teams` VALUES (6, 'md. golam sarwer', 'structural engineer', 'b.sc. engineering (civil) (buet) 1993', 'noimage.jpg', '2019-09-18 16:21:45', '2019-09-18 16:21:45', 1);
INSERT INTO `teams` VALUES (7, 'atif mahbub', 'architect', 'b. arch. (aust) 2010', 'noimage.jpg', '2019-09-18 16:22:14', '2019-09-18 16:22:14', 1);
INSERT INTO `teams` VALUES (8, 'md. monirul hasan', 'structural engineer', 'b.sc. engineering (civil) (buet) 1993', 'noimage.jpg', '2019-09-18 16:23:25', '2019-09-18 16:23:25', 1);
INSERT INTO `teams` VALUES (9, 'arfan ahmed purno', 'architect', 'b. arch. (uap) 2016', 'noimage.jpg', '2019-09-18 16:23:55', '2019-09-18 16:23:55', 1);
INSERT INTO `teams` VALUES (10, 'a. b. m. rabiul alam', 'electrical engineer', 'b.sc engineering (electrical) (rajshahi engr. college) 1974', NULL, '2019-09-18 16:25:29', '2019-09-18 16:25:29', 1);
INSERT INTO `teams` VALUES (11, 'umme habiba', 'cad manager', 'dip. in engineering (architecture) (polytechnic rajshahi) 2013', NULL, '2019-09-18 16:27:43', '2019-09-18 16:27:43', 1);
INSERT INTO `teams` VALUES (12, 'md. sahajahan', 'plumbing engineer', 'b.sc. engineering (civil) (bit khulna ) 1988', NULL, '2019-09-18 16:28:04', '2019-09-18 16:28:04', 1);
INSERT INTO `teams` VALUES (13, 'md. jubair hossain', 'office manager', 'dip. in engineering (civil) ((polytechnic cox’s bazar) 2017', NULL, '2019-09-18 16:28:27', '2019-09-18 16:28:27', 1);
INSERT INTO `teams` VALUES (14, 'md. golam sarwer', 'Estimator', 'dip. in engineering (civil) 1982', NULL, '2019-09-18 16:28:55', '2019-09-18 16:28:55', 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Tanvir', 'tanvir@gmail.com', NULL, '$2y$10$jYIpuxScDA078KzvWX2T2Ozky06.6BC.5g6hic.LcaNvOpnOYFMrG', 'RtTTd5vtD5IJQjYbznBC878uHtfhM5X8bxL1Y3auRYHsbFGsgWCVouDsS8wI', '2019-09-08 15:49:23', '2019-09-08 15:49:23');
INSERT INTO `users` VALUES (2, 'saumen hazra', 'saumen@gmail.com', NULL, '$2y$10$HGjQIUjZ4MQrO4ZEG38A.u/oFElpb3FibFDXW6mq75idakaAGglUq', NULL, '2019-09-26 19:12:10', '2019-09-26 19:12:10');

-- ----------------------------
-- Table structure for work_file_metas
-- ----------------------------
DROP TABLE IF EXISTS `work_file_metas`;
CREATE TABLE `work_file_metas`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `work_id` int(11) NULL DEFAULT NULL,
  `workfile_id` int(11) NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of work_file_metas
-- ----------------------------
INSERT INTO `work_file_metas` VALUES (31, 39, 51, '2019-09-30 18:48:37', '2019-09-30 18:48:37');

-- ----------------------------
-- Table structure for work_files
-- ----------------------------
DROP TABLE IF EXISTS `work_files`;
CREATE TABLE `work_files`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of work_files
-- ----------------------------
INSERT INTO `work_files` VALUES (50, '2019-09-30 17:11:24', '2019-09-30 17:11:24', 1, 'CITY’S RESIDENCE', 'city’s-residence', 'client-1.png');
INSERT INTO `work_files` VALUES (51, '2019-09-30 18:48:37', '2019-09-30 18:48:37', 1, 'red', 'red', 'client-1_1.png');

-- ----------------------------
-- Table structure for workfile_imgs
-- ----------------------------
DROP TABLE IF EXISTS `workfile_imgs`;
CREATE TABLE `workfile_imgs`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `details` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `workfile_id` int(11) NOT NULL,
  `file_type` int(11) NOT NULL COMMENT '0=text, 1=img, 2=video',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of workfile_imgs
-- ----------------------------
INSERT INTO `workfile_imgs` VALUES (20, NULL, '2019-10-11 20:27:11', '2019-10-11 14:27:11', '<p>57y5ye5e</p>', 51, 1);
INSERT INTO `workfile_imgs` VALUES (21, '11.png', '2019-10-02 19:51:34', '2019-10-02 19:51:34', NULL, 51, 2);
INSERT INTO `workfile_imgs` VALUES (22, NULL, '2019-10-11 20:23:04', '2019-10-11 14:23:04', '<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify; background-color: #ffffff;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', 51, 1);

-- ----------------------------
-- Table structure for workfile_types
-- ----------------------------
DROP TABLE IF EXISTS `workfile_types`;
CREATE TABLE `workfile_types`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of workfile_types
-- ----------------------------
INSERT INTO `workfile_types` VALUES (1, 'Text', '2019-09-25 07:05:24', '2019-09-25 07:05:24');
INSERT INTO `workfile_types` VALUES (2, 'Image', '2019-09-25 07:05:49', '2019-09-25 07:05:49');
INSERT INTO `workfile_types` VALUES (3, 'Video', '2019-09-27 01:02:17', '2019-09-26 19:01:42');

-- ----------------------------
-- Table structure for works
-- ----------------------------
DROP TABLE IF EXISTS `works`;
CREATE TABLE `works`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hit` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of works
-- ----------------------------
INSERT INTO `works` VALUES (37, 'single-family', 1, '2019-09-27 18:04:42', '2019-09-27 18:04:42', 'single family', '5.jpg', 0);
INSERT INTO `works` VALUES (38, 'apartment', 1, '2019-09-27 18:05:02', '2019-09-27 18:05:02', 'apartment', '6.jpg', 0);
INSERT INTO `works` VALUES (39, 'commercial', 1, '2019-09-27 18:05:16', '2019-09-27 18:05:16', 'commercial', '6_1.jpg', 0);
INSERT INTO `works` VALUES (40, 'mixed-use', 1, '2019-09-27 18:05:38', '2019-09-27 18:05:38', 'mixed use', '6_2.jpg', 0);
INSERT INTO `works` VALUES (41, 'industrial', 1, '2019-09-27 18:06:02', '2019-09-27 18:06:02', 'industrial', '6_3.jpg', 0);
INSERT INTO `works` VALUES (42, 'institutional', 1, '2019-09-27 18:06:50', '2019-09-27 18:06:50', 'institutional', '6_4.jpg', 0);
INSERT INTO `works` VALUES (43, 'religious', 1, '2019-09-27 18:07:04', '2019-09-27 18:07:04', 'religious', '6_5.jpg', 0);
INSERT INTO `works` VALUES (44, 'miscellaneous', 1, '2019-09-27 18:07:17', '2019-09-27 18:07:17', 'miscellaneous', '6_6.jpg', 0);
INSERT INTO `works` VALUES (45, 'landscape', 1, '2019-09-27 18:07:29', '2019-09-27 18:07:29', 'landscape', '6_7.jpg', 0);
INSERT INTO `works` VALUES (46, 'product', 1, '2019-09-27 18:07:44', '2019-09-27 18:07:44', 'Product', '6_8.jpg', 0);
INSERT INTO `works` VALUES (47, 'interior', 1, '2019-09-27 18:07:56', '2019-09-27 18:07:56', 'Interior', '6_9.jpg', 0);

SET FOREIGN_KEY_CHECKS = 1;
