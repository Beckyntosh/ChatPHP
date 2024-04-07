CREATE TABLE IF NOT EXISTS travel_plan (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
departure_date DATE NOT NULL,
return_date DATE NOT NULL,
flight_details TEXT,
hotel_details TEXT,
reg_date TIMESTAMP
);

INSERT INTO travel_plan (destination, departure_date, return_date, flight_details, hotel_details) VALUES
("Paris", "2022-09-15", "2022-09-22", "Airline: Example Airlines, Flight Number: 1234", "Hotel Name: Example Hotel, Address: 123 Example St."),
("Rome", "2022-10-10", "2022-10-17", "Airline: Test Airlines, Flight Number: 5678", "Hotel Name: Test Hotel, Address: 456 Test St."),
("London", "2022-11-05", "2022-11-12", "Airline: Travel Airlines, Flight Number: 9876", "Hotel Name: Travel Inn, Address: 789 Travel St."),
("Tokyo", "2023-01-20", "2023-01-27", "Airline: Journey Airlines, Flight Number: 5432", "Hotel Name: Journey Hotel, Address: 321 Journey St."),
("New York", "2023-02-15", "2023-02-22", "Airline: Adventure Airlines, Flight Number: 2468", "Hotel Name: Adventure Inn, Address: 654 Adventure St."),
("Sydney", "2023-03-10", "2023-03-17", "Airline: Wanderlust Airlines, Flight Number: 1357", "Hotel Name: Wanderlust Hotel, Address: 789 Wanderlust St."),
("Dubai", "2023-05-05", "2023-05-12", "Airline: Explore Airlines, Flight Number: 8642", "Hotel Name: Explore Inn, Address: 246 Explore St."),
("Barcelona", "2023-07-20", "2023-07-27", "Airline: Vista Airlines, Flight Number: 9713", "Hotel Name: Vista Hotel, Address: 357 Vista St."),
("Berlin", "2023-09-15", "2023-09-22", "Airline: Horizon Airlines, Flight Number: 6829", "Hotel Name: Horizon Inn, Address: 826 Horizon St."),
("Madrid", "2023-11-10", "2023-11-17", "Airline: Summit Airlines, Flight Number: 2941", "Hotel Name: Summit Hotel, Address: 419 Summit St.");