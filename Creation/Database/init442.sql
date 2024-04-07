CREATE TABLE IF NOT EXISTS DebtRepaymentPlan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    principal FLOAT NOT NULL,
    interestRate FLOAT NOT NULL,
    monthlyPayment FLOAT NOT NULL,
    payoffTime TEXT NOT NULL
);

INSERT INTO DebtRepaymentPlan (principal, interestRate, monthlyPayment, payoffTime) VALUES (1000.00, 5.00, 100.00, 'It will take you 10 months to pay off your debt.');
INSERT INTO DebtRepaymentPlan (principal, interestRate, monthlyPayment, payoffTime) VALUES (2000.00, 8.00, 150.00, 'It will take you 15 months to pay off your debt.');
INSERT INTO DebtRepaymentPlan (principal, interestRate, monthlyPayment, payoffTime) VALUES (3000.00, 7.50, 200.00, 'It will take you 20 months to pay off your debt.');
INSERT INTO DebtRepaymentPlan (principal, interestRate, monthlyPayment, payoffTime) VALUES (1500.00, 4.50, 100.00, 'It will take you 18 months to pay off your debt.');
INSERT INTO DebtRepaymentPlan (principal, interestRate, monthlyPayment, payoffTime) VALUES (2500.00, 6.00, 120.00, 'It will take you 25 months to pay off your debt.');
INSERT INTO DebtRepaymentPlan (principal, interestRate, monthlyPayment, payoffTime) VALUES (1800.00, 9.00, 180.00, 'It will take you 12 months to pay off your debt.');
INSERT INTO DebtRepaymentPlan (principal, interestRate, monthlyPayment, payoffTime) VALUES (2800.00, 7.20, 160.00, 'It will take you 22 months to pay off your debt.');
INSERT INTO DebtRepaymentPlan (principal, interestRate, monthlyPayment, payoffTime) VALUES (2200.00, 5.60, 140.00, 'It will take you 16 months to pay off your debt.');
INSERT INTO DebtRepaymentPlan (principal, interestRate, monthlyPayment, payoffTime) VALUES (3200.00, 6.80, 170.00, 'It will take you 28 months to pay off your debt.');
INSERT INTO DebtRepaymentPlan (principal, interestRate, monthlyPayment, payoffTime) VALUES (3500.00, 8.50, 190.00, 'It will take you 30 months to pay off your debt.');
