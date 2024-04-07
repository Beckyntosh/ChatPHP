CREATE TABLE IF NOT EXISTS FinancialReports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    companyName VARCHAR(30) NOT NULL,
    quarter VARCHAR(10) NOT NULL,
    year INT(4) NOT NULL,
    report TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO FinancialReports (companyName, quarter, year, report) VALUES ('Company1', 'Q1', 2021, 'Financial report for Q1 2021');
INSERT INTO FinancialReports (companyName, quarter, year, report) VALUES ('Company2', 'Q2', 2022, 'Financial report for Q2 2022');
INSERT INTO FinancialReports (companyName, quarter, year, report) VALUES ('Company3', 'Q3', 2023, 'Financial report for Q3 2023');
INSERT INTO FinancialReports (companyName, quarter, year, report) VALUES ('Company4', 'Q4', 2024, 'Financial report for Q4 2024');
INSERT INTO FinancialReports (companyName, quarter, year, report) VALUES ('Company5', 'Q1', 2022, 'Financial report for Q1 2022');
INSERT INTO FinancialReports (companyName, quarter, year, report) VALUES ('Company6', 'Q2', 2023, 'Financial report for Q2 2023');
INSERT INTO FinancialReports (companyName, quarter, year, report) VALUES ('Company7', 'Q3', 2024, 'Financial report for Q3 2024');
INSERT INTO FinancialReports (companyName, quarter, year, report) VALUES ('Company8', 'Q4', 2021, 'Financial report for Q4 2021');
INSERT INTO FinancialReports (companyName, quarter, year, report) VALUES ('Company9', 'Q1', 2023, 'Financial report for Q1 2023');
INSERT INTO FinancialReports (companyName, quarter, year, report) VALUES ('Company10', 'Q2', 2024, 'Financial report for Q2 2024');
