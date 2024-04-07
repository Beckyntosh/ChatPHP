CREATE TABLE IF NOT EXISTS LoanAmortization (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
principal FLOAT,
annual_interest_rate FLOAT,
loan_period_years INT,
monthly_payment FLOAT,
date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert values
INSERT INTO LoanAmortization (principal, annual_interest_rate, loan_period_years, monthly_payment) VALUES (10000.00, 5.0, 5, 188.71);
INSERT INTO LoanAmortization (principal, annual_interest_rate, loan_period_years, monthly_payment) VALUES (20000.00, 3.5, 3, 579.94);
INSERT INTO LoanAmortization (principal, annual_interest_rate, loan_period_years, monthly_payment) VALUES (15000.00, 4.2, 5, 277.31);
INSERT INTO LoanAmortization (principal, annual_interest_rate, loan_period_years, monthly_payment) VALUES (12000.00, 6.5, 4, 283.54);
INSERT INTO LoanAmortization (principal, annual_interest_rate, loan_period_years, monthly_payment) VALUES (25000.00, 4.0, 6, 386.66);
INSERT INTO LoanAmortization (principal, annual_interest_rate, loan_period_years, monthly_payment) VALUES (18000.00, 3.8, 3, 530.29);
INSERT INTO LoanAmortization (principal, annual_interest_rate, loan_period_years, monthly_payment) VALUES (22000.00, 5.7, 5, 418.14);
INSERT INTO LoanAmortization (principal, annual_interest_rate, loan_period_years, monthly_payment) VALUES (28000.00, 4.3, 4, 638.15);
INSERT INTO LoanAmortization (principal, annual_interest_rate, loan_period_years, monthly_payment) VALUES (30000.00, 6.0, 6, 483.77);
INSERT INTO LoanAmortization (principal, annual_interest_rate, loan_period_years, monthly_payment) VALUES (16000.00, 4.5, 4, 367.11);
