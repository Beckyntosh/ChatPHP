CREATE TABLE IF NOT EXISTS fleet (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
vehicle_name VARCHAR(30) NOT NULL,
maintenance_schedule DATE NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2023 Ford Transit', '2023-10-15');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2022 Toyota Camry', '2022-09-20');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2023 Honda Civic', '2023-11-30');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2019 Chevrolet Silverado', '2021-05-25');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2022 Subaru Outback', '2022-10-10');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2018 Ford Explorer', '2022-01-15');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2023 Tesla Model S', '2023-12-05');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2021 GMC Sierra', '2022-08-20');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2020 Hyundai Elantra', '2022-04-28');
INSERT INTO fleet (vehicle_name, maintenance_schedule) VALUES ('2022 Jeep Wrangler', '2022-11-15');
