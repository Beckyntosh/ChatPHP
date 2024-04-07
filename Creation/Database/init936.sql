
CREATE TABLE IF NOT EXISTS reviews (
  id INT AUTO_INCREMENT PRIMARY KEY,
  destination VARCHAR(255) NOT NULL,
  review TEXT NOT NULL,
  rating INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO reviews (destination, review, rating) VALUES ('Paris', 'Beautiful city with amazing landmarks', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Tokyo', 'Incredible food and culture', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('New York', 'The city that never sleeps', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Sydney', 'Stunning harbor and beaches', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Dubai', 'Luxury shopping and futuristic architecture', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Rome', 'Rich history and delicious cuisine', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Cancun', 'Beautiful beaches and vibrant nightlife', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Bali', 'Perfect for relaxation and nature', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Barcelona', 'Unique architecture and lively atmosphere', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Venice', 'Romantic canals and charming streets', 5);
