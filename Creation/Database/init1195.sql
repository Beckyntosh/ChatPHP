CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company VARCHAR(50) NOT NULL,
    report_year YEAR NOT NULL,
    quarter VARCHAR(10) NOT NULL,
    report LONGTEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO financial_reports (company, report_year, quarter, report) VALUES 
('Company A', '2023', 'Q1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Company B', '2023', 'Q2', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Company C', '2023', 'Q3', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.'),
('Company D', '2023', 'Q4', 'Duis aute irure dolor in reprehenderit in voluptate velit esse.'),
('Company E', '2023', 'Q1', 'Cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.'),
('Company F', '2023', 'Q2', 'Proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('Company G', '2023', 'Q3', 'Lobortis nisl ut aliquip ex ea commodo consequat. Duis aute irure dolor.'),
('Company H', '2023', 'Q4', 'In reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.'),
('Company I', '2023', 'Q1', 'Pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa.'),
('Company J', '2023', 'Q2', 'Qui officia deserunt mollit anim id est laborum incididunt ut labore et.')
