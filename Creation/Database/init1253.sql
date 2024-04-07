CREATE TABLE IF NOT EXISTS travel_plan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    flight VARCHAR(100),
    hotel VARCHAR(100),
    reg_date TIMESTAMP
);

INSERT INTO travel_plan (destination, flight, hotel) VALUES ('Paris', 'Flight1', 'Hotel1');
INSERT INTO travel_plan (destination, flight, hotel) VALUES ('London', 'Flight2', 'Hotel2');
INSERT INTO travel_plan (destination, flight, hotel) VALUES ('New York', 'Flight3', 'Hotel3');
INSERT INTO travel_plan (destination, flight, hotel) VALUES ('Tokyo', 'Flight4', 'Hotel4');
INSERT INTO travel_plan (destination, flight, hotel) VALUES ('Rome', 'Flight5', 'Hotel5');
INSERT INTO travel_plan (destination, flight, hotel) VALUES ('Sydney', 'Flight6', 'Hotel6');
INSERT INTO travel_plan (destination, flight, hotel) VALUES ('Berlin', 'Flight7', 'Hotel7');
INSERT INTO travel_plan (destination, flight, hotel) VALUES ('Dubai', 'Flight8', 'Hotel8');
INSERT INTO travel_plan (destination, flight, hotel) VALUES ('Barcelona', 'Flight9', 'Hotel9');
INSERT INTO travel_plan (destination, flight, hotel) VALUES ('Amsterdam', 'Flight10', 'Hotel10');