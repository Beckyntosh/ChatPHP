CREATE TABLE IF NOT EXISTS plants (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    plant_name VARCHAR(50) NOT NULL,
    care_schedule VARCHAR(250),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO plants (plant_name, care_schedule) VALUES ('Tomato plants', 'Water every 2 days');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Rose bush', 'Prune every 4 weeks');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Lavender plant', 'Sunlight for 6 hours');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Basil plant', 'Water when top soil is dry');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Succulent', 'Water sparingly once a week');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Fern', 'Mist leaves daily');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Orchid', 'Place in indirect sunlight');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Spider plant', 'Keep soil moist');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Cactus', 'Water every 2 weeks');
INSERT INTO plants (plant_name, care_schedule) VALUES ('Mint plant', 'Prune regularly to encourage growth');