CREATE TABLE IF NOT EXISTS finance_goals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
goal_name VARCHAR(30) NOT NULL,
goal_target DOUBLE NOT NULL,
amount_saved DOUBLE NOT NULL DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO finance_goals (goal_name, goal_target, amount_saved) VALUES ('Buy a new car', 25000.00, 5000.00);
INSERT INTO finance_goals (goal_name, goal_target, amount_saved) VALUES ('Family vacation', 5000.00, 2000.00);
INSERT INTO finance_goals (goal_name, goal_target, amount_saved) VALUES ('Home renovation', 15000.00, 7000.00);
INSERT INTO finance_goals (goal_name, goal_target, amount_saved) VALUES ('Emergency fund', 10000.00, 3000.00);
INSERT INTO finance_goals (goal_name, goal_target, amount_saved) VALUES ('Education fund', 20000.00, 5000.00);
INSERT INTO finance_goals (goal_name, goal_target, amount_saved) VALUES ('Investment portfolio', 50000.00, 10000.00);
INSERT INTO finance_goals (goal_name, goal_target, amount_saved) VALUES ('Retirement savings', 100000.00, 20000.00);
INSERT INTO finance_goals (goal_name, goal_target, amount_saved) VALUES ('Start a business', 30000.00, 5000.00);
INSERT INTO finance_goals (goal_name, goal_target, amount_saved) VALUES ('Buy a house', 200000.00, 50000.00);
INSERT INTO finance_goals (goal_name, goal_target, amount_saved) VALUES ('Charity donations', 5000.00, 1000.00);
