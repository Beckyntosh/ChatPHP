CREATE TABLE IF NOT EXISTS gadgets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating DECIMAL(3,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO gadgets (title, review, rating) VALUES ('iPhone 12 Pro Max', 'Great phone with amazing camera quality.', 4.5);
INSERT INTO gadgets (title, review, rating) VALUES ('Samsung Galaxy S21 Ultra', 'Impressive display and versatile camera setup.', 4.8);
INSERT INTO gadgets (title, review, rating) VALUES ('Sony WH-1000XM4', 'Superb noise-cancelling headphones for music lovers.', 4.7);
INSERT INTO gadgets (title, review, rating) VALUES ('Dell XPS 13', 'Sleek design with powerful performance.', 4.6);
INSERT INTO gadgets (title, review, rating) VALUES ('Apple Watch Series 6', 'Convenient smartwatch with health tracking features.', 4.3);
INSERT INTO gadgets (title, review, rating) VALUES ('Google Pixel 5', 'Pure Android experience with excellent camera.', 4.4);
INSERT INTO gadgets (title, review, rating) VALUES ('Logitech G Pro X Gaming Headset', 'Comfortable headset with great audio quality.', 4.5);
INSERT INTO gadgets (title, review, rating) VALUES ('Microsoft Surface Pro 7', 'Versatile 2-in-1 laptop for productivity.', 4.6);
INSERT INTO gadgets (title, review, rating) VALUES ('Canon EOS R5', 'High-performance mirrorless camera for professional photographers.', 4.9);
INSERT INTO gadgets (title, review, rating) VALUES ('Samsung QLED Q90T TV', 'Stunning picture quality with impressive color accuracy.', 4.7);
