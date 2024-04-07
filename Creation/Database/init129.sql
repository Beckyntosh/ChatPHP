-- init.sql

CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

CREATE TABLE financial_reports (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    quarter VARCHAR(10),
    year INT,
    revenue BIGINT,
    profit BIGINT,
    industry VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO financial_reports (company_name, quarter, year, revenue, profit, industry) VALUES
('Digital Dimensions', 'Q2', 2023, 120000000, 30000000, 'tech'),
('Pixel Pioneers', 'Q2', 2023, 95000000, 20000000, 'tech'),
('Code Crafters', 'Q2', 2023, 75000000, 15000000, 'tech'),
('Tech Titans', 'Q2', 2023, 500000000, 120000000, 'tech'),
('Innovation Inc.', 'Q2', 2023, 300000000, 75000000, 'tech'),
('Gadget Giants', 'Q2', 2023, 200000000, 50000000, 'tech'),
('Software Solutions', 'Q2', 2023, 100000000, 25000000, 'tech'),
('Hardware Heroes', 'Q2', 2023, 150000000, 40000000, 'tech'),
('Virtual Ventures', 'Q2', 2023, 110000000, 27000000, 'tech'),
('Cloud Creators', 'Q2', 2023, 130000000, 33000000, 'tech');
