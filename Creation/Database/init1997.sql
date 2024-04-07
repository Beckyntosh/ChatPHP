
CREATE TABLE IF NOT EXISTS retirement_savings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
current_age INT(3) NOT NULL,
retirement_age INT(3) NOT NULL,
monthly_income FLOAT NOT NULL,
savings_target FLOAT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO retirement_savings (current_age, retirement_age, monthly_income, savings_target) VALUES (25, 65, 5000, 600000);
INSERT INTO retirement_savings (current_age, retirement_age, monthly_income, savings_target) VALUES (30, 65, 6000, 720000);
INSERT INTO retirement_savings (current_age, retirement_age, monthly_income, savings_target) VALUES (35, 65, 7000, 840000);
INSERT INTO retirement_savings (current_age, retirement_age, monthly_income, savings_target) VALUES (40, 65, 8000, 960000);
INSERT INTO retirement_savings (current_age, retirement_age, monthly_income, savings_target) VALUES (45, 65, 9000, 1080000);
INSERT INTO retirement_savings (current_age, retirement_age, monthly_income, savings_target) VALUES (50, 65, 10000, 1200000);
INSERT INTO retirement_savings (current_age, retirement_age, monthly_income, savings_target) VALUES (55, 65, 11000, 1320000);
INSERT INTO retirement_savings (current_age, retirement_age, monthly_income, savings_target) VALUES (60, 65, 12000, 1440000);
INSERT INTO retirement_savings (current_age, retirement_age, monthly_income, savings_target) VALUES (65, 65, 13000, 1560000);
INSERT INTO retirement_savings (current_age, retirement_age, monthly_income, savings_target) VALUES (70, 65, 14000, 1680000);