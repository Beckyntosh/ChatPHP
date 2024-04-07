CREATE TABLE IF NOT EXISTS trips (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    hotel VARCHAR(100),
    flight VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO trips (destination, departure_date, return_date, hotel, flight)
VALUES ('Paris', '2022-05-15', '2022-05-20', 'Hotel ABC', 'Flight XYZ'),
('London', '2022-06-10', '2022-06-15', 'Hotel DEF', 'Flight UVW'),
('Tokyo', '2022-07-25', '2022-07-30', 'Hotel GHI', 'Flight RST'),
('New York', '2022-08-14', '2022-08-20', 'Hotel JKL', 'Flight MNO'),
('Sydney', '2022-09-05', '2022-09-10', 'Hotel PQR', 'Flight STU'),
('Rome', '2022-10-18', '2022-10-23', 'Hotel VWX', 'Flight YZ1'),
('Barcelona', '2022-11-09', '2022-11-15', 'Hotel 234', 'Flight 567'),
('Dubai', '2022-12-06', '2022-12-12', 'Hotel 890', 'Flight ABC2'),
('Berlin', '2023-01-17', '2023-01-22', 'Hotel DEF3', 'Flight GHI4'),
('Cape Town', '2023-02-28', '2023-03-05', 'Hotel JKL5', 'Flight MNO6');