CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
care_schedule TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water every 2 days');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose bushes', 'Prune every month');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Sunlight and well-drained soil');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus', 'Minimal water');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil herbs', 'Regular pruning and sunlight');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulents', 'Low water requirements');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Ferns', 'High humidity and indirect sunlight');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Pothos', 'Low light conditions');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Snake plant', 'Low maintenance and indirect light');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchids', 'Specific watering and humidity needs');
