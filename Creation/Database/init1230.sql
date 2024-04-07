CREATE TABLE IF NOT EXISTS travelPlans (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  destination VARCHAR(30) NOT NULL,
  flight VARCHAR(50),
  hotel VARCHAR(50),
  check_in_date DATE,
  check_out_date DATE,
  remarks TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO travelPlans (destination, flight, hotel, check_in_date, check_out_date, remarks) VALUES ('Paris', 'ABC Airlines', 'Hotel XYZ', '2022-12-01', '2022-12-10', 'Excited to explore Paris!');
INSERT INTO travelPlans (destination, flight, hotel, check_in_date, check_out_date, remarks) VALUES ('London', 'DEF Airlines', 'Hotel ABC', '2023-03-15', '2023-03-20', 'Looking forward to sightseeing in London!');
INSERT INTO travelPlans (destination, flight, hotel, check_in_date, check_out_date, remarks) VALUES ('Tokyo', 'GHI Airlines', 'Hotel QWE', '2023-06-06', '2023-06-15', 'Excited to experience the culture in Tokyo!');
INSERT INTO travelPlans (destination, flight, hotel, check_in_date, check_out_date, remarks) VALUES ('New York', 'JKL Airlines', 'Hotel RTY', '2023-09-18', '2023-09-25', 'Cant wait to explore the Big Apple!');
INSERT INTO travelPlans (destination, flight, hotel, check_in_date, check_out_date, remarks) VALUES ('Sydney', 'MNO Airlines', 'Hotel UIO', '2024-02-02', '2024-02-10', 'Hoping to see kangaroos in Sydney!');
INSERT INTO travelPlans (destination, flight, hotel, check_in_date, check_out_date, remarks) VALUES ('Barcelona', 'PQR Airlines', 'Hotel JKL', '2024-05-20', '2024-05-28', 'Excited to try authentic Spanish cuisine!');
INSERT INTO travelPlans (destination, flight, hotel, check_in_date, check_out_date, remarks) VALUES ('Rome', 'STU Airlines', 'Hotel YUI', '2024-08-10', '2024-08-18', 'Looking forward to exploring ancient Rome!');
INSERT INTO travelPlans (destination, flight, hotel, check_in_date, check_out_date, remarks) VALUES ('Dubai', 'VWX Airlines', 'Hotel HJY', '2025-01-05', '2025-01-12', 'Excited to see the stunning architecture in Dubai!');
INSERT INTO travelPlans (destination, flight, hotel, check_in_date, check_out_date, remarks) VALUES ('Cancun', 'ZXC Airlines', 'Hotel VBN', '2025-04-30', '2025-05-08', 'Cant wait to relax on the beautiful beaches of Cancun!');
INSERT INTO travelPlans (destination, flight, hotel, check_in_date, check_out_date, remarks) VALUES ('Bali', 'QWE Airlines', 'Hotel MNB', '2025-07-15', '2025-07-25', 'Excited to experience the tranquil atmosphere of Bali!');