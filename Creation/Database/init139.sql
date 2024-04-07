CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    report_type VARCHAR(50) NOT NULL,
    year YEAR NOT NULL,
    quarter VARCHAR(2) NOT NULL,
    document MEDIUMTEXT NOT NULL
);

INSERT INTO financial_reports (company_name, report_type, year, quarter, document) VALUES
('Company1', 'Earnings', 2023, 'Q2', 'Document1'),
('Company2', 'Earnings', 2023, 'Q2', 'Document2'),
('Company3', 'Earnings', 2023, 'Q2', 'Document3'),
('Company4', 'Earnings', 2023, 'Q2', 'Document4'),
('Company5', 'Earnings', 2023, 'Q2', 'Document5'),
('Company6', 'Earnings', 2023, 'Q2', 'Document6'),
('Company7', 'Earnings', 2023, 'Q2', 'Document7'),
('Company8', 'Earnings', 2023, 'Q2', 'Document8'),
('Company9', 'Earnings', 2023, 'Q2', 'Document9'),
('Company10', 'Earnings', 2023, 'Q2', 'Document10');