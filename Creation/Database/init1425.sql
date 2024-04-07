CREATE TABLE IF NOT EXISTS plants (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plant_name VARCHAR(30) NOT NULL,
care_schedule TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water every 2 days, fertilize once a week');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose bush', 'Prune every spring, water twice a week');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Trim after blooming, full sun');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil', 'Water daily, pinch off flowers');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Sunflowers', 'Plant in full sun, water deeply once a week');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus', 'Water sparingly, provide well-draining soil');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchid', 'Mist regularly, keep in indirect light');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Fern', 'Keep soil moist, high humidity');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Tulips', 'Plant in fall for spring blooms, deadhead flowers');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulents', 'Allow soil to dry out between waterings, full sun');
