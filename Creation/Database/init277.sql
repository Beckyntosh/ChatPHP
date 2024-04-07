CREATE TABLE IF NOT EXISTS `firmware_uploads` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `filename` VARCHAR(255) NOT NULL,
  `uploaded_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO firmware_uploads (filename) VALUES ('firmware_1');
INSERT INTO firmware_uploads (filename) VALUES ('firmware_2');
INSERT INTO firmware_uploads (filename) VALUES ('firmware_3');
INSERT INTO firmware_uploads (filename) VALUES ('firmware_4');
INSERT INTO firmware_uploads (filename) VALUES ('firmware_5');
INSERT INTO firmware_uploads (filename) VALUES ('firmware_6');
INSERT INTO firmware_uploads (filename) VALUES ('firmware_7');
INSERT INTO firmware_uploads (filename) VALUES ('firmware_8');
INSERT INTO firmware_uploads (filename) VALUES ('firmware_9');
INSERT INTO firmware_uploads (filename) VALUES ('firmware_10');