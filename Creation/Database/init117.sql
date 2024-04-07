-- Create Financial Reports Table
CREATE TABLE IF NOT EXISTS financial_reports (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
company_name VARCHAR(50) NOT NULL,
report_type VARCHAR(50),
period VARCHAR(10),
year INT(4),
content TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert 10 values into financial_reports table
INSERT INTO financial_reports (company_name, report_type, period, year, content) VALUES
('Company A', 'Earnings', 'Q2', 2023, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Company B', 'Financials', 'Q2', 2023, 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Company C', 'Reports', 'Q2', 2023, 'Ut enim ad minim veniam, quis exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
('Company D', 'Profits', 'Q2', 2023, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'),
('Company E', 'Revenue', 'Q2', 2023, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('Company F', 'Income', 'Q2', 2023, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
('Company G', 'Balance Sheet', 'Q2', 2023, 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Company H', 'Expenses', 'Q2', 2023, 'Ut enim ad minim veniam, quis exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
('Company I', 'Budget', 'Q2', 2023, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'),
('Company J', 'Investments', 'Q2', 2023, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
