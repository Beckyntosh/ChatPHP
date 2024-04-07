CREATE TABLE IF NOT EXISTS financial_reports (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
report VARCHAR(255) NOT NULL,
company VARCHAR(50),
year INT(4),
quarter VARCHAR(2),
reg_date TIMESTAMP
);

INSERT INTO financial_reports (report, company, year, quarter) VALUES ('Q2 earnings reports for tech companies 2023', 'TechCorp', 2023, '2');
INSERT INTO financial_reports (report, company, year, quarter) VALUES ('Annual Financial Statement', 'HealthTech', 2022, '4');
INSERT INTO financial_reports (report, company, year, quarter) VALUES ('Quarterly Revenue Analysis', 'BioTech', 2023, '1');
INSERT INTO financial_reports (report, company, year, quarter) VALUES ('Earnings Forecast', 'PharmaCorp', 2022, '3');
INSERT INTO financial_reports (report, company, year, quarter) VALUES ('Financial Performance Review', 'WellnessInc', 2023, '2');
INSERT INTO financial_reports (report, company, year, quarter) VALUES ('Market Trends Analysis', 'FitnessTech', 2022, '4');
INSERT INTO financial_reports (report, company, year, quarter) VALUES ('Investment Portfolio Update', 'LifeCare', 2023, '1');
INSERT INTO financial_reports (report, company, year, quarter) VALUES ('Quarterly Earnings Report', 'OmniHealth', 2022, '3');
INSERT INTO financial_reports (report, company, year, quarter) VALUES ('Profit Margin Analysis', 'VitalityCorp', 2023, '2');
INSERT INTO financial_reports (report, company, year, quarter) VALUES ('Annual Budget Presentation', 'PureLiving', 2022, '4');
