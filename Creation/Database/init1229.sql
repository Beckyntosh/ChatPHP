CREATE TABLE IF NOT EXISTS travel_details (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    flight_info VARCHAR(255),
    hotel_info VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO travel_details (destination, start_date, end_date, flight_info, hotel_info) VALUES
('Paris', '2021-10-15', '2021-10-20', 'ABC Airlines 123', 'Hotel XYZ'),
('London', '2022-02-20', '2022-02-25', 'DEF Airlines 456', 'Hotel ABC'),
('Tokyo', '2022-06-10', '2022-06-15', 'GHI Airlines 789', 'Hotel JKL'),
('New York', '2022-09-05', '2022-09-10', 'MNO Airlines 321', 'Hotel RST'),
('Dubai', '2021-12-18', '2021-12-23', 'PQR Airlines 654', 'Hotel UVW'),
('Rome', '2022-03-12', '2022-03-17', 'XYZ Airlines 987', 'Hotel MNO'),
('Sydney', '2022-08-07', '2022-08-12', 'JKL Airlines 210', 'Hotel DEF'),
('Berlin', '2022-11-25', '2022-11-30', 'UVW Airlines 543', 'Hotel PQR'),
('Madrid', '2021-11-28', '2021-12-03', 'RST Airlines 876', 'Hotel GHI'),
('Seoul', '2022-05-05', '2022-05-10', 'MNO Airlines 432', 'Hotel SYZ');
