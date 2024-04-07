CREATE TABLE IF NOT EXISTS Flights (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
departure_time DATETIME NOT NULL,
return_time DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS Hotels (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
check_in_date DATE,
check_out_date DATE
);

INSERT INTO Flights (destination, departure_time, return_time) VALUES ('Paris', '2023-06-15 08:00:00', '2023-06-30 18:00:00');
INSERT INTO Flights (destination, departure_time, return_time) VALUES ('London', '2023-07-10 10:30:00', '2023-07-20 20:00:00');
INSERT INTO Flights (destination, departure_time, return_time) VALUES ('Tokyo', '2023-08-25 15:45:00', '2023-09-10 23:30:00');

INSERT INTO Hotels (name, check_in_date, check_out_date) VALUES ('Hilton Paris Opera', '2023-06-15', '2023-06-30');
INSERT INTO Hotels (name, check_in_date, check_out_date) VALUES ('The Ritz London', '2023-07-10', '2023-07-20');
INSERT INTO Hotels (name, check_in_date, check_out_date) VALUES ('Park Hyatt Tokyo', '2023-08-25', '2023-09-10');
INSERT INTO Hotels (name, check_in_date, check_out_date) VALUES ('Marriott Paris Champs Elysees', '2023-06-15', '2023-06-30');
INSERT INTO Hotels (name, check_in_date, check_out_date) VALUES ('The Langham London', '2023-07-10', '2023-07-20');
INSERT INTO Hotels (name, check_in_date, check_out_date) VALUES ('Tokyo Station Hotel', '2023-08-25', '2023-09-10');
INSERT INTO Hotels (name, check_in_date, check_out_date) VALUES ('Novotel Paris Les Halles', '2023-06-15', '2023-06-30');
INSERT INTO Hotels (name, check_in_date, check_out_date) VALUES ('InterContinental London Park Lane', '2023-07-10', '2023-07-20');
INSERT INTO Hotels (name, check_in_date, check_out_date) VALUES ('Cerulean Tower Tokyu Hotel', '2023-08-25', '2023-09-10');