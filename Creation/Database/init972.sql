CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(255) NOT NULL,
  review TEXT NOT NULL,
  rating INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO reviews (product_name, review, rating) VALUES ('Product 1', 'This is a great product.', 4);
INSERT INTO reviews (product_name, review, rating) VALUES ('Product 2', 'Not worth the money.', 2);
INSERT INTO reviews (product_name, review, rating) VALUES ('Product 3', 'Highly recommended!', 5);
INSERT INTO reviews (product_name, review, rating) VALUES ('Product 4', 'Average product, nothing special.', 3);
INSERT INTO reviews (product_name, review, rating) VALUES ('Product 5', 'Great value for the price.', 4);
INSERT INTO reviews (product_name, review, rating) VALUES ('Product 6', 'Decent performance overall.', 3);
INSERT INTO reviews (product_name, review, rating) VALUES ('Product 7', 'Impressive features and design.', 5);
INSERT INTO reviews (product_name, review, rating) VALUES ('Product 8', 'Doesn\'t meet expectations.', 2);
INSERT INTO reviews (product_name, review, rating) VALUES ('Product 9', 'Good quality build.', 4);
INSERT INTO reviews (product_name, review, rating) VALUES ('Product 10', 'Disappointing experience.', 1);
