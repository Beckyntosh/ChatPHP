CREATE TABLE IF NOT EXISTS loan_amortization (
id INT AUTO_INCREMENT PRIMARY KEY,
principal DECIMAL(10,2),
annual_interest_rate DECIMAL(5,2),
years INT,
monthly_payment DECIMAL(10,2),
payment_date DATE,
interest DECIMAL(10,2),
balance DECIMAL(10,2)
);

INSERT INTO loan_amortization (principal, annual_interest_rate, years, monthly_payment, payment_date, interest, balance) VALUES (10000.00, 5.00, 5, 188.71, '2023-01-01', 41.67, 8918.29);
INSERT INTO loan_amortization (principal, annual_interest_rate, years, monthly_payment, payment_date, interest, balance) VALUES (15000.00, 4.50, 10, 158.00, '2022-12-01', 56.25, 13102.24);
INSERT INTO loan_amortization (principal, annual_interest_rate, years, monthly_payment, payment_date, interest, balance) VALUES (20000.00, 6.00, 15, 168.33, '2023-06-01', 100.00, 18731.80);
INSERT INTO loan_amortization (principal, annual_interest_rate, years, monthly_payment, payment_date, interest, balance) VALUES (12000.00, 3.75, 8, 147.42, '2022-11-01', 37.50, 8802.13);
INSERT INTO loan_amortization (principal, annual_interest_rate, years, monthly_payment, payment_date, interest, balance) VALUES (18000.00, 4.25, 12, 184.56, '2023-02-01', 63.75, 13619.12);
INSERT INTO loan_amortization (principal, annual_interest_rate, years, monthly_payment, payment_date, interest, balance) VALUES (22000.00, 5.50, 20, 169.84, '2023-08-01', 100.00, 21055.93);
INSERT INTO loan_amortization (principal, annual_interest_rate, years, monthly_payment, payment_date, interest, balance) VALUES (13000.00, 4.00, 9, 161.00, '2022-11-01', 43.33, 9328.05);
INSERT INTO loan_amortization (principal, annual_interest_rate, years, monthly_payment, payment_date, interest, balance) VALUES (25000.00, 6.25, 25, 168.92, '2024-02-01', 135.42, 23838.18);
INSERT INTO loan_amortization (principal, annual_interest_rate, years, monthly_payment, payment_date, interest, balance) VALUES (14000.00, 3.50, 7, 201.44, '2022-10-01', 41.67, 12468.92);
INSERT INTO loan_amortization (principal, annual_interest_rate, years, monthly_payment, payment_date, interest, balance) VALUES (16000.00, 4.75, 11, 166.94, '2023-01-01', 63.33, 12626.70);
