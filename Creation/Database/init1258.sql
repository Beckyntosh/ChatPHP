CREATE TABLE IF NOT EXISTS TravelPlans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
startDate DATE NOT NULL,
endDate DATE NOT NULL,
hotel VARCHAR(50),
flightDetails VARCHAR(100),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL UNIQUE,
password VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO TravelPlans (destination, startDate, endDate, hotel, flightDetails) VALUES 
('Paris', '2022-08-15', '2022-08-20', 'Hotel ABC', 'Flight XYZ'),
('London', '2022-09-10', '2022-09-15', 'Hotel DEF', 'Flight LMN'),
('Tokyo', '2022-10-05', '2022-10-12', 'Hotel GHI', 'Flight PQR'),
('New York', '2022-11-20', '2022-11-25', 'Hotel JKL', 'Flight STU'),
('Dubai', '2022-12-10', '2022-12-15', 'Hotel MNO', 'Flight VWX'),
('Rome', '2023-01-05', '2023-01-10', 'Hotel XYZ', 'Flight ABC'),
('Sydney', '2023-02-20', '2023-02-25', 'Hotel DEF', 'Flight LMN'),
('Barcelona', '2023-03-10', '2023-03-15', 'Hotel GHI', 'Flight PQR'),
('Berlin', '2023-04-05', '2023-04-12', 'Hotel JKL', 'Flight STU'),
('Beijing', '2023-05-20', '2023-05-25', 'Hotel MNO', 'Flight VWX');