CREATE TABLE IF NOT EXISTS financial_reports (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
company_name VARCHAR(30) NOT NULL,
report_type VARCHAR(50),
report_year YEAR,
report_content TEXT,
reg_date TIMESTAMP
);

INSERT INTO financial_reports (company_name, report_type, report_year, report_content, reg_date) VALUES
('Company A', 'Q2 Earnings', '2023', 'This is the financial report for Company A in Q2 2023', now()),
('Company B', 'Tech Companies Report', '2023', 'Tech companies financial report for 2023', now()),
('Company C', 'Q2 Earnings', '2023', 'Company C earnings report for Q2 2023', now()),
('Company D', 'Tech Report', '2023', 'Tech industry financial report for 2023', now()),
('Company E', 'Q2 Earnings', '2023', 'Q2 earnings report for Company E in 2023', now()),
('Company F', 'Tech Companies Report', '2023', 'Financial report for tech companies in 2023', now()),
('Company G', 'Q2 Earnings', '2023', 'Company G Q2 earnings report for 2023', now()),
('Company H', 'Tech Report', '2023', 'Financial report for tech industry in 2023', now()),
('Company I', 'Q2 Earnings', '2023', 'Q2 earnings report for Company I in 2023', now()),
('Company J', 'Tech Companies Report', '2023', 'Tech companies financial report for 2023', now());
