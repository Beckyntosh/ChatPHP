CREATE TABLE IF NOT EXISTS travel_plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT,
    hotel_details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Paris', '2022-08-15', '2022-08-22', 'Flight details for Paris trip', 'Hotel details for Paris trip');
INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('London', '2022-09-10', '2022-09-15', 'Flight details for London trip', 'Hotel details for London trip');
INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Tokyo', '2022-09-25', '2022-10-02', 'Flight details for Tokyo trip', 'Hotel details for Tokyo trip');
INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('New York', '2022-10-15', '2022-10-20', 'Flight details for New York trip', 'Hotel details for New York trip');
INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Sydney', '2022-11-05', '2022-11-12', 'Flight details for Sydney trip', 'Hotel details for Sydney trip');
INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Rome', '2022-11-20', '2022-11-25', 'Flight details for Rome trip', 'Hotel details for Rome trip');
INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Barcelona', '2022-12-10', '2022-12-15', 'Flight details for Barcelona trip', 'Hotel details for Barcelona trip');
INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Dubai', '2023-01-05', '2023-01-10', 'Flight details for Dubai trip', 'Hotel details for Dubai trip');
INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Hong Kong', '2023-02-01', '2023-02-07', 'Flight details for Hong Kong trip', 'Hotel details for Hong Kong trip');
INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES ('Amsterdam', '2023-02-20', '2023-02-25', 'Flight details for Amsterdam trip', 'Hotel details for Amsterdam trip');
