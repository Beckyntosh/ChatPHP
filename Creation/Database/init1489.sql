CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO clients (name, email, phone) VALUES 
('Acme Corp', 'acme@example.com', '555-1234'),
('XYZ Corporation', 'xyz@example.com', '555-5678'),
('ABC Industries', 'abc@example.com', '555-9012'),
('Global Solutions', 'global@example.com', '555-3456'),
('Sunrise Enterprises', 'sunrise@example.com', '555-7890'),
('Innovate Tech', 'innovate@example.com', '555-2345'),
('Dynamic Innovations', 'dynamic@example.com', '555-6789'),
('Silver Oak Corporation', 'silver@example.com', '555-0123'),
('TechPro Solutions', 'techpro@example.com', '555-4567'),
('Swift Ventures', 'swift@example.com', '555-8901');
