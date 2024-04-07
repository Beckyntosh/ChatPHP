CREATE TABLE IF NOT EXISTS travel_itinerary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
flight VARCHAR(50),
hotel VARCHAR(50),
visit_date DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO travel_itinerary (destination, flight, hotel, visit_date) VALUES ('Paris', 'Flight to Paris', 'Hotel in Paris', '2022-10-15');
INSERT INTO travel_itinerary (destination, flight, hotel, visit_date) VALUES ('London', 'Flight to London', 'Hotel in London', '2022-11-20');
INSERT INTO travel_itinerary (destination, flight, hotel, visit_date) VALUES ('Tokyo', 'Flight to Tokyo', 'Hotel in Tokyo', '2023-02-05');
INSERT INTO travel_itinerary (destination, flight, hotel, visit_date) VALUES ('New York', 'Flight to New York', 'Hotel in New York', '2023-04-12');
INSERT INTO travel_itinerary (destination, flight, hotel, visit_date) VALUES ('Rome', 'Flight to Rome', 'Hotel in Rome', '2023-07-08');
INSERT INTO travel_itinerary (destination, flight, hotel, visit_date) VALUES ('Sydney', 'Flight to Sydney', 'Hotel in Sydney', '2023-09-16');
INSERT INTO travel_itinerary (destination, flight, hotel, visit_date) VALUES ('Barcelona', 'Flight to Barcelona', 'Hotel in Barcelona', '2024-01-22');
INSERT INTO travel_itinerary (destination, flight, hotel, visit_date) VALUES ('Dubai', 'Flight to Dubai', 'Hotel in Dubai', '2024-03-30');
INSERT INTO travel_itinerary (destination, flight, hotel, visit_date) VALUES ('Berlin', 'Flight to Berlin', 'Hotel in Berlin', '2024-06-04');
INSERT INTO travel_itinerary (destination, flight, hotel, visit_date) VALUES ('Singapore', 'Flight to Singapore', 'Hotel in Singapore', '2024-09-11');
