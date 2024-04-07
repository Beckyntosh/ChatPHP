CREATE TABLE debt (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    principal DECIMAL(10,2) NOT NULL,
    interest_rate DECIMAL(5,4) NOT NULL,
    monthly_payment DECIMAL(10,2) NOT NULL
);

INSERT INTO debt (principal, interest_rate, monthly_payment) VALUES (1000, 0.05, 100);
INSERT INTO debt (principal, interest_rate, monthly_payment) VALUES (2000, 0.08, 150);
INSERT INTO debt (principal, interest_rate, monthly_payment) VALUES (1500, 0.04, 120);
INSERT INTO debt (principal, interest_rate, monthly_payment) VALUES (3000, 0.06, 200);
INSERT INTO debt (principal, interest_rate, monthly_payment) VALUES (2500, 0.07, 180);
INSERT INTO debt (principal, interest_rate, monthly_payment) VALUES (1800, 0.035, 130);
INSERT INTO debt (principal, interest_rate, monthly_payment) VALUES (2200, 0.045, 160);
INSERT INTO debt (principal, interest_rate, monthly_payment) VALUES (2800, 0.055, 210);
INSERT INTO debt (principal, interest_rate, monthly_payment) VALUES (3200, 0.065, 230);
INSERT INTO debt (principal, interest_rate, monthly_payment) VALUES (2700, 0.075, 190);
