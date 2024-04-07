CREATE TABLE IF NOT EXISTS exchange_rates (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
currency_code VARCHAR(3) NOT NULL,
exchange_rate DECIMAL(10, 4) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO exchange_rates (currency_code, exchange_rate) VALUES ('EUR', 0.95);
INSERT INTO exchange_rates (currency_code, exchange_rate) VALUES ('GBP', 0.82);
INSERT INTO exchange_rates (currency_code, exchange_rate) VALUES ('JPY', 107.83);
INSERT INTO exchange_rates (currency_code, exchange_rate) VALUES ('AUD', 1.41);
INSERT INTO exchange_rates (currency_code, exchange_rate) VALUES ('CAD', 1.31);
INSERT INTO exchange_rates (currency_code, exchange_rate) VALUES ('CHF', 0.92);
INSERT INTO exchange_rates (currency_code, exchange_rate) VALUES ('CNY', 6.99);
INSERT INTO exchange_rates (currency_code, exchange_rate) VALUES ('INR', 71.40);
INSERT INTO exchange_rates (currency_code, exchange_rate) VALUES ('MXN', 21.69);
INSERT INTO exchange_rates (currency_code, exchange_rate) VALUES ('SGD', 1.36);
