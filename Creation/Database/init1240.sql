CREATE TABLE IF NOT EXISTS TravelPlans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
flight VARCHAR(50),
hotel VARCHAR(50),
user_id INT(6) UNSIGNED,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO TravelPlans (destination, flight, hotel, user_id) VALUES ('Paris', 'ABC Airlines', 'Paris Hotel 1', 1);
INSERT INTO TravelPlans (destination, flight, hotel, user_id) VALUES ('London', 'XYZ Airlines', 'London Hotel 1', 1);
INSERT INTO TravelPlans (destination, flight, hotel, user_id) VALUES ('New York', '123 Airlines', 'NY Hotel 1', 1);
INSERT INTO TravelPlans (destination, flight, hotel, user_id) VALUES ('Tokyo', '456 Airlines', 'Tokyo Hotel 1', 1);
INSERT INTO TravelPlans (destination, flight, hotel, user_id) VALUES ('Sydney', '789 Airlines', 'Sydney Hotel 1', 1);
INSERT INTO TravelPlans (destination, flight, hotel, user_id) VALUES ('Rome', 'ABC Airlines', 'Rome Hotel 1', 1);
INSERT INTO TravelPlans (destination, flight, hotel, user_id) VALUES ('Berlin', 'XYZ Airlines', 'Berlin Hotel 1', 1);
INSERT INTO TravelPlans (destination, flight, hotel, user_id) VALUES ('Dubai', '123 Airlines', 'Dubai Hotel 1', 1);
INSERT INTO TravelPlans (destination, flight, hotel, user_id) VALUES ('Hong Kong', '456 Airlines', 'HK Hotel 1', 1);
INSERT INTO TravelPlans (destination, flight, hotel, user_id) VALUES ('Barcelona', '789 Airlines', 'Barcelona Hotel 1', 1);
