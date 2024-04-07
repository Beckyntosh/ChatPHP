CREATE TABLE fleet_vehicles (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        model VARCHAR(30) NOT NULL,
        maintenance_schedule DATE NOT NULL
    );

INSERT INTO fleet_vehicles (model, maintenance_schedule) VALUES ('2023 Ford Transit', '2022-11-15');
INSERT INTO fleet_vehicles (model, maintenance_schedule) VALUES ('2021 Toyota Camry', '2022-12-20');
INSERT INTO fleet_vehicles (model, maintenance_schedule) VALUES ('2020 Honda Civic', '2023-01-10');
INSERT INTO fleet_vehicles (model, maintenance_schedule) VALUES ('2019 Nissan Altima', '2022-12-25');
INSERT INTO fleet_vehicles (model, maintenance_schedule) VALUES ('2023 Chevrolet Silverado', '2023-02-05');
INSERT INTO fleet_vehicles (model, maintenance_schedule) VALUES ('2022 Tesla Model S', '2022-11-30');
INSERT INTO fleet_vehicles (model, maintenance_schedule) VALUES ('2022 BMW X5', '2023-01-15');
INSERT INTO fleet_vehicles (model, maintenance_schedule) VALUES ('2023 Mercedes-Benz A-Class', '2022-12-10');
INSERT INTO fleet_vehicles (model, maintenance_schedule) VALUES ('2021 Ford Mustang', '2023-02-20');
INSERT INTO fleet_vehicles (model, maintenance_schedule) VALUES ('2020 Honda CR-V', '2022-11-25');