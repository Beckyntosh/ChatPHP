CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
care_schedule TEXT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water daily, fertilize every 2 weeks');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose bush', 'Prune biweekly, water every 3 days');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Sunlight needed, water sparingly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus', 'Minimal watering, sunlight required');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil plant', 'Water daily, trim every week');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulent', 'Water monthly, indirect sunlight');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Peace lily', 'Regular watering, keep moist');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Snake plant', 'Low maintenance, indirect sunlight');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Fiddle leaf fig', 'Moderate watering, direct sunlight');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Spider plant', 'Keep soil moist, indirect sunlight');
