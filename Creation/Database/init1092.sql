CREATE TABLE LoanSchedule (
    id INT AUTO_INCREMENT PRIMARY KEY,
    month INT,
    principal FLOAT,
    interest FLOAT,
    total_payment FLOAT,
    balance FLOAT
);

INSERT INTO LoanSchedule (month, principal, interest, total_payment, balance) VALUES 
(1, 187.06, 45.83, 232.89, 9782.94),
(2, 188.71, 44.18, 232.89, 9594.23),
(3, 190.38, 42.51, 232.89, 9403.85),
(4, 192.08, 40.81, 232.89, 9208.77),
(5, 193.79, 39.10, 232.89, 9008.98),
(6, 195.53, 37.36, 232.89, 8803.45),
(7, 197.29, 35.60, 232.89, 8592.16),
(8, 199.07, 33.82, 232.89, 8375.08),
(9, 200.87, 32.02, 232.89, 8152.21),
(10, 202.69, 30.20, 232.89, 7923.52);
