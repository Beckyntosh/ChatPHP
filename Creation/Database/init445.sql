CREATE TABLE IF NOT EXISTS trips (
    trip_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS flights (
    flight_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    trip_id INT(6) UNSIGNED,
    flight_number VARCHAR(10) NOT NULL,
    departure_time DATETIME NOT NULL,
    arrival_time DATETIME NOT NULL,
    FOREIGN KEY (trip_id) REFERENCES trips(trip_id)
);

CREATE TABLE IF NOT EXISTS hotels (
    hotel_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    trip_id INT(6) UNSIGNED,
    hotel_name VARCHAR(50) NOT NULL,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    FOREIGN KEY (trip_id) REFERENCES trips(trip_id)
);

INSERT INTO trips (destination, departure_date, return_date) VALUES ('Paris', '2022-10-15', '2022-10-20');
INSERT INTO trips (destination, departure_date, return_date) VALUES ('London', '2022-11-05', '2022-11-10');
INSERT INTO trips (destination, departure_date, return_date) VALUES ('Tokyo', '2023-01-08', '2023-01-15');
INSERT INTO trips (destination, departure_date, return_date) VALUES ('New York', '2023-03-20', '2023-03-25');
INSERT INTO trips (destination, departure_date, return_date) VALUES ('Sydney', '2023-05-15', '2023-05-22');
INSERT INTO trips (destination, departure_date, return_date) VALUES ('Barcelona', '2023-07-10', '2023-07-15');
INSERT INTO trips (destination, departure_date, return_date) VALUES ('Dubai', '2023-09-03', '2023-09-08');
INSERT INTO trips (destination, departure_date, return_date) VALUES ('Rome', '2023-11-12', '2023-11-18');
INSERT INTO trips (destination, departure_date, return_date) VALUES ('Cape Town', '2024-02-05', '2024-02-12');
INSERT INTO trips (destination, departure_date, return_date) VALUES ('Bali', '2024-04-20', '2024-04-25');