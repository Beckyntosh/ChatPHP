CREATE TABLE IF NOT EXISTS customer_reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  rating INT(1) NOT NULL,
  feedback TEXT DEFAULT NULL,
  review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO customer_reviews (rating, feedback) VALUES (5, 'Great service, very helpful staff');
INSERT INTO customer_reviews (rating, feedback) VALUES (4, 'Good experience overall');
INSERT INTO customer_reviews (rating, feedback) VALUES (3, 'Average service, could be better');
INSERT INTO customer_reviews (rating, feedback) VALUES (5, 'Excellent support from the team');
INSERT INTO customer_reviews (rating, feedback) VALUES (2, 'Poor response, needs improvement');
INSERT INTO customer_reviews (rating, feedback) VALUES (4, 'Very informative assistance provided');
INSERT INTO customer_reviews (rating, feedback) VALUES (5, 'Top-notch customer service');
INSERT INTO customer_reviews (rating, feedback) VALUES (3, 'Satisfactory experience');
INSERT INTO customer_reviews (rating, feedback) VALUES (1, 'Terrible service, very dissatisfied');
INSERT INTO customer_reviews (rating, feedback) VALUES (4, 'Prompt resolution of my issue');
