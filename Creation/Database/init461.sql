CREATE TABLE IF NOT EXISTS Trip_Calculations (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
distance DOUBLE,
mpg DOUBLE,
fuel_price DOUBLE,
fuel_needed DOUBLE,
trip_cost DOUBLE,
calculation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Trip_Calculations (distance, mpg, fuel_price, fuel_needed, trip_cost) VALUES (100, 25, 2.5, 4, 10);
INSERT INTO Trip_Calculations (distance, mpg, fuel_price, fuel_needed, trip_cost) VALUES (200, 30, 3.0, 6.67, 20);
INSERT INTO Trip_Calculations (distance, mpg, fuel_price, fuel_needed, trip_cost) VALUES (150, 20, 2.0, 7.5, 15);
INSERT INTO Trip_Calculations (distance, mpg, fuel_price, fuel_needed, trip_cost) VALUES (120, 40, 2.4, 3, 7.2);
INSERT INTO Trip_Calculations (distance, mpg, fuel_price, fuel_needed, trip_cost) VALUES (180, 35, 2.8, 5.14, 14.39);
INSERT INTO Trip_Calculations (distance, mpg, fuel_price, fuel_needed, trip_cost) VALUES (90, 15, 1.5, 6, 9);
INSERT INTO Trip_Calculations (distance, mpg, fuel_price, fuel_needed, trip_cost) VALUES (250, 28, 3.1, 8.93, 27.68);
INSERT INTO Trip_Calculations (distance, mpg, fuel_price, fuel_needed, trip_cost) VALUES (210, 22, 2.3, 9.55, 21.92);
INSERT INTO Trip_Calculations (distance, mpg, fuel_price, fuel_needed, trip_cost) VALUES (140, 18, 1.9, 7.78, 14.8);
INSERT INTO Trip_Calculations (distance, mpg, fuel_price, fuel_needed, trip_cost) VALUES (170, 32, 2.7, 5.31, 14.3);
