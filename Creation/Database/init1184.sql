CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_name VARCHAR(255) NOT NULL,
    company_type VARCHAR(50),
    year INT(4),
    quarter VARCHAR(50),
    report LONGTEXT,
    reg_date TIMESTAMP
);

INSERT INTO financial_reports (report_name, company_type, year, quarter, report) VALUES 
('Tech Company 1 Q2 2023 Report', 'Tech Company', 2023, 'Q2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', NOW()),
('Tech Company 2 Q2 2023 Report', 'Tech Company', 2023, 'Q2', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NOW()),
('Tech Company 3 Q2 2023 Report', 'Tech Company', 2023, 'Q2', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NOW()),
('Tech Company 4 Q2 2023 Report', 'Tech Company', 2023, 'Q2', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NOW()),
('Tech Company 5 Q2 2023 Report', 'Tech Company', 2023, 'Q2', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NOW()),
('Health Company 1 Q2 2023 Report', 'Health Company', 2023, 'Q2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', NOW()),
('Health Company 2 Q2 2023 Report', 'Health Company', 2023, 'Q2', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NOW()),
('Health Company 3 Q2 2023 Report', 'Health Company', 2023, 'Q2', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NOW()),
('Health Company 4 Q2 2023 Report', 'Health Company', 2023, 'Q2', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NOW()),
('Health Company 5 Q2 2023 Report', 'Health Company', 2023, 'Q2', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NOW());
