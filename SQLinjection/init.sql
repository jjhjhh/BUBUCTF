CREATE TABLE `users` (
  `no` int NOT NULL AUTO_INCREMENT,
  `id` varchar(50) DEFAULT NULL,
  `pw` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`no`)
)

INSERT INTO `users` VALUES (1,'fake','lol'),(2,'admin','BUBU{TM1_I_h4t3_B1!nd_5QL!}'),(3,'guest','guest');