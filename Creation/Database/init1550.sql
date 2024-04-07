CREATE TABLE IF NOT EXISTS fleet (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vehicle_name VARCHAR(50) NOT NULL,
    maintenance_schedule VARCHAR(100) NOT NULL
);

INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2023 Ford Transit', 'Every 10,000 miles');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2019 Toyota Tacoma', 'Every 5,000 miles');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2020 Honda Civic', 'Every 7,500 miles');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2018 Chevrolet Silverado', 'Every 6,000 miles');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2021 Jeep Wrangler', 'Every 8,000 miles');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2017 Ford Explorer', 'Every 5,500 miles');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2016 Toyota Camry', 'Every 6,500 miles');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2015 Honda Accord', 'Every 7,000 miles');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2022 Nissan Rogue', 'Every 9,000 miles');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2014 Chevrolet Malibu', 'Every 6,800 miles');
