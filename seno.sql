/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50734 (5.7.34)
 Source Host           : localhost:3306
 Source Schema         : seno

 Target Server Type    : MySQL
 Target Server Version : 50734 (5.7.34)
 File Encoding         : 65001

 Date: 02/05/2023 02:28:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for jenis
-- ----------------------------
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jenis
-- ----------------------------
BEGIN;
INSERT INTO `jenis` (`id`, `nama`) VALUES (1, 'Moge');
INSERT INTO `jenis` (`id`, `nama`) VALUES (2, 'Motor Bebek');
COMMIT;

-- ----------------------------
-- Table structure for pemeriksaan
-- ----------------------------
DROP TABLE IF EXISTS `pemeriksaan`;
CREATE TABLE `pemeriksaan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `registrasi_id` int(11) DEFAULT NULL,
  `petugas_id` int(11) DEFAULT NULL,
  `tanggal` varchar(255) DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  `hasil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uji_peralatan` varchar(255) DEFAULT NULL,
  `uji_penerangan` varchar(255) DEFAULT NULL,
  `uji_kemudi` varchar(255) DEFAULT NULL,
  `uji_chasis` varchar(255) DEFAULT NULL,
  `uji_rangka` varchar(255) DEFAULT NULL,
  `uji_rem` varchar(255) DEFAULT NULL,
  `uji_mesin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pemeriksaan
-- ----------------------------
BEGIN;
INSERT INTO `pemeriksaan` (`id`, `registrasi_id`, `petugas_id`, `tanggal`, `nomor`, `hasil`, `created_at`, `updated_at`, `uji_peralatan`, `uji_penerangan`, `uji_kemudi`, `uji_chasis`, `uji_rangka`, `uji_rem`, `uji_mesin`) VALUES (5, 2, 2, '2023-05-02', '1', 'LULUS', '2023-05-02 00:55:53', '2023-05-02 00:55:53', 'LULUS', 'LULUS', 'TIDAK LULUS', 'LULUS', 'LULUS', 'TIDAK LULUS', 'LULUS');
COMMIT;

-- ----------------------------
-- Table structure for petugas
-- ----------------------------
DROP TABLE IF EXISTS `petugas`;
CREATE TABLE `petugas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of petugas
-- ----------------------------
BEGIN;
INSERT INTO `petugas` (`id`, `nama`, `jabatan`) VALUES (2, 'budi', 'pns');
INSERT INTO `petugas` (`id`, `nama`, `jabatan`) VALUES (3, 'adi', '----');
COMMIT;

-- ----------------------------
-- Table structure for registrasi
-- ----------------------------
DROP TABLE IF EXISTS `registrasi`;
CREATE TABLE `registrasi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_reg` varchar(255) DEFAULT NULL,
  `nomor_polisi` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `pemilik` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_id` int(11) unsigned DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `nomor_rangka` varchar(255) DEFAULT NULL,
  `tahun` varchar(255) DEFAULT NULL,
  `nomor_mesin` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of registrasi
-- ----------------------------
BEGIN;
INSERT INTO `registrasi` (`id`, `nomor_reg`, `nomor_polisi`, `tanggal`, `pemilik`, `alamat`, `jenis_id`, `merk`, `tipe`, `nomor_rangka`, `tahun`, `nomor_mesin`, `created_at`, `updated_at`) VALUES (2, '1', 'dsfds', '2023-05-01', 'sdf2', '1sdf', 1, 'sdf1', 'dfg', 'asfdsf', 'sad', 'dfsdgsdfdsf', '2023-05-01 23:17:35', '2023-05-01 23:24:10');
COMMIT;

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  UNIQUE KEY `role_users_user_id_role_id_unique` (`user_id`,`role_id`) USING BTREE,
  KEY `role_users_role_id_foreign` (`role_id`) USING BTREE,
  CONSTRAINT `role_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of role_users
-- ----------------------------
BEGIN;
INSERT INTO `role_users` (`user_id`, `role_id`) VALUES (1, 1);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (1, 'superadmin', '2020-12-23 23:17:35', '2020-12-23 23:17:35');
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES (2, 'pemohon', '2022-10-19 14:20:54', '2022-10-19 14:20:54');
COMMIT;

-- ----------------------------
-- Table structure for surat
-- ----------------------------
DROP TABLE IF EXISTS `surat`;
CREATE TABLE `surat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pemeriksaan_id` int(11) unsigned DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nomor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of surat
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `password_superadmin` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `api_token` varchar(255) DEFAULT NULL,
  `last_session` varchar(255) DEFAULT NULL,
  `change_password` int(1) unsigned DEFAULT '0' COMMENT '0: belum, 1: sudah',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `users_username_unique` (`username`) USING BTREE,
  UNIQUE KEY `users_email_unique` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `password_superadmin`, `remember_token`, `created_at`, `updated_at`, `api_token`, `last_session`, `change_password`) VALUES (1, 'superadmin', NULL, 'superadmin', '2022-11-07 00:40:59', '$2y$10$E9xG1OtIFvBRbHqlwHCC3u48vO5eBf2OQ9wFNpi.qKOAzVqNDUdW2', NULL, NULL, '2022-11-07 00:40:59', '2022-11-06 16:40:59', '$2y$10$tjMANlV25IUwvKuPxEODW.3qE3zPSKjwhmgTcZUgsPDZRGcpgGAN.', NULL, 0);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
