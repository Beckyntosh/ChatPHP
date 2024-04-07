
CREATE TABLE IF NOT EXISTS expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO expenses (category, amount) VALUES ('Food', 200.00);
INSERT INTO expenses (category, amount) VALUES ('Office Supplies', 50.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 100.00);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 75.00);
INSERT INTO expenses (category, amount) VALUES ('Food', 150.00);
INSERT INTO expenses (category, amount) VALUES ('Office Supplies', 25.00);
INSERT INTO expenses (category, amount) VALUES ('Utilities', 75.50);
INSERT INTO expenses (category, amount) VALUES ('Miscellaneous', 30.00);
INSERT INTO expenses (category, amount) VALUES ('Food', 120.00);
INSERT INTO expenses (category, amount) VALUES ('Office Supplies', 40.00);