CREATE TABLE IF NOT EXISTS financial_reports (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  company_name VARCHAR(50) NOT NULL,
  report_type VARCHAR(50) NOT NULL,
  quarter INT(1) NOT NULL,
  year YEAR(4) NOT NULL,
  report LONGTEXT,
  reg_date TIMESTAMP
);

INSERT INTO financial_reports (company_name, report_type, quarter, year, report, reg_date) VALUES
('Company A', 'Q2 earnings reports', 2, 2023, 'Lorem ipsum report data', NOW()),
('Company B', 'Q2 earnings reports', 2, 2023, 'Lorem ipsum report data', NOW()),
('Company C', 'Q2 earnings reports', 2, 2023, 'Lorem ipsum report data', NOW()),
('Company D', 'Q3 financial reports', 3, 2023, 'Lorem ipsum report data', NOW()),
('Company E', 'Q2 earnings reports', 2, 2023, 'Lorem ipsum report data', NOW()),
('Company F', 'Q3 financial reports', 3, 2023, 'Lorem ipsum report data', NOW()),
('Company G', 'Q2 earnings reports', 2, 2023, 'Lorem ipsum report data', NOW()),
('Company H', 'Q3 financial reports', 3, 2023, 'Lorem ipsum report data', NOW()),
('Company I', 'Q2 earnings reports', 2, 2023, 'Lorem ipsum report data', NOW()),
('Company J', 'Q2 earnings reports', 2, 2023, 'Lorem ipsum report data', NOW());
