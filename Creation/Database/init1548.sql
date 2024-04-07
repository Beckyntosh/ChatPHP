CREATE TABLE IF NOT EXISTS Fleet (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
vehicle_name VARCHAR(50) NOT NULL,
maintenance_schedule DATE NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('2023 Ford Transit', '2023-01-01');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('Ford Mustang', '2023-02-15');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('Chevrolet Silverado', '2023-03-30');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('Toyota Camry', '2023-05-10');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('Honda Civic', '2023-07-20');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('Nissan Altima', '2023-09-01');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('Tesla Model 3', '2023-10-15');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('Audi A4', '2023-11-30');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('BMW X5', '2023-12-10');
INSERT INTO Fleet (vehicle_name, maintenance_schedule) VALUES ('Mercedes-Benz E-Class', '2023-12-31');
