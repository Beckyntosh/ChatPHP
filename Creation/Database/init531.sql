CREATE TABLE IF NOT EXISTS vehicles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(30) NOT NULL,
    model VARCHAR(30) NOT NULL,
    year YEAR(4),
    maintenance_schedule VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO vehicles (make, model, year, maintenance_schedule) VALUES
('Ford', 'Transit', 2023, 'Every 10,000 miles or annually'),
('Chevrolet', 'Silverado', 2022, 'Every 5,000 miles'),
('Toyota', 'Camry', 2021, 'Every 8,000 miles'),
('Honda', 'Accord', 2020, 'Every 7,000 miles'),
('Nissan', 'Altima', 2019, 'Every 6,000 miles'),
('BMW', 'X5', 2018, 'Every 10,000 miles'),
('Hyundai', 'Elantra', 2017, 'Every 7,500 miles'),
('Mercedes-Benz', 'S-Class', 2016, 'Every 12,000 miles'),
('Audi', 'A4', 2015, 'Every 9,000 miles'),
('Kia', 'Soul', 2014, 'Every 5,500 miles');
