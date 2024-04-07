CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    goal_amount DECIMAL(10, 2) NOT NULL,
    current_amount DECIMAL(10, 2) NOT NULL DEFAULT '0.00',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $5,000 for travel', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new camera', 800.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Start emergency fund', 1000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Renovate the kitchen', 3000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Learn to invest in stocks', 500.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Pay off credit card debt', 2000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new laptop', 1200.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Start a college fund for kids', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save up for a down payment on a house', 10000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Take a cooking class', 200.00);
