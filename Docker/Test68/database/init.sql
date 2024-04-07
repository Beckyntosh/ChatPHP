CREATE TABLE IF NOT EXISTS mortgage_calculations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  loan_amount DECIMAL(10,2),
  interest_rate DECIMAL(5,2),
  loan_term INT,
  monthly_payment DECIMAL(10,2),
  calculation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (300000, 4.0, 30, 1432.25);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (250000, 3.5, 15, 1787.08);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (400000, 3.75, 20, 2427.04);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (275000, 4.25, 25, 1518.31);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (350000, 4.5, 30, 1770.56);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (320000, 4.7, 15, 2418.15);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (280000, 3.8, 30, 1302.62);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (450000, 5.0, 25, 2633.51);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (310000, 4.3, 20, 2078.48);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (270000, 4.8, 15, 2063.54);
