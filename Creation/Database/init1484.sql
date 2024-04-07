CREATE TABLE IF NOT EXISTS finance_goals (
        id INT AUTO_INCREMENT PRIMARY KEY,
        goal_name VARCHAR(100) NOT NULL,
        goal_amount DECIMAL(10,2) NOT NULL,
        saved_amount DECIMAL(10,2) DEFAULT 0,
        creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $5000 for travel', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new car', 20000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Renovate the house', 10000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Start a college fund', 15000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save for retirement', 50000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Emergency fund', 1000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new computer', 1500.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Fitness equipment', 500.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Vacation fund', 3000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Invest in stocks', 10000.00);
