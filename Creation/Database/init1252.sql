CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details VARCHAR(255),
    hotel_details VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES 
('Paris', '2022-08-10', '2022-08-20', 'Flight AA123', 'Hotel ABC'),
('London', '2022-09-15', '2022-09-25', 'Flight BB456', 'Hotel XYZ'),
('Tokyo', '2023-01-05', '2023-01-15', 'Flight CC789', 'Hotel 123'),
('Sydney', '2023-04-20', '2023-05-01', 'Flight DD321', 'Hotel ZZZ'),
('New York', '2023-07-10', '2023-07-20', 'Flight EE654', 'Hotel QWE'),
('Dubai', '2024-02-14', '2024-02-25', 'Flight FF987', 'Hotel RTY'),
('Rome', '2025-06-18', '2025-06-30', 'Flight GG654', 'Hotel BNM'),
('Barcelona', '2026-11-22', '2026-12-03', 'Flight HH321', 'Hotel POI'),
('Berlin', '2027-09-07', '2027-09-15', 'Flight II963', 'Hotel LKJ'),
('Cape Town', '2028-03-30', '2028-04-10', 'Flight JJ234', 'Hotel MNB');
