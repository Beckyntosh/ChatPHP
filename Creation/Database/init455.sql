CREATE TABLE IF NOT EXISTS energy_usage (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
electricity_usage DECIMAL(10,2),
gas_usage DECIMAL(10,2),
water_usage DECIMAL(10,2),
cost_estimate DECIMAL(10,2),
reg_date TIMESTAMP
);

INSERT INTO energy_usage (electricity_usage, gas_usage, water_usage, cost_estimate) VALUES (100, 20, 500, 25.50);
INSERT INTO energy_usage (electricity_usage, gas_usage, water_usage, cost_estimate) VALUES (150, 25, 600, 35.75);
INSERT INTO energy_usage (electricity_usage, gas_usage, water_usage, cost_estimate) VALUES (200, 30, 700, 45.90);
INSERT INTO energy_usage (electricity_usage, gas_usage, water_usage, cost_estimate) VALUES (250, 35, 800, 56.25);
INSERT INTO energy_usage (electricity_usage, gas_usage, water_usage, cost_estimate) VALUES (300, 40, 900, 66.70);
INSERT INTO energy_usage (electricity_usage, gas_usage, water_usage, cost_estimate) VALUES (350, 45, 1000, 77.25);
INSERT INTO energy_usage (electricity_usage, gas_usage, water_usage, cost_estimate) VALUES (400, 50, 1100, 87.90);
INSERT INTO energy_usage (electricity_usage, gas_usage, water_usage, cost_estimate) VALUES (450, 55, 1200, 98.65);
INSERT INTO energy_usage (electricity_usage, gas_usage, water_usage, cost_estimate) VALUES (500, 60, 1300, 109.50);
INSERT INTO energy_usage (electricity_usage, gas_usage, water_usage, cost_estimate) VALUES (550, 65, 1400, 120.45);
