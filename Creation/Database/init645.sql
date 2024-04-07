CREATE TABLE IF NOT EXISTS uploads (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  image_path VARCHAR(255),
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploads (user_id, image_path) VALUES (1, 'uploads/image1.jpg');
INSERT INTO uploads (user_id, image_path) VALUES (1, 'uploads/image2.jpg');
INSERT INTO uploads (user_id, image_path) VALUES (1, 'uploads/image3.jpg');
INSERT INTO uploads (user_id, image_path) VALUES (1, 'uploads/image4.jpg');
INSERT INTO uploads (user_id, image_path) VALUES (1, 'uploads/image5.jpg');
INSERT INTO uploads (user_id, image_path) VALUES (1, 'uploads/image6.jpg');
INSERT INTO uploads (user_id, image_path) VALUES (1, 'uploads/image7.jpg');
INSERT INTO uploads (user_id, image_path) VALUES (1, 'uploads/image8.jpg');
INSERT INTO uploads (user_id, image_path) VALUES (1, 'uploads/image9.jpg');
INSERT INTO uploads (user_id, image_path) VALUES (1, 'uploads/image10.jpg');