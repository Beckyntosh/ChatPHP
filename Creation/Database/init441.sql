CREATE TABLE investments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    initialInvestment DECIMAL(10,2),
    annualReturn DECIMAL(5,2),
    years INT
);

INSERT INTO investments (initialInvestment, annualReturn, years) VALUES (1000, 5, 10);
INSERT INTO investments (initialInvestment, annualReturn, years) VALUES (5000, 8, 15);
INSERT INTO investments (initialInvestment, annualReturn, years) VALUES (2000, 7, 20);
INSERT INTO investments (initialInvestment, annualReturn, years) VALUES (3000, 6, 12);
INSERT INTO investments (initialInvestment, annualReturn, years) VALUES (1500, 4, 8);
INSERT INTO investments (initialInvestment, annualReturn, years) VALUES (2500, 9, 18);
INSERT INTO investments (initialInvestment, annualReturn, years) VALUES (3500, 8.5, 14);
INSERT INTO investments (initialInvestment, annualReturn, years) VALUES (1800, 6.5, 10);
INSERT INTO investments (initialInvestment, annualReturn, years) VALUES (2700, 7.5, 16);
INSERT INTO investments (initialInvestment, annualReturn, years) VALUES (4000, 10, 22);
