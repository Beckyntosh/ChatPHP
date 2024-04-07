CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(255) NOT NULL,
    report_type VARCHAR(50) NOT NULL,
    year INT(4) NOT NULL,
    report_details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO financial_reports (company_name, report_type, year, report_details) VALUES ('Company A', 'Q2', 2023, 'Details of report A');
INSERT INTO financial_reports (company_name, report_type, year, report_details) VALUES ('Company B', 'Q2', 2023, 'Details of report B');
INSERT INTO financial_reports (company_name, report_type, year, report_details) VALUES ('Company C', 'Q3', 2023, 'Details of report C');
INSERT INTO financial_reports (company_name, report_type, year, report_details) VALUES ('Company D', 'Q2', 2023, 'Details of report D');
INSERT INTO financial_reports (company_name, report_type, year, report_details) VALUES ('Company E', 'Q2', 2023, 'Details of report E');
INSERT INTO financial_reports (company_name, report_type, year, report_details) VALUES ('Company F', 'Q2', 2023, 'Details of report F');
INSERT INTO financial_reports (company_name, report_type, year, report_details) VALUES ('Company G', 'Q2', 2023, 'Details of report G');
INSERT INTO financial_reports (company_name, report_type, year, report_details) VALUES ('Company H', 'Q2', 2023, 'Details of report H');
INSERT INTO financial_reports (company_name, report_type, year, report_details) VALUES ('Company I', 'Q2', 2023, 'Details of report I');
INSERT INTO financial_reports (company_name, report_type, year, report_details) VALUES ('Company J', 'Q2', 2023, 'Details of report J');
