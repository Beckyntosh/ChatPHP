CREATE TABLE historical_weather (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    temperature DECIMAL(5,2) NOT NULL,
    humidity DECIMAL(5,2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO historical_weather (location, date, temperature, humidity) VALUES
('New York', '2022-01-01', 10.5, 70.2),
('Los Angeles', '2022-01-02', 15.3, 60.8),
('Chicago', '2022-01-03', 5.8, 80.4),
('Miami', '2022-01-04', 25.7, 45.6),
('Seattle', '2022-01-05', 8.9, 85.0),
('Dallas', '2022-01-06', 18.6, 63.2),
('San Francisco', '2022-01-07', 12.4, 68.7),
('Boston', '2022-01-08', 7.3, 75.1),
('Denver', '2022-01-09', 3.6, 90.3),
('Phoenix', '2022-01-10', 21.9, 50.6);