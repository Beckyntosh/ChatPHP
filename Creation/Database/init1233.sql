CREATE TABLE IF NOT EXISTS travel_plans (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        destination VARCHAR(30) NOT NULL,
        departure_date DATE NOT NULL,
        return_date DATE NOT NULL,
        flight_info TEXT,
        hotel_info TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );

INSERT INTO travel_plans (destination, departure_date, return_date, flight_info, hotel_info) 
VALUES 
('Paris', '2022-10-20', '2022-10-25', 'Flight details for Paris trip', 'Hotel details for Paris trip'),
('London', '2022-11-15', '2022-11-20', 'Flight details for London trip', 'Hotel details for London trip'),
('Tokyo', '2023-01-05', '2023-01-10', 'Flight details for Tokyo trip', 'Hotel details for Tokyo trip'),
('New York', '2023-02-15', '2023-02-20', 'Flight details for New York trip', 'Hotel details for New York trip'),
('Sydney', '2023-03-10', '2023-03-15', 'Flight details for Sydney trip', 'Hotel details for Sydney trip'),
('Rome', '2023-04-20', '2023-04-25', 'Flight details for Rome trip', 'Hotel details for Rome trip'),
('Dubai', '2023-05-15', '2023-05-20', 'Flight details for Dubai trip', 'Hotel details for Dubai trip'),
('Barcelona', '2023-06-10', '2023-06-15', 'Flight details for Barcelona trip', 'Hotel details for Barcelona trip'),
('Berlin', '2023-07-20', '2023-07-25', 'Flight details for Berlin trip', 'Hotel details for Berlin trip'),
('Singapore', '2023-08-15', '2023-08-20', 'Flight details for Singapore trip', 'Hotel details for Singapore trip');
