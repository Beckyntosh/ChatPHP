CREATE TABLE IF NOT EXISTS trip_cost (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    distance FLOAT NOT NULL,
    fuel_price FLOAT NOT NULL,
    efficiency FLOAT NOT NULL,
    cost FLOAT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO trip_cost (distance, fuel_price, efficiency, cost) VALUES (100, 2.5, 20, 12.50);
INSERT INTO trip_cost (distance, fuel_price, efficiency, cost) VALUES (150, 3.0, 25, 18.00);
INSERT INTO trip_cost (distance, fuel_price, efficiency, cost) VALUES (200, 2.75, 22, 25.00);
INSERT INTO trip_cost (distance, fuel_price, efficiency, cost) VALUES (120, 2.2, 18, 13.33);
INSERT INTO trip_cost (distance, fuel_price, efficiency, cost) VALUES (180, 3.5, 20, 31.50);
INSERT INTO trip_cost (distance, fuel_price, efficiency, cost) VALUES (90, 2.0, 15, 12.00);
INSERT INTO trip_cost (distance, fuel_price, efficiency, cost) VALUES (250, 4.0, 30, 33.33);
INSERT INTO trip_cost (distance, fuel_price, efficiency, cost) VALUES (140, 3.2, 23, 18.06);
INSERT INTO trip_cost (distance, fuel_price, efficiency, cost) VALUES (170, 2.8, 21, 22.86);
INSERT INTO trip_cost (distance, fuel_price, efficiency, cost) VALUES (110, 2.4, 19, 11.58);
