CREATE TABLE `news`
(
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR
(128) NOT NULL,
  `text` VARCHAR
(200) NOT NULL,
  `photo` VARCHAR
(200) NOT NULL,
 `pageLink` VARCHAR
(40) NOT NULL,
  `date` DATE NOT NULL,
  `resultId` INT NOT NULL,
  PRIMARY KEY
(`id`),
  FOREIGN KEY
(`resultId`) REFERENCES eventResults
(`id`)
  );