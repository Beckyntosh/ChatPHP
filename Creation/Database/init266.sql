CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('School Supplies', 50.50);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 150.75);
INSERT INTO expenses (category, amount) VALUES ('Food', 100.25);
INSERT INTO expenses (category, amount) VALUES ('School Supplies', 75.30);
INSERT INTO expenses (category, amount) VALUES ('Others', 80.00);
INSERT INTO expenses (category, amount) VALUES ('School Supplies', 25.75);
INSERT INTO expenses (category, amount) VALUES ('Food', 120.10);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 95.60);
INSERT INTO expenses (category, amount) VALUES ('Others', 70.20);
