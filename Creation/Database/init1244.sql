CREATE TABLE IF NOT EXISTS trips (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    start_date DATE,
    end_date DATE,
    flight_details TEXT,
    hotel_details TEXT,
    reg_date TIMESTAMP
);

INSERT INTO trips (destination, start_date, end_date, flight_details, hotel_details) VALUES ('Paris', '2022-05-20', '2022-05-25', 'Flight details for Paris trip', 'Hotel details for Paris trip');
INSERT INTO trips (destination, start_date, end_date, flight_details, hotel_details) VALUES ('London', '2022-06-15', '2022-06-20', 'Flight details for London trip', 'Hotel details for London trip');
INSERT INTO trips (destination, start_date, end_date, flight_details, hotel_details) VALUES ('Tokyo', '2022-07-10', '2022-07-15', 'Flight details for Tokyo trip', 'Hotel details for Tokyo trip');
INSERT INTO trips (destination, start_date, end_date, flight_details, hotel_details) VALUES ('Rome', '2022-08-05', '2022-08-10', 'Flight details for Rome trip', 'Hotel details for Rome trip');
INSERT INTO trips (destination, start_date, end_date, flight_details, hotel_details) VALUES ('New York', '2022-09-20', '2022-09-25', 'Flight details for New York trip', 'Hotel details for New York trip');
INSERT INTO trips (destination, start_date, end_date, flight_details, hotel_details) VALUES ('Sydney', '2022-10-15', '2022-10-20', 'Flight details for Sydney trip', 'Hotel details for Sydney trip');
INSERT INTO trips (destination, start_date, end_date, flight_details, hotel_details) VALUES ('Barcelona', '2022-11-10', '2022-11-15', 'Flight details for Barcelona trip', 'Hotel details for Barcelona trip');
INSERT INTO trips (destination, start_date, end_date, flight_details, hotel_details) VALUES ('Dubai', '2022-12-05', '2022-12-10', 'Flight details for Dubai trip', 'Hotel details for Dubai trip');
INSERT INTO trips (destination, start_date, end_date, flight_details, hotel_details) VALUES ('Cancun', '2023-01-20', '2023-01-25', 'Flight details for Cancun trip', 'Hotel details for Cancun trip');
INSERT INTO trips (destination, start_date, end_date, flight_details, hotel_details) VALUES ('Amsterdam', '2023-02-15', '2023-02-20', 'Flight details for Amsterdam trip', 'Hotel details for Amsterdam trip');
