CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(255) NOT NULL,
    report_content TEXT,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO financial_reports (report_title, report_content) VALUES ('Q2 earnings reports for tech companies 2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
INSERT INTO financial_reports (report_title, report_content) VALUES ('Annual financial statements for luxury watch industry', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
INSERT INTO financial_reports (report_title, report_content) VALUES ('Quarterly revenue analysis for watch brands', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.');
INSERT INTO financial_reports (report_title, report_content) VALUES ('Profit margins of top watch manufacturers', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.');
INSERT INTO financial_reports (report_title, report_content) VALUES ('Market trends in smartwatch segment', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
INSERT INTO financial_reports (report_title, report_content) VALUES ('Economic impact of luxury watch sector', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.');
INSERT INTO financial_reports (report_title, report_content) VALUES ('Financial forecasts for watch industry', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
INSERT INTO financial_reports (report_title, report_content) VALUES ('Quarterly sales figures for luxury watch brands', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.');
INSERT INTO financial_reports (report_title, report_content) VALUES ('Investment opportunities in watch market', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.');
INSERT INTO financial_reports (report_title, report_content) VALUES ('Impact of pandemic on watch industry', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
