CREATE TABLE IF NOT EXISTS MortgageCalculations (
id INT AUTO_INCREMENT PRIMARY KEY,
loanAmount DECIMAL(10,2),
interestRate DECIMAL(5,2),
loanTerm INT,
monthlyPayment DECIMAL(10,2),
calculationTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (200000.00, 4.5, 30, 1013.37);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (300000.00, 3.75, 15, 2187.22);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (150000.00, 5.25, 20, 1059.52);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (250000.00, 4.0, 25, 1311.09);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (180000.00, 3.5, 10, 1800.35);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (220000.00, 4.75, 30, 1147.49);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (280000.00, 4.25, 15, 2076.61);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (170000.00, 3.9, 20, 1013.37);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (190000.00, 4.1, 25, 1221.86);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (200000.00, 3.99, 30, 843.86);