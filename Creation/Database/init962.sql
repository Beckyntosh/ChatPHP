CREATE TABLE IF NOT EXISTS product_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_name VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    review TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO product_reviews (product_id, user_name, rating, review) VALUES (1, 'John Doe', 5, 'Great product, very comfortable to sleep on');
INSERT INTO product_reviews (product_id, user_name, rating, review) VALUES (1, 'Jane Smith', 4, 'Nice design, but could be softer');
INSERT INTO product_reviews (product_id, user_name, rating, review) VALUES (1, 'Alice Johnson', 3, 'Average quality for the price');
INSERT INTO product_reviews (product_id, user_name, rating, review) VALUES (1, 'Bob Brown', 5, 'Love it, would recommend to anyone');
INSERT INTO product_reviews (product_id, user_name, rating, review) VALUES (2, 'Sam Wilson', 4, 'Good value, durable material');
INSERT INTO product_reviews (product_id, user_name, rating, review) VALUES (2, 'Emily Davis', 2, 'Disappointed with the size');
INSERT INTO product_reviews (product_id, user_name, rating, review) VALUES (2, 'Chris White', 4, 'Sleek design, fits well in my room');
INSERT INTO product_reviews (product_id, user_name, rating, review) VALUES (3, 'Amy Taylor', 5, 'Best purchase ever, so soft and cozy');
INSERT INTO product_reviews (product_id, user_name, rating, review) VALUES (3, 'Mike Martinez', 3, 'Decent quality, could be improved');
INSERT INTO product_reviews (product_id, user_name, rating, review) VALUES (3, 'Sarah Anderson', 4, 'Happy with the purchase, good value for money');
