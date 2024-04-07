CREATE TABLE IF NOT EXISTS image_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO image_uploads (filename) VALUES ('landscape_photo_1.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo_2.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo_3.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo_4.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo_5.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo_6.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo_7.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo_8.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo_9.psd');
INSERT INTO image_uploads (filename) VALUES ('landscape_photo_10.psd');