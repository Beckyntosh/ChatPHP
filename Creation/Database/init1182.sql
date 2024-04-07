CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(255) NOT NULL,
    report_year INT NOT NULL,
    report_quarter INT NOT NULL,
    report_company VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
);

INSERT INTO financial_reports (report_title, report_year, report_quarter, report_company, content) 
VALUES 
('Q2 Earnings Report 2023', 2023, 2, 'Tech Company A', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
('Q1 Financial Update 2023', 2023, 1, 'Tech Company B', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.'),
('Annual Report 2023', 2023, 4, 'Tech Company C', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('Q3 Profit Analysis 2023', 2023, 3, 'Tech Company D', 'Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin'),
('Tech Industry Trends Report', 2023, 2, 'Tech Company E', 'Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi.'),
('Q4 Financial Overview 2023', 2023, 4, 'Tech Company F', 'Vivamus luctus egestas leo. Integer tincidunt. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.'),
('Q2 Revenue Report 2023', 2023, 2, 'Tech Company G', 'Phasellus viverra nulla ut metus varius laoreet. Phasellus ullamcorper ipsum rutrum nunc.'),
('Quarterly Performance Review', 2023, 1, 'Tech Company H', 'Fusce posuere felis sed lacus. Sed sapien. Curabitur sagittis hendrerit ante.'),
('Q3 Financial Update 2023', 2023, 3, 'Tech Company I', 'In hac habitasse platea dictumst. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.'),
('Tech Sector Analysis 2023', 2023, 4, 'Tech Company J', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.');
