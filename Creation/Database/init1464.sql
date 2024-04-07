CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    goal_amount DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $5000 for travel', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new car', 15000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Renovate kitchen', 10000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Pay off credit card debt', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save for emergency fund', 10000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Invest in stocks', 20000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Start a business', 30000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a house', 250000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save for retirement', 500000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Travel around the world', 50000.00);
