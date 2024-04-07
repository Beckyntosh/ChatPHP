CREATE TABLE IF NOT EXISTS product_reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id INT(6) NOT NULL,
  user_name VARCHAR(50),
  rating INT(1),
  review TEXT,
  review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO product_reviews (product_id, user_name, rating, review) VALUES
(1, 'John Doe', 4, 'Great product, very happy with my purchase'),
(2, 'Jane Smith', 5, 'Excellent quality, would definitely recommend'),
(3, 'Alice Johnson', 3, 'Decent product, could be better'),
(4, 'Bob Brown', 5, 'Love this product, exceeded my expectations'),
(5, 'Sarah Wilson', 2, 'Disappointed with the quality, expected better'),
(1, 'Emily Davis', 4, 'Good value for money, will purchase again'),
(3, 'Michael Thompson', 1, 'Not satisfied with the product, poor quality'),
(2, 'Olivia Martinez', 5, 'Best purchase ever, highly recommend it'),
(4, 'William Garcia', 4, 'Very happy with this product, worth the price'),
(5, 'Daniel Rodriguez', 3, 'Average product, nothing special');
