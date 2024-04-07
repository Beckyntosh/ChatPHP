CREATE TABLE mortgage_calculations (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        loan_amount DOUBLE NOT NULL,
        interest_rate DOUBLE NOT NULL,
        loan_term_years INT NOT NULL,
        monthly_payment DOUBLE NOT NULL,
        calculation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term_years, monthly_payment) VALUES (300000, 4.0, 30, 1432.25);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term_years, monthly_payment) VALUES (250000, 3.5, 20, 1476.70);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term_years, monthly_payment) VALUES (400000, 4.5, 25, 2526.74);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term_years, monthly_payment) VALUES (350000, 4.25, 30, 1717.87);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term_years, monthly_payment) VALUES (275000, 3.75, 15, 1996.86);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term_years, monthly_payment) VALUES (320000, 4.2, 30, 1553.54);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term_years, monthly_payment) VALUES (290000, 4.1, 20, 1738.07);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term_years, monthly_payment) VALUES (260000, 3.9, 25, 1341.85);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term_years, monthly_payment) VALUES (380000, 4.6, 30, 1947.81);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term_years, monthly_payment) VALUES (315000, 4.15, 20, 1886.48);
