CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Musical Instruments', 150.50);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 100.75);
INSERT INTO expenses (category, amount) VALUES ('Other', 75.25);
INSERT INTO expenses (category, amount) VALUES ('Food', 300.00);
INSERT INTO expenses (category, amount) VALUES ('Musical Instruments', 250.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 80.00);
INSERT INTO expenses (category, amount) VALUES ('Other', 50.50);
INSERT INTO expenses (category, amount) VALUES ('Food', 150.25);
INSERT INTO expenses (category, amount) VALUES ('Musical Instruments', 180.75);
