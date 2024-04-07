CREATE TABLE IF NOT EXISTS mortgage_calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loan_amount DOUBLE NOT NULL,
    interest_rate DOUBLE NOT NULL,
    loan_term INT NOT NULL,
    monthly_payment DOUBLE NOT NULL,
    calculation_time TIMESTAMP
);

INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (300000, 4, 30, 1432.25);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (250000, 3.5, 20, 1380.49);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (400000, 4.5, 15, 3049.51);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (350000, 3.75, 25, 2027.66);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (275000, 4.1, 30, 1332.30);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (320000, 3.8, 20, 1914.08);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (280000, 4.2, 10, 2859.04);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (270000, 4.3, 25, 1652.79);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (310000, 3.9, 15, 2239.35);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (290000, 4.0, 30, 1386.55);
