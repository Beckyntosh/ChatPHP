CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(50) NOT NULL,
care_schedule TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato', 'Water daily. Fertilize weekly.');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose', 'Prune monthly. Water every other day.');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Sunlight daily. Water sparingly.');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil', 'Harvest leaves regularly. Water every 2 days.');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus', 'Minimal water. Sunlight exposure.');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchid', 'Humid environment. Intermittent watering.');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulent', 'Infrequent watering. Bright light.');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Fern', 'Humid soil. Indirect light.');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Daisy', 'Regular deadheading. Watering as needed.');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Mint', 'Regular harvesting. Water frequently.');