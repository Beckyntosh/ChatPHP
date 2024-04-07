CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_title VARCHAR(255) NOT NULL,
    goal_amount DOUBLE NOT NULL,
    saved_amount DOUBLE DEFAULT 0,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save $5000 for travel', 5000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Buy a new car', 20000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Pay off credit card debt', 1000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save for emergency fund', 3000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Invest in stocks', 5000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Renovate the house', 15000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Start a business', 10000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Go on a luxury vacation', 8000);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Buy a new laptop', 1500);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save for retirement', 50000);