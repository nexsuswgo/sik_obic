/*
 Navicat Premium Data Transfer

 Source Server         : JOPI
 Source Server Type    : MariaDB
 Source Server Version : 100425 (10.4.25-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : obic

 Target Server Type    : MariaDB
 Target Server Version : 100425 (10.4.25-MariaDB)
 File Encoding         : 65001

 Date: 10/07/2023 05:02:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_07_09_085214_create_kategoris_table', 2);
INSERT INTO `migrations` VALUES (7, '2023_07_09_111449_create_banks_table', 3);
INSERT INTO `migrations` VALUES (8, '2023_07_09_115404_create_transaksis_table', 4);
INSERT INTO `migrations` VALUES (9, '2023_07_09_142004_create_hutang_piutangs_table', 5);
INSERT INTO `migrations` VALUES (10, '2023_07_09_151933_create_debitur_krediturs_table', 6);
INSERT INTO `migrations` VALUES (11, '2023_07_09_171340_create_periodes_table', 7);

-- ----------------------------
-- Table structure for obic_bank
-- ----------------------------
DROP TABLE IF EXISTS `obic_bank`;
CREATE TABLE `obic_bank`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemilik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rekening` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of obic_bank
-- ----------------------------
INSERT INTO `obic_bank` VALUES (2, 'Bank Nasional Indonesia', 'Mamang Garox', '23123123123', '213231232', '2023-07-09 11:39:17', '2023-07-09 21:56:45');
INSERT INTO `obic_bank` VALUES (4, 'Bank Nasional Indonesia', 'Bang Bujang', '12313213', '2312313123123', '2023-07-09 21:56:33', '2023-07-09 21:56:33');

-- ----------------------------
-- Table structure for obic_debitur_kreditur
-- ----------------------------
DROP TABLE IF EXISTS `obic_debitur_kreditur`;
CREATE TABLE `obic_debitur_kreditur`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `toko` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of obic_debitur_kreditur
-- ----------------------------
INSERT INTO `obic_debitur_kreditur` VALUES (1, 'Aseng', 'Mitra Jaya', 'Debitur', '2023-07-09 15:36:52', '2023-07-09 21:52:09');
INSERT INTO `obic_debitur_kreditur` VALUES (3, 'Bajong', 'Ceria Mart', 'Debitur', '2023-07-09 21:52:26', '2023-07-09 21:52:26');
INSERT INTO `obic_debitur_kreditur` VALUES (4, 'Tomang', 'Hari Jaya', 'Kreditur', '2023-07-09 21:52:45', '2023-07-09 21:52:45');
INSERT INTO `obic_debitur_kreditur` VALUES (5, 'Jancoek', 'Fresh Mart', 'Kreditur', '2023-07-09 21:53:02', '2023-07-09 21:53:02');

-- ----------------------------
-- Table structure for obic_hutang_piutang
-- ----------------------------
DROP TABLE IF EXISTS `obic_hutang_piutang`;
CREATE TABLE `obic_hutang_piutang`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `periode_id` bigint(20) NULL DEFAULT NULL,
  `tgl` date NOT NULL,
  `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of obic_hutang_piutang
-- ----------------------------
INSERT INTO `obic_hutang_piutang` VALUES (2, 5, '2023-07-09', 'HTG-2', 'asu', '232312', 'Hutang', '2023-07-09 14:43:06', '2023-07-09 20:41:44');
INSERT INTO `obic_hutang_piutang` VALUES (3, 5, '2023-07-02', 'PTG-3', 'asu', '54353', 'Piutang', '2023-07-09 14:52:15', '2023-07-09 20:46:02');
INSERT INTO `obic_hutang_piutang` VALUES (5, 5, '2023-07-01', 'HTG-4', 'asu', '23123', 'Hutang', '2023-07-09 20:38:37', '2023-07-09 20:40:13');
INSERT INTO `obic_hutang_piutang` VALUES (7, 5, '2023-07-13', 'PTG-7', 'asu tod', '21312', 'Piutang', '2023-07-09 20:45:51', '2023-07-09 21:55:56');
INSERT INTO `obic_hutang_piutang` VALUES (8, 5, '2023-07-01', 'HTG-8', 'babi', '3213', 'Hutang', '2023-07-09 21:55:31', '2023-07-09 21:55:31');
INSERT INTO `obic_hutang_piutang` VALUES (9, 5, '2023-07-16', 'PTG-9', 'asu', '213123', 'Piutang', '2023-07-09 21:55:46', '2023-07-09 21:55:46');

-- ----------------------------
-- Table structure for obic_kategori
-- ----------------------------
DROP TABLE IF EXISTS `obic_kategori`;
CREATE TABLE `obic_kategori`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of obic_kategori
-- ----------------------------
INSERT INTO `obic_kategori` VALUES (2, '01 Keuangan Restoran', '2023-07-09 09:11:14', '2023-07-09 21:51:19');
INSERT INTO `obic_kategori` VALUES (8, '02 Keperluan Toko', '2023-07-09 21:51:55', '2023-07-09 21:51:55');

-- ----------------------------
-- Table structure for obic_periode
-- ----------------------------
DROP TABLE IF EXISTS `obic_periode`;
CREATE TABLE `obic_periode`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `periode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of obic_periode
-- ----------------------------
INSERT INTO `obic_periode` VALUES (2, 'Maret 2023', '2', '2023-07-09 17:40:05', '2023-07-09 21:50:22');
INSERT INTO `obic_periode` VALUES (4, 'Juni 2023', '4', '2023-07-09 18:16:45', '2023-07-09 21:49:56');
INSERT INTO `obic_periode` VALUES (5, 'Juli 2023', 'Aktif', '2023-07-09 18:17:40', '2023-07-09 21:49:45');
INSERT INTO `obic_periode` VALUES (6, 'Mei 2023', '6', '2023-07-09 17:58:46', '2023-07-09 21:49:13');

-- ----------------------------
-- Table structure for obic_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `obic_transaksi`;
CREATE TABLE `obic_transaksi`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kategori_id` bigint(20) NULL DEFAULT NULL,
  `bank_id` bigint(20) NULL DEFAULT NULL,
  `periode_id` bigint(20) NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nominal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of obic_transaksi
-- ----------------------------
INSERT INTO `obic_transaksi` VALUES (1, 2, 2, 6, '2023-07-06', 'Pemasukan', 'asu', '21323', 'file/transaksi/file1688906414document-html.pdf', '2023-07-09 12:40:14', '2023-07-09 21:53:35');
INSERT INTO `obic_transaksi` VALUES (2, 2, 2, 5, '2023-07-09', 'Pengeluaran', 'asu', '12313', 'file/transaksi/file1688908490document-html.pdf', '2023-07-09 13:14:50', '2023-07-09 21:53:44');
INSERT INTO `obic_transaksi` VALUES (4, 2, 2, 5, '2023-07-16', 'Pemasukan', 'asu', '2313', 'file/transaksi/file1688927859document-html.pdf', '2023-07-09 18:37:39', '2023-07-09 21:53:51');
INSERT INTO `obic_transaksi` VALUES (6, 8, 2, 5, '2023-07-30', 'Pemasukan', 'asu', '32334', 'file/transaksi/file1688939659document-Permohonan Penerbitan Surat Pengantar Pengambilan Data Penelitian Tugas Akhir Prodi Teknologi Informasi (Ponsianus Jopi)).pdf', '2023-07-09 21:54:19', '2023-07-09 21:54:19');

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass_view` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin Obic', 'Admin', '1@gmail.com', NULL, '$2y$10$GlLCwe5I.gp8bxJOefPmBu2U8zXcITusY5JowMDNPNRE5buiRuvgC', 'jopijopi', NULL, '2023-07-09 06:31:38', '2023-07-09 21:43:31');
INSERT INTO `users` VALUES (2, 'Pemilik Obic', 'Pemilik', '2@gmail.com', NULL, '$2y$10$cV8v9FsYA64JCia4gWZN.u8OiJALhq.UsuEG1k2Amy6b62HyVrF56', 'jopijopi', NULL, '2023-07-09 14:03:06', '2023-07-09 21:45:50');

SET FOREIGN_KEY_CHECKS = 1;
