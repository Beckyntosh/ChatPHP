CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Baby Products', 50.25);
INSERT INTO expenses (category, amount) VALUES ('Household', 75.50);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 30.75);
INSERT INTO expenses (category, amount) VALUES ('Food', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Baby Products', 40.00);
INSERT INTO expenses (category, amount) VALUES ('Household', 90.25);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 20.50);
INSERT INTO expenses (category, amount) VALUES ('Food', 180.00);
INSERT INTO expenses (category, amount) VALUES ('Baby Products', 60.75);
