/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100410
 Source Host           : localhost:3306
 Source Schema         : project

 Target Server Type    : MySQL
 Target Server Version : 100410
 File Encoding         : 65001

 Date: 18/01/2021 19:01:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for friends
-- ----------------------------
DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_1_id` int(11) NOT NULL,
  `user_2_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_1_id`(`user_1_id`) USING BTREE,
  INDEX `user_2_id`(`user_2_id`) USING BTREE,
  CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user_1_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`user_2_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_croatian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of friends
-- ----------------------------
INSERT INTO `friends` VALUES (7, 1, 14);
INSERT INTO `friends` VALUES (8, 1, 2);
INSERT INTO `friends` VALUES (9, 2, 1);
INSERT INTO `friends` VALUES (10, 14, 1);
INSERT INTO `friends` VALUES (11, 15, 2);
INSERT INTO `friends` VALUES (12, 2, 15);
INSERT INTO `friends` VALUES (13, 15, 2);
INSERT INTO `friends` VALUES (14, 2, 15);
INSERT INTO `friends` VALUES (15, 15, 2);
INSERT INTO `friends` VALUES (16, 2, 15);
INSERT INTO `friends` VALUES (17, 15, 2);
INSERT INTO `friends` VALUES (18, 2, 15);
INSERT INTO `friends` VALUES (19, 15, 1);
INSERT INTO `friends` VALUES (20, 1, 15);
INSERT INTO `friends` VALUES (23, 15, 5);
INSERT INTO `friends` VALUES (24, 5, 15);
INSERT INTO `friends` VALUES (25, 15, 14);
INSERT INTO `friends` VALUES (26, 14, 15);

-- ----------------------------
-- Table structure for photo
-- ----------------------------
DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE,
  CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_croatian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of photo
-- ----------------------------
INSERT INTO `photo` VALUES (1, 1, 'image/1610721894xacker.jpg');

-- ----------------------------
-- Table structure for request
-- ----------------------------
DROP TABLE IF EXISTS `request`;
CREATE TABLE `request`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `from_id`(`from_id`) USING BTREE,
  INDEX `to_id`(`to_id`) USING BTREE,
  CONSTRAINT `request_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `request_ibfk_2` FOREIGN KEY (`to_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8 COLLATE = utf8_croatian_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of request
-- ----------------------------
INSERT INTO `request` VALUES (4, 1, 3);
INSERT INTO `request` VALUES (18, 1, 15);
INSERT INTO `request` VALUES (56, 15, 3);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Julios15', 'Cesar', 24, 'asd@mail.ru', '$2y$10$0fZtacNn.HrPwNdmztJdPuvk/hWN3oXPgq1B/HNoG.UiE345yYpCG', 'image/default.jpg');
INSERT INTO `user` VALUES (2, 'Julios', 'asd', 21, 'asdad@mail.ru', '$2y$10$dMU0AO0UMJa.KJBM5G.aL.vrRXOc/df/mOQsxWmUd600tehUQaqgm', 'image/default.jpg');
INSERT INTO `user` VALUES (3, 'Julios', 'asd', 21, 'asdssdsd@mail.ru', '$2y$10$T14Vq6PG2WavjqvZAYB/JOQGWm8Bt8k/dtASyljaoODj1azJ90sFa', 'image/default.jpg');
INSERT INTO `user` VALUES (4, 'Julios', 'Cesar', 21, 'dasdasd@mail.ru', '$2y$10$tf/r5FnrZsCVHqE8JS8jRe7UtfSuvnXaTMVZOLtkcmf7bg7aacugi', 'image/default.jpg');
INSERT INTO `user` VALUES (5, 'Julios', 'asd', 21, 'asasdd@mail.ru', '$2y$10$f8jlEz.3S.jPS6xdoveoge.y9NhUhho0KBgv90OzI5SzDIwuAAJei', 'image/default.jpg');
INSERT INTO `user` VALUES (14, 'Hayk', 'Kirakosyan', 25, 'ghkhtv@mail.ru', '$2y$10$ems25LXUqnlWGyoaMl7A5Ol/E2euy.Swrb3ncrUTq6.jUTVomydyO', 'image/default.jpg');
INSERT INTO `user` VALUES (15, 'test', 'test', 20, 'test@gmail.com', '$2y$10$pBSIdz4zx0pTcGBaVl0b/.qbvSq825GEjHpmbze0kwm4l8uU6W4ni', 'image/default.jpg');

SET FOREIGN_KEY_CHECKS = 1;
