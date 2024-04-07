CREATE TABLE IF NOT EXISTS travel_itinerary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
flight VARCHAR(50),
hotel VARCHAR(50),
travel_date DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO travel_itinerary (destination, flight, hotel, travel_date) VALUES ('Paris', 'ABC Airlines', 'Hotel XYZ', '2023-05-15');
INSERT INTO travel_itinerary (destination, flight, hotel, travel_date) VALUES ('London', 'DEF Airlines', 'Hotel LMN', '2023-07-20');
INSERT INTO travel_itinerary (destination, flight, hotel, travel_date) VALUES ('Tokyo', 'GHI Airlines', 'Hotel OPQ', '2023-09-10');
INSERT INTO travel_itinerary (destination, flight, hotel, travel_date) VALUES ('New York', 'RST Airlines', 'Hotel UVW', '2023-11-25');
INSERT INTO travel_itinerary (destination, flight, hotel, travel_date) VALUES ('Sydney', 'XYZ Airlines', 'Hotel ABC', '2024-02-02');
INSERT INTO travel_itinerary (destination, flight, hotel, travel_date) VALUES ('Rome', 'LMN Airlines', 'Hotel DEF', '2024-04-18');
INSERT INTO travel_itinerary (destination, flight, hotel, travel_date) VALUES ('Dubai', 'OPQ Airlines', 'Hotel GHI', '2024-06-30');
INSERT INTO travel_itinerary (destination, flight, hotel, travel_date) VALUES ('Barcelona', 'UVW Airlines', 'Hotel RST', '2024-09-15');
INSERT INTO travel_itinerary (destination, flight, hotel, travel_date) VALUES ('Cape Town', 'ABC Airlines', 'Hotel XYZ', '2024-11-28');
INSERT INTO travel_itinerary (destination, flight, hotel, travel_date) VALUES ('Bali', 'DEF Airlines', 'Hotel LMN', '2025-01-10');
