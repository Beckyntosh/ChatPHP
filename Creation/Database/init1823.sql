CREATE TABLE IF NOT EXISTS uploaded_files (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
analysis_result TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_files (filename, analysis_result) VALUES ('file1.txt', 2),
('file2.txt', -1),
('file3.txt', 3),
('file4.txt', -2),
('file5.txt', 0),
('file6.txt', 1),
('file7.txt', -4),
('file8.txt', 5),
('file9.txt', 3),
('file10.txt', -2);