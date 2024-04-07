CREATE TABLE IF NOT EXISTS exchange_rates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    currency_code VARCHAR(3) NOT NULL,
    rate DECIMAL(10, 6) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO exchange_rates (currency_code, rate) VALUES ('EUR', 0.95) ON DUPLICATE KEY UPDATE rate=VALUES(rate);
INSERT INTO exchange_rates (currency_code, rate) VALUES ('USD', 1.00) ON DUPLICATE KEY UPDATE rate=VALUES(rate);
INSERT INTO exchange_rates (currency_code, rate) VALUES ('GBP', 0.75) ON DUPLICATE KEY UPDATE rate=VALUES(rate);
INSERT INTO exchange_rates (currency_code, rate) VALUES ('JPY', 110.00) ON DUPLICATE KEY UPDATE rate=VALUES(rate);
INSERT INTO exchange_rates (currency_code, rate) VALUES ('AUD', 1.35) ON DUPLICATE KEY UPDATE rate=VALUES(rate);
INSERT INTO exchange_rates (currency_code, rate) VALUES ('CAD', 1.30) ON DUPLICATE KEY UPDATE rate=VALUES(rate);
INSERT INTO exchange_rates (currency_code, rate) VALUES ('CHF', 0.91) ON DUPLICATE KEY UPDATE rate=VALUES(rate);
INSERT INTO exchange_rates (currency_code, rate) VALUES ('CNY', 6.45) ON DUPLICATE KEY UPDATE rate=VALUES(rate);
INSERT INTO exchange_rates (currency_code, rate) VALUES ('NZD', 1.44) ON DUPLICATE KEY UPDATE rate=VALUES(rate);
INSERT INTO exchange_rates (currency_code, rate) VALUES ('KRW', 1154.50) ON DUPLICATE KEY UPDATE rate=VALUES(rate);
