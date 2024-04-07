CREATE TABLE IF NOT EXISTS mortgage_calculation (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loan_amount DOUBLE NOT NULL,
    interest_rate DOUBLE NOT NULL,
    loan_term INT NOT NULL,
    monthly_payment DOUBLE NOT NULL,
    calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO mortgage_calculation (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (300000, 4, 30, 1432.25);
INSERT INTO mortgage_calculation (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (250000, 3.5, 20, 1473.79);
INSERT INTO mortgage_calculation (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (400000, 5, 15, 3175.07);
INSERT INTO mortgage_calculation (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (275000, 4.25, 30, 1347.13);
INSERT INTO mortgage_calculation (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (350000, 3.75, 25, 2126.74);
INSERT INTO mortgage_calculation (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (320000, 4.5, 30, 1629.57);
INSERT INTO mortgage_calculation (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (280000, 3.8, 20, 1682.2);
INSERT INTO mortgage_calculation (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (260000, 4.3, 15, 1946.57);
INSERT INTO mortgage_calculation (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (310000, 4, 30, 1477.42);
INSERT INTO mortgage_calculation (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (290000, 3.6, 25, 1859.11);
