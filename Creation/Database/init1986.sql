CREATE TABLE IF NOT EXISTS images (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
uploaded TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO images (filename) VALUES ('landscape_photo.psd');
INSERT INTO images (filename) VALUES ('mountain_photo.psd');
INSERT INTO images (filename) VALUES ('cityscape.psd');
INSERT INTO images (filename) VALUES ('sunset.psd');
INSERT INTO images (filename) VALUES ('portrait.psd');
INSERT INTO images (filename) VALUES ('beach.psd');
INSERT INTO images (filename) VALUES ('forest.psd');
INSERT INTO images (filename) VALUES ('flower.psd');
INSERT INTO images (filename) VALUES ('architecture.psd');
INSERT INTO images (filename) VALUES ('artistic.psd');
