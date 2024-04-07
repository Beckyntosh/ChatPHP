CREATE TABLE IF NOT EXISTS tech_companies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    q2_earnings_report TEXT NOT NULL,
    year YEAR NOT NULL
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO tech_companies (name, q2_earnings_report, year) VALUES
('Company A', 'Q2 earnings report for Company A in 2023', 2023),
('Company B', 'Q2 earnings report for Company B in 2023', 2023),
('Company C', 'Q2 earnings report for Company C in 2023', 2023),
('Company D', 'Q2 earnings report for Company D in 2023', 2023),
('Company E', 'Q2 earnings report for Company E in 2023', 2023),
('Company F', 'Q2 earnings report for Company F in 2023', 2023),
('Company G', 'Q2 earnings report for Company G in 2023', 2023),
('Company H', 'Q2 earnings report for Company H in 2023', 2023),
('Company I', 'Q2 earnings report for Company I in 2023', 2023),
('Company J', 'Q2 earnings report for Company J in 2023', 2023);
