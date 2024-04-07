CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_name VARCHAR(255) NOT NULL,
    model_year YEAR NOT NULL,
    maintenance_schedule TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO fleet_vehicles (vehicle_name, model_year, maintenance_schedule) VALUES ('2023 Ford Transit', 2023, 'Regular oil changes and tire rotations');
INSERT INTO fleet_vehicles (vehicle_name, model_year, maintenance_schedule) VALUES ('2019 Toyota Highlander', 2019, 'Monthly engine check and filter replacements');
INSERT INTO fleet_vehicles (vehicle_name, model_year, maintenance_schedule) VALUES ('2021 Honda Civic', 2021, 'Bi-annual brake inspections and fluid top-ups');
INSERT INTO fleet_vehicles (vehicle_name, model_year, maintenance_schedule) VALUES ('2018 Chevrolet Silverado', 2018, 'Quarterly transmission fluid changes and tire pressure checks');
INSERT INTO fleet_vehicles (vehicle_name, model_year, maintenance_schedule) VALUES ('2020 Tesla Model S', 2020, 'Annual battery health assessments and software updates');
INSERT INTO fleet_vehicles (vehicle_name, model_year, maintenance_schedule) VALUES ('2017 BMW X5', 2017, 'Monthly coolant level checks and HVAC system inspections');
INSERT INTO fleet_vehicles (vehicle_name, model_year, maintenance_schedule) VALUES ('2019 Ford Mustang', 2019, 'Bi-annual spark plug replacements and alignment checks');
INSERT INTO fleet_vehicles (vehicle_name, model_year, maintenance_schedule) VALUES ('2022 GMC Sierra', 2022, 'Quarterly brake pad inspections and fluid flushes');
INSERT INTO fleet_vehicles (vehicle_name, model_year, maintenance_schedule) VALUES ('2016 Subaru Outback', 2016, 'Regular tire rotations and oil changes');
INSERT INTO fleet_vehicles (vehicle_name, model_year, maintenance_schedule) VALUES ('2021 Jeep Wrangler', 2021, 'Annual drive belt checks and suspension system assessments');