CREATE TABLE IF NOT EXISTS fleet_vehicles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
model VARCHAR(30) NOT NULL,
next_maintenance DATE NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO fleet_vehicles (model, next_maintenance) VALUES ('2023 Ford Transit', '2023-10-25');
INSERT INTO fleet_vehicles (model, next_maintenance) VALUES ('2022 Chevy Tahoe', '2023-01-15');
INSERT INTO fleet_vehicles (model, next_maintenance) VALUES ('2021 Toyota Camry', '2022-09-30');
INSERT INTO fleet_vehicles (model, next_maintenance) VALUES ('2023 Honda Civic', '2023-03-20');
INSERT INTO fleet_vehicles (model, next_maintenance) VALUES ('2020 Nissan Altima', '2022-07-12');
INSERT INTO fleet_vehicles (model, next_maintenance) VALUES ('2022 Ford F-150', '2023-05-01');
INSERT INTO fleet_vehicles (model, next_maintenance) VALUES ('2023 Jeep Wrangler', '2023-08-28');
INSERT INTO fleet_vehicles (model, next_maintenance) VALUES ('2022 Subaru Outback', '2022-11-10');
INSERT INTO fleet_vehicles (model, next_maintenance) VALUES ('2021 Hyundai Sonata', '2022-04-05');
INSERT INTO fleet_vehicles (model, next_maintenance) VALUES ('2023 GMC Sierra', '2023-01-30');