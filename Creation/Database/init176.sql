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
('Silky Strands Tech', 'Q2', 2023, 300000000, 75000000, 'tech'),
('Curl Innovations', 'Q2', 2023, 250000000, 50000000, 'tech'),
('Braid Bytes', 'Q2', 2023, 120000000, 30000000, 'tech'),
('Wave Makers Software', 'Q2', 2023, 150000000, 40000000, 'tech'),
('Shiny Sheen Systems', 'Q2', 2023, 200000000, 60000000, 'tech'),
('Tress Tech', 'Q2', 2023, 100000000, 25000000, 'tech'),
('Locks Logic', 'Q2', 2023, 180000000, 45000000, 'tech'),
('Follicle Futures', 'Q2', 2023, 220000000, 55000000, 'tech'),
('Glossy Gadgetry', 'Q2', 2023, 130000000, 33000000, 'tech'),
('Frizz Fighters Corp', 'Q2', 2023, 170000000, 42000000, 'tech');
