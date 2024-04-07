CREATE TABLE IF NOT EXISTS FinancialReports (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
company VARCHAR(30) NOT NULL,
quarter VARCHAR(10) NOT NULL,
year YEAR(4),
report TEXT,
reg_date TIMESTAMP
);

INSERT INTO FinancialReports (company, quarter, year, report) VALUES ('Company A', 'Q1', 2023, 'This is the report for Company A in Q1 2023');
INSERT INTO FinancialReports (company, quarter, year, report) VALUES ('Company B', 'Q2', 2023, 'This is the report for Company B in Q2 2023');
INSERT INTO FinancialReports (company, quarter, year, report) VALUES ('Company C', 'Q3', 2023, 'This is the report for Company C in Q3 2023');
INSERT INTO FinancialReports (company, quarter, year, report) VALUES ('Company D', 'Q4', 2023, 'This is the report for Company D in Q4 2023');
INSERT INTO FinancialReports (company, quarter, year, report) VALUES ('Company E', 'Q1', 2024, 'This is the report for Company E in Q1 2024');
INSERT INTO FinancialReports (company, quarter, year, report) VALUES ('Company F', 'Q2', 2024, 'This is the report for Company F in Q2 2024');
INSERT INTO FinancialReports (company, quarter, year, report) VALUES ('Company G', 'Q3', 2024, 'This is the report for Company G in Q3 2024');
INSERT INTO FinancialReports (company, quarter, year, report) VALUES ('Company H', 'Q4', 2024, 'This is the report for Company H in Q4 2024');
INSERT INTO FinancialReports (company, quarter, year, report) VALUES ('Company I', 'Q1', 2025, 'This is the report for Company I in Q1 2025');
INSERT INTO FinancialReports (company, quarter, year, report) VALUES ('Company J', 'Q2', 2025, 'This is the report for Company J in Q2 2025');
