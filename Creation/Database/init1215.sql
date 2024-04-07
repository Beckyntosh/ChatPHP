CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
description VARCHAR(100),
reg_date TIMESTAMP
);

INSERT INTO expenses (category, amount, description) VALUES ('Food', 200.00, 'Grocery Shopping');
INSERT INTO expenses (category, amount, description) VALUES ('Transportation', 50.50, 'Gasoline');
INSERT INTO expenses (category, amount, description) VALUES ('Entertainment', 100.00, 'Movie Tickets');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 75.25, 'Dinner Out');
INSERT INTO expenses (category, amount, description) VALUES ('Other', 30.99, 'Miscellaneous');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 45.70, 'Lunch');
INSERT INTO expenses (category, amount, description) VALUES ('Transportation', 20.35, 'Uber Ride');
INSERT INTO expenses (category, amount, description) VALUES ('Entertainment', 15.00, 'Concert Ticket');
INSERT INTO expenses (category, amount, description) VALUES ('Food', 60.80, 'Grocery Shopping');
INSERT INTO expenses (category, amount, description) VALUES ('Other', 25.50, 'Stationery Supplies');
