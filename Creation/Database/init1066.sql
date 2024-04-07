CREATE TABLE service_ratings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    rating INT(1) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO service_ratings (rating, comment) VALUES (5, 'Excellent service');
INSERT INTO service_ratings (rating, comment) VALUES (4, 'Very good support');
INSERT INTO service_ratings (rating, comment) VALUES (3, 'Good experience overall');
INSERT INTO service_ratings (rating, comment) VALUES (2, 'Fair service quality');
INSERT INTO service_ratings (rating, comment) VALUES (1, 'Poor response time');
INSERT INTO service_ratings (rating, comment) VALUES (5, 'Outstanding customer service');
INSERT INTO service_ratings (rating, comment) VALUES (4, 'Helpful and friendly staff');
INSERT INTO service_ratings (rating, comment) VALUES (3, 'Average support assistance');
INSERT INTO service_ratings (rating, comment) VALUES (2, 'Not satisfied with the service');
INSERT INTO service_ratings (rating, comment) VALUES (1, 'Disappointing experience with support team');