CREATE TABLE IF NOT EXISTS weather_data (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(30) NOT NULL,
    date DATE NOT NULL,
    temperature DECIMAL(5,2) NOT NULL,
    humidity DECIMAL(5,2) NOT NULL,
    recorded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO weather_data (location, date, temperature, humidity) VALUES ('New York', '2022-01-01', 20.5, 70.5);
INSERT INTO weather_data (location, date, temperature, humidity) VALUES ('London', '2022-01-02', 15.2, 65.3);
INSERT INTO weather_data (location, date, temperature, humidity) VALUES ('Paris', '2022-01-03', 18.7, 68.9);
INSERT INTO weather_data (location, date, temperature, humidity) VALUES ('Tokyo', '2022-01-04', 23.4, 75.2);
INSERT INTO weather_data (location, date, temperature, humidity) VALUES ('Sydney', '2022-01-05', 25.8, 80.7);
INSERT INTO weather_data (location, date, temperature, humidity) VALUES ('Berlin', '2022-01-06', 16.9, 72.1);
INSERT INTO weather_data (location, date, temperature, humidity) VALUES ('Rome', '2022-01-07', 19.3, 69.8);
INSERT INTO weather_data (location, date, temperature, humidity) VALUES ('Moscow', '2022-01-08', 12.6, 61.4);
INSERT INTO weather_data (location, date, temperature, humidity) VALUES ('Dubai', '2022-01-09', 28.1, 85.6);
INSERT INTO weather_data (location, date, temperature, humidity) VALUES ('Rio de Janeiro', '2022-01-10', 30.5, 88.3);
