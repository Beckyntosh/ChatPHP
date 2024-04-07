CREATE TABLE IF NOT EXISTS archive_uploads (
  id INT AUTO_INCREMENT PRIMARY KEY,
  file_name VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO archive_uploads (file_name) VALUES ('ProjectAlpha.zip');
INSERT INTO archive_uploads (file_name) VALUES ('ProjectBeta.zip');
INSERT INTO archive_uploads (file_name) VALUES ('ProjectGamma.zip');
INSERT INTO archive_uploads (file_name) VALUES ('Document1.zip');
INSERT INTO archive_uploads (file_name) VALUES ('Document2.zip');
INSERT INTO archive_uploads (file_name) VALUES ('Document3.zip');
INSERT INTO archive_uploads (file_name) VALUES ('ProjectX.zip');
INSERT INTO archive_uploads (file_name) VALUES ('ProjectY.zip');
INSERT INTO archive_uploads (file_name) VALUES ('ProjectZ.zip');
INSERT INTO archive_uploads (file_name) VALUES ('Report.zip');
