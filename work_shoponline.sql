/*
Navicat MySQL Data Transfer

Source Server         : work
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : work_shoponline

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2015-09-08 21:58:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for work_atts
-- ----------------------------
DROP TABLE IF EXISTS `work_atts`;
CREATE TABLE `work_atts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `att_category_id` int(10) unsigned NOT NULL,
  `att_category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `atts_att_category_id_index` (`att_category_id`),
  CONSTRAINT `atts_att_category_id_foreign` FOREIGN KEY (`att_category_id`) REFERENCES `work_att_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_atts
-- ----------------------------

-- ----------------------------
-- Table structure for work_att_categories
-- ----------------------------
DROP TABLE IF EXISTS `work_att_categories`;
CREATE TABLE `work_att_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_att_categories
-- ----------------------------

-- ----------------------------
-- Table structure for work_categories
-- ----------------------------
DROP TABLE IF EXISTS `work_categories`;
CREATE TABLE `work_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(10) unsigned NOT NULL,
  `father_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `categories_module_id_index` (`module_id`),
  CONSTRAINT `categories_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `work_role_module` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_categories
-- ----------------------------
INSERT INTO `work_categories` VALUES ('1', '1', null, 'Kệ treo tường', 'ke-treo-tuong', 'Kệ treo tường', '2015-09-012015-08-22cataloge 2.png', 'Kệ treo tường', 'Kệ treo tường', '0', '1', '1', '2015-09-01 22:25:58', '2015-09-01 22:25:58');
INSERT INTO `work_categories` VALUES ('2', '1', null, 'Tranh phù điêu hiện đại', 'tranh-phu-dieu-hien-dai', 'Tranh phù điêu hiện đại', '2015-09-012015-08-22cataloge 2.png', 'Tranh phù điêu hiện đại', 'Tranh phù điêu hiện đại', '0', '1', '1', '2015-09-01 22:26:30', '2015-09-01 22:26:30');
INSERT INTO `work_categories` VALUES ('3', '1', null, 'Đồng hồ treo tường', 'dong-ho-treo-tuong', 'Đồng hồ treo tường', '2015-09-012015-08-22cataloge 2.png', 'Đồng hồ treo tường', 'Đồng hồ treo tường', '0', '1', '1', '2015-09-01 22:26:53', '2015-09-01 22:26:53');
INSERT INTO `work_categories` VALUES ('4', '1', null, 'Đèn trang trí', 'den-trang-tri', 'Đèn trang trí', '2015-09-012015-08-22cataloge 2.png', 'Đèn trang trí', 'Đèn trang trí', '0', '1', '1', '2015-09-01 22:27:10', '2015-09-01 22:27:10');
INSERT INTO `work_categories` VALUES ('5', '1', null, 'Đồ trang trí bàn, kệ', 'do-trang-tri-ban-ke', 'Đồ trang trí bàn, kệ', '2015-09-012015-08-22cataloge 2.png', 'Đồ trang trí bàn, kệ', 'Đồ trang trí bàn, kệ', '0', '1', '1', '2015-09-01 22:27:31', '2015-09-01 22:27:31');
INSERT INTO `work_categories` VALUES ('6', '1', null, 'Phụ kiện phòng tắm', 'phu-kien-phong-tam', 'Phụ kiện phòng tắm', '2015-09-012015-08-22cataloge 2.png', 'Phụ kiện phòng tắm', 'Phụ kiện phòng tắm', '0', '1', '1', '2015-09-01 22:27:47', '2015-09-01 22:27:47');
INSERT INTO `work_categories` VALUES ('7', '1', null, 'Hoa giả cao cấp', 'hoa-gia-cao-cap', 'Hoa giả cao cấp', '2015-09-012015-08-22cataloge 2.png', 'Hoa giả cao cấp', 'Hoa giả cao cấp', '0', '1', '1', '2015-09-01 22:28:05', '2015-09-01 22:28:05');
INSERT INTO `work_categories` VALUES ('8', '1', null, 'Khung ảnh treo tường', 'khung-anh-treo-tuong', 'Khung ảnh treo tường', '2015-09-012015-08-22cataloge 2.png', 'Khung ảnh treo tường', 'Khung ảnh treo tường', '0', '1', '1', '2015-09-01 22:28:21', '2015-09-01 22:28:21');
INSERT INTO `work_categories` VALUES ('9', '1', null, 'Hàng bán chạy', 'hang-ban-chay', 'Hàng bán chạy', '2015-09-012015-08-22cataloge 2.png', 'Hàng bán chạy', 'Hàng bán chạy', '0', '1', '1', '2015-09-01 22:28:34', '2015-09-01 22:28:34');
INSERT INTO `work_categories` VALUES ('10', '1', null, 'Gương', 'guong', 'Gương', '2015-09-012015-08-22cataloge 2.png', 'Gương', 'Gương', '0', '1', '1', '2015-09-01 22:28:49', '2015-09-01 22:28:49');
INSERT INTO `work_categories` VALUES ('11', '1', null, 'Đồ trang trí', 'do-trang-tri', 'Đồ trang trí', '2015-09-012015-08-22cataloge 2.png', 'Đồ trang trí', 'Đồ trang trí', '0', '1', '1', '2015-09-01 22:29:23', '2015-09-01 22:29:23');

-- ----------------------------
-- Table structure for work_categories_article
-- ----------------------------
DROP TABLE IF EXISTS `work_categories_article`;
CREATE TABLE `work_categories_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `categories_article_module_id_index` (`module_id`),
  CONSTRAINT `categories_article_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `work_role_module` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_categories_article
-- ----------------------------
INSERT INTO `work_categories_article` VALUES ('1', '2', 'Blog Nhà Đẹp', 'blog-nha-dep', '0', '2015-09-01 15:51:44', '2015-09-01 15:51:44');
INSERT INTO `work_categories_article` VALUES ('2', '2', 'Tin Tức', 'tin-tuc', '0', '2015-09-01 15:51:45', '2015-09-01 15:51:45');
INSERT INTO `work_categories_article` VALUES ('3', '2', 'Thiết Kế', 'thiet-ke', '0', '2015-09-01 15:51:45', '2015-09-01 15:51:45');

-- ----------------------------
-- Table structure for work_categories_custom
-- ----------------------------
DROP TABLE IF EXISTS `work_categories_custom`;
CREATE TABLE `work_categories_custom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_custom_count_unique` (`count`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_categories_custom
-- ----------------------------
INSERT INTO `work_categories_custom` VALUES ('2', 'Phụ kiện phòng tắm', '2015-09-01product.jpg', '/#/danh-muc/phu-kien-phong-tam', '1', '2015-09-01 22:35:47', '2015-09-01 22:35:47');

-- ----------------------------
-- Table structure for work_consults
-- ----------------------------
DROP TABLE IF EXISTS `work_consults`;
CREATE TABLE `work_consults` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_consults
-- ----------------------------

-- ----------------------------
-- Table structure for work_contact
-- ----------------------------
DROP TABLE IF EXISTS `work_contact`;
CREATE TABLE `work_contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_contact
-- ----------------------------

-- ----------------------------
-- Table structure for work_groups
-- ----------------------------
DROP TABLE IF EXISTS `work_groups`;
CREATE TABLE `work_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_groups
-- ----------------------------
INSERT INTO `work_groups` VALUES ('1', 'HÀNG BÁN CHẠY', 'hang-ban-chay', '2015-09-01-product.jpg', 'Hàng bán chạy', 'Hàng bán chạy', '0', '1', '1', '2015-09-01 22:34:14', '2015-09-01 22:34:14');

-- ----------------------------
-- Table structure for work_group_product
-- ----------------------------
DROP TABLE IF EXISTS `work_group_product`;
CREATE TABLE `work_group_product` (
  `group_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  KEY `group_product_group_id_index` (`group_id`),
  KEY `group_product_product_id_index` (`product_id`),
  CONSTRAINT `group_product_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `work_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `group_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `work_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_group_product
-- ----------------------------

-- ----------------------------
-- Table structure for work_migrations
-- ----------------------------
DROP TABLE IF EXISTS `work_migrations`;
CREATE TABLE `work_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_migrations
-- ----------------------------
INSERT INTO `work_migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `work_migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_06_26_085420_create_roles_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_06_26_085446_create_user_roles_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_06_26_085447_create_role_module_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_06_26_085448_create_categories_article_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_07_14_033500_create_post_lang_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_07_14_033509_create_posts_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_07_14_033524_create_tags_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_07_14_033537_create_post_tag_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_07_23_161750_create_user_info_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_07_28_083130_create_categories_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_07_28_083149_create_products_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_07_30_093533_create_groups_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_07_30_094938_create_atts_categories_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_07_30_095654_create_atts_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_07_30_095728_create_product_att_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_07_30_103020_create_group_product_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_07_30_110319_create_product_galery_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_08_04_221212_create_orders_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_08_04_221304_create_order_items_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_08_11_084619_create_consults_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_08_11_084651_create_contact_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_08_11_084714_create_theme_options_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_08_11_091036_create_scripts_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_08_11_091115_create_slides_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_08_19_095725_create_product_rate_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_08_19_095901_create_post_comment_table', '1');
INSERT INTO `work_migrations` VALUES ('2015_08_25_082917_create_categories_custom_table', '1');

-- ----------------------------
-- Table structure for work_orders
-- ----------------------------
DROP TABLE IF EXISTS `work_orders`;
CREATE TABLE `work_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `order_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chờ xử lý',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_orders
-- ----------------------------

-- ----------------------------
-- Table structure for work_order_items
-- ----------------------------
DROP TABLE IF EXISTS `work_order_items`;
CREATE TABLE `work_order_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_index` (`order_id`),
  KEY `order_items_product_id_index` (`product_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `work_orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `work_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_order_items
-- ----------------------------

-- ----------------------------
-- Table structure for work_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `work_password_resets`;
CREATE TABLE `work_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for work_posts
-- ----------------------------
DROP TABLE IF EXISTS `work_posts`;
CREATE TABLE `work_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `lang_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isHot` tinyint(1) NOT NULL DEFAULT '0',
  `isSticky` tinyint(1) NOT NULL DEFAULT '0',
  `isPublish` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `publish_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `posts_user_id_index` (`user_id`),
  KEY `posts_lang_id_index` (`lang_id`),
  KEY `posts_category_id_index` (`category_id`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `work_categories_article` (`id`) ON DELETE CASCADE,
  CONSTRAINT `posts_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `work_post_langs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `work_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_posts
-- ----------------------------
INSERT INTO `work_posts` VALUES ('1', '1', '1', '1', 'Tên bài viết', 'ten-bai-viet', '<p>Tên bài viết</p>\r\n', '2015-09-01-product.jpg', 'Tên bài viết', 'Tên bài viết', '0', '0', '0', '0', '2015-08-25 03:03:00', '2015-09-01 22:32:26', '2015-09-01 22:32:26');
INSERT INTO `work_posts` VALUES ('2', '1', '1', '2', 'Tên bài viết phần tin tức', 'ten-bai-viet-phan-tin-tuc', '<p>Tên bài viết phần tin tức</p>\r\n', '2015-09-01-product.jpg', 'Tên bài viết phần tin tức', 'Tên bài viết phần tin tức', '0', '0', '0', '0', '2015-08-26 02:02:00', '2015-09-01 22:32:56', '2015-09-01 22:32:56');

-- ----------------------------
-- Table structure for work_post_comments
-- ----------------------------
DROP TABLE IF EXISTS `work_post_comments`;
CREATE TABLE `work_post_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `post_comments_post_id_index` (`post_id`),
  CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `work_posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_post_comments
-- ----------------------------

-- ----------------------------
-- Table structure for work_post_langs
-- ----------------------------
DROP TABLE IF EXISTS `work_post_langs`;
CREATE TABLE `work_post_langs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_post_langs
-- ----------------------------
INSERT INTO `work_post_langs` VALUES ('1', 'Vietnamese', 'vi', '2015-09-01 22:31:29', '2015-09-01 22:31:29');

-- ----------------------------
-- Table structure for work_post_tag
-- ----------------------------
DROP TABLE IF EXISTS `work_post_tag`;
CREATE TABLE `work_post_tag` (
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  KEY `post_tag_post_id_index` (`post_id`),
  KEY `post_tag_tag_id_index` (`tag_id`),
  CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `work_posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `work_tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_post_tag
-- ----------------------------
INSERT INTO `work_post_tag` VALUES ('1', '1');
INSERT INTO `work_post_tag` VALUES ('2', '1');

-- ----------------------------
-- Table structure for work_products
-- ----------------------------
DROP TABLE IF EXISTS `work_products`;
CREATE TABLE `work_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `listed_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `selling_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `feature_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `in_stock` tinyint(1) NOT NULL DEFAULT '1',
  `promotion` int(11) NOT NULL DEFAULT '0',
  `tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `products_category_id_index` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `work_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_products
-- ----------------------------
INSERT INTO `work_products` VALUES ('1', '1', 'something123', 'thienth', 'thienth', '123.00', '234.00', '<p>something</p>\r\n', '<p>dfg</p>\r\n', '2015-09-08-2015-08-22cataloge 2.png', '1', '0', null, 'Hàng bán chạy', 'dfgdfgfdgfdg', '0', '1', '1', '2015-09-08 21:17:42', '2015-09-08 21:17:42');

-- ----------------------------
-- Table structure for work_product_att
-- ----------------------------
DROP TABLE IF EXISTS `work_product_att`;
CREATE TABLE `work_product_att` (
  `product_id` int(10) unsigned NOT NULL,
  `att_id` int(10) unsigned NOT NULL,
  KEY `product_att_product_id_index` (`product_id`),
  KEY `product_att_att_id_index` (`att_id`),
  CONSTRAINT `product_att_att_id_foreign` FOREIGN KEY (`att_id`) REFERENCES `work_atts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_att_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `work_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_product_att
-- ----------------------------

-- ----------------------------
-- Table structure for work_product_galeries
-- ----------------------------
DROP TABLE IF EXISTS `work_product_galeries`;
CREATE TABLE `work_product_galeries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_galeries_product_id_index` (`product_id`),
  CONSTRAINT `product_galeries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `work_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_product_galeries
-- ----------------------------
INSERT INTO `work_product_galeries` VALUES ('1', '1', 'slide.png', '0', '1', '1', '2015-09-08 21:17:42', '2015-09-08 21:17:42');
INSERT INTO `work_product_galeries` VALUES ('2', '1', 'Untitled.png', '0', '1', '1', '2015-09-08 21:17:43', '2015-09-08 21:17:43');

-- ----------------------------
-- Table structure for work_product_rates
-- ----------------------------
DROP TABLE IF EXISTS `work_product_rates`;
CREATE TABLE `work_product_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `product_rates_product_id_index` (`product_id`),
  CONSTRAINT `product_rates_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `work_products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_product_rates
-- ----------------------------

-- ----------------------------
-- Table structure for work_roles
-- ----------------------------
DROP TABLE IF EXISTS `work_roles`;
CREATE TABLE `work_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_roles
-- ----------------------------
INSERT INTO `work_roles` VALUES ('1', 'admin', '100', '0', '2015-09-01 15:51:42', '2015-09-01 15:51:42');
INSERT INTO `work_roles` VALUES ('2', 'shop_manager', '80', '0', '2015-09-01 15:51:42', '2015-09-01 15:51:42');
INSERT INTO `work_roles` VALUES ('3', 'article_manager', '60', '0', '2015-09-01 15:51:43', '2015-09-01 15:51:43');
INSERT INTO `work_roles` VALUES ('4', 'customer', '10', '0', '2015-09-01 15:51:43', '2015-09-01 15:51:43');

-- ----------------------------
-- Table structure for work_role_module
-- ----------------------------
DROP TABLE IF EXISTS `work_role_module`;
CREATE TABLE `work_role_module` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `father_id` int(10) unsigned NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `role_module_role_id_index` (`role_id`),
  KEY `role_module_father_id_foreign` (`father_id`),
  CONSTRAINT `role_module_father_id_foreign` FOREIGN KEY (`father_id`) REFERENCES `work_role_module` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_module_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `work_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_role_module
-- ----------------------------
INSERT INTO `work_role_module` VALUES ('1', '2', 'shop_manager', '1', null, null, '0', '2015-09-01 15:51:44', '2015-09-01 15:51:44');
INSERT INTO `work_role_module` VALUES ('2', '3', 'article_manager', '2', null, null, '0', '2015-09-01 15:51:44', '2015-09-01 15:51:44');

-- ----------------------------
-- Table structure for work_scripts
-- ----------------------------
DROP TABLE IF EXISTS `work_scripts`;
CREATE TABLE `work_scripts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `script` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_scripts
-- ----------------------------
INSERT INTO `work_scripts` VALUES ('1', 'Script', '<script></script>', '2015-08-31 14:00:00', '2015-08-31 14:00:00');

-- ----------------------------
-- Table structure for work_slides
-- ----------------------------
DROP TABLE IF EXISTS `work_slides`;
CREATE TABLE `work_slides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_slides
-- ----------------------------
INSERT INTO `work_slides` VALUES ('1', 'SlidehowHome', '2015-09-01-slide.png', 'SlidehowHome', 'http://mir.vn', '2015-09-01 15:55:03', '2015-09-01 15:55:03');
INSERT INTO `work_slides` VALUES ('2', 'SlidehowHome', '2015-09-01-slide.png', 'SlidehowHome', 'http://mir.vn', '2015-09-01 15:55:19', '2015-09-01 15:55:19');

-- ----------------------------
-- Table structure for work_tags
-- ----------------------------
DROP TABLE IF EXISTS `work_tags`;
CREATE TABLE `work_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tags_lang_id_index` (`lang_id`),
  CONSTRAINT `tags_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `work_post_langs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_tags
-- ----------------------------
INSERT INTO `work_tags` VALUES ('1', '1', 'Blog', 'blog', '2015-09-01 22:31:36', '2015-09-01 22:31:36');

-- ----------------------------
-- Table structure for work_theme_options
-- ----------------------------
DROP TABLE IF EXISTS `work_theme_options`;
CREATE TABLE `work_theme_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hotline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `showroom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `social_fb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `social_twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `social_google_plus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `social_pinterest` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_theme_options
-- ----------------------------
INSERT INTO `work_theme_options` VALUES ('1', 'logo.png', 'www.mir.vn', 'mirvietnam@gmail.com', '1900 0000', 'P.2010, Tòa B, Chung Cư Cao Cấp Mulberry Lane Lê Văn Lương- Mỗ Lao - quận Hà Đông - Hà Nội', 'facebook.com', 'twitter.com', 'google.com', 'pinterest.com', '2015-09-01 15:51:45', '2015-09-01 15:51:45');

-- ----------------------------
-- Table structure for work_users
-- ----------------------------
DROP TABLE IF EXISTS `work_users`;
CREATE TABLE `work_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_users
-- ----------------------------
INSERT INTO `work_users` VALUES ('1', 'Long Híp', 'longhip.dev@gmail.com', '$2y$10$knhszFVc9VeIbgvTbeEJ/OlooQAS1xp.cFhgSeE1vSOwA9PmEQYDG', null, '2015-09-01 15:51:38', '2015-09-01 15:51:38');
INSERT INTO `work_users` VALUES ('2', 'ShopManager', 'shop_manager@shop.vn', '$2y$10$Cngokzo67W0X3b4TDmfvM.1cUOr.mOIXDCvpFhdfc/GzSiS3tgUsu', null, '2015-09-01 15:51:39', '2015-09-01 15:51:39');
INSERT INTO `work_users` VALUES ('3', 'ArticleManager', 'article_manager@shop.vn', '$2y$10$Yajpf3Xs5qhzj5tWet0sMekHWdRfdbzgJRByZHtclmBXOnkgfo9qK', null, '2015-09-01 15:51:40', '2015-09-01 15:51:40');

-- ----------------------------
-- Table structure for work_user_info
-- ----------------------------
DROP TABLE IF EXISTS `work_user_info`;
CREATE TABLE `work_user_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birth` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_info_user_id_index` (`user_id`),
  CONSTRAINT `user_info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `work_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_user_info
-- ----------------------------
INSERT INTO `work_user_info` VALUES ('1', '1', '', '', '', '', '0000-00-00', '2015-09-01 15:51:42', '2015-09-01 15:51:42');

-- ----------------------------
-- Table structure for work_user_role
-- ----------------------------
DROP TABLE IF EXISTS `work_user_role`;
CREATE TABLE `work_user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_role_user_id_index` (`user_id`),
  KEY `user_role_role_id_index` (`role_id`),
  CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `work_roles` (`id`),
  CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `work_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of work_user_role
-- ----------------------------
INSERT INTO `work_user_role` VALUES ('1', '1', '1', '2015-09-01 15:51:43', '2015-09-01 15:51:43');
INSERT INTO `work_user_role` VALUES ('2', '2', '2', '2015-09-01 15:51:43', '2015-09-01 15:51:43');
INSERT INTO `work_user_role` VALUES ('3', '3', '3', '2015-09-01 15:51:44', '2015-09-01 15:51:44');
