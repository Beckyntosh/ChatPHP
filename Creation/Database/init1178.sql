CREATE TABLE IF NOT EXISTS FinancialReports (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  report_title VARCHAR(255) NOT NULL,
  company_name VARCHAR(255),
  report_year YEAR,
  report_quarter INT,
  report_content TEXT,
  submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO FinancialReports (report_title, company_name, report_year, report_quarter, report_content)
VALUES ('Q2 earnings reports for tech companies 2023', 'Tech Company A', 2023, 2, 'Financial report content 1'),
       ('Q2 earnings reports for tech companies 2023', 'Tech Company B', 2023, 2, 'Financial report content 2'),
       ('Q3 earnings reports for software companies 2022', 'Software Company X', 2022, 3, 'Financial report content 3'),
       ('Q1 earnings reports for hardware companies 2021', 'Hardware Company Y', 2021, 1, 'Financial report content 4'),
       ('Q4 earnings reports for IT services companies 2020', 'IT Services Company Z', 2020, 4, 'Financial report content 5'),
       ('Q4 earnings reports for tech startups 2019', 'Tech Startup 1', 2019, 4, 'Financial report content 6'),
       ('Q1 earnings reports for internet companies 2018', 'Internet Company M', 2018, 1, 'Financial report content 7'),
       ('Q3 earnings reports for e-commerce companies 2017', 'E-commerce Company N', 2017, 3, 'Financial report content 8'),
       ('Q2 earnings reports for telecom companies 2016', 'Telecom Company P', 2016, 2, 'Financial report content 9'),
       ('Q1 earnings reports for social media companies 2015', 'Social Media Company Q', 2015, 1, 'Financial report content 10');
