CREATE TABLE IF NOT EXISTS vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vehicle_name VARCHAR(50) NOT NULL,
    maintenance_schedule DATE NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO vehicles (vehicle_name, maintenance_schedule) VALUES ('2023 Ford Transit', '2023-10-15');
INSERT INTO vehicles (vehicle_name, maintenance_schedule) VALUES ('2022 Toyota Camry', '2022-09-20');
INSERT INTO vehicles (vehicle_name, maintenance_schedule) VALUES ('2021 Honda Civic', '2021-08-25');
INSERT INTO vehicles (vehicle_name, maintenance_schedule) VALUES ('2020 Tesla Model S', '2020-07-30');
INSERT INTO vehicles (vehicle_name, maintenance_schedule) VALUES ('2019 Chevrolet Silverado', '2019-06-05');
INSERT INTO vehicles (vehicle_name, maintenance_schedule) VALUES ('2018 Subaru Outback', '2018-05-10');
INSERT INTO vehicles (vehicle_name, maintenance_schedule) VALUES ('2017 Ford Escape', '2017-04-15');
INSERT INTO vehicles (vehicle_name, maintenance_schedule) VALUES ('2016 BMW X5', '2016-03-20');
INSERT INTO vehicles (vehicle_name, maintenance_schedule) VALUES ('2015 Audi A4', '2015-02-25');
INSERT INTO vehicles (vehicle_name, maintenance_schedule) VALUES ('2014 Mercedes-Benz E-Class', '2014-01-30');
