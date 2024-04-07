CREATE TABLE mortgage_calculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    loan_amount DECIMAL(10, 2),
    interest_rate DECIMAL(4, 2),
    loan_term INT,
    monthly_payment DECIMAL(10, 2)
);

INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (300000.00, 4.00, 30, 1432.25);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (250000.00, 3.75, 20, 1445.68);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (400000.00, 4.25, 15, 2924.27);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (350000.00, 3.50, 25, 1778.61);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (275000.00, 4.50, 30, 1389.35);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (320000.00, 3.25, 20, 1863.35);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (280000.00, 4.75, 15, 2692.12);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (290000.00, 3.90, 25, 1516.57);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (380000.00, 4.10, 30, 1831.89);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (410000.00, 3.60, 20, 2325.23);
