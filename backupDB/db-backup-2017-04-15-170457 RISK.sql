DROP TABLE IF EXISTS category;

CREATE TABLE `category` (
  `category` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO category VALUES("1","ด้านคลินิค");
INSERT INTO category VALUES("2","ด้านระบบยาจ้า");
INSERT INTO category VALUES("3","ด้านจริยธรรมและสิทธิผู้ป่วย");
INSERT INTO category VALUES("4","ด้านการป้องกันการติดเชื้อ");
INSERT INTO category VALUES("5","ด้านสิ่งแวดล้อมและความปลอดภัย");
INSERT INTO category VALUES("6","ด้านทรัพยากร");
INSERT INTO category VALUES("7","ด้านสารสนเทศและการสื่อสาร");
INSERT INTO category VALUES("8","ด้านการบันทึกเวชระเบียน");



DROP TABLE IF EXISTS department;

CREATE TABLE `department` (
  `dep_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `main_dep` int(4) NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

INSERT INTO department VALUES("1","งานคอมพิวเตอร์","1");
INSERT INTO department VALUES("2","งานบริหารทรัพยากรมนุษย์","1");
INSERT INTO department VALUES("3","สำนักคุณภาพ","11");
INSERT INTO department VALUES("4","ฝ่ายเภสัชกรรม","8");
INSERT INTO department VALUES("5","ฝ่ายการแพทย์","14");
INSERT INTO department VALUES("6","ฝ่ายสังคมสงเคราะห์","9");
INSERT INTO department VALUES("7","ฝ่ายจิตวิทยา","4");
INSERT INTO department VALUES("8","ฝ่ายสุขภาพจิตสารเสพติด","10");
INSERT INTO department VALUES("9","ฝ่ายการพยาบาล","3");
INSERT INTO department VALUES("10","งานผู้ป่วยนอก","3");
INSERT INTO department VALUES("11","งานผู้ป่วยใน  (ชาย1)  ","3");
INSERT INTO department VALUES("12","งานผู้ป่วยใน  (หญิง)  ","3");
INSERT INTO department VALUES("13","งานผู้ป่วยใน (ชาย2)","3");
INSERT INTO department VALUES("14","ฝ่ายพัสดุ","7");
INSERT INTO department VALUES("15","ฝ่ายบริหารงานทั่วไป","1");
INSERT INTO department VALUES("16","ฝ่ายพยาธิวิทยา","6");
INSERT INTO department VALUES("17","งานยานพาหนะ","1");
INSERT INTO department VALUES("18","ฝ่ายจิตเวชชุมชน","5");
INSERT INTO department VALUES("34","RM","15");
INSERT INTO department VALUES("39","IC","17");
INSERT INTO department VALUES("22","งานสิทธิบัตร","2");
INSERT INTO department VALUES("26","งานธุรการฝ่ายบริหาร","1");
INSERT INTO department VALUES("27","งานซ่อมบำรุง","1");
INSERT INTO department VALUES("28","งานพนักงานทำความสะอาด","1");
INSERT INTO department VALUES("29","ฝ่ายการเงินและบัญชี","2");
INSERT INTO department VALUES("30","งานแผนงานและประเมินผล","1");
INSERT INTO department VALUES("31","งานโสตทัศนศึกษา","1");
INSERT INTO department VALUES("32","งานห้องสมุด","1");
INSERT INTO department VALUES("33","งานเวชระเบียน","1");
INSERT INTO department VALUES("36","สำนักเลขานุการ","13");
INSERT INTO department VALUES("38","อื่นๆ","16");
INSERT INTO department VALUES("40","IM","18");



DROP TABLE IF EXISTS department_group;

CREATE TABLE `department_group` (
  `main_dep` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(50) NOT NULL,
  PRIMARY KEY (`main_dep`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO department_group VALUES("01","ฝ่ายบริหารงานทั่วไป");
INSERT INTO department_group VALUES("02","ฝ่ายการเงินและบัญชี");
INSERT INTO department_group VALUES("03","ฝ่ายการพยาบาล");
INSERT INTO department_group VALUES("04","ฝ่ายจิตวิทยา");
INSERT INTO department_group VALUES("05","ฝ่ายจิตเวชชุมชน");
INSERT INTO department_group VALUES("06","ฝ่ายพยาธิวิทยา");
INSERT INTO department_group VALUES("07","ฝ่ายพัสดุ");
INSERT INTO department_group VALUES("08","ฝ่ายเภสัชกรรม");
INSERT INTO department_group VALUES("09","ฝ่ายสังคมสงเคราะห์");
INSERT INTO department_group VALUES("10","ฝ่ายสุขภาพจิตสารเสพติด");
INSERT INTO department_group VALUES("11","สำนักคุณภาพ");
INSERT INTO department_group VALUES("12","สำนักนโยบายและแผนงาน");
INSERT INTO department_group VALUES("13","สำนักเลขานุการ");
INSERT INTO department_group VALUES("14","ฝ่ายการแพทย์");
INSERT INTO department_group VALUES("15","คณะกรรมการความเสี่ยง");
INSERT INTO department_group VALUES("16","อื่นๆ");
INSERT INTO department_group VALUES("17","คณะกรรมการ IC");
INSERT INTO department_group VALUES("18","คณะกรรมการ IM");



DROP TABLE IF EXISTS hospital;

CREATE TABLE `hospital` (
  `hospital` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `manager` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`hospital`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO hospital VALUES("1","โรงพยาบาลจิตเวชเลยราชนครินทร์","169","14-08-20151logo.png");



DROP TABLE IF EXISTS level_risk;

CREATE TABLE `level_risk` (
  `level_risk` varchar(5) NOT NULL DEFAULT '',
  `name` varchar(200) DEFAULT NULL,
  `num` varchar(2) DEFAULT NULL,
  `time_take` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`level_risk`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO level_risk VALUES("A","ไม่มีความคลาดเคลื่อน แต่มีโอกาสที่จะก่อให้เกิดความคลาดเคลื่อน","1","");
INSERT INTO level_risk VALUES("B","เกิดความคลาดเคลื่อนขึ้น แต่ไม่เป็นอันตราย/ไม่ส่งผลเสียหายเนื่องจากความคลาดเคลื่อนยังไม่ถึงผู้มารับบริการ เครื่องมือ อุปกรณ์ กระบวนการทำงาน และองค์กร","2","");
INSERT INTO level_risk VALUES("C","เกิดความคลาดเคลื่อน แต่ไม่เป็นอันตราย/ไม่ส่งผลเสียหายถึงแม้ว่าความคลาดเคลื่อนนั้นจะไปถึงผู้รับบริการ เครื่องมือ อุปกรณ์ กระบวนการทำงาน และองค์กรแล้ว และองค์กร","3","");
INSERT INTO level_risk VALUES("D","เกิดความคลาดเคลื่อน แต่ไม่เป็นอันตราย/ไม่ส่งผลเสียหาย แต่ต้องมีการเฝ้าระวังเพื่อให้มั่นใจว่าไม่เป็นอันตราย/ไม่ส่งผลเสียหายต่อผู้รับบริการ เครื่องมือ อุปกรณ์ กระบวนการทำงาน และองค์กร","4","");
INSERT INTO level_risk VALUES("E","เกิดความคลาดเคลื่อน ส่งผลให้เกิดอันตรายชั่วคราวต่อผู้รับบริการ เครื่องมือ อุปกรณ์ กระบวนการทำงานและองค์กร ต้อง ได้รับการรักษา/แก้ไขเพิ่มเติม ","5","");
INSERT INTO level_risk VALUES("F","เกิดความคลาดเคลื่อน เกิดอันตรายชั่วคราวต่อผู้รับบริการ เครื่องมือ อุปกรณ์ กระบวนการทำงาน ต้องนอนโรงพยาบาลนานขึ้น ใช้เวลาแก้ไขนานขึ้น","6","");
INSERT INTO level_risk VALUES("G","เกิดความคลาดเคลื่อน เกิดอันตรายถาวรต่อผู้รับบริการ เครื่องมือ อุปกรณ์ กระบวนการทำงาน และองค์กร","7","");
INSERT INTO level_risk VALUES("H","เกิดความคลาดเคลื่อน เกิดอันตรายเกือบถึงชีวิตต่อผู้รับบริการ ต้องทำการช่วยชีวิต เกิดความเสียหายต่อผู้รับบริการ เครื่องมือ อุปกรณ์ กระบวนการทำงาน และองค์กรต้องมีการแก้ไขอย่างเร่งด่วน","8","");
INSERT INTO level_risk VALUES("I","เกิดความคลาดเคลื่อน เกิดอันตรายจนถึงชีวิตต่อผู้รับบริการ เกิดความเสียหายจนแก้ไขไม่ได้ ต่อผู้รับบริการ เครื่องมือ อุปกรณ์ กระบวนการทำงานและทำให้เสื่อมเสียชื่อเสียง ถูกฟ้องร้องทางสื่อ ทางกฎหมาย","9","");



DROP TABLE IF EXISTS mngrisk;

CREATE TABLE `mngrisk` (
  `mngrisk_id` int(11) NOT NULL AUTO_INCREMENT,
  `takerisk_id` varchar(5) NOT NULL,
  `user_edit` varchar(5) DEFAULT NULL,
  `incident_old` text,
  `incident_differ` text,
  `edit_summary` text,
  `edit_process` text,
  `evaluate` text,
  `mmg_rec_date` date DEFAULT NULL,
  `mng_rec_time` varchar(50) DEFAULT NULL,
  `mng_status` varchar(1) NOT NULL DEFAULT 'N',
  `admin_check` varchar(5) NOT NULL,
  `rca_list_user` text,
  `rca_keyman` varchar(255) DEFAULT NULL,
  `mng_date` date DEFAULT NULL,
  `check_date` date DEFAULT NULL,
  `rca_event` text,
  `rca_flow_system` text,
  `rca_differ_system` text,
  `rca_property_man` text,
  `rca_training_man` text,
  `rca_evaruate_man` text,
  `rca_rate_man` text,
  `rca_rate_tool` text,
  `rca_chk_tool` text,
  `rca_defective_tool` text,
  `rca_environment` text,
  `rca_techno` text,
  `rca_communication` text,
  `rca_office_yes` text,
  `rca_head_yes` text,
  `rca_external_factor` text,
  `prevent1_improve` text,
  `prevent1_work_date` text,
  `prevent1_sum_date` text,
  `prevent1_man` text,
  `prevent2_improve` text NOT NULL,
  `prevent2_work_date` date NOT NULL,
  `prevent2_sum_date` date NOT NULL,
  `prevent2_man` text NOT NULL,
  `prevent3_improve` text NOT NULL,
  `prevent3_work_date` date NOT NULL,
  `prevent3_sum_date` date NOT NULL,
  `prevent3_man` text NOT NULL,
  `prevent4_improve` text NOT NULL,
  `prevent4_work_date` date NOT NULL,
  `prevent4_sum_date` date NOT NULL,
  `prevent4_man` text NOT NULL,
  `prevent5_improve` text NOT NULL,
  `prevent5_work_date` date NOT NULL,
  `prevent5_sum_date` date NOT NULL,
  `prevent5_man` text NOT NULL,
  `prevent6_improve` text NOT NULL,
  `prevent6_work_date` date NOT NULL,
  `prevent6_sum_date` date NOT NULL,
  `prevent6_man` text NOT NULL,
  `prevent7_improve` text NOT NULL,
  `prevent7_work_date` date NOT NULL,
  `prevent7_sum_date` date NOT NULL,
  `prevent7_man` text NOT NULL,
  `prevent8_improve` text NOT NULL,
  `prevent8_work_date` date NOT NULL,
  `prevent8_sum_date` date NOT NULL,
  `prevent8_man` text NOT NULL,
  `prevent9_improve` text NOT NULL,
  `prevent9_work_date` date NOT NULL,
  `prevent9_sum_date` date NOT NULL,
  `prevent9_man` text NOT NULL,
  `prevent10_improve` text NOT NULL,
  `prevent10_work_date` date NOT NULL,
  `prevent10_sum_date` date NOT NULL,
  `prevent10_man` text NOT NULL,
  `mng_file1` varchar(255) DEFAULT NULL,
  `mng_file2` varchar(255) DEFAULT NULL,
  `mng_file3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mngrisk_id`),
  UNIQUE KEY `takerisk_id` (`takerisk_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS month;

CREATE TABLE `month` (
  `month_id` int(2) NOT NULL AUTO_INCREMENT,
  `month_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month_short` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`month_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO month VALUES("1","มกราคม","ม.ค.","1");
INSERT INTO month VALUES("2","กุมภาพันธ์","ก.พ.","2");
INSERT INTO month VALUES("3","มีนาคม","มี.ค.","3");
INSERT INTO month VALUES("4","เมษายน","เม.ย.","4");
INSERT INTO month VALUES("5","พฤษภาคม","พ.ค.","5");
INSERT INTO month VALUES("6","มิถุนายน","มิ.ย.","6");
INSERT INTO month VALUES("7","กรกฎาคม","ก.ค.","7");
INSERT INTO month VALUES("8","สิงหาคม","ส.ค.","8");
INSERT INTO month VALUES("9","กันยายน","ก.ย.","9");
INSERT INTO month VALUES("10","ตุลาคม","ต.ค.","-2");
INSERT INTO month VALUES("11","พฤศจิกายน","พ.ย.","-1");
INSERT INTO month VALUES("12","ธันวาคม","ธ.ค.","0");



DROP TABLE IF EXISTS place;

CREATE TABLE `place` (
  `place` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`place`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

INSERT INTO place VALUES("73","บริเวณบ้านพัก");
INSERT INTO place VALUES("65","กระบวนการผู้ป่วยนอก OPD");
INSERT INTO place VALUES("66","กระบวนการผู้ป่วยใน IPD");
INSERT INTO place VALUES("67","กระบวนการ back office");
INSERT INTO place VALUES("68","ตึกอำนวยการชั้น1");
INSERT INTO place VALUES("69","ตึกอำนวยการชั้น2");
INSERT INTO place VALUES("70","บริเวณภายในโรงพยาบาล /บริเวณหน้าโรงพยาบาล");
INSERT INTO place VALUES("71","บริเวณภายนอกโรงพยาบาล");
INSERT INTO place VALUES("72","อื่นๆ");



DROP TABLE IF EXISTS rca;

CREATE TABLE `rca` (
  `rca_id` int(11) NOT NULL AUTO_INCREMENT,
  `rca_list_user` varchar(255) DEFAULT NULL,
  `rca_keyman` varchar(200) DEFAULT NULL,
  `rca_date` date DEFAULT NULL,
  `takerisk_id` varchar(5) DEFAULT NULL,
  `rca_event` text,
  `rca_frow_system` text,
  `rca_differ_system` text,
  `rca_property_man` text,
  `rca_training_man` text,
  `rca_evaruate_man` text,
  `rca_rate_man` text,
  `rca_rate_tool` text,
  `rca_chk_tool` text,
  `rca_defective_tool` text,
  `rca_environment` text,
  `rca_techno` text,
  `rca_communication` text,
  `rca_office_yes` text,
  `rca_head_yes` text,
  `rca_external_factor` text,
  `prevent1_improve` text,
  `prevent1_work_date` date DEFAULT NULL,
  `prevent1_sum_date` date DEFAULT NULL,
  `prevent1_man` varchar(200) DEFAULT NULL,
  `prevent2_improve` text,
  `prevent2_work_date` date DEFAULT NULL,
  `prevent2_sum_date` date DEFAULT NULL,
  `prevent2_man` varchar(200) DEFAULT NULL,
  `prevent3_improve` text,
  `prevent3_work_date` date DEFAULT NULL,
  `prevent3_sum_date` date DEFAULT NULL,
  `prevent3_man` varchar(200) DEFAULT NULL,
  `prevent4_improve` text,
  `prevent4_work_date` date DEFAULT NULL,
  `prevent4_sum_date` date DEFAULT NULL,
  `prevent4_man` varchar(200) DEFAULT NULL,
  `prevent5_improve` text,
  `prevent5_work_date` date DEFAULT NULL,
  `prevent5_sum_date` date DEFAULT NULL,
  `prevent5_man` varchar(200) DEFAULT NULL,
  `prevent6_improve` text,
  `prevent6_work_date` date DEFAULT NULL,
  `prevent6_sum_date` date DEFAULT NULL,
  `prevent6_man` varchar(200) DEFAULT NULL,
  `prevent7_improve` text,
  `prevent7_work_date` date DEFAULT NULL,
  `prevent7_sum_date` date DEFAULT NULL,
  `prevent7_man` varchar(200) DEFAULT NULL,
  `prevent8_improve` text,
  `prevent8_work_date` date DEFAULT NULL,
  `prevent8_sum_date` date DEFAULT NULL,
  `prevent8_man` varchar(200) DEFAULT NULL,
  `prevent9_improve` text,
  `prevent9_work_date` date DEFAULT NULL,
  `prevent9_sum_date` date DEFAULT NULL,
  `prevent9_man` varchar(200) DEFAULT NULL,
  `prevent10_improve` text,
  `prevent10_work_date` date DEFAULT NULL,
  `prevent10_sum_date` date DEFAULT NULL,
  `prevent10_man` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`rca_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS subcategory;

CREATE TABLE `subcategory` (
  `subcategory` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `category` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`subcategory`)
) ENGINE=MyISAM AUTO_INCREMENT=423 DEFAULT CHARSET=utf8;

INSERT INTO subcategory VALUES("113","กรณีเร่งด่วน - ไม่ได้รายงานแพทย์","1");
INSERT INTO subcategory VALUES("112","รับคำสั่งการรักษา ผิดพลาด","1");
INSERT INTO subcategory VALUES("111","เลื่อนทำหัตถการ จากเครื่องมือไม่พร้อม","1");
INSERT INTO subcategory VALUES("110","เลื่อนทำหัตถการ จากการเตรียมหัตถการไม่พร้อม","1");
INSERT INTO subcategory VALUES("109","เลื่อนทำหัตถการ จากผู้ป่วย","1");
INSERT INTO subcategory VALUES("108","เลื่อนทำหัตถการ จากแพทย์","1");
INSERT INTO subcategory VALUES("107","หยุดการรักษาด้วยไฟฟ้าECT (ยังไม่ครบ) ","1");
INSERT INTO subcategory VALUES("106","เกิดภาวะแทรกซ้อนจากการรักษาด้วยไฟฟ้า (ECT)","1");
INSERT INTO subcategory VALUES("105","เก็บ lab (specimen) ผิดวิธี","1");
INSERT INTO subcategory VALUES("103","ส่ง lab (specimen) ผิดคน","1");
INSERT INTO subcategory VALUES("104","ส่ง lab (specimen) สลับหลอด","1");
INSERT INTO subcategory VALUES("101","ส่ง lab ตรวจล้าช้า (specimen) ","1");
INSERT INTO subcategory VALUES("100","lab ส่งตรวจคลาดเคลื่อน/ไม่ถูกต้อง","1");
INSERT INTO subcategory VALUES("99","ไม่ได้ส่งตรวจทางห้อง lab","1");
INSERT INTO subcategory VALUES("98","ห้องlab - ผลการตรวจหาย","1");
INSERT INTO subcategory VALUES("97","ห้องlab - specimen ไม่เหมาะสมกับการตรวจ","1");
INSERT INTO subcategory VALUES("96","ห้องlab - ผลการตรวจคลาดเคลื่อน","1");
INSERT INTO subcategory VALUES("95","ห้องlab - ไม่รายงานค่าวิกฤต","1");
INSERT INTO subcategory VALUES("94","ห้องlab - รายงานผลการตรวจไม่ครบ","1");
INSERT INTO subcategory VALUES("93","ห้องlab - รายงานผลการตรวจล้าช้า","1");
INSERT INTO subcategory VALUES("92","ผู้ป่วยสำลักอาหาร","1");
INSERT INTO subcategory VALUES("91","อาหารเฉพาะโรคไม่ได้มาตรฐาน","1");
INSERT INTO subcategory VALUES("90","ผู้ป่วยไม่ได้รับประทานอาหารเฉพาะโรค","1");
INSERT INTO subcategory VALUES("89","การเฝ้าระวัง/ประเมินผู้ป่วย มีไม่เพียงพอ","1");
INSERT INTO subcategory VALUES("88","ล้าช้าในการรักษา (ทำให้ผู้ป่วยทรุดลง)","1");
INSERT INTO subcategory VALUES("87","ผู้ป่วยพยายามหลบหนี","1");
INSERT INTO subcategory VALUES("86","ผู้่ป่วยหลบหนีสำเร็จ","1");
INSERT INTO subcategory VALUES("85","ผู้ป่วยหลบหนีไม่สำเร็จ","1");
INSERT INTO subcategory VALUES("84","ผู้ป่วยเสียชีวิตหลังการส่งต่อ 24 ชม.","1");
INSERT INTO subcategory VALUES("83","ผู้ป่วยเสียชีวิตในโรงพยาบาล","1");
INSERT INTO subcategory VALUES("82","การเคลื่อนย้ายผู้ป่วย ไม่ถูกวิธี/ไม่ได้มาตรฐาน","1");
INSERT INTO subcategory VALUES("81","ผู้ป่วยมีภาวะแทรกซ้อนจากการจำกัดพฤติกรรม","1");
INSERT INTO subcategory VALUES("80","ผู้ป่วยมีภาวะแทรกซ้อนจาก IM/IV","1");
INSERT INTO subcategory VALUES("78","ผู้ป่วยทำร้ายเจ้าหน้าที่","1");
INSERT INTO subcategory VALUES("76","ผู้ป่วยทำร้ายกัน","1");
INSERT INTO subcategory VALUES("77","ผู้ป่วยทำลายสิ่งของ","1");
INSERT INTO subcategory VALUES("75","ผู้ป่วยทำร้ายตนเอง","1");
INSERT INTO subcategory VALUES("74","ผู้ป่วยพยายามฆ่าตัวตาย","1");
INSERT INTO subcategory VALUES("73","ผู้ป่วยฆ่าตัวตายสำเร็จ","1");
INSERT INTO subcategory VALUES("72","ผู้ป่วยตกเตียง/เก้าอี้/โต๊ะ","1");
INSERT INTO subcategory VALUES("70","ผู้ป่วยล้ม","1");
INSERT INTO subcategory VALUES("79","เจ้าหน้าที่ทำร้ายผู้ป่วย","1");
INSERT INTO subcategory VALUES("114","กรณีเร่งด่วน - แพทย์ไม่ตอบรายงาน","1");
INSERT INTO subcategory VALUES("115","กรณีเร่งด่วน - ติดต่อแพทย์เวรไม่ได้","1");
INSERT INTO subcategory VALUES("116","กรณีเร่งด่วน - แพทย์เวรมาช้า เกิน 30 นาที","1");
INSERT INTO subcategory VALUES("117","กรณีเร่งด่วน - ติดต่อรถ refer ไม่ได้","1");
INSERT INTO subcategory VALUES("118","กรณีเร่งด่วน - รถ refer มาช้าเกิน 15 นาที","1");
INSERT INTO subcategory VALUES("119","รับ admits ซ้ำด้วยโรคเดิมภายใน 28 วัน","1");
INSERT INTO subcategory VALUES("120","รับ admits ซ้ำด้วยโรคเดิมภายใน 7 วัน","1");
INSERT INTO subcategory VALUES("121","รับ admits ผู้ป่วย ER revisit ภายใน 24 ชม.","1");
INSERT INTO subcategory VALUES("122","ย้ายผู้ป่วยไปหอ ICU โดยไม่ได้วางแผนล่วงหน้า","1");
INSERT INTO subcategory VALUES("123","refer ผู้ป่วยไปรักษาทางกาย ภายใน 24 ชม.","1");
INSERT INTO subcategory VALUES("124","ผู้ป่วยมีไฟแช๊ค,ไม้ขีดไฟ,บุหรี่","1");
INSERT INTO subcategory VALUES("126","ญาติให้ บุหรี่/ไฟแช๊ค/เงิน แก่ผู้ป่วย","1");
INSERT INTO subcategory VALUES("127","ญาติไม่ปฏิบัติตามระเบียบของ รพ.","7");
INSERT INTO subcategory VALUES("128","ผู้ป่วย/ญาติ พกพาอาวุธ","1");
INSERT INTO subcategory VALUES("129","ผู้ป่วย/ญาติ นำสุนัขหรือสัตว์อื่นเข้ามาใน รพ.","5");
INSERT INTO subcategory VALUES("130","ผู้ป่วยฉีดยาไม่ตรงตามกำหนด","1");
INSERT INTO subcategory VALUES("131","ผู้ป่วย ซ่อนของ (แปรง,แป้ง,อุปกรณ์ทางการแพทย์)","1");
INSERT INTO subcategory VALUES("132","ผู้ป่วยใช้ชื่อผู้อื่นเข้ารับการรักษา","1");
INSERT INTO subcategory VALUES("133","ไม่ตอบ refer","1");
INSERT INTO subcategory VALUES("134","ตอบ refer แล้วไม่ส่งกลับ","1");
INSERT INTO subcategory VALUES("135","ไม่ลงรับ refer","1");
INSERT INTO subcategory VALUES("136","ตอบ refer ผิดคน","1");
INSERT INTO subcategory VALUES("137","ไม่ได้คัดกรองโรคทางกาย/โรคแพร่เชื้อ","1");
INSERT INTO subcategory VALUES("138","ตรวจร่างกายก่อน admits ไม่ครบถ้วน","1");
INSERT INTO subcategory VALUES("139","ไม่ได้ปฏิบัติตามแนวทาง HAD","1");
INSERT INTO subcategory VALUES("140","ไม่ได้ล๊อกประตู - ห้องติดเชื้อ","1");
INSERT INTO subcategory VALUES("141","ไม่ได้ล๊อกประตู - ห้องจำกัดพฤติกรรม","1");
INSERT INTO subcategory VALUES("142","ไม่ได้ล๊อกประตู - ห้องผู้ป่วย","1");
INSERT INTO subcategory VALUES("143","แพทย์ไม่ได้เซ็นกำกับ รคส.","1");
INSERT INTO subcategory VALUES("144","ปรับยา ไม่มีใบ order ปรับยามาให้","1");
INSERT INTO subcategory VALUES("145","อุปกรณ์ทางการแพทย์ ไม่ได้ทำความสะอาด เก็บเข้าที่่","1");
INSERT INTO subcategory VALUES("146","แพทย์สั่งใช้ยา ในผู้ป่วยที่มีประวัติแพ้ยา","2");
INSERT INTO subcategory VALUES("147","แพทย์สั่งใช้ยา บริหารยาไม่ได้","2");
INSERT INTO subcategory VALUES("148","แพทย์สั่งใช้ยา ที่มีวิถีทางไม่เหมาะสม","2");
INSERT INTO subcategory VALUES("149","แพทย์สั่งใช้ยา - Fatal DI ที่เป็นข้อห้าม","2");
INSERT INTO subcategory VALUES("150","แพทย์สั่งใช้ยา - เกินขนาด (overdose)","2");
INSERT INTO subcategory VALUES("151","แพทย์สั่งใช้ยา - ตัวย่อที่ไม่ได้เป็นสากล","2");
INSERT INTO subcategory VALUES("152","แพทย์สั่งใช้ยา - ผิดความแรง","2");
INSERT INTO subcategory VALUES("153","แพทย์สั่งใช้ยา - ผิดชนิด","2");
INSERT INTO subcategory VALUES("154","แพทย์สั่งใช้ยา - ผิดวิธีใช้","2");
INSERT INTO subcategory VALUES("155","แพทย์สั่งใช้ยา - ผิดคน","2");
INSERT INTO subcategory VALUES("156","แพทย์สั่งใช้ยา - ไม่ครบรายการยา","2");
INSERT INTO subcategory VALUES("157","แพทย์สั่งใช้ยา - ผิดจำนวน","2");
INSERT INTO subcategory VALUES("158","แพทย์สั่งใช้ยา - สั่งยาซ้ำ","2");
INSERT INTO subcategory VALUES("159","แพทย์สั่งใช้ยา - คำสั่งใช้ยาไม่ชัดเจน","2");
INSERT INTO subcategory VALUES("160","แพทย์สั่งใช้ยา - ไม่ครบถ้วน","2");
INSERT INTO subcategory VALUES("161","แพทย์สั่งใช้ยา - ด้วยลายมืออ่านไม่ออก","2");
INSERT INTO subcategory VALUES("162","พิมพ์คำสั่งการใช้ยา - ผิดความแรง","2");
INSERT INTO subcategory VALUES("163","พิมพ์คำสั่งการใช้ยา - ผิดจำนวน","2");
INSERT INTO subcategory VALUES("164","พิมพ์คำสั่งการใช้ยา - ผิดชนิด","2");
INSERT INTO subcategory VALUES("165","พิมพ์คำสั่งการใช้ยา - ไม่ครบรายการยา","2");
INSERT INTO subcategory VALUES("166","พิมพ์คำสั่งการใช้ยา - ผิดวิธีใช้","2");
INSERT INTO subcategory VALUES("167","พิมพ์คำสั่งการใช้ยา - ไม่ได้ลงข้อมูลยา","2");
INSERT INTO subcategory VALUES("168","พิมพ์คำสั่งการใช้ยา - ผิดคน","2");
INSERT INTO subcategory VALUES("169","พิมพ์คำสั่งการใช้ยา - บันทึกข้อมูลยาซ้ำซ้อน","2");
INSERT INTO subcategory VALUES("170","พิมพ์คำสั่งการใช้ยา - นอกเหนือคำสั่งแพทย์","2");
INSERT INTO subcategory VALUES("171","จัดยาผิด - ชนิด","2");
INSERT INTO subcategory VALUES("172","จัดยาผิด - ความแรง","2");
INSERT INTO subcategory VALUES("173","จัดยาผิด - จำนวน","2");
INSERT INTO subcategory VALUES("174","จัดยาผิด - วิธีใช้","2");
INSERT INTO subcategory VALUES("175","จัดยาผิด - ไม่ครบรายการยา","2");
INSERT INTO subcategory VALUES("176","จัดยาผิด - สลับซอง","2");
INSERT INTO subcategory VALUES("177","จัดยาผิด - ยาปนกัน","2");
INSERT INTO subcategory VALUES("178","เช๊คยาผิดก่อนจ่าย - ผิดชนิด","2");
INSERT INTO subcategory VALUES("179","เช็คยาผิดก่อนจ่าย - ผิดความแรง","2");
INSERT INTO subcategory VALUES("180","จัดยาผิด - เกินคำสั่งแพทย์","2");
INSERT INTO subcategory VALUES("181","เช็คยาผิดก่อนจ่าย - ผิดจำนวน","2");
INSERT INTO subcategory VALUES("182","เช็คยาผิดก่อนจ่าย - ผิดวิธีใช้","2");
INSERT INTO subcategory VALUES("183","เช็คยาผิดก่อนจ่าย - ยาสลับซอง","2");
INSERT INTO subcategory VALUES("184","เช็คยาผิดก่อนจ่าย - ยาปนกัน","2");
INSERT INTO subcategory VALUES("185","เช็คยาผิดก่อนจ่าย - ยาผิดคน","2");
INSERT INTO subcategory VALUES("186","จ่ายยาผิด - ไม่ครบรายการยา","2");
INSERT INTO subcategory VALUES("187","จ่ายยาผิด - ผิดชนิด","2");
INSERT INTO subcategory VALUES("188","จ่ายยาผิด - ผิดความแรง","2");
INSERT INTO subcategory VALUES("189","จ่ายยาผิด - ผิดจำนวน","2");
INSERT INTO subcategory VALUES("190","จ่ายยาผิด - ผิดคน","2");
INSERT INTO subcategory VALUES("191","จ่ายยาผิด - ชื่อผิด","2");
INSERT INTO subcategory VALUES("192","จ่ายยาผิด - ผิดวิธีใช้","2");
INSERT INTO subcategory VALUES("193","จ่ายยาผิด - ในผู้ป่วยที่มีประวัติแพ้ยา","2");
INSERT INTO subcategory VALUES("194","จ่ายยาผิด - ยาเสื่อมสภาพ/หมดอายุ","2");
INSERT INTO subcategory VALUES("195","จ่ายยาผิด - ผิดรูปแบบ","2");
INSERT INTO subcategory VALUES("196","จ่ายยาผิด - Fatal DI ที่เป็นข้อห้ามใช้","2");
INSERT INTO subcategory VALUES("197","จ่ายยาผิด - นอกเหนือคำสั่งแพทย์","2");
INSERT INTO subcategory VALUES("198","เตรียมยา - ผิดวิธีใช้","2");
INSERT INTO subcategory VALUES("199","เตรียมยา - ผิดความแรง","2");
INSERT INTO subcategory VALUES("200","เตรียมยา - ผิดชนิด","2");
INSERT INTO subcategory VALUES("201","เตรียมยา - ผิดคน","2");
INSERT INTO subcategory VALUES("202","เตรียมยา - ในผู้ป่วยที่มีประวัติแพ้ยา","2");
INSERT INTO subcategory VALUES("203","เตรียมยา - ผิดรูปแบบของยา","2");
INSERT INTO subcategory VALUES("204","เตรียมยา - ผิดจำนวน","2");
INSERT INTO subcategory VALUES("205","เตรียมยา - ผิดเทคนิค","2");
INSERT INTO subcategory VALUES("206","เตรียมยา  - ซ้ำซ้อน","2");
INSERT INTO subcategory VALUES("207","เตรียมยา - ไม่ได้ตามคำสั่งแพทย์","2");
INSERT INTO subcategory VALUES("208","เตรียมยา - นอกเหนือคำสั่งแพทย์","2");
INSERT INTO subcategory VALUES("209","บริหารยา - ผิดเวลา","2");
INSERT INTO subcategory VALUES("210","บริหารยา - ผิดวิถีทาง","2");
INSERT INTO subcategory VALUES("211","บริหารยา - ผิดความแรง","2");
INSERT INTO subcategory VALUES("212","บริหารยา - ผิดชนิด","2");
INSERT INTO subcategory VALUES("213","บริหารยา - ผิดคน","2");
INSERT INTO subcategory VALUES("214","บริหารยา - ให้ยาในผู้ป่วยแพ้ยา","2");
INSERT INTO subcategory VALUES("215","บริหารยา - ผิดรูปแบบของยา","2");
INSERT INTO subcategory VALUES("216","บริหารยา - ให้ยาผิดเทคนิค","2");
INSERT INTO subcategory VALUES("217","บริหารยา - ให้ยาซ้ำซ้อน","2");
INSERT INTO subcategory VALUES("218","บริหารยา - ไม่ได้ยาตามแพทย์สั่ง","2");
INSERT INTO subcategory VALUES("219","บริหารยา - นอกเหนือคำสั่งแพทย์","2");
INSERT INTO subcategory VALUES("220","ไม่จัดทำการบันทึกคำยินยอม ก่อนการรักษา/ทำหัตถการ","3");
INSERT INTO subcategory VALUES("222","เจ้าหน้าที่ - เปลี่ยนเวรไม่ปฏิบัติตามแนวทาง","3");
INSERT INTO subcategory VALUES("223","เจ้าหน้าที่ - แต่งกายไม่ถูกต้องตามระเบียบของ รพ.","3");
INSERT INTO subcategory VALUES("224","เจ้าหน้าที่ - ลงชื่อปฏิบัติงาน แต่ไม่พบเจ้าหน้าที่ทำงาน","3");
INSERT INTO subcategory VALUES("225","เจ้าหน้าที่ - มาปฏิบัติงานล้าช้ากว่า 30 นาที่ (ไม่แจ้งล่วงหน้า)","3");
INSERT INTO subcategory VALUES("226","เจ้าหน้าที่ - ไม่พร้อมปฏิบัติงาน","3");
INSERT INTO subcategory VALUES("228","เจ้าหน้าที่ - มีกลิ่นสุรา","3");
INSERT INTO subcategory VALUES("410","บันทึกข้อมูลที่ไม่เป็นมาตรฐาน","8");
INSERT INTO subcategory VALUES("230","เจ้าหน้าที่ - ใช้วาจาไม่เหมาะสม","3");
INSERT INTO subcategory VALUES("231","เจ้าหน้าที่ - ปฏิบัติงานเกินหน้าที่","3");
INSERT INTO subcategory VALUES("232","ผู้ป่วยและญาติไม่พึงพอใจการบริการ","3");
INSERT INTO subcategory VALUES("233","ผู้ป่วย/ญาติ บอกว่าได้รับยาไม่ครบ","3");
INSERT INTO subcategory VALUES("234","ผู้ป่วย/ญาติ บอกว่าได้รับยาผิด","3");
INSERT INTO subcategory VALUES("235","ผู้ป่วย/ญาติ บอกว่ารอนาน เกิน 30 นาที","3");
INSERT INTO subcategory VALUES("236","อาคาร สิ่งก่อสร้าง (ชำรุด/เสียหาย/ไม่เหมาะสม) อาจก่อให้เกิดอันตราย","5");
INSERT INTO subcategory VALUES("237","ผู้ป่วยติดเชื้อในโรงพยาบาล","4");
INSERT INTO subcategory VALUES("238","เจ้าหน้าที่ ติดเชื้อจากการปฏิบัติงาน","4");
INSERT INTO subcategory VALUES("239","มีการแพร่กระจายเชื้อใน รพ.","4");
INSERT INTO subcategory VALUES("240","เจ้าหน้าที่ ไม่ปฏิบัติตามหลัก UP","4");
INSERT INTO subcategory VALUES("241","เจ้าหน้าที่ ถูกของมีคม/เข็ม","4");
INSERT INTO subcategory VALUES("242","เจ้าหน้าที่ สัมผัส สารคัดหลัง/เชื้อโรค/สิ่งสกปก","4");
INSERT INTO subcategory VALUES("243","เจ้าหน้าที่ป่วย ไม่ได้ป้องกันโรคแพร่เชื้อ","4");
INSERT INTO subcategory VALUES("244","ผู้ป่วย/ญาติ ป่วยไม่ได้ป้องกันการแพร่เชื้อ","4");
INSERT INTO subcategory VALUES("396","ฟ้าผ่า เสียหาย","5");
INSERT INTO subcategory VALUES("247","ดูแลรักษา อุปกรณ์ทางการแพทย์หลังใช้งานไม่ถูกต้อง","4");
INSERT INTO subcategory VALUES("248","ไม่ได้คัดแยกผ้าเปื้อน","4");
INSERT INTO subcategory VALUES("249","พบสัตว์ที่เป็นพาหนะโรค (ยุง,ลูกน้ำ,หนู)","5");
INSERT INTO subcategory VALUES("250","วัสดุ อุปกรณ์ ชำรุด/เสื่อมสภาพ อาจก่อให้เกิดอันตรายได้","5");
INSERT INTO subcategory VALUES("251","สถานที่เป็นอุปสรรคต่อผู้ป่วย และการปฏิบัติงาน","5");
INSERT INTO subcategory VALUES("252","เสียงดัง เป็นอุปสรรคต่อการทำงาน","5");
INSERT INTO subcategory VALUES("253","มีลมพายุ (ทำให้เกิดความเสี่ยหาย)","5");
INSERT INTO subcategory VALUES("254","เกิดอัคคีภัย","5");
INSERT INTO subcategory VALUES("255","เจ้าหน้าที่ ได้รับบาดเจ็บจากการทำงาน","5");
INSERT INTO subcategory VALUES("256","ไฟฟ้ารั่ว/ช๊อต","5");
INSERT INTO subcategory VALUES("257","มีโอกาสเกิด ไฟฟ้ารั่ว,ช๊อต","5");
INSERT INTO subcategory VALUES("258","อุปกรณ์ไฟฟ้าชำรุด,เสื่อมสภาพ อาจก่อให้เกิดอันตราย","5");
INSERT INTO subcategory VALUES("259","พื้นลื่น มีน้ำขังบนพื้น","5");
INSERT INTO subcategory VALUES("260","พื้นถนน เป็นหลุม บ่อ (อาจก่อให้เกิดอันตรายได้)","5");
INSERT INTO subcategory VALUES("261","โจรกรรม / ลักขโมย","5");
INSERT INTO subcategory VALUES("262","ทรัพย์สินถูกทำลาย","5");
INSERT INTO subcategory VALUES("263","พบสัตว์อันตราย (งู,ต่อ,ผึ่ง)","5");
INSERT INTO subcategory VALUES("390","ห้องน้ำชำรุด","6");
INSERT INTO subcategory VALUES("266","แสงสว่างไม่เพียงพอ","5");
INSERT INTO subcategory VALUES("267","ไม่ได้ปิด ห้องทำงาน","5");
INSERT INTO subcategory VALUES("268","ไม่ได้ปิด คอมพิวเตอร์/ไฟฟ้า/พัดลม","5");
INSERT INTO subcategory VALUES("269","เข้ามาขายของโดยไม่ได้รับอนุญาต","5");
INSERT INTO subcategory VALUES("270","เจ้าหน้าที่ สังสรรค์เสียงดัง","5");
INSERT INTO subcategory VALUES("271","แผ่นดินไหว","5");
INSERT INTO subcategory VALUES("272","ขาดอุปกรณ์ป้องกันอันตรายจากการทำงาน","5");
INSERT INTO subcategory VALUES("273","ทรัพย์สินของเจ้าหน้าที่สูญหาย","5");
INSERT INTO subcategory VALUES("274","เจ้าหน้าที่ จอดรถในที่ห้ามจอด","5");
INSERT INTO subcategory VALUES("275","ผู้ป่วย/ญาติ จอดรถในที่ห้ามจอด","5");
INSERT INTO subcategory VALUES("276","เกิดอุบัติเหตุทางรถยนต์ ใน รพ.","5");
INSERT INTO subcategory VALUES("277","เกิดอุบัติเหตุทางรถยนต์ นอก รพ.","5");
INSERT INTO subcategory VALUES("278","เสี่ยงต่อการเกิดอุบัติเหตุทางรถยนต์","5");
INSERT INTO subcategory VALUES("279","หลังคารั่ว","5");
INSERT INTO subcategory VALUES("280","มีน้ำซึม / หยด / รั่ว","5");
INSERT INTO subcategory VALUES("281","ท่อน้ำอุดตัน /แตก /ชำรุด","5");
INSERT INTO subcategory VALUES("282","น้ำประปา มีสีคล้ำ,กลิ่นเหม็น","5");
INSERT INTO subcategory VALUES("283","พบวัสดุ อุปกรณ์ที่เป็นอันตราย (ลวด,ตะปู,เหล็ก)","5");
INSERT INTO subcategory VALUES("284","เครื่องมือ วัสดุ อุปกรณ์ - ไม่เพียงพอ","6");
INSERT INTO subcategory VALUES("285","เครื่องมือ วัสดุ อุปกรณ์ - ไม่พร้อมใช้งาน","6");
INSERT INTO subcategory VALUES("286","เครื่องมือ วัสดุ อุปกรณ์ - ทำงานผิดปกติ","6");
INSERT INTO subcategory VALUES("287","เครื่องมือ วัสดุ อุปกรณ์ - ชำรุด","6");
INSERT INTO subcategory VALUES("288","เครื่องมือ วัสดุ อุปกรณ์ - ถูกทิ้ง ","6");
INSERT INTO subcategory VALUES("289","เครื่องมือ วัสดุ อุปกรณ์ - สูญหาย","6");
INSERT INTO subcategory VALUES("290","เครื่องมือ อุปกรณ์ ปราศจากเชื้อ ไม่พร้อมใช้งาน","6");
INSERT INTO subcategory VALUES("291","เครื่องมือ อุปกรณ์ ไม่ได้สอบเทียบตามเกณฑ์","6");
INSERT INTO subcategory VALUES("292","เครื่องมือ อุปกรณ์ ไม่ได้รับการบำรุงรักษาตามแผน","6");
INSERT INTO subcategory VALUES("293","เครื่องมือ วัสดุ อุปกรณ์ - เสี่ยงต่อการสูญหาย","6");
INSERT INTO subcategory VALUES("294","ใช้เครื่องมือ อุปกรณ์ แล้วไม่เก็บเข้าที่","6");
INSERT INTO subcategory VALUES("295","ใช้เครื่องมือ อุปกรณ์ ไม่ถูกวิธี/ไม่ระวัง ทำให้เครื่องมือเสียหาย","6");
INSERT INTO subcategory VALUES("296","คอมพิวเตอร์ ชำรุด","6");
INSERT INTO subcategory VALUES("297","พรินเตอร์ ชำรุด","6");
INSERT INTO subcategory VALUES("298","เครื่อง sever ล้ม","6");
INSERT INTO subcategory VALUES("299","ฐานข้อมูลคอมพิวเตอร์สูญหาย","6");
INSERT INTO subcategory VALUES("300","แจ้งซ่อมแล้วช่างไม่ได้มาตรวจสอบ","6");
INSERT INTO subcategory VALUES("301","ซ่อมแซมล้าช้า (อาจทำให้เสียหายได้)","6");
INSERT INTO subcategory VALUES("302","เบิกวัสดุนอกรอบ","6");
INSERT INTO subcategory VALUES("303","ไม่ขออนุญาตก่อนการสั่งซื้อสินค้า","6");
INSERT INTO subcategory VALUES("304","เบิกของไม่ตรงเวลา","6");
INSERT INTO subcategory VALUES("305","ค่าน้ำประปา / ไฟฟ้า สูงผิดปกติ","6");
INSERT INTO subcategory VALUES("306","เวชภัณฑ์ / ยา (ไม่เพียงพอ/หมด) ","6");
INSERT INTO subcategory VALUES("307","คิดราคายาผิด","6");
INSERT INTO subcategory VALUES("308","รถยนต์ไม่พร้อมใช้งาน","6");
INSERT INTO subcategory VALUES("309","ต้นไม้ สวนหย่อม ไม่ได้รับการดูแลต่อเนื่อง","6");
INSERT INTO subcategory VALUES("310","ห้องน้ำสกปรก/มีกลิ่นเหม็น","6");
INSERT INTO subcategory VALUES("311","โทรศัพท์ ชำรุด/ใช้การไม่ได้","6");
INSERT INTO subcategory VALUES("312","เอกสาร/หลักฐาน ของฝ่ายงานสูญหาย","6");
INSERT INTO subcategory VALUES("313","เอกสาร/หลักฐาน ของโรงพยาบาล สูญหาย","6");
INSERT INTO subcategory VALUES("314","เอกสาร/หลักฐาน ของเจ้าหน้าที่ สูญหาย","6");
INSERT INTO subcategory VALUES("315","internet ล้มบ่อยครั้ง","6");
INSERT INTO subcategory VALUES("316","ไฟฟ้าดับ","6");
INSERT INTO subcategory VALUES("317","ไฟฟ้า ตกหลายครั้ง","6");
INSERT INTO subcategory VALUES("318","คำสั่งการให้ข้อมูล (ไม่ชัดเจน,คลาดเคลื่อน)","7");
INSERT INTO subcategory VALUES("319","แนวทางการปฏิบัติงานไม่ชัดเจน","7");
INSERT INTO subcategory VALUES("320","ใช้ถ้อยคำ,ท่าทาง ไม่เหมาะสมในการสื่อสาร","7");
INSERT INTO subcategory VALUES("321","การประสานงานล้าช้า ทำให้ ล่าช้า,คลาดเคลื่อน,ผิดพลาดได้","6");
INSERT INTO subcategory VALUES("322","ขาดการประสานงาน ระหว่างหน่วยงาน","7");
INSERT INTO subcategory VALUES("323","สื่อสารกับผู้ปวย,ญาติ คลาดเคลื่อน","7");
INSERT INTO subcategory VALUES("325","ไม่ปฏิบัติตามแนวทาง การขอใช้ห้องประชุม","7");
INSERT INTO subcategory VALUES("326","ไม่ปฏิบัติตามแนวทาง การชำระเงิน","7");
INSERT INTO subcategory VALUES("327","ไม่ปฏิบัติตามแนวทาง การให้ข้อมูล/ข่าวสารของ รพ.","7");
INSERT INTO subcategory VALUES("328","ไม่ปฏิบัติตามแนวทาง การยืม,คืน แฟ้มเวชระเบียน","7");
INSERT INTO subcategory VALUES("329","ไม่ปฏิบัติตามแนวทาง การใช้ยานอกบัญชีหลักแห่งชาติ","7");
INSERT INTO subcategory VALUES("330","ไม่ปฏิบัติตามแนวทาง ผู้ป่วยแพ้ยา","7");
INSERT INTO subcategory VALUES("331","ไม่ปฏิบัติตามแนวทาง การผูกมัดผู้ป่วย","7");
INSERT INTO subcategory VALUES("332","ไม่ปฏิบัติตามแนวทาง การเข้าจับ/ควบคุมพฤติกรรมผู้ป่วย","1");
INSERT INTO subcategory VALUES("333","ไม่ปฏิบัติตามแนวทาง ระเบียบการลา","7");
INSERT INTO subcategory VALUES("334","ไม่ปฏิบัติตามแนวทาง การขอใช้รถยนต์ รพ.","7");
INSERT INTO subcategory VALUES("335","ส่งต่อเอกสารราชการ ไม่ถูกต้อง/ไม่ถูกที่/ไม่ครบ","7");
INSERT INTO subcategory VALUES("336","ตอบกลับหนังสือราชการ ล้าช้า","7");
INSERT INTO subcategory VALUES("337","หนังสือราชการ ไม่ได้ดำเนินการต่อเนื่อง","7");
INSERT INTO subcategory VALUES("338","ไม่ได้ส่งรายงาน","7");
INSERT INTO subcategory VALUES("339","เวชระเบียนผิดคน","8");
INSERT INTO subcategory VALUES("373","ปรับยาล้าช้า","1");
INSERT INTO subcategory VALUES("340","เวชระเบียนติดกัน","8");
INSERT INTO subcategory VALUES("372","ผู้ป่วยหมดสติ","1");
INSERT INTO subcategory VALUES("341","ข้อมูลในเวชระเบียนไม่ตรงกัน","8");
INSERT INTO subcategory VALUES("342","เวชระเบียน ไม่มีข้อมูลที่สำคัญ","8");
INSERT INTO subcategory VALUES("343","เวชระเบียน สลับกัน","8");
INSERT INTO subcategory VALUES("344","เวชระเบียน สูญหาย/หาไม่พบ","8");
INSERT INTO subcategory VALUES("345","เวชระเบียน ไม่กลับมา 24 ชม.","8");
INSERT INTO subcategory VALUES("346","สิทธิการรักษาผิด","8");
INSERT INTO subcategory VALUES("371","เวชระเบียน ออกใบแทน","8");
INSERT INTO subcategory VALUES("347","เวชระเบียน ขึ้นทะเบียนผู้ป่วยซ้ำคน","8");
INSERT INTO subcategory VALUES("348","บันทึกข้อมูลในเวชระเบียน OPD ผิด/ไม่ครบ","8");
INSERT INTO subcategory VALUES("349","บันทึกข้อมูลในเวชระเบียน IPD ผิด/ไม่ครบ","8");
INSERT INTO subcategory VALUES("350","บันทึกเวชระเบียน ผิดคน","8");
INSERT INTO subcategory VALUES("351","บันทึกเวชระเบียน ด้วยลายมืออ่านไม่ออก","8");
INSERT INTO subcategory VALUES("352","ลงชื่อผู้บันทึก ด้ายลายมืออ่านไม่ออก","8");
INSERT INTO subcategory VALUES("353","ส่งคืนเวชระเบียน เอกสารไม่ครบ","8");
INSERT INTO subcategory VALUES("354","ไม่ส่งคืนแฟ้มเวชระเบียน","8");
INSERT INTO subcategory VALUES("355","มีสิ่งแปลกปลอมติดมากับแฟ้มเวชระเบียน (ขนม,น้ำ,อาหาร)","8");
INSERT INTO subcategory VALUES("356","โปรแกรม Hos_xp error","8");
INSERT INTO subcategory VALUES("357","โปรแกรม Hos_xp ล้ม","8");
INSERT INTO subcategory VALUES("358","โปรแกรม Hos_xp ฐานข้อมูลไม่อัพเดท","8");
INSERT INTO subcategory VALUES("359","ไม่บันทึกข้อมูลในโปรแกรม Hos_xp","8");
INSERT INTO subcategory VALUES("360","ไม่ได้ตรวจสอบสิทธิการรักษา","8");
INSERT INTO subcategory VALUES("361","บันทึกชื่อย่อที่ไม่เป็นสากล","8");
INSERT INTO subcategory VALUES("362","ผู้ป่วย/ญาติ ปฏิเสธการให้ข้อมูล","8");
INSERT INTO subcategory VALUES("363","รูปถ่ายผู้ป่วยไม่เป็นปัจจุบัน","8");
INSERT INTO subcategory VALUES("364","เก็บแฟ้มเวชระเบียน ผิดคน","8");
INSERT INTO subcategory VALUES("365","เก็บแฟ้มเวชระเบียน ผิดช่อง","8");
INSERT INTO subcategory VALUES("366","เก็บแฟ้มเวชระเบียน ผิดซอง","8");
INSERT INTO subcategory VALUES("367","ไม่ลงชื่อผู้บันทึกข้อมูล","8");
INSERT INTO subcategory VALUES("368","ใช้แบบฟอร์มเก่าไม่เป็นปัจจุบัน","8");
INSERT INTO subcategory VALUES("369","สรุปแฟ้มเวชระเบียนล้าช้า","8");
INSERT INTO subcategory VALUES("374","ตรวจรักษา ผู้ป่วยผิดคน","1");
INSERT INTO subcategory VALUES("375","พบ สุนัข/แมว ในสำนักงาน","3");
INSERT INTO subcategory VALUES("376","พบอุจจาระ สุนัข/แมว ในสำนักงาน","5");
INSERT INTO subcategory VALUES("377","ไม่ได้ปิด (ก๊อกน้ำ/สปิงเกอร์)","6");
INSERT INTO subcategory VALUES("378","ทิ้งขยะผิดประเภท","5");
INSERT INTO subcategory VALUES("379","เคลื่อนย้าย วัสดุ ครุภัณฑ์ ไม่ได้แจ้งย้าย","6");
INSERT INTO subcategory VALUES("380","ออกใบนัด ผิดคน","8");
INSERT INTO subcategory VALUES("381","ออกใบนัด ผิดเวลา/วันที่","8");
INSERT INTO subcategory VALUES("382","อื่นๆ","8");
INSERT INTO subcategory VALUES("383","ขาดการประสานงาน ภายในหน่วยงาน","7");
INSERT INTO subcategory VALUES("384","บันทึกข้อมูลในโปรแกรม Hos_xp ผิดคน","8");
INSERT INTO subcategory VALUES("385","ผู้ป่วยบาดเจ็บ จากพฤติกรรม ก้าวร้าว/หลงผิด","1");
INSERT INTO subcategory VALUES("386","เจ้าหน้าที่ ไม่อยู่เวร","3");
INSERT INTO subcategory VALUES("387","ไม่มีเจ้าหน้าที่อยู่ปฏิบัติงาน","3");
INSERT INTO subcategory VALUES("388","น้ำดื่มหมด","6");
INSERT INTO subcategory VALUES("389","เปิดน้ำทิ้งไว้ ไม่ได้ดูแล","6");
INSERT INTO subcategory VALUES("391","เครื่องสำรองไฟฟ้า UPS ชำรุด","6");
INSERT INTO subcategory VALUES("392","ถ่ายรูป ไม่ได้รับอนุญาต","7");
INSERT INTO subcategory VALUES("393","เก็บแฟ้มเวชระเบียน ไม่เป็นระเบียบ","8");
INSERT INTO subcategory VALUES("400","บันทึกเลขบัตรประจำตัวประชาชนผิด (ID)","8");
INSERT INTO subcategory VALUES("395","แฟ้มเวชระเบียน มีโอกาสสูญหาย","8");
INSERT INTO subcategory VALUES("397","เช็คยาผิดก่อนจ่าย - เกินคำสั่งแพทย์","2");
INSERT INTO subcategory VALUES("398","เช็คยาผิดก่อนจ่าย - ไม่ครบรายการยา","2");
INSERT INTO subcategory VALUES("399","บันทึกข้อมูลใน HOS_xp ผิด/ไม่ครบ","8");
INSERT INTO subcategory VALUES("401","ตอบ refer ไม่มีข้อมูลที่สำคัญ","8");
INSERT INTO subcategory VALUES("402","ส่งต่อบริการ ไม่ถูกที่/ไม่ครบ/ล่าช้า","7");
INSERT INTO subcategory VALUES("403","เจ้าหน้าที่สูบบุหรี่ ในพื้นที่สำนักงาน","3");
INSERT INTO subcategory VALUES("404","ยาเสื่อมสภาพ/หมดอายุ","6");
INSERT INTO subcategory VALUES("408","บริหารยา ผิดจำนวน","2");
INSERT INTO subcategory VALUES("406","เช็คยาผิดก่อนจ่าย - ผิดชนิด","2");
INSERT INTO subcategory VALUES("407","มีโอกาส สูญเสียรายได้ รพ.","6");
INSERT INTO subcategory VALUES("409","ดำเนินการล่าช้า ทำให้ รพ./ฝ่ายงาน/จนท. คลาดเคลื่อนได้","6");
INSERT INTO subcategory VALUES("411","เครื่องมือ วัสดุ อุปกรณ์ - ใช้งานผิดประเภท","6");
INSERT INTO subcategory VALUES("412","ยกเลิกใบเสร็จชำระเงิน","6");
INSERT INTO subcategory VALUES("413","บันทึกหนังสือราชการ ผิด/ไม่ครบถ้วน/ไม่ถูกต้อง","7");
INSERT INTO subcategory VALUES("414","ออกหนังสือราชการ /การแพทย์ ผิดคน","7");
INSERT INTO subcategory VALUES("415","ผู้ป่วย/ญาติ สูบบุหรี่ ก่อความรำคาญ","3");
INSERT INTO subcategory VALUES("416","เครืองมือ วัสดุ อุปกรณ์ ไม่ได้รับการตรวจสอบตามแผน","6");
INSERT INTO subcategory VALUES("417","พบสุนัข ที่เป็นอันตราย","5");
INSERT INTO subcategory VALUES("418","สแกนเวชระเบียน - ปนกัน","8");
INSERT INTO subcategory VALUES("419","refer ผู้ป่วยไปรับการรักษา ภายใน 72 ชม.","1");
INSERT INTO subcategory VALUES("420","แผนการรักษาล่าช้า/ไม่ครอบคลุม","1");
INSERT INTO subcategory VALUES("421","ไม่ได้ทำความสะอาดต่อเนื่อง","6");
INSERT INTO subcategory VALUES("422","ผู้ป่วยก้าวร้าว รุนแรง","1");



DROP TABLE IF EXISTS takerisk;

CREATE TABLE `takerisk` (
  `takerisk_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(5) NOT NULL,
  `subcategory` varchar(5) NOT NULL,
  `take_dep` varchar(5) NOT NULL,
  `res_dep` varchar(5) NOT NULL,
  `take_place` varchar(5) DEFAULT NULL,
  `level_risk` varchar(5) NOT NULL,
  `hn` varchar(10) DEFAULT NULL,
  `an` varchar(10) DEFAULT NULL,
  `take_date` date DEFAULT NULL,
  `take_time` varchar(50) DEFAULT NULL,
  `take_detail` text NOT NULL,
  `take_other` varchar(255) DEFAULT NULL,
  `take_first` text NOT NULL,
  `take_counsel` text,
  `take_rec_date` varchar(100) DEFAULT NULL,
  `take_rec_time` varchar(50) DEFAULT NULL,
  `take_file1` varchar(255) DEFAULT NULL,
  `take_file2` varchar(255) DEFAULT NULL,
  `take_file3` varchar(255) DEFAULT NULL,
  `move_status` varchar(1) DEFAULT 'N',
  `user_id` varchar(11) DEFAULT NULL,
  `recycle` varchar(1) NOT NULL DEFAULT 'N',
  `detail_recycle` text,
  `pct` varchar(1) NOT NULL DEFAULT 'N',
  `ic` varchar(1) NOT NULL DEFAULT 'N',
  `rca` varchar(1) NOT NULL DEFAULT 'N',
  `receiver` int(7) NOT NULL,
  `receive_date` date NOT NULL,
  `return_risk` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `return_user` int(7) DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  PRIMARY KEY (`takerisk_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS tbl_event;

CREATE TABLE `tbl_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(255) NOT NULL,
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `event_url` varchar(255) NOT NULL,
  `event_allDay` varchar(5) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO tbl_event VALUES("1","Birthday Party","2015-01-30 11:35:38","2015-01-30 15:35:52","http://www.ninenik.com","false");
INSERT INTO tbl_event VALUES("2","Meeting","2015-01-31 11:36:16","2015-01-31 15:00:00","http://www.ninenik.com","false");
INSERT INTO tbl_event VALUES("3","Lunch","2015-02-01 15:30:00","2015-02-01 16:00:00","http://www.google.com","false");
INSERT INTO tbl_event VALUES("4","All Day Event","2015-01-31 22:10:08","0000-00-00 00:00:00","","true");
INSERT INTO tbl_event VALUES("5","Long Event","2010-08-29 08:40:00","2010-08-31 09:30:00","","true");



DROP TABLE IF EXISTS user;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(200) DEFAULT NULL,
  `user_lname` varchar(200) DEFAULT NULL,
  `user_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_account` varchar(100) DEFAULT NULL,
  `user_pwd` varchar(100) DEFAULT NULL,
  `dep_id` varchar(3) DEFAULT NULL,
  `main_dep` int(2) DEFAULT NULL,
  `admin` varchar(1) DEFAULT 'N',
  `date_login` date DEFAULT NULL,
  `time_login` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO user VALUES("1","ทดสอบ","ระบบโปรแกรมความเสี่ยง","scarz","21232f297a57a5a743894a0e4a801fc3","81dc9bdb52d04dc20036dbd8313ed055","1","1","Y","2017-04-15","1492267598","");



