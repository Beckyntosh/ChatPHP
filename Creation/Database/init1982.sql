CREATE TABLE photoshop_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
file_name VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO photoshop_files (file_name) VALUES ('landscape1.jpg');
INSERT INTO photoshop_files (file_name) VALUES ('landscape2.jpg');
INSERT INTO photoshop_files (file_name) VALUES ('landscape3.jpg');
INSERT INTO photoshop_files (file_name) VALUES ('landscape4.jpg');
INSERT INTO photoshop_files (file_name) VALUES ('landscape5.jpg');
INSERT INTO photoshop_files (file_name) VALUES ('landscape6.jpg');
INSERT INTO photoshop_files (file_name) VALUES ('landscape7.jpg');
INSERT INTO photoshop_files (file_name) VALUES ('landscape8.jpg');
INSERT INTO photoshop_files (file_name) VALUES ('landscape9.jpg');
INSERT INTO photoshop_files (file_name) VALUES ('landscape10.jpg');