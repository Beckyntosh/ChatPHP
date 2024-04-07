CREATE TABLE IF NOT EXISTS mortgage_calculations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  loan_amount DECIMAL(10, 2),
  interest_rate DECIMAL(5, 3),
  term_years INT,
  monthly_payment DECIMAL(10, 2),
  calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (300000.00, 4.00, 30, 1432.25);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (350000.00, 3.75, 25, 1638.21);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (400000.00, 4.25, 30, 1958.07);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (250000.00, 3.50, 20, 1416.83);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (275000.00, 4.50, 15, 2096.75);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (320000.00, 3.95, 30, 1515.85);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (280000.00, 4.10, 20, 1723.49);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (310000.00, 3.85, 25, 1514.49);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (330000.00, 4.75, 30, 1729.45);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (290000.00, 4.15, 15, 2222.87);
