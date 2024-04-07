CREATE TABLE finance_goals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    goal_amount DECIMAL(10, 2) NOT NULL
);

INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $5,000 for travel', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new laptop', 1500.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Renovate the kitchen', 10000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Pay off credit card debt', 2000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Start an emergency fund', 3000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Invest in stocks', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new car', 20000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save for retirement', 100000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Take a vacation', 3000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Pay off student loans', 5000.00);
