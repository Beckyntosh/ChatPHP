CREATE TABLE IF NOT EXISTS FleetVehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
vehicle_name VARCHAR(50) NOT NULL,
maintenance_schedule DATE NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO FleetVehicles (vehicle_name, maintenance_schedule) VALUES ('2023 Ford Transit', '2023-01-01');
INSERT INTO FleetVehicles (vehicle_name, maintenance_schedule) VALUES ('2021 Toyota Camry', '2022-03-15');
INSERT INTO FleetVehicles (vehicle_name, maintenance_schedule) VALUES ('2022 Chevrolet Silverado', '2023-05-20');
INSERT INTO FleetVehicles (vehicle_name, maintenance_schedule) VALUES ('2019 Honda Civic', '2022-06-10');
INSERT INTO FleetVehicles (vehicle_name, maintenance_schedule) VALUES ('2020 Ford F-150', '2023-07-25');
INSERT INTO FleetVehicles (vehicle_name, maintenance_schedule) VALUES ('2022 BMW X5', '2023-08-30');
INSERT INTO FleetVehicles (vehicle_name, maintenance_schedule) VALUES ('2018 Mercedes-Benz E-Class', '2022-10-07');
INSERT INTO FleetVehicles (vehicle_name, maintenance_schedule) VALUES ('2023 Tesla Model Y', '2023-11-15');
INSERT INTO FleetVehicles (vehicle_name, maintenance_schedule) VALUES ('2022 Audi Q7', '2023-12-20');
INSERT INTO FleetVehicles (vehicle_name, maintenance_schedule) VALUES ('2021 Jeep Wrangler', '2022-09-05');
