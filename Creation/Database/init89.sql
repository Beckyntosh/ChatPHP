CREATE TABLE IF NOT EXISTS financial_reports (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  company VARCHAR(50) NOT NULL,
  quarter VARCHAR(10) NOT NULL,
  year YEAR(4) NOT NULL,
  report_content TEXT,
  reg_date TIMESTAMP
);

INSERT INTO financial_reports (company, quarter, year, report_content) VALUES ('Company1', 'Q1', '2022', 'Report content 1');
INSERT INTO financial_reports (company, quarter, year, report_content) VALUES ('Company2', 'Q2', '2021', 'Report content 2');
INSERT INTO financial_reports (company, quarter, year, report_content) VALUES ('Company3', 'Q3', '2020', 'Report content 3');
INSERT INTO financial_reports (company, quarter, year, report_content) VALUES ('Company4', 'Q4', '2019', 'Report content 4');
INSERT INTO financial_reports (company, quarter, year, report_content) VALUES ('Company5', 'Q1', '2018', 'Report content 5');
INSERT INTO financial_reports (company, quarter, year, report_content) VALUES ('Company6', 'Q2', '2017', 'Report content 6');
INSERT INTO financial_reports (company, quarter, year, report_content) VALUES ('Company7', 'Q3', '2016', 'Report content 7');
INSERT INTO financial_reports (company, quarter, year, report_content) VALUES ('Company8', 'Q4', '2015', 'Report content 8');
INSERT INTO financial_reports (company, quarter, year, report_content) VALUES ('Company9', 'Q1', '2014', 'Report content 9');
INSERT INTO financial_reports (company, quarter, year, report_content) VALUES ('Company10', 'Q2', '2013', 'Report content 10');