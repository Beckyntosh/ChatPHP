CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    report_type VARCHAR(100) NOT NULL,
    year YEAR NOT NULL,
    quarter VARCHAR(50),
    content TEXT,
    report_date DATE NOT NULL
);

INSERT INTO financial_reports (company_name, report_type, year, quarter, content, report_date) VALUES
('Company A', 'Earnings', '2023', 'Q2', 'This is the financial report for Company A Q2 earnings in 2023.', '2023-07-15'),
('Company B', 'Revenue', '2023', 'Q2', 'This is the revenue report for Company B Q2 in 2023.', '2023-07-20'),
('Company C', 'Profit', '2023', 'Q2', 'This is the profit report for Company C Q2 in 2023.', '2023-07-25'),
('Company D', 'Loss', '2023', 'Q2', 'This is the loss report for Company D Q2 in 2023.', '2023-08-01'),
('Company E', 'Earnings', '2023', 'Q3', 'This is the financial report for Company E Q3 earnings in 2023.', '2023-10-15'),
('Company F', 'Revenue', '2023', 'Q3', 'This is the revenue report for Company F Q3 in 2023.', '2023-10-20'),
('Company G', 'Profit', '2023', 'Q3', 'This is the profit report for Company G Q3 in 2023.', '2023-10-25'),
('Company H', 'Loss', '2023', 'Q3', 'This is the loss report for Company H Q3 in 2023.', '2023-11-01'),
('Company I', 'Earnings', '2023', 'Q4', 'This is the financial report for Company I Q4 earnings in 2023.', '2024-01-15'),
('Company J', 'Revenue', '2023', 'Q4', 'This is the revenue report for Company J Q4 in 2023.', '2024-01-20');
