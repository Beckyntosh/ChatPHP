CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(255) NOT NULL,
    company VARCHAR(100) NOT NULL,
    quarter VARCHAR(50) NOT NULL,
    report_year YEAR NOT NULL,
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO financial_reports (report_title, company, quarter, report_year, content) VALUES 
('Q2 Earnings Report Tech Company A', 'Tech Company A', 'Q2', '2023', 'Lorem ipsum...'),
('Q3 Financial Report Tech Company B', 'Tech Company B', 'Q3', '2023', 'Lorem ipsum...'),
('Q2 Quarterly Report Tech Company C', 'Tech Company C', 'Q2', '2023', 'Lorem ipsum...'),
('Q4 Earnings Report Tech Company D', 'Tech Company D', 'Q4', '2023', 'Lorem ipsum...'),
('Q1 Financial Report Tech Company E', 'Tech Company E', 'Q1', '2023', 'Lorem ipsum...'),
('Q3 Quarterly Report Tech Company F', 'Tech Company F', 'Q3', '2023', 'Lorem ipsum...'),
('Q2 Earnings Report Tech Company G', 'Tech Company G', 'Q2', '2023', 'Lorem ipsum...'),
('Q4 Financial Report Tech Company H', 'Tech Company H', 'Q4', '2023', 'Lorem ipsum...'),
('Q1 Quarterly Report Tech Company I', 'Tech Company I', 'Q1', '2023', 'Lorem ipsum...'),
('Q3 Earnings Report Tech Company J', 'Tech Company J', 'Q3', '2023', 'Lorem ipsum...');
```

