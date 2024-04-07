CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    goal_amount DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $5000 for travel', 5000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new laptop', 1500);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Renovate the kitchen', 10000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Start a retirement fund', 20000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save for a down payment on a house', 25000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Pay off credit card debt', 5000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Invest in stocks', 5000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new car', 20000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Savings for emergency fund', 1000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save for childs education', 15000);
