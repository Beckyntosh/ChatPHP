CREATE TABLE IF NOT EXISTS FinancialReports (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
company VARCHAR(50),
report_type VARCHAR(50),
year YEAR,
quarter VARCHAR(50),
content TEXT,
reg_date TIMESTAMP
);

INSERT INTO FinancialReports (company, report_type, year, quarter, content, reg_date) VALUES 
('Company A', 'Earnings', 2023, 'Q2', 'Earnings report for Company A in Q2 2023', CURRENT_TIMESTAMP),
('Company B', 'Earnings', 2023, 'Q2', 'Earnings report for Company B in Q2 2023', CURRENT_TIMESTAMP),
('Company C', 'Financials', 2023, 'Q1', 'Financial report for Company C in Q1 2023', CURRENT_TIMESTAMP),
('Company D', 'Earnings', 2024, 'Q1', 'Earnings report for Company D in Q1 2024', CURRENT_TIMESTAMP),
('Company E', 'Financials', 2024, 'Q2', 'Financial report for Company E in Q2 2024', CURRENT_TIMESTAMP),
('Company F', 'Earnings', 2023, 'Q3', 'Earnings report for Company F in Q3 2023', CURRENT_TIMESTAMP),
('Company G', 'Earnings', 2023, 'Q4', 'Earnings report for Company G in Q4 2023', CURRENT_TIMESTAMP),
('Company H', 'Earnings', 2024, 'Q2', 'Earnings report for Company H in Q2 2024', CURRENT_TIMESTAMP),
('Company I', 'Financials', 2023, 'Q4', 'Financial report for Company I in Q4 2023', CURRENT_TIMESTAMP),
('Company J', 'Earnings', 2024, 'Q3', 'Earnings report for Company J in Q3 2024', CURRENT_TIMESTAMP);
