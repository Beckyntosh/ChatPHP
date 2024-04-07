CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT NOT NULL,
    hotel_details TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) 
VALUES ('Paris', '2022-10-15', '2022-10-20', 'Flight BA123, Seat 7A', 'Hotel ABC, Room 301'),
       ('New York', '2022-11-25', '2022-11-30', 'Flight AA456, Seat 10B', 'Hotel XYZ, Room 201'),
       ('Tokyo', '2023-02-05', '2023-02-10', 'Flight JL789, Seat 15C', 'Hotel HJK, Room 102'),
       ('London', '2023-04-15', '2023-04-20', 'Flight LH234, Seat 5D', 'Hotel MNO, Room 401'),
       ('Sydney', '2023-06-30', '2023-07-05', 'Flight QF345, Seat 20E', 'Hotel PQR, Room 501'),
       ('Rome', '2023-09-10', '2023-09-15', 'Flight AZ678, Seat 8F', 'Hotel STU, Room 601'),
       ('Barcelona', '2024-01-20', '2024-01-25', 'Flight VY901, Seat 25G', 'Hotel WXY, Room 701'),
       ('Berlin', '2024-03-05', '2024-03-10', 'Flight LH123, Seat 12H', 'Hotel ZAB, Room 801'),
       ('Dubai', '2024-06-15', '2024-06-20', 'Flight EK456, Seat 30I', 'Hotel CDE, Room 901'),
       ('Singapore', '2024-08-30', '2024-09-04', 'Flight SQ678, Seat 18J', 'Hotel FGH, Room 1001');
