CREATE TABLE finance_goals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
goal_name VARCHAR(255) NOT NULL,
goal_amount DOUBLE NOT NULL,
saved_amount DOUBLE DEFAULT 0,
creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $5000 for travel', 5000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new laptop', 1500);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Renovate the kitchen', 10000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Pay off credit card debt', 5000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Start an emergency fund', 3000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Invest in stocks', 2000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save for a down payment on a house', 20000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Take a cooking class', 300);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Upgrade car to a hybrid', 8000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Donate to charity', 500);