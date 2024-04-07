init.sql file:

CREATE TABLE IF NOT EXISTS exchange_rates (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  currency VARCHAR(3) NOT NULL,
  rate DECIMAL(10, 4) NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO exchange_rates (currency, rate) VALUES ('USDEUR', 0.95), ('EURUSD', 1.05), 
('USDGBP', 0.78), ('GBPUSD', 1.29), ('USDCAD', 1.31),
('CADAUD', 0.97), ('AUDUSD', 1.04), ('USDKRW', 1122.33),
('KRWAUD', 0.0013), ('GBPJPY', 140.25);