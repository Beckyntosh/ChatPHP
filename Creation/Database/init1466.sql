CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    goal_amount DECIMAL(10,2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO finance_goals (goal_name, goal_amount, reg_date) VALUES ('Save $5000 for travel', 5000.00, NOW());
INSERT INTO finance_goals (goal_name, goal_amount, reg_date) VALUES ('Buy a new laptop', 1500.00, NOW());
INSERT INTO finance_goals (goal_name, goal_amount, reg_date) VALUES ('Invest in stocks', 3000.00, NOW());
INSERT INTO finance_goals (goal_name, goal_amount, reg_date) VALUES ('Pay off credit card debt', 2000.00, NOW());
INSERT INTO finance_goals (goal_name, goal_amount, reg_date) VALUES ('Save for emergency fund', 10000.00, NOW());
INSERT INTO finance_goals (goal_name, goal_amount, reg_date) VALUES ('Renovate the kitchen', 8000.00, NOW());
INSERT INTO finance_goals (goal_name, goal_amount, reg_date) VALUES ('Start a retirement fund', 12000.00, NOW());
INSERT INTO finance_goals (goal_name, goal_amount, reg_date) VALUES ('Buy a new car', 25000.00, NOW());
INSERT INTO finance_goals (goal_name, goal_amount, reg_date) VALUES ('Pay off student loans', 5000.00, NOW());
INSERT INTO finance_goals (goal_name, goal_amount, reg_date) VALUES ('Save for child's education', 15000.00, NOW());
