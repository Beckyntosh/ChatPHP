CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(100) NOT NULL,
    departure_date DATE,
    return_date DATE,
    flight VARCHAR(255),
    hotel VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO travel_plans (destination, departure_date, return_date, flight, hotel) VALUES ('Paris', '2022-09-15', '2022-09-20', 'Flight number: XY1234', 'Hotel: Example Hotel 1');
INSERT INTO travel_plans (destination, departure_date, return_date, flight, hotel) VALUES ('Tokyo', '2022-10-10', '2022-10-15', 'Flight number: AB5678', 'Hotel: Example Hotel 2');
INSERT INTO travel_plans (destination, departure_date, return_date, flight, hotel) VALUES ('London', '2022-11-05', '2022-11-10', 'Flight number: CD9012', 'Hotel: Example Hotel 3');
INSERT INTO travel_plans (destination, departure_date, return_date, flight, hotel) VALUES ('New York', '2022-12-01', '2022-12-06', 'Flight number: EF3456', 'Hotel: Example Hotel 4');
INSERT INTO travel_plans (destination, departure_date, return_date, flight, hotel) VALUES ('Sydney', '2023-01-03', '2023-01-08', 'Flight number: GH7890', 'Hotel: Example Hotel 5');
INSERT INTO travel_plans (destination, departure_date, return_date, flight, hotel) VALUES ('Rome', '2023-02-14', '2023-02-19', 'Flight number: IJ2345', 'Hotel: Example Hotel 6');
INSERT INTO travel_plans (destination, departure_date, return_date, flight, hotel) VALUES ('Dubai', '2023-03-20', '2023-03-25', 'Flight number: KL6789', 'Hotel: Example Hotel 7');
INSERT INTO travel_plans (destination, departure_date, return_date, flight, hotel) VALUES ('Cancun', '2023-04-18', '2023-04-23', 'Flight number: MN1234', 'Hotel: Example Hotel 8');
INSERT INTO travel_plans (destination, departure_date, return_date, flight, hotel) VALUES ('Barcelona', '2023-05-07', '2023-05-12', 'Flight number: OP5678', 'Hotel: Example Hotel 9');
INSERT INTO travel_plans (destination, departure_date, return_date, flight, hotel) VALUES ('Berlin', '2023-06-23', '2023-06-28', 'Flight number: QR9012', 'Hotel: Example Hotel 10');
