CREATE TABLE IF NOT EXISTS mortgage_calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    loanAmount DECIMAL(10, 2) NOT NULL,
    interestRate DECIMAL(5, 2) NOT NULL,
    loanTerm INT(6) NOT NULL,
    monthlyPayment DECIMAL(10, 2) NOT NULL,
    calcDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO mortgage_calculations (loanAmount, interestRate, loanTerm, monthlyPayment) VALUES
(300000, 4, 30, 1432.25),
(250000, 3.5, 25, 1245.26),
(400000, 4.5, 20, 2534.56),
(150000, 3, 15, 1036.50),
(500000, 5, 30, 2684.11),
(350000, 4, 25, 1802.22),
(200000, 3.75, 30, 926.41),
(450000, 4.25, 15, 3311.51),
(275000, 3.8, 20, 1734.74),
(600000, 4.75, 30, 3128.98);