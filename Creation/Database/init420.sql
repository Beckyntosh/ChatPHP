CREATE TABLE IF NOT EXISTS mortgage_calculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    loan_amount DECIMAL(10, 2) NOT NULL,
    interest_rate DECIMAL(4, 2) NOT NULL,
    term_years INT NOT NULL,
    monthly_payment DECIMAL(10, 2) NOT NULL,
    calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (250000, 3.5, 30, 1122.61);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (300000, 4.25, 15, 2244.21);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (200000, 3.75, 20, 1213.37);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (350000, 3.99, 25, 1971.22);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (275000, 4.5, 30, 1389.35);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (225000, 4.1, 15, 1674.67);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (400000, 4.75, 20, 2603.56);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (320000, 3.25, 25, 1638.94);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (280000, 4.3, 30, 1396.19);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (275000, 3.75, 15, 2006.03);
