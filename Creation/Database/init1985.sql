CREATE TABLE IF NOT EXISTS psd_uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP
);

INSERT INTO psd_uploads (filename) VALUES ('landscape_photo1.psd');
INSERT INTO psd_uploads (filename) VALUES ('landscape_photo2.psd');
INSERT INTO psd_uploads (filename) VALUES ('portrait_photo1.psd');
INSERT INTO psd_uploads (filename) VALUES ('nature_photo1.psd');
INSERT INTO psd_uploads (filename) VALUES ('cityscape_photo1.psd');
INSERT INTO psd_uploads (filename) VALUES ('wildlife_photo1.psd');
INSERT INTO psd_uploads (filename) VALUES ('food_photo1.psd');
INSERT INTO psd_uploads (filename) VALUES ('travel_photo1.psd');
INSERT INTO psd_uploads (filename) VALUES ('architecture_photo1.psd');
INSERT INTO psd_uploads (filename) VALUES ('sports_photo1.psd');
