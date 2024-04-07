CREATE TABLE tax_rates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filing_status VARCHAR(50),
    income_min DECIMAL,
    income_max DECIMAL,
    tax_rate DECIMAL
) ENGINE=InnoDB;

INSERT INTO tax_rates (filing_status, income_min, income_max, tax_rate) VALUES
('single', 0, 9875, 10),
('single', 9876, 40125, 12),
('single', 40126, 85525, 22),
('single', 85526, 163300, 24),
('single', 163301, 207350, 32),
('single', 207351, 518400, 35),
('single', 518401, 1000000, 37),
('married', 0, 19750, 10),
('married', 19751, 80250, 12),
('married', 80251, 171050, 22),
('married', 171051, 326600, 24),
('married', 326601, 414700, 32),
('married', 414701, 622050, 35),
('married', 622051, 1000000, 37);
