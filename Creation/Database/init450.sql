CREATE TABLE IF NOT EXISTS travel_itinerary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
flight_number VARCHAR(30),
hotel_name VARCHAR(50),
travel_date DATE,
reg_date TIMESTAMP
);

INSERT INTO travel_itinerary (destination, flight_number, hotel_name, travel_date) VALUES 
('Paris', 'ABC123', 'Hotel A', '2022-07-15'),
('Rome', 'DEF456', 'Hotel B', '2022-08-20'),
('London', 'GHI789', 'Hotel C', '2022-09-25'),
('Tokyo', 'JKL101', 'Hotel D', '2022-10-30'),
('Sydney', 'MNO121', 'Hotel E', '2023-01-05'),
('New York', 'PQR141', 'Hotel F', '2023-02-10'),
('Berlin', 'STU161', 'Hotel G', '2023-03-15'),
('Barcelona', 'VWX181', 'Hotel H', '2023-04-20'),
('Cairo', 'YZA201', 'Hotel I', '2023-05-25'),
('Dubai', 'BCD221', 'Hotel J', '2023-06-30');