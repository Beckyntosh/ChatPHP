CREATE TABLE IF NOT EXISTS TravelReviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
review TEXT NOT NULL,
rating INT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO TravelReviews (destination, review, rating) VALUES ('Paris', 'Beautiful city with amazing architecture', 5);
INSERT INTO TravelReviews (destination, review, rating) VALUES ('Tokyo', 'Incredible food and culture', 4);
INSERT INTO TravelReviews (destination, review, rating) VALUES ('New York', 'The city that never sleeps', 4);
INSERT INTO TravelReviews (destination, review, rating) VALUES ('Sydney', 'Breath-taking views and friendly people', 5);
INSERT INTO TravelReviews (destination, review, rating) VALUES ('Rome', 'Rich history and delicious food', 4);
INSERT INTO TravelReviews (destination, review, rating) VALUES ('Dubai', 'Luxurious experience with modern amenities', 5);
INSERT INTO TravelReviews (destination, review, rating) VALUES ('London', 'Iconic landmarks and vibrant nightlife', 4);
INSERT INTO TravelReviews (destination, review, rating) VALUES ('Cancun', 'Beautiful beaches and fun activities', 5);
INSERT INTO TravelReviews (destination, review, rating) VALUES ('Amsterdam', 'Charming canals and friendly locals', 4);
INSERT INTO TravelReviews (destination, review, rating) VALUES ('Barcelona', 'Artistic vibes and delicious tapas', 5);
