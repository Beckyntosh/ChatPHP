CREATE TABLE IF NOT EXISTS travel_itinerary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details VARCHAR(255),
    hotel_details VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) 
VALUES ('Paris', '2022-10-15', '2022-10-20', 'Flight details for Paris trip', 'Hotel details for Paris trip'),
('London', '2023-03-08', '2023-03-15', 'Flight details for London trip', 'Hotel details for London trip'),
('Rome', '2022-12-05', '2022-12-10', 'Flight details for Rome trip', 'Hotel details for Rome trip'),
('Tokyo', '2023-01-20', '2023-01-27', 'Flight details for Tokyo trip', 'Hotel details for Tokyo trip'),
('New York', '2023-06-15', '2023-06-20', 'Flight details for New York trip', 'Hotel details for New York trip'),
('Sydney', '2023-08-10', '2023-08-17', 'Flight details for Sydney trip', 'Hotel details for Sydney trip'),
('Dubai', '2022-09-25', '2022-09-30', 'Flight details for Dubai trip', 'Hotel details for Dubai trip'),
('Beijing', '2023-04-03', '2023-04-10', 'Flight details for Beijing trip', 'Hotel details for Beijing trip'),
('Berlin', '2023-05-12', '2023-05-18', 'Flight details for Berlin trip', 'Hotel details for Berlin trip'),
('Moscow', '2023-07-22', '2023-07-28', 'Flight details for Moscow trip', 'Hotel details for Moscow trip');
