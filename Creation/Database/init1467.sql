CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(50) NOT NULL,
    goal_amount DOUBLE NOT NULL,
    saved_amount DOUBLE NOT NULL DEFAULT 0,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $500 for Emergency Fund', 500);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Invest $1000 in Stock Market', 1000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $200 for New Laptop', 200);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Pay off $1000 Credit Card Debt', 1000);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $300 for Gym Membership', 300);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Invest $1500 in Retirement Fund', 1500);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $400 for Online Course', 400);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Pay off $800 Student Loan', 800);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $600 for Vacation', 600);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy $700 Camera', 700);
