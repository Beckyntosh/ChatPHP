CREATE TABLE IF NOT EXISTS financial_reports (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(50) NOT NULL,
    report_type VARCHAR(50) NOT NULL,
    year YEAR(4),
    content TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO financial_reports (company_name, report_type, year, content) 
VALUES 
("TechCo1", "Q2 earnings", 2023, "Lorem ipsum dolor sit amet, consectetur adipiscing elit."),
("TechCo2", "Q2 earnings", 2023, "Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."),
("TechCo3", "Q2 earnings", 2023, "Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris."),
("TechCo4", "Q2 earnings", 2023, "Duis aute irure dolor in reprehenderit in voluptate velit esse."),
("TechCo5", "Q2 earnings", 2023, "Cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat."),
("TechCo6", "Q2 earnings", 2023, "Sunt in culpa qui officia deserunt mollit anim id est laborum."),
("TechCo7", "Q2 earnings", 2023, "Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut."),
("TechCo8", "Q2 earnings", 2023, "Fugit sed quia consequuntur magni dolores eos qui ratione voluptatem."),
("TechCo9", "Q2 earnings", 2023, "Deleniti atque corrupti quos dolores et quas molestias excepturi sint."),
("TechCo10", "Q2 earnings", 2023, "Sint occaecati cupiditate non provident, similique sunt in culpa.");
