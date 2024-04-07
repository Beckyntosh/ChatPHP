CREATE TABLE IF NOT EXISTS financial_reports (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  company_name VARCHAR(50) NOT NULL,
  report_type VARCHAR(50) NOT NULL,
  year YEAR(4) NOT NULL,
  quarter INT(1) NOT NULL,
  report LONGTEXT,
  reg_date TIMESTAMP
);

INSERT INTO financial_reports (company_name, report_type, year, quarter, report) VALUES
('Apple', 'Earnings', 2023, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Microsoft', 'Financials', 2023, 2, 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Google', 'Earnings', 2023, 2, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.'),
('Amazon', 'Quarterly Report', 2023, 2, 'Duis aute irure dolor in reprehenderit in voluptate velit esse.'),
('Facebook', 'Earnings', 2023, 2, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.'),
('Intel', 'Financial Report', 2023, 2, 'Deserunt mollit anim id est laborum.'),
('IBM', 'Earnings Report', 2023, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Oracle', 'Quarterly Earnings', 2023, 2, 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Cisco', 'Financials', 2023, 2, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.'),
('HP', 'Earnings', 2023, 2, 'Duis aute irure dolor in reprehenderit in voluptate velit esse.');
