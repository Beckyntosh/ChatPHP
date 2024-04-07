CREATE TABLE IF NOT EXISTS mortgage_calculations (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
loanAmount DECIMAL(10, 2) NOT NULL,
annualInterestRate DECIMAL(4,2) NOT NULL,
loanPeriod INT(3) NOT NULL,
monthlyPayment DECIMAL(10, 2) NOT NULL,
calculationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO mortgage_calculations (loanAmount, annualInterestRate, loanPeriod, monthlyPayment) VALUES (300000, 4.00, 30, 1432.25);
INSERT INTO mortgage_calculations (loanAmount, annualInterestRate, loanPeriod, monthlyPayment) VALUES (250000, 3.75, 25, 1212.12);
INSERT INTO mortgage_calculations (loanAmount, annualInterestRate, loanPeriod, monthlyPayment) VALUES (400000, 4.50, 20, 2606.48);
INSERT INTO mortgage_calculations (loanAmount, annualInterestRate, loanPeriod, monthlyPayment) VALUES (150000, 3.25, 15, 1050.54);
INSERT INTO mortgage_calculations (loanAmount, annualInterestRate, loanPeriod, monthlyPayment) VALUES (275000, 3.90, 30, 1298.51);
INSERT INTO mortgage_calculations (loanAmount, annualInterestRate, loanPeriod, monthlyPayment) VALUES (350000, 4.25, 25, 1815.56);
INSERT INTO mortgage_calculations (loanAmount, annualInterestRate, loanPeriod, monthlyPayment) VALUES (225000, 3.50, 20, 1574.96);
INSERT INTO mortgage_calculations (loanAmount, annualInterestRate, loanPeriod, monthlyPayment) VALUES (275000, 3.75, 30, 1276.41);
INSERT INTO mortgage_calculations (loanAmount, annualInterestRate, loanPeriod, monthlyPayment) VALUES (200000, 4.00, 15, 1472.74);
INSERT INTO mortgage_calculations (loanAmount, annualInterestRate, loanPeriod, monthlyPayment) VALUES (325000, 4.50, 20, 2457.82);
