CREATE TABLE calculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    loan_amount DECIMAL(10,2),
    interest_rate DECIMAL(4,2),
    loan_term INT,
    monthly_payment DECIMAL(10,2)
);

INSERT INTO calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (300000, 4, 30, 1432.25);
INSERT INTO calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (250000, 3.5, 15, 1781.12);
INSERT INTO calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (400000, 4.5, 20, 2546.39);
INSERT INTO calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (350000, 3.75, 25, 1948.34);
INSERT INTO calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (280000, 4.25, 30, 1376.61);
INSERT INTO calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (320000, 4.75, 15, 2498.01);
INSERT INTO calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (270000, 3.8, 20, 1628.29);
INSERT INTO calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (380000, 4.2, 30, 1843.27);
INSERT INTO calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (290000, 3.9 , 25, 1725.39);
INSERT INTO calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (310000, 4.1, 20, 1972.16);
