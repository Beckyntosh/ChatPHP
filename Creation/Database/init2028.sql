CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description TEXT NOT NULL,
image VARCHAR(100),
brand VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO products (name, description, image, brand)
VALUES ('Handbag 1', 'Description of Handbag 1', 'image1.jpg', 'Brand A'),
       ('Handbag 2', 'Description of Handbag 2', 'image2.jpg', 'Brand B'),
       ('Handbag 3', 'Description of Handbag 3', 'image3.jpg', 'Brand C'),
       ('Handbag 4', 'Description of Handbag 4', 'image4.jpg', 'Brand A'),
       ('Handbag 5', 'Description of Handbag 5', 'image5.jpg', 'Brand B'),
       ('Handbag 6', 'Description of Handbag 6', 'image6.jpg', 'Brand C'),
       ('Handbag 7', 'Description of Handbag 7', 'image7.jpg', 'Brand A'),
       ('Handbag 8', 'Description of Handbag 8', 'image8.jpg', 'Brand B'),
       ('Handbag 9', 'Description of Handbag 9', 'image9.jpg', 'Brand C'),
       ('Handbag 10', 'Description of Handbag 10', 'image10.jpg', 'Brand A');
