CREATE TABLE IF NOT EXISTS travel_itinerary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT NOT NULL,
    hotel_details TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES 
('Paris', '2023-05-15', '2023-05-30', 'Flight details for Paris', 'Hotel details for Paris'),
('New York', '2023-06-20', '2023-07-05', 'Flight details for New York', 'Hotel details for New York'),
('London', '2023-08-10', '2023-08-25', 'Flight details for London', 'Hotel details for London'),
('Tokyo', '2023-09-15', '2023-09-30', 'Flight details for Tokyo', 'Hotel details for Tokyo'),
('Rome', '2023-10-20', '2023-11-05', 'Flight details for Rome', 'Hotel details for Rome'),
('Sydney', '2023-12-10', '2023-12-25', 'Flight details for Sydney', 'Hotel details for Sydney'),
('Dubai', '2024-01-15', '2024-01-30', 'Flight details for Dubai', 'Hotel details for Dubai'),
('Cairo', '2024-02-20', '2024-03-05', 'Flight details for Cairo', 'Hotel details for Cairo'),
('Berlin', '2024-03-15', '2024-03-30', 'Flight details for Berlin', 'Hotel details for Berlin'),
('Barcelona', '2024-04-10', '2024-04-25', 'Flight details for Barcelona', 'Hotel details for Barcelona');
