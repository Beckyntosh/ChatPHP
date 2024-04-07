CREATE TABLE MortgageCalculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loan_amount DECIMAL(10, 2) NOT NULL,
    interest_rate DECIMAL(5, 2) NOT NULL,
    term_years INT(5) NOT NULL,
    monthly_payment DECIMAL(10, 2) NOT NULL,
    calc_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO MortgageCalculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES
(300000, 4.00, 30, 1432.25),
(250000, 3.75, 15, 1807.88),
(400000, 5.25, 20, 2805.34),
(150000, 3.25, 10, 1470.46),
(500000, 4.50, 30, 2533.43),
(350000, 3.50, 25, 1768.88),
(200000, 4.75, 15, 1599.21),
(450000, 4.25, 20, 2777.66),
(275000, 3.85, 30, 1287.37),
(325000, 4.60, 25, 1999.32);