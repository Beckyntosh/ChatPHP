CREATE TABLE investment_returns (
    id INT AUTO_INCREMENT PRIMARY KEY,
    principal DECIMAL(10,2) NOT NULL,
    annual_rate DECIMAL(5,2) NOT NULL,
    years INT NOT NULL,
    future_value DECIMAL(15,2) NOT NULL
);

INSERT INTO investment_returns (principal, annual_rate, years, future_value) VALUES (1000.00, 5.00, 10, 1628.89);
INSERT INTO investment_returns (principal, annual_rate, years, future_value) VALUES (5000.00, 7.50, 5, 7358.78);
INSERT INTO investment_returns (principal, annual_rate, years, future_value) VALUES (2000.00, 4.25, 8, 3078.99);
INSERT INTO investment_returns (principal, annual_rate, years, future_value) VALUES (8000.00, 6.00, 12, 14337.91);
INSERT INTO investment_returns (principal, annual_rate, years, future_value) VALUES (3000.00, 3.75, 9, 4012.78);
INSERT INTO investment_returns (principal, annual_rate, years, future_value) VALUES (6000.00, 5.25, 6, 7791.69);
INSERT INTO investment_returns (principal, annual_rate, years, future_value) VALUES (4000.00, 6.75, 7, 6041.21);
INSERT INTO investment_returns (principal, annual_rate, years, future_value) VALUES (10000.00, 8.00, 15, 31721.44);
INSERT INTO investment_returns (principal, annual_rate, years, future_value) VALUES (1500.00, 2.50, 4, 1631.02);
INSERT INTO investment_returns (principal, annual_rate, years, future_value) VALUES (7000.00, 5.75, 10, 11797.32);
