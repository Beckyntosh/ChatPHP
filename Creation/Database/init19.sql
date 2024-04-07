
CREATE TABLE IF NOT EXISTS routes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    start_point VARCHAR(50) NOT NULL,
    end_point VARCHAR(50) NOT NULL,
    mode_of_transport VARCHAR(50),
    cost DOUBLE,
    duration TIME,
    accessibility_options VARCHAR(255),
    departure_time DATETIME,
    arrival_time DATETIME
);

INSERT INTO routes (start_point, end_point, mode_of_transport, cost, duration, accessibility_options, departure_time, arrival_time) 
VALUES ('A', 'B', 'Bus', 5.50, '01:30:00', 'Ramp', '2022-08-08 08:00:00', '2022-08-08 09:30:00'),
       ('C', 'D', 'Train', 7.80, '02:15:00', 'Elevator', '2022-08-08 10:00:00', '2022-08-08 12:15:00'),
       ('E', 'F', 'Subway', 3.20, '00:45:00', 'None', '2022-08-08 13:30:00', '2022-08-08 14:15:00'),
       ('G', 'H', 'Bike', 0.00, '00:25:00', 'Bike Rack', '2022-08-08 15:00:00', '2022-08-08 15:25:00'),
       ('I', 'J', 'Bus', 4.50, '01:00:00', 'Ramp', '2022-08-08 16:00:00', '2022-08-08 17:00:00'),
       ('K', 'L', 'Ferry', 8.20, '01:30:00', 'Dock Ramp', '2022-08-08 18:00:00', '2022-08-08 19:30:00'),
       ('M', 'N', 'Car', 6.50, '01:10:00', 'Reserved Parking', '2022-08-08 07:00:00', '2022-08-08 08:10:00'),
       ('O', 'P', 'Bus', 3.20, '00:30:00', 'Ramp', '2022-08-08 09:30:00', '2022-08-08 10:00:00'),
       ('Q', 'R', 'Tram', 2.00, '00:20:00', 'Low Floor', '2022-08-08 11:30:00', '2022-08-08 11:50:00'),
       ('S', 'T', 'Bus', 4.00, '00:45:00', 'Ramp', '2022-08-08 14:00:00', '2022-08-08 14:45:00');
