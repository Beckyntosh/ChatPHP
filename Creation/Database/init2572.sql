CREATE TABLE IF NOT EXISTS MortgageCalculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loan_amount DECIMAL(10, 2) NOT NULL,
    interest_rate DECIMAL(4, 2) NOT NULL,
    loan_term INT(6) NOT NULL,
    monthly_payment DECIMAL(10, 2) NOT NULL,
    calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO MortgageCalculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (300000.00, 4, 30, 1432.25);
INSERT INTO MortgageCalculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (250000.00, 3.5, 25, 1245.89);
INSERT INTO MortgageCalculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (400000.00, 3.75, 30, 1851.55);
INSERT INTO MortgageCalculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (350000.00, 4.25, 20, 2133.71);
INSERT INTO MortgageCalculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (275000.00, 3.8, 15, 2008.62);
INSERT INTO MortgageCalculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (320000.00, 4.15, 25, 1675.21);
INSERT INTO MortgageCalculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (280000.00, 3.65, 20, 1580.73);
INSERT INTO MortgageCalculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (450000.00, 4.5, 30, 2281.58);
INSERT INTO MortgageCalculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (380000.00, 3.9, 15, 2764.36);
INSERT INTO MortgageCalculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (300000.00, 4.2, 30, 1465.49);
