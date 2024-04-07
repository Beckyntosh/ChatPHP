CREATE TABLE IF NOT EXISTS finance_goals (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
goal_amount DOUBLE NOT NULL,
saved_amount DOUBLE DEFAULT 0,
status VARCHAR(50) DEFAULT 'active',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (title, goal_amount) VALUES ('Save $1,000 for emergency fund', 1000);
INSERT INTO finance_goals (title, goal_amount) VALUES ('Save $2,500 for home renovation', 2500);
INSERT INTO finance_goals (title, goal_amount) VALUES ('Save $3,500 for new car', 3500);
INSERT INTO finance_goals (title, goal_amount) VALUES ('Save $4,000 for education', 4000);
INSERT INTO finance_goals (title, goal_amount) VALUES ('Save $5,500 for investment', 5500);
INSERT INTO finance_goals (title, goal_amount) VALUES ('Save $6,000 for retirement', 6000);
INSERT INTO finance_goals (title, goal_amount) VALUES ('Save $7,500 for vacation', 7500);
INSERT INTO finance_goals (title, goal_amount) VALUES ('Save $8,000 for medical expenses', 8000);
INSERT INTO finance_goals (title, goal_amount) VALUES ('Save $9,500 for charity', 9500);
INSERT INTO finance_goals (title, goal_amount) VALUES ('Save $10,000 for personal development', 10000);
