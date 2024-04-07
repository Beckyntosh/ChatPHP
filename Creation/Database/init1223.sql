CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 50.75);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 30.40);
INSERT INTO expenses (category, amount) VALUES ('Healthcare', 100.25);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 20.99);
INSERT INTO expenses (category, amount) VALUES ('Food', 75.60);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 45.30);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 25.10);
INSERT INTO expenses (category, amount) VALUES ('Healthcare', 80.00);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 10.50);
