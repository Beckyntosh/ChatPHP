CREATE TABLE IF NOT EXISTS photo_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO photo_uploads (file_name) VALUES ('landscape1.psd');
INSERT INTO photo_uploads (file_name) VALUES ('landscape2.psd');
INSERT INTO photo_uploads (file_name) VALUES ('landscape3.psd');
INSERT INTO photo_uploads (file_name) VALUES ('landscape4.psd');
INSERT INTO photo_uploads (file_name) VALUES ('landscape5.psd');
INSERT INTO photo_uploads (file_name) VALUES ('landscape6.psd');
INSERT INTO photo_uploads (file_name) VALUES ('landscape7.psd');
INSERT INTO photo_uploads (file_name) VALUES ('landscape8.psd');
INSERT INTO photo_uploads (file_name) VALUES ('landscape9.psd');
INSERT INTO photo_uploads (file_name) VALUES ('landscape10.psd');
