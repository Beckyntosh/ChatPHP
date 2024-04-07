CREATE TABLE IF NOT EXISTS MortgageCalculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loanAmount DECIMAL(10, 2) NOT NULL,
    interestRate DECIMAL(5, 2) NOT NULL,
    loanTerm INT(3) NOT NULL,
    monthlyPayment DECIMAL(10, 2) NOT NULL,
    calcDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (200000.00, 4.5, 30, 1013.37);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (300000.00, 3.75, 15, 2192.42);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (150000.00, 5.0, 20, 989.16);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (250000.00, 4.0, 25, 1311.71);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (180000.00, 4.25, 30, 884.89);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (220000.00, 3.5, 15, 1570.47);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (270000.00, 4.75, 20, 1833.06);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (190000.00, 4.3, 25, 1027.81);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (320000.00, 4.2, 30, 1554.94);
INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (280000.00, 3.9, 15, 2027.25);
