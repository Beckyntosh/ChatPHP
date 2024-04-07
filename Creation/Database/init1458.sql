CREATE TABLE IF NOT EXISTS finance_goals (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  goal_name VARCHAR(255) NOT NULL,
  goal_amount DECIMAL(10, 2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save $5000 for travel', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a new laptop', 1500.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Buy a car', 10000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Renovate the house', 8000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Pay off credit card debt', 2000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Start a retirement fund', 10000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Save for a down payment on a house', 20000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Invest in stocks', 5000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Emergency fund', 3000.00);
INSERT INTO finance_goals (goal_name, goal_amount) VALUES ('Travel to Japan', 3000.00);
