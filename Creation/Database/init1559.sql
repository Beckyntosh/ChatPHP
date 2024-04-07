CREATE TABLE IF NOT EXISTS FleetVehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
vehicleName VARCHAR(50) NOT NULL,
maintenanceSchedule VARCHAR(255) NOT NULL
);

INSERT INTO FleetVehicles (vehicleName, maintenanceSchedule) VALUES ('2023 Ford Transit', 'Every 10,000 miles');
INSERT INTO FleetVehicles (vehicleName, maintenanceSchedule) VALUES ('2022 Toyota Camry', 'Every 5,000 miles');
INSERT INTO FleetVehicles (vehicleName, maintenanceSchedule) VALUES ('2019 Honda Civic', 'Every 7,500 miles');
INSERT INTO FleetVehicles (vehicleName, maintenanceSchedule) VALUES ('2021 Chevrolet Silverado', 'Every 8,000 miles');
INSERT INTO FleetVehicles (vehicleName, maintenanceSchedule) VALUES ('2020 Volkswagen Jetta', 'Every 6,000 miles');
INSERT INTO FleetVehicles (vehicleName, maintenanceSchedule) VALUES ('2018 Ford Fusion', 'Every 9,000 miles');
INSERT INTO FleetVehicles (vehicleName, maintenanceSchedule) VALUES ('2022 Nissan Altima', 'Every 7,000 miles');
INSERT INTO FleetVehicles (vehicleName, maintenanceSchedule) VALUES ('2023 Hyundai Sonata', 'Every 8,500 miles');
INSERT INTO FleetVehicles (vehicleName, maintenanceSchedule) VALUES ('2021 Kia Sorento', 'Every 10,000 miles');
INSERT INTO FleetVehicles (vehicleName, maintenanceSchedule) VALUES ('2020 Subaru Outback', 'Every 5,000 miles');
