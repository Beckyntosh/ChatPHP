CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company VARCHAR(50) NOT NULL,
    report_type VARCHAR(50) NOT NULL,
    year INT(4) NOT NULL,
    quarter VARCHAR(2) NOT NULL,
    report TEXT,
    reg_date TIMESTAMP
);

INSERT INTO financial_reports (company, report_type, year, quarter, report) VALUES ('Company A', 'Earnings', 2023, 'Q2', 'Sample report text 1');
INSERT INTO financial_reports (company, report_type, year, quarter, report) VALUES ('Company B', 'Earnings', 2023, 'Q2', 'Sample report text 2');
INSERT INTO financial_reports (company, report_type, year, quarter, report) VALUES ('Company C', 'Earnings', 2023, 'Q2', 'Sample report text 3');
INSERT INTO financial_reports (company, report_type, year, quarter, report) VALUES ('Company D', 'Financial', 2023, 'Q2', 'Sample report text 4');
INSERT INTO financial_reports (company, report_type, year, quarter, report) VALUES ('Company E', 'Earnings', 2023, 'Q2', 'Sample report text 5');
INSERT INTO financial_reports (company, report_type, year, quarter, report) VALUES ('Company F', 'Earnings', 2023, 'Q2', 'Sample report text 6');
INSERT INTO financial_reports (company, report_type, year, quarter, report) VALUES ('Company G', 'Financial', 2023, 'Q2', 'Sample report text 7');
INSERT INTO financial_reports (company, report_type, year, quarter, report) VALUES ('Company H', 'Earnings', 2023, 'Q2', 'Sample report text 8');
INSERT INTO financial_reports (company, report_type, year, quarter, report) VALUES ('Company I', 'Earnings', 2023, 'Q2', 'Sample report text 9');
INSERT INTO financial_reports (company, report_type, year, quarter, report) VALUES ('Company J', 'Earnings', 2023, 'Q2', 'Sample report text 10');
