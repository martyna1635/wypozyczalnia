CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `password` TEXT(32), 
  PRIMARY KEY  (`id`),
  UNIQUE(`username`)
);

CREATE TABLE `movies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` TEXT(255) CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `description` TEXT(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci,
  `price` DECIMAL(10,2),
  PRIMARY KEY  (`id`)
);

CREATE TABLE `orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userd_id` INT,
  `movie_id` INT,
  PRIMARY KEY  (`id`)
);

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`userd_id`) REFERENCES users(`id`) ON DELETE SET NULL;
ALTER TABLE `orders` ADD CONSTRAINT `orders_fk2` FOREIGN KEY (`movie_id`) REFERENCES movies(`id`) ON DELETE SET NULL;