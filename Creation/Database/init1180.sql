CREATE TABLE IF NOT EXISTS financial_reports (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        company VARCHAR(255) NOT NULL,
        report_type VARCHAR(255) NOT NULL,
        year YEAR(4),
        content TEXT,
        reg_date TIMESTAMP
        );

INSERT INTO financial_reports (company, report_type, year, content) VALUES ('Company A', 'Quarterly Earnings', 2023, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
INSERT INTO financial_reports (company, report_type, year, content) VALUES ('Company B', 'Annual Financial Report', 2022, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
INSERT INTO financial_reports (company, report_type, year, content) VALUES ('Company C', 'Quarterly Revenue Analysis', 2023, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
INSERT INTO financial_reports (company, report_type, year, content) VALUES ('Company D', 'Annual Profit Statement', 2021, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
INSERT INTO financial_reports (company, report_type, year, content) VALUES ('Company E', 'Quarterly Loss Report', 2022, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
INSERT INTO financial_reports (company, report_type, year, content) VALUES ('Company F', 'Annual Expense Analysis', 2020, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
INSERT INTO financial_reports (company, report_type, year, content) VALUES ('Company G', 'Quarterly Budget Overview', 2023, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
INSERT INTO financial_reports (company, report_type, year, content) VALUES ('Company H', 'Annual Investment Portfolio', 2022, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
INSERT INTO financial_reports (company, report_type, year, content) VALUES ('Company I', 'Quarterly Market Analysis', 2021, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
INSERT INTO financial_reports (company, report_type, year, content) VALUES ('Company J', 'Annual Financial Forecast', 2023, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
