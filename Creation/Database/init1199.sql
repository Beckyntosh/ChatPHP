CREATE TABLE IF NOT EXISTS expenses (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(30) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Fitness Equipment', 150.50);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 80.75);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 50.25);
INSERT INTO expenses (category, amount) VALUES ('Food', 75.90);
INSERT INTO expenses (category, amount) VALUES ('Fitness Equipment', 120.20);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 65.35);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 30.10);
INSERT INTO expenses (category, amount) VALUES ('Food', 100.40);
INSERT INTO expenses (category, amount) VALUES ('Fitness Equipment', 180.60);
