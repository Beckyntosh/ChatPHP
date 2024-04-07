CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO reviews (destination, review, rating) VALUES ('Paris', 'Amazing city with rich history', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Tokyo', 'Incredible food and culture', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('New York', 'City that never sleeps', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Rome', 'Beautiful architecture and art', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Dubai', 'Luxury experience like no other', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Sydney', 'Stunning views and friendly people', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('London', 'Mix of history and modernity', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Bali', 'Relaxing beaches and vibrant culture', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Amsterdam', 'Unique canal system and museums', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Barcelona', 'Artistic and lively city', 4);
