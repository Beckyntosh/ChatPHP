CREATE TABLE IF NOT EXISTS FinanceGoals (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
goal_name VARCHAR(255) NOT NULL,
goal_amount DOUBLE NOT NULL,
saved_amount DOUBLE DEFAULT 0,
reg_date TIMESTAMP
);

INSERT INTO FinanceGoals (goal_name, goal_amount) VALUES ('Save $5,000 for travel', 5000);
INSERT INTO FinanceGoals (goal_name, goal_amount) VALUES ('Buy a new laptop', 1500);
INSERT INTO FinanceGoals (goal_name, goal_amount) VALUES ('Emergency fund of $1,000', 1000);
INSERT INTO FinanceGoals (goal_name, goal_amount) VALUES ('Pay off credit card debt', 2000);
INSERT INTO FinanceGoals (goal_name, goal_amount) VALUES ('Save for a down payment on a house', 10000);
INSERT INTO FinanceGoals (goal_name, goal_amount) VALUES ('Vacation fund of $2,500', 2500);
INSERT INTO FinanceGoals (goal_name, goal_amount) VALUES ('Invest in stocks', 3000);
INSERT INTO FinanceGoals (goal_name, goal_amount) VALUES ('Buy a new car', 20000);
INSERT INTO FinanceGoals (goal_name, goal_amount) VALUES ('Renovate kitchen', 8000);
INSERT INTO FinanceGoals (goal_name, goal_amount) VALUES ('Start a college fund for kids', 5000);
