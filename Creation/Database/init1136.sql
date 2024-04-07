CREATE TABLE IF NOT EXISTS user_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_name VARCHAR(50),
    rating INT NOT NULL,
    review TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO user_reviews (product_id, user_name, rating, review) VALUES
(1, 'Alice', 5, 'Great product, highly recommended!'),
(1, 'Bob', 4, 'Good quality and fast delivery'),
(1, 'Charlie', 3, 'Average product, could be better'),
(1, 'David', 2, 'Not satisfied with the sizing'),
(1, 'Eve', 1, 'Poor customer service'),
(1, 'Fiona', 5, 'Perfect fit, love it!'),
(1, 'George', 4, 'Nice design, comfortable fabric'),
(1, 'Hannah', 3, 'Decent product for the price'),
(1, 'Ian', 2, 'Sizes run small, had to return'),
(1, 'Jane', 1, 'Worst purchase ever');
