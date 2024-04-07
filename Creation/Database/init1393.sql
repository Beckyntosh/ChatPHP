CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(30) NOT NULL,
    productSize VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO orders (productName, productSize) VALUES 
('Wooden Dining Table', 'Custom-sized'),
('Soccer Ball', 'Medium'),
('Basketball', 'Large'),
('Tennis Racket', 'Standard'),
('Yoga Mat', 'Extra Large'),
('Running Shoes', 'US 9'),
('Swimming Goggles', 'One Size'),
('Cycling Helmet', 'Small'),
('Treadmill', 'Heavy Duty'),
('Dumbbell Set', '20 lbs');
