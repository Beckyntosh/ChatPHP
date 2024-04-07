CREATE TABLE IF NOT EXISTS finance_goals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    goal_title VARCHAR(255) NOT NULL,
    goal_amount DECIMAL(10,2) NOT NULL
);

INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save for travel', 5000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Buy a new car', 20000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Renovate the house', 10000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Start a business', 15000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Pay off student loans', 30000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save for retirement', 500000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Invest in stocks', 10000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Buy a vacation home', 250000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Emergency fund', 1000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Donate to charity', 500);
