CREATE TABLE MortgageCalculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    loanAmount DECIMAL(10,2),
    interestRate DECIMAL(4,2),
    loanTerm INT,
    monthlyRepayment DECIMAL(10,2)
);

INSERT INTO MortgageCalculations (loanAmount, interestRate, loanTerm, monthlyRepayment) VALUES 
(300000, 4.00, 30, 1432.25),
(250000, 3.75, 20, 1478.85),
(400000, 4.25, 15, 2882.45),
(500000, 3.50, 25, 2510.44),
(350000, 4.50, 30, 1771.19),
(275000, 3.25, 10, 2667.50),
(450000, 3.75, 20, 2564.88),
(320000, 4.00, 25, 1671.18),
(380000, 3.60, 30, 1731.19),
(280000, 3.95, 15, 2006.05);
