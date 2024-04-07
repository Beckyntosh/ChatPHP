CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(50) NOT NULL,
    goal_amount DECIMAL(10,2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $5000 for travel', 5000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new guitar', 800);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Emergency fund of $2000', 2000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save for a vacation', 3000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Purchase a new laptop', 1200);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save for a down payment', 10000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Create an investment portfolio', 5000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save for retirement', 15000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new phone', 700);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Start a side business', 2000);