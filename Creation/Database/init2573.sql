CREATE TABLE calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loan_amount DECIMAL(10, 2) NOT NULL,
    interest_rate DECIMAL(4, 2) NOT NULL,
    term_years INT(3) NOT NULL,
    monthly_payment DECIMAL(10, 2) NOT NULL,
    calc_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (300000, 4, 30, 1432.25);
INSERT INTO calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (250000, 3.5, 25, 1359.74);
INSERT INTO calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (400000, 4.5, 20, 2536.84);
INSERT INTO calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (180000, 2.75, 15, 1229.98);
INSERT INTO calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (350000, 3.75, 30, 1612.27);
INSERT INTO calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (275000, 4.25, 10, 2826.23);
INSERT INTO calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (320000, 3.2, 20, 1892.12);
INSERT INTO calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (290000, 4.1, 25, 1558.77);
INSERT INTO calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (230000, 3.9, 30, 1088.10);
INSERT INTO calculations (loan_amount, interest_rate, term_years, monthly_payment) VALUES (420000, 4.75, 15, 3299.63);
