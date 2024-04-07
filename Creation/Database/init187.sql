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
('Gemstone Tech', 'Q2', 2023, 250000000, 75000000, 'tech'),
('Diamond Data', 'Q2', 2023, 300000000, 90000000, 'tech'),
('Ruby Records', 'Q2', 2023, 150000000, 45000000, 'tech'),
('Opal Operations', 'Q2', 2023, 200000000, 60000000, 'tech'),
('Sapphire Systems', 'Q2', 2023, 180000000, 54000000, 'tech'),
('Emerald Engineering', 'Q2', 2023, 220000000, 66000000, 'tech'),
('Topaz Tech', 'Q2', 2023, 190000000, 57000000, 'tech'),
('Quartz Quality', 'Q2', 2023, 210000000, 63000000, 'tech'),
('Jade Journeys', 'Q2', 2023, 170000000, 51000000, 'tech'),
('Pearl Programming', 'Q2', 2023, 160000000, 48000000, 'tech');
