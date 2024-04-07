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
('FiberTech Innovations', 'Q2', 2023, 280000000, 70000000, 'tech'),
('WovenWeb Solutions', 'Q2', 2023, 320000000, 85000000, 'tech'),
('Textile Transitions', 'Q2', 2023, 150000000, 38000000, 'tech'),
('StitchStream Technologies', 'Q2', 2023, 190000000, 47000000, 'tech'),
('PatternPulse Inc.', 'Q2', 2023, 210000000, 53000000, 'tech'),
('KnitNet Co.', 'Q2', 2023, 170000000, 42000000, 'tech'),
('FabricFusion LLC', 'Q2', 2023, 230000000, 58000000, 'tech'),
('ThreadTech Enterprises', 'Q2', 2023, 250000000, 62000000, 'tech'),
('WeaveWork Digital', 'Q2', 2023, 265000000, 66000000, 'tech'),
('ClothCode Creations', 'Q2', 2023, 275000000, 68000000, 'tech');
