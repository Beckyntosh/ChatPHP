CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Baby Products', 150.50);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 80.75);
INSERT INTO expenses (category, amount) VALUES ('Food', 40.20);
INSERT INTO expenses (category, amount) VALUES ('Other', 75.30);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 120.60);
INSERT INTO expenses (category, amount) VALUES ('Baby Products', 90.40);
INSERT INTO expenses (category, amount) VALUES ('Food', 60.75);
INSERT INTO expenses (category, amount) VALUES ('Other', 30.90);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 100.25);