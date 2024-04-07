-- init.sql

CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

CREATE TABLE job_listings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    type VARCHAR(100),
    description TEXT,
    posted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO job_listings (title, type, description) VALUES
('Toy Designer', 'full-time', 'Seeking a creative toy designer to develop new toy concepts.'),
('Software Developer for Educational Games', 'remote', 'Develop innovative software for educational toys and games.'),
('Sales Representative', 'part-time', 'Part-time sales rep needed for toy sales.'),
('Customer Support Specialist', 'remote', 'Provide remote customer support for our toy products.'),
('Marketing Manager', 'full-time', 'Lead our marketing efforts in the toy industry.'),
('Toy Fabrication Specialist', 'full-time', 'Expert in toy fabrication and design.'),
('Quality Assurance Tester', 'part-time', 'Test toys for safety and quality.'),
('Retail Store Manager', 'full-time', 'Manage our flagship toy store.'),
('E-commerce Analyst', 'remote', 'Analyze sales and trends in our online toy store.'),
('Toy Historian', 'part-time', 'Part-time position studying and documenting the history of toys.');
