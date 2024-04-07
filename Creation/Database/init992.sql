CREATE TABLE service_ratings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(50) NOT NULL,
    service_type ENUM('online', 'in-store') NOT NULL,
    rating TINYINT(1) NOT NULL,
    comments TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO service_ratings (customer_name, service_type, rating, comments) VALUES ('Alice', 'online', 5, 'Great service!');
INSERT INTO service_ratings (customer_name, service_type, rating, comments) VALUES ('Bob', 'in-store', 4, 'Friendly staff.');
INSERT INTO service_ratings (customer_name, service_type, rating, comments) VALUES ('Charlie', 'online', 3, 'Could be more responsive.');
INSERT INTO service_ratings (customer_name, service_type, rating, comments) VALUES ('David', 'online', 2, 'Disappointed with the support.');
INSERT INTO service_ratings (customer_name, service_type, rating, comments) VALUES ('Eve', 'in-store', 5, 'Best customer service ever!');
INSERT INTO service_ratings (customer_name, service_type, rating, comments) VALUES ('Frank', 'online', 4, 'Good overall experience.');
INSERT INTO service_ratings (customer_name, service_type, rating, comments) VALUES ('Grace', 'in-store', 3, 'Average service, nothing special.');
INSERT INTO service_ratings (customer_name, service_type, rating, comments) VALUES ('Henry', 'online', 1, 'Terrible customer support.');
INSERT INTO service_ratings (customer_name, service_type, rating, comments) VALUES ('Isabel', 'in-store', 5, 'Exceptional assistance from the staff.');
INSERT INTO service_ratings (customer_name, service_type, rating, comments) VALUES ('Jack', 'online', 4, 'Solved my issue quickly.');