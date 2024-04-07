CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT NOT NULL,
    hotel_details TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES
('Paris', '2022-08-15', '2022-08-20', 'Flight LX123, Seat 12A', 'Hotel ABC, Room 301'),
('London', '2022-09-10', '2022-09-15', 'Flight BA456, Seat 24B', 'Hotel XYZ, Room 102'),
('Tokyo', '2022-10-05', '2022-10-10', 'Flight JL789, Seat 8C', 'Hotel EFG, Room 501'),
('New York', '2022-11-20', '2022-11-25', 'Flight AA456, Seat 15A', 'Hotel HIJ, Room 201'),
('Dubai', '2023-01-05', '2023-01-10', 'Flight EK789, Seat 3D', 'Hotel LMN, Room 401'),
('Rome', '2023-02-15', '2023-02-20', 'Flight AZ123, Seat 6B', 'Hotel OPQ, Room 601'),
('Sydney', '2023-03-10', '2023-03-15', 'Flight QF456, Seat 18C', 'Hotel RST, Room 301'),
('Barcelona', '2023-04-20', '2023-04-25', 'Flight VY789, Seat 9A', 'Hotel UVW, Room 801'),
('Berlin', '2023-05-05', '2023-05-10', 'Flight LH456, Seat 22B', 'Hotel XYZ, Room 502'),
('Singapore', '2023-06-10', '2023-06-15', 'Flight SQ789, Seat 4D', 'Hotel JKL, Room 701');