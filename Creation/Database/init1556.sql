CREATE TABLE fleet_vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicleName VARCHAR(100) NOT NULL,
    maintenanceDate DATE NOT NULL
);

INSERT INTO fleet_vehicles (vehicleName, maintenanceDate) VALUES ('2023 Ford Transit', '2023-10-15');
INSERT INTO fleet_vehicles (vehicleName, maintenanceDate) VALUES ('2022 Toyota Camry', '2023-01-20');
INSERT INTO fleet_vehicles (vehicleName, maintenanceDate) VALUES ('2023 Honda Civic', '2023-02-28');
INSERT INTO fleet_vehicles (vehicleName, maintenanceDate) VALUES ('2021 Chevrolet Silverado', '2023-05-10');
INSERT INTO fleet_vehicles (vehicleName, maintenanceDate) VALUES ('2022 Tesla Model 3', '2023-03-15');
INSERT INTO fleet_vehicles (vehicleName, maintenanceDate) VALUES ('2023 Subaru Outback', '2023-04-30');
INSERT INTO fleet_vehicles (vehicleName, maintenanceDate) VALUES ('2022 BMW X5', '2023-06-25');
INSERT INTO fleet_vehicles (vehicleName, maintenanceDate) VALUES ('2023 Mercedes-Benz Sprinter', '2023-07-12');
INSERT INTO fleet_vehicles (vehicleName, maintenanceDate) VALUES ('2021 Ford F-150', '2023-08-20');
INSERT INTO fleet_vehicles (vehicleName, maintenanceDate) VALUES ('2022 Nissan Rogue', '2023-09-05');
