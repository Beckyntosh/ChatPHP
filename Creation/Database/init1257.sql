CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    destination VARCHAR(30) NOT NULL,
    flight_details VARCHAR(255),
    hotel_details VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO travel_plans (destination, flight_details, hotel_details) VALUES ('Paris', 'Flight BA123, 07/15/2022 09:00 AM - 07/15/2022 11:00 AM', 'Hotel XYZ, 07/15/2022 - 07/18/2022');
INSERT INTO travel_plans (destination, flight_details, hotel_details) VALUES ('London', 'Flight LH456, 08/20/2022 10:30 AM - 08/20/2022 12:30 PM', 'Hotel ABC, 08/20/2022 - 08/25/2022');
INSERT INTO travel_plans (destination, flight_details, hotel_details) VALUES ('Tokyo', 'Flight JL789, 09/10/2022 11:45 PM - 09/11/2022 02:30 AM', 'Hotel WXY, 09/11/2022 - 09/15/2022');
INSERT INTO travel_plans (destination, flight_details, hotel_details) VALUES ('Dubai', 'Flight EK987, 10/05/2022 08:00 AM - 10/05/2022 10:30 AM', 'Hotel DEF, 10/05/2022 - 10/10/2022');
INSERT INTO travel_plans (destination, flight_details, hotel_details) VALUES ('New York', 'Flight DL654, 11/12/2022 10:45 AM - 11/12/2022 04:30 PM', 'Hotel GHI, 11/12/2022 - 11/17/2022');
INSERT INTO travel_plans (destination, flight_details, hotel_details) VALUES ('Sydney', 'Flight QF321, 01/03/2023 05:30 PM - 01/04/2023 08:00 AM', 'Hotel JKL, 01/04/2023 - 01/10/2023');
INSERT INTO travel_plans (destination, flight_details, hotel_details) VALUES ('Rome', 'Flight AZ567, 02/20/2023 09:20 AM - 02/20/2023 02:45 PM', 'Hotel MNO, 02/20/2023 - 02/25/2023');
INSERT INTO travel_plans (destination, flight_details, hotel_details) VALUES ('Berlin', 'Flight LH321, 03/15/2023 12:30 PM - 03/15/2023 03:45 PM', 'Hotel PQR, 03/15/2023 - 03/20/2023');
INSERT INTO travel_plans (destination, flight_details, hotel_details) VALUES ('Barcelona', 'Flight VY876, 04/19/2023 08:45 AM - 04/19/2023 01:00 PM', 'Hotel STU, 04/19/2023 - 04/24/2023');
INSERT INTO travel_plans (destination, flight_details, hotel_details) VALUES ('Cape Town', 'Flight SA543, 05/10/2023 06:00 AM - 05/10/2023 10:30 AM', 'Hotel VWX, 05/10/2023 - 05/15/2023');