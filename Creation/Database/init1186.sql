CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    report_content TEXT NOT NULL,
    submission_date DATE NOT NULL DEFAULT CURRENT_DATE()
);

INSERT INTO financial_reports (title, report_content) VALUES 
('Q1 Financial Report', 'This is the financial report for the first quarter of 2023.'),
('Annual Revenue 2022', 'A detailed overview of the company\'s annual revenue for 2022.'),
('Q3 Earnings Analysis', 'In-depth analysis of the earnings for the third quarter of 2023.'),
('Tech Industry Trends', 'Trends and insights into the tech industry for 2023.'),
('Q4 Sales Projections', 'Projections for sales in the fourth quarter of 2023.'),
('Financial Forecast 2024', 'Forecast of financial performance for the year 2024.'),
('Investment Opportunities', 'Opportunities for investment based on financial data.'),
('Q1 Earnings Report', 'Detailed report on earnings for the first quarter of 2023.'),
('Financial Health Check', 'Assessment of the company\'s financial health.'),
('Market Analysis 2023', 'Analysis of the market trends for 2023.');
