CREATE TABLE retirement_calculations (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        current_age INT(3),
        retirement_age INT(3),
        monthly_income_needed DECIMAL(10,2),
        savings_needed DECIMAL(10,2),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO retirement_calculations (current_age, retirement_age, monthly_income_needed, savings_needed, created_at) VALUES
(30, 65, 5000.00, 1200000.00, NOW()),
(35, 70, 6000.00, 1500000.00, NOW()),
(40, 75, 7000.00, 1800000.00, NOW()),
(45, 80, 8000.00, 2000000.00, NOW()),
(50, 85, 9000.00, 2400000.00, NOW()),
(55, 90, 10000.00, 2800000.00, NOW()),
(60, 95, 11000.00, 3200000.00, NOW()),
(65, 100, 12000.00, 3600000.00, NOW()),
(70, 105, 13000.00, 4000000.00, NOW()),
(75, 110, 14000.00, 4400000.00, NOW());
