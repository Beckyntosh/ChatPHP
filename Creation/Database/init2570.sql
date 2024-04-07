CREATE TABLE MortgageCalculator (
    id INT AUTO_INCREMENT PRIMARY KEY,
    loan_amount DECIMAL(10, 2) NOT NULL,
    interest_rate DECIMAL(4, 2) NOT NULL,
    loan_term INT NOT NULL,
    monthly_payment DECIMAL(10, 2) NOT NULL
);

INSERT INTO MortgageCalculator (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (300000, 4.00, 30, 1432.25);
INSERT INTO MortgageCalculator (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (250000, 3.75, 15, 1861.41);
INSERT INTO MortgageCalculator (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (400000, 4.25, 20, 2431.60);
INSERT INTO MortgageCalculator (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (350000, 3.50, 25, 1755.14);
INSERT INTO MortgageCalculator (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (275000, 4.50, 30, 1388.14);
INSERT INTO MortgageCalculator (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (320000, 3.25, 15, 2222.02);
INSERT INTO MortgageCalculator (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (380000, 4.75, 20, 2503.02);
INSERT INTO MortgageCalculator (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (290000, 3.00, 25, 1550.89);
INSERT INTO MortgageCalculator (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (310000, 5.00, 30, 1666.79);
INSERT INTO MortgageCalculator (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (270000, 3.10, 15, 1870.60);
