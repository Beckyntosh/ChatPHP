CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    report_type VARCHAR(50),
    year YEAR,
    content TEXT,
    submission_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO financial_reports(company_name, report_type, year, content) VALUES
('Company A', 'Q1 Earnings', 2023, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Company B', 'Q2 Earnings', 2023, 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Company C', 'Q3 Earnings', 2023, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.'),
('Company D', 'Q4 Earnings', 2023, 'Duis aute irure dolor in reprehenderit in voluptate velit esse.'),
('Company E', 'Q1 Earnings', 2024, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.'),
('Company F', 'Q2 Earnings', 2024, 'Deserunt mollit anim id est laborum.'),
('Company G', 'Q3 Earnings', 2024, 'Nisi ut aliquid ex ea commodi consequat.'),
('Company H', 'Q4 Earnings', 2024, 'Quis autem vel eum iure reprenderit qui in ea voluptate velit esse.'),
('Company I', 'Q1 Earnings', 2025, 'Esse cillum dolore eu fugiat nulla pariatur.'),
('Company J', 'Q2 Earnings', 2025, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
