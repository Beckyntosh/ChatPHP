CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
care_schedule TEXT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water every 2 days, fertilize bi-weekly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose bushes', 'Prune in spring and fall, fertilize monthly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Full sun, water every week');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil', 'Keep soil moist, harvest regularly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulents', 'Water sparingly, provide bright light');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchids', 'Humid environment, indirect light');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lemon tree', 'Water deeply, provide citrus fertilizer');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus', 'Water monthly, avoid overwatering');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Spider plant', 'Low light, water occasionally');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Snake plant', 'Low maintenance, water infrequently');
