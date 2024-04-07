CREATE TABLE IF NOT EXISTS travel_itinerary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_info TEXT,
    hotel_info TEXT,
    reg_date TIMESTAMP
);

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Paris', '2023-01-15', '2023-01-20', 'Flight number: AC123, Departure: 08:00 AM, Arrival: 12:00 PM', 'Hotel: XYZ, Address: Paris');

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('London', '2023-02-10', '2023-02-15', 'Flight number: BA456, Departure: 10:00 AM, Arrival: 04:00 PM', 'Hotel: ABC, Address: London');

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Rome', '2023-03-05', '2023-03-10', 'Flight number: AZ789, Departure: 09:00 AM, Arrival: 02:00 PM', 'Hotel: DEF, Address: Rome');

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Tokyo', '2023-04-20', '2023-04-25', 'Flight number: JL321, Departure: 11:00 AM, Arrival: 08:00 PM', 'Hotel: GHI, Address: Tokyo');

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('New York', '2023-05-15', '2023-05-20', 'Flight number: DL654, Departure: 07:00 AM, Arrival: 03:00 PM', 'Hotel: JKL, Address: New York');

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Sydney', '2023-06-08', '2023-06-13', 'Flight number: QF246, Departure: 12:00 PM, Arrival: 10:00 PM', 'Hotel: MNO, Address: Sydney');

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Berlin', '2023-07-25', '2023-07-30', 'Flight number: LH987, Departure: 08:00 AM, Arrival: 04:00 PM', 'Hotel: PQR, Address: Berlin');

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Madrid', '2023-08-18', '2023-08-23', 'Flight number: IB753, Departure: 09:00 AM, Arrival: 06:00 PM', 'Hotel: STU, Address: Madrid');

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Dubai', '2023-09-12', '2023-09-17', 'Flight number: EK147, Departure: 10:00 AM, Arrival: 08:00 PM', 'Hotel: VWX, Address: Dubai');

INSERT INTO travel_itinerary (destination, departure_date, return_date, flight_info, hotel_info) VALUES ('Moscow', '2023-10-30', '2023-11-04', 'Flight number: SU369, Departure: 11:00 AM, Arrival: 06:00 PM', 'Hotel: YZA, Address: Moscow');
