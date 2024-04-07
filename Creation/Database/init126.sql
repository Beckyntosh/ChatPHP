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
('Harmonic Tech Solutions', 'Q2', 2023, 47500000, 8700000, 'tech'),
('Melody Innovations', 'Q2', 2023, 53000000, 12500000, 'tech'),
('Rhythm Systems', 'Q2', 2023, 60000000, 14000000, 'tech'),
('Tempo Electronics', 'Q2', 2023, 32000000, 5000000, 'tech'),
('Vibrato Technologies', 'Q2', 2023, 41000000, 9500000, 'tech'),
('Bassline Digital', 'Q2', 2023, 46000000, 11000000, 'tech'),
('TrebleSoft', 'Q2', 2023, 56000000, 13000000, 'tech'),
('Synthetix Audio', 'Q2', 2023, 49000000, 12000000, 'tech'),
('EchoTech Innovations', 'Q2', 2023, 37000000, 8200000, 'tech'),
('Pitch Perfect Electronics', 'Q2', 2023, 44000000, 10800000, 'tech');
