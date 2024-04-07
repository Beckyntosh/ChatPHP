CREATE TABLE IF NOT EXISTS finance_goals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    target_amount DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Save $5000 for travel', 5000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Buy a new laptop', 1500.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Renovate the kitchen', 10000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Start a small business', 20000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Save $100 for charity', 100.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Emergency fund', 3000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Vacation in Hawaii', 8000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('New phone upgrade', 500.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Invest in stocks', 5000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Donate to local shelter', 200.00);
