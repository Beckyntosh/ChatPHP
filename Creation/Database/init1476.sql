CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    target_amount DOUBLE NOT NULL,
    current_amount DOUBLE DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Save $5000 for travel', 5000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Buy a new car', 15000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Renovate the house', 10000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Invest in stocks', 2000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Start a small business', 5000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Pay off credit card debt', 3000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Save for retirement', 100000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Buy a designer handbag', 1000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Save for a down payment on a house', 20000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Take a luxury vacation', 8000.00);