CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company VARCHAR(30) NOT NULL,
    report_type VARCHAR(50),
    year YEAR,
    document TEXT,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO financial_reports (company, report_type, year, document) VALUES ('Company1', 'Quarterly Earnings', 2021, 'Document1');
INSERT INTO financial_reports (company, report_type, year, document) VALUES ('Company2', 'Annual Report', 2022, 'Document2');
INSERT INTO financial_reports (company, report_type, year, document) VALUES ('Company3', 'Quarterly Earnings', 2023, 'Document3');
INSERT INTO financial_reports (company, report_type, year, document) VALUES ('Company4', 'Financial Analysis', 2021, 'Document4');
INSERT INTO financial_reports (company, report_type, year, document) VALUES ('Company5', 'Investor Presentation', 2022, 'Document5');
INSERT INTO financial_reports (company, report_type, year, document) VALUES ('Company6', 'Quarterly Earnings', 2023, 'Document6');
INSERT INTO financial_reports (company, report_type, year, document) VALUES ('Company7', 'Annual Report', 2021, 'Document7');
INSERT INTO financial_reports (company, report_type, year, document) VALUES ('Company8', 'Financial Analysis', 2022, 'Document8');
INSERT INTO financial_reports (company, report_type, year, document) VALUES ('Company9', 'Quarterly Earnings', 2023, 'Document9');
INSERT INTO financial_reports (company, report_type, year, document) VALUES ('Company10', 'Investor Presentation', 2021, 'Document10');