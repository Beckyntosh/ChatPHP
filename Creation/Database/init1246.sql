CREATE TABLE IF NOT EXISTS travel_plans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(50) NOT NULL,
flight VARCHAR(100),
hotel VARCHAR(100),
user_comment TEXT,
reg_date TIMESTAMP
);

INSERT INTO travel_plans (destination, flight, hotel, user_comment) VALUES ('Paris', 'ABC Airlines', 'Hotel XYZ', 'Excited to explore the city!');
INSERT INTO travel_plans (destination, flight, hotel, user_comment) VALUES ('London', 'DEF Airlines', 'Hotel ABC', 'Looking forward to sightseeing!');
INSERT INTO travel_plans (destination, flight, hotel, user_comment) VALUES ('Tokyo', 'GHI Airlines', 'Hotel KLM', 'Excited for the food and culture!');
INSERT INTO travel_plans (destination, flight, hotel, user_comment) VALUES ('New York', 'MNO Airlines', 'Hotel PQR', 'Cant wait to shop and explore!');
INSERT INTO travel_plans (destination, flight, hotel, user_comment) VALUES ('Sydney', 'STU Airlines', 'Hotel VWX', 'Hoping to see kangaroos!');
INSERT INTO travel_plans (destination, flight, hotel, user_comment) VALUES ('Rome', 'YZA Airlines', 'Hotel BCD', 'Excited to see historical landmarks!');
INSERT INTO travel_plans (destination, flight, hotel, user_comment) VALUES ('Barcelona', 'EFG Airlines', 'Hotel HIJ', 'Looking forward to the beach!');
INSERT INTO travel_plans (destination, flight, hotel, user_comment) VALUES ('Dubai', 'KLM Airlines', 'Hotel NOP', 'Excited for the luxury experience!');
INSERT INTO travel_plans (destination, flight, hotel, user_comment) VALUES ('Cairo', 'PQR Airlines', 'Hotel STU', 'Curious to see the pyramids!');
INSERT INTO travel_plans (destination, flight, hotel, user_comment) VALUES ('Rio de Janeiro', 'VWX Airlines', 'Hotel YZA', 'Cant wait for the carnival!');
