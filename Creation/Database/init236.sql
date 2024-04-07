CREATE TABLE IF NOT EXISTS `cad_uploads` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `file_name` VARCHAR(255) NOT NULL,
    `upload_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `cad_uploads` (`file_name`) VALUES ('file1.cad');
INSERT INTO `cad_uploads` (`file_name`) VALUES ('file2.stl');
INSERT INTO `cad_uploads` (`file_name`) VALUES ('file3.obj');
INSERT INTO `cad_uploads` (`file_name`) VALUES ('file4.cad');
INSERT INTO `cad_uploads` (`file_name`) VALUES ('file5.stl');
INSERT INTO `cad_uploads` (`file_name`) VALUES ('file6.obj');
INSERT INTO `cad_uploads` (`file_name`) VALUES ('file7.cad');
INSERT INTO `cad_uploads` (`file_name`) VALUES ('file8.stl');
INSERT INTO `cad_uploads` (`file_name`) VALUES ('file9.obj');
INSERT INTO `cad_uploads` (`file_name`) VALUES ('file10.cad');