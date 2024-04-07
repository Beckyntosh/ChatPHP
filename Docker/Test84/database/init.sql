CREATE TABLE IF NOT EXISTS mortgage_calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loanAmount DECIMAL(10, 2) NOT NULL,
    interestRate DECIMAL(5, 2) NOT NULL,
    loanTerm INT(3) NOT NULL,
    monthlyPayment DECIMAL(10, 2) NOT NULL,
    calculationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO mortgage_calculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (300000.00, 4.00, 30, 1432.25);
INSERT INTO mortgage_calculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (250000.00, 3.75, 25, 1215.58);
INSERT INTO mortgage_calculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (400000.00, 4.25, 30, 1960.83);
INSERT INTO mortgage_calculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (350000.00, 3.50, 20, 2002.94);
INSERT INTO mortgage_calculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (275000.00, 3.25, 15, 1930.27);
INSERT INTO mortgage_calculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (320000.00, 4.50, 28, 1624.98);
INSERT INTO mortgage_calculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (280000.00, 3.85, 22, 1607.56);
INSERT INTO mortgage_calculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (310000.00, 3.75, 27, 1505.37);
INSERT INTO mortgage_calculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (330000.00, 4.10, 29, 1702.56);
INSERT INTO mortgage_calculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES (290000.00, 3.95, 24, 1554.85);
