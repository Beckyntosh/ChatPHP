CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(255) NOT NULL,
    report_content TEXT NOT NULL,
    report_year YEAR NOT NULL,
    report_quarter VARCHAR(50) NOT NULL,
    report_category VARCHAR(100) NOT NULL,
    report_date TIMESTAMP
);

INSERT INTO financial_reports (report_title, report_content, report_year, report_quarter, report_category) 
VALUES ('Q2 Earnings Report 2023 Tech Company A', 'Lorem ipsum dolor sit amet', '2023', 'Q2', 'Tech Company A'),
       ('Q2 Earnings Report 2023 Tech Company B', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2023', 'Q2', 'Tech Company B'),
       ('Q2 Earnings Report 2023 Tech Company C', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', '2023', 'Q2', 'Tech Company C'),
       ('Q2 Earnings Report 2023 Tech Company D', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2023', 'Q2', 'Tech Company D'),
       ('Q2 Earnings Report 2023 Tech Company E', 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2023', 'Q2', 'Tech Company E'),
       ('Q2 Earnings Report 2023 Tech Company F', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2023', 'Q2', 'Tech Company F'),
       ('Q2 Earnings Report 2023 Tech Company G', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', '2023', 'Q2', 'Tech Company G'),
       ('Q2 Earnings Report 2023 Tech Company H', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2023', 'Q2', 'Tech Company H'),
       ('Q2 Earnings Report 2023 Tech Company I', 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2023', 'Q2', 'Tech Company I'),
       ('Q2 Earnings Report 2023 Tech Company J', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2023', 'Q2', 'Tech Company J');
