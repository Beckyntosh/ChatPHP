CREATE TABLE IF NOT EXISTS finance_goals (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    goal_name VARCHAR(255) NOT NULL,
    target_amount FLOAT NOT NULL,
    current_amount FLOAT DEFAULT 0,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_name, target_amount)
VALUES ('Save $5,000 for travel', 5000.00),
       ('Buy a new car', 20000.00),
       ('Renovate the house', 10000.00),
       ('Start a business', 15000.00),
       ('Save for retirement', 500000.00),
       ('Pay off student loans', 15000.00),
       ('Invest in stocks', 10000.00),
       ('Emergency fund', 5000.00),
       ('Take a dream vacation', 8000.00),
       ('Buy a house', 250000.00);
