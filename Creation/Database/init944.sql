CREATE TABLE IF NOT EXISTS service_ratings (
id INT AUTO_INCREMENT PRIMARY KEY,
customer_name VARCHAR(255) NOT NULL,
interaction_type ENUM('online', 'in-store') NOT NULL,
rating INT NOT NULL,
comments TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO service_ratings (customer_name, interaction_type, rating, comments)
VALUES ('John Doe', 'online', 5, 'Great service!'),
('Jane Smith', 'in-store', 4, 'Helpful staff'),
('Mike Johnson', 'online', 3, 'Could be better'),
('Sarah Williams', 'in-store', 2, 'Not satisfied'),
('Chris Brown', 'online', 5, 'Amazing experience'),
('Emily Davis', 'in-store', 1, 'Terrible service'),
('Alex Clark', 'online', 4, 'Good response time'),
('Jessica Lee', 'in-store', 3, 'Average service'),
('Kevin Nguyen', 'online', 2, 'Needs improvement'),
('Linda Martinez', 'in-store', 5, 'Exceptional service');
