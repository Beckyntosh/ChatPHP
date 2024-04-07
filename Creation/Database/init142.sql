-- init.sql for Gardening Tracker Application

-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

-- Create 'plants' table if it doesn't exist
CREATE TABLE IF NOT EXISTS plants (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  plant_name VARCHAR(30) NOT NULL,
  plant_type VARCHAR(30) NOT NULL,
  care_schedule VARCHAR(100) NOT NULL,
  growth_stage VARCHAR(50) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample plant data
INSERT INTO plants (plant_name, plant_type, care_schedule, growth_stage) VALUES
('Tomato', 'Vegetable', 'Water daily, fertilize weekly', 'Seedling'),
('Basil', 'Herb', 'Water every 2-3 days', 'Established'),
('Carrot', 'Root', 'Water weekly, thin seedlings', 'Germinating'),
('Lettuce', 'Leafy green', 'Water daily, partial shade', 'Harvesting'),
('Cucumber', 'Vegetable', 'Water every other day, full sun', 'Flowering'),
('Rose', 'Flower', 'Water every 2 days, prune as needed', 'Blooming'),
('Sunflower', 'Flower', 'Water weekly, full sun', 'Seedling'),
('Pepper', 'Vegetable', 'Water when soil is dry, fertilize monthly', 'Fruiting'),
('Mint', 'Herb', 'Water every 3-4 days, avoid direct sunlight', 'Established'),
('Zucchini', 'Vegetable', 'Water every other day, fertilize weekly', 'Flowering');

-- Note: Adjust the care schedule, growth stage, etc., as per real gardening advice for these plants.
