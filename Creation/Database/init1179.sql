CREATE TABLE IF NOT EXISTS financial_reports (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  year INT(4) NOT NULL,
  quarter INT(1) NOT NULL,
  company_type VARCHAR(50),
  reg_date TIMESTAMP
);

INSERT INTO financial_reports (title, content, year, quarter, company_type, reg_date) VALUES ('Q2 earnings report for Tech Company A 2023', 'This report details the financial performance of Tech Company A in the second quarter of 2023.', 2023, 2, 'tech', NOW());

INSERT INTO financial_reports (title, content, year, quarter, company_type, reg_date) VALUES ('Q2 earnings report for Tech Company B 2023', 'This report provides information on the financial results of Tech Company B for the second quarter of 2023.', 2023, 2, 'tech', NOW());

INSERT INTO financial_reports (title, content, year, quarter, company_type, reg_date) VALUES ('Q2 earnings report for Tech Company C 2023', 'Detailed insight into the financial performance of Tech Company C for the second quarter of 2023.', 2023, 2, 'tech', NOW());

INSERT INTO financial_reports (title, content, year, quarter, company_type, reg_date) VALUES ('Q2 earnings report for Tech Company D 2023', 'This report highlights the financial achievements of Tech Company D in the second quarter of 2023.', 2023, 2, 'tech', NOW());

INSERT INTO financial_reports (title, content, year, quarter, company_type, reg_date) VALUES ('Q2 earnings report for Tech Company E 2023', 'Analytical review of the financial outcomes of Tech Company E in the second quarter of 2023.', 2023, 2, 'tech', NOW());

INSERT INTO financial_reports (title, content, year, quarter, company_type, reg_date) VALUES ('Q2 earnings report for Tech Company F 2023', 'Insights into the financial results of Tech Company F for the second quarter of 2023.', 2023, 2, 'tech', NOW());

INSERT INTO financial_reports (title, content, year, quarter, company_type, reg_date) VALUES ('Q2 earnings report for Tech Company G 2023', 'Summary of the financial performance of Tech Company G in the second quarter of 2023.', 2023, 2, 'tech', NOW());

INSERT INTO financial_reports (title, content, year, quarter, company_type, reg_date) VALUES ('Q2 earnings report for Tech Company H 2023', 'Key financial information on Tech Company H for the second quarter of 2023.', 2023, 2, 'tech', NOW());

INSERT INTO financial_reports (title, content, year, quarter, company_type, reg_date) VALUES ('Q2 earnings report for Tech Company I 2023', 'Overview of the financial results of Tech Company I in the second quarter of 2023.', 2023, 2, 'tech', NOW());

INSERT INTO financial_reports (title, content, year, quarter, company_type, reg_date) VALUES ('Q2 earnings report for Tech Company J 2023', 'Detailed analysis of the financial performance of Tech Company J in the second quarter of 2023.', 2023, 2, 'tech', NOW());