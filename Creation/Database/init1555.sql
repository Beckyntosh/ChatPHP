CREATE TABLE IF NOT EXISTS Fleet (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        vehicleName VARCHAR(50) NOT NULL,
        vehicleYear INT(4) NOT NULL,
        maintenanceSchedule TEXT,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO Fleet (vehicleName, vehicleYear, maintenanceSchedule) VALUES ('2023 Ford Transit', 2023, 'Monthly check on engine and tires');
INSERT INTO Fleet (vehicleName, vehicleYear, maintenanceSchedule) VALUES ('2019 Mercedes Sprinter', 2019, 'Bi-annual servicing for engine and brakes');
INSERT INTO Fleet (vehicleName, vehicleYear, maintenanceSchedule) VALUES ('2022 Chevrolet Express', 2022, 'Weekly tire pressure check');
INSERT INTO Fleet (vehicleName, vehicleYear, maintenanceSchedule) VALUES ('2018 Dodge Ram Promaster', 2018, 'Quarterly oil change and filter replacement');
INSERT INTO Fleet (vehicleName, vehicleYear, maintenanceSchedule) VALUES ('2021 Nissan NV', 2021, 'Monthly check for brake pads and fluid levels');
INSERT INTO Fleet (vehicleName, vehicleYear, maintenanceSchedule) VALUES ('2017 Ford Transit Connect', 2017, 'Annual full maintenance inspection');
INSERT INTO Fleet (vehicleName, vehicleYear, maintenanceSchedule) VALUES ('2020 Ram ProMaster City', 2020, 'Bi-weekly cleaning and interior check');
INSERT INTO Fleet (vehicleName, vehicleYear, maintenanceSchedule) VALUES ('2016 Mercedes Metris', 2016, 'Monthly check for leaks and undercarriage damage');
INSERT INTO Fleet (vehicleName, vehicleYear, maintenanceSchedule) VALUES ('2019 Toyota Sienna', 2019, 'Bi-monthly tire rotation and alignment check');
INSERT INTO Fleet (vehicleName, vehicleYear, maintenanceSchedule) VALUES ('2015 Chevrolet City Express', 2015, 'Quarterly air filter replacement and cabin cleaning');
