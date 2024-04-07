CREATE TABLE IF NOT EXISTS finance_goals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
goal_name VARCHAR(255) NOT NULL,
goal_amount DECIMAL(10,2) NOT NULL,
saved_amount DECIMAL(10,2) NOT NULL DEFAULT 0.00,
reg_date TIMESTAMP
);

INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $5,000 for travel', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new car', 20000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $1,000 for emergency fund', 1000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Pay off credit card debt', 3000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $10,000 for down payment on a house', 10000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new laptop', 1500.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $2,500 for retirement', 2500.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Pay off student loans', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $3,000 for a vacation', 3000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a bicycle', 500.00);
