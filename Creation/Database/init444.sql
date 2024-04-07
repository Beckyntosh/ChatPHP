CREATE TABLE IF NOT EXISTS Itinerary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT NOT NULL,
    hotel_details TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO Itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES 
('Paris', '2022-10-15', '2022-10-20', 'Flight details for Paris trip', 'Hotel details for Paris trip'),
('London', '2022-11-05', '2022-11-10', 'Flight details for London trip', 'Hotel details for London trip'),
('Tokyo', '2023-02-15', '2023-02-20', 'Flight details for Tokyo trip', 'Hotel details for Tokyo trip'),
('New York', '2023-03-10', '2023-03-15', 'Flight details for New York trip', 'Hotel details for New York trip'),
('Sydney', '2023-04-25', '2023-04-30', 'Flight details for Sydney trip', 'Hotel details for Sydney trip'),
('Dubai', '2023-06-15', '2023-06-20', 'Flight details for Dubai trip', 'Hotel details for Dubai trip'),
('Rome', '2023-08-10', '2023-08-15', 'Flight details for Rome trip', 'Hotel details for Rome trip'),
('Barcelona', '2023-09-22', '2023-09-27', 'Flight details for Barcelona trip', 'Hotel details for Barcelona trip'),
('Berlin', '2024-01-05', '2024-01-10', 'Flight details for Berlin trip', 'Hotel details for Berlin trip'),
('Amsterdam', '2024-04-15', '2024-04-20', 'Flight details for Amsterdam trip', 'Hotel details for Amsterdam trip');
