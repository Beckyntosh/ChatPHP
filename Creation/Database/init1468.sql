CREATE TABLE IF NOT EXISTS finance_goals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
goal_name VARCHAR(30) NOT NULL,
goal_amount DOUBLE NOT NULL,
creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $5000 for travel', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new laptop', 1500.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Pay off credit card debt', 2000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $3000 for emergency fund', 3000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Invest $2000 in stocks', 2000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a car', 10000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $1000 for new furniture', 1000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Pay off student loans', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $1500 for a new phone', 1500.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Plan for retirement', 10000.00);