CREATE TABLE IF NOT EXISTS image_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO image_uploads (filename) VALUES ('landscape_photo1.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo2.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo3.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo4.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo5.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo6.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo7.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo8.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo9.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo10.psd');
