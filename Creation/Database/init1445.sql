CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(30) NOT NULL,
    care_schedule VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water every 2 days');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose bush', 'Prune monthly and fertilize bi-weekly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender', 'Trim after flowering season');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil plant', 'Keep soil moist and provide sunlight');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus', 'Water sparingly once a month');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Snake plant', 'Water sparingly and provide indirect light');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Aloe vera', 'Water once every 2 weeks');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Mint plant', 'Keep in shade and prune regularly');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchid', 'Mist to maintain humidity');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Fern', 'Keep soil moist and mist leaves occasionally');