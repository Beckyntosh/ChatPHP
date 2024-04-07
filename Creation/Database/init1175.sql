CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    report_type VARCHAR(50) NOT NULL,
    year YEAR(4),
    quarter VARCHAR(5),
    report_text TEXT,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO financial_reports (company_name, report_type, year, quarter, report_text) VALUES 
('Company A', 'Quarterly', 2023, 'Q1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Company B', 'Annual', 2022, 'Q4', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Company C', 'Quarterly', 2023, 'Q2', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.'),
('Company D', 'Annual', 2021, 'Q3', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.'),
('Company E', 'Quarterly', 2022, 'Q3', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('Company F', 'Annual', 2023, 'Q1', 'Fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('Company G', 'Quarterly', 2023, 'Q1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Company H', 'Annual', 2022, 'Q2', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Company I', 'Quarterly', 2022, 'Q4', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.'),
('Company J', 'Annual', 2021, 'Q2', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.');
