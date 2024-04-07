CREATE TABLE IF NOT EXISTS travel_plans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
departure_date DATE NOT NULL,
return_date DATE NOT NULL,
flights_details TEXT,
hotel_details TEXT,
reg_date TIMESTAMP
);

INSERT INTO travel_plans (destination, departure_date, return_date, flights_details, hotel_details) VALUES ('Paris', '2022-01-20', '2022-01-25', 'Flight details for Paris', 'Hotel details in Paris');
INSERT INTO travel_plans (destination, departure_date, return_date, flights_details, hotel_details) VALUES ('London', '2022-02-10', '2022-02-15', 'Flight details for London', 'Hotel details in London');
INSERT INTO travel_plans (destination, departure_date, return_date, flights_details, hotel_details) VALUES ('Tokyo', '2022-03-05', '2022-03-10', 'Flight details for Tokyo', 'Hotel details in Tokyo');
INSERT INTO travel_plans (destination, departure_date, return_date, flights_details, hotel_details) VALUES ('New York', '2022-04-15', '2022-04-20', 'Flight details for New York', 'Hotel details in New York');
INSERT INTO travel_plans (destination, departure_date, return_date, flights_details, hotel_details) VALUES ('Sydney', '2022-05-08', '2022-05-13', 'Flight details for Sydney', 'Hotel details in Sydney');
INSERT INTO travel_plans (destination, departure_date, return_date, flights_details, hotel_details) VALUES ('Rome', '2022-06-20', '2022-06-25', 'Flight details for Rome', 'Hotel details in Rome');
INSERT INTO travel_plans (destination, departure_date, return_date, flights_details, hotel_details) VALUES ('Barcelona', '2022-07-12', '2022-07-17', 'Flight details for Barcelona', 'Hotel details in Barcelona');
INSERT INTO travel_plans (destination, departure_date, return_date, flights_details, hotel_details) VALUES ('Dubai', '2022-08-30', '2022-09-04', 'Flight details for Dubai', 'Hotel details in Dubai');
INSERT INTO travel_plans (destination, departure_date, return_date, flights_details, hotel_details) VALUES ('Cancun', '2022-10-10', '2022-10-15', 'Flight details for Cancun', 'Hotel details in Cancun');
INSERT INTO travel_plans (destination, departure_date, return_date, flights_details, hotel_details) VALUES ('Berlin', '2022-12-01', '2022-12-06', 'Flight details for Berlin', 'Hotel details in Berlin');
