/*
 Navicat Premium Data Transfer

 Source Server         : ScarZ
 Source Server Type    : MySQL
 Source Server Version : 100113
 Source Host           : localhost:3306
 Source Schema         : risk

 Target Server Type    : MySQL
 Target Server Version : 100113
 File Encoding         : 65001

 Date: 26/04/2018 16:21:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for analysis
-- ----------------------------
DROP TABLE IF EXISTS `analysis`;
CREATE TABLE `analysis`  (
  `analysis_id` int(2) NOT NULL AUTO_INCREMENT,
  `topic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`analysis_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of analysis
-- ----------------------------
INSERT INTO `analysis` VALUES (1, 'ผู้ป่วย', 'อาการ,ความรุนแรงของโรค,แนวโน้มของโรค.caseซ้ำซ้อน,ขาดความรู้,ญาติ');
INSERT INTO `analysis` VALUES (2, 'บุคลากร', 'ความรู้,ความสามารถ,ทักษะ,อ่อนล้า,แรงจูงใจ,ทัศนคติ,สุขภาพกายและจิต,ไม่ปฏิบัติตามแนวทางที่กำหนด');
INSERT INTO `analysis` VALUES (3, 'งานที่มอบหมาย', 'ฝึกอบรมเพิ่มเติม,อยากเปลี่ยนงาน,มีข้อจำกัด, แนวทางที่รัดกุด ทันสมัย,อัตราส่วนของบุคลากรต่อปริมาณงาน');
INSERT INTO `analysis` VALUES (4, 'ทีมงาน', 'ผู้รับผิดชอบหลัก,หัวหน้างานตรวจนิเทศ,ไม่สมัครใจ, การสื่อสาร พูด/เขียน,โครงสร้างของทีมงาน,ลักษณะของผู้นำ,การสนับสนุนจากฝ่ายบริหาร');
INSERT INTO `analysis` VALUES (5, 'เครื่องมือ', 'ชำรุด,ใช้ไม่เป็น,บำรุงรักษา,ทิ้ง,ไม่ได้รับการตรวจสอบ,Error บ่อย');
INSERT INTO `analysis` VALUES (6, 'วัฒนธรรม', 'องค์กรเอื้อต่อการแก้ปัญหา,แรงกดดัน,การเงิน,ทิศทาง-นโยบาย');
INSERT INTO `analysis` VALUES (7, 'สิ่งแวดล้อม', 'แสง,เสียง,โต๊ะ-เก้าอี้ไม่เหมาะสม,ความปลอดภัย');
INSERT INTO `analysis` VALUES (8, 'การสื่อสาร', 'คู่มือ,การสื่อสารไม่ทั่วถึง,แนวทางการปฏิบัติไม่ชัดเจน,ไม่สื่อสาร,การสื่อสารระหว่างหน่วยงาน');
INSERT INTO `analysis` VALUES (9, 'ปัจจัยที่ควบคุมไม่ได้', 'พายุ,แผ่นดินไหว');

-- ----------------------------
-- Table structure for evaluate
-- ----------------------------
DROP TABLE IF EXISTS `evaluate`;
CREATE TABLE `evaluate`  (
  `eval_id` int(2) NOT NULL AUTO_INCREMENT,
  `length` int(4) NOT NULL COMMENT 'day',
  `words` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`eval_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of evaluate
-- ----------------------------
INSERT INTO `evaluate` VALUES (1, 7, '7 วัน');
INSERT INTO `evaluate` VALUES (2, 15, '15 วัน');
INSERT INTO `evaluate` VALUES (3, 30, '1 เดือน');
INSERT INTO `evaluate` VALUES (4, 90, '3 เดือน');
INSERT INTO `evaluate` VALUES (5, 180, '6 เดือน');
INSERT INTO `evaluate` VALUES (6, 365, '1 ปี');

-- ----------------------------
-- Table structure for results
-- ----------------------------
DROP TABLE IF EXISTS `results`;
CREATE TABLE `results`  (
  `rs_id` int(7) NOT NULL AUTO_INCREMENT,
  `rs_group` int(2) NOT NULL,
  `rs_value` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rs_wards` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`rs_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of results
-- ----------------------------
INSERT INTO `results` VALUES (1, 1, 'R', 'ไม่ผ่าน');
INSERT INTO `results` VALUES (2, 1, 'Y', 'ทบทวนซ้ำ');
INSERT INTO `results` VALUES (3, 1, 'G', 'ผ่าน');

SET FOREIGN_KEY_CHECKS = 1;
