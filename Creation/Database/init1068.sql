CREATE TABLE IF NOT EXISTS reviews (
        id INT AUTO_INCREMENT PRIMARY KEY,
        destination VARCHAR(255),
        review TEXT,
        rating INT,
        date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
INSERT INTO reviews (destination, review, rating) VALUES ('Paris', 'Beautiful city with amazing landmarks', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Tokyo', 'Unique culture and delicious food', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Bali', 'Relaxing beaches and stunning sunsets', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Rome', 'Rich history and incredible architecture', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('New York City', 'Never-ending excitement and diverse neighborhoods', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Sydney', 'Beautiful harbor and friendly locals', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Dubai', 'Luxurious shopping and impressive skyscrapers', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('Barcelona', 'Vibrant city with delicious tapas', 4);
INSERT INTO reviews (destination, review, rating) VALUES ('Santorini', 'Picturesque views and romantic sunsets', 5);
INSERT INTO reviews (destination, review, rating) VALUES ('London', 'Historic sites and thriving arts scene', 4);
