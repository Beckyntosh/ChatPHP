CREATE TABLE historical_weather (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date DATE NOT NULL,
    location VARCHAR(255) NOT NULL,
    temperature DECIMAL(5,2) NOT NULL,
    humidity DECIMAL(5,2) NOT NULL,
    description TEXT NOT NULL
);

INSERT INTO historical_weather (date, location, temperature, humidity, description) VALUES 
('2022-01-01', 'New York', 10.5, 70.3, 'Clear skies'),
('2022-01-02', 'Los Angeles', 20.3, 65.8, 'Partly cloudy'),
('2022-01-03', 'Chicago', 5.8, 85.2, 'Rainy'),
('2022-01-04', 'Houston', 17.6, 60.0, 'Sunny'),
('2022-01-05', 'Miami', 25.0, 75.5, 'Thunderstorms'),
('2022-01-06', 'Seattle', 8.9, 82.1, 'Foggy'),
('2022-01-07', 'Denver', -2.4, 55.6, 'Snowy'),
('2022-01-08', 'San Francisco', 18.7, 68.9, 'Windy'),
('2022-01-09', 'Boston', 6.3, 79.4, 'Misty'),
('2022-01-10', 'Las Vegas', 22.1, 45.7, 'Dry heat');
