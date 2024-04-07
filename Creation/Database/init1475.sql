CREATE TABLE IF NOT EXISTS finance_goals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    goal_amount DOUBLE NOT NULL,
    saved_amount DOUBLE DEFAULT 0,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $10,000 for emergency fund', 10000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $2,000 for new laptop', 2000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $3,500 for home renovation', 3500.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $1,500 for new phone', 1500.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $7,000 for vacation', 7000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $5,000 for investment', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $800 for fitness equipment', 800.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $4,000 for car repairs', 4000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $6,500 for education', 6500.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $1,200 for gifts', 1200.00);
