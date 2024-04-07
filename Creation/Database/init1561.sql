CREATE TABLE IF NOT EXISTS fleet_vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    vehicle_name VARCHAR(50) NOT NULL,
    maintenance_schedule DATE NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO fleet_vehicles (vehicle_name, maintenance_schedule)
VALUES ('2023 Ford Transit', '2023-01-01'),
       ('2019 Chevrolet Malibu', '2021-05-15'),
       ('2020 Toyota Camry', '2022-03-20'),
       ('2018 Honda Civic', '2021-11-10'),
       ('2022 Nissan Altima', '2023-02-28'),
       ('2017 Ford Explorer', '2020-09-10'),
       ('2016 Toyota Corolla', '2022-06-25'),
       ('2019 Dodge Ram', '2021-08-05'),
       ('2021 Hyundai Sonata', '2022-12-15'),
       ('2015 Jeep Wrangler', '2020-04-30');