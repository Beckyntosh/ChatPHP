CREATE TABLE IF NOT EXISTS enrolment (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
product_id INT
);

INSERT INTO enrolment (user_id, product_id) VALUES (1, 1);
INSERT INTO enrolment (user_id, product_id) VALUES (2, 1);
INSERT INTO enrolment (user_id, product_id) VALUES (3, 2);
INSERT INTO enrolment (user_id, product_id) VALUES (4, 2);
INSERT INTO enrolment (user_id, product_id) VALUES (5, 3);
INSERT INTO enrolment (user_id, product_id) VALUES (6, 3);
INSERT INTO enrolment (user_id, product_id) VALUES (7, 4);
INSERT INTO enrolment (user_id, product_id) VALUES (8, 4);
INSERT INTO enrolment (user_id, product_id) VALUES (9, 5);
INSERT INTO enrolment (user_id, product_id) VALUES (10, 5);
