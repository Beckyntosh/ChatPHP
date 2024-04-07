CREATE TABLE IF NOT EXISTS flight_search (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255),
    departure_date DATE,
    return_date DATE
);

INSERT INTO flight_search (destination, departure_date, return_date) VALUES ('New York', '2022-12-01', '2022-12-10');
INSERT INTO flight_search (destination, departure_date, return_date) VALUES ('London', '2022-11-15', '2022-11-22');
INSERT INTO flight_search (destination, departure_date, return_date) VALUES ('Tokyo', '2022-10-20', '2022-10-30');
INSERT INTO flight_search (destination, departure_date, return_date) VALUES ('Paris', '2022-09-05', '2022-09-15');
INSERT INTO flight_search (destination, departure_date, return_date) VALUES ('Rome', '2022-08-12', '2022-08-20');
INSERT INTO flight_search (destination, departure_date, return_date) VALUES ('Sydney', '2022-07-25', '2022-08-05');
INSERT INTO flight_search (destination, departure_date, return_date) VALUES ('Dubai', '2022-06-11', '2022-06-18');
INSERT INTO flight_search (destination, departure_date, return_date) VALUES ('Barcelona', '2022-05-16', '2022-05-23');
INSERT INTO flight_search (destination, departure_date, return_date) VALUES ('Berlin', '2022-04-06', '2022-04-15');
INSERT INTO flight_search (destination, departure_date, return_date) VALUES ('Madrid', '2022-03-02', '2022-03-09');
