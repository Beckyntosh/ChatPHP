CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    target_amount DECIMAL(10,2) NOT NULL,
    current_amount DECIMAL(10,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Save $5000 for travel', 5000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Buy a new laptop', 1500.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Emergency fund of $3000', 3000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Save $200 for a concert ticket', 200.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Renovate the kitchen - $8000', 8000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Buy a bicycle - $500', 500.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Back-to-school shopping - $400', 400.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Save $1000 for a new phone', 1000.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Invest $300 in stocks', 300.00);
INSERT INTO finance_goals (goal_name, target_amount) VALUES ('Vacation fund of $2500', 2500.00);
