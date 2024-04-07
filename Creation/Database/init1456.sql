CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    goal VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal, amount) VALUES ('Save $5,000 for travel', 5000.00);
INSERT INTO finance_goals (goal, amount) VALUES ('Buy a new laptop', 1500.00);
INSERT INTO finance_goals (goal, amount) VALUES ('Renovate the kitchen', 8000.00);
INSERT INTO finance_goals (goal, amount) VALUES ('Save for emergency fund', 3000.00);
INSERT INTO finance_goals (goal, amount) VALUES ('Pay off credit card debt', 2000.00);
INSERT INTO finance_goals (goal, amount) VALUES ('Invest in stocks', 4000.00);
INSERT INTO finance_goals (goal, amount) VALUES ('Buy a new car', 10000.00);
INSERT INTO finance_goals (goal, amount) VALUES ('Save for retirement', 10000.00);
INSERT INTO finance_goals (goal, amount) VALUES ('Start a small business', 5000.00);
INSERT INTO finance_goals (goal, amount) VALUES ('Buy a house', 200000.00);
