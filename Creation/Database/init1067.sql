CREATE TABLE IF NOT EXISTS service_ratings (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
customer_name VARCHAR(255) NOT NULL,
rating INT(11) NOT NULL,
feedback TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO service_ratings (customer_name, rating, feedback) VALUES ('John Doe', 4, 'Great service overall');
INSERT INTO service_ratings (customer_name, rating, feedback) VALUES ('Jane Smith', 5, 'Excellent customer support');
INSERT INTO service_ratings (customer_name, rating, feedback) VALUES ('Michael Johnson', 3, 'Average experience, can improve');
INSERT INTO service_ratings (customer_name, rating, feedback) VALUES ('Sarah Davis', 2, 'Not satisfied with the service');
INSERT INTO service_ratings (customer_name, rating, feedback) VALUES ('Chris Wilson', 5, 'Amazing interaction with the team');
INSERT INTO service_ratings (customer_name, rating, feedback) VALUES ('Emily Thomas', 4, 'Prompt and helpful service');
INSERT INTO service_ratings (customer_name, rating, feedback) VALUES ('David Brown', 1, 'Terrible experience, no help at all');
INSERT INTO service_ratings (customer_name, rating, feedback) VALUES ('Jennifer Martinez', 3, 'Fairly good service');
INSERT INTO service_ratings (customer_name, rating, feedback) VALUES ('Robert Taylor', 5, 'Best support I have ever received');
INSERT INTO service_ratings (customer_name, rating, feedback) VALUES ('Amanda White', 4, 'Satisfactory assistance provided');
