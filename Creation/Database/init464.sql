CREATE TABLE IF NOT EXISTS finance_goals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
description VARCHAR(255) NOT NULL,
amount DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (description, amount) VALUES ('Save $5000 for travel', 5000.00);
INSERT INTO finance_goals (description, amount) VALUES ('Buy a new laptop', 1500.00);
INSERT INTO finance_goals (description, amount) VALUES ('Renovate the kitchen', 10000.00);
INSERT INTO finance_goals (description, amount) VALUES ('Pay off credit card debt', 3000.00);
INSERT INTO finance_goals (description, amount) VALUES ('Start an emergency fund', 2000.00);
INSERT INTO finance_goals (description, amount) VALUES ('Invest in stocks', 5000.00);
INSERT INTO finance_goals (description, amount) VALUES ('Save for a down payment', 10000.00);
INSERT INTO finance_goals (description, amount) VALUES ('Plan for retirement', 150000.00);
INSERT INTO finance_goals (description, amount) VALUES ('Take a vacation', 3000.00);
INSERT INTO finance_goals (description, amount) VALUES ('Buy new furniture', 2000.00);
