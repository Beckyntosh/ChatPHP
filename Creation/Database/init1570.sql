CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vehicle_name VARCHAR(50) NOT NULL,
    maintenance_schedule VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2023 Ford Transit', 'Every 6 months');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2021 Toyota Camry', 'Every 3 months');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2022 Honda Civic', 'Every 4 months');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2024 Chevrolet Silverado', 'Every 5 months');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2023 Dodge Challenger', 'Every 7 months');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2021 Ford Explorer', 'Every 2 months');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2022 Jeep Wrangler', 'Every 6 months');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2024 Subaru Outback', 'Every 4 months');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2023 BMW X5', 'Every 9 months');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2021 Tesla Model 3', 'Every 12 months');
