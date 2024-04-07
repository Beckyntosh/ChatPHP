CREATE TABLE IF NOT EXISTS configuration_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO configuration_files (file_name) VALUES ('file1.config');
INSERT INTO configuration_files (file_name) VALUES ('file2.config');
INSERT INTO configuration_files (file_name) VALUES ('file3.config');
INSERT INTO configuration_files (file_name) VALUES ('file4.config');
INSERT INTO configuration_files (file_name) VALUES ('file5.config');
INSERT INTO configuration_files (file_name) VALUES ('file6.config');
INSERT INTO configuration_files (file_name) VALUES ('file7.config');
INSERT INTO configuration_files (file_name) VALUES ('file8.config');
INSERT INTO configuration_files (file_name) VALUES ('file9.config');
INSERT INTO configuration_files (file_name) VALUES ('file10.config');