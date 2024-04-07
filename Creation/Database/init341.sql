CREATE TABLE IF NOT EXISTS travel_itinerary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT,
    hotel_details TEXT,
    reg_date TIMESTAMP
);

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Paris', '2022-10-15', '2022-10-20', 'Flight details for Paris trip', 'Hotel details for Paris trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('New York', '2022-11-05', '2022-11-10', 'Flight details for New York trip', 'Hotel details for New York trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Tokyo', '2023-01-20', '2023-01-25', 'Flight details for Tokyo trip', 'Hotel details for Tokyo trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('London', '2023-03-15', '2023-03-20', 'Flight details for London trip', 'Hotel details for London trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Sydney', '2023-05-10', '2023-05-15', 'Flight details for Sydney trip', 'Hotel details for Sydney trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Rome', '2023-07-25', '2023-07-30', 'Flight details for Rome trip', 'Hotel details for Rome trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Dubai', '2023-09-10', '2023-09-15', 'Flight details for Dubai trip', 'Hotel details for Dubai trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Los Angeles', '2023-11-05', '2023-11-10', 'Flight details for Los Angeles trip', 'Hotel details for Los Angeles trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Barcelona', '2024-01-20', '2024-01-25', 'Flight details for Barcelona trip', 'Hotel details for Barcelona trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Berlin', '2024-03-15', '2024-03-20', 'Flight details for Berlin trip', 'Hotel details for Berlin trip');
