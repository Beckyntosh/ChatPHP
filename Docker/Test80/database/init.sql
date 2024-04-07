
CREATE TABLE IF NOT EXISTS mortgage_calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loan_amount DECIMAL(10,2),
    interest_rate DECIMAL(5,2),
    term_years INT(3),
    monthly_payment DECIMAL(10,2),
    calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (300000, 4, 30, 1515.17), 
(250000, 3.5, 20, 1433.87), 
(400000, 4.2, 25, 2234.92), 
(150000, 5, 15, 1183.28), 
(275000, 3.75, 30, 1273.87),
(350000, 4.5, 20, 2226.31),
(200000, 3.25, 30, 870.14),
(320000, 4.75, 30, 1667.54),
(180000, 3.85, 25, 978.35),
(280000, 4.1, 20, 1767.80);