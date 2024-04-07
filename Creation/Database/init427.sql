CREATE TABLE IF NOT EXISTS retirement_savings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    current_age INT NOT NULL,
    retirement_age INT NOT NULL,
    monthly_income DECIMAL(10,2) NOT NULL,
    savings_goal DECIMAL(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO retirement_savings (current_age, retirement_age, monthly_income, savings_goal) VALUES 
(30, 65, 5000.00, 1000.00),
(25, 60, 6000.00, 1500.00),
(40, 70, 8000.00, 2000.00),
(35, 67, 7000.00, 1800.00),
(28, 63, 5500.00, 1200.00),
(45, 72, 9000.00, 2500.00),
(32, 68, 7500.00, 1900.00),
(50, 75, 10000.00, 3000.00),
(55, 80, 12000.00, 3500.00),
(38, 69, 8500.00, 2200.00);
