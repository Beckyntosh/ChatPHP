CREATE TABLE IF NOT EXISTS TravelPlans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
departure_date DATE NOT NULL,
return_date DATE NOT NULL,
flight_details TEXT NOT NULL,
hotel_details TEXT NOT NULL,
creation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO TravelPlans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Paris', '2023-08-10', '2023-08-20', 'Flight details for Paris trip', 'Hotel details for Paris trip');
INSERT INTO TravelPlans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('London', '2023-09-15', '2023-09-25', 'Flight details for London trip', 'Hotel details for London trip');
INSERT INTO TravelPlans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('New York', '2023-10-20', '2023-10-30', 'Flight details for New York trip', 'Hotel details for New York trip');
INSERT INTO TravelPlans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Tokyo', '2023-11-05', '2023-11-15', 'Flight details for Tokyo trip', 'Hotel details for Tokyo trip');
INSERT INTO TravelPlans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Sydney', '2023-12-01', '2023-12-10', 'Flight details for Sydney trip', 'Hotel details for Sydney trip');
INSERT INTO TravelPlans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Rome', '2024-01-08', '2024-01-18', 'Flight details for Rome trip', 'Hotel details for Rome trip');
INSERT INTO TravelPlans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Barcelona', '2024-02-14', '2024-02-24', 'Flight details for Barcelona trip', 'Hotel details for Barcelona trip');
INSERT INTO TravelPlans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Dubai', '2024-03-20', '2024-03-30', 'Flight details for Dubai trip', 'Hotel details for Dubai trip');
INSERT INTO TravelPlans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Cape Town', '2024-04-05', '2024-04-15', 'Flight details for Cape Town trip', 'Hotel details for Cape Town trip');
INSERT INTO TravelPlans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Rio de Janeiro', '2024-05-10', '2024-05-20', 'Flight details for Rio de Janeiro trip', 'Hotel details for Rio de Janeiro trip');