CREATE TABLE IF NOT EXISTS MortgageCalculations (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
loanAmount DECIMAL(10, 2) NOT NULL,
interestRate DECIMAL(4, 2) NOT NULL,
loanTerm INT(4) NOT NULL,
monthlyPayment DECIMAL(10, 2) NOT NULL,
calculationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (300000.00, 4.00, 30, 1432.25);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (250000.00, 3.75, 20, 1442.65);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (350000.00, 4.25, 25, 1806.66);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (275000.00, 4.50, 15, 2087.67);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (400000.00, 4.75, 30, 2081.21);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (320000.00, 3.50, 20, 1819.32);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (275000.00, 4.25, 30, 1349.23);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (450000.00, 3.75, 20, 2770.10);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (375000.00, 4.50, 25, 2307.54);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (325000.00, 4.00, 15, 2399.72);