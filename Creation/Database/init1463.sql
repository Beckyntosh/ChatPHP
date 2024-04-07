CREATE TABLE IF NOT EXISTS finance_goals (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  goal_title VARCHAR(255) NOT NULL,
  goal_amount DECIMAL(10,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save $1,000 for emergency fund', 1000.00);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save $2,500 for new laptop', 2500.00);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save $3,000 for home repairs', 3000.00);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save $4,500 for vacation', 4500.00);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save $5,500 for car down payment', 5500.00);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save $6,000 for furniture', 6000.00);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save $7,500 for new phone', 7500.00);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save $8,000 for education', 8000.00);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save $9,500 for investment', 9500.00);
INSERT INTO finance_goals (goal_title, goal_amount) VALUES ('Save $10,000 for retirement', 10000.00);
