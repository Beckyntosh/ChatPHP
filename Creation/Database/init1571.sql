CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    model VARCHAR(255) NOT NULL,
    year YEAR(4),
    maintenance_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO fleet_vehicles (model, year, maintenance_date) VALUES ('2023 Ford Transit', 2023, '2023-09-15');
INSERT INTO fleet_vehicles (model, year, maintenance_date) VALUES ('2022 Chevrolet Silverado', 2022, '2023-04-25');
INSERT INTO fleet_vehicles (model, year, maintenance_date) VALUES ('2021 Toyota Camry', 2021, '2023-01-10');
INSERT INTO fleet_vehicles (model, year, maintenance_date) VALUES ('2023 Tesla Model S', 2023, '2023-11-30');
INSERT INTO fleet_vehicles (model, year, maintenance_date) VALUES ('2022 Honda Civic', 2022, '2023-07-20');
INSERT INTO fleet_vehicles (model, year, maintenance_date) VALUES ('2021 Ford Mustang', 2021, '2023-07-05');
INSERT INTO fleet_vehicles (model, year, maintenance_date) VALUES ('2022 Volkswagen Jetta', 2022, '2023-02-18');
INSERT INTO fleet_vehicles (model, year, maintenance_date) VALUES ('2023 BMW X5', 2023, '2023-09-10');
INSERT INTO fleet_vehicles (model, year, maintenance_date) VALUES ('2021 Subaru Outback', 2021, '2023-04-02');
INSERT INTO fleet_vehicles (model, year, maintenance_date) VALUES ('2022 Mercedes-Benz E-Class', 2022, '2023-08-12');
