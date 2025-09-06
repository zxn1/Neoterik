CREATE TABLE `settings` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `key` VARCHAR(255) NOT NULL,
  `value` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `settings` (`key`, `value`) VALUES ('dskpn_versioning', 0);