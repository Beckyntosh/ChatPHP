CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 150.50);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 50.75);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 100.20);
INSERT INTO expenses (category, amount) VALUES ('Other', 75.00);
INSERT INTO expenses (category, amount) VALUES ('Food', 30.45);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 80.60);
INSERT INTO expenses (category, amount) VALUES ('Transportation', 45.30);
INSERT INTO expenses (category, amount) VALUES ('Entertainment', 70.90);
INSERT INTO expenses (category, amount) VALUES ('Other', 25.25);
