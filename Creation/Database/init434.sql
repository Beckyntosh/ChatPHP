CREATE TABLE IF NOT EXISTS travel_footprint (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
transport_mode VARCHAR(30) NOT NULL,
distance FLOAT NOT NULL,
carbon_footprint FLOAT NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS household_footprint (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
energy_consumption FLOAT NOT NULL,
carbon_footprint FLOAT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO travel_footprint (transport_mode, distance, carbon_footprint, reg_date) VALUES ('Car', 50.5, 10.605, NOW());
INSERT INTO travel_footprint (transport_mode, distance, carbon_footprint, reg_date) VALUES ('Bus', 30.2, 6.342, NOW());
INSERT INTO travel_footprint (transport_mode, distance, carbon_footprint, reg_date) VALUES ('Train', 75.9, 15.939, NOW());
INSERT INTO travel_footprint (transport_mode, distance, carbon_footprint, reg_date) VALUES ('Bike', 5.3, 1.113, NOW());
INSERT INTO travel_footprint (transport_mode, distance, carbon_footprint, reg_date) VALUES ('Walking', 2.1, 0.441, NOW());
INSERT INTO travel_footprint (transport_mode, distance, carbon_footprint, reg_date) VALUES ('Motorcycle', 20.8, 4.368, NOW());
INSERT INTO travel_footprint (transport_mode, distance, carbon_footprint, reg_date) VALUES ('Electric car', 45.6, 9.576, NOW());
INSERT INTO travel_footprint (transport_mode, distance, carbon_footprint, reg_date) VALUES ('Scooter', 8.7, 1.827, NOW());
INSERT INTO travel_footprint (transport_mode, distance, carbon_footprint, reg_date) VALUES ('Subway', 35.4, 7.434, NOW());
INSERT INTO travel_footprint (transport_mode, distance, carbon_footprint, reg_date) VALUES ('Plane', 500.3, 105.363, NOW());

INSERT INTO household_footprint (energy_consumption, carbon_footprint, reg_date) VALUES (200.5, 46.830, NOW());
INSERT INTO household_footprint (energy_consumption, carbon_footprint, reg_date) VALUES (150.2, 35.017, NOW());
INSERT INTO household_footprint (energy_consumption, carbon_footprint, reg_date) VALUES (180.9, 42.237, NOW());
INSERT INTO household_footprint (energy_consumption, carbon_footprint, reg_date) VALUES (300.3, 69.962, NOW());
INSERT INTO household_footprint (energy_consumption, carbon_footprint, reg_date) VALUES (250.6, 58.538, NOW());
INSERT INTO household_footprint (energy_consumption, carbon_footprint, reg_date) VALUES (280.1, 65.445, NOW());
INSERT INTO household_footprint (energy_consumption, carbon_footprint, reg_date) VALUES (220.8, 51.469, NOW());
INSERT INTO household_footprint (energy_consumption, carbon_footprint, reg_date) VALUES (190.7, 44.476, NOW());
INSERT INTO household_footprint (energy_consumption, carbon_footprint, reg_date) VALUES (270.4, 63.106, NOW());
INSERT INTO household_footprint (energy_consumption, carbon_footprint, reg_date) VALUES (320.9, 74.931, NOW());
