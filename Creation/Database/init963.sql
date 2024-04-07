CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
restaurant_name VARCHAR(50) NOT NULL,
reviewer_name VARCHAR(50),
quality_rating INT(1),
service_rating INT(1),
ambiance_rating INT(1),
comment TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO reviews (restaurant_name, reviewer_name, quality_rating, service_rating, ambiance_rating, comment) VALUES
('Restaurant A', 'Alice', 4, 3, 5, 'Great experience overall'),
('Restaurant B', 'Bob', 5, 4, 2, 'Service could be better'),
('Restaurant C', 'Charlie', 3, 5, 4, 'Amazing food!'),
('Restaurant D', 'David', 2, 1, 3, 'Disappointing service'),
('Restaurant E', 'Emily', 4, 4, 4, 'Nice ambiance'),
('Restaurant F', 'Frank', 5, 3, 5, 'Highly recommend this place'),
('Restaurant G', 'Grace', 3, 2, 1, 'Food was average'),
('Restaurant H', 'Henry', 1, 1, 1, 'Terrible experience'),
('Restaurant I', 'Isabel', 4, 5, 4, 'Top-notch service'),
('Restaurant J', 'Jack', 2, 3, 2, 'Could improve overall');
