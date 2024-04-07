CREATE TABLE RetirementCalculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    currentAge INT NOT NULL,
    retirementAge INT NOT NULL,
    monthlyIncome INT NOT NULL,
    savingsNeeded INT NOT NULL
);

INSERT INTO RetirementCalculations (currentAge, retirementAge, monthlyIncome, savingsNeeded) VALUES 
(30, 65, 5000, 1200000),
(35, 70, 6000, 1800000),
(40, 67, 7000, 2280000),
(45, 68, 5500, 1800000),
(50, 72, 8000, 2400000),
(55, 75, 9000, 2880000),
(48, 70, 6200, 1648000),
(34, 69, 4800, 1440000),
(39, 66, 4300, 1776000),
(42, 68, 5700, 2112000);
