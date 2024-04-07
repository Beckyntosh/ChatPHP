CREATE TABLE IF NOT EXISTS photoshop_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO photoshop_files (filename) VALUES ('landscape_photo_1.jpg');
INSERT INTO photoshop_files (filename) VALUES ('landscape_photo_2.jpg');
INSERT INTO photoshop_files (filename) VALUES ('landscape_photo_3.jpg');
INSERT INTO photoshop_files (filename) VALUES ('landscape_photo_4.jpg');
INSERT INTO photoshop_files (filename) VALUES ('landscape_photo_5.jpg');
INSERT INTO photoshop_files (filename) VALUES ('landscape_photo_6.jpg');
INSERT INTO photoshop_files (filename) VALUES ('landscape_photo_7.jpg');
INSERT INTO photoshop_files (filename) VALUES ('landscape_photo_8.jpg');
INSERT INTO photoshop_files (filename) VALUES ('landscape_photo_9.jpg');
INSERT INTO photoshop_files (filename) VALUES ('landscape_photo_10.jpg');
