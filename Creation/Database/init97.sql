CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    report TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO financial_reports (title, report) VALUES ('Quarterly Financial Report Q1', 'This report covers the financial performance of the company for the first quarter.');
INSERT INTO financial_reports (title, report) VALUES ('Annual Financial Report 2022', 'Detailed analysis of the company\'s financial performance for the year 2022.');
INSERT INTO financial_reports (title, report) VALUES ('Monthly Budget Report August', 'Budget allocation and expenditures for the month of August.');
INSERT INTO financial_reports (title, report) VALUES ('Profit Margin Analysis', 'Study on profit margins and strategies for improvement.');
INSERT INTO financial_reports (title, report) VALUES ('Cash Flow Statement', 'Tracking the movement of cash inflows and outflows.');
INSERT INTO financial_reports (title, report) VALUES ('Expense Tracking Report', 'Monitoring and categorizing expenses for better financial management.');
INSERT INTO financial_reports (title, report) VALUES ('Investment Portfolio Review', 'Evaluation of investment holdings and returns.');
INSERT INTO financial_reports (title, report) VALUES ('Financial Forecast for Q4', 'Predictions and projections for the fourth quarter.');
INSERT INTO financial_reports (title, report) VALUES ('Tax Compliance Report', 'Ensuring compliance with tax regulations and laws.');
INSERT INTO financial_reports (title, report) VALUES ('Balance Sheet Analysis', 'Understanding the financial position of the company.');
