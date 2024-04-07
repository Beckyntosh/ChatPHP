CREATE TABLE weather_data_cache (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date DATE NOT NULL,
    location VARCHAR(100) NOT NULL,
    temperature INT NOT NULL
);

INSERT INTO weather_data_cache (date, location, temperature) VALUES ('2022-01-01', 'New York', 25);
INSERT INTO weather_data_cache (date, location, temperature) VALUES ('2022-01-02', 'Los Angeles', 20);
INSERT INTO weather_data_cache (date, location, temperature) VALUES ('2022-01-03', 'Chicago', 18);
INSERT INTO weather_data_cache (date, location, temperature) VALUES ('2022-01-04', 'Miami', 28);
INSERT INTO weather_data_cache (date, location, temperature) VALUES ('2022-01-05', 'San Francisco', 15);
INSERT INTO weather_data_cache (date, location, temperature) VALUES ('2022-01-06', 'Seattle', 10);
INSERT INTO weather_data_cache (date, location, temperature) VALUES ('2022-01-07', 'Boston', 22);
INSERT INTO weather_data_cache (date, location, temperature) VALUES ('2022-01-08', 'Dallas', 30);
INSERT INTO weather_data_cache (date, location, temperature) VALUES ('2022-01-09', 'Phoenix', 27);
INSERT INTO weather_data_cache (date, location, temperature) VALUES ('2022-01-10', 'Denver', 23);
