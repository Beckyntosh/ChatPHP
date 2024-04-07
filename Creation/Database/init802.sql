CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    video_url VARCHAR(255)
);

INSERT INTO products (product_name, description, price, video_url) VALUES ('Sunglasses 1', 'Description of Sunglasses 1', 50.00, 'https://www.youtube.com/watch?v=video1');
INSERT INTO products (product_name, description, price, video_url) VALUES ('Sunglasses 2', 'Description of Sunglasses 2', 40.00, 'https://www.youtube.com/watch?v=video2');
INSERT INTO products (product_name, description, price, video_url) VALUES ('Sunglasses 3', 'Description of Sunglasses 3', 55.00, 'https://www.youtube.com/watch?v=video3');
INSERT INTO products (product_name, description, price, video_url) VALUES ('Sunglasses 4', 'Description of Sunglasses 4', 60.00, 'https://www.youtube.com/watch?v=video4');
INSERT INTO products (product_name, description, price, video_url) VALUES ('Sunglasses 5', 'Description of Sunglasses 5', 45.00, 'https://www.youtube.com/watch?v=video5');
INSERT INTO products (product_name, description, price, video_url) VALUES ('Sunglasses 6', 'Description of Sunglasses 6', 70.00, 'https://www.youtube.com/watch?v=video6');
INSERT INTO products (product_name, description, price, video_url) VALUES ('Sunglasses 7', 'Description of Sunglasses 7', 65.00, 'https://www.youtube.com/watch?v=video7');
INSERT INTO products (product_name, description, price, video_url) VALUES ('Sunglasses 8', 'Description of Sunglasses 8', 80.00, 'https://www.youtube.com/watch?v=video8');
INSERT INTO products (product_name, description, price, video_url) VALUES ('Sunglasses 9', 'Description of Sunglasses 9', 75.00, 'https://www.youtube.com/watch?v=video9');
INSERT INTO products (product_name, description, price, video_url) VALUES ('Sunglasses 10', 'Description of Sunglasses 10', 90.00, 'https://www.youtube.com/watch?v=video10');
