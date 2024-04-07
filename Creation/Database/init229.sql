CREATE TABLE IF NOT EXISTS magazine_archives (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  file_name VARCHAR(255) NOT NULL,
  file_path VARCHAR(255) NOT NULL,
  upload_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO magazine_archives (file_name, file_path) VALUES ('magazine1.zip', 'uploads/magazine1.zip');
INSERT INTO magazine_archives (file_name, file_path) VALUES ('magazine2.zip', 'uploads/magazine2.zip');
INSERT INTO magazine_archives (file_name, file_path) VALUES ('magazine3.zip', 'uploads/magazine3.zip');
INSERT INTO magazine_archives (file_name, file_path) VALUES ('magazine4.zip', 'uploads/magazine4.zip');
INSERT INTO magazine_archives (file_name, file_path) VALUES ('magazine5.zip', 'uploads/magazine5.zip');
INSERT INTO magazine_archives (file_name, file_path) VALUES ('magazine6.zip', 'uploads/magazine6.zip');
INSERT INTO magazine_archives (file_name, file_path) VALUES ('magazine7.zip', 'uploads/magazine7.zip');
INSERT INTO magazine_archives (file_name, file_path) VALUES ('magazine8.zip', 'uploads/magazine8.zip');
INSERT INTO magazine_archives (file_name, file_path) VALUES ('magazine9.zip', 'uploads/magazine9.zip');
INSERT INTO magazine_archives (file_name, file_path) VALUES ('magazine10.zip', 'uploads/magazine10.zip');