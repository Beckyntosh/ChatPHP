CREATE TABLE IF NOT EXISTS financial_reports (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
report_title VARCHAR(255) NOT NULL,
report_content TEXT NOT NULL,
report_year INT(4) NOT NULL,
report_quarter VARCHAR(2) NOT NULL,
report_category VARCHAR(100) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO financial_reports (report_title, report_content, report_year, report_quarter, report_category) VALUES 
('Q2 earnings reports for tech companies 2023', 'Content for Q2 earnings reports for tech companies in 2023', 2023, 'Q2', 'tech'),
('Q3 financial analysis for software firms 2023', 'Analysis of financial performance in Q3 for software companies in 2023', 2023, 'Q3', 'tech'),
('Q4 revenue projections for cybersecurity industry 2023', 'Projections for revenue in Q4 for cybersecurity sector in 2023', 2023, 'Q4', 'tech'),
('Q1 financial statements for AI startups 2023', 'Quarterly financial statements for AI startup companies in Q1 2023', 2023, 'Q1', 'tech'),
('Q2 earnings reports for e-commerce platforms 2023', 'Detailed earnings reports for Q2 for e-commerce platforms in 2023', 2023, 'Q2', 'tech'),
('Q3 revenue analysis for mobile app developers 2023', 'Analysis of revenue trends in Q3 for mobile app development companies in 2023', 2023, 'Q3', 'tech'),
('Q4 financial results for cloud computing companies 2023', 'Summary of financial results in Q4 for cloud computing firms in 2023', 2023, 'Q4', 'tech'),
('Q1 earnings reports for AI startups 2023', 'Quarterly earnings reports for AI startup companies in Q1 2023', 2023, 'Q1', 'tech'),
('Q2 revenue forecast for digital marketing agencies 2023', 'Forecasting revenue for Q2 for digital marketing agencies in 2023', 2023, 'Q2', 'tech'),
('Q3 financial overview for IT services providers 2023', 'Overview of financial performance in Q3 for IT services providers in 2023', 2023, 'Q3', 'tech');
