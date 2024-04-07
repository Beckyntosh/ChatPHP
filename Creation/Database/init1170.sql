CREATE TABLE IF NOT EXISTS financial_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    type VARCHAR(50),
    size INT,
    content LONGBLOB NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO financial_reports (name, type, size, content) VALUES ('Q2 earnings report 2023 - Tech Company A', 'pdf', 1024, 'PDF data here');
INSERT INTO financial_reports (name, type, size, content) VALUES ('Q2 earnings report 2023 - Tech Company B', 'xls', 2048, 'XLS data here');
INSERT INTO financial_reports (name, type, size, content) VALUES ('Q2 earnings report 2023 - Tech Company C', 'doc', 512, 'DOC data here');
INSERT INTO financial_reports (name, type, size, content) VALUES ('Q2 earnings report 2023 - Tech Company D', 'pdf', 8192, 'PDF data here');
INSERT INTO financial_reports (name, type, size, content) VALUES ('Q2 earnings report 2023 - Tech Company E', 'xlsx', 4096, 'XLSX data here');
INSERT INTO financial_reports (name, type, size, content) VALUES ('Q2 earnings report 2023 - Tech Company F', 'txt', 256, 'TXT data here');
INSERT INTO financial_reports (name, type, size, content) VALUES ('Q2 earnings report 2023 - Tech Company G', 'pdf', 6144, 'PDF data here');
INSERT INTO financial_reports (name, type, size, content) VALUES ('Q2 earnings report 2023 - Tech Company H', 'ppt', 768, 'PPT data here');
INSERT INTO financial_reports (name, type, size, content) VALUES ('Q2 earnings report 2023 - Tech Company I', 'docx', 1536, 'DOCX data here');
INSERT INTO financial_reports (name, type, size, content) VALUES ('Q2 earnings report 2023 - Tech Company J', 'pdf', 5120, 'PDF data here');
