CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(50) NOT NULL,
    care_schedule VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water daily');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Prune once a month');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose bushes', 'Fertilize bi-weekly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil', 'Keep in sunlight');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Mint', 'Water every 2 days');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Sunflowers', 'Support with stakes');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Ferns', 'Spray with mist daily');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchids', 'Use orchid fertilizer monthly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Daisies', 'Deadhead regularly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cacti', 'Water sparingly');

