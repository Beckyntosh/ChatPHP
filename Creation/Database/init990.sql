CREATE TABLE IF NOT EXISTS service_rating (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
customer_name VARCHAR(50) NOT NULL,
service_type ENUM('online', 'in-store') NOT NULL,
rating INT(1) NOT NULL,
comments TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO service_rating (customer_name, service_type, rating, comments) VALUES ('John Doe', 'online', 5, 'Great service overall');
INSERT INTO service_rating (customer_name, service_type, rating, comments) VALUES ('Jane Smith', 'in-store', 4, 'Helpful staff');
INSERT INTO service_rating (customer_name, service_type, rating, comments) VALUES ('Alice Johnson', 'online', 3, 'Could improve response time');
INSERT INTO service_rating (customer_name, service_type, rating, comments) VALUES ('Bob Roberts', 'in-store', 5, 'Excellent experience');
INSERT INTO service_rating (customer_name, service_type, rating, comments) VALUES ('Emily Davis', 'online', 2, 'Disappointed with service');
INSERT INTO service_rating (customer_name, service_type, rating, comments) VALUES ('Michael Wilson', 'in-store', 4, 'Friendly staff');
INSERT INTO service_rating (customer_name, service_type, rating, comments) VALUES ('Sarah Brown', 'online', 5, 'Impressed with assistance');
INSERT INTO service_rating (customer_name, service_type, rating, comments) VALUES ('Alex Garcia', 'in-store', 3, 'Average service');
INSERT INTO service_rating (customer_name, service_type, rating, comments) VALUES ('Olivia Rodriguez', 'online', 4, 'Responsive support');
INSERT INTO service_rating (customer_name, service_type, rating, comments) VALUES ('William Martinez', 'in-store', 1, 'Unsatisfactory experience');
