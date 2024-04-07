CREATE TABLE IF NOT EXISTS mortgage_calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loan_amount DECIMAL(10,2) NOT NULL,
    interest_rate DECIMAL(5,2) NOT NULL,
    term_years INT(3) NOT NULL,
    monthly_payment DECIMAL(10,2) NOT NULL,
    calculation_time TIMESTAMP
);

INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (300000.00, 4.00, 30, 1432.25);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (250000.00, 3.50, 25, 1264.81);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (400000.00, 4.25, 20, 2372.04);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (150000.00, 3.75, 15, 1088.08);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (275000.00, 4.10, 30, 1324.13);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (350000.00, 3.90, 20, 2074.41);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (200000.00, 4.50, 25, 1266.71);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (320000.00, 4.20, 30, 1556.15);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (180000.00, 3.80, 15, 1177.51);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (290000.00, 4.15, 20, 1839.30);
