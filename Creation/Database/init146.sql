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
('Creative Coding Corp', 'Q2', 2023, 200000000, 50000000, 'tech'),
('Pixel Painters Ltd.', 'Q2', 2023, 150000000, 40000000, 'tech'),
('Vector Visionaries Inc.', 'Q2', 2023, 120000000, 30000000, 'tech'),
('Innovative Ink LLC', 'Q2', 2023, 180000000, 45000000, 'tech'),
('Brushstroke Bots Co.', 'Q2', 2023, 210000000, 55000000, 'tech'),
('Palette Programmers Ltd.', 'Q2', 2023, 160000000, 42000000, 'tech'),
('Sculpture Systems Inc.', 'Q2', 2023, 190000000, 48000000, 'tech'),
('Canvas Coders LLC', 'Q2', 2023, 170000000, 43000000, 'tech'),
('Artificial Artists Co.', 'Q2', 2023, 220000000, 57000000, 'tech'),
('Digital Designers Ltd.', 'Q2', 2023, 140000000, 35000000, 'tech');
