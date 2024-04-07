CREATE TABLE IF NOT EXISTS travel_plan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE,
    return_date DATE,
    flight_details TEXT,
    hotel_details TEXT,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO travel_plan (destination, departure_date, return_date, flight_details, hotel_details)
VALUES ('Paris', '2022-08-15', '2022-08-20', 'Flight details for Paris trip', 'Hotel details for Paris trip'),
('London', '2022-09-10', '2022-09-15', 'Flight details for London trip', 'Hotel details for London trip'),
('Tokyo', '2022-10-25', '2022-11-05', 'Flight details for Tokyo trip', 'Hotel details for Tokyo trip'),
('New York', '2023-01-05', '2023-01-12', 'Flight details for New York trip', 'Hotel details for New York trip'),
('Sydney', '2023-03-20', '2023-03-25', 'Flight details for Sydney trip', 'Hotel details for Sydney trip'),
('Rome', '2023-05-10', '2023-05-15', 'Flight details for Rome trip', 'Hotel details for Rome trip'),
('Dubai', '2023-07-15', '2023-07-20', 'Flight details for Dubai trip', 'Hotel details for Dubai trip'),
('Barcelona', '2023-09-30', '2023-10-05', 'Flight details for Barcelona trip', 'Hotel details for Barcelona trip'),
('Berlin', '2024-02-10', '2024-02-15', 'Flight details for Berlin trip', 'Hotel details for Berlin trip'),
('Cape Town', '2024-04-20', '2024-04-25', 'Flight details for Cape Town trip', 'Hotel details for Cape Town trip');