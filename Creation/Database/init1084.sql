CREATE TABLE IF NOT EXISTS reviews (
id INT AUTO_INCREMENT PRIMARY KEY,
product_name VARCHAR(255) NOT NULL,
review TEXT NOT NULL,
rating TINYINT NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO reviews (product_name, review, rating) VALUES 
('iPhone 12 Pro', 'Great phone with amazing camera quality', 5),
('Samsung Galaxy S20', 'Decent phone with good display', 4),
('Sony WH-1000XM4', 'Best noise-canceling headphones in the market', 5),
('Apple Watch Series 5', 'Good smartwatch with amazing features', 4),
('Dell XPS 13', 'Powerful laptop with sleek design', 5),
('Google Pixel 4a', 'Budget-friendly phone with good camera', 4),
('Sony A7 III', 'Great mirrorless camera for photography enthusiasts', 5),
('Nintendo Switch', 'Fun gaming console for all ages', 4),
('Dyson Supersonic Hair Dryer', 'Expensive but worth the investment', 5),
('Fitbit Charge 4', 'Good fitness tracker with accurate heart rate monitoring', 4);
