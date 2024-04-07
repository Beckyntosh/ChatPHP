CREATE TABLE IF NOT EXISTS uploaded_images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_images (filename) VALUES ('landscape1.jpg');
INSERT INTO uploaded_images (filename) VALUES ('landscape2.jpg');
INSERT INTO uploaded_images (filename) VALUES ('landscape3.jpg');
INSERT INTO uploaded_images (filename) VALUES ('landscape4.jpg');
INSERT INTO uploaded_images (filename) VALUES ('landscape5.jpg');
INSERT INTO uploaded_images (filename) VALUES ('landscape6.jpg');
INSERT INTO uploaded_images (filename) VALUES ('landscape7.jpg');
INSERT INTO uploaded_images (filename) VALUES ('landscape8.jpg');
INSERT INTO uploaded_images (filename) VALUES ('landscape9.jpg');
INSERT INTO uploaded_images (filename) VALUES ('landscape10.jpg');
