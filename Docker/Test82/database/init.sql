CREATE TABLE IF NOT EXISTS mortgage_calculations (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
loan_amount DOUBLE,
interest_rate DOUBLE,
loan_term INT,
monthly_payment DOUBLE,
calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (300000, 4.0, 30, 1432.25);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (250000, 3.5, 20, 1420.29);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (400000, 3.75, 25, 1985.26);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (275000, 4.25, 15, 2053.76);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (350000, 3.9, 30, 1657.21);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (320000, 4.15, 20, 1910.89);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (289000, 3.8, 15, 2101.81);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (270000, 3.65, 30, 1231.34);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (310000, 4.05, 25, 1833.79);
INSERT INTO mortgage_calculations (loan_amount, interest_rate, loan_term, monthly_payment) VALUES (295000, 3.95, 20, 1890.74);
