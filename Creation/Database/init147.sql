CREATE TABLE IF NOT EXISTS finance_goals (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  goal_name VARCHAR(50) NOT NULL,
  target_amount DOUBLE NOT NULL,
  saved_amount DOUBLE NOT NULL,
  target_date DATE NOT NULL,
  creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO finance_goals (goal_name, target_amount, saved_amount, target_date) VALUES
('Buy a new car', 20000, 5000, '2022-12-01'),
('Take a vacation', 3000, 0, '2023-07-15'),
('Save for retirement', 100000, 20000, '2030-01-01'),
('Purchase a new laptop', 1500, 1000, '2022-08-10'),
('Start a business', 5000, 0, '2024-03-25'),
('Pay off student loans', 20000, 5000, '2025-06-30'),
('Buy a house', 250000, 50000, '2030-12-01'),
('Travel around the world', 10000, 0, '2026-09-20'),
('Build an emergency fund', 5000, 1000, '2023-04-12'),
('Renovate the kitchen', 8000, 2000, '2022-10-05');
