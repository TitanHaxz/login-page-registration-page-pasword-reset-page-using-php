SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

CREATE DATABASE IF NOT EXISTS lr_admin;
USE lr_admin;

-- Table structure for register
DROP TABLE IF EXISTS `register`;
CREATE TABLE `register`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- Records of register
INSERT INTO `register` VALUES (1, 'shanmugananthan', 'shanmu@gmail.com', '1234');
INSERT INTO `register` VALUES (2, 'shan', 'iamshanmugananthan@gmail.com', '1234');
INSERT INTO `register` VALUES (4, 'shan', 'shanmu1234@gmail.com', 'zxcv');

SET FOREIGN_KEY_CHECKS = 1;
