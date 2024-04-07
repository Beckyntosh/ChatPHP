CREATE TABLE IF NOT EXISTS travel_itinerary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details VARCHAR(255),
    hotel_details VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Paris', '2022-06-15', '2022-06-20', 'Flight details for Paris trip', 'Hotel details for Paris trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('London', '2022-07-10', '2022-07-15', 'Flight details for London trip', 'Hotel details for London trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Tokyo', '2022-08-25', '2022-08-30', 'Flight details for Tokyo trip', 'Hotel details for Tokyo trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('New York', '2022-09-05', '2022-09-10', 'Flight details for New York trip', 'Hotel details for New York trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Sydney', '2022-10-15', '2022-10-20', 'Flight details for Sydney trip', 'Hotel details for Sydney trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Rome', '2022-11-08', '2022-11-13', 'Flight details for Rome trip', 'Hotel details for Rome trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Dubai', '2022-12-20', '2022-12-25', 'Flight details for Dubai trip', 'Hotel details for Dubai trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Barcelona', '2023-01-10', '2023-01-15', 'Flight details for Barcelona trip', 'Hotel details for Barcelona trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Berlin', '2023-02-18', '2023-02-23', 'Flight details for Berlin trip', 'Hotel details for Berlin trip');
INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Cape Town', '2023-03-05', '2023-03-10', 'Flight details for Cape Town trip', 'Hotel details for Cape Town trip');
