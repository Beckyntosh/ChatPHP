CREATE TABLE IF NOT EXISTS `languages` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `code` VARCHAR(2) NOT NULL,
    `name` VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `languages` (`code`, `name`) VALUES ('en', 'English');
INSERT INTO `languages` (`code`, `name`) VALUES ('es', 'Spanish');
INSERT INTO `languages` (`code`, `name`) VALUES ('fr', 'French');
INSERT INTO `languages` (`code`, `name`) VALUES ('de', 'German');
INSERT INTO `languages` (`code`, `name`) VALUES ('it', 'Italian');
INSERT INTO `languages` (`code`, `name`) VALUES ('pt', 'Portuguese');
INSERT INTO `languages` (`code`, `name`) VALUES ('ja', 'Japanese');
INSERT INTO `languages` (`code`, `name`) VALUES ('ko', 'Korean');
INSERT INTO `languages` (`code`, `name`) VALUES ('ru', 'Russian');
INSERT INTO `languages` (`code`, `name`) VALUES ('zh', 'Chinese');
