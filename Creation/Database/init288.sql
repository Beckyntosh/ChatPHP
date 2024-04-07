CREATE TABLE IF NOT EXISTS travel_itinerary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
departure_date DATE NOT NULL,
return_date DATE NOT NULL,
flight_details TEXT,
hotel_details TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES 
('Paris', '2022-12-01', '2022-12-10', 'Flight details for Paris trip', 'Hotel details for Paris trip'),
('London', '2022-10-15', '2022-10-20', 'Flight details for London trip', 'Hotel details for London trip'),
('New York', '2023-01-05', '2023-01-15', 'Flight details for New York trip', 'Hotel details for New York trip'),
('Tokyo', '2023-03-20', '2023-03-30', 'Flight details for Tokyo trip', 'Hotel details for Tokyo trip'),
('Sydney', '2023-06-10', '2023-06-20', 'Flight details for Sydney trip', 'Hotel details for Sydney trip'),
('Dubai', '2023-08-05', '2023-08-15', 'Flight details for Dubai trip', 'Hotel details for Dubai trip'),
('Rome', '2024-02-15', '2024-02-25', 'Flight details for Rome trip', 'Hotel details for Rome trip'),
('Barcelona', '2024-05-10', '2024-05-20', 'Flight details for Barcelona trip', 'Hotel details for Barcelona trip'),
('Cape Town', '2024-09-01', '2024-09-10', 'Flight details for Cape Town trip', 'Hotel details for Cape Town trip'),
('Rio de Janeiro', '2025-04-20', '2025-04-30', 'Flight details for Rio de Janeiro trip', 'Hotel details for Rio de Janeiro trip');
