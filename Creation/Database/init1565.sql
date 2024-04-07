CREATE TABLE fleet_vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_name VARCHAR(255) NOT NULL,
    maintenance_schedule DATE NOT NULL
);

INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2023 Ford Transit', '2023-12-31');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2019 Toyota Camry', '2023-09-30');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2021 Honda Civic', '2024-02-28');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2017 Ford F-150', '2023-11-15');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2020 Chevrolet Tahoe', '2024-01-20');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2018 Nissan Altima', '2023-07-05');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2016 Toyota Prius', '2023-10-10');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2022 Honda Accord', '2024-03-05');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2015 Ford Explorer', '2023-08-25');
INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule) VALUES ('2019 Chevrolet Silverado', '2024-02-10');