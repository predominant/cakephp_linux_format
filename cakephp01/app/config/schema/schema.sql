CREATE TABLE `movies` (
  `id` CHAR(36) NOT NULL PRIMARY KEY,
  `title` VARCHAR(255),
  `genre` VARCHAR(45),
  `rating` VARCHAR(45),
  `format` VARCHAR(45),
  `length` VARCHAR(45),
  `created` DATETIME,
  `modified` DATETIME
);
