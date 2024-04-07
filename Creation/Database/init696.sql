CREATE TABLE calendar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_date DATE,
    event_time TIME,
    product_id INT,
    user_id INT
);

INSERT INTO calendar (event_date, event_time, product_id, user_id) VALUES ('2023-01-15', '08:30:00', '101', '201');
INSERT INTO calendar (event_date, event_time, product_id, user_id) VALUES ('2023-02-20', '15:45:00', '102', '202');
INSERT INTO calendar (event_date, event_time, product_id, user_id) VALUES ('2023-03-10', '12:00:00', '103', '203');
INSERT INTO calendar (event_date, event_time, product_id, user_id) VALUES ('2023-04-05', '09:00:00', '104', '204');
INSERT INTO calendar (event_date, event_time, product_id, user_id) VALUES ('2023-05-22', '17:30:00', '105', '205');
INSERT INTO calendar (event_date, event_time, product_id, user_id) VALUES ('2023-06-16', '10:45:00', '106', '206');
INSERT INTO calendar (event_date, event_time, product_id, user_id) VALUES ('2023-07-08', '14:20:00', '107', '207');
INSERT INTO calendar (event_date, event_time, product_id, user_id) VALUES ('2023-08-30', '11:10:00', '108', '208');
INSERT INTO calendar (event_date, event_time, product_id, user_id) VALUES ('2023-09-18', '16:00:00', '109', '209');
INSERT INTO calendar (event_date, event_time, product_id, user_id) VALUES ('2023-10-25', '13:15:00', '110', '210');
