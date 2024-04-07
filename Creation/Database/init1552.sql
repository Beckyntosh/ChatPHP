CREATE TABLE IF NOT EXISTS Fleet (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
vehicle_name VARCHAR(50) NOT NULL,
maintenance_schedule VARCHAR(100) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('2023 Ford Transit', 'Every 6 Months');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('2022 Chevy Silverado', 'Every 3 Months');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('2021 Toyota Corolla', 'Every 9 Months');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('2020 Honda Civic', 'Every 4 Months');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('2019 Ford Escape', 'Every 12 Months');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('2018 Nissan Altima', 'Every 8 Months');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('2017 Toyota Tacoma', 'Every 5 Months');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('2016 Honda Accord', 'Every 10 Months');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('2015 Chevy Equinox', 'Every 7 Months');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('2014 Ford F-150', 'Every 11 Months');