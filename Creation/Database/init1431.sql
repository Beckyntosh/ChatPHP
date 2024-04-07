CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(30) NOT NULL,
    care_schedule VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato', 'Water twice a week');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose', 'Prune once a month');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Sunlight for 6 hours a day');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil', 'Fertilize every 2 weeks');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulent', 'Water sparingly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Mint', 'Keep soil moist');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus', 'Avoid overwatering');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Sunflower', 'Full sun required');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchid', 'Humidity is important');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Fern', 'Keep in indirect light');
