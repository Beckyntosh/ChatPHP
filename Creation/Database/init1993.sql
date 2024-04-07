CREATE TABLE IF NOT EXISTS uploaded_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_files (filename) VALUES ('uploads/landscape_photo_1.psd');
INSERT INTO uploaded_files (filename) VALUES ('uploads/landscape_photo_2.psb');
INSERT INTO uploaded_files (filename) VALUES ('uploads/landscape_photo_3.psd');
INSERT INTO uploaded_files (filename) VALUES ('uploads/landscape_photo_4.psb');
INSERT INTO uploaded_files (filename) VALUES ('uploads/landscape_photo_5.psd');
INSERT INTO uploaded_files (filename) VALUES ('uploads/landscape_photo_6.psb');
INSERT INTO uploaded_files (filename) VALUES ('uploads/landscape_photo_7.psd');
INSERT INTO uploaded_files (filename) VALUES ('uploads/landscape_photo_8.psb');
INSERT INTO uploaded_files (filename) VALUES ('uploads/landscape_photo_9.psd');
INSERT INTO uploaded_files (filename) VALUES ('uploads/landscape_photo_10.psb');
