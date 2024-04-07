CREATE TABLE IF NOT EXISTS financial_reports (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  report TEXT NOT NULL,
  period VARCHAR(50) NOT NULL,
  year INT NOT NULL,
  company_sector VARCHAR(100) NOT NULL
);

INSERT INTO financial_reports (title, report, period, year, company_sector) VALUES ('Q2 earnings report for Apple 2023', 'Apple Inc. reported strong earnings for the second quarter of 2023.', 'Q2', 2023, 'Technology');
INSERT INTO financial_reports (title, report, period, year, company_sector) VALUES ('Q2 earnings report for Microsoft 2023', 'Microsoft Corporation announced record-breaking earnings for Q2 2023.', 'Q2', 2023, 'Technology');
INSERT INTO financial_reports (title, report, period, year, company_sector) VALUES ('Tech companies financial overview for Q2 2023', 'An overview of financial performance for various tech companies in the second quarter of 2023.', 'Q2', 2023, 'Technology');
INSERT INTO financial_reports (title, report, period, year, company_sector) VALUES ('Q2 earnings report for Google 2023', 'Alphabet Inc. (Google) posted impressive earnings results for the second quarter of 2023.', 'Q2', 2023, 'Technology');
INSERT INTO financial_reports (title, report, period, year, company_sector) VALUES ('Q2 earnings report for Amazon 2023', 'Amazon.com Inc. reported robust earnings for the second quarter of 2023.', 'Q2', 2023, 'Technology');
INSERT INTO financial_reports (title, report, period, year, company_sector) VALUES ('Q2 earnings report for Tesla 2023', 'Tesla, Inc. reported strong earnings growth in Q2 2023.', 'Q2', 2023, 'Automotive');
INSERT INTO financial_reports (title, report, period, year, company_sector) VALUES ('Q2 earnings report for AMD 2023', 'Advanced Micro Devices, Inc. showcased stellar earnings performance in the second quarter of 2023.', 'Q2', 2023, 'Technology');
INSERT INTO financial_reports (title, report, period, year, company_sector) VALUES ('Q2 earnings report for Nvidia 2023', 'Nvidia Corporation announced impressive earnings results for Q2 2023.', 'Q2', 2023, 'Technology');
INSERT INTO financial_reports (title, report, period, year, company_sector) VALUES ('Q2 earnings report for IBM 2023', 'International Business Machines Corporation reported solid earnings for the second quarter of 2023.', 'Q2', 2023, 'Technology');
INSERT INTO financial_reports (title, report, period, year, company_sector) VALUES ('Q2 earnings report for Facebook 2023', 'Meta Platforms Inc. (Facebook) posted strong earnings performance in Q2 2023.', 'Q2', 2023, 'Technology');
