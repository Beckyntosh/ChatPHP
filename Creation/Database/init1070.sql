CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    review TEXT NOT NULL,
    rating INT(1) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO reviews (destination, review, rating) VALUES ('Paris', 'Amazing city with rich history', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Tokyo', 'Incredible food and culture', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('New York', 'Never sleeps, so much to explore', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Barcelona', 'Beautiful architecture and beaches', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Dubai', 'Luxurious and futuristic city', 3);
INSERT INTO reviews (destination, review, rating) VALUES ('Machu Picchu', 'Breathtaking views and ancient ruins', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Sydney', 'Vibrant city with stunning landmarks', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Santorini', 'Picturesque island with stunning sunsets', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Cape Town', 'Diverse culture and natural beauty', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Kyoto', 'Serene temples and gardens', 5);
