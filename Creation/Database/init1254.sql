CREATE TABLE IF NOT EXISTS travel_plan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_info TEXT NOT NULL,
    hotel_info TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO travel_plan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Paris', '2022-09-01', '2022-09-10', 'Flight details for Paris trip', 'Hotel details for Paris trip');
INSERT INTO travel_plan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('London', '2022-10-15', '2022-10-20', 'Flight details for London trip', 'Hotel details for London trip');
INSERT INTO travel_plan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('New York', '2022-11-05', '2022-11-12', 'Flight details for New York trip', 'Hotel details for New York trip');
INSERT INTO travel_plan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Tokyo', '2023-02-28', '2023-03-07', 'Flight details for Tokyo trip', 'Hotel details for Tokyo trip');
INSERT INTO travel_plan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Barcelona', '2023-04-10', '2023-04-15', 'Flight details for Barcelona trip', 'Hotel details for Barcelona trip');
INSERT INTO travel_plan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Sydney', '2023-06-20', '2023-06-27', 'Flight details for Sydney trip', 'Hotel details for Sydney trip');
INSERT INTO travel_plan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Dubai', '2023-08-15', '2023-08-22', 'Flight details for Dubai trip', 'Hotel details for Dubai trip');
INSERT INTO travel_plan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Rome', '2023-10-02', '2023-10-09', 'Flight details for Rome trip', 'Hotel details for Rome trip');
INSERT INTO travel_plan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Cairo', '2024-01-17', '2024-01-25', 'Flight details for Cairo trip', 'Hotel details for Cairo trip');
INSERT INTO travel_plan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Rio de Janeiro', '2024-03-08', '2024-03-15', 'Flight details for Rio de Janeiro trip', 'Hotel details for Rio de Janeiro trip');
