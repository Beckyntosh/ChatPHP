CREATE TABLE IF NOT EXISTS finance_goals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
goal_name VARCHAR(255) NOT NULL,
goal_amount DECIMAL(10,2) NOT NULL,
saved_amount DECIMAL(10,2) NOT NULL DEFAULT '0.00',
reg_date TIMESTAMP
);

INSERT INTO finance_goals (goal_name, goal_amount, saved_amount) VALUES ('Save $5,000 for travel', '5000.00', '0.00');
INSERT INTO finance_goals (goal_name, goal_amount, saved_amount) VALUES ('Buy a new laptop', '1500.00', '0.00');
INSERT INTO finance_goals (goal_name, goal_amount, saved_amount) VALUES ('Pay off credit card debt', '3000.00', '0.00');
INSERT INTO finance_goals (goal_name, goal_amount, saved_amount) VALUES ('Save for emergency fund', '10000.00', '0.00');
INSERT INTO finance_goals (goal_name, goal_amount, saved_amount) VALUES ('Invest in stocks', '2000.00', '0.00');
INSERT INTO finance_goals (goal_name, goal_amount, saved_amount) VALUES ('Buy a car', '10000.00', '0.00');
INSERT INTO finance_goals (goal_name, goal_amount, saved_amount) VALUES ('Save for retirement', '50000.00', '0.00');
INSERT INTO finance_goals (goal_name, goal_amount, saved_amount) VALUES ('Pay off student loans', '15000.00', '0.00');
INSERT INTO finance_goals (goal_name, goal_amount, saved_amount) VALUES ('Start a business', '5000.00', '0.00');
INSERT INTO finance_goals (goal_name, goal_amount, saved_amount) VALUES ('Save for a down payment on a house', '20000.00', '0.00');
