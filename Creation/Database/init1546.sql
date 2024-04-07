CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vehicle_name VARCHAR(50) NOT NULL,
    vehicle_year INT(4) NOT NULL,
    maintenance_schedule TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert 10 sample values into the fleet vehicles table
INSERT INTO fleet_vehicles (vehicle_name, vehicle_year, maintenance_schedule) VALUES
('2023 Ford Transit', 2023, 'Regular oil change every 5000 miles'),
('2022 Chevrolet Express', 2022, 'Check tire pressure every month'),
('2021 Toyota Sienna', 2021, 'Inspection every 6 months'),
('2020 Mercedes Sprinter', 2020, 'Brake check every 10000 miles'),
('2019 Nissan NV200', 2019, 'Fluid top-up every 5000 miles'),
('2018 Dodge Grand Caravan', 2018, 'Battery check every year'),
('2017 Honda Odyssey', 2017, 'Alignment check every 15000 miles'),
('2016 Ram ProMaster', 2016, 'Air filter replacement every 20000 miles'),
('2015 GMC Savana', 2015, 'Coolant flush every 2 years'),
('2014 Ford E-Series', 2014, 'Fuel system inspection every 30000 miles');
