CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company VARCHAR(255) NOT NULL,
    report_type VARCHAR(50),
    year INT,
    quarter INT,
    report TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO financial_reports (company, report_type, year, quarter, report) VALUES 
('Company A', 'Earnings', 2023, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Company B', 'Earnings', 2023, 2, 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Company C', 'Earnings', 2023, 2, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
('Company D', 'Earnings', 2023, 2, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'),
('Company E', 'Earnings', 2023, 2, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('Company F', 'Earnings', 2023, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Company G', 'Earnings', 2023, 2, 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Company H', 'Earnings', 2023, 2, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
('Company I', 'Earnings', 2023, 2, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'),
('Company J', 'Earnings', 2023, 2, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
