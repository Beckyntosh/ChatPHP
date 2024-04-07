CREATE TABLE IF NOT EXISTS travel_plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flights_details TEXT,
    hotel_details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO travel_plans (destination, departure_date, return_date, flights_details, hotel_details)
VALUES ('Paris', '2022-10-15', '2022-10-20', 'Flight details for Paris trip', 'Hotel details for Paris trip'),
('Tokyo', '2022-11-25', '2022-12-02', 'Flight details for Tokyo trip', 'Hotel details for Tokyo trip'),
('New York', '2023-01-10', '2023-01-15', 'Flight details for New York trip', 'Hotel details for New York trip'),
('London', '2023-04-05', '2023-04-10', 'Flight details for London trip', 'Hotel details for London trip'),
('Sydney', '2023-06-20', '2023-06-25', 'Flight details for Sydney trip', 'Hotel details for Sydney trip'),
('Rome', '2023-09-12', '2023-09-18', 'Flight details for Rome trip', 'Hotel details for Rome trip'),
('Berlin', '2024-02-07', '2024-02-12', 'Flight details for Berlin trip', 'Hotel details for Berlin trip'),
('Barcelona', '2024-05-30', '2024-06-05', 'Flight details for Barcelona trip', 'Hotel details for Barcelona trip'),
('Dubai', '2024-08-20', '2024-08-25', 'Flight details for Dubai trip', 'Hotel details for Dubai trip'),
('Singapore', '2024-11-15', '2024-11-20', 'Flight details for Singapore trip', 'Hotel details for Singapore trip');