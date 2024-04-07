CREATE TABLE IF NOT EXISTS ServiceRatings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
customer_id INT(6) UNSIGNED NOT NULL,
service_type VARCHAR(30) NOT NULL,
rating INT(1) NOT NULL,
comments TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO ServiceRatings (customer_id, service_type, rating, comments) VALUES (1, 'Online', 5, 'Great service!');
INSERT INTO ServiceRatings (customer_id, service_type, rating, comments) VALUES (2, 'In-Store', 4, 'Helpful staff.');
INSERT INTO ServiceRatings (customer_id, service_type, rating, comments) VALUES (3, 'Online', 3, 'Could be better.');
INSERT INTO ServiceRatings (customer_id, service_type, rating, comments) VALUES (4, 'In-Store', 5, 'Amazing experience.');
INSERT INTO ServiceRatings (customer_id, service_type, rating, comments) VALUES (5, 'Online', 2, 'Disappointing.');
INSERT INTO ServiceRatings (customer_id, service_type, rating, comments) VALUES (6, 'In-Store', 4, 'Good service overall.');
INSERT INTO ServiceRatings (customer_id, service_type, rating, comments) VALUES (7, 'Online', 5, 'Very satisfied!');
INSERT INTO ServiceRatings (customer_id, service_type, rating, comments) VALUES (8, 'In-Store', 3, 'Could improve.');
INSERT INTO ServiceRatings (customer_id, service_type, rating, comments) VALUES (9, 'Online', 4, 'Happy with the service.');
INSERT INTO ServiceRatings (customer_id, service_type, rating, comments) VALUES (10, 'In-Store', 5, 'Top-notch customer service.');