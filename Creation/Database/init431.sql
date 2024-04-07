CREATE TABLE IF NOT EXISTS loan_amortization (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    payment_date DATE NOT NULL,
    payment_amount DECIMAL(10, 2) NOT NULL,
    principal_amount DECIMAL(10, 2) NOT NULL,
    interest_amount DECIMAL(10, 2) NOT NULL,
    balance DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO loan_amortization (payment_date, payment_amount, principal_amount, interest_amount, balance) VALUES 
('2022-01-01', '2500.00', '2000.00', '500.00', '80000.00'),
('2022-02-01', '2500.00', '2025.00', '475.00', '77975.00'),
('2022-03-01', '2500.00', '2050.00', '450.00', '75925.00'),
('2022-04-01', '2500.00', '2075.00', '425.00', '73850.00'),
('2022-05-01', '2500.00', '2100.00', '400.00', '71750.00'),
('2022-06-01', '2500.00', '2125.00', '375.00', '69625.00'),
('2022-07-01', '2500.00', '2150.00', '350.00', '67475.00'),
('2022-08-01', '2500.00', '2175.00', '325.00', '65200.00'),
('2022-09-01', '2500.00', '2200.00', '300.00', '62800.00'),
('2022-10-01', '2500.00', '2225.00', '275.00', '60275.00');
