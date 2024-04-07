CREATE TABLE IF NOT EXISTS TravelPlan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_info TEXT,
    hotel_info TEXT,
    reg_date TIMESTAMP
);

INSERT INTO TravelPlan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Paris', '2022-08-15', '2022-08-25', 'Flight details for Paris trip', 'Hotel details for Paris trip');
INSERT INTO TravelPlan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('London', '2022-09-10', '2022-09-20', 'Flight details for London trip', 'Hotel details for London trip');
INSERT INTO TravelPlan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Tokyo', '2022-07-05', '2022-07-15', 'Flight details for Tokyo trip', 'Hotel details for Tokyo trip');
INSERT INTO TravelPlan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('New York', '2022-10-12', '2022-10-22', 'Flight details for New York trip', 'Hotel details for New York trip');
INSERT INTO TravelPlan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Dubai', '2022-11-18', '2022-11-28', 'Flight details for Dubai trip', 'Hotel details for Dubai trip');
INSERT INTO TravelPlan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Sydney', '2022-12-02', '2022-12-12', 'Flight details for Sydney trip', 'Hotel details for Sydney trip');
INSERT INTO TravelPlan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Rome', '2022-06-20', '2022-06-30', 'Flight details for Rome trip', 'Hotel details for Rome trip');
INSERT INTO TravelPlan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Istanbul', '2023-01-05', '2023-01-15', 'Flight details for Istanbul trip', 'Hotel details for Istanbul trip');
INSERT INTO TravelPlan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Barcelona', '2023-02-08', '2023-02-18', 'Flight details for Barcelona trip', 'Hotel details for Barcelona trip');
INSERT INTO TravelPlan (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Cape Town', '2023-03-22', '2023-04-01', 'Flight details for Cape Town trip', 'Hotel details for Cape Town trip');
