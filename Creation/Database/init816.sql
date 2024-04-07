CREATE TABLE IF NOT EXISTS images (
id INT AUTO_INCREMENT PRIMARY KEY,
file_name VARCHAR(255),
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO images (file_name) VALUES ('image1.jpg');
INSERT INTO images (file_name) VALUES ('image2.jpg');
INSERT INTO images (file_name) VALUES ('image3.jpg');
INSERT INTO images (file_name) VALUES ('image4.jpg');
INSERT INTO images (file_name) VALUES ('image5.jpg');
INSERT INTO images (file_name) VALUES ('image6.jpg');
INSERT INTO images (file_name) VALUES ('image7.jpg');
INSERT INTO images (file_name) VALUES ('image8.jpg');
INSERT INTO images (file_name) VALUES ('image9.jpg');
INSERT INTO images (file_name) VALUES ('image10.jpg');
