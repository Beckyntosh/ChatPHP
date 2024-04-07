CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    submit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO reviews (product_name, review, rating) VALUES ('iPhone 12 Pro Max', 'Great phone with amazing camera', 5);
INSERT INTO reviews (product_name, review, rating) VALUES ('Samsung Galaxy S21 Ultra', 'Awesome display and performance', 4);
INSERT INTO reviews (product_name, review, rating) VALUES ('Sony WH-1000XM4', 'Best noise-canceling headphones', 5);
INSERT INTO reviews (product_name, review, rating) VALUES ('Dyson Supersonic Hair Dryer', 'Expensive but worth every penny', 4);
INSERT INTO reviews (product_name, review, rating) VALUES ('Apple Watch Series 6', 'Excellent fitness tracker', 4);
INSERT INTO reviews (product_name, review, rating) VALUES ('Nintendo Switch', 'Fun for gaming on-the-go', 5);
INSERT INTO reviews (product_name, review, rating) VALUES ('Bose SoundLink Revolve+', 'Impressive sound quality', 4);
INSERT INTO reviews (product_name, review, rating) VALUES ('Google Pixel 5', 'Clean Android experience', 4);
INSERT INTO reviews (product_name, review, rating) VALUES ('Fitbit Charge 4', 'Great for fitness tracking', 5);
INSERT INTO reviews (product_name, review, rating) VALUES ('GoPro Hero 9 Black', 'Perfect for capturing adventures', 5);
