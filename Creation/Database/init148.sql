CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(50) NOT NULL,
    target_amount DECIMAL(10, 2) NOT NULL,
    current_amount DECIMAL(10, 2) NOT NULL
);

INSERT INTO finance_goals (goal_name, target_amount, current_amount) VALUES ('Buy a new car', 25000.00, 15000.00);
INSERT INTO finance_goals (goal_name, target_amount, current_amount) VALUES ('Go on a vacation', 5000.00, 2000.00);
INSERT INTO finance_goals (goal_name, target_amount, current_amount) VALUES ('Renovate the house', 10000.00, 5000.00);
INSERT INTO finance_goals (goal_name, target_amount, current_amount) VALUES ('Start a business', 20000.00, 10000.00);
INSERT INTO finance_goals (goal_name, target_amount, current_amount) VALUES ('Save for retirement', 100000.00, 75000.00);
INSERT INTO finance_goals (goal_name, target_amount, current_amount) VALUES ('Pay off student loans', 15000.00, 5000.00);
INSERT INTO finance_goals (goal_name, target_amount, current_amount) VALUES ('Buy a new laptop', 1500.00, 500.00);
INSERT INTO finance_goals (goal_name, target_amount, current_amount) VALUES ('Invest in stocks', 5000.00, 2500.00);
INSERT INTO finance_goals (goal_name, target_amount, current_amount) VALUES ('Create an emergency fund', 3000.00, 1000.00);
INSERT INTO finance_goals (goal_name, target_amount, current_amount) VALUES ('Learn a new skill', 1000.00, 500.00);
