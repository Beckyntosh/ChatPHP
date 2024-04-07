CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_name VARCHAR(255) NOT NULL,
    company VARCHAR(255) NOT NULL,
    report_year YEAR NOT NULL,
    report_quarter VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO financial_reports (report_name, company, report_year, report_quarter, content) VALUES ('Q2 earnings reports for tech companies 2023', 'Tech Corp', '2023', '2', 'This report includes financial data for Q2 2023 for various tech companies.');
INSERT INTO financial_reports (report_name, company, report_year, report_quarter, content) VALUES ('Financial Summary', 'Finance Inc.', '2023', '3', 'Summary of financial performance for Q3 2023.');
INSERT INTO financial_reports (report_name, company, report_year, report_quarter, content) VALUES ('Quarterly Profits', 'Profit Co.', '2022', '4', 'Detailed breakdown of profits for Q4 2022.');
INSERT INTO financial_reports (report_name, company, report_year, report_quarter, content) VALUES ('Annual Revenue Report', 'Revolution Ltd.', '2021', '1', 'Comprehensive report on annual revenue for 2021.');
INSERT INTO financial_reports (report_name, company, report_year, report_quarter, content) VALUES ('Tech Industry Analysis', 'Tech Insights', '2020', '2', 'In-depth analysis of the tech industry in Q2 2020.');
INSERT INTO financial_reports (report_name, company, report_year, report_quarter, content) VALUES ('Quarterly Expenses Report', 'Expense Corp', '2021', '3', 'Breakdown of expenses for Q3 2021.');
INSERT INTO financial_reports (report_name, company, report_year, report_quarter, content) VALUES ('Financial Projections', 'Projections Ltd.', '2024', '2', 'Future financial projections for the year 2024.');
INSERT INTO financial_reports (report_name, company, report_year, report_quarter, content) VALUES ('Market Trends Analysis', 'Trendy Market', '2022', '1', 'Analysis of market trends in Q1 2022.');
INSERT INTO financial_reports (report_name, company, report_year, report_quarter, content) VALUES ('Economic Forecast', 'Econ Forecasting', '2023', '4', 'Forecasting economic trends for Q4 2023.');
INSERT INTO financial_reports (report_name, company, report_year, report_quarter, content) VALUES ('Quarterly Revenue Growth', 'Growth Co.', '2020', '3', 'Analysis of revenue growth in Q3 2020.');
