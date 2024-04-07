CREATE TABLE IF NOT EXISTS uploaded_photos (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
uploaded_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_photos (filename) VALUES ('LandscapePhoto1.psd');
INSERT INTO uploaded_photos (filename) VALUES ('LandscapePhoto2.psd');
INSERT INTO uploaded_photos (filename) VALUES ('LandscapePhoto3.psd');
INSERT INTO uploaded_photos (filename) VALUES ('LandscapePhoto4.psd');
INSERT INTO uploaded_photos (filename) VALUES ('LandscapePhoto5.psd');
INSERT INTO uploaded_photos (filename) VALUES ('LandscapePhoto6.psd');
INSERT INTO uploaded_photos (filename) VALUES ('LandscapePhoto7.psd');
INSERT INTO uploaded_photos (filename) VALUES ('LandscapePhoto8.psd');
INSERT INTO uploaded_photos (filename) VALUES ('LandscapePhoto9.psd');
INSERT INTO uploaded_photos (filename) VALUES ('LandscapePhoto10.psd');