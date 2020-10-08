CREATE VIEW `seasondates` AS
SELECT
IF((MONTH(CURDATE()) <= 10),
            STR_TO_DATE
(CONCAT
((YEAR
(CURDATE
()) - 1), ' 11 1'),
                    '%Y %c %d'),
            STR_TO_DATE
(CONCAT
(YEAR
(CURDATE
()), ' 11 1'),
                    '%Y %c %d')) AS `startDate`,
IF((MONTH(CURDATE()) <= 10),
            STR_TO_DATE
(CONCAT
(YEAR
(CURDATE
()), ' 10 31'),
                    '%Y %c %d'),
            STR_TO_DATE
(CONCAT
((YEAR
(CURDATE
()) + 1), ' 10 31'),
                    '%Y %c %d')) AS `endDate`