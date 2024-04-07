CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(30) NOT NULL,
    care_schedule TEXT NOT NULL,
    reg_date TIMESTAMP
);

-- Inserting values into table
INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water every 2 days');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose bushes', 'Prune once a month');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Sunlight every day');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil', 'Harvest leaves weekly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulents', 'Water sparingly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchids', 'Mist regularly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Peppers', 'Fertilize bi-weekly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cacti', 'Minimal water');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Sunflowers', 'Support stems as they grow');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Pumpkins', 'Space plants apart');

