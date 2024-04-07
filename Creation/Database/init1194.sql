CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(30) NOT NULL,
    report_type VARCHAR(50),
    year YEAR,
    report LONGTEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO financial_reports (company_name, report_type, year, report) VALUES ('TechCompany1', 'Q2 Earnings', '2023', 'Some lengthy earnings report...');
INSERT INTO financial_reports (company_name, report_type, year, report) VALUES ('TechCompany2', 'Q2 Earnings', '2023', 'Another earnings report...');
INSERT INTO financial_reports (company_name, report_type, year, report) VALUES ('TechCompany3', 'Q2 Earnings', '2023', 'Third earnings report...');
INSERT INTO financial_reports (company_name, report_type, year, report) VALUES ('TechCompany4', 'Q2 Earnings', '2023', 'Fourth earnings report...');
INSERT INTO financial_reports (company_name, report_type, year, report) VALUES ('TechCompany5', 'Q2 Earnings', '2023', 'Fifth earnings report...');
INSERT INTO financial_reports (company_name, report_type, year, report) VALUES ('TechCompany6', 'Q2 Earnings', '2023', 'Sixth earnings report...');
INSERT INTO financial_reports (company_name, report_type, year, report) VALUES ('TechCompany7', 'Q2 Earnings', '2023', 'Seventh earnings report...');
INSERT INTO financial_reports (company_name, report_type, year, report) VALUES ('TechCompany8', 'Q2 Earnings', '2023', 'Eighth earnings report...');
INSERT INTO financial_reports (company_name, report_type, year, report) VALUES ('TechCompany9', 'Q2 Earnings', '2023', 'Ninth earnings report...');
INSERT INTO financial_reports (company_name, report_type, year, report) VALUES ('TechCompany10', 'Q2 Earnings', '2023', 'Tenth earnings report...');
