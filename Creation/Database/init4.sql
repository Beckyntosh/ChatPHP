CREATE TABLE IF NOT EXISTS weather_data (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    location VARCHAR(255) NOT NULL,
    temperature FLOAT NOT NULL,
    humidity INT NOT NULL,
    description VARCHAR(255) NOT NULL,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO weather_data (date, location, temperature, humidity, description) VALUES ('2021-10-15', 'New York', 25.3, 70, 'Cloudy');
INSERT INTO weather_data (date, location, temperature, humidity, description) VALUES ('2021-10-16', 'Los Angeles', 31.2, 60, 'Sunny');
INSERT INTO weather_data (date, location, temperature, humidity, description) VALUES ('2021-10-17', 'Chicago', 18.7, 80, 'Rainy');
INSERT INTO weather_data (date, location, temperature, humidity, description) VALUES ('2021-10-18', 'Miami', 28.5, 75, 'Partly Cloudy');
INSERT INTO weather_data (date, location, temperature, humidity, description) VALUES ('2021-10-19', 'Seattle', 15.9, 90, 'Foggy');
INSERT INTO weather_data (date, location, temperature, humidity, description) VALUES ('2021-10-20', 'Dallas', 27.8, 65, 'Clear');
INSERT INTO weather_data (date, location, temperature, humidity, description) VALUES ('2021-10-21', 'San Francisco', 22.0, 70, 'Overcast');
INSERT INTO weather_data (date, location, temperature, humidity, description) VALUES ('2021-10-22', 'Boston', 17.3, 85, 'Thunderstorms');
INSERT INTO weather_data (date, location, temperature, humidity, description) VALUES ('2021-10-23', 'Phoenix', 33.6, 55, 'Hot');
INSERT INTO weather_data (date, location, temperature, humidity, description) VALUES ('2021-10-24', 'Las Vegas', 29.8, 50, 'Dry');
